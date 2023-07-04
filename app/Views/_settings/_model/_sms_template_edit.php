<!-- Modal -->
<div class="modal fade" id="smste_model" tabindex="-1" role="dialog" aria-labelledby="smste_modelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smste_modelTitle">Edit SMS Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row alert alert-info p-2" id="sms_rep_codes"></div>
                <div class="row p-2">
                    <textarea class="form-control" id="sms_template" ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="template_id" readonly>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="save_template()" class="btn btn-primary"><i class="ti-check-box"></i>&nbsp;Submit</button>
            </div>
        </div>
    </div>
</div>