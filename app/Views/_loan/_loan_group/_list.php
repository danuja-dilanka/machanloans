<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <div class='row mb-4'>
        <div class="col-md-4">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-md-7">
            
        </div>
        <div class="col-md-1">
            <?php create_link("loan", "loan_group", ["group_data", "add"], "+ New", "h6") ?>
        </div>
    </div>
    <table id="dt_tb" class="table" data-action="loan_groups" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Group Name</th>
                <th>Member limit</th>
                <th>Members</th>
                <th>Group Type</th>
                <th class="dont_export">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Group Name</th>
                <th>Member limit</th>
                <th>Members</th>
                <th>Group Type</th>
                <th class="dont_export">Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<?= view('inc/footer') ?>