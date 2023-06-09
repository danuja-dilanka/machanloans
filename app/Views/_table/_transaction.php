<?php

$data = [];
$loan_pays = model('Loan_model')->get_loan_pay_data();
foreach ($loan_pays as $key => $value) {
    
}

echo json_encode(["data" => $data]);
