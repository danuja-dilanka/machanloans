<?php

namespace App\Controllers;

class Investment extends BaseController {

    private $thisModel;

    public function __construct() {

        if (!already_logined()) {
            return redirect()->route('login');
        }

        $this->thisModel = model('Investment_model');
    }

    //LIST VIEW INVESTMENT ACCOUNT
    public function invest_acc_list() {
        if (!has_permission("invest_acc", "view")) {
            return redirect()->to(base_url('dashboard'));
        }
        
        return view('_investment/_invest_acc/_list', ["title" => "Investment Accounts"]);
    }

    //INVESTMENT ACCOUNT
    public function invest_acc($req_id = "") {
        $rules = [
            'investor_name' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'profit_perc' => 'required|numeric',
            'invest_time' => 'required|numeric',
            'bank_det' => 'required',
            'status' => 'required|numeric',
            'phone' => 'required|numeric|min_length[9]|max_length[11]'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $post_data = $this->request->getPost();

            if ($req_id != "" && has_permission("invest_acc", "edit")) {
                $data = $this->thisModel->get_invest_acc_data(decode($req_id));
                if (isset($data->id)) {
                    $result = $this->thisModel->update_invest_acc_data($post_data, $data->id);
                    if ($result) {
                        session()->setFlashdata('notify', 'Successfully Updated');
                        return redirect()->to(base_url('investment/invest_acc/' . $req_id));
                    }
                } else {
                    return redirect()->to(base_url('investment/invest_acc'));
                }
            } else if (has_permission("invest_acc", "add")) {
                $insert_id = $this->thisModel->add_invest_acc_data($post_data);
                if ($insert_id > 0) {
                    session()->setFlashdata('notify', 'Successfully Inserted');
                    return redirect()->to(base_url('investment/invest_acc') . "/" . encode($insert_id));
                } else {
                    return redirect()->to(base_url('investment/invest_acc'));
                }
            }
        }

        if ($req_id != "" && has_permission("invest_acc", "edit")) {
            $data = $this->thisModel->get_invest_acc_data(decode($req_id));
            if (isset($data->id)) {
                return view('_investment/_invest_acc/_invest_acc', ["data" => $data, "title" => "Update Investment Account"]);
            } else {
                return redirect()->to(base_url('investment/invest_acc'));
            }
        } else if (has_permission("invest_acc", "add")) {
            return view('_investment/_invest_acc/_invest_acc', ["title" => "New Investment Account"]);
        } else {
            session()->setFlashdata('notify', 'error||Access Denied!');
            return redirect()->to(base_url('dashboard'));
        }
    }

    //DELETE INVESTMENT ACCOUNT
    public function del_invest_acc($req_id = "") {

        if ($req_id != "" && has_permission("invest_acc", "delete")) {
            $data = $this->thisModel->get_invest_acc_data(decode($req_id));
            if (isset($data->id)) {
                $result = $this->thisModel->delete_invest_acc_data($data->id);
                if ($result) {
                    session()->setFlashdata('notify', 'Successfully Deleted');
                }
            }
        }

        return redirect()->to(base_url('investment/invest_acc_list'));
    }

}
