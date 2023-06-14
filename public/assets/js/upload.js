
// Custom example logic

var uploader = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles', // you can pass an id...
    container: document.getElementById('file_container'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload',
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
            document.getElementById('filelist').innerHTML = '';

            document.getElementById('uploadfiles').onclick = function () {
                uploader.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader.init();

var uploader2 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles2', // you can pass an id...
    container: document.getElementById('file_container2'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload/1',
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
            document.getElementById('filelist2').innerHTML = '';

            document.getElementById('uploadfiles2').onclick = function () {
                uploader2.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                document.getElementById('filelist2').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles2');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader2.init();

var uploader3 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles3', // you can pass an id...
    container: document.getElementById('file_container3'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload/2',
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
            document.getElementById('filelist3').innerHTML = '';

            document.getElementById('uploadfiles3').onclick = function () {
                uploader2.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                document.getElementById('filelist3').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles3');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader3.init();

var uploader4 = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles4', // you can pass an id...
    container: document.getElementById('file_container4'), // ... or DOM Element itself
    url: BASE_URL + 'web/upload/3',
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
            document.getElementById('filelist4').innerHTML = '';

            document.getElementById('uploadfiles4').onclick = function () {
                uploader2.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                document.getElementById('filelist4').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function (up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function (up, err) {
            console.log(err.code + " : " + err.message);
        },

        FileUploaded: function (up, file) {
            var base = document.getElementById('pickfiles4');
            document.getElementById(base.getAttribute('data-id') + "_img").src = base.getAttribute('data-src') + "/" + file.name;
            document.getElementById(base.getAttribute('data-id')).value = file.name;
        }
    }
});

uploader4.init();