<?php

function send_sms($to, $message) {
    $token = "ab9874ad49d48134c2ec6823f0f5d7fe83308dcb";
    $mobile = trim($to);
    $encoded = urlencode(utf8_encode($message));
    
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

        model('Sms_model')->add_data([
            "message" => $encoded,
            "mobile" => $mobile,
            "response" => $response,
            "mess_id" => json_decode($response)->id,
            "send_dt" => date("Y-m-d H:i:s")
        ]);
        
        
    }else{
        $response = '{"errors":{"phone":["Invalid Phone"]}}';
    }

    return json_decode($response);
}
