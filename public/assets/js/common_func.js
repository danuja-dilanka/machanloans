function checkJSFileExists(filePath) {
    return fetch(filePath).then(response => {
        if (response.status === 200) {
            return true;
        } else {
            return false;
        }
    }).catch(() => {
        return false;
    });
}
$(document).ready(function () {
    const currentUrl = window.location.href;
    const parts = currentUrl.split('/');
    const tot_parts = parts.length;

    $.getScript(BASE_URL + "public/assets/js/post_load/base_fun.js");
    $.getScript(BASE_URL + "public/assets/js/ajax_api/setting_users.js");
    $.getScript(BASE_URL + "public/assets/js/ajax_api/setting_user_types.js");
    $.getScript(BASE_URL + "public/assets/js/post_load/settings.js");

    if (tot_parts > 1) {
        var dec = 1;
        if (SECRET_ID != "") {
            dec = dec + 1;
        }
        const jsFilePath = BASE_URL + "public/assets/js/post_load/" + parts[tot_parts - (dec + 1)] + "_" + parts[tot_parts - dec] + ".js";
        var is_exist = checkJSFileExists(jsFilePath);
        if (is_exist) {
            $.getScript(jsFilePath);
        } else {
            jsFilePath = BASE_URL + "public/assets/js/post_load/" + parts[tot_parts - dec] + ".js";
            is_exist = checkJSFileExists(jsFilePath);
            if (is_exist) {
                $.getScript(jsFilePath);
            }
        }
    }
});






