<?php

namespace App\Controllers;

class Cron extends BaseController {

    public function send_birth_wishes() {
        date_default_timezone_set("Asia/Colombo");

        if (strtotime(date("H:i")) >= strtotime("04:00")) {
            $Member_model = model("Member_model");

            $wishes = [
                "Happy birthday! :-)\nWe hope all your birthday wishes and dreams come true\n\nFrom Machan",
                "Wishing you a very happy birthday :-)\nfilled with endless love and laughter\n\nFrom Machan",
                "Happy birthday! :-)\nHappy, healthy, wonderful birthday to you, dear!\n\nFrom Machan",
                "Happy birthday! :-)\nMay this special day bring you joy, happiness, and precious memories!\n\nFrom Machan",
                "Wishing you a very happy birthday! :-)\nfilled with endless love and laughter\n\nFrom Machan"
            ];

            $birth_todys = $Member_model->get_mem_data_by("birthday LIKE '%" . date("m-d") . "%'");
            foreach ($birth_todys as $birth_tody) {
                $wish = $wishes[array_rand($wishes, 3)[0]];
                $sms_wish = $Member_model->get_sms_wishs_by("date='" . date("Y-m-d") . "' AND mobile='" . $birth_tody->mobile . "'");
                if (!isset($sms_wish[0]->id)) {
                    $response = send_sms($birth_tody->mobile, $wish);
                    if ($response->message == "success") {
                        $Member_model->add_sms_wish([
                            "date" => date("Y-m-d"),
                            "mobile" => $birth_tody->mobile,
                            "greeeting" => $wish
                        ]);
                        break;
                    }
                }
            }
        }
    }

    public function send_pay_reminder($before_days = 2) {
        date_default_timezone_set("Asia/Colombo");
        $due_date = date('Y-m-d', strtotime(date("Y-m-d") . " +$before_days days"));
        $loan_model = model("Loan_model");

        if (strtotime(date("H:i")) >= strtotime("08:00")) {
            $loans = $loan_model->get_loan_req_all_data_by("a.loan_period > a.paid_period");
            $sms_sent = false;
            foreach ($loans as $loan_key => $loan_value) {
                $dates = json_decode($loan_value->shedules);
                for ($i = 0; $i < count($dates); $i++) {
                    $sent_notify = $loan_model->get_due_pay_notify_by("loan=" . $loan_value->id . " AND date='" . $dates[$i] . "'");
                    if ($due_date == $dates[$i] && !isset($sent_notify->id)) {
                        $response = send_sms($loan_value->mem_phone, "Dear " . $loan_value->mem_name . "!\n\nPlease Pay Your Due Amount LKR. " . $loan_value->period_chrg . " Of Loan, L-#" . $loan_value->id . " On Or Before " . $dates[$i] . ", Otherwise You Will Be Charged LKR. " . $loan_value->late_time_penl);
                        if ($response->message == "success") {
                            $sms_sent = true;
                            $loan_model->add_due_pay_notify([
                                "loan" => $loan_value->id,
                                "date" => $dates[$i],
                                "notify_dt" => date("Y-m-d H:i:s"),
                            ]);
                            break;
                        }
                    }
                }
                if ($sms_sent) {
                    break;
                }
            }
        }
    }

}
