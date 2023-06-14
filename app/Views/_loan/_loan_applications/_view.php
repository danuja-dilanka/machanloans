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
                            <a class="nav-link" data-toggle="tab" href="#loan_details">Loan Details</a>
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
                            <a class="nav-link active" data-toggle="tab" href="#repayments">Repayments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("loan/loan/") . $req_id ?>">Edit</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane" id="loan_details">
                            <div class="alert alert-warning mt-4">
                                <span>
                                    Add Loan ID, Release Date and First Payment Date before approving loan request
                                </span>
                            </div>
                            <table class="table table-bordered mt-4">
                                <tbody>
                                    <tr>
                                        <td>Loan ID</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Loan Type</td>
                                        <td>D-3</td>
                                    </tr>
                                    <tr>
                                        <td>Borrower</td>
                                        <td>Nadeeshani Kalpana</td>
                                    </tr>
                                    <tr>
                                        <td>Member No</td>
                                        <td>MPL 012</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <span class="badge badge-warning">Pending</span>
                                            <a class="btn btn-outline-primary btn-xs" href="https://machan.quicksoft.lk/admin/loans/approve/222"><i class="ti-check-box"></i>&nbsp;Click to Approve</a>
                                            <a class="btn btn-outline-danger btn-xs float-right" href="https://machan.quicksoft.lk/admin/loans/reject/222"><i class="ti-close"></i>&nbsp;Click to Reject</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>First Payment Date</td>
                                        <td>2023-06-12</td>
                                    </tr>
                                    <tr>
                                        <td>Release Date</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Applied Amount</td>
                                        <td>
                                            ₨20,000.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Payable</td>
                                        <td>
                                            ₨21,000.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Paid</td>
                                        <td class="text-success">
                                            ₨0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Due Amount</td>
                                        <td class="text-danger">
                                            ₨21,000.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Late Payment Penalties</td>
                                        <td>0.00 %</td>
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

                        <div class="tab-pane fade" id="guarantor">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <span>Guarantors</span>
                                    <a class="btn btn-primary btn-xs ml-auto ajax-modal" href="#" data-title="Add Guarantor"><i class="ti-plus"></i>Add New</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="guarantors_table" class="table table-bordered mt-2">
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
                                                    <td colspan="2">Grand Total</td>
                                                    <td colspan="2"><b>₨0.00</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="new_guarantors">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <span>New Guarantors</span>
                                    <a class="btn btn-primary btn-xs ml-auto ajax-modal" href="#" data-title="Add Guarantor"><i class="ti-plus"></i>Add New</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="loan_guarantors_table" class="table table-bordered mt-2">
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
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered data-table dataTable no-footer dtr-inline" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr>
                                                    <th class="" rowspan="1" colspan="1">Date</th>
                                                    <th class="text-right " rowspan="1" colspan="1">Amount to Pay</th>
                                                    <th class="text-right " rowspan="1" colspan="1">Late Penalty</th>
                                                    <th class="text-right " rowspan="1" colspan="1">Principal Amount</th>
                                                    <th class="text-right " rowspan="1" colspan="1">Interest</th>
                                                    <th class="text-right " rowspan="1" colspan="1">Balance</th>
                                                    <th class="text-center " rowspan="1" colspan="1">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-4 active show" id="repayments">
                            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered data-table dataTable no-footer dtr-inline" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                                            <thead>
                                                <tr>
                                                    <th class="" rowspan="1" colspan="1">Date</th>
                                                    <th class="text-right " rowspan="1" colspan="1">Principal Amount</th>
                                                    <th class="text-right " rowspan="1" colspan="1">Interest</th>
                                                    <th class="text-right " rowspan="1" colspan="1">Late Penalty</th>
                                                    <th class="text-right " rowspan="1" colspan="1">Total Amount</th>
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
    </div>
</div>
<?= view('inc/footer') ?>