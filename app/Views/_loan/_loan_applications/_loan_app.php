<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-8">
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
                        <div class="col-md-3">
                            <?= render_input('first_pay_dt', 'First Payment Date', isset($data) ? $data->nic : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-3">
                            <?= render_input('apply_amount', 'Applied Amount', isset($data) ? $data->member_no : "MPL-" . model("Member_model")->get_nxt_mem_no(), 'text', ['required' => true, "readonly" => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('birthday', 'Loan Product', isset($data) ? $data->birthday : '', 'date', []); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('business_name', 'Currency', isset($data) ? $data->business_name : '', 'text'); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('email', 'Release Date', isset($data) ? $data->email : '', 'email', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('mobile', 'Applied Amount', isset($data) ? $data->mobile : '', 'number', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('mobile', 'Late Payment Penalties', isset($data) ? $data->mobile : '', 'number', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('address', 'Description', isset($data) ? $data->address : '', []); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('google_location', 'Remarks', isset($data) ? $data->google_location : '', []); ?>
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
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="togglebutton">
                        <h4 class="header-title d-flex align-items-center">Login Details&nbsp;&nbsp;
                            <input type="checkbox" id="client_login" value="1" name="client_login" data-parsley-multiple="client_login" <?= isset($data) && $data->client_login == 1 ? "checked" : null ?>>
                        </h4>
                    </div>
                </div>
                <div class="card-body" id="client_login_card">
                    <div class="row">
                        <div class="col-md-12">
                            <?= render_input('login_email', 'Email', isset($data) ? $data->login_email : '', 'email'); ?>
                        </div>
                        <div class="col-md-12">
                            <?= render_input('password', 'Password', '', 'password'); ?>
                        </div>
                        <div class="col-md-12">
                            <?= render_custom_select("status", ["Active", "In Active"], "Status", isset($data) ? $data->status : 1) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>	
</div>
<?= view('inc/footer') ?>