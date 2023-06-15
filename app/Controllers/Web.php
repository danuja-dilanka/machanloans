<?php

namespace App\Controllers;

use Config\Services;
use App\Libraries\PluploadHandler;

class Web extends BaseController {

    private $thisModel;

    public function __construct() {
        $this->thisModel = model('Loan_model');
    }

    public function done($lng) {
        return view('loan_app_stage4', ['lng' => $lng]);
    }

    private function mng_docs($data, $member) {
        $member_model = model('Member_model');
        $docs = [
            "selfie" => "Selfie",
            "bank_statement" => "Bank Statement",
            "hw_nic_front" => "Husband / wife ID copy front",
            "hw_nic_back" => "Husband / wife ID copy back",
            "ga_certificate" => "GA Certificate",
            "fb_screenshot" => "Facebook Screenshot",
            "electricity_bill" => "Electricity Bill Photo"
        ];
        foreach ($docs as $key => $value) {
            if (isset($data[$key])) {
                $doc = $member_model->get_docs_by(["member" => $member, "code" => $key]);
                if (isset($doc->id)) {
                    if ($doc->document != $data[$key]) {
                        $member_model->update_doc([
                            "added_by" => 0,
                            "submitted_date" => date("Y-m-d"),
                            "submitted_time" => date("H:i:s"),
                            "document" => $data[$key],
                                ], $member);
                    }
                } else {
                    $member_model->add_doc([
                        "added_by" => 0,
                        "submitted_date" => date("Y-m-d"),
                        "submitted_time" => date("H:i:s"),
                        "document" => $data[$key],
                        "code" => $key,
                        "member" => $member,
                        "name" => $value,
                            ], $member);
                }
                unset($data[$key]);
            }
        }

        return $data;
    }

