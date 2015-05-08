<!-- Edit Admission Type modal -->
<div 
    class="modal hide fade" 
    id="edit_admission_type_modal" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="basicModal" 
    aria-hidden="true">
    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">Update Admission Type</h4>
    </div>
    
    <form 
        id="create_exam_form" 
        class="form-horizontal form-striped" 
        method="post" 
        action="<?php echo site_url('admission/update_admission_type')?>">
        
        <div class="modal-body">
            <div class="control-group">
                <label for="exam_valid" class="control-label">Admission Type:</label>
                <div class="controls">
                    <input type="text" name="adm_type" id="adm_title" value="{{current.type}} "class="spinner input-xlarge"/>
                </div>
            </div>
            <div class="control-group">
                <label for="exam_valid" class="control-label">Admission:</label>
                <div class="controls">
                    <div class="input-xlarge">
                        <select name="adm" 
                            id="edtadm" 
                            class="chosen-select"> 
                            <option value="">--Choose--</option>
                            <option ng-repeat="adm in data.admissions" ng-selected="current.admid == adm.admid" value="{{adm.admid}}" >{{adm.displayname}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="adm_status" class="control-label">Status:</label>
                <div class="controls">
                    <div class="input-xlarge">
                        <select name="adm_status" id="edtadm_status" class="chosen-select"> 
                            <option value="">--Choose--</option>
                            <option value="open" ng-selected="current.status =='open'">Open</option>
                            <option value="close" ng-selected="current.status =='close'">Close</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="adm_utme" class="control-label">Enable UTME Exam : </label>
                <div class="controls">
                    <div class="input-xlarge">
                        <select name="adm_utme" id="adm_status" class="chosen-select"> 
                            <option value="">--Choose--</option>
                            <option value="yes" ng-selected="current.utme =='yes'">Yes</option>
                            <option value="no" ng-selected="current.utme =='no'">No</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="edit_admission_type_id" value="{{current.typeid}}"/>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn" aria-hidden="true">Cancel</button>
            <button class="btn btn-primary" type="submit" id="edit_exam_button">Update</button>
        </div>
    </form>
</div>