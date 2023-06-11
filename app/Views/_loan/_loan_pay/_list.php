<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <div class='row mb-4'>
        <div class="col-md-4">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-md-7">
            
        </div>
        <div class="col-md-1">
            <?= create_link("loan", "loan_pay", "add", "+ New", "h6") ?>
        </div>
    </div>
    <table id="dt_tb" class="table" data-action="loans_pay" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Loan ID</th>
                <th>Payment Date</th>
                <th>Principal Amount</th>
                <th>Interest</th>
                <th>Late Penalties</th>
                <th>Proof</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th class="dont_export">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Loan ID</th>
                <th>Payment Date</th>
                <th>Principal Amount</th>
                <th>Interest</th>
                <th>Late Penalties</th>
                <th>Proof</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th class="dont_export">Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<?= view('inc/footer') ?>