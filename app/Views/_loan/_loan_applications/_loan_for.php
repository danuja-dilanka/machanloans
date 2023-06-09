<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url(), array('data-parsley-validate' => 'true')); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Select Member | New Loan Application</h4>
                </div>
                <div class="card-body">
                    <div class="row col-md-12 text-center">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <?= render_select('member', model("Member_model")->get_mem_data(0, 1), array('id', 'full_name'), 'Member', '', ['required' => true]); ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Continue</button>
                                </div>
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