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

}
