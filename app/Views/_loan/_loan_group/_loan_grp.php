<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url()); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title"><?= $title ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?= render_input('loan_name', 'Group Name', isset($data) ? $data->loan_name : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('last_amount', 'Member limit', isset($data) ? $data->last_amount : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo render_select('vehicle', [], array('id', 'veh_num'), 'Select Vehicle', isset($data) ? $fuel_det->vehicle : '', [], array(), '', '', false); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_custom_select("int_rate_per", ["Loan Group", "Seettu"], "Group Type", isset($data) ? $data->int_rate_per : '', 'required="true"') ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="ti-check-box"></i>&nbsp;Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?= form_close(); ?>	
</div>
<?= view('inc/footer') ?>