<?php

namespace App\Controllers;

class Loan extends BaseController{
    
    //REDIRECT TO LIST VIEW
    public function index(){
        redirect()->route('member/mem_list');
    }
    
     //CREATE/ UPDATE VIEW
    public function loan_pro(){
        return view('_member/_member');
    }
    
    //LIST VIEW
    public function loan_pro_list(){
        return view('_member/_list');
    }
}
