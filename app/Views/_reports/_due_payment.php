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
        <button type="button" id="repay_date" data-unic="1" data-id="<?= $today = date("Y-m-d") ?>" data-type="0" class="filter btn btn-secondary" style="border: 1px solid green;">Today</button>&nbsp;
        <button type="button" id="repay_date" data-unic="1" data-id="<?= date('Y-m-d', strtotime("$today +1 day")); ?>" data-type="0" class="filter btn btn-secondary">Tomorrow</button>&nbsp;
        <button type="button" id="repay_date" data-unic="1" data-id="<?= date('Y-m-d', strtotime("$today +7 days")); ?>" data-type="0" class="filter btn btn-secondary">Week</button>&nbsp;
    </div>
    <hr>
    <?= view('_reports/_sections/due_pay_tb') ?>
</div>
<?= view('inc/footer') ?>