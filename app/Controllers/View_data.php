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
                  ' . ("<button type='button' id='tbl_rate_act_" . $key_enc . "' data-des='" . $value->rate_des . "' data-rate='" . $value->rate . "' onclick='open_rating(this)' data-key='" . $key_enc . "' data-type='rating' class='dropdown-item'>Rate</button>") . '
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

        $status = "";

        $filters = $data = [];
        if ($this->request->getGet("filters") != "") {
            $filters = $this->request->getGet("filters");
        }

        foreach ($filters as $filter => $afilter) {
            foreach ($afilter as $filter_key => $filter_val) {

                if ($filter_key == "status") {
                    $status = intval($filter_val[1]);
                }
            }
        }

        $data = [];
        if (decode(session()->ml_user_type) == 2) {
            $loans = model('Loan_model')->get_loan_req_all_data_by(["a.member" => decode(session()->ml_user_rel_id)]);
        } else {
            $loans = model('Loan_model')->get_loan_req_data();
        }

        $today = date('Y-m-d');
        foreach ($loans as $key => $value) {
            if ($status != "") {
                if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $value->loan_rel_date)) {
                    continue;
                }
                $monthsToAdd = (int) ($value->lp_term_per == 1 ? $value->lp_term : $value->lp_term * 12);
                $due_date = date('Y-m-d', strtotime($value->loan_rel_date . " +$monthsToAdd months"));

                if ($status == 0 && (strtotime($due_date)) < strtotime($today)) {
                    //ACTIVE LOANS == !IN ACTIVE
                    continue;
                } elseif ($status == 1 && (strtotime($due_date)) > strtotime($today)) {
                    //INACTIVE LOANS == ! ACTIVE
                    continue;
                } elseif ($status == 2 && ($value->paid_period < $value->loan_period)) {
                    //FINISHED LOANS
                    continue;
                }
            }

            $key_enc = encode($value->id);
            $dropdown = '<div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink' . $key . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink' . $key . '">
                  ' . ("<a target='_blank' class='dropdown-item' href='" . base_url("loan/view_loan/") . $key_enc . "'>View</a>") . '
                  ' . (has_permission("loan", "edit") ? "<a class='dropdown-item' href='" . base_url("loan/loan/") . $key_enc . "'>Edit</a>" : "") . '
                  ' . (has_permission("loan", "edit") ? "<a class='dropdown-item' href='" . base_url("loan/send_repay_shedule/") . $key_enc . "'>Send Repayment Shedule</a>" : "") . '
                  ' . (has_permission("loan", "delete") ? "<a href='#' data-id='" . base_url("loan/del_loan/") . $key_enc . "' class='dropdown-item confirm_red_btn'>Delete</a>" : "") . '
                </div>
              </div>';

            $status_txt = "";
            if ($value->status == 0) {
                $status_txt = "<span class='badge badge-warning'>Pending</span>";
            } else if ($value->status == 1) {
                $status_txt = "<span class='badge badge-success'>Approved</span>";
            } else {
                $status_txt = "<span class='badge badge-danger'>Rejected</span>";
            }

            $data[] = [
                "L-#" . $value->id,
                $value->loan_product,
                $value->full_name != null ? $value->full_name : $value->mem_name,
                "MPL-" . $value->member,
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
                $status_txt = "<span class='badge badge-warning'>Pending</span>";
            } else if ($value->status == 1) {
                $status_txt = "<span class='badge badge-success'>Approved</span>";
            } else {
                $status_txt = "<span class='badge badge-danger'>Rejected</span>";
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
                (($value->status == 0 && has_permission("loan_pay", "edit")) ? "<a href='#' data-id='" . base_url("loan/loan_pay_approve/") . $key_enc . "' class='btn btn-sm btn-primary confirm_red_btn' data-callback='no_callback'>Approve</a>&nbsp;" : "") .
                (($value->status == 0 && has_permission("loan_pay", "edit")) ? "<a href='#' data-id='" . base_url("loan/loan_pay_reject/") . $key_enc . "' class='btn btn-sm btn-warning confirm_red_btn' data-callback='no_callback'>Reject</a>&nbsp;" : "") .
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
                $value->int_rate_per == 1 ? "Monthly" : "Weekly",
                $value->term,
                $value->term_per == 1 ? "Monthly" : "Weekly",
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
        $loans = model('Loan_model')->get_group_data();
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
        $Loan_model = model('Loan_model');
        $loan_pays = $Loan_model->get_loan_pay_data();
        foreach ($loan_pays as $key => $value) {
            $status_txt = "";
            if ($value->status == 0) {
                $status_txt = "<span class='badge badge-warning'>Pending</span>";
            } else if ($value->status == 1) {
                $status_txt = "<span class='badge badge-success'>Approved</span>";
            } else {
                $status_txt = "<span class='badge badge-danger'>Rejected</span>";
            }

            $data[] = [
                "PAY-#" . $value->id,
                $value->pay_date,
                $value->mem_name,
                $value->mem_acc_number,
                $value->total,
                "Debit",
                $status_txt
            ];
        }

        $loan_release = $Loan_model->get_loan_release();
        foreach ($loan_release as $key => $value) {

            $data[] = [
                "LR-#" . $value->id,
                $value->rel_date,
                $value->mem_name,
                $value->mem_acc_number,
                $value->loan_pro_last_amount,
                "Credit",
                "<span class='badge badge-success'>Approved</span>"
            ];
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
                $value->bank_name,
                $value->branch_name,
                $value->acc_number,
                number_format($value->amount, 2, ".", ","),
                $value->start_date,
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

    public function repayments() {
        if (!has_permission("loan", "view")) {
            die;
        }

        $due_date = date("Y-m-d");
        $filters = $data = [];
        if ($this->request->getGet("filters") != "") {
            $filters = $this->request->getGet("filters");
        }

        foreach ($filters as $filter => $afilter) {
            foreach ($afilter as $filter_key => $filter_val) {

                if ($filter_key == "repay_date") {
                    $due_date = trim($filter_val[1]);
                }
            }
        }

        $loan_model = model('Loan_model');
        $data = [];

        $loans = $loan_model->get_loan_req_all_data_by("a.loan_period > a.paid_period");
        $key = 1;
        foreach ($loans as $loan_key => $loan_value) {
            $dates = json_decode($loan_value->shedules);
            for ($i = 0; $i < count($dates); $i++) {
                $already_paid = $loan_model->get_loan_pay_all_data_by("a.loan = " . $loan_value->id . " AND a.due_pay_date = '" . $dates[$i] . "'");
                if ($due_date == $dates[$i] && isset($already_paid->id)) {
                    $data[] = [
                        $key++,
                        $dates[$i],
                        $loan_value->mem_name,
                        "L-#" . $loan_value->id,
                        $loan_value->period_chrg
                    ];
                }
            }
        }

        echo json_encode(["data" => $data]);
    }

    public function due_payments() {

        $due_date = date("Y-m-d");
        $filters = $data = [];
        if ($this->request->getGet("filters") != "") {
            $filters = $this->request->getGet("filters");
        }

        foreach ($filters as $filter => $afilter) {
            foreach ($afilter as $filter_key => $filter_val) {

                if ($filter_key == "repay_date") {
                    $due_date = trim($filter_val[1]);
                }
            }
        }

        $loan_model = model('Loan_model');
        $data = [];

        $loans = $loan_model->get_loan_req_all_data_by("a.loan_period > a.paid_period");
        $key = 1;
        foreach ($loans as $loan_key => $loan_value) {
            $dates = json_decode($loan_value->shedules);
            for ($i = 0; $i < count($dates); $i++) {
                $already_paid = $loan_model->get_loan_pay_all_data_by("a.loan = " . $loan_value->id . " AND a.due_pay_date = '" . $dates[$i] . "'");
                if ($due_date == $dates[$i] && !isset($already_paid->id)) {
                    $data[] = [
                        $key++,
                        $dates[$i],
                        $loan_value->mem_name,
                        "L-#" . $loan_value->id,
                        $loan_value->period_chrg
                    ];
                }
            }
        }

        echo json_encode(["data" => $data]);
    }

    public function net_profit_report() {

        $date_from = $date_to = "";
        $filters = $data = [];
        if ($this->request->getGet("filters") != "") {
            $filters = $this->request->getGet("filters");
        }

        foreach ($filters as $filter => $afilter) {
            foreach ($afilter as $filter_key => $filter_val) {

                if ($filter_key == "date_from" && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $filter_val[1])) {
                    $date_from = trim($filter_val[1]);
                } elseif ($filter_key == "date_to" && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $filter_val[1])) {
                    $date_to = trim($filter_val[1]);
                }
            }
        }

        $loan_model = model('Loan_model');
        $data = [];
        $date_summary = [];

        if ($date_from != "" && $date_to != "") {
            $loan_pays = $loan_model->get_loan_pay_all_data_by("a.pay_date >= '$date_from' AND a.pay_date =< '$date_to'", "SUM(a.total) AS total_amount, pay_date", "a.pay_date");
        } else {
            $loan_pays = $loan_model->get_loan_pay_all_data_by([], "SUM(a.total) AS total_amount, a.pay_date", "a.pay_date");
        }
        foreach ($loan_pays as $key => $lp_value) {
            $date_summary[$lp_value->pay_date] = array(
                "debit" => $lp_value->total_amount
            );
        }

        if ($date_from != "" && $date_to != "") {
            $loan_reles = $loan_model->get_loan_release_by("a.rel_date >= '$date_from' AND a.rel_date =< '$date_to'", "SUM(c.last_amount) AS total_amount, rel_date", "a.rel_date");
        } else {
            $loan_reles = $loan_model->get_loan_release_by([], "SUM(c.last_amount) AS total_amount, a.rel_date", "a.rel_date");
        }
        foreach ($loan_reles as $key => $lr_value) {
            $date_summary[$lr_value->pay_date] = array(
                "credit" => $lr_value->total_amount
            );
        }

        $row = 1;
        $tot_deb = $tot_cre = 0;
        foreach ($date_summary as $key => $value) {
            $tot_deb += $debit = isset($value["debit"]) ? floatval($value["debit"]) : 0;
            $tot_cre += $credit = isset($value["credit"]) ? floatval($value["credit"]) : 0;
            $data[] = [
                $row++,
                $key,
                number_format($debit, 2, ".", ","),
                number_format($credit, 2, ".", ","),
                number_format($debit - $credit, 2, ".", ","),
            ];
        }

        $data[] = [
            $row++,
            "-",
            number_format($tot_deb, 2, ".", ","),
            number_format($tot_cre, 2, ".", ","),
            number_format($tot_deb - $tot_cre, 2, ".", ","),
        ];

        echo json_encode(["data" => $data]);
    }

}
