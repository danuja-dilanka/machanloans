    </div><!--End main content-->

    </div><!--End Page Container-->
    
    <script>
        var BASE_URL = '<?= base_url() ?>';
    </script>
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
    <script src="<?= base_url() ?>public/assets/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/jquery-confirm.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>public/assets/js/scripts.js?v=1.1"></script>

    <?php if ($notify = session()->getFlashdata('notify')) { 
        $alert = explode("||", $notify);
        ?>
        <!-- NOTIDICATION -->
        <script type="text/javascript">
            $.toast({
                heading: 'Alert',
                text: "<?= count($alert) > 1 ? $alert[1] : $notify ?>",
                position: 'bottom-right',
                showHideTransition: 'slide',
                icon: '<?= count($alert) > 1 ? $alert[0] : 'success' ?>'
            });
        </script>
    <?php } ?>

    <!-- Custom JS -->
    <script src="<?= base_url() ?>public/plugins/chartJs/chart.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/dashboard.js?v=1.1"></script>
    
    <!-- DATATABLE JS -->
    <script src="<?= base_url() ?>public/assets/js/datatables/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/datatables/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/datatables/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>public/assets/js/datatables/datatables.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/init_db.js"></script>

    </body>
</html>