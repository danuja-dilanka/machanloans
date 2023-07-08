<?php

namespace App\Controllers;

class Member extends BaseController {

    private $thisModel;

    public function __construct() {

        if (!already_logined()) {
            return redirect()->route('login');
        }

        $this->thisModel = model('Member_model');
    }

    //REDIRECT TO LIST VIEW
    public function index() {
        if (!has_permission("member", "view")) {
            return redirect()->to(base_url('dashboard'));
        }
        return redirect()->route('member/mem_list');
    }

    //MEMBER VIEW
    public function view_member($req_id) {
        if (!has_permission("member", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        $member = decode($req_id);
        $data = $this->thisModel->get_data($member);
        if (isset($data->id)) {
            return view('_member/_view', ["data" => $data, "docs" => $this->thisModel->get_docs_by(["member" => $member]), "req_id" => $req_id]);
        } else {
            return redirect()->to(base_url('member/mem'));
        }
    }

    private function mng_docs($data, $member) {
        $docs = [
            "bank_statement" => "Bank Statement",
            "hw_nic_front" => "Husband / wife ID copy front",
            "hw_nic_back" => "Husband / wife ID copy back",
            "ga_certificate" => "GA Certificate",
            "fb_screenshot" => "Facebook Screenshot",
            "electricity_bill" => "Electricity Bill Photo"
        ];
        foreach ($docs as $key => $value) {
            if (isset($data[$key])) {
                $doc = $this->thisModel->get_docs_by(["member" => $member, "code" => $key]);
                if (isset($doc->id)) {
                    if ($doc->document != $data[$key]) {
                        $this->thisModel->update_doc([
                            "added_by" => decode(session()->ml_user),
                            "submitted_date" => date("Y-m-d"),
                            "submitted_time" => date("H:i:s"),
                            "document" => $data[$key],
                                ], $member);
                    }
                } else if ($data[$key] != "") {
                    $this->thisModel->add_doc([
                        "added_by" => decode(session()->ml_user),
                        "submitted_date" => date("Y-m-d"),
                        "submitted_time" => date("H:i:s"),
                        "document" => $data[$key],
                        "code" => $key,
                        "member" => $member,
                        "name" => $value,
                            ], $member);
                }
                unset($data[$key]);
            }
        }

        return $data;
    }

    //CREATE/ UPDATE VIEW
    public function mem($req_id = "") {
        $rules = [
            'first_name' => 'required|min_length[3]',
            'last_name' => 'required',
            'member_no' => 'required',
            'mobile' => 'required|numeric|min_length[9]',
            'email' => 'required|valid_email',
            'nic' => 'required',
        ];

        $try_by_logined_member = false;
        if ($req_id != "" && decode(session()->ml_user_type) == 2 && (decode($req_id) == decode(session()->ml_user_rel_id))) {
            $try_by_logined_member = true;
        }

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();
            $password = $login_email = null;
            $client_login = 0;
            $user_model = model('User_model');

            if (isset($post_data["password"])) {
                $password = $post_data["password"];
                unset($post_data["password"]);
            }
            if (isset($post_data["login_email"])) {
                $login_email = $post_data["login_email"];
                unset($post_data["login_email"]);
            }
            if (isset($post_data["client_login"])) {
                $post_data["client_login"] = $client_login = 1;
            } else {
                $post_data["client_login"] = 0;
            }

            if ($req_id != "" && (has_permission("member", "edit") || $try_by_logined_member)) {
                $member_id = decode($req_id);
                $data = $this->thisModel->get_data($member_id);
                if (isset($data->id)) {
                    $result = $this->thisModel->update_data($post_data, $data->id);
                    if ($result) {
                        $this->mng_docs($post_data, $member_id);
                        if ($client_login) {
                            $user_det = $user_model->get_data_by(["email" => $login_email]);
                            if (!isset($user_det[0])) {
                                $user_id = $user_model->add_data([
                                    "name" => $post_data["first_name"] . " " . $post_data["last_name"],
                                    "email" => $login_email,
                                    "rel_type" => "member",
                                    "rel_id" => $data->id,
                                    "utype" => 2,
                                    "password" => password_hash($password, PASSWORD_DEFAULT),
                                    "status" => $post_data["status"]
                                ]);
                                if ($user_id > 0) {
                                    make_and_send_sms("login", ["{{login_url}}" => base_url(), "{{password}}" => $password, "{{email}}" => $login_email], $post_data["mobile"]);
                                }
                            }
                        } else {
                            $user_det = $user_model->get_data_by(["rel_id" => $data->id, "rel_type" => "member"]);
                            if (isset($user_det[0])) {
                                $user_model->delete_data(0, ["rel_id" => $data->id, "rel_type" => "member"]);
                            }
                        }
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('member/mem/' . $req_id));
                    } else {
                        return redirect()->to(base_url('member/mem/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('member/mem'));
                }
            } else if (has_permission("member", "add")) {
                $insert_id = $this->thisModel->add_data($post_data);
                if ($insert_id > 0) {
                    $this->mng_docs($post_data, $insert_id);
                    if ($client_login) {
                        $user_det = $user_model->get_data_by(["email" => $login_email]);
                        if (!isset($user_det[0])) {
                            $user_id = $user_model->add_data([
                                "name" => $post_data["first_name"] . " " . $post_data["last_name"],
                                "email" => $login_email,
                                "rel_type" => "member",
                                "rel_id" => $insert_id,
                                "utype" => 2,
                                "password" => password_hash($password, PASSWORD_DEFAULT),
                                "status" => $post_data["status"]
                            ]);
                            if ($user_id > 0) {
                                make_and_send_sms("login", ["{{login_url}}" => base_url(), "{{password}}" => $password, "{{email}}" => $login_email], $post_data["mobile"]);
                            }
                        }
                    }

                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('member/mem') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('member/mem'));
                }
            }
        }

        if ($req_id != "" && (has_permission("member", "edit") || $try_by_logined_member)) {
            $data = $this->thisModel->get_data(decode($req_id));
            if (isset($data->id)) {
                return view('_member/_member', ["data" => $data, "req_id" => $req_id, "title" => "Edit Member"]);
            } else {
                return redirect()->to(base_url('member/mem'));
            }
        } else if (has_permission("member", "add")) {
            return view('_member/_member', ["title" => "Add Member"]);
        } else {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
    }

    //LIST VIEW
    public function mem_list() {
        if (!has_permission("member", "view")) {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
        return view('_member/_list', ['title' => "View Members"]);
    }

    //DELETE VIEW
    public function del_mem($req_id = "") {
        if (!has_permission("member", "delete")) {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        } else {
            $result = $this->thisModel->delete_data(decode($req_id));
            if ($result) {
                session()->setFlashdata('notify', 'Deleted Successfully!');
            }
        }

        return redirect()->to(base_url('member/mem_list'));
    }

}
