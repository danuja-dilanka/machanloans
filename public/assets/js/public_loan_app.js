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

$(document).on('change', "#marital_status", function () {
    var marital_status = $(this).val();
    if (marital_status == '0') {
        $(".show_in_unmarried").show();
        $(".show_in_married").hide();
    } else {
        $(".show_in_unmarried").hide();
        $(".show_in_married").show();
    }

});