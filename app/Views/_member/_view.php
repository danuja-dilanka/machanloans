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
                <li class="nav-item"><a class="nav-link" href="https://machan.quicksoft.lk/admin/members/72/edit"><i class="ti-pencil-alt"></i>&nbsp;Edit Member Details</a></li>
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
                                <tbody><tr>
                                        <td colspan="2" class="profile_picture text-center">
                                            <img src="<?= isset($data->photo) && $data->photo != "" ? base_url("public/images/member/").$data->photo : "https://machan.quicksoft.lk/public/uploads/profile/default.png" ?>" class="thumb-image-md">
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
                                        if(isset($data)){
                                            if($data->gender == 1){
                                                echo 'Male';
                                            }else{
                                                echo 'Female';
                                            }
                                        }
                                        ?></td>
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
                                <table class="table table-bordered">
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
                                        <tr>
                                            <td>21321341</td>
                                            <td class="text-nowrap">Bank Account</td>
                                            <td>LKR</td>
                                            <td class="text-nowrap text-right">₨0.00</td>						
                                            <td class="text-nowrap text-right">₨0.00</td>						
                                            <td class="text-nowrap text-right">₨0.00</td>						
                                        </tr>
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
                            <div id="transactions_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="transactions_table_length"><label>Show <select name="transactions_table_length" aria-controls="transactions_table" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> Entries</label></div></div><div class="col-sm-12 col-md-6"><div id="transactions_table_filter" class="dataTables_filter"><label>Search<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="transactions_table"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="transactions_table" class="table table-bordered dataTable no-footer dtr-inline" aria-describedby="transactions_table_info">
                                            <thead>
                                                <tr><th class="sorting_disabled" rowspan="1" colspan="1">Date</th><th class="sorting_disabled" rowspan="1" colspan="1">Member</th><th class="sorting_disabled" rowspan="1" colspan="1">Account Number</th><th class="sorting_disabled" rowspan="1" colspan="1">Amount</th><th class="sorting_disabled" rowspan="1" colspan="1">Debit/Credit</th><th class="sorting_disabled" rowspan="1" colspan="1">Type</th><th class="sorting_disabled" rowspan="1" colspan="1">Status</th><th class="text-center sorting_disabled" rowspan="1" colspan="1">Action</th></tr>
                                            </thead>
                                            <tbody>
                                                <tr id="row_121" class="odd"><td class="dtr-control">2023-06-06 08:35 PM</td><td>Prabashani SAmanthika</td><td>21321341</td><td><span class="text-success">+ ₨0.00</span></td><td>CR</td><td>Deposit</td><td><span class="badge badge-success">Completed</span></td><td><div class="dropdown text-center"><button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action&nbsp;</button><div class="dropdown-menu"><a class="dropdown-item" href="https://machan.quicksoft.lk/admin/transactions/121/edit"><i class="ti-pencil-alt"></i> Edit</a><a class="dropdown-item" href="https://machan.quicksoft.lk/admin/transactions/121"><i class="ti-eye"></i>  View</a><form action="https://machan.quicksoft.lk/admin/transactions/121" method="post"><input type="hidden" name="_token" value="EvN7hQk0Jps799sdZNRvM7hVPNnGWgsvZ2sAi1jH"><input name="_method" type="hidden" value="DELETE"><button class="dropdown-item btn-remove" type="submit"><i class="ti-trash"></i> Delete</button></form></div></div></td></tr></tbody>
                                        </table><div id="transactions_table_processing" class="dataTables_processing card" style="display: none;">Processing...<div><div></div><div></div><div></div><div></div></div></div></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="transactions_table_info" role="status" aria-live="polite">Showing 1 to 1 of 1 Entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="transactions_table_paginate"><ul class="pagination pagination-bordered"><li class="paginate_button page-item previous disabled" id="transactions_table_previous"><a href="#" aria-controls="transactions_table" data-dt-idx="0" tabindex="0" class="page-link"><i class="ti-angle-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="transactions_table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="transactions_table_next"><a href="#" aria-controls="transactions_table" data-dt-idx="2" tabindex="0" class="page-link"><i class="ti-angle-right"></i></a></li></ul></div></div></div></div>
                        </div>
                    </div>
                </div><!--End Transaction Table-->

                <div id="member_loans" class="tab-pane">
                    <div class="card">
                        <div class="card-header">
                            <span class="header-title">Loans</span>
                        </div>

                        <div class="card-body">
                            
                            <div id="loans_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="loans_table_length"><label>Show <select name="loans_table_length" aria-controls="loans_table" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> Entries</label></div></div><div class="col-sm-12 col-md-6"><div id="loans_table_filter" class="dataTables_filter"><label>Search<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="loans_table"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="loans_table" class="table table-bordered data-table dataTable no-footer dtr-inline" aria-describedby="loans_table_info">
                                            <thead>
                                                <tr><th class="sorting_disabled" rowspan="1" colspan="1">Loan ID</th><th class="sorting_disabled" rowspan="1" colspan="1">Loan Product</th><th class="text-right sorting_disabled" rowspan="1" colspan="1">Applied Amount</th><th class="text-right sorting_disabled" rowspan="1" colspan="1">Total Payable</th><th class="text-right sorting_disabled" rowspan="1" colspan="1">Amount Paid</th><th class="text-right sorting_disabled" rowspan="1" colspan="1">Due Amount</th><th class="sorting_disabled" rowspan="1" colspan="1">Release Date</th><th class="sorting_disabled" rowspan="1" colspan="1">Status</th></tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No Data Found</td></tr></tbody>
                                        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="loans_table_info" role="status" aria-live="polite">Showing 0 To 0 Of 0 Entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="loans_table_paginate"><ul class="pagination pagination-bordered"><li class="paginate_button page-item previous disabled" id="loans_table_previous"><a href="#" aria-controls="loans_table" data-dt-idx="0" tabindex="0" class="page-link"><i class="ti-angle-left"></i></a></li><li class="paginate_button page-item next disabled" id="loans_table_next"><a href="#" aria-controls="loans_table" data-dt-idx="1" tabindex="0" class="page-link"><i class="ti-angle-right"></i></a></li></ul></div></div></div></div>
                        </div>
                    </div>
                </div>

                <div id="kyc_documents" class="tab-pane">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="header-title">Documents of Prabashani SAmanthika</h4>
                            <a class="btn btn-primary btn-xs ml-auto ajax-modal" data-title="Add New Document" href="https://machan.quicksoft.lk/admin/member_documents/create/72"><i class="ti-plus"></i>&nbsp;Add New</a>
                        </div>

                        <div class="card-body">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> Entries</label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered data-table dataTable no-footer dtr-inline" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr><th class="sorting_disabled" rowspan="1" colspan="1">Document Name</th><th class="sorting_disabled" rowspan="1" colspan="1">Document File</th><th class="sorting_disabled" rowspan="1" colspan="1">Submitted At</th><th class="sorting_disabled" rowspan="1" colspan="1">Action</th></tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd"><td valign="top" colspan="4" class="dataTables_empty">No Data Found</td></tr></tbody>
                                        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 To 0 Of 0 Entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination pagination-bordered"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link"><i class="ti-angle-left"></i></a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><i class="ti-angle-right"></i></a></li></ul></div></div></div></div>
                        </div>
                    </div>
                </div><!--End KYC Documents Tab-->

                <div id="email" class="tab-pane">
                    <div class="card">
                        <div class="card-header">
                            <span class="header-title">Send Email</span>
                        </div>

                        <div class="card-body">
                            <form method="post" class="validate" autocomplete="off" action="https://machan.quicksoft.lk/admin/members/send_email" enctype="multipart/form-data" novalidate="">
                                <input type="hidden" name="_token" value="EvN7hQk0Jps799sdZNRvM7hVPNnGWgsvZ2sAi1jH">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">User Email<span class="required"> *</span></label>
                                            <input type="email" class="form-control" name="user_email" value="" required="" readonly="">
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
                                            <textarea class="form-control" rows="8" name="message" required=""></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="ti-check-box"></i>&nbsp;Send</button>
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
                                <input type="hidden" name="_token" value="EvN7hQk0Jps799sdZNRvM7hVPNnGWgsvZ2sAi1jH">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">User Mobile<span class="required"> *</span></label>
                                            <input type="text" class="form-control" name="phone" value="94769047134" required="" readonly="">
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
                                            <button type="submit" class="btn btn-primary btn-block"><i class="ti-check-box"></i>&nbsp;Send</button>
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