$(document).on('change', "._switch", function () {
    var ele = $(this);
    $.post(BASE_URL + "api/set_mod_status", {
        "id": ele.data('id'),
        "access_type": $("#access_type").val(),
        "user": $("#users").val(),
        "status": ele.prop('checked'),
        "user_type": $("#user_types").val(),
        "action": ele.data('action'),
        "module": ele.data('module')
    }, function (data) {
        if (data == '1') {
            $.toast({
                heading: 'Alert',
                text: "Status Updated",
                position: 'bottom-right',
                showHideTransition: 'slide',
                icon: 'success'
            });
        }
    });
});

$(document).on('change', "._access", function () {
    var ele = $(this);
    $.post(BASE_URL + "api/set_mod_access", {
        "id": ele.data('id'),
        "access_type": $("#access_type").val(),
        "user": $("#users").val(),
        "status": ele.prop('checked'),
        "user_type": $("#user_types").val(),
        "action": ele.data('action'),
        "module": ele.data('module')
    }, function (data) {
        if (data == '1') {
            $.toast({
                heading: 'Alert',
                text: "Access Updated",
                position: 'bottom-right',
                showHideTransition: 'slide',
                icon: 'success'
            });
        }
    });
});