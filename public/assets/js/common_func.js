$(document).ready(function () {
    $(".hide_or_show_sel").on('change', function () {
        var ele = $(this);
        if (ele.data('target') !== undefined) {
            $(".custom_show").hide();
            $("#" + ele.data('target') + ele.val()).show();
        }
    });
    
    $.getScript(BASE_URL + "/public/assets/js/ajax_api/setting_users.js");
    $.getScript(BASE_URL + "/public/assets/js/ajax_api/setting_user_types.js");
});






