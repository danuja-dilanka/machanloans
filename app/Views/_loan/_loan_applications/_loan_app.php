<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Add New Loan</h4>
                </div>
                <div class="card-body">
                    <?php if (count(validation_errors()) > 0) { ?>
                        <div class="alert alert-danger">
                            <?= validation_list_errors() ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= render_input('loan_id', 'Loan ID', isset($data) ? $data->first_name : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_select('loan_type', model("Loan_model")->get_pro_data(0, 1), array('id', 'loan_name'), 'Loan Product', '', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('first_pay_dt', 'First Payment Date', isset($data) ? $data->first_pay_dt : '', 'date', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('rel_date', 'Release Date', isset($data) ? $data->rel_date : '', 'date', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('apply_amount', 'Applied Amount', isset($data) ? $data->apply_amount : '', 'number', ['required' => true, "step" => "0.01"]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('late_pay_penl', 'Late Payment Penalties', isset($data) ? $data->late_pay_penl : '', 'number', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('description', 'Description', isset($data) ? $data->description : '', []); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('remark', 'Remarks', isset($data) ? $data->remark : '', []); ?>
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