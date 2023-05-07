<?php

namespace App\Controllers;

class Home extends BaseController{
    
    #THIS IS INDEX
    public function index(){
        return view('dashboard');
    }
}
