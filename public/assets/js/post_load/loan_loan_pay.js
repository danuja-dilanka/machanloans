$(document).on('change', "#loan", function () {
    $.post(BASE_URL + "api/get_due_loan_periods", {"loan": $(this).val(), "view": 1}, function (data) {
        var sel = $("#loan_period");
        sel.html(data);
        sel.selectpicker('refresh');
        $("#loan_period").trigger('change');
    });
});

$(document).on('change', "#loan_period", function () {
    var data = $(this).val().trim().split("__");
    $("#repay_amount").val(data[1]);
    $("#total").val(data[1]);
});