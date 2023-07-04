<?php

namespace App\Controllers;

use App\Libraries\PluploadHandler;

class API extends BaseController {

    public function users() {
        $data = [];
        if ($this->request->is('post')) {
            $search = "";
            if ($this->request->getPost("search") != "") {
                $search = $this->request->getPost("search");
            }

            $results = model('Auth_model')->get_users_by("a.name LIKE '$search%'");
            foreach ($results as $result) {
                $data[] = [
                    "id" => $result->id,
                    "text" => $result->name
                ];
            }
        }
        echo json_encode(["items" => $data], true);
    }

    public function members() {
        $data = [];
        if ($this->request->is('post')) {
            $search = "";
            if ($this->request->getPost("search") != "") {
                $search = $this->request->getPost("search");
            }

            $results = model('Member_model')->get_mem_data_by("first_name LIKE '$search%' OR last_name LIKE '$search%' OR member_no LIKE '$search%'");
            foreach ($results as $result) {
                $data[] = [
                    "id" => $result->id,
                    "text" => "(" . $result->member_no . ") " . $result->first_name . " " . $result->last_name
                ];
            }
        }
        echo json_encode(["items" => $data], true);
    }

    public function user_types() {
        $data = [];
        if ($this->request->is('post')) {
            $search = "";
            if ($this->request->getPost("search") != "") {
                $search = $this->request->getPost("search");
            }

            $results = model('Auth_model')->get_user_types_by("utype LIKE '$search%'");
            foreach ($results as $result) {
                $data[] = [
                    "id" => $result->id,
                    "text" => $result->utype
                ];
            }
        }
        echo json_encode(["items" => $data], true);
    }

    public function set_mod_access() {
        $status = 0;

        $rules = ['id', 'access_type', 'user', 'user_type', 'status', 'module', 'action'];

//        $valid = true;
//        foreach ($rules as $key => $value) {
//            if ($this->request->getPost($value) == "") {
//                $valid = false;
//                break;
//            }
//        }

        if ($this->request->is('post') && has_permission("settings", "edit")) {
            $data = $this->request->getPost();
            $auth = model('Auth_model');
            $setting = model('Setting_model');

            $id = intval($data["id"]);
            $access_type = intval($data["access_type"]);
            $user = intval($data["user"]);
            $user_type = intval($data["user_type"]);
            $module = trim($data["module"]);
            $action = trim($data["action"]);
            $status = intval($data["status"]);

            //USER WISE ACCESS
            if ($access_type == 1) {
                //MODULE ACTION IS SELECTED
                if ($module != "all") {

                    //CHECK ALREADY HAVE PERMISSION
                    $row = $auth->get_user_access($user, $module, $action, 1);
                    if (!isset($row->id)) {
                        $insert = $auth->add_user_access([
                            "user" => $user,
                            "module" => $id
                        ]);

                        if ($insert > 0) {
                            $status = 1;
                        }
                    } else {
                        $result = $auth->update_user_access(["status" => $status ? 1 : 0], $row->id);
                        if ($result) {
                            $status = 1;
                        }
                    }
                } else {
                    $actions = $setting->get_module_action_by(["module" => $id]);
                    foreach ($actions as $key => $value) {
                        //CHECK ALREADY HAVE PERMISSION
                        $row = $auth->get_user_access($user, $module, $value->action, 1);
                        if (!isset($row->id)) {
                            $insert = $auth->add_user_access([
                                "user" => $user,
                                "module" => $id
                            ]);

                            if ($insert > 0) {
                                $status = 1;
                            }
                        } else {
                            $result = $auth->update_user_access(["status" => $status ? 1 : 0], $row->id);
                            if ($result) {
                                $status = 1;
                            }
                        }
                    }
                }
            }

            //USER TYPE WISE ACCESS
            elseif ($access_type == 2) {
                //MODULE ACTION IS SELECTED
                if ($module != "all") {

                    //CHECK ALREADY HAVE PERMISSION
                    $row = $auth->get_utype_access($user_type, $module, $action, 1);
                    if (!isset($row->id)) {
                        $insert = $auth->add_user_type_access([
                            "utype" => $user_type,
                            "module" => $id
                        ]);

                        if ($insert > 0) {
                            $status = 1;
                        }
                    } else {
                        $result = $auth->update_user_type_access(["status" => $status ? 1 : 0], $row->id);
                        if ($result) {
                            $status = 1;
                        }
                    }
                } else {
                    $actions = $setting->get_module_action_by(["module" => $id]);
                    foreach ($actions as $key => $value) {
                        //CHECK ALREADY HAVE PERMISSION
                        $row = $auth->get_utype_access($user_type, $module, $value->action, 1);
                        if (!isset($row->id)) {
                            $insert = $auth->add_user_type_access([
                                "user" => $user,
                                "module" => $id
                            ]);

                            if ($insert > 0) {
                                $status = 1;
                            }
                        } else {
                            $result = $auth->update_user_type_access(["status" => $status ? 1 : 0], $row->id);
                            if ($result) {
                                $status = 1;
                            }
                        }
                    }
                }
            }
        }

        echo $status;
    }

