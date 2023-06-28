<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Loan Settings</h4>
                </div>
                <div class="card-body">
                    <?php if (count(validation_errors()) > 0) { ?>
                        <div class="alert alert-danger">
                            <?= validation_list_errors() ?>
                        </div>
                    <?php } ?>
                    <div class="col-md-12 row">
                        <div class="form-group text-center">
                            <label class="control-label">Loan Detail Image(30MB)<span class="required"> *</span></label><br>
                            <?php $loan_detail_banner = get_option("loan_detail_banner"); ?>
                            <img id="loan_detail_banner_img" alt="" src="<?= ($loan_detail_banner) != null ? base_url("public/images/loan_detail_banner") . "/" . $loan_detail_banner : base_url("public/uploads") . "/media/plans.png" ?>" height="150">
                            <div style="font: 13px Verdana; background: #eee; color: #333">
                                <div id="filelist1"></div><br>
                                <div id="file_container1" style="position: relative;">
                                    <a class="btn btn-sm btn-default" id="pickfiles1" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_detail_banner") ?>" data-id="loan_detail_banner">Select</a> 
                                    <a class="btn btn-sm btn-primary" id="uploadfiles1" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>
                                </div><br>
                            </div>
                            <input type="hidden" id="loan_detail_banner" value="<?= $loan_detail_banner ?>" name="loan_detail_banner" multiple="false">
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="ti-check-box"></i>&nbsp;Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>	
</div>
<?= view('inc/footer') ?>