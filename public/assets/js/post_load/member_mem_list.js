var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function (html) {
    new Switchery(html, {size: 'small'});
});

$(".js-switch").on('change', function () {
    var ele = $(this);
    $.post(BASE_URL + 'api/change_user_status', {status: ele.is(':checked') ? 1 : 0, user: ele.data('id')}, function (data) {
        if (data == '1') {
            $.toast({
                heading: 'Alert',
                text: "Status Changed",
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