    public function get_due_loan_periods() {

        if ($this->request->is('post') && (has_permission("loan_pay", "edit") || has_permission("loan_pay", "add"))) {
            $data = $this->request->getPost();
            $loan_id = intval($data["loan"]);
            $view = intval($data["view"]);

            $results = get_due_loan_periods($loan_id);
            $charg_per_period = $results["charge"];
            $due_dates = $results["due_dates"];

            if ($view > 0) {
                foreach ($due_dates as $key => $value) {
                    ?>
                    <option value="<?= ($key + 1) . "__" . number_format($charg_per_period, 2, ".", "") ?>"><?= $value ?></option>
                    <?php
                }
            } else {
                echo json_encode(array("due_dates" => $due_dates, "charge" => $charg_per_period));
            }
        }
    }

    public function upload($path) {
        $up_path = 'public/images/' . str_replace("__", "/", $path);

        $ph = new PluploadHandler(array(
            'target_dir' => $up_path,
            'allow_extensions' => 'jpg,jpeg,png'
        ));

        $ph->sendNoCacheHeaders();
        $ph->sendCORSHeaders();

        if ($result = $ph->handleUpload()) {
            die(json_encode(array(
                'OK' => 1,
                'info' => $result
            )));
        } else {
            die(json_encode(array(
                'OK' => 0,
                'error' => array(
                    'code' => $ph->getErrorCode(),
                    'message' => $ph->getErrorMessage()
                )
            )));
        }
    }

    public function remove_file() {
        $status = 0;
        if ($this->request->is('post')) {
            $data = $this->request->getPost();
            if (isset($data["src"]) && isset($data["type"])) {
                $del_path = "public/images/" . str_replace("__", "/", $data["src"]);
                if (del_file($del_path)) {
                    $status = 1;
                }
            }
        }

        echo $status;
    }

    public function get_summary() {
        $data = [];
        if (already_logined() && has_permission("dashboard", "view")) {
            $common_model = model("Common_model");
            $data["total_withdraw_request"] = $common_model->get_data("SELECT COUNT(id) AS total_withdraw_request FROM `" . DB_PREFIX . "loan_request` WHERE `loan_rel_date` IS NULL")->total_withdraw_request;
            $data["total_members"] = $common_model->get_data("SELECT COUNT(id) AS total_members FROM `" . DB_PREFIX . "member`")->total_members;
            $data["deposit_request"] = $common_model->get_data("SELECT COUNT(id) AS deposit_request FROM `" . DB_PREFIX . "loan_request` WHERE `loan_rel_date` IS NOT NULL AND `loan_period` > `paid_period`")->deposit_request;
            $data["total_pending_loans"] = $common_model->get_data("SELECT COUNT(id) AS total_pending_loans FROM `" . DB_PREFIX . "loan_request` WHERE `status` = 0")->total_pending_loans;
        }

        echo json_encode($data);
    }

    public function send_sms() {
        $status = 0;
        if (already_logined()) {
            $data = $this->request->getGet();
            if (isset($data["user"]) && isset($data["message"])) {
                $user = model("Member_model")->get_data(decode($data["user"]));
                if (isset($user->mobile)) {
                    $response = send_sms($user->mobile, trim($data["message"]));
                    if (strtolower($response->message) == "success") {
                        $status = 1;
                    }
                }
            }
        }

        echo $status;
    }

