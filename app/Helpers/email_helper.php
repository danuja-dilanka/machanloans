<?php

function send_email($to, $subject, $message) {
    $email = \Config\Services::email();

    $email->setFrom('info@machanloans.com', 'Machan Loans');
    $email->setTo($to);
//    $email->setCC('another@another-example.com');
//    $email->setBCC('them@their-example.com');

    $email->setSubject($subject);
    $email->setMessage($message);

    if ($email->send()) {
        return true;
    }

    return false;
}
