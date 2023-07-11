<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>public/uploads/media/fav.png">

        <title>Amica Project Loans</title>

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
                            <div class="card card-signin my-5">
                                <div class="card-body">
                                    <img class="logo" src="<?= base_url() ?>public/uploads/media/logo.png">
                                    <h5 class="text-center py-4">Select Language</h5> 
                                    <a href="<?= base_url("loan_application/si") ?>" class="btn btn-lg btn-block btn-danger">සිංහල</a>
                                    <a href="<?= base_url("loan_application/eng") ?>" class="btn btn-secondary btn-lg btn-block">ENGLISH</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>