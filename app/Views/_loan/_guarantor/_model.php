<!-- Modal -->
<div class="modal fade" id="gur_model" tabindex="-1" role="dialog" aria-labelledby="gur_modelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Guarantor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row px-2" data-select2-id="select2-data-10-9i8w">
                    <div class="col-md-12" data-select2-id="select2-data-9-n4vn">
                        <div class="form-group" data-select2-id="select2-data-8-cslv">
                            <label class="control-label">Loan ID<span class="required"> *</span></label>						
                            <select class="form-control auto-select select2 select2-hidden-accessible" data-selected="" name="loan_id" required="">
                                <option value="" data-select2-id="select2-data-3-6xfh">Select One</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12" data-select2-id="select2-data-19-lqbi">
                        <div class="form-group" data-select2-id="select2-data-18-u64w">
                            <label class="control-label">Guarantor<span class="required"> *</span></label>						
                            <select class="form-control auto-select select2 select2-hidden-accessible" data-selected="" id="member_id" name="member_id" required="">

                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Account Number<span class="required"> *</span></label>							
                            <select class="form-control select2 auto-select select2-hidden-accessible" data-selected="" name="savings_account_id" id="savings_account_id" required="">
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Amount<span class="required"> *</span></label>						
                            <input type="text" class="form-control float-field" name="amount" value="" required="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"><i class="ti-check-box"></i>&nbsp;Submit</button>
            </div>
        </div>
    </div>
</div>