$('select[name="user_types"]').selectpicker({
    liveSearch: true,
    liveSearchNormalize: true,
    liveSearchStyle: 'startsWith'
}).ajaxSelectPicker({
    ajax: {
        url: BASE_URL + "/api/user_types",
        type: 'POST',
        data: function () {
            var query = {
                search: '{{{q}}}'
            };
            return query;
        }
    },
    locale: {
        emptyTitle: 'Search'
    },
    preprocessData: function (data) {
        var items = [];
        if (data.hasOwnProperty('items')) {
            var len = data.items.length;
            for (var i = 0; i < len; i++) {
                var curr = data.items[i];
                items.push({'value': curr.id, 'text': curr.text});
            }
        }
        return items;
    },
    preserveSelected: false
});