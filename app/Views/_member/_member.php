<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Add New Member</h4>
                </div>
                <div class="card-body">
                    <?php if (count(validation_errors()) > 0) { ?>
                        <div class="alert alert-danger">
                            <?= validation_list_errors() ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= render_input('first_name', 'First Name', isset($data) ? $data->first_name : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('last_name', 'Last Name', isset($data) ? $data->last_name : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-3">
                            <?= render_input('nic', 'NIC', isset($data) ? $data->nic : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-3">
                            <?= render_input('member_no', 'Member No', isset($data) ? $data->member_no : "MLM-" . model("Member_model")->get_nxt_mem_no(), 'text', ['required' => true, "readonly" => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('birthday', 'Birthday', isset($data) ? $data->birthday : '', 'date', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('business_name', 'Business Name', isset($data) ? $data->business_name : '', 'text'); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('email', 'Email', isset($data) ? $data->email : '', 'email', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('mobile', 'Mobile', isset($data) ? $data->mobile : '', 'number', ['required' => true]); ?>
                            <small>Phone Number Must Be In This Format: 947XXXXXXXX</small>
                        </div>
                        <div class="col-md-6">
                            <?= render_custom_select("gender", ["Male", "Female"], "Gender", isset($data) ? $data->gender : '', 'required="true"') ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('city', 'City', isset($data) ? $data->city : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('address', 'Address', isset($data) ? $data->address : '', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('cred_address', 'Current Residential Address', isset($data) ? $data->cred_address : '', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('job_or_business', 'Job or business', isset($data) ? $data->job_or_business : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= render_textarea('working_address', 'Address of place of employment or business', isset($data) ? $data->working_address : '', ['required' => true]); ?>
                        </div>
                        <div class="col-md-12">
                            <?= render_input('rel_friend1', 'Name of non-relative friend 1', isset($data) ? $data->rel_friend1 : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Front photograph of the National Identity Card (20MB)<span class="required"> *</span></label>
                                <img id="rel_friend1_nic_front_img" alt="" src="<?= isset($data) ? base_url("public/images/loan_req/nic/friend1f") . "/" . $data->rel_friend1_nic_front : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist1"></div><br>
                                    <div id="file_container1" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles1" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/friend1f") ?>" data-id="rel_friend1_nic_front">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles1" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="rel_friend1_nic_front" class="" name="rel_friend1_nic_front" multiple="false" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Back photograph of the National Identity Card (20MB)<span class="required"> *</span></label>
                                <img id="rel_friend1_nic_back_img" alt="" src="<?= isset($data) ? base_url("public/images/loan_req/nic/friend1b") . "/" . $data->rel_friend1_nic_back : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist2"></div><br>
                                    <div id="file_container2" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles2" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/friend1b") ?>" data-id="rel_friend1_nic_back">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles2" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="rel_friend1_nic_back" class="" name="rel_friend1_nic_back" multiple="false" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?= render_input('rel_friend2', 'Name of non-relative friend 2', isset($data) ? $data->rel_friend2 : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Front photograph of the National Identity Card (20MB)<span class="required"> *</span></label>
                                <img id="rel_friend2_nic_front_img" alt="" src="<?= isset($data) ? base_url("public/images/loan_req/nic/friend2f") . "/" . $data->rel_friend2_nic_front : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist3"></div><br>
                                    <div id="file_container3" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles3" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/friend2f") ?>" data-id="rel_friend2_nic_front">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles3" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="rel_friend2_nic_front" class="" name="rel_friend2_nic_front" multiple="false" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Back photograph of the National Identity Card (20MB)<span class="required"> *</span></label>
                                <img id="rel_friend2_nic_back_img" alt="" src="<?= isset($data) ? base_url("public/images/loan_req/nic/friend2b") . "/" . $data->rel_friend2_nic_back : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist4"></div><br>
                                    <div id="file_container4" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles4" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/friend2b") ?>" data-id="rel_friend2_nic_back">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles4" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="rel_friend2_nic_back" class="" name="rel_friend2_nic_back" multiple="false" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <label class="control-label">Electricity Bill Photo (20MB)<span class="required"> *</span></label>
                                <img id="electricity_bill_img" alt="" src="<?= isset($data) ? base_url("public/images/loan_req/electricity_bill") . "/" . $data->electricity_bill : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist7"></div><br>
                                    <div id="file_container7" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles7" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/electricity_bill") ?>" data-id="electricity_bill">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles7" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="electricity_bill" class="" name="electricity_bill" multiple="false" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">A Selfie photograph taken with the ID card in hand, with the face clearly visible (20MB)<span class="required"> *</span></label>
                                <img id="selfie_img" alt="" src="<?= isset($data) ? base_url("public/images/loan_req/selfie") . "/" . $data->selfie : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist5"></div><br>
                                    <div id="file_container5" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles5" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/selfie") ?>" data-id="selfie">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles5" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="selfie" class="" name="selfie" multiple="false" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Facebook Screenshot (20MB)<span class="required"> *</span></label>
                                <img id="fb_screenshot_img" alt="" src="<?= isset($data) ? base_url("public/images/loan_req/fb_screenshot") . "/" . $data->fb_screenshot : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist6"></div><br>
                                    <div id="file_container6" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles6" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/fb_screenshot") ?>" data-id="fb_screenshot">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles6" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="fb_screenshot" class="" name="fb_screenshot" multiple="false" required="">
                            </div>
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