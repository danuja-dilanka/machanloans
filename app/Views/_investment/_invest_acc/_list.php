<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <div class='row mb-4'>
        <div class="col-md-4">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-md-7">
            
        </div>
        <div class="col-md-1">
            <?= create_link("investment", "invest_acc", ["invest_acc", "add"], "+ New", "h6") ?>
        </div>
    </div>
    <table id="dt_tb" class="table" data-action="invest_acc" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Investor Name</th>
                <th>Address</th>
                <th>Birthday</th>
                <th>Investment Time</th>
                <th>Phone</th>
                <th>Profit percentage</th>
                <th>Status</th>
                <th>Bank Details</th>
                <th class="dont_export">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Investor Name</th>
                <th>Address</th>
                <th>Birthday</th>
                <th>Investment Time</th>
                <th>Phone</th>
                <th>Profit percentage</th>
                <th>Status</th>
                <th>Bank Details</th>
                <th class="dont_export">Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<?= view('inc/footer') ?>