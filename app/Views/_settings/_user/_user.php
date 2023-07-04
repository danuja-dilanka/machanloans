<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-md-4">
                        <h4 class="header-title"><?= $title ?></h4>
                    </div>
                    <div class="col-md-7">

                    </div>
                    <div class="col-md-1">
                        <?= isset($data) ? create_link("setting", "user", ["user", "add"], "+ New", "h6") : "" ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (count(validation_errors()) > 0) { ?>
                        <div class="alert alert-danger">
                            <?= validation_list_errors() ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= render_input('name', 'Name', isset($data) ? $data->name : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('email', 'Email', isset($data) ? $data->email : '', 'email', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_input('password', 'Password', '', 'password', isset($data) ? [] : ['required' => true, "minlength" => 7]); ?>
                        </div>
                        <?php if (is_admin()) { ?>
                            <div class="col-md-6">
                                <?= render_select('utype', $utypes, array('id', 'utype'), 'User Type', isset($data) ? $data->utype : '', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_custom_select("status", ["Active", "In Active"], "Status", isset($data) ? $data->status : '', 'required="true"') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger"><i class="ti-check-box"></i>&nbsp;Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>	
</div>
<?= view('inc/footer') ?>