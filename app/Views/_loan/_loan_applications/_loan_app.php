<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Add New Loan</h4>
                </div>
                <div class="card-body">
                    <?php if (count(validation_errors()) > 0) { ?>
                        <div class="alert alert-danger">
                            <?= validation_list_errors() ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4>Member Details</h4>
                            <hr>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-9">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Basic Details</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Documents</a>
                                    </div>
                                </nav>
                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" class="form-control" value="<?= isset($member) ? $member->first_name . " " . $member->last_name : "" ?>" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Member No</label>
                                                    <input type="text" class="form-control" value="<?= isset($member) ? $member->member_no : "" ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone number</label>
                                                    <input type="text" class="form-control" value="<?= isset($member) ? $member->mobile : "" ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email </label>
                                                    <input type="email" class="form-control" value="<?= isset($member) ? $member->email : "" ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address on ID</label>
                                                    <textarea class="form-control" readonly><?= isset($member) ? $member->address : "" ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Current Residential Address</label>
                                                    <textarea class="form-control" readonly><?= isset($member) ? $member->cred_address : "" ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-bordered custom_dt_table" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Document Name</th>
                                                            <th>Document File</th>
                                                            <th>Submitted At</th>
                                                            <!--<th>Action</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $docs = model("Member_model")->get_docs_by(["member" => $member->id]);
                                                        foreach ($docs as $d_key => $d_value) {
                                                            $docs_path = [
                                                                "selfie" => "public/images/loan_req/selfie",
                                                                "bank_statement" => "public/images/loan_req/electricity_bill",
                                                                "hw_nic_front" => "public/images/loan_req/nic/hw_nic_front",
                                                                "hw_nic_back" => "public/images/loan_req/nic/hw_nic_back",
                                                                "ga_certificate" => "public/images/loan_req/ga_certificate",
                                                                "fb_screenshot" => "public/images/loan_req/fb_screenshot",
                                                                "electricity_bill" => "public/images/loan_req/electricity_bill"
                                                            ];
                                                            ?>
                                                            <tr>
                                                                <td><?= $d_key + 1 ?></td>
                                                                <td><?= $d_value->name ?></td>
                                                                <td class="text-center">
                                                                    <?php if ($d_value->document != "") { ?> 
                                                                        <a href="<?= base_url($docs_path[$d_value->code]) . "/" . $d_value->document ?>" target="_blank">View</a>
                                                                    <?php } else { ?>
                                                                        <p>Not Submitted</p>
                                                                    <?php } ?>
                                                                </td>
                                                                <td><?= $d_value->document != "" ? $d_value->submitted_date . " " . $d_value->submitted_time : "-" ?></td>
                                                                <!--<td></td>-->
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src="<?= isset($member->photo) && $member->photo != "" ? base_url("public/images/member/") . $member->photo : base_url("public/uploads/profile/") . "default.png" ?>" class="thumb-image-md" width="50">
                                <a style="margin-top:2%" href="<?= base_url("member/mem/"). encode($member->id) ?>" class="btn btn-primary btn-lg btn-block">Edit Member Details</a>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('loan_id', 'Loan ID', isset($data) ? $data->first_name : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_custom_select("payment_method", ["Months", "Week"], "Payment Type", isset($data) ? $data->gender : '', '') ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_select('loan_type', model("Loan_model")->get_pro_data(0, 1), array('id', 'loan_name'), 'Loan Product', '', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('first_pay_dt', 'First Payment Date', isset($data) ? $data->first_pay_dt : '', 'date', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('rel_date', 'Release Date', isset($data) ? $data->rel_date : '', 'date', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('apply_amount', 'Applied Amount', isset($data) ? $data->apply_amount : '', 'number', ['required' => true, "step" => "0.01"]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('late_pay_penl', 'Late Payment Penalties', isset($data) ? $data->late_pay_penl : '', 'number', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('description', 'Description', isset($data) ? $data->description : '', []); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_textarea('remark', 'Remarks', isset($data) ? $data->remark : '', []); ?>
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