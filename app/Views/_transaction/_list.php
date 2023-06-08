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
    <table id="dt_tb" class="table" data-action="members" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Member</th>
                <th>Account Number</th>
                <th>Amount</th>
                <th>Debit/Credit</th>
                <th>Type</th>
                <th>Status</th>
                <th class="dont_export">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Member</th>
                <th>Account Number</th>
                <th>Amount</th>
                <th>Debit/Credit</th>
                <th>Type</th>
                <th>Status</th>
                <th class="dont_export">Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<?= view('inc/footer') ?>