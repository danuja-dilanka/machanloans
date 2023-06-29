<?= view('inc/header') ?>
<div class="main-content-inner mt-4">
    <?= form_open_multipart(current_url()); ?>
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
                        <?= isset($data) ? create_link("loan", "loan_group", ["group_data", "add"], "+ New", "h6") : "" ?>
                    </div>
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
                                <select id="members" class="form-control selectpicker selectpicker_ajax" name="members[]" data-live-search="true" data-clone="members" multiple="">
                                    <?php
                                    if (isset($group_members)) {
                                        foreach ($group_members as $key => $value) {
                                            ?>
                                            <option value="<?= $value->member ?>" selected=""><?= $value->member_name ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
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