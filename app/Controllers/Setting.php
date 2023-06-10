<?php

namespace App\Controllers;

class Setting extends BaseController {

    private $thisModel;

    public function __construct() {

        if (!already_logined()) {
            return redirect()->route('login');
        }

        $this->thisModel = model('Setting_model');
    }
    
    #ACCESS CONTROL
    public function access() {
        if (!has_permission("setting_access", "edit")) {
            die;
        }
        
        return view('_settings/_access', ['title' => "Access & Module Control", "settings" => $this->thisModel]);
    }
}
