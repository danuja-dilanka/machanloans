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

    #SETTINGS MAIN

    public function main() {

        if (has_permission("setting_main", "edit")) {
            if ($this->request->is('post') && $this->request->getPost("type")) {
                $type = $this->request->getPost("type");
                $rules = [
                    'sidbar_image' => 'required',
                    'sidebar_image_height' => 'required',
                    'sidebar_image_width' => 'required',
                ];

                $succes = 0;
                if ($this->validate($rules) && $type == "sidebar") {
                    $sidbar_image = get_option("sidbar_image");
                    if ($sidbar_image != null) {
                        if (set_option("sidbar_image", $this->request->getPost("sidbar_image"))) {
                            $succes++;
                        }
                    } else {
                        if (add_option("sidbar_image", $this->request->getPost("sidbar_image"))) {
                            $succes++;
                        }
                    }
                    $sidebar_image_height = get_option("sidebar_image_height");
                    if ($sidebar_image_height != null) {
                        if (set_option("sidebar_image_height", $this->request->getPost("sidebar_image_height"))) {
                            $succes++;
                        }
                    } else {
                        if (add_option("sidebar_image_height", $this->request->getPost("sidebar_image_height"))) {
                            $succes++;
                        }
                    }
                    $sidebar_image_width = get_option("sidebar_image_width");
                    if ($sidebar_image_width != null) {
                        if (set_option("sidebar_image_width", $this->request->getPost("sidebar_image_width"))) {
                            $succes++;
                        }
                    } else {
                        if (add_option("sidebar_image_width", $this->request->getPost("sidebar_image_width"))) {
                            $succes++;
                        }
                    }

                    if ($succes > 0 && $succes < 4) {
                        session()->setFlashdata('notify', 'Sidebar Updated');
                    }

                    return redirect()->to(base_url('setting/main'));
                }
            }

            return view('_settings/_main', ["title" => "Main Settings"]);
        } else {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
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

        $try_by_logined_member = false;
        if ($req_id != "" && decode(session()->ml_user_type) == 2 && (decode($req_id) == decode(session()->ml_user))) {
            $try_by_logined_member = true;
        }

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();

            if ($req_id != "" && (has_permission("user", "edit") || $try_by_logined_member)) {
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
                    return redirect()->to(base_url('dashboard'));
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

        if ($req_id != "" && (has_permission("user", "edit") || $try_by_logined_member)) {
            $data = $user_model->get_data(decode($req_id));
            if (isset($data->id)) {
                return view('_settings/_user/_user', ["data" => $data, "title" => "Edit User", "title" => "Update User", "utypes" => $user_model->get_user_types(0, 1)]);
            } else {
                return redirect()->to(base_url('loan/user_list'));
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
        if (!
                has_permission("user", "view")) {
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
            return view('_settings/_user_role/_user_role', [
                "title" => "New User Role"]);
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
