<?php

if (!function_exists('has_permission')) {

    function has_permission($module, $action) {
        $auth = model('Auth_model');

        $user_type = $auth->get_user_type(decode(session()->ml_user_type));
        if (isset($user_type->id)) {
            if ($user_type->utype == "admin") {
                return true;
            }
            $user_type = $user_type->id;
        } else {
            return false;
        }

        $access = $auth->get_utype_access($user_type, $module, $action);
        if ($access) {
            return true;
        } else {
            return $auth->get_user_access(decode(session()->ml_user), $module, $action);
        }

        return false;
    }

}


if (!function_exists('already_logined')) {

    function already_logined() {
        $auth = model('Auth_model');

        if (isset(session()->ml_email)) {
            $user = $auth->get_user(session()->ml_email);
            if (isset($user->id)) {
                return true;
            }
        }

        return false;
    }

}

if (!function_exists('is_admin')) {

    function is_admin() {
        if (isset(session()->ml_user_type) && (decode(session()->ml_user_type) == 1)) {
            return true;
        }

        return false;
    }

}