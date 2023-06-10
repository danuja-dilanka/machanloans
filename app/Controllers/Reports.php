<?php

namespace App\Controllers;

class Reports extends BaseController {
    
    #THIS IS INDEX
    public function index() {
        
    }

    #TRANSACTION REPORT
    public function transactions() {
        if (!has_permission("report_transactions", "view")) {
            die;
        }
        
        return view('_reports/_transaction', ['title' => "Transaction Report"]);
    }

    #INVESTORS REPORT
    public function investors() {
        if (!has_permission("report_invest_acc", "view")) {
            die;
        }
        
        return view('_reports/_investors', ['title' => "Investors Report"]);
    }

}
