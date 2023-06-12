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
                            <?= render_input('member_no', 'Member No', isset($data) ? $data->member_no : "MPL-" . model("Member_model")->get_nxt_mem_no(), 'text', ['required' => true, "readonly" => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('birthday', 'Birthday', isset($data) ? $data->birthday : '', 'date', []); ?>
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
                            <?= render_custom_select("gender", ["Male", "Female"], "Gender", isset($data) ? $data->gender : '', '') ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_custom_select("civil_status", ["Married", "Unmarried"], "Civil Status", isset($data) ? $data->civil_status : '', '') ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('city', 'City', isset($data) ? $data->city : '', 'text', []); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('address', 'Address', isset($data) ? $data->address : '', []); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('google_location', 'Google location', isset($data) ? $data->google_location : '', []); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('cred_address', 'Current Residential Address', isset($data) ? $data->cred_address : '', []); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('working_address', 'Address of place of employment or business', isset($data) ? $data->working_address : '', []); ?>
                        </div>
                        <div class="col-md-12">
                            <?= render_input('job_or_business', 'Job or business', isset($data) ? $data->job_or_business : '', 'text', []); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Front photograph of the National Identity Card (20MB)</label>
                                <img id="nic_front_img" alt="" src="<?= isset($data->nic_front) ? base_url("public/images/loan_req/nic/front") . "/" . $data->nic_front : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist9"></div><br>
                                    <div id="file_container9" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles9" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/front") ?>" data-id="nic_front">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles9" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="nic_front" value="<?= isset($data) ? $data->nic_front : '' ?>" class="" name="nic_front" multiple="false">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Back photograph of the National Identity Card (20MB)</label>
                                <img id="nic_back_img" alt="" src="<?= isset($data->nic_back) ? base_url("public/images/loan_req/nic/back") . "/" . $data->nic_back : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist8"></div><br>
                                    <div id="file_container8" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles8" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/back") ?>" data-id="nic_back">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles8" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="nic_back" value="<?= isset($data) ? $data->nic_back : '' ?>" class="" name="nic_back" multiple="false">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('rel_friend1', 'Name of non-relative friend 1', isset($data) ? $data->rel_friend1 : '', 'text', []); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('rel_friend1_phone', 'Contact number of non-relative friend 1', isset($data) ? $data->rel_friend1_phone : '', 'text', []); ?>
                        </div>
                        <div class="col-md-12">
                            <?= render_textarea('rel_friend1_address', 'Address of non-relative friend 1', isset($data) ? $data->rel_friend1_address : '', []); ?>
                        </div>
                        <div class="col-md-6">
                             <?= render_input('rel_friend2', 'Name of non-relative friend 2', isset($data) ? $data->rel_friend2 : '', 'text', []); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('rel_friend2_phone', 'Contact number of non-relative friend 2', isset($data) ? $data->rel_friend2_phone : '', 'text', []); ?>
                        </div>
                        <div class="col-md-12">
                            <?= render_textarea('rel_friend2_address', 'Address of non-relative friend 2', isset($data) ? $data->rel_friend2_address : '', []); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Member Image (20MB)</label>
                                <img id="photo_img" alt="" src="<?= isset($data->photo) ? base_url("public/images/member") . "/" . $data->photo : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist1"></div><br>
                                    <div id="file_container1" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles1" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/member") ?>" data-id="photo">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles1" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="photo" value="<?= isset($data) ? $data->photo : '' ?>" class="" name="photo" multiple="false">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Bank statement (20MB)</label>
                                <img id="bank_statement_img" alt="" src="<?= isset($data->bank_statement) ? base_url("public/images/loan_req/bank_statement") . "/" . $data->bank_statement : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist2"></div><br>
                                    <div id="file_container2" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles2" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/bank_statement") ?>" data-id="bank_statement">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles2" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="bank_statement" value="<?= isset($data) ? $data->bank_statement : '' ?>" class="" name="bank_statement" multiple="false">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Husband or wife ID copy front (20MB)</label>
                                <img id="hw_nic_front_img" alt="" src="<?= isset($data->hw_nic_front) ? base_url("public/images/loan_req/nic/hw_nic_front") . "/" . $data->hw_nic_front : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist4"></div><br>
                                    <div id="file_container4" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles4" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/hw_nic_front") ?>" data-id="hw_nic_front">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles4" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="hw_nic_front" value="<?= isset($data) ? $data->hw_nic_front : '' ?>" class="" name="hw_nic_front" multiple="false">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Husband or wife ID copy back (20MB)</label>
                                <img id="hw_nic_back_img" alt="" src="<?= isset($data->hw_nic_back) ? base_url("public/images/loan_req/nic/hw_nic_back") . "/" . $data->hw_nic_back : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist10"></div><br>
                                    <div id="file_container10" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles10" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/hw_nic_back") ?>" data-id="hw_nic_back">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles10" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="hw_nic_back" value="<?= isset($data) ? $data->hw_nic_back : '' ?>" class="" name="hw_nic_back" multiple="false">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">GA Certificate (20MB)</label>
                                <img id="ga_certificate_img" alt="" src="<?= isset($data->ga_certificate) ? base_url("public/images/loan_req/ga_certificate") . "/" . $data->ga_certificate : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist3"></div><br>
                                    <div id="file_container3" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles3" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/ga_certificate") ?>" data-id="ga_certificate">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles3" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="ga_certificate" value="<?= isset($data) ? $data->ga_certificate : '' ?>" class="" name="ga_certificate" multiple="false">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Facebook Screenshot (20MB)</label>
                                <img id="fb_screenshot_img" alt="" src="<?= isset($data->fb_screenshot) ? base_url("public/images/loan_req/fb_screenshot") . "/" . $data->fb_screenshot : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist6"></div><br>
                                    <div id="file_container6" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles6" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/fb_screenshot") ?>" data-id="fb_screenshot">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles6" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="fb_screenshot" value="<?= isset($data) ? $data->fb_screenshot : '' ?>" class="" name="fb_screenshot" multiple="false">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <label class="control-label">Electricity Bill Photo (20MB)</label>
                                <img id="electricity_bill_img" alt="" src="<?= isset($data->electricity_bill) ? base_url("public/images/loan_req/electricity_bill") . "/" . $data->electricity_bill : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist7"></div><br>
                                    <div id="file_container7" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles7" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/electricity_bill") ?>" data-id="electricity_bill">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles7" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="electricity_bill" value="<?= isset($data) ? $data->electricity_bill : '' ?>" class="" name="electricity_bill" multiple="false">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <label class="control-label">A Selfie photograph taken with the ID card in hand, with the face clearly visible (20MB)</label>
                                <img id="selfie_img" alt="" src="<?= isset($data->selfie) ? base_url("public/images/loan_req/selfie") . "/" . $data->selfie : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist5"></div><br>
                                    <div id="file_container5" style="position: relative;">
                                        <a class="btn btn-sm btn-default" id="pickfiles5" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/selfie") ?>" data-id="selfie">Select</a> 
                                        <a class="btn btn-sm btn-primary" id="uploadfiles5" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                    </div><br>
                                </div>
                                <input type="hidden" id="selfie" class="" value="<?= isset($data) ? $data->selfie : '' ?>" name="selfie" multiple="false">
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