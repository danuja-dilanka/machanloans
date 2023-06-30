function get_loan_pay_mode() {
    $.post(BASE_URL + 'api/get_loan_pay_mode', {product: $("#loan_type").val()}, function (data) {
        $("#pay_type").val(data);
    });
}

$(document).on('change', "#loan_type", function () {
    get_loan_pay_mode();
});

$(document).ready(function () {
    get_loan_pay_mode();
});