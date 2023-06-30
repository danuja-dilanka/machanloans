<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-md-4">
                        <h4 class="header-title"><?= $title ?></h4>
                    </div>
                    <div class="col-md-7">

                    </div>
                    <div class="col-md-1">
                        <?= isset($data) ? create_link("loan", "loan_pay", ["loan_pay", "add"], "+ New", "h6") : "" ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?= render_input('pay_date', 'Payment Date', isset($data) ? $data->pay_date : date("Y-m-d"), 'date', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_select('loan', model("Loan_model")->get_loan_req_data(0, 1), array('id', 'name'), 'Loan ID', isset($data) ? $data->loan : '', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $data_loaded = isset($data) ? [["id" => $data->loan_period . "__" . $data->due_pay_date, "name" => $data->due_pay_date]] : [];
                            $stur_loaded = isset($data) ? array("id", "name") : [];
                            ?>
                            <?= render_select('loan_period', $data_loaded, $stur_loaded, 'Due Amount Date', isset($data) ? $data->loan_period . "__" . $data->due_pay_date : '', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('pen_amount', 'Late Penalties (LKR.) ( It will apply if payment date is over )', isset($data) ? $data->pen_amount : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('repay_amount', 'Repayment Amount (LKR.)', isset($data) ? $data->repay_amount : '', 'text', ['required' => true, "readonly" => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('total', 'Total Amount (LKR.)', isset($data) ? $data->total : '', 'text', ['required' => true, "readonly" => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('remark', 'Remarks', isset($data) ? $data->remark : '', []); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="control-label">Payment Proof (20MB)</label>
                                <img id="loan_proof_img" alt="" src="<?= isset($data->loan_proof) ? base_url("public/images/loan_req/loan_proof") . "/" . $data->loan_proof : base_url("public/images") . "/no-image.png" ?>" height="150">
                                <div style="font: 13px Verdana; background: #eee; color: #333">
                                    <div id="filelist1"></div><br>
                                    <div id="file_container1" style="position: relative;">
                                        <a class="btn btn-lg btn-block btn-danger" id="pickfiles1" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/loan_req/loan_proof") ?>" data-id="loan_proof">Select</a> 
                                        <!--<a class="btn btn-sm btn-primary" id="uploadfiles1" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none">Upload</a>-->
                                    </div><br>
                                </div>
                                <input type="hidden" id="loan_proof" value="<?= isset($data) ? $data->loan_proof : '' ?>" class="" name="loan_proof" multiple="false">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="ti-check-box"></i>&nbsp;Submit</button>
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