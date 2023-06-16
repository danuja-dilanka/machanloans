<?= view('inc/header') ?>
<div class="main-content-inner mt-4">		
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible" id="main_alert" role="alert">
                <button type="button" id="close_alert" class="close">
                    <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                </button>
                <span class="msg"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-lg-3">
            <ul class="nav flex-column nav-tabs settings-tab" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#member_details"><i class="ti-user"></i>&nbsp;Member Details</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#account_overview"><i class="ti-credit-card"></i>&nbsp;Account Overview</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#transaction-history"><i class="ti-view-list-alt"></i>Transactions</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#member_loans"><i class="ti-agenda"></i>&nbsp;Loans</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#documents" id="documents_nav"><i class="ti-files"></i>&nbsp;Documents</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#email"><i class="ti-email"></i>&nbsp;Send Email</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sms"><i class="ti-comment-alt"></i>&nbsp;Send SMS</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url("member/mem/") . $req_id ?>"><i class="ti-pencil-alt"></i>&nbsp;Edit Member Details</a></li>
            </ul>
        </div>

        <div class="col-md-8 col-lg-9">
            <div class="tab-content">
                <div id="member_details" class="tab-pane active">
                    <div class="card">
                        <div class="card-header">
                            <span class="header-title">Member Details</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="profile_picture text-center">
                                            <img src="<?= isset($data->photo) && $data->photo != "" ? base_url("public/images/member/") . $data->photo : base_url("public/uploads/profile/") . "default.png" ?>" class="thumb-image-md">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <nav style="margin-top:2%">
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Basic Details</a>
                                    <a class="nav-item nav-link" id="nav-friends-tab" data-toggle="tab" href="#nav-friends" role="tab" aria-controls="nav-friends" aria-selected="false">Friends</a>
                                    <a class="nav-item nav-link" id="nav-spouse-tab" data-toggle="tab" href="#nav-spouse" role="tab" aria-controls="nav-spouse" aria-selected="false">Spouses </a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>First Name</td>
                                                <td><?= isset($data) ? $data->first_name : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Last Name</td>
                                                <td><?= isset($data) ? $data->last_name : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Business Name</td>
                                                <td><?= isset($data) ? $data->business_name : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Member No</td>
                                                <td><?= isset($data) ? $data->member_no : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?= isset($data) ? $data->email : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td><?= isset($data) ? $data->mobile : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php
                                                    if (isset($data)) {
                                                        if ($data->gender == 1) {
                                                            echo 'Male';
                                                        } else {
                                                            echo 'Female';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td><?= isset($data) ? $data->city : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><?= isset($data) ? $data->address : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Google location</td>
                                                <td><?= isset($data) ? $data->google_location : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Current Residential Address</td>
                                                <td><?= isset($data) ? $data->cred_address : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address of place of employment or business</td>
                                                <td><?= isset($data) ? $data->working_address : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Job or business</td>
                                                <td><?= isset($data) ? $data->job_or_business : null ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <ul class="nav flex-column nav-tabs settings-tab" role="tablist">
                                                        <li class="nav-item  text-center" onclick="document.getElementById('documents_nav').click()"><a class="nav-link" href="#"><i class="ti-files"></i>&nbsp;See Documents</a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="nav-friends" role="tabpanel" aria-labelledby="nav-friends-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Name of non-relative friend 1</td>
                                                <td><?= isset($data) ? $data->rel_friend1 : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Contact number of non-relative friend 1</td>
                                                <td><?= isset($data) ? $data->rel_friend1_phone : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address of non-relative friend 1</td>
                                                <td><?= isset($data) ? $data->rel_friend1_address : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Name of non-relative friend 2</td>
                                                <td><?= isset($data) ? $data->rel_friend2 : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Contact number of non-relative friend 2</td>
                                                <td><?= isset($data) ? $data->rel_friend2_phone : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address of non-relative friend 2</td>
                                                <td><?= isset($data) ? $data->rel_friend2_address : null ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="nav-spouse" role="tabpanel" aria-labelledby="nav-spouse-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Spouse's Name</td>
                                                <td><?= isset($data) ? $data->spouse_name : null ?></td>
                                            </tr>
                                            <tr>
                                                <td>Spouse's Telephone Number</td>
                                                <td><?= isset($data) ? $data->spouse_tel_number : null ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" class="profile_picture text-center">
                                                    <img src="<?= isset($data->spouse_nic_front) ? base_url("public/images/loan_req/nic/spouse_nic_front") . "/" . $data->spouse_nic_front : base_url("public/images") . "/no-image.png" ?>" class="thumb-image-md">
                                                    <h6>NIC Front</h6>
                                                </td>
                                                <td colspan="2" class="profile_picture text-center">
                                                    <img src="<?= isset($data->spouse_nic_back) ? base_url("public/images/loan_req/nic/spouse_nic_back") . "/" . $data->spouse_nic_back : base_url("public/images") . "/no-image.png" ?>" class="thumb-image-md">
                                                    <h6>NIC Back</h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="account_overview" class="tab-pane">
                    <div class="card">
                        <div class="card-header">
                            <span class="header-title">Account Overview</span>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom_dt_table">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Account Number</th>
                                            <th class="text-nowrap">Account Type</th>
                                            <th>Currency</th>
                                            <th class="text-right">Balance</th>
                                            <th class="text-nowrap text-right">Loan Guarantee</th>
                                            <th class="text-nowrap text-right">Current Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="transaction-history" class="tab-pane">
                    <div class="card">
                        <div class="card-header">
                            <span class="header-title">Transactions</span>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="transactions_table" class="table table-bordered custom_dt_table" aria-describedby="transactions_table_info">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Member</th>
                                            <th>Account Number</th>
                                            <th>Amount</th>
                                            <th>Debit/Credit</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--End Transaction Table-->

                <div id="member_loans" class="tab-pane">
                    <div class="card">
                        <div class="card-header">
                            <span class="header-title">Loans</span>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="loans_table" class="table table-bordered custom_dt_table" aria-describedby="loans_table_info">
                                    <thead>
                                        <tr>
                                            <th>Loan ID</th>
                                            <th>Loan Product</th>
                                            <th class="text-right">Applied Amount</th>
                                            <th class="text-right">Total Payable</th>
                                            <th class="text-right">Amount Paid</th>
                                            <th class="text-right">Due Amount</th>
                                            <th>Release Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="documents" class="tab-pane">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="header-title">Documents of <?= isset($data) ? $data->first_name . " " . $data->last_name : null ?></h4>
                            <!--<a class="btn btn-primary btn-xs ml-auto ajax-modal" data-title="Add New Document" href="#"><i class="ti-plus"></i>&nbsp;Add New</a>-->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom_dt_table" aria-describedby="DataTables_Table_0_info">
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
                </div><!--End Documents Tab-->

                <div id="email" class="tab-pane">
                    <div class="card">
                        <div class="card-header">
                            <span class="header-title">Send Email</span>
                        </div>

                        <div class="card-body">
                            <form method="post" class="validate" autocomplete="off" action="" enctype="multipart/form-data" novalidate="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">User Email<span class="required"> *</span></label>
                                            <input type="email" class="form-control" name="user_email" value="<?= isset($data) ? $data->email : null ?>" required="" readonly="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Subject<span class="required"> *</span></label>
                                            <input type="text" class="form-control" name="subject" value="" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Message<span class="required"> *</span></label>
                                            <textarea class="form-control" rows="8" name="email_message" required=""></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="button" id="send_email" class="btn btn-primary btn-block"><i class="ti-check-box"></i>&nbsp;Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--End Send Email Tab-->

                <div id="sms" class="tab-pane">
                    <div class="card">
                        <div class="card-header">
                            <span class="header-title">Send SMS</span>
                        </div>

                        <div class="card-body">
                            <form method="post" class="validate" autocomplete="off" action="https://machan.quicksoft.lk/admin/members/send_sms" enctype="multipart/form-data" novalidate="">
                                <input type="hidden" name="user" value="<?= $req_id ?>" readonly>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">User Mobile<span class="required"> *</span></label>
                                            <input type="text" class="form-control" name="phone" value="<?= isset($data) ? $data->mobile : null ?>" required="" readonly="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Message<span class="required"> *</span></label>
                                            <textarea class="form-control" name="message" required=""></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="button" id="send_sms" class="btn btn-primary btn-block"><i class="ti-check-box"></i>&nbsp;Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--End Send SMS Tab-->

            </div>
        </div>
    </div>
</div>
<?= view('inc/footer') ?>