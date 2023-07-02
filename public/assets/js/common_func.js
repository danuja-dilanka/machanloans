function import_script_if_exist(jsFilePath) {
    return fetch(jsFilePath).then(response => {
        if (response.status === 200) {
            $.getScript(jsFilePath);
        }
    }).catch(error => {
        console.error('Error:', "File Not Found");
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

        var jsFilePath = BASE_URL + "public/assets/js/post_load/" + parts[tot_parts - (dec + 1)] + "_" + parts[tot_parts - dec] + ".js";
        try {
            import_script_if_exist(jsFilePath);
        } catch (e) {

        }

        jsFilePath = BASE_URL + "public/assets/js/post_load/" + parts[tot_parts - dec] + ".js";

        try {
            import_script_if_exist(jsFilePath);
        } catch (e) {

        }
    }
});
