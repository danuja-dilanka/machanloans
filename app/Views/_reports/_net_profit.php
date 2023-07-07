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
    <div class="row">
        <div class="col-md-6 mb-2">
            <div class="text-right">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="date" id="date_from" data-id="" data-type="0" class="filter_select form-control" value=""/>
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="date_to" data-id="" data-type="0" class="filter_select form-control" value=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table id="dt_tb" class="table" data-action="net_profit_report" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Balance</th>
            </tr>
        </tfoot>
    </table>
</div>
<?= view('inc/footer') ?>