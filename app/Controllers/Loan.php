<?php

namespace App\Controllers;

class Loan extends BaseController {

    public $validation;
    public $thisModel;

    public function __construct() {
        $this->validation = \Config\Services::validation();
        $this->thisModel = model('Loan_model');
    }

    //REDIRECT TO LIST VIEW
    public function index() {
        redirect()->route('loan/loan_pro_list');
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

            if ($req_id != "") {
                $data = $this->thisModel->get_data(decode($req_id));
                if (isset($data->id)) {
                    $result = $this->thisModel->update_data($post_data, $data->id);
                    if ($result) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('loan/loan_pro/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('loan/loan_pro'));
                }
            } else {
                $insert_id = $this->thisModel->add_data($post_data);
                if ($insert_id > 0) {
                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('loan/loan_pro') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('loan/loan_pro'));
                }
            }
        }

        if ($req_id != "") {
            $data = $this->thisModel->get_data(decode($req_id));
            if (isset($data->id)) {
                return view('_loan/_loan_product/_loan_pro', ["data" => $data, "title" => "Update Loan Product"]);
            } else {
                return redirect()->to(base_url('loan/loan_pro'));
            }
        } else {
            return view('_loan/_loan_product/_loan_pro', ["title" => "New Loan Product"]);
        }
    }

    //LIST VIEW
    public function loan_pro_list() {
        return view('_loan/_loan_product/_list');
    }

}
