<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-md-4">
                        <h3>Add New User Role</h3>
                    </div>
                    <div class="col-md-7">

                    </div>
                    <div class="col-md-1">
                        <?= isset($data) ? create_link("setting", "user_role", ["user_role", "add"], "+ New", "h6") : "" ?>
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
                            <?= render_input('utype', 'User Type', isset($data) ? $data->utype : '', 'text', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_custom_select("status", ["Active", "In Active"], "Status", isset($data) ? $data->status : '', 'required="true"') ?>
                        </div>
                        <div class="col-md-12">
                            <?= render_textarea('description', 'Description', isset($data) ? $data->description : ''); ?>
                        </div>
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