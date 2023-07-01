<?php

function get_due_loan_periods($loan_id) {

    $loan_det = model('Loan_model')->get_loan_req_data($loan_id);
    if (!isset($loan_det->id)) {
        die;
    }

    $total = floatval($loan_det->last_amount) + (floatval($loan_det->last_amount) * (floatval($loan_det->lp_int_rate) / 100));
    $divisor = $loan_det->lp_term > 0 ? $loan_det->lp_term : 1;
    $charg_per_period = round($total / $divisor, 2);

    $due_dates = [];
    for ($i = 1; $i <= $divisor; $i++) {
        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $loan_det->loan_rel_date)) {
            break;
        }

        if ($loan_det->lp_term_per == 1 && $loan_det->payment_method == 1) {
            $due_dates[] = date('Y-m-d', strtotime($loan_det->loan_rel_date . " +" . ($i) . " months"));
        } else if ($loan_det->lp_term_per == 1 && $loan_det->payment_method == 2) {
            $due_dates[] = date('Y-m-d', strtotime($loan_det->loan_rel_date . " +" . ($i) . " weeks"));
        } else if ($loan_det->lp_term_per == 2 && $loan_det->payment_method == 1) {
            $due_dates[] = date('Y-m-d', strtotime($loan_det->loan_rel_date . " +" . ($i) . " months"));
        } else if ($loan_det->lp_term_per == 2 && $loan_det->payment_method == 2) {
            $due_dates[] = date('Y-m-d', strtotime($loan_det->loan_rel_date . " +" . ($i) . " weeks"));
        }
    }

    return array("due_dates" => $due_dates, "charge" => $charg_per_period);
}
