<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <div class='row mb-4'>
        <div class="col-md-4">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-md-7">

        </div>
        <div class="col-md-1">
            <?= create_link("loan", "new_loan", ["loan", "add"], "+ New", "h6") ?>
        </div>
    </div>
    <div class="mb-4 row">
        <div class="">
            <button type="button" id="status" data-unic="1" data-id="0" data-type="0" class="filter btn btn-default" style="border: none;">Active</button>&nbsp;
            <button type="button" id="status" data-unic="1" data-id="1" data-type="0" class="filter btn btn-default" style="border: none;">Inactive</button>&nbsp;
            <button type="button" id="status" data-unic="1" data-id="2" data-type="0" class="filter btn btn-default" style="border: none;">Finished</button>&nbsp;
            <a href="<?= current_url() ?>" class="btn btn-info">X</a>&nbsp;
            <br><br>
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