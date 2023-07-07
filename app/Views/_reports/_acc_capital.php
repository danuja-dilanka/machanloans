<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <div class='row mb-4'>
        <div class="col-md-4">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-md-7">

        </div>
        <div class="col-md-1">
            <?php // create_link("member", "mem", ["member", "add"], "+ New", "h6") ?>
        </div>
    </div>
    <div class="row mt-1 ml-1">
        <div class="col-sm-4">
            <select class="filter_select form-control" id="member" data-tb='acc_capital_tb' data-type="0" data-live-search="true" data-id="">
                <option value="0">Select Member</option>
                <?php foreach ($members as $value) { ?>
                    <option value="<?= $value->id ?>"><?= $value->name_with_ini ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <hr>
    <?= view('_reports/_sections/acc_capital_tb') ?>
</div>
<?= view('inc/footer') ?>