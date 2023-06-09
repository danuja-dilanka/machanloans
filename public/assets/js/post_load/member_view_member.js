$(document).on("click", "#send_sms", function () {
    $.get(BASE_URL + "api/send_sms", {"user": $("input[name='user']").val().trim(), "message": $("textarea[name='message']").val().trim()}, function (data) {
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

$(document).on("click", "#send_email", function () {
    $.get(BASE_URL + "api/send_email", {"user": $("input[name='user']").val().trim(), "subject": $("input[name='subject']").val().trim(), "message": $("textarea[name='message']").val().trim()}, function (data) {
        if (data == '1') {
            $.toast({
                heading: 'Alert',
                text: "Email Sent",
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