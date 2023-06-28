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
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-step1-tab" data-toggle="tab" href="#nav-step1" role="tab" aria-controls="nav-step1" aria-selected="true">Step1</a>
                                <a class="nav-item nav-link" id="nav-step2-tab" data-toggle="tab" href="#nav-step2" role="tab" aria-controls="nav-step2" aria-selected="false">Step2</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-mainTabContent">
                            <div class="tab-pane fade show active" id="nav-step1" role="tabpanel" aria-labelledby="nav-step1-tab">

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h4>Member Details</h4>
                                        <hr>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <nav>
                                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Basic Details</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Main Documents</a>
                                                    <a class="nav-item nav-link" id="nav-other-doc" data-toggle="tab" href="#nav-otherdoc" role="tab" aria-controls="nav-other-doc" aria-selected="false">Other Documents</a>
                                                    <a class="nav-item nav-link" id="nav-bank-tab" data-toggle="tab" href="#nav-bank" role="tab" aria-controls="nav-bank" aria-selected="false">Bank Details</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <div class="col-md-12 row">
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <?= render_input('', 'First Name', isset($member) ? $member->first_name : '', 'text', ["readonly" => true]); ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <?= render_input('', 'Last Name', isset($member) ? $member->last_name : '', 'text', ["readonly" => true]); ?>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <?= render_input('', 'Name', isset($member) ? $member->first_name . " " . $member->last_name : '', 'text', ["readonly" => true]); ?>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <?= render_input('', 'Member No', isset($member) ? $member->member_no : '', 'text', ["readonly" => true]); ?>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <?= render_input('', 'Phone number', isset($member) ? $member->mobile : '', 'text', ["readonly" => true]); ?>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <?= render_input('', 'Email', isset($member) ? $member->email : '', 'text', ["readonly" => true]); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <img src="<?= isset($member->photo) && $member->photo != "" ? base_url("public/images/member/") . $member->photo : base_url("public/uploads/profile/") . "default.png" ?>" alt="" class="thumb-image-md" width="250">
                                                            <a style="margin-top:2%" href="<?= base_url("member/mem/") . encode($member->id) ?>" class="btn btn-success btn-lg btn-block"><i class="ti-check-box"></i>&nbsp;Edit Member Details</a>
                                                        </div>
                                                    </div>
                                                    <div class="row col-sm-12">
                                                        <div class="col-md-6">
                                                            <?= render_textarea('', 'Address on ID', isset($member) ? $member->address : '', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_textarea('', 'Current Residential Address', isset($member) ? $member->cred_address : '', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <?= render_input('', 'Whatsapp', isset($member) ? $member->whatsapp : '', 'number', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <?= render_custom_select("", ["Male", "Female"], "Gender", isset($member) ? $member->gender : '', 'disabled') ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <?= render_custom_select("", ["Married", "Unmarried"], "Civil Status", isset($member) ? $member->civil_status : '', 'disabled') ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <?= render_input('', 'City', isset($member) ? $member->city : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_textarea('', 'ID Address', isset($member) ? $member->address : '', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_textarea('', 'Google location', isset($member) ? $member->google_location : '', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_textarea('', 'Current Residential Address', isset($member) ? $member->cred_address : '', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_textarea('', 'Address of place of employment or business', isset($member) ? $member->working_address : '', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <?= render_input('', 'Job or business', isset($member) ? $member->job_or_business : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_input('', 'Name of non-relative friend 1', isset($member) ? $member->rel_friend1 : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_input('', 'Contact number of non-relative friend 1', isset($member) ? $member->rel_friend1_phone : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <?= render_textarea('', 'Address of non-relative friend 1', isset($member) ? $member->rel_friend1_address : '', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_input('', 'Name of non-relative friend 2', isset($member) ? $member->rel_friend2 : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_input('', 'Contact number of non-relative friend 2', isset($member) ? $member->rel_friend2_phone : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <?= render_textarea('', 'Address of non-relative friend 2', isset($member) ? $member->rel_friend2_address : '', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_input('', "Spouse's Name (Mother's/Father's if unmarried)", isset($member) ? $member->spouse_name : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_input('', "Spouse's Telephone Number (Mother's/Father's if unmarried)", isset($member) ? $member->spouse_tel_number : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    <div class="row ">
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <td class=" text-center">
                                                                        <a target="_blank" href="<?= isset($member->nic_front) ? base_url("public/images/loan_req/nic/front") . "/" . $member->nic_front : "#" ?>">
                                                                            <img src="<?= isset($member->nic_front) ? base_url("public/images/loan_req/nic/front") . "/" . $member->nic_front : base_url("public/images") . "/no-image.png" ?>" alt="" class="thumb-image-sm">
                                                                        </a>
                                                                        <h6 style="margin-top:2%">NIC Front</h6>
                                                                    </td>
                                                                    <td class=" text-center">
                                                                        <a target="_blank" href="<?= isset($member->nic_back) ? base_url("public/images/loan_req/nic/back") . "/" . $member->nic_back : "#" ?>">
                                                                            <img src="<?= isset($member->nic_back) ? base_url("public/images/loan_req/nic/back") . "/" . $member->nic_back : base_url("public/images") . "/no-image.png" ?>" alt="" class="thumb-image-sm">
                                                                        </a>
                                                                        <h6 style="margin-top:2%">NIC Back</h6>
                                                                    </td>
                                                                    <td class=" text-center">
                                                                        <a target="_blank" href="<?= isset($member->spouse_nic_front) ? base_url("public/images/loan_req/nic/spouse_nic_front") . "/" . $member->spouse_nic_front : "#" ?>">
                                                                            <img src="<?= isset($member->spouse_nic_front) ? base_url("public/images/loan_req/nic/spouse_nic_front") . "/" . $member->spouse_nic_front : base_url("public/images") . "/no-image.png" ?>" alt="" class="thumb-image-sm">
                                                                        </a>
                                                                        <h6 style="margin-top:2%">Spouse's NIC Front</h6>
                                                                    </td>
                                                                    <td class=" text-center">
                                                                        <a target="_blank" href="<?= isset($member->spouse_nic_back) ? base_url("public/images/loan_req/nic/spouse_nic_back") . "/" . $member->spouse_nic_back : "#" ?>">
                                                                            <img src="<?= isset($member->spouse_nic_back) ? base_url("public/images/loan_req/nic/spouse_nic_back") . "/" . $member->spouse_nic_back : base_url("public/images") . "/no-image.png" ?>" alt="" class="thumb-image-sm">
                                                                        </a>
                                                                        <h6 style="margin-top:2%">Spouse's NIC Back</h6>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-otherdoc" role="tabpanel" aria-labelledby="nav-other-doc-tab">
                                                    <div class="row">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered custom_dt_table" style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Document Name</th>
                                                                        <th>Document File</th>
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
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-bank" role="tabpanel" aria-labelledby="nav-bank-tab">
                                                    <div class="col-md-12 row">
                                                        <div class="col-md-6">
                                                            <?= render_input('', 'Bank Name', isset($member) ? $member->bank_name : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?= render_input('', 'Branch Name', isset($member) ? $member->branch_name : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <?= render_input('', 'Account Number', isset($member) ? $member->acc_number : '', 'text', ["readonly" => true]); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="button" onclick="document.getElementById('nav-step2-tab').click()" class="btn btn-info"><i class="fa fa-arrow-right"></i>&nbsp;Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-step2" role="tabpanel" aria-labelledby="nav-step2-tab">
                                <div class="row col-sm-12">
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
                                    <div class="col-md-12 text-center">
                                        <hr>
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
            </div>
        </div>
    </div>
    <?= form_close(); ?>	
</div>
<?= view('inc/footer') ?>