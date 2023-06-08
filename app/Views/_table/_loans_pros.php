<?php

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

