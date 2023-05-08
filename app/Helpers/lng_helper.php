<?php


function _lng($content = "", $lng = "eng") {

//    if ($content != "") {
//        $CI = &get_instance();
//
//        $CI->db->select($lng);
//        $CI->db->where('content', strtolower(trim($content)));
//        $db_row = $CI->db->get(db_prefix() . 'language')->row();
//
//        if (!$db_row) {
//            return $content;
//        } else {
//            return $db_row->$lng;
//        }
//    }

    return iconv(mb_detect_encoding($content, mb_detect_order(), true), "UTF-8", $content);
}

function _l($line, $label = '', $log_errors = true) {

    return _lng($line);
}
