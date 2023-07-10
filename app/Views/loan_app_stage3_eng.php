<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>public/uploads/media/fav.png">

        <title>Machan Loans</title>

        <!-- Google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&amp;display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="<?= base_url() ?>public/plugins/bootstrap/css/bootstrap.min.css">
        <link href="<?= base_url() ?>public/auth/css/app.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="text-center">
                                        <img width="100" src="<?= base_url() ?>public/uploads/media/logo.png">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 text-center mb-5">
                                            <h3>Machan Project Loan ( මචං ව්‍යාපෘති ණය යෝජනා ක්‍රමය)</h3>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <p>
                                            Thank you for joining the low-interest, 
                                            short-term loan system under the project loan scheme. 
                                            We hope that you have read and understood the terms and 
                                            conditions before joining. Any time you violate the terms, 
                                            disclose your identity and take legal action. Let us inform 
                                            you that you will enter. Only if you agree with the conditions, 
                                            give the following information and get the loan facility. 
                                            Please note that the following information is essential to avail the loan.
                                        </p>
                                    </div>
                                    <?php $loan_detail_banner = get_option("loan_detail_banner"); ?>
                                    <img alt="plans" src="<?= ($loan_detail_banner) != null ? base_url("public/images/loan_detail_banner") . "/" . $loan_detail_banner : base_url("public/uploads") . "/media/plans.png" ?>" width="100%" style="width:100%">
                                    <?= form_open_multipart(base_url("web/request_loan/$lng"), array('data-parsley-validate' => 'true')); ?>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="control-label">Loan plan to be availed. < />
                                                    <span>(Sleep- If you are getting Rs. 20,000/= to be paid weekly for two months then you should write D 4 as the loan plan. *</span>
                                                    <span class="required"> *</span></label>
                                                <select class="form-control" name="loan_type" id="loan_type" required="">
                                                    <?php foreach ($products as $key => $value) { ?>
                                                        <option value="<?= $value->id ?>"><?= $value->loan_name . " (LKR. " . number_format($value->last_amount, 2, ".", ",") . ")" ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label"><br>Payment Mode<br></label>
                                                <select class="form-control" id="pay_type" name="temp_pay_type">
                                                    <option value="1">Monthly</option>
                                                    <option value="2">Weekly</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">First Name <span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="first_name" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Last Name <span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="last_name" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Name with Surname<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="full_name" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Date of Birth<span class="required"> *</span></label>
                                                <input type="date" class="form-control" name="birthday" value="" placeholder="YYYY-MM-DD" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">City<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="city" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Gender<span class="required"> *</span></label>
                                                <select class="form-control" name="gender" required="">
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Email <span class="required"> *</span></label>
                                                <input type="email" class="form-control" name="email" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Address on ID<span class="required"> *</span></label>
                                                <textarea class="form-control" name="residential_address" rows="4" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Current Residential Address<span class="required"> *</span></label>
                                                <textarea class="form-control" name="current_address" rows="4" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Google Location</label>
                                                <textarea class="form-control" name="google_location" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Job or business<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="employment" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Address of place of employment or business<span class="required"> *</span></label>
                                                <textarea class="form-control" name="employment_address" rows="4" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Phone number<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="phone" value="" minlength="10" maxlength="11" required="">
                                                <small>Phone Number Must Be In This Format: 947XXXXXXXX</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Whatsapp Number<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="whatsapp" value="" minlength="10" maxlength="11" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">National Identity Card Number<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="nic" value="" minlength="10" maxlength="12" required="">
                                                <small>* NIC Must Have Correct Digit Length</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Married Unmarried<span class="required"> *</span></label>
                                                <select class="form-control" name="marital_status" required="">
                                                    <option value="0" selected="">Unmarried</option>
                                                    <option value="1">Married</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">How long have you been involved with MACHAN? (days)</label>
                                                <input type="text" class="form-control" name="membership_age" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Names of the crowd</label>
                                                <input type="text" class="form-control" name="memberships" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Bank account details to which the money should be credited 
                                                    (must be an account in the name of the ID card provided) 
                                                    Name Account Number Bank Branch<span class="required"> *</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label"><span class="required">Bank Name *</span></label>
                                                <input type="text" class="form-control" name="bank_name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label"><span class="required">Branch Name *</span></label>
                                                <input type="text" class="form-control" name="branch_name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label"><span class="required">Account Number *</span></label>
                                                <input type="text" class="form-control" name="acc_number" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label">A photograph of the National Identity Card - Front (20MB)<span class="required"> *</span></label>
                                                <img id="nic_front_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist0"></div><br>
                                                    <div id="file_container0" style="position: relative;">
                                                        <a class="btn btn-lg btn-block btn-danger" id="pickfiles0" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/front") ?>" data-id="nic_front">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles0" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="nic_front" class="" name="nic_front" multiple="false" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label">A photograph of the National Identity Card - Back (20MB)<span class="required"> *</span></label>
                                                <img id="nic_back_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist2"></div><br>
                                                    <div id="file_container2" style="position: relative;">
                                                        <a class="btn btn-lg btn-block btn-danger" id="pickfiles2" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/back") ?>" data-id="nic_back">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles0" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="nic_back" class="" name="nic_back" multiple="false" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <lable class="control-label show_in_unmarried">Mother's/Father's Name *</lable>
                                                <label class="control-label show_in_married" style="display:none">Spouse's Name *</label>
                                                <input type="text" class="form-control" name="spouse_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <lable class="control-label show_in_unmarried">Mother's/Father's Number *</lable>
                                                <label class="control-label show_in_married" style="display:none">Spouse's Telephone Number *</label>
                                                <input type="text" class="form-control" name="spouse_tel_number" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <lable class="control-label show_in_unmarried">Mother's/Father's National Identity Card - Front * (20MB)</lable>
                                                <label class="control-label show_in_married" style="display:none">Spouse's National Identity Card - Front * (20MB)<span class="required"> *</span></label><br>
                                                <img id="spouse_nic_front_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist3"></div><br>
                                                    <div id="file_container3" style="position: relative;">
                                                        <a class="btn btn-lg btn-block btn-danger" id="pickfiles3" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/spouse_nic_front") ?>" data-id="spouse_nic_front">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles0" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="spouse_nic_front" class="" name="spouse_nic_front" multiple="false" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <lable class="control-label show_in_unmarried">Mother's/Father's National Identity Card - Back * (20MB)</lable>
                                                <label class="control-label show_in_married" style="display:none">Spouse's National Identity Card - Back * (20MB)<span class="required"> *</span></label><br>
                                                <img id="spouse_nic_back_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist4"></div><br>
                                                    <div id="file_container4" style="position: relative;">
                                                        <a class="btn btn-lg btn-block btn-danger" id="pickfiles4" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/spouse_nic_back") ?>" data-id="spouse_nic_back">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles0" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="spouse_nic_back" class="" name="spouse_nic_back" multiple="false" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Name of a friend who is not a relative (01)<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="friend1_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Telephone number of a friend who is not a relative (01)<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="friend1_phone" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Address of a friend who is not a relative (01)<span class="required"> *</span></label>
                                                <textarea type="text" class="form-control" name="friend1_address" value="" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Name of a friend who is not a relative (02)<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="friend2_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Telephone number of a friend who is not a relative (02)<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="friend2_phone" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Address of a friend who is not a relative (02)<span class="required"> *</span></label>
                                                <textarea type="text" class="form-control" name="friend2_address" value="" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <label class="control-label">Member Photo (20MB)<span class="required"> *</span></label><br>
                                                <img id="photo_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist12"></div><br>
                                                    <div id="file_container12" style="position: relative;">
                                                        <a class="btn btn-lg btn-block btn-danger" id="pickfiles12" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/member") ?>" data-id="photo">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles11" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="photo" class="dropify" name="photo" multiple="false" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <label class="control-label">Enter a selfie photograph taken with the ID in hand, with the face clearly visible (20MB)<span class="required"> *</span></label><br>
                                                <img id="selfie_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist9"></div><br>
                                                    <div id="file_container9" style="position: relative;">
                                                        <a class="btn btn-lg btn-block btn-danger" id="pickfiles9" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/selfie") ?>" data-id="selfie">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles9" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="selfie" class="dropify" name="selfie" multiple="false" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <label class="control-label">Attach your Facebook Screen Shot here <br>(20MB)<span class="required"> *</span></label><br>
                                                <img id="fb_screenshot_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist10"></div><br>
                                                    <div id="file_container10" style="position: relative;">
                                                        <a class="btn btn-lg btn-block btn-danger" id="pickfiles10" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/fb_screenshot") ?>" data-id="fb_screenshot">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles10" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="fb_screenshot" class="dropify" name="fb_screenshot" multiple="false" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group text-center">
                                                <label class="control-label">Attach a photo of the electricity bill here, (otherwise any document that can verify the address so that the address is clearly visible) (20MB)<span class="required"> *</span></label><br>
                                                <img id="electricity_bill_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist11"></div><br>
                                                    <div id="file_container11" style="position: relative;">
                                                        <a class="btn btn-lg btn-block btn-danger" id="pickfiles11" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/electricity_bill") ?>" data-id="electricity_bill">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles11" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="electricity_bill" class="dropify" name="electricity_bill" multiple="false" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-block btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script>
            var BASE_URL = '<?= base_url() ?>';
        </script>
        <script src="<?= base_url() ?>public/assets/js/vendor/jquery-3.6.1.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/js/plupload.full.min.js"></script>
        <script src="<?= base_url() ?>public/assets/js/upload.js?v=2.1"></script>
        <script src="<?= base_url() ?>public/assets/js/public_loan_app.js?v=1.2"></script>
    </body>
</html>