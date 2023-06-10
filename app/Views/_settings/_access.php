<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url()); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title"><?= $title ?></h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <select id="access_type" class="form-control selectpicker hide_or_show_sel" data-live-search="true" data-target="access_type">
                                <option value="0">Select Access Type</option>
                                <option value="1">User Wise</option>
                                <option value="2">User Type Wise</option>
                            </select>
                        </div>
                        <div class="col-sm-4 custom_show" id="access_type1" style="display:none">
                            <select id="users" class="form-control selectpicker selectpicker_ajax" name="users" data-live-search="true" data-clone="users"></select>
                        </div>
                        <div class="col-sm-4 hide custom_show" id="access_type2" style="display:none">
                            <select id="user_types" class="form-control selectpicker selectpicker_ajax" name="user_types" data-live-search="true" data-clone="user_types"></select>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $modules = $settings->get_module();
                        foreach ($modules as $key => $value) {
                            ?>
                            <div class="card col-sm-4">
                                <div class="card-header row">
                                    <div class="col-sm-9">
                                        <h5 class="card-header"><?= $value->name ?></h5>
                                    </div>
                                    <div class="col-sm-3 row">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-checkbox">
                                                <input data-id="<?= $value->id ?>" data-type="module_access" type="checkbox" data-action="all" data-module="<?= $value->code ?>" class="custom-control-input _access" id="customCheck<?= $key ?>">
                                                <label class="custom-control-label" for="customCheck<?= $key ?>"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-switch">
                                                <input data-id="<?= $value->id ?>" data-type="module_status" type="checkbox" data-action="all" data-module="<?= $value->code ?>" class="custom-control-input _switch" id="customSwitch<?= $key ?>">
                                                <label class="custom-control-label" for="customSwitch<?= $key ?>"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Granted</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sub_modules = $settings->get_module_action_by(["a.module" => $value->id]);
                                            foreach ($sub_modules as $skey => $svalue) {
                                                ?>
                                                <tr>
                                                    <td><?= ucwords($svalue->action) ?></td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input data-id="<?= $svalue->id ?>" data-type="module_action_access" data-action="<?= $svalue->action ?>" data-module="<?= $value->code ?>" type="checkbox" class="custom-control-input _switch" id="customSwitch<?= $key . "_" . $skey ?>">
                                                            <label class="custom-control-label" for="customSwitch<?= $key . "_" . $skey ?>"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input data-id="<?= $svalue->id ?>" data-type="module_action_status" data-action="<?= $svalue->action ?>" data-module="<?= $value->code ?>" type="checkbox" class="custom-control-input _access" id="customCheck<?= $key . "_" . $skey ?>">
                                                            <label class="custom-control-label" for="customCheck<?= $key . "_" . $skey ?>"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>	
</div>
<?= view('inc/footer') ?>