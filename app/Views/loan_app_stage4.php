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
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <img class="logo" src="<?= base_url() ?>public/uploads/media/logo.png">
                                    <h5 class="text-center py-4"><?= $lng != 'si' ? "Thank You!" : "ස්තූතියි!" ?></h5> 
                                    <div class="alert alert-success text-center">
                                        <?php if ($lng != 'si') { ?>
                                            <h4>Your Loan Is Under Approval</h4>
                                            <p>We'll Let You Know When It Will Be Approved!</p>
                                            <a href="<?= base_url() ?>" class="btn btn-primary btn-block">Back To Login</a>
                                        <?php } else { ?>
                                            <h4>ඔබගේ ණය අනුමැතිය යටතේ පවතී</h4>
                                            <p>එය අනුමත වූ පසු අපි ඔබට දන්වන්නෙමු!</p>
                                            <a href="<?= base_url() ?>" class="btn btn-primary btn-block">ප්‍රධාන පිටුවට</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>