<?php

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
