<?php

namespace App\Controllers;

class Auth extends BaseController{
    public function index(){
        return view('login', ['no_nav' => 1]);
    }
    
    public function login(){
        return view('login', ['no_nav' => 1]);
    }
}
