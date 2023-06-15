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

                                    <div class="text-center"><hr>
                                        <?php if ($lng != "si") { ?>
                                            <p>Thank you for joining the low-interest, short-term loan system under the Manchan Project Loan Scheme. We hope that you have read and understood the terms and conditions before joining. Let us inform you that you will enter. Only if you agree with the conditions, give the following information and get the loan facility. Please note that the following information is essential to avail the loan.<br></p>
                                        <?php } else { ?>
                                            <p>මචං ව්‍යාපෘති ණය යෝජනා ක්‍රමය  යටතේ අඩු පොළී , කෙටි කාලීන ණය ක්‍රමය හා සම්බන්ධ වූ ඔබට ස්තූති.මේ සදහා සම්බන්ධ වීමට පෙර මෙයට අදාල කොන්දේසි මාලාව හොදින් කියවා තේරුම් ගෙන ඇතැයි විශ්වාස කරමු.එහි සදහන් කොන්දේසි කඩ කරන ඕනෑම මොහොතක ඔබේ අනන්‍යතාව හෙලි කර නීත්‍යානුකූල ක්‍රියාමාර්ග සදහා පිවිසෙන බවට දැනුම් දෙන්නෙමු.එහි ඇති කොන්දේසි හා එකඟ වන්නේ නම් පමණක් පහත තොරතුරු ලබා දී ණය පහසු කම ලබා ගන්න. ණය ලබා ගැනීම සදහා පහත තොරතුරු අත්‍යාවශ්‍ය බව කරුණාවෙන් සලකන්න.         </p>
                                        <?php } ?>
                                        <hr>
                                    </div>
                                    <?= form_open_multipart(base_url("loan_application/guarantors/$lng/$req_id"), array('data-parsley-validate' => 'true')); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><?= $lng != "si" ? "Name of a friend who is not a relative (01)" : "ඥාතියෙකු නොවන මිතුරෙකුගේ නම (01)" ?><span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="friend1_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><?= $lng != "si" ? "Telephone number of a friend who is not a relative (01)" : "ඥාතියෙකු නොවන මිතුරෙකුගේ දුරකථන අංකය (01)" ?><span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="friend1_phone" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?= $lng != "si" ? "Address of a friend who is not a relative (01)" : "ඥාතියෙකු නොවන මිතුරෙකුගේ ලිපිනය (01)" ?><span class="required"> *</span></label>
                                                <textarea type="text" class="form-control" name="friend1_address" value="" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label"><?= $lng != "si" ? "A photograph of a non-relative friend's ID card (01) Front" : "ඥාති නොවන මිතුරෙකුගේ හැඳුනුම්පත (01) ඉදිරිපස ඡායාරූපයක්" ?> (20MB)<span class="required"> *</span></label><br>
                                                <img id="friend1f_nic_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist5"></div><br>
                                                    <div id="file_container5" style="position: relative;">
                                                        <a class="btn btn-sm btn-default" id="pickfiles5" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/friend1f") ?>" data-id="friend1f_nic">Select</a> 
                                                        <a class="btn btn-sm btn-primary" id="uploadfiles5" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="friend1f_nic" class="dropify" name="friend1f_nic" multiple="false" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label"><?= $lng != "si" ? "A photograph of a non-relative friend's ID card (01) Back" : "ඥාති නොවන මිතුරෙකුගේ හැඳුනුම්පත පිටුපස ඡායාරූපයක් (01)" ?> (20MB)<span class="required"> *</span></label><br>
                                                <img id="friend1b_nic_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist6"></div><br>
                                                    <div id="file_container6" style="position: relative;">
                                                        <a class="btn btn-sm btn-default" id="pickfiles6" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/friend1b") ?>" data-id="friend1b_nic">Select</a> 
                                                        <a class="btn btn-sm btn-primary" id="uploadfiles6" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="friend1b_nic" class="dropify" name="friend1b_nic" multiple="false" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><?= $lng != "si" ? "Name of a friend who is not a relative (02)" : "ඥාතියෙකු නොවන මිතුරෙකුගේ නම (01)" ?><span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="friend2_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><?= $lng != "si" ? "Telephone number of a friend who is not a relative (02)" : "ඥාතියෙකු නොවන මිතුරෙකුගේ දුරකථන අංකය (02)" ?><span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="friend2_phone" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?= $lng != "si" ? "Address of a friend who is not a relative (02)" : "ඥාතියෙකු නොවන මිතුරෙකුගේ ලිපිනය (02)" ?><span class="required"> *</span></label>
                                                <textarea type="text" class="form-control" name="friend2_address" value="" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label"><?= $lng != "si" ? "A photograph of a non-relative friend's ID card (02) Front" : "ඥාති නොවන මිතුරෙකුගේ හැඳුනුම්පත (02) ඉදිරිපස ඡායාරූපයක්" ?> (20MB)<span class="required"> *</span></label><br>
                                                <img id="friend2f_nic_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist7"></div><br>
                                                    <div id="file_container7" style="position: relative;">
                                                        <a class="btn btn-sm btn-default" id="pickfiles7" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/friend2f") ?>" data-id="friend2f_nic">Select</a> 
                                                        <a class="btn btn-sm btn-primary" id="uploadfiles7" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="friend2f_nic" class="dropify" name="friend2f_nic" multiple="false" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label"><?= $lng != "si" ? "A photograph of a non-relative friend's ID card (02) Back" : "ඥාති නොවන මිතුරෙකුගේ හැඳුනුම්පත පිටුපස ඡායාරූපයක් (02)" ?> (20MB)<span class="required"> *</span></label><br>
                                                <img id="friend2b_nic_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist8"></div><br>
                                                    <div id="file_container8" style="position: relative;">
                                                        <a class="btn btn-sm btn-default" id="pickfiles8" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/nic/friend2b") ?>" data-id="friend2b_nic">Select</a> 
                                                        <a class="btn btn-sm btn-primary" id="uploadfiles8" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="friend2b_nic" class="dropify" name="friend2b_nic" multiple="false" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label"><?= $lng != "si" ? "Enter a selfie photograph taken with the ID in hand, with the face clearly visible" : "හැදුනුම්පත අතේ තබාගෙන , මුහුණ පැහැදිලිව පෙනෙන සේ ලබා ගන්නා ලද සෙල්ෆි ජායාරූපයක් ඇතුලත් කරන්න" ?> (20MB)<span class="required"> *</span></label><br>
                                                <img id="selfie_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist9"></div><br>
                                                    <div id="file_container9" style="position: relative;">
                                                        <a class="btn btn-sm btn-default" id="pickfiles9" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/selfie") ?>" data-id="selfie">Select</a> 
                                                        <a class="btn btn-sm btn-primary" id="uploadfiles9" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="selfie" class="dropify" name="selfie" multiple="false" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label"><?= $lng != "si" ? "Attach your Facebook Screen Shot here" : "ඔබේ මුහුණු පොතෙහි ( Facebook ) තිර රුවක් ( Screen Shot) මෙහි අමුණන්න" ?> <br>(20MB)<span class="required"> *</span></label><br>
                                                <img id="fb_screenshot_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist10"></div><br>
                                                    <div id="file_container10" style="position: relative;">
                                                        <a class="btn btn-sm btn-default" id="pickfiles10" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/fb_screenshot") ?>" data-id="fb_screenshot">Select</a> 
                                                        <a class="btn btn-sm btn-primary" id="uploadfiles10" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="fb_screenshot" class="dropify" name="fb_screenshot" multiple="false" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group text-center">
                                                <label class="control-label"><?= $lng != "si" ? "Attach a photo of the electricity bill here, (otherwise any document that can verify the address so that the address is clearly visible)" : "විදුලි බිලෙහි ජායාරූපයක් මෙහි අමුණන්න, (නැතිනම් ලිපිනය තහවුරු කර ගත හැකි ඕනෑම ලියවිල්ලක් ලිපිනය පැහැදිලිව පෙනෙන ලෙස) " ?> (20MB)<span class="required"> *</span></label><br>
                                                <img id="electricity_bill_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                                    <div id="filelist11"></div><br>
                                                    <div id="file_container11" style="position: relative;">
                                                        <a class="btn btn-sm btn-default" id="pickfiles11" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/electricity_bill") ?>" data-id="electricity_bill">Select</a> 
                                                        <a class="btn btn-sm btn-primary" id="uploadfiles11" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                                    </div><br>
                                                </div>
                                                <input type="hidden" id="electricity_bill" class="dropify" name="electricity_bill" multiple="false" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group" style="margin-left: 2%">
                                            <input type="hidden" name="loan" value="<?= $req_id ?>" required readonly/>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
<script type="text/javascript" src="<?= base_url() ?>public/assets/js/plupload.full.min.js"></script>
<script src="<?= base_url() ?>public/assets/js/upload.js?v=13"></script>
</body>
</html>