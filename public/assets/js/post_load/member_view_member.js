
        alert("");$(document).on("click", "#send_sms", function () {
    $.post(BASE_URL + "api/send_sms", {"user": SECRET_ID, "message": $("textarea[name='message']").val().trim()}, function (data) {
        if (data == '1') {
            $.toast({
                heading: 'Alert',
                text: "SMS Sent",
                position: 'bottom-right',
                showHideTransition: 'slide',
                icon: 'success'
            });
        } else {
            $.toast({
                heading: 'Alert',
                text: "Failed",
                position: 'bottom-right',
                showHideTransition: 'slide',
                icon: 'error'
            });
        }
    });
});

