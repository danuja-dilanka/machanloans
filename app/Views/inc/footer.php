    </div><!--End main content-->

    </div><!--End Page Container-->

    <!-- jQuery  -->
    <script src="<?= base_url() ?>public/assets/js/vendor/jquery-3.6.1.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/metisMenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?= base_url() ?>public/assets/js/print.js"></script>
    <script src="<?= base_url() ?>public/plugins/pace/pace.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/moment/moment.js"></script>

    <!-- Datatable js -->
    <script src="<?= base_url() ?>public/plugins/datatable/datatables.min.js"></script>

    <script src="<?= base_url() ?>public/plugins/dropify/js/dropify.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/sweet-alert2/js/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/select2/js/select2.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>public/plugins/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/parsleyjs/parsley.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/jquery.toast.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>public/assets/js/scripts.js?v=1.1"></script>

    <?php if ($notify = session()->getFlashdata('notify')) { ?>
        <script type="text/javascript">
            $.toast({
                heading: 'Alert',
                text: "<?= $notify ?>",
                position: 'bottom-right',
                showHideTransition: 'slide',
                icon: 'success'
            });
        </script>
    <?php } ?>

    <!-- Custom JS -->
    <script src="<?= base_url() ?>public/plugins/chartJs/chart.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/dashboard.js?v=1.1"></script>

    </body>
</html>