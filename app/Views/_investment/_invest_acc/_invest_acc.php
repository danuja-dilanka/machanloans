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
                        <?= isset($data) ? create_link("investment", "invest_acc", ["invest_acc", "add"], "+ New", "h6") : "" ?>
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
                            <?= render_input('investor_name', 'Name', isset($data) ? $data->investor_name : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('birthday', 'Birthday', isset($data) ? $data->birthday : '', 'date', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_custom_select("invest_time", ["Monthly"], "Investment Time", isset($data) ? $data->invest_time : '', 'required="true"') ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('phone', 'Phone', isset($data) ? $data->phone : '', 'text', ['required' => true, 'maxlength' => 11, 'minlength' => 9]); ?>
                            <small>Phone Number Must Be In This Format: 947XXXXXXXX</small>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('profit_perc', 'Profit percentage', isset($data) ? $data->profit_perc : '', 'number', ['required' => true, "step" => '0.01']); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_custom_select("status", ["Active", "Inactive"], "Status", isset($data) ? $data->status : '', 'required="true"') ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('address', 'Address', isset($data) ? $data->address : '', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('bank_det', 'Bank Details', isset($data) ? $data->bank_det : '', ['required' => true]); ?>
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