<?php

namespace App\Controllers;

class Setting extends BaseController {

    private $thisModel;

    public function __construct() {

        if (!already_logined()) {
            return redirect()->route('login');
        }

        $this->thisModel = model('Setting_model');
    }

    #ACCESS CONTROL

    public function access() {
        if (!has_permission("setting_access", "edit")) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('_settings/_access', ['title' => "Access & Module Control", "settings" => $this->thisModel]);
    }

    //LIST VIEW
    public function user_list() {
        if (!has_permission("user", "view")) {
            return redirect()->to(base_url('dashboard'));
        }
        return view('_settings/_user/_list', ["title" => "Users"]);
    }

    //CREATE/ UPDATE VIEW USER
    public function user($req_id = "") {
        $rules = [
            'email' => 'required|valid_email',
            'name' => 'required'
        ];
        $user_model = model('User_model');

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();

            if ($req_id != "" && has_permission("user", "edit")) {
                $data = $user_model->get_data(decode($req_id));
                if (isset($data->id)) {
                    if ($post_data["password"] != "") {
                        $post_data["password"] = password_hash($post_data["password"], PASSWORD_DEFAULT);
                    } else {
                        unset($post_data["password"]);
                    }
                    $result = $user_model->update_data($post_data, $data->id);
                    if ($result) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('setting/user/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('setting/user'));
                }
            } else if (has_permission("user", "add")) {
                $insert_id = $user_model->add_data($post_data);
                if ($insert_id > 0) {
                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('setting/user') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('setting/user'));
                }
            }
        }

        if ($req_id != "" && has_permission("user", "edit")) {
            $data = $user_model->get_data(decode($req_id));
            if (isset($data->id)) {
                return view('_settings/_user/_user', ["data" => $data, "title" => "Update User", "utypes" => $user_model->get_user_types(0, 1)]);
            } else {
                return redirect()->to(base_url('loan/loan_group'));
            }
        } else if (has_permission("user", "add")) {
            return view('_settings/_user/_user', ["title" => "New User", "utypes" => $user_model->get_user_types(0, 1)]);
        } else {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
    }

    //DELETE USER
    public function del_user($req_id = "") {

        if ($req_id != "" && has_permission("user", "delete")) {
            $user_model = model('User_model');
            $data = $user_model->get_data(decode($req_id));
            if (isset($data->id)) {
                $result = $user_model->delete_data($data->id);
                if ($result) {
                    session()->setFlashdata('notify', 'Successfully Deleted');
                }
            }
        }

        return redirect()->to(base_url('setting/user_list'));
    }

    //USER ROLES LIST VIEW
    public function user_role_list() {
        if (!has_permission("user", "view")) {
            return redirect()->to(base_url('dashboard'));
        }
        return view('_settings/_user_role/_list', ["title" => "Users"]);
    }

    //CREATE/ UPDATE VIEW USER ROLES
    public function user_role($req_id = "") {
        $rules = [
            'utype' => 'required',
            'status' => 'required|numeric'
        ];
        $user_model = model('User_model');

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();

            if ($req_id != "" && has_permission("user_role", "edit")) {
                $data = $user_model->get_user_types(decode($req_id));
                if (isset($data->id)) {
                    $result = $user_model->update_user_type($post_data, $data->id);
                    if ($result) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('setting/user_role/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('setting/user_role'));
                }
            } else if (has_permission("user_role", "add")) {
                $insert_id = $user_model->add_user_type($post_data);
                if ($insert_id > 0) {
                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('setting/user_role') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('setting/user_role'));
                }
            }
        }

        if ($req_id != "" && has_permission("user_role", "edit")) {
            $data = $user_model->get_user_types(decode($req_id));
            if (isset($data->id)) {
                return view('_settings/_user_role/_user_role', ["data" => $data, "title" => "Update User Role"]);
            } else {
                return redirect()->to(base_url('setting/user_role'));
            }
        } else if (has_permission("user_role", "add")) {
            return view('_settings/_user_role/_user_role', ["title" => "New User Role"]);
        } else {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
    }

    //DELETE USER ROLES
    public function del_user_role($req_id = "") {

        if ($req_id != "" && has_permission("user_role", "delete")) {
            $user_model = model('User_model');
            $data = $user_model->get_user_types(decode($req_id));
            if (isset($data->id)) {
                $result = $user_model->delete_user_type($data->id);
                if ($result) {
                    session()->setFlashdata('notify', 'Successfully Deleted');
                }
            }
        }

        return redirect()->to(base_url('setting/user_role_list'));
    }

}
