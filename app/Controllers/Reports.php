<?php

namespace App\Controllers;

class Reports extends BaseController {

    public function index() {
        return redirect()->to(base_url('dashboard'));
    }

    #TRANSACTION REPORT

    public function transactions() {
        if (!has_permission("report_transactions", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('_reports/_transaction', ['title' => "Transaction Report"]);
    }

    #INVESTORS REPORT

    public function investors() {
        if (!has_permission("report_invest_acc", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('_reports/_investors', ['title' => "Investors Report"]);
    }

    #NET PTOFIT REPORT

    public function net_profit() {
        if (!has_permission("report_net_profit", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('_reports/_net_profit', ['title' => "Net Profit Report"]);
    }

    #DUE PAYMENT REPORT

    public function due_payment() {
        if (!has_permission("report_due_payment", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('_reports/_due_payment', ['title' => "Due Payment Report"]);
    }

    #ACCOUNT CAPITAL REPORT

    public function acc_capital() {
        if (!has_permission("report_acc_capital", "view")) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('_reports/_acc_capital', ['title' => "Account Capital Report"]);
    }

}
