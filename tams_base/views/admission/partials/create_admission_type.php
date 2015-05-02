<!-- Create exam dialog -->
<div 
    class="modal hide fade" 
    id="create_admission_type_modal" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="basicModal" 
    aria-hidden="true">
    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">Add Type To Admission</h4>
    </div>
    
    <form 
        id="create_exam_form" 
        class="form-horizontal form-striped" 
        method="post" 
        action="<?php echo site_url('admission/create_admission_type')?>">
        
        <div class="modal-body">
            <div class="control-group">
                <label for="exam_valid" class="control-label">Admission:</label>
                <div class="controls">
                    <div class="input-xlarge">
                        <select name="adm" 
                            id="adm" 
                            class="chosen-select"> 
                            <option value="">--Choose--</option>
                            <option ng-repeat="adm in data.admissions" value="{{adm.admid}}" >{{adm.displayname}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="exam_valid" class="control-label">Admission Type:</label>
                <div class="controls">
                    <input type="text" name="adm_type" id="adm_title" class="spinner input-xlarge"/>
                </div>
            </div>
            <div class="control-group">
                <label for="adm_status" class="control-label">Status:</label>
                <div class="controls">
                    <div class="input-xlarge">
                        <select name="adm_status" id="adm_status" class="chosen-select"> 
                            <option value="">--Choose--</option>
                            <option value="open">Open</option>
                            <option value="close">Close</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn" aria-hidden="true">Cancel</button>
            <button class="btn btn-primary" type="submit" id="edit_exam_button">Create</button>
        </div>
    </form>
</div>