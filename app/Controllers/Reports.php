<?php

namespace App\Controllers;

class Reports extends BaseController{
    
    #THIS IS INDEX
    public function index(){
        
    }
    
    #TRANSACTIONS
    public function transactions(){
        return view('_transaction/_list');
    }
}
