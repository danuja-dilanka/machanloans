<?php

$data = [];
$loans = model('Loan_model')->get_loan_req_data();
foreach ($loans as $key => $value) {
    $status_txt = "";
    if ($value->status == 0) {
        $status_txt = "Pending";
    } else {
        $status_txt = "Approved";
    }

    $key_enc = encode($value->id);
    $data[] = [
        $value->id,
        $value->loan_product,
        $value->full_name,
        $value->mem_no,
        $value->loan_rel_date,
        number_format($value->last_amount, 2, ".", ","),
        $status_txt,
//                (has_permission("loan", "edit") ? "<a href='".base_url("loan/loan/").$key_enc."' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "").
        ($value->status == 0 && has_permission("loan", "edit") ? "<a href='" . base_url("loan/loan_approve/") . $key_enc . "' class='btn btn-sm btn-primary'>Approve</a>&nbsp;" : "") .
        (has_permission("loan", "delete") ? "<a href='#' data-id='" . base_url("loan/del_loan/") . $key_enc . "' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
    ];
}

echo json_encode(["data" => $data]);
