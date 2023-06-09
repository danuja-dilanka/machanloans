function do_upload(index, upload_path) {
    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4',
        multi_selection: false,
        browse_button: 'pickfiles' + index, // you can pass an id...
        container: document.getElementById('file_container' + index), // ... or DOM Element itself
        url: BASE_URL + 'api/upload/' + upload_path,
        flash_swf_url: BASE_URL + 'public/assets/js/Moxie.swf',
        silverlight_xap_url: BASE_URL + 'public/assets/js/Moxie.xap',

        filters: {
            max_file_size: '30mb',
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png"},
                {title: "Zip files", extensions: "zip"}
            ]
        },

        init: {
            PostInit: function () {
                document.getElementById('filelist' + index).innerHTML = '';

//                document.getElementById('uploadfiles' + index).onclick = function () {
//                    uploader.start();
//                    return false;
//                };
            },

            FilesAdded: function (up, files) {
                plupload.each(files, function (file) {
                    document.getElementById('filelist' + index).innerHTML += '<div id="' + file.id + '" class="filelist_info">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                });
                uploader.start();

                var base = document.getElementById('pickfiles' + index);
                var unic_id = base.getAttribute('data-id');

                document.getElementById(unic_id + "_img").src = BASE_URL + "/public/images/uploading.gif";
            },

            UploadProgress: function (up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },

            Error: function (up, err) {
                console.log(err.code + " : " + err.message);
            },

            FileUploaded: function (up, file) {
                var base = document.getElementById('pickfiles' + index);
                var unic_id = base.getAttribute('data-id');
                var img_src = base.getAttribute('data-src');
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span style="cursor:pointer" class="text-danger remove_file" data-file="' + file.id + '" data-img="' + unic_id + "_img" + '" data-src="' + upload_path + "__" + file.name + '" data-type="' + unic_id + '">X</span>';
                document.getElementById(unic_id + "_img").src = img_src + "/" + file.name;
                document.getElementById(unic_id).value = file.name;
                $(".filelist_info").removeClass("active_record");
                document.getElementById(file.id).classList.add("active_record");
            }
        }
    });

    uploader.init();
}

do_upload(1, "sidbar_imgs");

function edit_setting(element) {
    $("#sms_rep_codes").html(element.getAttribute("data-code"));
    $("#sms_template").val(element.getAttribute("data-template"));
    $("#template_id").val(element.getAttribute("data-id"));
    $('#smste_model').modal('show');
}

function save_template() {

    $.post(BASE_URL + 'api/update_sms_template', {sms_template: $("#sms_template").val(), template_id: $("#template_id").val()}, function (data) {
        if (data == "1") {
            window.location.reload();
        }
    });

}

function add_to_template(element) {

    var template = $("#sms_template").val() + element.innerHTML;
    $("#sms_template").val(template);

}
