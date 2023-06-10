<?php

namespace App\Controllers;

class API extends BaseController {

    public function __construct() {

        if (!already_logined()) {
            return redirect()->route('login');
        }
    }

    public function users() {
        $data = [];
        if ($this->request->is('post')) {
            $search = "";
            if ($this->request->getPost("search") != "") {
                $search = $this->request->getPost("search");
            }

            $results = model('Auth_model')->get_users_by("a.name LIKE '$search%'");
            foreach ($results as $result) {
                $data[] = [
                    "id" => $result->id,
                    "text" => $result->name
                ];
            }
        }
        echo json_encode(["items" => $data], true);
    }

    public function user_types() {
        $data = [];
        if ($this->request->is('post')) {
            $search = "";
            if ($this->request->getPost("search") != "") {
                $search = $this->request->getPost("search");
            }

            $results = model('Auth_model')->get_user_types_by("utype LIKE '$search%'");
            foreach ($results as $result) {
                $data[] = [
                    "id" => $result->id,
                    "text" => $result->utype
                ];
            }
        }
        echo json_encode(["items" => $data], true);
    }

    public function set_mod_access() {
        $status = 0;

        $rules = ['id', 'access_type', 'user', 'user_type', 'status', 'module', 'action'];

//        $valid = true;
//        foreach ($rules as $key => $value) {
//            if ($this->request->getPost($value) == "") {
//                $valid = false;
//                break;
//            }
//        }

        if ($this->request->is('post') && has_permission("settings", "edit")) {
            $data = $this->request->getPost();
            $auth = model('Auth_model');
            $setting = model('Setting_model');

            $id = intval($data["id"]);
            $access_type = intval($data["access_type"]);
            $user = intval($data["user"]);
            $user_type = intval($data["user_type"]);
            $module = trim($data["module"]);
            $action = trim($data["action"]);
            $status = intval($data["status"]);

            //USER WISE ACCESS
            if ($access_type == 1) {
                //MODULE ACTION IS SELECTED
                if ($module != "all") {

                    //CHECK ALREADY HAVE PERMISSION
                    $row = $auth->get_user_access($user, $module, $action);
                    if (!isset($row->id)) {
                        $insert = $auth->add_user_access([
                            "user" => $user,
                            "module" => $id
                        ]);

                        if ($insert > 0) {
                            $status = 1;
                        }
                    } else {
                        $result = $auth->update_user_access(["status" => $status ? 1 : 0], $row->id);
                        if ($result) {
                            $status = 1;
                        }
                    }
                } else {
                    $actions = $setting->get_module_action_by(["module" => $id]);
                    foreach ($actions as $key => $value) {
                        //CHECK ALREADY HAVE PERMISSION
                        $row = $auth->get_user_access($user, $module, $value->action);
                        if (!isset($row->id)) {
                            $insert = $auth->add_user_access([
                                "user" => $user,
                                "module" => $id
                            ]);

                            if ($insert > 0) {
                                $status = 1;
                            }
                        } else {
                            $result = $auth->update_user_access(["status" => $status ? 1 : 0], $row->id);
                            if ($result) {
                                $status = 1;
                            }
                        }
                    }
                }
            }

            //USER TYPE WISE ACCESS
            elseif ($access_type == 2) {
                //MODULE ACTION IS SELECTED
                if ($module != "all") {

                    //CHECK ALREADY HAVE PERMISSION
                    $row = $auth->get_utype_access($user_type, $module, $action);
                    if (!isset($row->id)) {
                        $insert = $auth->add_user_type_access([
                            "utype" => $user_type,
                            "module" => $id
                        ]);

                        if ($insert > 0) {
                            $status = 1;
                        }
                    } else {
                        $result = $auth->update_user_type_access(["status" => $status ? 1 : 0], $row->id);
                        if ($result) {
                            $status = 1;
                        }
                    }
                } else {
                    $actions = $setting->get_module_action_by(["module" => $id]);
                    foreach ($actions as $key => $value) {
                        //CHECK ALREADY HAVE PERMISSION
                        $row = $auth->get_utype_access($user_type, $module, $value->action);
                        if (!isset($row->id)) {
                            $insert = $auth->add_user_type_access([
                                "user" => $user,
                                "module" => $id
                            ]);

                            if ($insert > 0) {
                                $status = 1;
                            }
                        } else {
                            $result = $auth->update_user_type_access(["status" => $status ? 1 : 0], $row->id);
                            if ($result) {
                                $status = 1;
                            }
                        }
                    }
                }
            }
        }

        echo $status;
    }

}
