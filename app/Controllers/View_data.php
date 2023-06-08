<?php

namespace App\Controllers;

class View_data extends BaseController {

    public function __construct() {
        if (!already_logined()) {
            die;
        }
    }

    public function members() {
        if (!has_permission("member", "view")) {
            die;
        }

        return view('_table/_members');
    }

    public function loans() {
        if (!has_permission("loan", "view")) {
            die;
        }

        return view('_table/_loans');
    }

    public function loans_pay() {
        if (!has_permission("loan_pay", "view")) {
            die;
        }

        return view('_table/_loans_pay');
    }

    public function loans_pros() {
        if (!has_permission("loan_pro", "view")) {
            die;
        }

        return view('_table/_loans_pros');
    }

    public function loan_groups() {
        if (!has_permission("group_data", "view")) {
            die;
        }

        return view('_table/_loan_groups');
    }

}
