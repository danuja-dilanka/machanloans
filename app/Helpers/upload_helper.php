<?php

function upload_b64($b64, $to) {
    $save_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $b64));
    $image_name = md5(mt_rand() . time()) . '.png';
    $result = file_put_contents('/public/images/' . $to . "/" . $image_name, $save_data);
    if ($result) {
        return $image_name;
    }

    return '';
}
