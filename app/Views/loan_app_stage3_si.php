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
                                        <p>මචං ව්‍යාපෘති ණය යෝජනා ක්‍රමය  යටතේ අඩු පොළී , කෙටි කාලීන ණය ක්‍රමය හා සම්බන්ධ වූ ඔබට ස්තූති.මේ සදහා සම්බන්ධ වීමට පෙර මෙයට අදාල කොන්දේසි මාලාව හොදින් කියවා තේරුම් ගෙන ඇතැයි විශ්වාස කරමු.එහි සදහන් කොන්දේසි කඩ කරන ඕනෑම මොහොතක ඔබේ අනන්‍යතාව හෙලි කර නීත්‍යානුකූල ක්‍රියාමාර්ග සදහා පිවිසෙන බවට දැනුම් දෙන්නෙමු.එහි ඇති කොන්දේසි හා එකඟ වන්නේ නම් පමණක් පහත තොරතුරු ලබා දී ණය පහසු කම ලබා ගන්න. ණය ලබා ගැනීම සදහා පහත තොරතුරු අත්‍යාවශ්‍ය බව කරුණාවෙන් සලකන්න.         </p>

                                    </div>
                                    <?php $loan_detail_banner = get_option("loan_detail_banner"); ?>
                                    <img alt="plans" src="<?= ($loan_detail_banner) != null ? base_url("public/images/loan_detail_banner") . "/" . $loan_detail_banner : base_url("public/uploads") . "/media/plans.png" ?>" width="100%" style="width:100%">
                                    <?= form_open_multipart(base_url("web/request_loan/$lng"), array('data-parsley-validate' => 'true')); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    ලබා ගැනීමට බලාපොරොත්තු වන ණය සැලසුම. <br>
                                                    <span>(නිද- ඔබ ලබා ගන්නේ රු. 20,000/= මුදලක් මාස දෙකෙන් සති පතා ගෙවීමට නම් එහිදී ණය  සැලසුම ලෙස ඔබ සටහන් කල යුත්තේ D 4 ලෙසය.</span>
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
                                                <label class="control-label">නම<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="name" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">වාසගම සහිත නම<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="full_name" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">උපන් දිනය<span class="required"> *</span></label>
                                                <input type="date" class="form-control" name="birthday" value="" placeholder="YYYY-MM-DD" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">නගරය<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="city" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">විද්‍යුත් තැපෑල<span class="required"> *</span></label>
                                                <input type="email" class="form-control" name="email" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">හැදුනුම්පතේ සහිත ලිපිනය<span class="required"> *</span></label>
                                                <textarea class="form-control" name="residential_address" rows="4" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">වර්ථමාන පදිංචි ලිපිනය<span class="required"> *</span></label>
                                                <textarea class="form-control" name="current_address" rows="4" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">රැකියාව හෝ ව්‍යාපාරය<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="employment" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">රැකියා හෝ ව්‍යාපාර ස්තානයේ ලිපිනය<span class="required"> *</span></label>
                                                <textarea class="form-control" name="employment_address" rows="4" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">දුරකතන අංකය<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="phone" minlength="10" maxlength="11" value="" required="">
                                                <small>දුරකථන අංකය මෙම ආකෘතියේ තිබිය යුතුය: 947XXXXXXXX</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">වට්ස් ඇප් අංකය<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="whatsapp" minlength="10" maxlength="11" value="" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">ජාතික හැදුනුම්පත් අංකය<span class="required"> *</span></label>
                                                <input type="text" class="form-control" name="nic" value="" minlength="10" maxlength="12" required="">
                                                <small>* ජාතික හැඳුනුම්පත් අංකයට නිවැරදි ඉලක්කම් දිග තිබිය යුතුය</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">විවාහක අවිවාහක බව<span class="required"> *</span></label>
                                                <select class="form-control" name="marital_status" required="">
                                                    <option value="0" selected="">අවිවාහක</option>
                                                    <option value="1">විවාහක</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">මචං සීට්ටු හා රැදී සිටි කාලය (දින)</label>
                                                <input type="text" class="form-control" name="membership_age" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">රැදී සිටි සමූහයන්ගේ නම්</label>
                                                <input type="text" class="form-control" name="memberships" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">මුදල් බැර කල යුතු බැංකු ගිණුම් තොරතුරු
                                                    (ලබා දී ඇති හැදුනුම්පතේ සදහන් නමට ඇති ගිණුමක් විය යුතුයි)
                                                    නම
                                                    ගිණුම් අංකය
                                                    බැංකුව
                                                    ශාඛාව<span class="required"> *</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label"><span class="required">බැංකුවේ නම *</span></label>
                                                <input type="text" class="form-control" name="bank_name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label"><span class="required">ශාඛාවේ නම *</span></label>
                                                <input type="text" class="form-control" name="branch_name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label"><span class="required">ගිණුම් අංකය *</span></label>
                                                <input type="text" class="form-control" name="acc_number" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label">ජාතික හැදුනුම්පතෙහි ජායාරූපයක් (20MB)<span class="required"> *</span></label><br>
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
                                                <label class="control-label">ජාතික හැදුනුම්පතෙහි ජායාරූපයක් (20MB)<span class="required"> *</span></label><br>
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
                                                <label class="control-label">කාලත්‍රයාගේ නම (අවිවාහක නම් මවගේ/පියාගේ)</label>
                                                <input type="text" class="form-control" name="spouse_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">කාලත්‍රයාගේ දුරකතන අංකය (අවිවාහක නම් මවගේ/පියාගේ)</label>
                                                <input type="text" class="form-control" name="spouse_tel_number" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label class="control-label">කාලත්‍රයාගේ හැදුනුම්පතෙහි ජායාරූපයක්(දෙපසම) මෙහි අමුණන්න. (අවිවාහක නම් මවගේ/පියාගේ) (20MB)<span class="required"> *</span></label><br>
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
                                                <label class="control-label">කාලත්‍රයාගේ හැදුනුම්පතෙහි ජායාරූපයක්(දෙපසම) මෙහි අමුණන්න. (අවිවාහක නම් මවගේ/පියාගේ) (20MB)<span class="required"> *</span></label><br>
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <hr>
                                                <button type="submit" class="btn btn-lg btn-block btn-danger">තහවුරු කරන්න</button>
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
        <script src="<?= base_url() ?>public/assets/js/upload.js?v=2.0"></script>
    </body>
</html>