<?= view('inc/header') ?>
<?= view('_loan/_guarantor/_model') ?>
<?php $loan_model = model("Loan_model") ?>
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
                                                    <a class="nav-link" href="<?php // base_url("loan/loan/") . $req_id                           ?>">Edit</a>
                                                </li>-->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active mt-4" id="loan_details">
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
                                            <?php if ($data->status == 0 && has_permission("loan", "edit")) { ?>
                                                <span class='badge badge-warning'>Pending</span>
                                                <a href='#' data-id='<?= base_url("loan/loan_approve/") . $req_id ?>' class='btn btn-outline-primary btn-xs confirm_red_btn' data-callback="no_callback"><i class="ti-check-box"></i>&nbsp;Click to Approve</a>
                                                <a class="btn btn-outline-danger btn-xs float-right confirm_red_btn" data-id="<?= base_url("loan/loan_reject/") . $req_id ?>" data-callback="no_callback"><i class="ti-close"></i>&nbsp;Click to Reject</a>
                                                <?php
                                            } else if ($data->status == 1) {
                                                echo "<span class='badge badge-success'>Approved</span>";
                                            } else if ($data->status == 2) {
                                                echo "<span class='badge badge-danger'>Rejected</span>";
                                            } else {
                                                echo "<span class='badge badge-warning'>Pending</span>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>First Payment Date</td>
                                        <td><?= $data->first_pay_dt ?></td>
                                    </tr>
                                    <tr>
                                        <td>Release Date</td>
                                        <?php if ($data->loan_rel_date != null) { ?>
                                            <td><?= $data->loan_rel_date ?></td>
                                        <?php } else if (has_permission("loan", "edit")) { ?>
                                            <td><a href='#' data-id='<?= base_url("loan/loan_confirm_relase/") . $req_id ?>' class='btn btn-outline-success btn-xs confirm_red_btn' data-callback="no_callback"><i class="ti-check-box"></i>&nbsp;Click to Confirm</a></td>
                                        <?php } else { ?>
                                            <td>-</td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>Applied Amount</td>
                                        <td><?= number_format($data->last_amount, 2, ".", ",") ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Payable</td>
                                        <td><?= number_format($data->last_amount, 2, ".", ",") ?></td>
                                    </tr>
                                    <?php $loan_summary = $loan_model->get_loan_pay_data_summary(["loan" => $data->id]) ?>
                                    <tr>
                                        <td>Total Paid</td>
                                        <td class="text-success"><?= number_format($loan_summary->paid_total, 2, ".", ",") ?></td>
                                    </tr>
                                    <tr>
                                        <td>Due Amount</td>
                                        <td class="text-danger"><?= number_format(($data->last_amount + ($data->last_amount * ($data->lp_int_rate / 100))) - floatval($loan_summary->paid_total), 2, ".", ",") ?></td>
                                    </tr>
                                    <tr>
                                        <td>Late Payment Penalties</td>
                                        <td><?= number_format($loan_summary->paid_pen_amount, 2, ".", ",") ?></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><?= $data->description ?></td>
                                    </tr>
                                    <tr>
                                        <td>Remarks</td>
                                        <td><?= $data->remark ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade mt-4" id="guarantor">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <span>Guarantors</span>
                                    <a class="btn btn-primary btn-xs ml-auto" href="#" data-toggle="modal" data-target="#gur_model"><i class="ti-plus"></i>Add New</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="guarantors_table" class="table table-bordered custom_dt_table mt-2">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($data->new_mem_req_loan == 1) {
                                                    $member = model("Member_model")->get_unreg_mem_data($data->member);
                                                } else {
                                                    $member = model("Member_model")->get_data($data->member);
                                                }
                                                ?>
                                                <tr>
                                                    <td><?= $member->rel_friend1 ?></td>
                                                    <td><?= $member->rel_friend1_phone ?></td>
                                                    <td><?= $member->rel_friend1_address ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?= $member->rel_friend2 ?></td>
                                                    <td><?= $member->rel_friend2_phone ?></td>
                                                    <td><?= $member->rel_friend2_address ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade mt-4" id="schedule">
                            <?= view('_loan/_loan_applications/_sections/rpay_shdule_tb', ["data" => $data, "pay_periods" => $pay_periods]) ?>
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
                                        <?php
                                        $payments = $loan_model->get_loan_pay_all_data_by("loan=" . $data->id);
                                        foreach ($payments as $key => $payment) {
                                            ?>
                                            <tr>
                                                <td><?= $payment->pay_date ?></td>
                                                <td><?= number_format($payment->last_amount, 2, ".", ",") ?></td>
                                                <td><?= $payment->int_rate ?></td>
                                                <td><?= number_format($payment->pen_amount, 2, ".", ",") ?></td>
                                                <td><?= number_format($payment->total, 2, ".", ",") ?></td>
                                            </tr>
                                        <?php } ?>
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