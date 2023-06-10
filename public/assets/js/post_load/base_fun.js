
$(".hide_or_show_sel").on('change', function () {
    var ele = $(this);
    if (ele.data('target') !== undefined) {
        $(".custom_show").hide();
        $("#" + ele.data('target') + ele.val()).show();
    }
});