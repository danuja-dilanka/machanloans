<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <div class='row mb-4'>
        <div class="col-md-4">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-md-7">

        </div>
        <div class="col-md-1">
            <?= create_link("member", "mem", ["member", "add"], "+ New", "h6") ?>
        </div>
    </div>
    <div class="row mt-1 ml-1">
        <button type="button" id="status" data-unic="1" data-id="1" data-type="0" class="filter btn btn-secondary" style="border: 1px solid green;">Registered</button>&nbsp;
        <button type="button" id="status" data-unic="1" data-id="0" data-type="0" class="filter btn btn-danger">Unregistered</button>&nbsp;
    </div>
    <hr>
    <div class="table-responsive">
        <table id="dt_tb" class="table table-bordered" data-action="members" style="width:100%">
            <thead>
                <tr>
                    <th>Member No</th>
                    <th>NIC</th>
                    <th class="dont_export">Member Photo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th class="dont_export">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <th>Member No</th>
                    <th>NIC</th>
                    <th>Member Photo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th class="dont_export">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?= view('js_templates/rating') ?>
<?= view('inc/footer') ?>