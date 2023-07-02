function live_update() {
    $.post(BASE_URL + 'api/get_summary', function (data) {
        var details = JSON.parse(data);
        if (details.total_members !== undefined) {
            $("#total_members").html("<b>" + details.total_members + "</b>");
        }
        if (details.total_pending_loans !== undefined) {
            $("#total_pending_loans").html("<b>" + details.total_pending_loans + "</b>");
        }
        if (details.total_withdraw_request !== undefined) {
            $("#total_withdraw_request").html("<b>" + details.total_withdraw_request + "</b>");
        }
        if (details.deposit_request !== undefined) {
            $("#deposit_request").html("<b>" + details.deposit_request + "</b>");
        }
    });
}

live_update();
setInterval(live_update, 3600000);

//Expense By Category Chart
if (document.getElementById('expenseOverview')) {
    $.ajax({
        url: BASE_URL + "/api/json_expense_by_category",
        type: 'POST',
        success: function (data2) {
            var json2 = JSON.parse(data2);

            const ctx = document.getElementById('expenseOverview').getContext('2d');
            const expenseOverviewChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: json2['category'],
                    datasets: [
                        {
                            data: json2['amounts'],
                            backgroundColor: json2['colors']
                        }
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: $lang_expense_overview
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    return " " + context.label + ": " + _currency + " " + context.parsed;
                                },
                            },
                        },
                    }
                },
            });
        }
    });
}

//Deposit VS Withdraw Analytics
if (document.getElementById('transactionAnalysis')) {
    var chartCurrency = _currency;
    const transactionAnalysis = document.getElementById('transactionAnalysis').getContext('2d');
    const transactionAnalysisChart = new Chart(transactionAnalysis, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                    label: $lang_deposit,
                    data: [],
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.2)',
                    ],
                    borderColor: [
                        'rgba(46, 204, 113, 1.0)',
                    ],
                    yAxisID: "y",
                    borderWidth: 1
                },
                {
                    label: $lang_withdraw,
                    data: [],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    yAxisID: "y",
                    borderWidth: 1
                }]
        },
        options: {
            interaction: {
                mode: "index",
                intersect: false,
            },
            responsive: true,
            stacked: true,
            scales: {
                y: {
                    type: "linear",
                    display: true,
                    position: "left",
                    ticks: {
                        callback: function (value, index, values) {
                            return chartCurrency + ' ' + value;
                        },
                    },
                },
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.dataset.label || "";

                            if (
                                    context.parsed.y !== null &&
                                    context.dataset.yAxisID == "y"
                                    ) {
                                label += ": " + chartCurrency + ' ' + context.parsed.y;
                            } else {
                                label += ": " + context.parsed.y;
                            }

                            return label;
                        },
                    },
                },
            },
        },
    });


    function loadChart(currency_id) {
        $.ajax({
            url: BASE_URL + "/api/json_deposit_withdraw_analytics",
            type: 'POST',
            success: function (data) {
                var json = JSON.parse(data);

                transactionAnalysisChart.data.labels = json['month'];
                transactionAnalysisChart.data.datasets[0].data = [
                    typeof json['deposit'][0] !== "undefined" ? json['deposit'][1] : 0,
                    typeof json['deposit'][1] !== "undefined" ? json['deposit'][2] : 0,
                    typeof json['deposit'][2] !== "undefined" ? json['deposit'][3] : 0,
                    typeof json['deposit'][3] !== "undefined" ? json['deposit'][4] : 0,
                    typeof json['deposit'][4] !== "undefined" ? json['deposit'][5] : 0,
                    typeof json['deposit'][5] !== "undefined" ? json['deposit'][6] : 0,
                    typeof json['deposit'][6] !== "undefined" ? json['deposit'][7] : 0,
                    typeof json['deposit'][7] !== "undefined" ? json['deposit'][8] : 0,
                    typeof json['deposit'][8] !== "undefined" ? json['deposit'][9] : 0,
                    typeof json['deposit'][9] !== "undefined" ? json['deposit'][10] : 0,
                    typeof json['deposit'][10] !== "undefined" ? json['deposit'][11] : 0,
                    typeof json['deposit'][11] !== "undefined" ? json['deposit'][12] : 0,
                ];
                transactionAnalysisChart.data.datasets[1].data = [
                    typeof json['withdraw'][0] !== "undefined" ? json['withdraw'][1] : 0,
                    typeof json['withdraw'][1] !== "undefined" ? json['withdraw'][2] : 0,
                    typeof json['withdraw'][2] !== "undefined" ? json['withdraw'][3] : 0,
                    typeof json['withdraw'][3] !== "undefined" ? json['withdraw'][4] : 0,
                    typeof json['withdraw'][4] !== "undefined" ? json['withdraw'][5] : 0,
                    typeof json['withdraw'][5] !== "undefined" ? json['withdraw'][6] : 0,
                    typeof json['withdraw'][6] !== "undefined" ? json['withdraw'][7] : 0,
                    typeof json['withdraw'][7] !== "undefined" ? json['withdraw'][8] : 0,
                    typeof json['withdraw'][8] !== "undefined" ? json['withdraw'][9] : 0,
                    typeof json['withdraw'][9] !== "undefined" ? json['withdraw'][10] : 0,
                    typeof json['withdraw'][10] !== "undefined" ? json['withdraw'][11] : 0,
                    typeof json['withdraw'][11] !== "undefined" ? json['withdraw'][12] : 0,
                ];
                transactionAnalysisChart.update();
            }
        });
    }

    loadChart(_base_currency_id);
    $(document).on('change', '.filter-select', function () {
        var currency_id = $(this).val();
        chartCurrency = $(this).find(':selected').data('symbol');
        loadChart(currency_id);
    });
}

$(document).on('change', '#branch-switch', function () {});

$(document).ready(function () {
    load_data(BASE_URL + 'get_ajax_data/' + $("#due_pay_tb").data('action'), 0, "#due_pay_tb");
    load_data(BASE_URL + 'get_ajax_data/' + $("#repay_tb").data('action'), 0, "#repay_tb");
});
