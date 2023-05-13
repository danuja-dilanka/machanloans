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
                                <?= render_input('loan_name', 'Loan Name', isset($data) ? $data->loan_name : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('last_amount', 'Last Amount', isset($data) ? $data->last_amount : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('int_rate', 'Interest Rate', isset($data) ? $data->int_rate : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_custom_select("int_rate_per", ["Monthly", "Yearly"], "Interest Rate", isset($data) ? $data->int_rate_per : '', 'required="true"') ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('term', 'Term', isset($data) ? $data->term : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_custom_select("term_per", ["Monthly", "Yearly"], "Term Period", isset($data) ? $data->term_per : '', 'required="true"') ?>
                            </div>
                            <div class="col-md-6">
                               <?= render_input('late_time_penl', 'Late Payment Penalties', isset($data) ? $data->late_time_penl : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_custom_select("status", ["Active", "Inactive"], "Status", isset($data) ? $data->status : '', 'required="true"') ?>
                            </div>
                            <div class="col-md-12">
                                <?= render_textarea('desc', 'Description', isset($data) ? $data->desc : '', ['required' => true]); ?>
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