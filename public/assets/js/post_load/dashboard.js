function live_update() {
    $.post(BASE_URL + 'api/get_summary', function (data) {
        var details = JSON.parse(data);
        if (details.total_members !== undefined) {
            $("#total_members").html("<b>" + details.total_members + "</b>");
        }
        if (details.total_pending_loans !== undefined) {
            $("#total_pending_loans").html("<b>" + details.total_pending_loans + "</b>");
        }
    });
}

setInterval(live_update, 1000);