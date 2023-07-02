//
// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
//
$.fn.dataTable.pipeline = function (opts, filterClass = 'active_filters') {
    var filters = [];
    filters["filters"] = [];
    var filter_eles = $("." + filterClass);
    for (let i = 0; i < filter_eles.length; i++) {
        let afilter = {};
        let ele = filter_eles.eq(i);
        var data_val;
        if (ele.attr('data-id') == undefined || ele.attr('data-id') == "") {
            data_val = ele.val().trim();
            if (data_val == "") {
                data_val = ele.html().trim();
            }
        } else {
            data_val = ele.attr('data-id');
        }

        afilter[ele.attr('id')] = [];

        var data_type = 0;
        if (ele.attr('data-type') != undefined) {
            data_type = ele.attr('data-type').trim();
        }
        afilter[ele.attr('id')].push(data_type);
        afilter[ele.attr('id')].push(data_val);

        filters["filters"].push(afilter);
    }

    // Configuration options
    var conf = $.extend(
            {
                pages: 5, // number of pages to cache
                url: '', // script url
                data: Object.assign({}, filters), // function or object with parameters to send to the server
                // matching how `ajax.data` works in DataTables
                method: 'GET' // Ajax HTTP method
            },
            opts
            );

    // Private variables for storing the cache
    var cacheLower = -1;
    var cacheUpper = null;
    var cacheLastRequest = null;
    var cacheLastJson = null;

    return function (request, drawCallback, settings) {
        var ajax = false;
        var requestStart = request.start;
        var drawStart = request.start;
        var requestLength = request.length;
        var requestEnd = requestStart + requestLength;

        if (settings.clearCache) {
            // API requested that the cache be cleared
            ajax = true;
            settings.clearCache = false;
        } else if (cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper) {
            // outside cached data - need to make a request
            ajax = true;
        } else if (
                JSON.stringify(request.order) !== JSON.stringify(cacheLastRequest.order) ||
                JSON.stringify(request.columns) !== JSON.stringify(cacheLastRequest.columns) ||
                JSON.stringify(request.search) !== JSON.stringify(cacheLastRequest.search)
                ) {
            // properties changed (ordering, columns, searching)
            ajax = true;
        }

        // Store the request for checking next time around
        cacheLastRequest = $.extend(true, {}, request);

        if (ajax) {
            // Need data from the server
            if (requestStart < cacheLower) {
                requestStart = requestStart - requestLength * (conf.pages - 1);

                if (requestStart < 0) {
                    requestStart = 0;
                }
            }

            cacheLower = requestStart;
            cacheUpper = requestStart + requestLength * conf.pages;

            request.start = requestStart;
            request.length = requestLength * conf.pages;

            // Provide the same `data` options as DataTables.
            if (typeof conf.data === 'function') {
                // As a function it is executed with the data object as an arg
                // for manipulation. If an object is returned, it is used as the
                // data object to submit
                var d = conf.data(request);
                if (d) {
                    $.extend(request, d);
                }
            } else if ($.isPlainObject(conf.data)) {
                // As an object, the data given extends the default
                $.extend(request, conf.data);
            }

            return $.ajax({
                type: conf.method,
                url: conf.url,
                data: request,
                dataType: 'json',
                cache: false,
                success: function (json) {
                    cacheLastJson = $.extend(true, {}, json);

                    if (cacheLower != drawStart) {
                        json.data.splice(0, drawStart - cacheLower);
                    }
                    if (requestLength >= -1) {
                        json.data.splice(requestLength, json.data.length);
                    }

                    drawCallback(json);
                }
            });
        } else {
            json = $.extend(true, {}, cacheLastJson);
            json.draw = request.draw; // Update the echo for each response
            json.data.splice(0, requestStart - cacheLower);
            json.data.splice(requestLength, json.data.length);

            drawCallback(json);
        }
    };
};

// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
$.fn.dataTable.Api.register('clearPipeline()', function () {
    return this.iterator('table', function (settings) {
        settings.clearCache = true;
    });
});

function load_data(data_url, refreshDT = 0, dt_tb = '#dt_tb') {

    var cols = $(dt_tb + " thead tr th");
    var prin_col = [];
    for (var i = 0; i < cols.length - 1; i++) {
        if (!cols.eq(i).hasClass('dont_export')) {
            prin_col.push(i);
        }
    }

    var options = {
        responsive: true,
        processing: true,
//        serverSide: true,
        fixedHeader: true,

        paging: true,
        pageLength: 10,

        ajax: $.fn.dataTable.pipeline({
            url: data_url,
            pages: 5
        }),

        scroller: {
            loadingIndicator: true
        },

        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: prin_col
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: prin_col
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: prin_col
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: prin_col
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: prin_col
                }
            }
        ]
    };



    if (refreshDT == 0) {
        $(dt_tb).DataTable(options);
    } else {
        $(dt_tb).DataTable().destroy();
        $(dt_tb).DataTable(options);
}
}

$('.filter').on('change click dblclick select', function () {
    var ele = $(this);

    if (ele.data("unic") !== undefined) {
        var actives = $(".active_filters");
        var tmp_act;
        for (let i = 0; i < actives.length; i++) {
            tmp_act = actives.eq(i);
            if (!tmp_act.hasClass("filter_select")) {
                tmp_act.removeClass("active_filters");
                tmp_act.css('border', 'none').fadeIn(200);
            }
        }
    }

    ele.toggleClass("active_filters");
    if (ele.hasClass("active_filters")) {
        ele.css('border', '1px solid green').fadeIn(200);
    } else {
        ele.css('border', 'none');
    }

    var dt_table = "#dt_tb";
//    var common_action = ele.data("action");
    if (ele.data("tb") != undefined) {
        dt_table = "#" + ele.data("tb");
    }

    load_data(BASE_URL + 'get_ajax_data/' + $(dt_table).data("action"), 1, dt_table);
});

$(document).on('change', '.filter_input', function () {
    var ele = $(this);
    ele.toggleClass("active_filters");
    if (ele.hasClass("active_filters")) {
        ele.css('border', '1px solid green').fadeIn(200);
    } else {
        ele.css('border', 'none');
    }

    var dt_table = "#dt_tb";
//    var common_action = ele.data("action");
    if (ele.data("tb") != undefined) {
        dt_table = "#" + ele.data("tb");
    }

    load_data(BASE_URL + 'get_ajax_data/' + $(dt_table).data("action"), 1, dt_table);
});

$(document).on('change', '.filter_select', function () {
    var ele = $(this);
    ele.css('border', '1px solid green').fadeIn(200);
    if (!ele.hasClass("active_filters")) {
        ele.addClass("active_filters");
    }

    var dt_table = "#dt_tb";
//    var common_action = ele.data("action");
    if (ele.data("tb") != undefined) {
        dt_table = "#" + ele.data("tb");
    }

    load_data(BASE_URL + 'get_ajax_data/' + $(dt_table).data("action"), 1, dt_table);
});

$("#dt_tb").hide();
$(document).ready(function () {
    $('.filter').css('border', 'none');
    $("#dt_tb").show();

    if ($("#dt_tb").length > 0) {
        var common_action = $("#dt_tb").data("action");
        load_data(BASE_URL + 'get_ajax_data/' + common_action);
    }
    
    if ($(".multiple_dt_tb").length > 0) {
        var eles = $(".multiple_dt_tb");
       for (let i = 0; i < eles.length; i++) {
            load_data(BASE_URL + 'get_ajax_data/' + eles.eq(i).data("action"));
       }
    }

});

if ($(".custom_dt_table").length > 0) {
    $(".custom_dt_table").DataTable();
}