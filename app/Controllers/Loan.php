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
            'term' => 'required|'
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
        return view('_loan/_loan_product/_list');
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
        
        return view('_loan/_loan_group/_list');
    }

    //CREATE/ UPDATE VIEW LOAN
    public function loan($req_id = "") {
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

            if ($req_id != "" && has_permission("loan", "edit")) {
                $data = $this->thisModel->get_loan_req_data(decode($req_id));
                if (isset($data->id)) {
                    $result = $this->thisModel->update_loan_req_data($post_data, $data->id);
                    if ($result) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('loan/loan_pro/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('loan/loan'));
                }
            } else if (has_permission("loan", "add")) {
                $insert_id = $this->thisModel->add_loan_req_data($post_data);
                if ($insert_id > 0) {
                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('loan/loan') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('loan/loan'));
                }
            }
        }

        if ($req_id != "" && has_permission("loan", "edit")) {
            $data = $this->thisModel->get_loan_req_data(decode($req_id));
            if (isset($data->id)) {
                return view('_loan/_loan_applications/_loan_app', ["data" => $data, "title" => "Update Loan Group"]);
            } else {
                return redirect()->to(base_url('loan/loan'));
            }
        } else if (has_permission("loan", "add")) {
            return view('_loan/_loan_applications/_loan_app', ["title" => "New Loan Group"]);
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

    //DELETE LOAN PAYMENTS
    public function del_loan_pay($req_id = "") {

        if ($req_id != "" && has_permission("loan_pay", "delete")) {
            $data = $this->thisModel->get_loan_req_data(decode($req_id));
            if (isset($data->id)) {
                $result = $this->thisModel->delete_loan_req_data($data->id);
                if ($result) {
                    session()->setFlashdata('notify', 'Successfully Deleted');
                }
            }
        }

        return redirect()->to(base_url('loan/loan_pay_list'));
    }

}
