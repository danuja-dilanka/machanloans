<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-md-4">
                        <h4 class="header-title"><?= $title ?></h4>
                    </div>
                    <div class="col-md-7">

                    </div>
                    <div class="col-md-1">
                        <?= isset($data) ? create_link("loan", "loan_pro", ["loan_pro", "add"], "+ New", "h6") : "" ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (count(validation_errors()) > 0) { ?>
                        <div class="alert alert-danger">
                            <?= validation_list_errors() ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= render_input('loan_name', 'Loan Name', isset($data) ? $data->loan_name : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('last_amount', 'Last Amount', isset($data) ? $data->last_amount : '', 'number', ['required' => true, "step" => '0.01']); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('int_rate', 'Interest Rate', isset($data) ? $data->int_rate : '', 'number', ['required' => true, "step" => '0.01']); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_custom_select("int_rate_per", ["Monthly", "Weekly"], "Interest Rate", isset($data) ? $data->int_rate_per : '', 'required="true"') ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('term', 'Term', isset($data) ? $data->term : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_custom_select("term_per", ["Monthly", "Weekly"], "Term Period", isset($data) ? $data->term_per : '', 'required="true"') ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('late_time_penl', 'Late Payment Penalties', isset($data) ? $data->late_time_penl : '50', 'text', ['required' => true, "readonly" => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_custom_select("status", ["Active", "Inactive"], "Status", isset($data) ? $data->status : '', 'required="true"') ?>
                        </div>
                        <div class="col-md-12">
                            <?= render_textarea('description', 'Description', isset($data) ? $data->description : '', ['required' => true]); ?>
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