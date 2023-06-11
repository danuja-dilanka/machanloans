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
                        <div class="row">
                            <div class="col-md-6">
                                <?= render_input('group_name', 'Group Name', isset($data) ? $data->group_name : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= render_input('member_limit', 'Member limit', isset($data) ? $data->member_limit : '', 'text', ['required' => true]); ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <lable for="member">Select Member</lable>
                                    <select class="form-control selectpicker" name="member[]" multiple=""></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?= render_custom_select("group_type", ["Loan Group", "Seettu"], "Group Type", isset($data) ? $data->group_type : '', 'required="true"') ?>
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