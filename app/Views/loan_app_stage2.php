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
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <?= form_open_multipart(base_url("loan_check/$lng"), array('data-parsley-validate' => 'true')); ?>
                                    <img class="logo" src="<?= base_url() ?>public/uploads/media/logo.png">
                                    <?php if (count(validation_errors()) > 0) { ?>
                                        <div class="alert alert-danger">
                                            <?= validation_list_errors() ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($prev_loan->id)) { ?>
                                        <div class="alert alert-danger">
                                            <p class="text-center"><?= $lng == 'si' ? "කරුණාකර ඔබගේ පෙර ණය ගෙවන්න" : "Please Pay Your Previous Loans" ?></p>
                                            <table class="table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width:20%">#</th>
                                                        <th style="width:50%"><?= $lng == 'si' ? "විස්තර" : "Please Pay Your Previous Loans" ?></th>
                                                        <th style="width:30%"><?= $lng == 'si' ? "වටිනාකම" : "Amount" ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $p_periods = $prev_loan->p_periods;
                                                    for ($i = 0; $i < $prev_loan->p_periods; $i++) {
                                                        $loan_pre = $i + 1;
                                                        ?>
                                                        <tr>
                                                            <td><?= $loan_pre ?>&nbsp;
                                                                <input type="checkbox" name="p_periods[]" data-val="<?= $prev_loan->p_charge ?>" value="<?= $loan_pre ?>" class="loan_check"/>
                                                            </td>
                                                            <td><?= $lng == 'si' ? "වාරිකය" : "Premium" ?> <?= $p_periods++ ?></td>
                                                            <td>LKR. <?= number_format($prev_loan->p_charge, 2, ".", ",") ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width:20%"></th>
                                                        <th style="width:50%;text-align:right"><?= $lng == 'si' ? "මුලු වටිනාකම" : "Total" ?></th>
                                                        <th style="width:30%" id="total_amount">LKR. 0.00</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-12 mb-2">
                                                <p class="text-center"><?= $lng == 'si' ? "බැංකු තොරතුරු" : "Bank Details" ?></p>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th><?= $lng == 'si' ? "බැංකුවේ නම" : "Bank Name" ?></th>
                                                            <th><?= $lng == 'si' ? "ශාඛාවේ නම" : "Branch Name" ?></th>
                                                            <th><?= $lng == 'si' ? "ගිණුම් අංකය" : "Account Number" ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $prev_loan->loan_details->bank_name ?> </td>
                                                            <td><?= $prev_loan->loan_details->branch_name ?> </td>
                                                            <td><?= $prev_loan->loan_details->acc_number ?> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <div class="form-group text-center">
                                                    <label class="control-label"><?= $lng == 'si' ? "ගෙවීම් සාක්ෂි" : "Payment Proof" ?> (20MB)<span class="required"> *</span></label><br>
                                                    <img id="bank_slip_img" alt="" src="<?= base_url("public/images") . "/no-image.png" ?>" height="150">
                                                    <div style="font: 13px Verdana; background: #eee; color: #333">
                                                        <div id="filelist"></div><br>
                                                        <div id="file_container" style="position: relative;">
                                                            <!--<a class="btn btn-sm btn-default" id="pickfiles" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/loan_proof") ?>" data-id="bank_slip"><?= $lng == 'si' ? "තෝරන්න" : "Select" ?></a>--> 
                                                            <a class="btn btn-danger btn-lg btn-block" id="uploadfiles" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none"><?= $lng == 'si' ? "උඩුගත කරන්න" : "Upload" ?></a>
                                                        </div><br>
                                                    </div>
                                                    <input type="hidden" name="total_amount">
                                                    <input type="hidden" name="nic" value="<?= isset($member->nic) ? $member->nic : "" ?>" required>
                                                    <input type="hidden" id="bank_slip" class="dropify" name="bank_slip" multiple="false" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block"><?= $lng == 'si' ? "තහවුරු කරන්න" : "Submit" ?></button>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <h5 class="text-center py-4"><?= $lng == 'si' ? "හැදුනුම්පත් අංකය" : "Enter NIC" ?></h5> 
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input name="nic" id="text" placeholder="<?= $lng == 'si' ? "හැදුනුම්පත් අංකය" : "Enter NIC" ?>" type="text" class="form-control" minlength="10" maxlength="12" required><br>
                                                <button type="submit" class="btn btn-danger btn-lg btn-block"><?= $lng == 'si' ? "තහවුරු කරන්න" : "Submit" ?></button>
                                            </div>
                                        </div>
                                    <?php } ?> 
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
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/js/plupload.full.min.js"></script>
        <script src="<?= base_url() ?>public/assets/js/loan_repay.js?v=1"></script>
    </body>
</html>