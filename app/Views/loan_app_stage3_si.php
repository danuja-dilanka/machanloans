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
                                    <img alt="plans" src="https://machan.quicksoft.lk/public/uploads/media/plans.png" width="100%" style="width:100%">
                                    <form method="post" class="validate" autocomplete="off" action="https://machan.quicksoft.lk/loan-application" enctype="multipart/form-data" novalidate="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        ලබා ගැනීමට බලාපොරොත්තු වන ණය සැලසුම. <br>
                                                        <span>(නිද- ඔබ ලබා ගන්නේ රු. 20,000/= මුදලක් මාස දෙකෙන් සති පතා ගෙවීමට නම් එහිදී ණය  සැලසුම ලෙස ඔබ සටහන් කල යුත්තේ D 4 ලෙසය.</span>
                                                        <span class="required"> *</span></label>
                                                    <select class="form-control" name="loan_type" required="">
                                                        <option value="6">A-1</option>
                                                        <option value="7">B-2</option>
                                                        <option value="8">C-2</option>
                                                        <option value="9">D-3</option>
                                                        <option value="10">D-4</option>
                                                        <option value="11">E-3</option>
                                                        <option value="12">E-4</option>
                                                        <option value="13">E-5</option>
                                                        <option value="14">F-3</option>
                                                        <option value="15">F-4</option>
                                                        <option value="16">F-5</option>
                                                        <option value="17">F-6</option>
                                                        <option value="18">G-3</option>
                                                        <option value="19">G-4</option>
                                                        <option value="20">G-5</option>
                                                        <option value="21">G-6</option>
                                                        <option value="23">H-4</option>
                                                        <option value="24">H-3</option>
                                                        <option value="25">H-6</option>
                                                        <option value="26">H-5</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">ණය ගෙවීමේ ක්‍රමය<span class="required"> *</span></label>
                                                    <select class="form-control" name="payment_method" required="">
                                                        <option value="0" selected="">මාසික</option>
                                                        <option value="1">සති</option>
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

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">උපන් දිනය<span class="required"> *</span></label>
                                                    <input type="text" class="form-control" name="birthday" value="" placeholder="YYYY-MM-DD" required="">
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
                                                    <input type="text" class="form-control" name="phone" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">වට්ස් ඇප් අංකය<span class="required"> *</span></label>
                                                    <input type="text" class="form-control" name="whatsapp" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">ජාතික හැදුනුම්පත් අංකය<span class="required"> *</span></label>
                                                    <input type="text" class="form-control" name="nic" value="" required="">
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
                                                    <label class="control-label">මචං සීට්ටු හා රැදී සිටි කාලය</label>
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
                                                    <textarea class="form-control" name="bank_details" rows="4" required=""></textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">ජාතික හැදුනුම්පතෙහි ජායාරූපයක් (2MB)<span class="required"> *</span></label>
                                                    <input type="file" class="dropify" name="uploads[nic_front]" multiple="false" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">ජාතික හැදුනුම්පතෙහි ජායාරූපයක් (2MB)<span class="required"> *</span></label>
                                                    <input type="file" class="dropify" name="uploads[nic_front]" multiple="false" required="">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>