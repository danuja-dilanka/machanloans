<?= view('inc/header') ?>
<?= view('_settings/_model/_sms_template_edit') ?>
<div class="main-content-inner mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Main Settings</h4>
                </div>
                <div class="card-body">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sidebar</a>
                            <a class="nav-item nav-link" id="nav-sms-tab" data-toggle="tab" href="#nav-sms" role="tab" aria-controls="nav-sms" aria-selected="false">SMS Settings</a>
                        </div>
                    </nav>
                    <br>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <?= form_open_multipart(current_url()); ?>
                            <div class="col-sm-12 row">
                                <div class="col-sm-8">
                                    <div class="form-group text-center">
                                        <label class="control-label">Side Bar Image(30MB)<span class="required"> *</span></label><br>
                                        <?php $sidbar_image = get_option("sidbar_image"); ?>
                                        <img id="sidbar_image_img" alt="" src="<?= ($sidbar_image) != null ? base_url("public/images/sidbar_imgs") . "/" . $sidbar_image : base_url("public/uploads") . "/media/logo.png" ?>" height="150">
                                        <div style="font: 13px Verdana; background: #eee; color: #333">
                                            <div id="filelist1"></div><br>
                                            <div id="file_container1" style="position: relative;">
                                                <a class="btn btn-lg btn-block btn-danger" id="pickfiles1" href="javascript:;" style="position: relative; z-index: 1;text-decoration: none" data-src="<?= base_url("public/images/sidbar_imgs") ?>" data-id="sidbar_image">Select</a> 
                                            </div><br>
                                        </div>
                                        <input type="hidden" id="sidbar_image" value="<?= $sidbar_image ?>" name="sidbar_image" multiple="false">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <?php $sidebar_image_height = get_option("sidebar_image_height"); ?>
                                        <?= render_input('sidebar_image_height', 'Image Height (PX)', $sidebar_image_height != null ? $sidebar_image_height : '250', 'text', ['required' => true]); ?>
                                    </div>
                                    <div class="row">
                                        <?php $sidebar_image_width = get_option("sidebar_image_width"); ?>
                                        <?= render_input('sidebar_image_width', 'Image Width (PX)', $sidebar_image_width != null ? $sidebar_image_width : '280', 'text', ['required' => true]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 row">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2">
                                    <input type="hidden" name="type" value="sidebar" required readonly/>
                                    <button type="submit" class="btn btn-danger" >Submit</button>
                                </div>
                            </div>
                            <?= form_close(); ?>	
                        </div>
                        <div class="tab-pane fade" id="nav-sms" role="tabpanel" aria-labelledby="nav-sms-tab">
                            <div class="table-responsive">
                                <table class="table custom_dt_table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($sms_templates as $key => $value) {
                                            $codes = model("Setting_model")->get_sms_rep_code_by(["template" => $value->id]);
                                            $codes_html = "";
                                            foreach ($codes as $ckey => $cvalue) {
                                                $codes_html .= "<span>" . $cvalue->short_code . "</span>,&nbsp;";
                                            }
                                            ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value->name ?></td>
                                                <td><?= $value->template ?></td>
                                                <td><button data-code="<?= $codes_html ?>" data-id="<?= encode($value->id) ?>" data-template="<?= $value->template ?>" type="button" class="btn btn-primary" onclick="edit_setting(this)">Edit</button></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
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