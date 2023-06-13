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
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kyc_documents"><i class="ti-files"></i>&nbsp;KYC Documents</a></li>
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
                                            <img src="<?= isset($data->photo) && $data->photo != "" ? base_url("public/images/member/") . $data->photo : "https://machan.quicksoft.lk/public/uploads/profile/default.png" ?>" class="thumb-image-md">
                                        </td>
                                    </tr>
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
<!--                                    <tr>
                                        <td>State</td>
                                        <td></td>
                                    </tr>-->
<!--                                    <tr>
                                        <td>Zip</td>
                                        <td></td>
                                    </tr>-->
                                    <tr>
                                        <td>Address</td>
                                        <td><?= isset($data) ? $data->address : null ?></td>
                                    </tr>
<!--                                    <tr>
                                        <td>Credit Source</td>
                                        <td></td>
                                    </tr>-->
                                </tbody>
                            </table>
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
                            <div id="transactions_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
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
                        </div>
                    </div>
                </div><!--End Transaction Table-->

                <div id="member_loans" class="tab-pane">
                    <div class="card">
                        <div class="card-header">
                            <span class="header-title">Loans</span>
                        </div>

                        <div class="card-body">
                            <div id="loans_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
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
                    </div>
                </div>

                <div id="kyc_documents" class="tab-pane">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="header-title">Documents of <?= isset($data) ? $data->first_name . " " . $data->last_name : null ?></h4>
                            <!--<a class="btn btn-primary btn-xs ml-auto ajax-modal" data-title="Add New Document" href="#"><i class="ti-plus"></i>&nbsp;Add New</a>-->
                        </div>

                        <div class="card-body">
                            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered custom_dt_table" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr>
                                                    <th>Document Name</th>
                                                    <th>Document File</th>
                                                    <th>Submitted At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End KYC Documents Tab-->

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