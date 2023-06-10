<?= view('inc/header') ?>

<div class="page-title-area mb-3">
    <div class="row align-items-center py-3">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h6 class="page-title float-left">Dashboard</h6>

                <!--Branch Switcher-->
                <div class="dropdown float-right">
                    <a class="dropdown-toggle btn btn-dark btn-xs" type="button" id="selectLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        All Branch
                    </a>
                    <div class="dropdown-menu" aria-labelledby="selectLanguage">
                        <a class="dropdown-item" href="https://machan.quicksoft.lk/switch_branch">All Branch</a>
                        <a class="dropdown-item" href="https://machan.quicksoft.lk/switch_branch?branch_id=default&amp;branch=Main Branch">Main Branch</a>
                        <a class="dropdown-item" href="https://machan.quicksoft.lk/switch_branch?branch_id=1&amp;branch=Main Branch">Main Branch</a>
                    </div>
                </div>
                <!--<ul class="breadcrumbs float-left">/ul>-->
            </div>
        </div>
    </div>
</div>

<div class="main-content-inner ">		
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
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 primary-card dashboard-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5>Total Members</h5>
                            <h4 class="pt-1 mb-0"><b>0</b></h4>
                        </div>
                        <div>
                            <a href="https://machan.quicksoft.lk/admin/members"><i class="ti-arrow-right"></i>&nbsp;View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 success-card dashboard-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5>Deposit Requests</h5>
                            <h4 class="pt-1 mb-0"><b>0</b></h4>
                        </div>
                        <div>
                            <a href="https://machan.quicksoft.lk/admin/deposit_requests"><i class="ti-arrow-right"></i>&nbsp;View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 warning-card dashboard-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5>Withdraw Requests</h5>
                            <h4 class="pt-1 mb-0"><b>0</b></h4>
                        </div>
                        <div>
                            <a href="https://machan.quicksoft.lk/admin/withdraw_requests"><i class="ti-arrow-right"></i>&nbsp;View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 danger-card dashboard-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5>Pending Loans</h5>
                            <h4 class="pt-1 mb-0"><b>0</b></h4>
                        </div>
                        <div>
                            <a href="https://machan.quicksoft.lk/admin/loans"><i class="ti-arrow-right"></i>&nbsp;View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-5 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center">
                    <span>Expense Overview - May 2023</span>
                </div>
                <div class="card-body">
                    <canvas id="expenseOverview" style="display: block; box-sizing: border-box; height: 431px; width: 431px;" width="431" height="431"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-7 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center">
                    <span>Deposit &amp; Withdraw Analytics - 2023</span>
                    <select class="filter-select ml-auto py-0 auto-select" data-selected="4">
                        <option value="4" data-symbol="₨">LKR</option>
                    </select>
                </div>
                <div class="card-body">
                    <canvas id="transactionAnalysis" style="display: block; box-sizing: border-box; height: 215px; width: 431px;" width="431" height="215"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    Recent Transactions
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Member</th>
                                    <th class="text-nowrap">Account Number</th>
                                    <th>Amount</th>
                                    <th class="text-nowrap">Debit/Credit</th>
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
</div>
<!--End main content Inner-->
<?= view('inc/footer') ?>