    public function guarantors($lng, $req_id) {
        $rules = [
            'loan' => 'trim|required',
            'friend1_name' => 'trim|required',
            'friend1_phone' => 'trim|required',
            'friend1_address' => 'trim|required',
            'friend1f_nic' => 'trim|required',
            'friend1b_nic' => 'trim|required',
            'friend2_name' => 'trim|required',
            'friend2_phone' => 'trim|required',
            'friend2_address' => 'trim|required',
            'friend2f_nic' => 'trim|required',
            'friend2b_nic' => 'trim|required',
            'selfie' => 'trim|required',
            'fb_screenshot' => 'trim|required',
            'electricity_bill' => 'trim|required'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $loan_det = $this->thisModel->get_loan_req_data(decode($req_id));
            if (!isset($loan_det->id)) {
                return redirect()->to(base_url("loan_application/$lng"));
            }

            $post_data = $this->request->getPost();
            $this->thisModel->add_loan_guarantor([
                "loan" => decode($req_id),
                "name" => $post_data["friend1_name"],
                "phone" => $post_data["friend1_phone"],
                "address" => $post_data["friend1_address"],
                "other_data" => json_encode(["nic_front" => $post_data["friend1f_nic"], "nic_back" => $post_data["friend1b_nic"]])
            ]);

            $this->thisModel->add_loan_guarantor([
                "loan" => decode($req_id),
                "name" => $post_data["friend2_name"],
                "phone" => $post_data["friend2_phone"],
                "address" => $post_data["friend2_address"],
                "other_data" => json_encode(["nic_front" => $post_data["friend2f_nic"], "nic_back" => $post_data["friend2b_nic"]])
            ]);

            $this->mng_docs($post_data, $loan_det->member);
            return redirect()->to(base_url("loan_application/done/$lng"));
        } else {
            $loan_det = $this->thisModel->get_loan_req_data(decode($req_id));
            if (isset($loan_det->id)) {
                return view('gaurantor', ['req_id' => $req_id, 'lng' => $lng]);
            } else {
                return redirect()->to(base_url("loan_application/$lng"));
            }
        }
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
            $nic = $this->request->getPost("nic");
            $available_loans = $this->thisModel->get_loan_req_data_by(['nic' => $nic]);
            $avoid_data = [];
            foreach ($available_loans as $key => $value) {
                if ($value->status == 1) {
                    $avoid_data = $this->thisModel->get_loan_pay_data_summary(['loan' => $value->id]);
                    $avoid_data->loan_details = $value;
                    $avoid_data->p_periods = $value->loan_period - $value->paid_period;
                    $avoid_data->p_charge = round($value->last_amount / $value->loan_period);
                    $avoid_data->loan_amount = $value->last_amount;
                    $avoid_data->id = $value->id;
                    break;
                }
            }

            if (isset($avoid_data->id)) {
                $member = model('Member_model')->get_mem_data_by(['nic' => $nic]);
                if (!isset($member[0])) {
                    $member = null;
                } else {
                    $member = $member[0];
                }

                $post_data = $this->request->getPost();
                if (isset($post_data["p_periods"]) && isset($member->id) && isset($avoid_data->loan_details->id) && isset($post_data["bank_slip"])) {
                    $p_periods = $this->request->getPost("p_periods");
                    foreach ($p_periods as $key => $value) {
                        $this->thisModel->add_loan_pay_data([
                            "loan_period" => $value,
                            "loan" => $avoid_data->loan_details->id,
                            "member" => $member->id,
                            "pay_date" => date("Y-m-d"),
                            "pay_time" => date("H:i:s"),
                            "total" => $avoid_data->p_charge,
                            "loan_proof" => $post_data["bank_slip"]
                        ]);
                    }

                    return view('loan_app_waiting', ['lng' => $lng]);
                } else {
                    return view('loan_app_stage2', ['lng' => $lng, 'prev_loan' => $avoid_data, 'member' => $member]);
                }
            } else {
                if ($lng == "si") {
                    return view('loan_app_stage3_si', ['lng' => $lng, 'products' => $this->thisModel->get_pro_data()]);
                } else {
                    return view('loan_app_stage3_eng', ['lng' => $lng, 'products' => $this->thisModel->get_pro_data()]);
                }
            }
        } else {
            Services::validation()->setError('wrong_cre', "Invalid NIC");
            return redirect()->to(base_url("loan_application/$lng"));
        }
    }

    public function request_loan($lng = "eng") {

        $rules = [
            'nic' => 'trim|required|min_length[10]|max_length[12]',
            'loan_type' => 'trim|required|numeric',
            'payment_method' => 'trim|required|numeric',
            'name' => 'trim|required',
            'full_name' => 'trim|required',
            'birthday' => 'trim|required',
            'email' => 'trim|required|valid_email',
            'residential_address' => 'trim|required',
            'current_address' => 'trim|required',
            'employment' => 'trim|required',
            'employment_address' => 'trim|required',
            'phone' => 'trim|required|min_length[9]|max_length[10]',
            'whatsapp' => 'trim|required|min_length[9]|max_length[10]',
            'marital_status' => 'trim|required|numeric',
            'memberships' => 'trim|required',
            'bank_details' => 'trim|required'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();
            $insert_id = $this->thisModel->add_loan_req_data($post_data);
            if ($insert_id > 0) {

                /* NEW MEMBER REGISTRATION ON NEW LOAN APPLICATION */

                $Member_model = model('Member_model');
                if (!isset($Member_model->get_mem_data_by(["nic" => $post_data["nic"]])->id)) {
                    $name = explode(" ", $post_data["full_name"]);
                    $member_id = $Member_model->add_data([
                        "first_name" => $name[0],
                        "last_name" => count($name) > 1 ? $name[count($name) - 1] : "",
                        "birthday" => $post_data["birthday"],
                        "email" => $post_data["email"],
                        "mobile" => $post_data["phone"],
                        "address" => $post_data["current_address"],
                        "nic" => $post_data["nic"],
                    ]);

                    $this->thisModel->update_loan_req_data(["member" => $member_id], $insert_id);
                }

                return redirect()->to(base_url("loan_application/guarantors/" . $lng . "/" . encode($insert_id)));

                /* NEW MEMBER REGISTRATION ON NEW LOAN APPLICATION - END */
            } else {
                return redirect()->to(base_url("loan_application/$lng"));
            }
        } else {
            return redirect()->to(base_url("loan_application/$lng"));
        }
    }

    public function upload($type = 0) {
        if ($type == 0) {
            $up_path = 'public/images/loan_req/nic/front/';
        } else if ($type == 1) {
            $up_path = 'public/images/loan_req/nic/back/';
        } else if ($type == 2) {
            $up_path = 'public/images/loan_req/loan_proof/';
        } else if ($type == 3) {
            $up_path = 'public/images/loan_req/nic/spouse_nic_front/';
        } else if ($type == 4) {
            $up_path = 'public/images/loan_req/nic/spouse_nic_back/';
        } else if ($type == 5) {
            $up_path = 'public/images/loan_req/nic/friend1f/';
        } else if ($type == 6) {
            $up_path = 'public/images/loan_req/nic/friend1b/';
        } else if ($type == 7) {
            $up_path = 'public/images/loan_req/nic/friend2f/';
        } else if ($type == 8) {
            $up_path = 'public/images/loan_req/nic/friend2b/';
        } else if ($type == 9) {
            $up_path = 'public/images/loan_req/selfie/';
        } else if ($type == 10) {
            $up_path = 'public/images/loan_req/fb_screenshot/';
        } else if ($type == 11) {
            $up_path = 'public/images/loan_req/electricity_bill/';
        }

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

}
