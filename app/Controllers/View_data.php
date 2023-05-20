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
        
        $data = [];
        $members = model('Member_model')->get_mem_data();
        foreach ($members as $key => $value) {
            $key_enc = encode($value->id);
            $data[] = [
                $value->first_name,
                $value->last_name,
                $value->member_no,
                $value->birthday,
                $value->business_name,
                $value->email,
                $value->mobile,
                $value->gender == 1 ? "Male" : "Female",
                $value->city,
                $value->address,
                $value->photo,
                (has_permission("member", "edit") ? "<a href='".base_url("member/mem/").$key_enc."' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "").
                (has_permission("member", "delete") ? "<a href='#' data-id='".base_url("member/del_mem/").$key_enc."' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
            ];
        }

        echo json_encode(["data" => $data]);
    }

}
