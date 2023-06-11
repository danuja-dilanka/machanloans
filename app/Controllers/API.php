<?php

namespace App\Controllers;

class API extends BaseController {

    public function __construct() {

        if (!already_logined()) {
            return redirect()->route('login');
        }
    }

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
            $loan_det = model("Loan_model")->get_loan_req_data($loan_id);
            if (!isset($loan_det->id)) {
                die;
            }

            $total = floatval($loan_det->last_amount) + (floatval($loan_det->last_amount) * (floatval($loan_det->lp_int_rate) / 100));
            if ($loan_det->lp_term_per == 1) {
                $divisor = $loan_det->payment_method == 1 ? $loan_det->lp_term : floatval($loan_det->lp_term) * 4;
            } else {
                $divisor = $loan_det->payment_method == 1 ? $loan_det->lp_term * 12 : floatval($loan_det->lp_term) * 12 * 4;
            }

            $divisor = $divisor > 0 ? $divisor : 1;
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

}
