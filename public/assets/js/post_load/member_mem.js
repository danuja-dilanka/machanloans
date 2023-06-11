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
                    document.getElementById('filelist' + index).innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
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
                document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
                document.getElementById(base.getAttribute('data-id')).value = file.name;
            }
        }
    });
    
    uploader.init();
}

do_upload(1, "loan_req__nic__friend1f");
do_upload(2, "loan_req__nic__friend1b");
do_upload(3, "loan_req__nic__friend2f");
do_upload(4, "loan_req__nic__friend2b");