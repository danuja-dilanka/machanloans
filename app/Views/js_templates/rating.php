<style>
    /* SWEET ALERT ----------------- */

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;    
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;  
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }

    /* SWEET ALERT ----------------end */
</style>

<!--<div class='row'>
    <div class='col-sm-10'>
        <div class='rate'>
            <input type='radio' id='star5' name='rate' value='5' /><label for='star5' title='text'>5 stars</label>
            <input type='radio' id='star4' name='rate' value='4' /><label for='star4' title='text'>4 stars</label>
            <input type='radio' id='star3' name='rate' value='3' /><label for='star3' title='text'>3 stars</label>
            <input type='radio' id='star2' name='rate' value='2' /><label for='star2' title='text'>2 stars</label>
            <input type='radio' id='star1' name='rate' value='1' /><label for='star1' title='text'>1 star</label>
        </div>
    </div>
    <div class='col-sm-2'>
        <button type="button" class="btn btn-info">Submit</button>
    </div>
    <div class='col-sm-12'>
        <textarea class='form-control' placeholder='Description'></textarea>
    </div>
</div>-->
