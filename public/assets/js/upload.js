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

do_upload(0, "loan_req__nic__front");
do_upload(2, "loan_req__nic__back");
do_upload(3, "loan_req__nic__spouse_nic_front");
do_upload(4, "loan_req__nic__spouse_nic_back");

$(document).on('click', '.remove_file', function () {
    var ele = $(this);
    $.post(BASE_URL + 'api/remove_file', {src: ele.data('src'), type: ele.data('type')}, function (data) {
        if (data == "1") {
            if (ele.parent().parent().hasClass("active_record")) {
                $("#" + ele.data("img")).attr("src", BASE_URL + "public/images/no-image.png");
            }
            $("#" + ele.data("file")).remove();
        }
    });
});

var uploader5 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles5', // you can pass an id...
    container: document.getElementById('file_container5'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload/5',
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
            document.getElementById('filelist5').innerHTML = '';

            document.getElementById('uploadfiles5').onclick = function () {
                uploader5.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                uploader5.start();
                document.getElementById('filelist5').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles5');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader5.init();

var uploader6 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles6', // you can pass an id...
    container: document.getElementById('file_container6'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload/6',
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
            document.getElementById('filelist6').innerHTML = '';

            document.getElementById('uploadfiles6').onclick = function () {
                uploader6.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                uploader6.start();
                document.getElementById('filelist6').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles6');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader6.init();

var uploader7 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles7', // you can pass an id...
    container: document.getElementById('file_container7'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload/7',
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
            document.getElementById('filelist7').innerHTML = '';

            document.getElementById('uploadfiles7').onclick = function () {
                uploader7.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                uploader7.start();
                document.getElementById('filelist7').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles7');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader7.init();

var uploader8 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles8', // you can pass an id...
    container: document.getElementById('file_container8'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload/8',
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
            document.getElementById('filelist8').innerHTML = '';

            document.getElementById('uploadfiles8').onclick = function () {
                uploader8.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                uploader8.start();
                document.getElementById('filelist8').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles8');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader8.init();

var uploader9 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles9', // you can pass an id...
    container: document.getElementById('file_container9'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload/9',
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
            document.getElementById('filelist9').innerHTML = '';

            document.getElementById('uploadfiles9').onclick = function () {
                uploader9.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                uploader9.start();
                document.getElementById('filelist9').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles9');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader9.init();

var uploader10 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles10', // you can pass an id...
    container: document.getElementById('file_container10'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload/10',
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
            document.getElementById('filelist10').innerHTML = '';

            document.getElementById('uploadfiles10').onclick = function () {
                uploader10.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                uploader10.start();
                document.getElementById('filelist10').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles10');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader10.init();

var uploader11 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles11', // you can pass an id...
    container: document.getElementById('file_container11'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload/11',
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
            document.getElementById('filelist11').innerHTML = '';

            document.getElementById('uploadfiles11').onclick = function () {
                uploader11.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                uploader11.start();
                document.getElementById('filelist11').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles11');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader11.init();