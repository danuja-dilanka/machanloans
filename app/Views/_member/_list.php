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
    <table id="dt_tb" class="table" data-action="members" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Member No</th>
                <th>Birthday</th>
                <th>Business Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>City</th>
                <th>Current Residential Address</th>
                <th>Job or business</th>
                <th>Name of non-relative friend 1</th>
                <th>Name of non-relative friend 2</th>
                <th class="dont_export">Electricity Bill</th>
                <th class="dont_export">Selfie</th>
                <th class="dont_export">Facebook Screenshot</th>
                <th class="dont_export">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Member No</th>
                <th>Birthday</th>
                <th>Business Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>City</th>
                <th>Current Residential Address</th>
                <th>Job or business</th>
                <th>Name of non-relative friend 1</th>
                <th>Name of non-relative friend 2</th>
                <th class="dont_export">Electricity Bill</th>
                <th class="dont_export">Selfie</th>
                <th class="dont_export">Facebook Screenshot</th>
                <th class="dont_export">Action</th>
            </tr>
        </tfoot>
    </table>
</div>

<?= view('js_templates/rating') ?>
<?= view('inc/footer') ?>