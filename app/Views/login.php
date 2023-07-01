<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>public/uploads/media/logo.png">

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
                            <div class="card card-signin p-3 my-5">
                                <div class="card-body">
                                    <img class="logo" src="<?= base_url() ?>public/uploads/media/logo.png">
                                    <h5 class="text-center py-4">Login To Your Account</h5> 
                                    <?php if (count(validation_errors()) > 0) { ?>
                                        <div class="alert alert-danger">
                                            <?= validation_list_errors() ?>
                                        </div>
                                    <?php } ?>
                                    <?= form_open_multipart(base_url("login"), array('data-parsley-validate' => 'true')); ?>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email" required="" autofocus="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">	
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                            <label class="custom-control-label" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-lg btn-block btn-danger">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-12">
                                            <a class="btn-link" href="https://machan.quicksoft.lk/password/reset">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-12">
                                            <a href="<?= base_url("loan_application") ?>" class="btn btn-lg btn-block btn-danger">
                                                Loan Application
                                            </a>						
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