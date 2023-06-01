<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <div class='row mb-4'>
        <div class="col-md-4">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-md-7">
            
        </div>
        <div class="col-md-1">
            <?php // create_link("member", "mem", "add", "+ New", "h6") ?>
        </div>
    </div>
    <table id="dt_tb" class="table" data-action="loans" style="width:100%">
        <thead>
            <tr>
                <th>Loan ID</th>
                <th>Loan Product</th>
                <th>Borrower</th>
                <th>Member No</th>
                <th>Release Date</th>
                <th>Applied Amount</th>
                <th>Status</th>
                <th class="dont_export">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <th>Loan ID</th>
                <th>Loan Product</th>
                <th>Borrower</th>
                <th>Member No</th>
                <th>Release Date</th>
                <th>Applied Amount</th>
                <th>Status</th>
                <th class="dont_export">Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<?= view('inc/footer') ?>