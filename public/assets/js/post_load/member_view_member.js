$(document).on("click", "#send_sms", function () {
    $.post(BASE_URL + "api/send_sms", {"phone": $("input[name='phone']").val().trim(), "message": $("textarea[name='message']").val().trim()}, function (data) {
        if (data == '1') {
            $.toast({
                heading: 'Alert',
                text: "SMS Sent",
                position: 'bottom-right',
                showHideTransition: 'slide',
                icon: 'success'
            });
        }
    });
});

