<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>public/uploads/media/file_1677691710.png">

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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Loan plan to be availed. < />
                                                    <span>(Sleep- If you are getting Rs. 20,000/= to be paid weekly for two months then you should write D 4 as the loan plan. *</span>
                                                    <span class="required"> *</span></label>
                                                <select class="form-control" name="loan_type" required="">
                                                    <?php foreach ($products as $key => $value) { ?>
                                                        <option value="<?= $value->id ?>"><?= $value->loan_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Name <span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="name" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Name with Surname<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="full_name" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Date of Birth<span class="required"> *</span></label>
                                                <input type="date" class="form-control" name="birthday" value="" placeholder="YYYY-MM-DD" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Email <span class="required"> *</span></label>
                                                <input type="email" class="form-control" name="email" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Address on ID<span class="required"> *</span></label>
                                                <textarea class="form-control" name="residential_address" rows="4" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Current Residential Address<span class="required"> *</span></label>
                                                <textarea class="form-control" name="current_address" rows="4" required=""></textarea>
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
                                                <input type="text" class="form-control" name="phone" value="" required="">
                                                <small>Phone Number Must Be In This Format: 947XXXXXXXX</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Whatsapp Number<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="whatsapp" value="" required="">
                                                <small>Phone Number Must Be In This Format: 947XXXXXXXX</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">National Identity Card Number<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="nic" value="" minlength="10" maxlength="12" required="">
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
                                                <label class="control-label">Time to sit up and wait</label>
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
                                                <textarea class="form-control" name="bank_details" rows="4" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label">A photograph of the National Identity Card - Front (20MB)<span class="required"> *</span></label>
                                                <img id="nic_front_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist0"></div><br>
                                                    <div id="file_container0" style="position: relative;">
                                                        <a class="btn btn-sm btn-default" id="pickfiles0" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/front") ?>" data-id="nic_front">Select</a> 
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
                                                        <a class="btn btn-sm btn-default" id="pickfiles2" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/back") ?>" data-id="nic_back">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles0" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="nic_back" class="" name="nic_back" multiple="false" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Spouse's Name (Mother's/Father's if unmarried) *</label>
                                                <input type="text" class="form-control" name="spouse_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Spouse's Telephone Number (Mother's/Father's if unmarried) *</label>
                                                <input type="text" class="form-control" name="spouse_tel_number" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label">Attach a photograph (Front) of the applicant's ID card here. (Mother's/Father's if unmarried) (20MB)<span class="required"> *</span></label><br>
                                                <img id="spouse_nic_front_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist3"></div><br>
                                                    <div id="file_container3" style="position: relative;">
                                                        <a class="btn btn-sm btn-default" id="pickfiles3" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/spouse_nic_front") ?>" data-id="spouse_nic_front">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles0" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="spouse_nic_front" class="" name="spouse_nic_front" multiple="false" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label">Attach a photograph (Back) of the applicant's ID card here. (Mother's/Father's if unmarried) (20MB)<span class="required"> *</span></label><br>
                                                <img id="spouse_nic_back_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist4"></div><br>
                                                    <div id="file_container4" style="position: relative;">
                                                        <a class="btn btn-sm btn-default" id="pickfiles4" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/spouse_nic_back") ?>" data-id="spouse_nic_back">Select</a> 
                                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles0" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="spouse_nic_back" class="" name="spouse_nic_back" multiple="false" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Next</button>
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
        <script src="<?= base_url() ?>public/assets/js/upload.js?v=5"></script>
    </body>
</html>