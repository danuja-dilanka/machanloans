<?php

if (!function_exists('str_contains')) {

    function str_contains(string $haystack, string $needle): bool {
        return '' === $needle || false !== strpos($haystack, $needle);
    }

}

function is_mobile() {
    if (get_instance()->agent->is_mobile()) {
        return true;
    }

    return false;
}

function create_link($link_class, $link_meth, $action, $link_text = "+ Add New", $link_style_class = "btn btn-sm btn-success", $link_attr = "") {
    if (has_permission($link_class, $action)) {
        return '<a href="' . base_url($link_class . "/" . $link_meth) . '" class="' . $link_style_class . '" ' . $link_attr . '>' . $link_text . '</a>';
    }
}

function set_alert($type, $message) {
    get_instance()->session->set_flashdata($type, $message);
}

function _list_href($sub = '') {
    return base_url(_DIR_PREFIX . "/" . CURRENT_CLASS . "/" . $sub);
}

function _new_href($sub = _DIR_PREFIX) {
    return base_url($sub . "/" . CURRENT_CLASS . "/" . CURRENT_METH);
}

function toast($text, $separ = "||") {
    $types = strpos($text, $separ) > 0 ? explode($separ, $text) : "";
    $type = 'success';
    if ($types != "") {
        $type = $types[0];
        $text = $types[1];
    }
    return '<script>$(document).ready(function () {toast_notify("' . $text . '","' . $type . '");});</script>';
}

function load_dt_tb() {
    return '<script>$(document).ready(function () {load_data("' . base_url(_DIR_PREFIX . "/" . CURRENT_CLASS . "/get_dt_data?m=" . CURRENT_METH) . '");});</script>';
}

function get_week_days($num = 0) {
    $data = [
        ['id' => '0', 'name' => "Select Option"],
        ['id' => '1', 'name' => 'Monday'],
        ['id' => '2', 'name' => 'Tuesday'],
        ['id' => '3', 'name' => 'Wednesday'],
        ['id' => '4', 'name' => 'Thursday'],
        ['id' => '5', 'name' => 'Friday'],
        ['id' => '6', 'name' => 'Saturday'],
        ['id' => '7', 'name' => 'Sunday']
    ];
    if ($num > 0) {
        return ($num > 1) ? $data[$num - 1]['name'] : "-";
    } else {
        return $data;
    }
}

function encode($string) {
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'ml_pub_cyrptX';
    $secret_iv = 'ml_iv';
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    return base64_encode($output);
}

function decode($string) {
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'ml_pub_cyrptX';
    $secret_iv = 'ml_iv';
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    return openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
}

function getAvaMethods($meth_str) {
    $data = [];
    if (strpos($meth_str, "_list") > 0) {
        $main_meth = explode("_list", $meth_str)[0];
        $data[] = $main_meth;
        $data[] = "del_" . $main_meth;
        $data[] = $meth_str;
    } else {
        $data[] = $meth_str;
        $data[] = "del_" . $meth_str;
        $data[] = $meth_str . "_list";
    }

    return $data;
}
