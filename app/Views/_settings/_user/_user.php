<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Add New User</h4>
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
                            <?= render_input('password', 'Password', '', 'password', isset($data) ? [] : ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_select('utype', $utypes, array('id', 'utype'), 'User Type', isset($data) ? $data->utype_id : '', ['required' => true]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= render_custom_select("status", ["Active", "In Active"], "Status", isset($data) ? $data->status : '', 'required="true"') ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="ti-check-box"></i>&nbsp;Submit</button>
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