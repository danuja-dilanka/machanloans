<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url()); ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Add New Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?= render_input('first_name', 'First Name', isset($data) ? $data->first_name : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('last_name', 'Last Name', isset($data) ? $data->last_name : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('member_no', 'Member No', isset($data) ? $data->member_no : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('birthday', 'Birthday', isset($data) ? $data->birthday : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('business_name', 'Business Name', isset($data) ? $data->business_name : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('email', 'Email', isset($data) ? $data->email : '', 'email', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('mobile', 'Mobile', isset($data) ? $data->mobile : '', 'number', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_custom_select("gender", ["Male", "Female"], "Gender", isset($data) ? $data->gender : '', 'required="true"') ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('city', 'City', isset($data) ? $data->city : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-12">
                                <?= render_textarea('address', 'Address', isset($data) ? $data->address : '', ['required' => true]); ?>
                            </div>
                            <div class="col-md-12">
                                <?= render_input('photo', 'Photo', '', 'file', ['required' => true]); ?>
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
                                <input type="checkbox" id="client_login" value="1" name="client_login" data-parsley-multiple="client_login">
                            </h4>
                        </div>
                    </div>
                    <div class="card-body" id="client_login_card">
                        <div class="row">
                            <div class="col-md-12">
                                <?= render_input('login_email', 'Email', isset($data) ? $data->email : '', 'email'); ?>
                            </div>
                            <div class="col-md-12">
                                <?= render_input('password', 'Password', '', 'password'); ?>
                            </div>
                            <div class="col-md-12">
                                <?= render_custom_select("status", ["Active", "In Active"], "Status", isset($data) ? $data->status : '', 'required="true"') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?= form_close(); ?>	
</div>
<?= view('inc/footer') ?>