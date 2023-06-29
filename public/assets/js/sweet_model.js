var rating_template = "<div class='row'><div class='rate'><input type='radio' id='star5' name='rate' value='5' /><label for='star5' title='text'>5 stars</label><input type='radio' id='star4' name='rate' value='4' /><label for='star4' title='text'>4 stars</label><input type='radio' id='star3' name='rate' value='3' /><label for='star3' title='text'>3 stars</label><input type='radio' id='star2' name='rate' value='2' /><label for='star2' title='text'>2 stars</label><input type='radio' id='star1' name='rate' value='1' /><label for='star1' title='text'>1 star</label></div><div class='col-sm-12'></div><div class='col-sm-12'><textarea class='form-control' placeholder='Description'></textarea></div><div class='row col-sm-12'><div class='col-sm-10'></div><div class='col-sm-2'><button type='button' class='btn btn-primary' onclick='add_rate(this)' data-id='KEY'>Submit</button></div></div></div>";
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