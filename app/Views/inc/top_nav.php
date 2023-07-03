
<!-- header area start -->
<div class="header-area">
    <div class="row align-items-center">
        <!-- nav and search button -->
        <div class="col-lg-6 col-4 clearfix rtl-2">
            <div class="nav-btn float-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <!-- profile info & task notification -->
        <div class="col-lg-6 col-8 clearfix rtl-1">

            <ul class="notification-area float-right">
                <li class="d-none d-md-inline-block">
                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" id="selectLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            English
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="selectLanguage">
                            <a class="dropdown-item" href="https://machan.quicksoft.lk/switch_language?language=English">English</a>
                        </div>
                    </div>
                </li>


                <li>
                    <div class="user-profile">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                            <img class="avatar user-thumb" id="my-profile-img" src="<?= isset(session()->profile_image) ? base_url("public/images/member") . "/" . session()->profile_image : base_url() . "public/uploads/media/logo.png" ?>" alt="avatar"> <?= isset(session()->ml_user_name) ? session()->ml_user_name : "User" ?> <i class="fa fa-angle-down"></i>
                        </h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url("setting/user/") . session()->ml_user ?>"><i class="ti-pencil text-muted mr-2"></i>&nbsp;Profile Settings</a>
                            <a class="dropdown-item" href="<?= base_url("setting/user/") . session()->ml_user ?>"><i class="ti-exchange-vertical text-muted mr-2"></i>&nbsp;Change Password</a>
                            <?php if (is_admin()) { ?>
                                <a class="dropdown-item" href="<?= base_url("setting/access") ?>"><i class="ti-settings text-muted mr-2"></i>&nbsp;System Settings</a>
                            <?php } ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url("logout") ?>"><i class="ti-power-off text-muted mr-2"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                </li>

            </ul>

        </div>
    </div>
</div><!-- header area end -->