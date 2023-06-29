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
            $dropdown = '<div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink' . $key . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink' . $key . '">
                  ' . (has_permission("member", "edit") ? "<a href='" . base_url("member/mem/") . $key_enc . "' class='dropdown-item'>Edit</a>" : "") . '
                  ' . ("<a target='_blank' class='dropdown-item' href='" . base_url("member/view_member/") . $key_enc . "'>View</a>") . '
                  ' . ("<button type='button' id='tbl_rate_act_" . $key_enc . "' data-rate_des='" . $value->rate_des . "' data-rate='" . $value->rate . "' onclick='open_rating(this)' data-key='" . $key_enc . "' data-type='rating' class='dropdown-item'>Rate</button>") . '
                  ' . (has_permission("member", "delete") ? "<a href='#' data-id='" . base_url("member/del_mem/") . $key_enc . "' class='dropdown-item confirm_red_btn'>Delete</a>" : "") . '
                </div>
              </div>';

            $data[] = [
                $value->member_no,
                $value->nic,
                ($value->photo != "" ? "<a href='" . base_url("public/images/member/") . $value->photo . "' target='_blank'><img src='" . base_url("public/images/member/") . $value->photo . "' width='100'/></a>" : "<img src='" . base_url("public/uploads/profile/") . "default.png" . "' width='100'/>") . '&nbsp;<i class="fa fa-solid fa-star"></i>&nbsp;<span id="rate_view_' . $key_enc . '">' . $value->rate . "</span>",
                $value->first_name,
                $value->last_name,
                $value->mobile,
                $value->city,
                $dropdown
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
            $key_enc = encode($value->id);
            $dropdown = '<div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink' . $key . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink' . $key . '">
                  ' . ("<a target='_blank' class='dropdown-item' href='" . base_url("loan/view_loan/") . $key_enc . "'>View</a>") . '
                  ' . (has_permission("loan", "edit") ? "<a class='dropdown-item' href='" . base_url("loan/loan/") . $key_enc . "'>Edit</a>" : "") . '
                  ' . (has_permission("loan", "delete") ? "<a href='#' data-id='" . base_url("loan/del_loan/") . $key_enc . "' class='dropdown-item confirm_red_btn'>Delete</a>" : "") . '
                </div>
              </div>';

            $status_txt = "";
            if ($value->status == 0) {
                $status_txt = "<span class='badge badge-warning'>Pending</span>";
            } else {
                $status_txt = "<span class='badge badge-success'>Approved</span>";
            }

            $data[] = [
                $value->id,
                $value->loan_product,
                $value->full_name != null ? $value->full_name : $value->mem_name,
                "MPL-" . $value->mem_no,
                $value->loan_rel_date,
                number_format($value->last_amount, 2, ".", ","),
                $status_txt,
                $dropdown
            ];
        }

        echo json_encode(["data" => $data]);
    }

    public function loans_pay() {
        if (!has_permission("loan_pay", "view")) {
            die;
        }

        $data = [];
        $loans = model('Loan_model')->get_loan_pay_data();
        foreach ($loans as $key => $value) {
            $status_txt = "";
            if ($value->status == 0) {
                $status_txt = "Pending";
            } else {
                $status_txt = "Approved";
            }

            $key_enc = encode($value->id);
            $data[] = [
                $key + 1,
                $value->loan_id,
                $value->pay_date,
                number_format($value->last_amount, 2, ".", ","),
                $value->int_rate,
                number_format($value->pen_amount, 2, ".", ","),
                "<a href='" . base_url() . "public/images/loan_req/loan_proof/" . $value->loan_proof . "' target='_blank'>View</a>",
                number_format($value->total, 2, ".", ","),
                $status_txt,
//                (has_permission("loan_pay", "edit") ? "<a href='".base_url("loan/loan/").$key_enc."' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "").
                (($value->status == 0 && has_permission("loan_pay", "edit")) ? "<a href='" . base_url("loan/loan_pay_approve/") . $key_enc . "' class='btn btn-sm btn-primary'>Approve</a>&nbsp;" : "") .
                (has_permission("loan_pay", "delete") ? "<a href='#' data-id='" . base_url("loan/del_loan_pay/") . $key_enc . "' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
            ];
        }

        echo json_encode(["data" => $data]);
    }

    public function loans_pros() {
        if (!has_permission("loan_pro", "view")) {
            die;
        }

        $data = [];
        $loans = model('Loan_model')->get_pro_data();
        foreach ($loans as $key => $value) {

            $key_enc = encode($value->id);
            $data[] = [
                $key + 1,
                $value->loan_name,
                number_format($value->last_amount, 2, ".", ","),
                $value->int_rate,
                $value->int_rate_per == 1 ? "Monthly" : "Yearly",
                $value->term,
                $value->term_per == 1 ? "Monthly" : "Yearly",
                $value->late_time_penl,
                $value->status == 1 ? "Active" : "Inactive",
                $value->description,
                (has_permission("loan_pro", "edit") ? "<a href='" . base_url("loan/loan_pro/") . $key_enc . "' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "") .
                (has_permission("loan_pro", "delete") ? "<a href='#' data-id='" . base_url("loan/del_loan_pro/") . $key_enc . "' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
            ];
        }

        echo json_encode(["data" => $data]);
    }

    public function loan_groups() {
        if (!has_permission("group_data", "view")) {
            die;
        }

        $data = [];
        $loans = model('Loan_model')->get_grp_mem_data();
        foreach ($loans as $key => $value) {
            $members = model('Loan_model')->get_grp_members_by_group($value->id);
            $mem_txt = "";
            foreach ($members as $m_key => $m_value) {
                $mem_txt .= $m_value->member_name . "<br>";
            }

            $key_enc = encode($value->id);
            $data[] = [
                $key + 1,
                $value->group_name,
                $value->member_limit,
                $mem_txt,
                $value->group_type == 1 ? "Loan Group" : "Seettu",
                (has_permission("group_data", "edit") ? "<a href='" . base_url("loan/loan_group/") . $key_enc . "' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "") .
                (has_permission("group_data", "delete") ? "<a href='#' data-id='" . base_url("loan/del_group_data/") . $key_enc . "' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
            ];
        }

        echo json_encode(["data" => $data]);
    }

    public function transactions() {
        if (!has_permission("report_transactions", "view")) {
            die;
        }

        $data = [];
        $loan_pays = model('Loan_model')->get_loan_pay_data();
        foreach ($loan_pays as $key => $value) {
            
        }

        echo json_encode(["data" => $data]);
    }

    public function invest_acc() {
        if (!has_permission("report_invest_acc", "view")) {
            die;
        }

        $data = [];
        $invest_accs = model('Investment_model')->get_invest_acc_data();
        foreach ($invest_accs as $key => $value) {
            $key_enc = encode($value->id);
            $data[] = [
                $key + 1,
                $value->investor_name,
                $value->address,
                $value->birthday,
                $value->invest_time == 1 ? "Monthly" : "",
                $value->phone,
                $value->profit_perc . "%",
                $value->status == 1 ? "Active" : "Inactive",
                $value->bank_det,
                (has_permission("invest_acc", "edit") ? "<a href='" . base_url("investment/invest_acc/") . $key_enc . "' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "") .
                (has_permission("invest_acc", "delete") ? "<a href='#' data-id='" . base_url("investment/del_invest_acc/") . $key_enc . "' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
            ];
        }

        echo json_encode(["data" => $data]);
    }

    //USER LIST
    public function users() {
        if (!has_permission("user", "view")) {
            die;
        }

        $data = [];
        $users = model('User_model')->get_data();
        foreach ($users as $key => $value) {
            $key_enc = encode($value->id);
            $data[] = [
                $key + 1,
                $value->name,
                $value->email,
                $value->utype_name,
                $value->status == 1 ? "Active" : "Inactive",
                (has_permission("user", "edit") ? "<a href='" . base_url("setting/user/") . $key_enc . "' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "") .
                (has_permission("user", "delete") && $value->utype_name != "admin" ? "<a href='#' data-id='" . base_url("setting/del_user/") . $key_enc . "' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
            ];
        }

        echo json_encode(["data" => $data]);
    }

    //USER ROLES LIST
    public function user_roles() {
        if (!has_permission("user_role", "view")) {
            die;
        }

        $data = [];
        $users = model('User_model')->get_user_types();
        foreach ($users as $key => $value) {
            $key_enc = encode($value->id);
            $data[] = [
                $key + 1,
                $value->utype,
                $value->description,
                $value->status == 1 ? "Active" : "Inactive",
                (has_permission("user_role", "edit") ? "<a href='" . base_url("setting/user_role/") . $key_enc . "' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "")
//                (has_permission("user_role", "delete") ? "<a href='#' data-id='" . base_url("setting/del_user_role/") . $key_enc . "' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
            ];
        }

        echo json_encode(["data" => $data]);
    }

}
