var templates = {"rating": ["Ratings", rating_template]};

function get_template(type, key) {
    var mod_template = templates[type];
    mod_template[1] = mod_template[1].replace(/KEY/g, key);
    return mod_template;
}

function open_rating(element) {
    var template = get_template(element.getAttribute('data-type'), element.getAttribute('data-key'));
    $.sweetModal({
        title: template[0],
        content: template[1],
        theme: $.sweetModal.THEME_DARK
    });
}