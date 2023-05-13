<?php

namespace App\Controllers;

class Member extends BaseController {

    public $validation;
    public $thisModel;

    public function __construct() {
        $this->validation = \Config\Services::validation();
        $this->thisModel = model('Member_model');
    }

    //REDIRECT TO LIST VIEW
    public function index() {
        redirect()->route('member/mem_list');
    }

    //CREATE/ UPDATE VIEW
    public function mem($req_id = "") {
        $rules = [
            'first_name' => 'required|min_length[3]',
            'last_name' => 'required',
            'member_no' => 'required',
            'mobile' => 'required|numeric|min_length[9]',
            'email' => 'required|valid_email'
        ];
        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();
            $password = $post_data["password"];
            $login_email = $post_data["login_email"];
            $client_login = $post_data["client_login"];
            $user_model = model('User_model');

            unset($post_data["password"]);
            unset($post_data["login_email"]);
            unset($post_data["client_login"]);
            if ($req_id != "") {
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
                                    "rel_id" => $user_det[0]->id,
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
                        return redirect()->to(base_url('member/mem/' . $req_id));
                    } else {
                        return redirect()->to(base_url('member/mem/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('member/mem'));
                }
            } else {
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
                                "password" => password_hash($password, PASSWORD_DEFAULT),
                                "status" => $post_data["status"]
                            ]);
                        }
                    }
                    return redirect()->to(base_url('member/mem') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('member/mem'));
                }
            }
        }

        if ($req_id != "") {
            $data = $this->thisModel->get_data(decode($req_id));
            if (isset($data->id)) {
                return view('_member/_member', ["data" => $data]);
            } else {
                return redirect()->to(base_url('member/mem'));
            }
        } else {
            return view('_member/_member');
        }
    }

    //LIST VIEW
    public function mem_list() {
        return view('_member/_list');
    }

}
