<?php

function get_due_loan_periods($loan_id) {

    $loan_det = model('Loan_model')->get_loan_req_data($loan_id);
    if (!isset($loan_det->id)) {
        die;
    }

    $total = floatval($loan_det->last_amount) + (floatval($loan_det->last_amount) * (floatval($loan_det->lp_int_rate) / 100));
//        if ($loan_det->lp_term_per == 1) {
//            $divisor = $loan_det->payment_method == 1 ? $loan_det->lp_term : floatval($loan_det->lp_term) * 4;
//        } else {
//            $divisor = $loan_det->payment_method == 1 ? $loan_det->lp_term * 12 : floatval($loan_det->lp_term) * 12 * 4;
//        }

    $divisor = $loan_det->lp_term > 0 ? $loan_det->lp_term : 1;
    $charg_per_period = round($total / $divisor, 2);

    $due_dates = [];
    for ($i = 1; $i <= $divisor; $i++) {
        if ($loan_det->loan_rel_date == "") {
            break;
        }

        if ($loan_det->lp_term_per == 1 && $loan_det->payment_method == 1) {
            $monthsToAdd = $i;

            $dateTime = new \DateTime($loan_det->loan_rel_date);
            $dateTime->add(new \DateInterval("P{$monthsToAdd}M"));

            $newDate = $dateTime->format("Y-m-d");
            $due_dates[] = $newDate;
        } else if ($loan_det->lp_term_per == 1 && $loan_det->payment_method == 2) {
            $weeksToAdd = $i * 4;

            $dateTime = new \DateTime($loan_det->loan_rel_date);
            $dateTime->add(new \DateInterval("P{$weeksToAdd}W"));

            $newDate = $dateTime->format("Y-m-d");
            $due_dates[] = $newDate;
        } else if ($loan_det->lp_term_per == 2 && $loan_det->payment_method == 1) {
            $monthsToAdd = $i * 12;

            $dateTime = new \DateTime($loan_det->loan_rel_date);
            $dateTime->add(new \DateInterval("P{$monthsToAdd}M"));

            $newDate = $dateTime->format("Y-m-d");
            $due_dates[] = $newDate;
        } else if ($loan_det->lp_term_per == 2 && $loan_det->payment_method == 2) {
            $weeksToAdd = $i * 12 * 4;

            $dateTime = new \DateTime($loan_det->loan_rel_date);
            $dateTime->add(new \DateInterval("P{$weeksToAdd}W"));

            $newDate = $dateTime->format("Y-m-d");
            $due_dates[] = $newDate;
        }
    }

    return array("due_dates" => $due_dates, "charge" => $charg_per_period);
}
