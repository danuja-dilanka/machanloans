<?php

namespace App\Controllers;

class Loan extends BaseController {

    private $thisModel;

    public function __construct() {

        if (!already_logined()) {
            return redirect()->route('login');
        }

        $this->thisModel = model('Loan_model');
    }

    //REDIRECT TO LIST VIEW
    public function index() {
        if (!has_permission("loan_pro", "view")) {
            return redirect()->to(base_url('dashboard'));
        }
        return redirect()->route('loan/loan_pro_list');
    }

    //CREATE/ UPDATE VIEW
    public function loan_pro($req_id = "") {
        $rules = [
            'loan_name' => 'required',
            'last_amount' => 'required',
            'int_rate' => 'required',
            'int_rate_per' => 'required|numeric',
            'term_per' => 'required|numeric',
            'late_time_penl' => 'required',
            'status' => 'required|numeric',
            'description' => 'required',
            'term' => 'required'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();

            if ($req_id != "" && has_permission("loan_pro", "edit")) {
                $data = $this->thisModel->get_pro_data(decode($req_id));
                if (isset($data->id)) {
                    $result = $this->thisModel->update_pro_data($post_data, $data->id);
                    if ($result) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('loan/loan_pro/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('loan/loan_pro'));
                }
            } else if (has_permission("loan_pro", "add")) {
                $insert_id = $this->thisModel->add_pro_data($post_data);
                if ($insert_id > 0) {
                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('loan/loan_pro') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('loan/loan_pro'));
                }
            }
        }

        if ($req_id != "" && has_permission("loan_pro", "edit")) {
            $data = $this->thisModel->get_pro_data(decode($req_id));
            if (isset($data->id)) {
                return view('_loan/_loan_product/_loan_pro', ["data" => $data, "title" => "Update Loan Product"]);
            } else {
                return redirect()->to(base_url('loan/loan_pro'));
            }
        } else if (has_permission("loan_pro", "add")) {
            return view('_loan/_loan_product/_loan_pro', ["title" => "New Loan Product"]);
        } else {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
    }

    //DELETE LOAN PRODUCT
    public function del_loan_pro($req_id = "") {

        if ($req_id != "" && has_permission("loan_pro", "delete")) {
            $data = $this->thisModel->get_pro_data(decode($req_id));
            if (isset($data->id)) {
                $result = $this->thisModel->delete_pro_data($data->id);
                if ($result) {
                    session()->setFlashdata('notify', 'Successfully Deleted');
                }
            }
        }

        return redirect()->to(base_url('loan/loan_pro_list'));
    }

    //LIST VIEW
    public function loan_pro_list() {
        if (!has_permission("loan_pro", "view")) {
            return redirect()->to(base_url('dashboard'));
        }
        return view('_loan/_loan_product/_list', ["title" => "Loan Products"]);
    }

    //CREATE/ UPDATE VIEW GROUP
    public function loan_group($req_id = "") {
        $rules = [
            'group_name' => 'required',
            'member_limit' => 'required',
            'group_type' => 'required',
            'members' => 'required'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();
            $members = $post_data["members"];
            unset($post_data["members"]);

            if ($req_id != "" && has_permission("group_data", "edit")) {
                $data = $this->thisModel->get_group_data(decode($req_id));
                if (isset($data->id)) {
                    $result = $this->thisModel->update_group_data($post_data, $data->id);
                    if ($result) {
                        $this->thisModel->delete_grp_mem_data(0, ["group" => $data->id]);
                        foreach ($members as $key => $value) {
                            $this->thisModel->add_grp_mem_data(["group" => $data->id, "member" => $value]);
                        }
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('loan/loan_group/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('loan/loan_group'));
                }
            } else if (has_permission("group_data", "add")) {
                $insert_id = $this->thisModel->add_group_data($post_data);
                if ($insert_id > 0) {
                    foreach ($members as $key => $value) {
                        $this->thisModel->add_grp_mem_data(["group" => $insert_id, "member" => $value]);
                    }
                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('loan/loan_group') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('loan/loan_group'));
                }
            }
        }

        if ($req_id != "" && has_permission("group_data", "edit")) {
            $data = $this->thisModel->get_group_data(decode($req_id));
            if (isset($data->id)) {
                return view('_loan/_loan_group/_loan_grp', ["data" => $data, "group_members" => $this->thisModel->get_grp_members_by_group($data->id), "title" => "Update Loan Group"]);
            } else {
                return redirect()->to(base_url('loan/loan_group'));
            }
        } else if (has_permission("group_data", "add")) {
            return view('_loan/_loan_group/_loan_grp', ["title" => "New Loan Group"]);
        } else {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
    }

    //DELETE GROUP DATA
    public function del_group_data($req_id = "") {

        if ($req_id != "" && has_permission("group_data", "delete")) {
            $data = $this->thisModel->get_group_data(decode($req_id));
            if (isset($data->id)) {
                $result = $this->thisModel->delete_group_data($data->id);
                if ($result) {
                    session()->setFlashdata('notify', 'Successfully Deleted');
                }
            }
        }

        return redirect()->to(base_url('loan/loan_group_list'));
    }

    //LIST VIEW GROUP
    public function loan_group_list() {
        if (!has_permission("group_data", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('_loan/_loan_group/_list', ["title" => "Loan Groups"]);
    }

    //GET LOAN DUE PERIODS
    private function get_due_loan_periods($loan_id) {

        return get_due_loan_periods($loan_id);
    }

    //LOAN VIEW
    public function view_loan($req_id) {
        if (!has_permission("loan", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        $loan = decode($req_id);
        $data = $this->thisModel->get_loan_req_data($loan);
        if (isset($data->id)) {
            return view('_loan/_loan_applications/_view', ["data" => $data, "req_id" => $req_id, "pay_periods" => $this->get_due_loan_periods($loan)]);
        } else {
            return redirect()->to(base_url('loan/loan'));
        }
    }

    //LOAN REPAYMNET SHEDULE VIEW
    public function public_repay_shedule_view($req_id) {

        $loan = decode($req_id);
        $data = model('Loan_model')->get_loan_req_data($loan);
        if (isset($data->id)) {
            return view('_loan/_loan_applications/_repay_shd_view', ["data" => $data, "pay_periods" => $this->get_due_loan_periods($loan)]);
        } else {
            return redirect()->to(base_url());
        }
    }

    //SEND LOAN REPAYMNET SHEDULE 
    public function send_repay_shedule($req_id) {
        if (!has_permission("loan", "edit")) {
            return;
        }

        $loan = decode($req_id);
        $data = $this->thisModel->get_loan_req_data($loan);
        if (isset($data->id) && $data->mem_phone != "") {
            $url = base_url("repay_shdule/") . $req_id;
            $response = send_sms($data->mem_phone, "Dear " . $data->mem_name . "!\n\nYou Can View Your Loan (L-#" . $data->id . ") Repayment Shedule Here,\n\n" . $url);
            if (isset($response->message) && $response->message == "success") {
                session()->setFlashdata('notify', 'SMS Sent!');
            }
            return redirect()->to(base_url('loan/loan_list'));
        }
    }

    //SEND LOAN RELEASE CONFIRM
    public function loan_confirm_relase($req_id) {
        if (!has_permission("loan", "edit")) {
            return redirect()->to(base_url('loan/loan_list'));
        }

        $loan = decode($req_id);
        $data = $this->thisModel->get_loan_req_data($loan);
        if (isset($data->id) && !preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $data->loan_rel_date)) {
            $rel_date = date("Y-m-d");
            $result = $this->thisModel->update_loan_req_data(["loan_rel_date" => $rel_date], $data->id);
            if ($result) {
                $loan_periods = $this->get_due_loan_periods($data->id);
                $up_data["loan_period"] = $data->lp_term;
                $up_data["shedules"] = json_encode($loan_periods["due_dates"]);
                $up_data["period_chrg"] = $loan_periods["charge"];
                $result = $this->thisModel->update_loan_req_data($up_data, $data->id);
                if ($result) {
                    $this->thisModel->add_loan_release([
                        "loan" => $loan,
                        "rel_date" => $rel_date,
                        "confirm_by" => decode(session()->ml_user)
                    ]);

                    make_and_send_sms("money_transfer", ["{{amount}}" => "LKR. " . $data->last_amount, "{{date}}" => $rel_date, "{{name}}" => $data->mem_name], $data->mem_phone);
                    session()->setFlashdata('notify', 'Successfully Confirmed');
                }
            }
        }

        return redirect()->to(base_url('loan/view_loan/') . $req_id);
    }

    //NEW LOAN VIEW
    public function new_loan() {
        if (!has_permission("loan", "add")) {
            return redirect()->to(base_url('dashboard'));
        }

        if (decode(session()->ml_user_type) == 1) {
            $rules = [
                'member' => 'required'
            ];

            if ($this->request->is('post') && $this->validate($rules)) {
                return redirect()->to(base_url('loan/loan') . "?b=" . encode($this->request->getPost('member')));
            } else {
                return view('_loan/_loan_applications/_loan_for', ["title" => "New Loan | Select Member"]);
            }
        } else {
            return redirect()->to(base_url('loan/loan') . "?b=" . session()->ml_user_rel_id);
        }
    }

    //CREATE/ UPDATE VIEW LOAN
    public function loan($req_id = "") {
        $rules = [
            'member' => 'required',
            'loan_type' => 'required'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();
            $member_enc = $post_data["member"];
            $post_data["member"] = decode($member_enc);

            $loan_pro_det = $this->thisModel->get_pro_data($post_data["loan_type"]);
            if (!isset($loan_pro_det->id)) {
                return redirect()->to(base_url('loan/loan_list'));
            }

            $post_data["payment_method"] = $loan_pro_det->term_per;

            if ($req_id != "" && has_permission("loan", "edit")) {
                $data = $this->thisModel->get_loan_req_data(decode($req_id));
                if (isset($data->id)) {
                    $loan_periods = $this->get_due_loan_periods($data->id);
                    $post_data["shedules"] = json_encode($loan_periods["due_dates"]);
                    $post_data["loan_period"] = count($loan_periods);
                    $post_data["period_chrg"] = $loan_periods["charge"];

                    $result = $this->thisModel->update_loan_req_data($post_data, $data->id);
                    if ($result) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('loan/loan/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('loan/loan_list'));
                }
            } else if (has_permission("loan", "add")) {
                $insert_id = $this->thisModel->add_loan_req_data($post_data);
                if ($insert_id > 0) {
//                    $loan_periods = $this->get_due_loan_periods($data->id);
//                    $this->thisModel->update_loan_req_data(["shedules" => json_encode($loan_periods["due_dates"]), "loan_period" => count($loan_periods), "period_chrg" => $loan_periods["charge"]], $insert_id);
                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('loan/loan') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('loan/loan') . "?b=" . $member_enc);
                }
            }
        }

        if ($req_id != "" && has_permission("loan", "edit")) {
            $data = $this->thisModel->get_loan_req_data(decode($req_id));
            if (isset($data->id)) {
                $member = model("Member_model")->get_mem_data($data->member);
                if (isset($member->id)) {
                    return view('_loan/_loan_applications/_loan_app', ["data" => $data, "title" => "Update Loan", "member" => $member]);
                } else {
                    session()->setFlashdata('notify', 'error||Member Not Found!');
                    return redirect()->to(base_url('loan/loan_list'));
                }
            } else {
                return redirect()->to(base_url('loan/loan_list'));
            }
        } else if (has_permission("loan", "add")) {
            if ($this->request->getGet("b") != "") {
                $member = model("Member_model")->get_mem_data(decode($this->request->getGet("b")));
                if (isset($member->id)) {
                    return view('_loan/_loan_applications/_loan_app', ["title" => "New Loan", "member" => $member]);
                } else {
                    return redirect()->to(base_url('loan/loan_list'));
                }
            } else {
                return redirect()->to(base_url('loan/new_loan'));
            }
        } else {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
    }

    //DELETE LOAN DATA
    public function del_loan($req_id = "") {

        if ($req_id != "" && has_permission("loan", "delete")) {
            $data = $this->thisModel->get_loan_req_data(decode($req_id));
            if (isset($data->id)) {
                $result = $this->thisModel->delete_loan_req_data($data->id);
                if ($result) {
                    session()->setFlashdata('notify', 'Successfully Deleted');
                }
            }
        }

        return redirect()->to(base_url('loan/loan_list'));
    }

    //LOAN APPROVE
    public function loan_approve($req_id = "") {

        if ($req_id != "" && has_permission("loan", "edit")) {
            $data = $this->thisModel->get_loan_req_data(decode($req_id));
            if (isset($data->id)) {
                $result = false;
                $Member_model = model('Member_model');
                $loan_up_data = ["status" => 1, 'action_by' => decode(session()->ml_user)];
                if ($data->new_mem_req_loan == 1) {
                    $unreg_member = $Member_model->get_unreg_mem_data($data->member);
                    if (isset($unreg_member->id)) {
                        $new_mem_id = $Member_model->tranfer_unreg_to_reg_mem($data->member);
                        if ($new_mem_id > 0) {
                            $Member_model->update_data(["member_no" => "MPL-" . $new_mem_id], $new_mem_id);
                            $Member_model->update_doc_by_mem(["member" => $new_mem_id], $data->member);
                            $loan_up_data["member"] = $new_mem_id;

                            $loan_up_data["new_mem_req_loan"] = 0;
                            $result = $this->thisModel->update_loan_req_data($loan_up_data, $data->id);
                            $data = $this->thisModel->get_loan_req_data($data->id);

                            $Member_model->delete_unreg_mem_data($unreg_member->id);
                        }
                    }
                }
                if ($result) {
                    make_and_send_sms("loan_approve", ["{{amount}}" => "LKR. " . $data->last_amount, "{{date}}" => date("Y-m-d"), "{{name}}" => $data->mem_name], $data->mem_phone);

                    $user = model('Auth_model')->get_user_by_member($data->member);
                    $member = $Member_model->get_data($data->member);
                    if (!isset($user->id) && $member->new_member == 1) {
                        $password = $data->mem_email;
                        $user_id = model('User_model')->add_data([
                            "name" => $data->mem_name,
                            "email" => $data->mem_email,
                            "rel_type" => "member",
                            "rel_id" => $data->member,
                            "utype" => 2,
                            "password" => password_hash($password, PASSWORD_DEFAULT),
                            "status" => 1
                        ]);
                        if ($user_id > 0) {
                            $Member_model->update_data(["new_member" => 0], $data->member);
                            make_and_send_sms("login", ["{{login_url}}" => base_url(), "{{password}}" => $password, "{{email}}" => $data->mem_email], $data->mem_phone);
                        }
                    }

                    session()->setFlashdata('notify', 'Successfully Approved');
                }
            }
        }

        return redirect()->to(base_url('loan/loan_list'));
    }

    //LOAN APPROVE
    public function loan_reject($req_id = "") {

        if ($req_id != "" && has_permission("loan", "edit")) {
            $data = $this->thisModel->get_loan_req_data(decode($req_id));
            if (isset($data->id)) {
                $result = $this->thisModel->update_loan_req_data(["status" => 2, 'action_by' => session()->ml_user], $data->id);
                if ($result) {
                    make_and_send_sms("loan_rejected", ["{{amount}}" => "LKR. " . $data->last_amount, "{{date}}" => date("Y-m-d"), "{{name}}" => $data->mem_name], $data->mem_phone);
                    session()->setFlashdata('notify', 'Successfully Approved');
                }
            }
        }

        return redirect()->to(base_url('loan/loan_list'));
    }

    //LIST VIEW LOAN
    public function loan_list() {
        if (!has_permission("loan", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('_loan/_loan_applications/_list', ["title" => "Loan Lists"]);
    }

    //LOAN PAYMENT APPROVE
    public function loan_pay_approve($req_id = "") {

        if ($req_id != "" && has_permission("loan_pay", "edit")) {
            $data = $this->thisModel->get_loan_pay_data(decode($req_id));
            if (isset($data->id)) {
                $result = $this->thisModel->update_loan_pay_data(["status" => 1, 'action_by' => decode(session()->ml_user)], $data->id);
                if ($result) {

                    //UPDATE LOAN DETAILS
                    $loan_summary = $this->thisModel->get_loan_pay_data_summary(["loan" => $data->loan]);
                    $loan_update = ["paid_period" => intval($loan_summary->tot_paid_count)];
                    if ($loan_summary->tot_paid_count == 1) {
                        $loan_update["first_pay_dt"] = $data->pay_date;
                    }
                    $this->thisModel->update_loan_req_data($loan_update, $data->loan);

                    make_and_send_sms("payment_mark", ["{{amount_to_pay}}" => "LKR. " . $data->total, "{{date}}" => date("Y-m-d"), "{{balance}}" => "LKR. " . ($data->last_amount - $loan_summary->paid_total)], $data->mem_phone);
                    session()->setFlashdata('notify', 'Successfully Approved');
                }
            }
        }

        return redirect()->to(base_url('loan/loan_pay_list'));
    }

    //LOAN PAYMENT REJECT
    public function loan_pay_reject($req_id = "") {

        if ($req_id != "" && has_permission("loan_pay", "edit")) {
            $data = $this->thisModel->get_loan_pay_data(decode($req_id));
            if (isset($data->id)) {
                $result = $this->thisModel->update_loan_pay_data(["status" => 2, 'action_by' => decode(session()->ml_user)], $data->id);
                if ($result) {
//                    send_sms($data->mem_phone, "Dear " . $data->mem_name . "!\n Your Repayment, RPAY-#" . $data->id . " Was Rejected On " . date("Y-m-d") . "\n\nThanks For Being With Machan Loans");
                    session()->setFlashdata('notify', 'Successfully Rejected!');
                }
            }
        }

        return redirect()->to(base_url('loan/loan_pay_list'));
    }

    //LIST VIEW LOAN PAYMENTS
    public function loan_pay_list() {
        if (!has_permission("loan_pay", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('_loan/_loan_pay/_list', ["title" => "Loan Payments"]);
    }

    //CREATE/ UPDATE VIEW GROUP
    public function loan_pay($req_id = "") {
        $rules = [
            'pay_date' => 'required',
            'loan' => 'required|numeric',
            'loan_period' => 'required',
            'pen_amount' => 'numeric',
            'repay_amount' => 'required|numeric',
            'total' => 'required|numeric'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();
            $date_dt = explode("__", $post_data["loan_period"]);
            $post_data["loan_period"] = $date_dt[0];
            $post_data["due_pay_date"] = isset($date_dt[1]) ? $date_dt[1] : $post_data["pay_date"];

            if ($req_id != "" && has_permission("loan_pay", "edit")) {
                $data = $this->thisModel->get_loan_pay_data(decode($req_id));
                if (isset($data->id)) {
                    $result = $this->thisModel->update_loan_pay_data($post_data, $data->id);
                    if ($result) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('loan/loan_pay/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('loan/loan_pay'));
                }
            } else if (has_permission("loan_pay", "add")) {
                $insert_id = $this->thisModel->add_loan_pay_data($post_data);
                if ($insert_id > 0) {
                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('loan/loan_pay_list'));
                } else {
                    return redirect()->to(base_url('loan/loan_pay'));
                }
            }
        }

        if ($req_id != "" && has_permission("loan_pay", "edit")) {
            $data = $this->thisModel->get_loan_pay_data(decode($req_id));
            if (isset($data->id)) {
                return view('_loan/_loan_pay/_loan_pay', ["data" => $data, "title" => "Update Loan Payment"]);
            } else {
                return redirect()->to(base_url('loan/loan_pay'));
            }
        } else if (has_permission("loan_pay", "add")) {
            return view('_loan/_loan_pay/_loan_pay', ["title" => "New Loan Payment"]);
        } else {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
    }

    //DELETE LOAN PAYMENTS
    public function del_loan_pay($req_id = "") {

        if ($req_id != "" && has_permission("loan_pay", "delete")) {
            $data = $this->thisModel->get_loan_pay_data(decode($req_id));
            if (isset($data->id)) {
                $result = $this->thisModel->delete_loan_pay_data($data->id);
                if ($result) {
                    session()->setFlashdata('notify', 'Successfully Deleted');
                }
            }
        }

        return redirect()->to(base_url('loan/loan_pay_list'));
    }

    //CREATE / UPDATE LOAN SETTINGS
    public function settings() {
        if (has_permission("loan_setting", "edit")) {

            $rules = [
                'loan_detail_banner' => 'required',
            ];

            if ($this->request->is('post') && $this->validate($rules)) {
                $loan_detail_banner = get_option("loan_detail_banner");
                if ($loan_detail_banner != null) {
                    if (set_option("loan_detail_banner", $this->request->getPost("loan_detail_banner"))) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                    }
                } else {
                    if (add_option("loan_detail_banner", $this->request->getPost("loan_detail_banner"))) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                    }
                }

                return redirect()->to(base_url('loan/settings'));
            }

            return view('_loan/_setting', ["title" => "Loan Settings"]);
        } else {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
    }

}
