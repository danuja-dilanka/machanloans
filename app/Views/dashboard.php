<?= view('inc/header') ?>

<div class="page-title-area mb-3">
    <div class="row align-items-center py-3">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h6 class="page-title float-left">Dashboard</h6>

                <!--Branch Switcher-->
                <div class="dropdown float-right">
                    <a class="dropdown-toggle btn btn-dark btn-xs" type="button" id="selectLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Main Branch
                    </a>
                    <div class="dropdown-menu" aria-labelledby="selectLanguage">
                        <!--<a class="dropdown-item" href="">All Branch</a>-->
                        <a class="dropdown-item" href="">Main Branch</a>
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
                            <h4 class="pt-1 mb-0" id="total_members"><br><i class="fa-solid fa-sm fa-sync fa-spin"></i></h4>
                        </div>
                        <div>
                            <a href="<?= base_url("member/mem_list") ?>"><i class="ti-arrow-right"></i>&nbsp;View</a>
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
                            <h4 class="pt-1 mb-0" id='deposit_request'><br><i class="fa-solid fa-sm fa-sync fa-spin"></i></h4>
                        </div>
                        <div>
                            <a href="#"><i class="ti-arrow-right"></i>&nbsp;View</a>
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
                            <h4 class="pt-1 mb-0" id="total_withdraw_request"><br><i class="fa-solid fa-sm fa-sync fa-spin"></i></h4>
                        </div>
                        <div>
                            <a href="#"><i class="ti-arrow-right"></i>&nbsp;View</a>
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
                            <h4 class="pt-1 mb-0" id="total_pending_loans"><br><i class="fa-solid fa-sm fa-sync fa-spin"></i></h4>
                        </div>
                        <div>
                            <a href="<?= base_url("loan/loan_list") ?>"><i class="ti-arrow-right"></i>&nbsp;View</a>
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
    <div class="row col-md-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Recent Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Due Payments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Repayments</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Recent Transactions
                        </div>
                        <div class="card-body">
                            <?= view('_reports/_sections/transaction_tb') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Due Payments
                        </div>
                        <div class="card-body">
                            <?= view('_reports/_sections/due_pay_tb') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Repayments
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <button type="button" id="repay_date" data-tb='repay_tb' data-unic="1" data-id="<?= $today = date("Y-m-d") ?>" data-type="0" class="filter btn btn-default" style="border: none;">Today</button>&nbsp;
                                    <button type="button" id="repay_date" data-tb='repay_tb' data-unic="1" data-id="<?= date('Y-m-d', strtotime("$today +1 day")); ?>" data-type="0" class="filter btn btn-default" style="border: none;">Tomorrow</button>&nbsp;
                                    <button type="button" id="repay_date" data-tb='repay_tb' data-unic="1" data-id="<?= date('Y-m-d', strtotime("$today +7 days")); ?>" data-type="0" class="filter btn btn-default" style="border: none;">Week</button>&nbsp;
                                </div>
                            </div>
                            <hr>
                            <?= view('_reports/_sections/repay_tb') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End main content Inner-->
<?= view('inc/footer') ?>
