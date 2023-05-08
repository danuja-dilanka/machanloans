<?php

namespace App\Controllers;

class Member extends BaseController{
    
    //REDIRECT TO LIST VIEW
    public function index(){
        redirect()->route('member/mem_list');
    }
    
     //CREATE/ UPDATE VIEW
    public function mem(){
        return view('_member/_member');
    }
    
    //LIST VIEW
    public function mem_list(){
        return view('_member/_list');
    }
}
