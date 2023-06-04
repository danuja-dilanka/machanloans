<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <div class='row mb-4'>
        <div class="col-md-4">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-md-7">
            
        </div>
        <div class="col-md-1">
            <?php create_link("loan", "loan_pro", "add", "+ New", "h6") ?>
        </div>
    </div>
    <table id="dt_tb" class="table" data-action="loans_pros" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Loan Name</th>
                <th>Last Amount</th>
                <th>Interest Rate</th>
                <th>Interest Rate Type</th>
                <th>Term</th>
                <th>Term Period</th>
                <th>Late Payment Penalties</th>
                <th>Status</th>
                <th>Description</th>
                <th class="dont_export">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Loan Name</th>
                <th>Last Amount</th>
                <th>Interest Rate</th>
                <th>Interest Rate Type</th>
                <th>Term</th>
                <th>Term Period</th>
                <th>Late Payment Penalties</th>
                <th>Status</th>
                <th>Description</th>
                <th class="dont_export">Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<?= view('inc/footer') ?>