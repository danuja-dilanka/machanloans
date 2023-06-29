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
            'loan_name' => 'required',
            'last_amount' => 'required',
            'int_rate' => 'required',
            'int_rate_per' => 'required|numeric',
            'term_per' => 'required|numeric',
            'late_time_penl' => 'required',
            'status' => 'required|numeric',
            'description' => 'required',
            'term' => 'required|'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();

            if ($req_id != "" && has_permission("group_data", "edit")) {
                $data = $this->thisModel->get_group_data(decode($req_id));
                if (isset($data->id)) {
                    $result = $this->thisModel->update_group_data($post_data, $data->id);
                    if ($result) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('loan/loan_pro/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('loan/loan_group'));
                }
            } else if (has_permission("group_data", "add")) {
                $insert_id = $this->thisModel->add_group_data($post_data);
                if ($insert_id > 0) {
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
                return view('_loan/_loan_group/_loan_grp', ["data" => $data, "title" => "Update Loan Group"]);
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

    //LOAN VIEW
    public function view_loan($req_id) {
        if (!has_permission("loan", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        $loan = decode($req_id);
        $data = $this->thisModel->get_loan_req_data($loan);
        if (isset($data->id)) {
            return view('_loan/_loan_applications/_view', ["data" => $data, "req_id" => $req_id]);
        } else {
            return redirect()->to(base_url('loan/loan'));
        }
    }

    //NEW LOAN VIEW
    public function new_loan() {
        if (!has_permission("loan", "add")) {
            return redirect()->to(base_url('dashboard'));
        }
        $rules = [
            'member' => 'required'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            return redirect()->to(base_url('loan/loan') . "?b=" . encode($this->request->getPost('member')));
        } else {
            return view('_loan/_loan_applications/_loan_for', ["title" => "New Loan | Select Member"]);
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

            if ($req_id != "" && has_permission("loan", "edit")) {
                $data = $this->thisModel->get_loan_req_data(decode($req_id));
                if (isset($data->id)) {
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
                return view('_loan/_loan_applications/_loan_app', ["data" => $data, "title" => "Update Loan", "member" => $member]);
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
                $result = $this->thisModel->update_loan_req_data(["status" => 1, 'action_by' => session()->ml_user], $data->id);
                if ($result) {
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
            $data = $this->thisModel->get_loan_req_data(decode($req_id));
            if (isset($data->id)) {
                $result = $this->thisModel->update_loan_pay_data(["status" => 1, 'action_by' => session()->ml_user], $data->id);
                if ($result) {
                    session()->setFlashdata('notify', 'Successfully Approved');
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
                    return redirect()->to(base_url('loan/loan_pay') . "/" . encode($insert_id));
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
