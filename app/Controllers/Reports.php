<?php

namespace App\Controllers;

class Reports extends BaseController {
    #THIS IS INDEX

    public function index() {
        
    }

    #TRANSACTION REPORT

    public function transactions() {
        return view('_reports/_transaction', ['title' => "Transaction Report"]);
    }

    #INVESTORS REPORT

    public function investors() {
        return view('_reports/_investors', ['title' => "Transaction Report"]);
    }

}
