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

    public function loans() {
        if (!has_permission("loan", "view")) {
            die;
        }
        
        $data = [];
        $loans = model('Loan_model')->get_loan_req_data();
        foreach ($loans as $key => $value) {
            $status_txt = "";
            if($value->status == 0){
                $status_txt = "Pending";
            }else{
                $status_txt = "Approved";
            }
            
            $key_enc = encode($value->id);
            $data[] = [
                $value->id,
                $value->loan_product,
                $value->full_name,
                $value->mem_no,
                $value->loan_rel_date,
                $value->last_amount,
                $status_txt,
//                (has_permission("loan", "edit") ? "<a href='".base_url("loan/loan/").$key_enc."' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "").
                ($value->status == 0 && has_permission("loan", "edit") ? "<a href='".base_url("loan/loan_approve/").$key_enc."' class='btn btn-sm btn-primary'>Approve</a>&nbsp;" : "").
                (has_permission("loan", "delete") ? "<a href='#' data-id='".base_url("loan/del_loan/").$key_enc."' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
            ];
        }

        echo json_encode(["data" => $data]);
    }

    public function loans_pay() {
        if (!has_permission("loan", "view")) {
            die;
        }
        
        $data = [];
        $loans = model('Loan_model')->get_loan_pay_data();
        foreach ($loans as $key => $value) {
            $status_txt = "";
            if($value->status == 0){
                $status_txt = "Pending";
            }else{
                $status_txt = "Approved";
            }
            
            $key_enc = encode($value->id);
            $data[] = [
                $key + 1,
                $value->loan_id,
                $value->pay_date,
                $value->last_amount,
                $value->int_rate,
                $value->pen_amount,
                "<a href='".base_url("public/images/loan_req/loan_proof/").$value->loan_proof."' target='_blank'>View</a>",
                $value->total,
                $status_txt,
//                (has_permission("loan", "edit") ? "<a href='".base_url("loan/loan/").$key_enc."' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "").
                (($value->status == 0 && has_permission("loan_pay", "edit")) ? "<a href='".base_url("loan/loan_pay_approve/").$key_enc."' class='btn btn-sm btn-primary'>Approve</a>&nbsp;" : "")
                (has_permission("loan_pay", "delete") ? "<a href='#' data-id='".base_url("loan/del_loan_pay/").$key_enc."' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
            ];
        }

        echo json_encode(["data" => $data]);
    }

}
