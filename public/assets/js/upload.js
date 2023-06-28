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
            uploader.start();
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
            uploader.start();
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
            document.getElementById('filelist3').innerHTML = '';

            document.getElementById('uploadfiles3').onclick = function () {
                uploader3.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                document.getElementById('filelist3').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
            uploader.start();
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
    url: BASE_URL + 'web/upload/4',
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
                uploader4.start();
                return false;
            };
        },

        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                document.getElementById('filelist4').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
            uploader.start();
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
                document.getElementById('filelist5').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
            uploader.start();
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
                document.getElementById('filelist6').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
            uploader.start();
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
                document.getElementById('filelist7').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
            uploader.start();
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
                document.getElementById('filelist8').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
            uploader.start();
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
                document.getElementById('filelist9').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
            uploader.start();
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
                document.getElementById('filelist10').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
            uploader.start();
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
                document.getElementById('filelist11').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
            uploader.start();
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