$.post(BASE_URL + 'api/get_loan_pay_mode', {product : $("#loan_type").val()}, function (data) {
    $("#pay_type").val(data);
});

