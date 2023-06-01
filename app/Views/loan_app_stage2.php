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
                        <div class="col-md-5">
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
                                            <p>Please Pay Previous Loans</p>
                                            <table class="table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%">#</th>
                                                        <th style="width:70%">Description</th>
                                                        <th style="width:25%">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $p_periods = $prev_loan->p_periods;
                                                    for ($i = 0; $i < $prev_loan->p_periods; $i++) { ?>
                                                        <tr>
                                                            <td><?= $i +1 ?>&nbsp;<input type="checkbox" name="p_periods[]" /></td>
                                                            <td>Loan Period <?= $p_periods++ ?></td>
                                                            <td>LKR. <?= number_format($prev_loan->p_charge, 2, ".", ",") ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>
                                    <h5 class="text-center py-4"><?= $lng == 'si' ? "හැදුනුම්පත් අංකය" : "Enter NIC" ?></h5> 
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input name="nic" id="text" placeholder="<?= $lng == 'si' ? "හැදුනුම්පත් අංකය" : "Enter NIC" ?>" type="text" class="form-control" minlength="10" maxlength="12" required><br>
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><?= $lng == 'si' ? "තහවුරු කරන්න" : "Submit" ?></button>
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
    </body>
</html>