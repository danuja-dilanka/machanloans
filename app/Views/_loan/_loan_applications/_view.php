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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <span class="panel-title">View Loan Details</span>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#loan_details">Loan Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#guarantor">Guarantor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#new_guarantors">New Guarantor</a>
                        </li>
                        <!--                        <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#collateral">Collateral</a>
                                                </li>-->
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#schedule">Repayments Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#repayments">Repayments</a>
                        </li>
                        <!--                        <li class="nav-item">
                                                    <a class="nav-link" href="<?php // base_url("loan/loan/") . $req_id   ?>">Edit</a>
                                                </li>-->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active mt-4" id="loan_details">
                            <div class="alert alert-warning mt-4">
                                <span>
                                    Add Loan ID, Release Date and First Payment Date before approving loan request
                                </span>
                            </div>
                            <table class="table table-bordered mt-4">
                                <tbody>
                                    <tr>
                                        <td>Loan ID</td>
                                        <td><?= $data->id ?></td>
                                    </tr>
                                    <tr>
                                        <td>Loan Type</td>
                                        <td><?= $data->loan_product ?></td>
                                    </tr>
                                    <tr>
                                        <td>Borrower</td>
                                        <td><?= $data->full_name ?></td>
                                    </tr>
                                    <tr>
                                        <td>Member No</td>
                                        <td><?= $data->member_no ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <?php if ($data->status == 0) { ?>
                                                <span class='badge badge-warning'>Pending</span>
                                                <a href='#' data-id='<?= base_url("loan/loan_approve/") . $req_id ?>' class='btn btn-outline-primary btn-xs confirm_red_btn'><i class="ti-check-box"></i>&nbsp;Click to Approve</a>
                                                <a class="btn btn-outline-danger btn-xs float-right confirm_red_btn" href="<?= base_url("loan/loan_reject/") . $req_id ?>"><i class="ti-close"></i>&nbsp;Click to Reject</a>
                                                <?php
                                            } else if ($data->status == 1) {
                                                echo "<span class='badge badge-success'>Approved</span>";
                                            } else {
                                                echo "<span class='badge badge-danger'>Rejected</span>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>First Payment Date</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Release Date</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Applied Amount</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Payable</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Paid</td>
                                        <td class="text-success">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Due Amount</td>
                                        <td class="text-danger">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Late Payment Penalties</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Attachment</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Remarks</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade mt-4" id="guarantor">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <span>Guarantors</span>
                                    <a class="btn btn-primary btn-xs ml-auto ajax-modal" href="#" data-title="Add Guarantor"><i class="ti-plus"></i>Add New</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="guarantors_table" class="table table-bordered custom_dt_table mt-2">
                                            <thead>
                                                <tr>
                                                    <th>Loan ID</th>
                                                    <th>Guarantor</th>
                                                    <th>Amount</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Grand Total</td>
                                                    <td><b>₨0.00</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade mt-4" id="new_guarantors">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <span>New Guarantors</span>
                                    <a class="btn btn-primary btn-xs ml-auto ajax-modal" href="#" data-title="Add Guarantor"><i class="ti-plus"></i>Add New</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="loan_guarantors_table" class="table custom_dt_table table-bordered mt-2">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>NIC</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Uploads</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-4" id="schedule">
                            <div class="table-responsive">
                                <table class="table table-bordered custom_dt_table no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th class="">Date</th>
                                            <th class="text-right ">Amount to Pay</th>
                                            <th class="text-right ">Late Penalty</th>
                                            <th class="text-right ">Principal Amount</th>
                                            <th class="text-right ">Interest</th>
                                            <th class="text-right ">Balance</th>
                                            <th class="text-center ">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-4" id="repayments">
                            <div class="table-responsive">
                                <table class="table table-bordered custom_dt_table no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th class="">Date</th>
                                            <th class="text-right ">Principal Amount</th>
                                            <th class="text-right ">Interest</th>
                                            <th class="text-right ">Late Penalty</th>
                                            <th class="text-right ">Total Amount</th>
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
    </div>
</div>
<?= view('inc/footer') ?>