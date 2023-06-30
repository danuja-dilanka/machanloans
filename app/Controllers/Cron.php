<?php

namespace App\Controllers;

class Cron extends BaseController {

    public function send_birth_wishes() {
        date_default_timezone_set("Asia/Colombo");

        if (strtotime(date("H:i")) >= strtotime("04:00")) {
            $Member_model = model("Member_model");

            $wishes = [
                "Happy birthday! :-)\nWe hope all your birthday wishes and dreams come true\n\nFrom BodyDoc",
                "Wishing you a very happy birthday :-)\nfilled with endless love and laughter\n\nFrom BodyDoc",
                "Happy birthday! :-)\nHappy, healthy, wonderful birthday to you, dear!\n\nFrom BodyDoc",
                "Happy birthday! :-)\nMay this special day bring you joy, happiness, and precious memories!\n\nFrom BodyDoc",
                "Wishing you a very happy birthday! :-)\nfilled with endless love and laughter\n\nFrom BodyDoc"
            ];

            $birth_todys = $Member_model->get_mem_data_by("birthday LIKE '%" . date("m-d") . "%'");
            foreach ($birth_todys as $birth_tody) {
                $wish = $wishes[array_rand($wishes, 3)[0]];
                if (strlen($birth_tody->mobile) == 9) {
                    $sms_wish = $Member_model->get_sms_wishs_by(["date" => date("Y-m-d"), "mobile" => $birth_tody->mobile]);
                    if (!isset($sms_wish->id)) {
                        send_sms([$birth_tody->mobile], $wish);
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

}
