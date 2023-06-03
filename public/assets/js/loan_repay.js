var uploader = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    multi_selection: false,
    browse_button: 'pickfiles', // you can pass an id...
    container: document.getElementById('file_container'), // ... or DOM Element itself
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

function cal_loan_total() {
    var total = 0, tmp, ele;
    var eles = $(".loan_check");
    for (let i = 0; i < eles.length; i++) {
        ele = eles.eq(i);
        if (ele.prop('checked')) {
            tmp = parseFloat(ele.data("val"));
            if (isNaN(tmp)) {
                tmp = 0;
            }
            
            total = total + tmp;
        }
    }
    
    return total.toFixed(2);
}

$(".loan_check").on('click', function () {
    var total = cal_loan_total();
    $("#total_amount").html("LKR. " + total);
    $("input[name='total_amount']").html("LKR. " + total);
});