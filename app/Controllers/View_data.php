<?php

namespace App\Controllers;

class View_data extends BaseController {

    public function __construct() {
        if (!already_logined()) {
            die;
        }
    }

    public function members() {
        if (!has_permission("member", "view")) {
            die;
        }
        
        $data = [
            [
                "",
                "Nixon",
                "System Architect",
                "Edinburgh",
                "25th Apr 11",
                "$320,800"
            ]
        ];

        $result = [
            "draw" => 7,
            "recordsTotal" => 7,
            "recordsFiltered" => 7,
            "data" => $data
        ];

        echo json_encode($result);
    }

}
