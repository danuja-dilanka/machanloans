<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Select Member</h4>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <?= render_select('loan', model("Member_model")->get_data(0, 1), array('id', 'full_name'), 'Member', '', ['required' => true]); ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Continue</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>	
</div>
<?= view('inc/footer') ?>