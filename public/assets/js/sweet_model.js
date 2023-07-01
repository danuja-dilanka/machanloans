var rating_template = "<div class='row'><div class='rate'><input type='radio' id='star5' name='rate' value='5' class='KEY'/><label for='star5' title='text'>5 stars</label><input type='radio' id='star4' name='rate' value='4' class='KEY' /><label for='star4' title='text'>4 stars</label><input type='radio' id='star3' name='rate' value='3' class='KEY' /><label for='star3' title='text'>3 stars</label><input type='radio' id='star2' name='rate' value='2' class='KEY' /><label for='star2' title='text'>2 stars</label><input type='radio' id='star1' name='rate' value='1' class='KEY' /><label for='star1' title='text'>1 star</label></div><div class='col-sm-12'></div><div class='col-sm-12'><textarea class='form-control' placeholder='Description' id='des__KEY'></textarea></div><div class='row col-sm-12'><div class='col-sm-10'></div><div class='col-sm-2'><hr><button type='button' class='btn btn-primary' onclick='add_rate(this)' data-id='KEY'>Submit</button></div></div></div>";
var templates = {"rating": ["Ratings", rating_template]};

function get_template(type, key) {
    var mod_template = templates[type];
    mod_template[1] = mod_template[1].replace(/KEY/g, key);
    alert(mod_template[1]);
    return mod_template;
}

function open_rating(element) {
    var key = element.getAttribute('data-key');
    var template = get_template(element.getAttribute('data-type'), key);
    $.sweetModal({
        title: template[0],
        content: template[1]
//        theme: $.sweetModal.THEME_LIGHT
    });
    
    $("#star" + element.getAttribute('data-rate')).attr('checked', true);
    $("#des__" + key).val(element.getAttribute('data-rate_des'));
}

function add_rate(ele){
    ele.setAttribute('disabled', true);
    var data_key = ele.getAttribute('data-id');
    var rate = 0;
    var description = $("#des__" + data_key).val().trim();
    var rates = $("." + data_key), tmp;
    for(let i = 0; i < rates.length; i++){
        tmp = rates.eq(i);
        if(tmp.is(':checked')){
            rate = tmp.val();
            break;
        }
    }
    
    $.post(BASE_URL + 'api/set_mem_rate', {user: data_key, rate : rate, description : description}, function(data){
        if(data == '1'){
            $.toast({
                heading: 'Alert',
                text: "Rating Added",
                position: 'bottom-right',
                showHideTransition: 'slide',
                icon: 'success'
            });
            
            var com_ele = $("#tbl_rate_act_" + data_key);
            com_ele.attr("data-rate", rate);
            com_ele.attr("data-rate_des", description);
            $("#rate_view_" + data_key).html(rate);
        }
        
        $(".sweet-modal-close-link").click();
        ele.removeAttribute('disabled');
    });
}