<?php

function send_sms($to, $message) {
    $token = "ab9874ad49d48134c2ec6823f0f5d7fe83308dcb";
    $mobile = trim($to);
    $encoded = urlencode(($message));

    $response = "{}";
    if (strlen($mobile) == 11) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://portal.richmo.lk/api/sms/send/?dst=' . $mobile . '&from=MACHAN&msg=' . $encoded,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $post_data = json_decode($response);
        if (!isset($post_data->id)) {
            $post_data->id = 0;
        }
        model('Sms_model')->add_data([
            "message" => $encoded,
            "mobile" => $mobile,
            "response" => $response,
            "mess_id" => $post_data->id,
            "send_dt" => date("Y-m-d H:i:s")
        ]);
    } else {
        $response = '{"message":"failed", errors":{"phone":["Invalid Phone"]}}';
    }

    return json_decode($response);
}

function make_sms($short_code, $data) {
    $message = null;
    $Setting_model = model('Setting_model');
    $template = $Setting_model->get_sms_template_by(["short_code" => strtolower(trim($short_code))]);
    if ($template[0]->id) {
        $rep_codes = $Setting_model->get_sms_rep_code_by(["template" => $template[0]->id]);
        $message = $template[0]->template;
        foreach ($rep_codes as $key => $value) {
            $message = str_replace($value->short_code, isset($data[$value->short_code]) ? $data[$value->short_code] : "", $message);
        }
    }

    return $message;
}

function make_and_send_sms($short_code, $data, $phone) {
    $message = make_sms($short_code, $data);

    if ($message != null) {
        return send_sms($phone, $message);
    } else {
        return json_decode('{"message":"failed", errors":{"phone":["Invalid Message"]}}');
    }
}
