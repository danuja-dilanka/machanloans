<div class="sidebar-menu">
    <div class="sidebar-header text-center">
        <a href="<?= base_url("dashboard") ?>">
            <h4 class="text-white ml-1 d-inline-block">Machan Loans</h4>
        </a>	
    </div>
    <div class="user-details" style="background-image: url('<?= base_url() ?>public/uploads/media/logo.png');background-size: 280px 250px;background-color: rgba(255, 255, 255, 0.5);">
        <span class="text-dark text-center d-inline-block"><?= isset(session()->ml_utype_name) ? strtoupper(session()->ml_utype_name) : "" ?> </span><br>
    </div>
    <div class="main-menu">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
            <div class="menu-inner" style="overflow: hidden; width: auto; height: 100%;">
                <nav class="active-nav active">
                    <ul class="metismenu" id="menu">
                        <?= isset(session()->ml_navabar) ? session()->ml_navabar : NULL ?>
                    </ul>
                </nav>
            </div>
            <div class="sidebarScrollBar" style="background: rgb(23, 97, 253); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 411.083px;"></div>
            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
        </div>
    </div>
</div>