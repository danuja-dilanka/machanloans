<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Machan Loans</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="ud60emEjZnCcLQ0s7gPJPblE7XE7v1ofszjJVwa7">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>public/uploads/media/file_1677691710.png">
        
        <link href="<?= base_url() ?>public/plugins/dropify/css/dropify.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>public/plugins/sweet-alert2/css/sweetalert2.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>public/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>public/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="<?= base_url() ?>public/plugins/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet">

        <!-- App Css -->
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/4.6.2_dist_css_bootstrap.min.css">
        <!--<link rel="stylesheet" href="<?= base_url() ?>public/plugins/bootstrap/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/fontawesome.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/themify-icons.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/plugins/metisMenu/metisMenu.css">

        <!-- Others css -->
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/typography.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/default-css.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/styles.css?v=1.3">
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/responsive.css?v=1.0">
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/jquery.toast.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/jquery-confirm.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/jquery.sweet-modal.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/searchPanes.dataTables.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/select.dataTables.min.css">
        
        <!-- DATATABLE CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/datatables.min.css">

        <!-- Modernizr -->
        <script src="<?= base_url() ?>public/assets/js/vendor/modernizr-3.6.0.min.js"></script>    
        
        <!-- Google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&amp;display=swap" rel="stylesheet">

        <script type="text/javascript">
            var _url = "<?= base_url() ?>";
            var _admin_url = "<?= base_url() ?>/admin";
            var _media_url = "<?= base_url() ?>/media/get_table_data";
            var _date_format = "Y-m-d";
            var _backend_direction = "ltr";
            var _currency = "₨";
            var _base_currency_id = "4";
            
            var $lang_alert_title = "Are you sure?";
        	var $lang_alert_message = "Once deleted, you will not be able to recover this information !";
        	var $lang_confirm_button_text = "Yes, delete it!";
        	var $lang_cancel_button_text = "Cancel";
            var $lang_no_data_found = "No Data Found";
        	var $lang_showing = "Showing";
        	var $lang_to = "to";
        	var $lang_of = "of";
        	var $lang_entries = "Entries";
        	var $lang_showing_0_to_0_of_0_entries = "Showing 0 To 0 Of 0 Entries";
        	var $lang_show = "Show";
        	var $lang_loading = "Loading...";
        	var $lang_processing = "Processing...";
        	var $lang_search = "Search";
        	var $lang_no_matching_records_found = "No matching records found";
        	var $lang_first = "First";
        	var $lang_last = "Last";
        	var $lang_next = "Next";
        	var $lang_previous = "Previous";
        	var $lang_copy = "Copy";
        	var $lang_excel = "Excel";
        	var $lang_pdf = "PDF";
        	var $lang_print = "Print";
        	var $lang_add_new = "Add New";
        	var $lang_select_one = "Select One";
        	var $lang_expense_overview = "Expense Overview";
        	var $lang_deposit = "Deposit";
        	var $lang_withdraw = "Withdraw";
        </script>	
    </head>

    <body class="   pace-done pace-done">
        <div class="pace  pace-inactive pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>  
        <!-- Main Modal -->
        <div id="main_modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title mt-0 text-white"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="alert alert-danger d-none m-3"></div>
                    <div class="alert alert-secondary d-none m-3"></div>			  
                    <div class="modal-body overflow-hidden"></div>

                </div>
            </div>
        </div>

        <!-- Secondary Modal -->
        <div id="secondary_modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title mt-0 text-white"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="alert alert-danger d-none m-3"></div>
                    <div class="alert alert-secondary d-none m-3"></div>			  
                    <div class="modal-body overflow-hidden"></div>
                </div>
            </div>
        </div>

        <!-- Preloader area start -->
        <div id="preloader" style="display: none;"></div>
        <!-- Preloader area end -->

        <?php if(!isset($no_nav)){ ?>
        <div class="page-container">
            <!-- sidebar menu area start -->
            <?= view('inc/side_nav') ?>
            <!-- sidebar menu area end -->

            <!-- main content area start -->
            <div class="main-content">
                <?= view('inc/top_nav') ?>
            <?php }else{ ?>
        <div class="page-container sbar_collapsed">
            <div class="main-content">
            <?php } ?>