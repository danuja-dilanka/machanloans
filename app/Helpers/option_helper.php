<?php

if (!function_exists('set_option')) {

    function set_option($option_name, $option_val) {
        return model('Options_model')->update_option(["option_value" => $option_val], $option_name);
    }

}

if (!function_exists('add_option')) {

    function add_option($option_name, $option_val) {
        return model('Options_model')->add_option(["option_value" => $option_val, "option_name" => $option_name]);
    }

}

if (!function_exists('get_option')) {

    function get_option($option_name, $multi = 0) {
        if ($multi == 0) {
            $data = model('Options_model')->get_option($option_name);
            if (isset($data->id)) {
                return $data->option_value;
            }
            
            return null;
        } else {
            return model('Options_model')->get_option($option_name, $multi);
        }
    }

}