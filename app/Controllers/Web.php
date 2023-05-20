<?php

namespace App\Controllers;

use Config\Services;

class Web extends BaseController {

    private $thisModel;

    public function __construct() {
        $this->thisModel = model('Loan_model');
    }

    public function loan_application($lng = "") {
        if ($lng == "") {
            return view('loan_app_stage1');
        } else {
            return view('loan_app_stage2', ['lng' => $lng]);
        }
    }

    public function loan_check($lng = "eng") {

        $rules = [
            'nic' => 'trim|required|min_length[10]|max_length[12]'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $available_loans = $this->thisModel->get_loan_req_data_by(['nic' => $this->request->getPost("nic")]);
            $avoid_data = [];
            foreach ($available_loans as $key => $value) {
                if ($value->status == 1) {
                    $avoid_data = $this->thisModel->get_loan_pay_data_summary(['loan' => $value->id]);
                    $avoid_data->loan_amount = $value->last_amount;
                    $avoid_data->id = $value->id;
                    break;
                }
            }

            if (count($avoid_data) > 0) {
                return view('loan_app_stage2', ['lng' => $lng, 'prev_loan' => $avoid_data]);
            } else {
                if ($lng == "si") {
                    return view('loan_app_stage3_si');
                } else {
                    return view('loan_app_stage3_eng');
                }
            }
        } else {
            Services::validation()->setError('wrong_cre', "Invalid NIC");
            return redirect()->to(base_url("loan_application/$lng"));
        }
    }

}
