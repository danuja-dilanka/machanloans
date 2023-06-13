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

        $data = $this->thisModel->get_data(decode($req_id));
        if (isset($data->id)) {
            return view('_member/_member', ["data" => $data, "req_id" => $req_id]);
        } else {
            return redirect()->to(base_url('member/mem'));
        }
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

            if ($req_id != "" && has_permission("member", "edit")) {
                $data = $this->thisModel->get_data(decode($req_id));
                if (isset($data->id)) {
                    $result = $this->thisModel->update_data($post_data, $data->id);
                    if ($result) {
                        if ($client_login) {
                            $user_det = $user_model->get_data_by(["email" => $login_email]);
                            if (!isset($user_det[0])) {
                                $user_model->add_data([
                                    "name" => $post_data["first_name"] . " " . $post_data["last_name"],
                                    "email" => $login_email,
                                    "rel_type" => "member",
                                    "rel_id" => $data->id,
                                    "utype" => 2,
                                    "password" => password_hash($password, PASSWORD_DEFAULT),
                                    "status" => $post_data["status"]
                                ]);
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
                    if ($client_login) {
                        $user_det = $user_model->get_data_by(["email" => $login_email]);
                        if (!isset($user_det[0])) {
                            $user_model->add_data([
                                "name" => $post_data["first_name"] . " " . $post_data["last_name"],
                                "email" => $login_email,
                                "rel_type" => "member",
                                "rel_id" => $insert_id,
                                "utype" => 2,
                                "password" => password_hash($password, PASSWORD_DEFAULT),
                                "status" => $post_data["status"]
                            ]);
                        }
                    }

                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('member/mem') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('member/mem'));
                }
            }
        }

        if ($req_id != "" && has_permission("member", "edit")) {
            $data = $this->thisModel->get_data(decode($req_id));
            if (isset($data->id)) {
                return view('_member/_member', ["data" => $data, "req_id" => $req_id]);
            } else {
                return redirect()->to(base_url('member/mem'));
            }
        } else if (has_permission("member", "add")) {
            return view('_member/_member');
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
