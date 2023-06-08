<?php

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
        $value->int_rate_per == 1 ? "Loan Group" : "Seettu",
        (has_permission("group_data", "edit") ? "<a href='" . base_url("loan/loan_group/") . $key_enc . "' class='btn btn-sm btn-primary'>Edit</a>&nbsp;" : "") .
        (has_permission("group_data", "delete") ? "<a href='#' data-id='" . base_url("loan/del_group_data/") . $key_enc . "' class='btn btn-sm btn-danger confirm_red_btn'>Delete</a>" : "")
    ];
}

echo json_encode(["data" => $data]);