    public function send_email() {
        $status = 0;
        if (already_logined()) {
            $data = $this->request->getGet();
            if (isset($data["user"]) && isset($data["subject"]) && isset($data["message"])) {
                $user = model("Member_model")->get_data(decode($data["user"]));
                if (isset($user->email) && filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                    $response = send_email($user->email, trim($data["subject"]), trim($data["message"]));
                    if ($response) {
                        $status = 1;
                    }
                }
            }
        }

        echo $status;
    }

    public function set_mem_rate() {
        $status = 0;
        if (already_logined()) {
            $data = $this->request->getPost();
            if (isset($data["user"]) && isset($data["rate"]) && isset($data["description"])) {
                $user_id = decode($data["user"]);
                $Member_model = model("Member_model");
                $user = $Member_model->get_data($user_id);
                if (isset($user->id)) {
                    $response = $Member_model->update_data(["rate" => intval($data["rate"]), "rate_des" => trim($data["description"]), "rate_dt" => date("Y-m-d H:i:s")], $user_id);
                    if ($response) {
                        $status = 1;
                    }
                }
            }
        }

        echo $status;
    }

    public function get_loan_pay_mode() {

        if ($this->request->is('post')) {
            $data = $this->request->getPost();
            if (isset($data["product"])) {
                $loan_product = model("Loan_model")->get_pro_data($data["product"]);
                if (isset($loan_product->id)) {
                    echo $loan_product->term_per;
                }
            }
        }
    }

    public function json_deposit_withdraw_analytics() {

        $deposit = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $withdraw = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        if ($this->request->is('post') && already_logined()) {
            $Common_model = model("Common_model");
            for ($i = 1; $i <= 12; $i++) {
                $deposit[$i - 1] += floatval($Common_model->get_data("SELECT SUM(repay_amount) AS tot_repay_amount FROM `" . DB_PREFIX . "loan_pay` WHERE `pay_date` LIKE '%-" . sprintf('%02d', $i) . "%-'")->tot_repay_amount);
                $withdraw[$i - 1] += floatval($Common_model->get_data("SELECT SUM(c.last_amount) AS tot_last_amount FROM `" . DB_PREFIX . "loan_release` a INNER JOIN `" . DB_PREFIX . "loan_request` b ON a.loan = b.id INNER JOIN `" . DB_PREFIX . "loan_product` c ON b.loan_type = c.id WHERE a.rel_date LIKE '%-" . sprintf('%02d', $i) . "-%'")->tot_last_amount);
            }
        }

        echo json_encode(["deposit" => $deposit, "withdraw" => $withdraw, "month" => $month]);
    }

    public function json_expense_by_category() {

        $colors = ["#FF0000"];
        $amounts = [0];
        $category = ['Withdraw'];

        if ($this->request->is('post') && already_logined()) {
            $Common_model = model("Common_model");
            for ($i = 1; $i <= count($category); $i++) {
                $amounts[$i - 1] = floatval($Common_model->get_data("SELECT SUM(c.last_amount) AS tot_last_amount FROM `" . DB_PREFIX . "loan_release` a INNER JOIN `" . DB_PREFIX . "loan_request` b ON a.loan = b.id INNER JOIN `" . DB_PREFIX . "loan_product` c ON b.loan_type = c.id")->tot_last_amount);
            }
        }

        echo json_encode(["category" => $category, "amounts" => $amounts, "colors" => $colors]);
    }

    public function update_sms_template() {
        $status = 0;
        if (already_logined()) {
            $data = $this->request->getPost();
            if (isset($data["sms_template"]) && isset($data["template_id"])) {
                $template_id = decode($data["template_id"]);
                $Setting_model = model("Setting_model");
                $template = $Setting_model->get_sms_template_by(["id" => $template_id]);
                if (isset($template->id)) {
                    $response = $Setting_model->update_sms_template(["template" => $data["sms_template"]], $template_id);
                    if ($response) {
                        $status = 1;
                    }
                }
            }
        }

        echo $status;
    }

}