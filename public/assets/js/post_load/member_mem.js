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

                document.getElementById('uploadfiles' + index).onclick = function () {
                    uploader.start();
                    return false;
                };
            },

            FilesAdded: function (up, files) {
                plupload.each(files, function (file) {
                    document.getElementById('filelist' + index).innerHTML += '<div id="' + file.id + '" class="filelist_info">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                });
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
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span style="cursor:pointer" class="text-danger remove_file" data-img="' + unic_id + "_img" + '" data-src="' + upload_path + "__" + file.name + '" data-type="' + unic_id + '">X</span>';
                document.getElementById(unic_id + "_img").src = img_src + "/" + file.name;
                document.getElementById(unic_id).value = file.name;
                $(".filelist_info").removeClass("active_record");
                document.getElementById(file.id).classList.add("active_record");
            }
        }
    });

    uploader.init();
}

do_upload(1, "loan_req__nic__friend1f");
do_upload(2, "loan_req__nic__friend1b");
do_upload(3, "loan_req__nic__friend2f");
do_upload(4, "loan_req__nic__friend2b");
do_upload(5, "loan_req__selfie");
do_upload(6, "loan_req__fb_screenshot");
do_upload(7, "loan_req__electricity_bill");
do_upload(8, "loan_req__nic__back");
do_upload(9, "loan_req__nic__front");


$(document).on('click', '.remove_file', function () {
    var ele = $(this);
    $.post(BASE_URL + 'api/remove_file', {src: ele.data('src'), type: ele.data('type')}, function (data) {
        if (ele.parent().hasClass("active_record") && data == "1") {
            $("#" + ele.data("img")).attr("src", BASE_URL + "public/images/no-image.png");
        }
    });
});