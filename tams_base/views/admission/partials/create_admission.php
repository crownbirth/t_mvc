<!-- Create exam dialog -->
<div 
    class="modal hide fade" 
    id="create_admission_modal" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="basicModal" 
    aria-hidden="true">
    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">Create Admission</h4>
    </div>
    
    <form 
        id="create_exam_form" 
        class="form-horizontal form-striped" 
        method="post" 
        action="<?php echo site_url('admission/create_exam')?>">
        
        <div class="modal-body">
                    
            <div class="control-group">
                <label for="exam_group" class="control-label">Group:</label>
                <div class="controls">
                    <div class="input-xlarge">
                        <select name="exam_group" 
                            id="exam_group" 
                            class='chosen-select'>   
                            <option ng-repeat="group in data.groups" 
                                value="{{group.groupid}}" 
                                ng-bind="group.groupname"></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="exam_valid" class="control-label">Valid Years:</label>
                <div class="controls">
                    <input value="1" 
                           type="text" 
                           min="1" 
                           max="20" 
                           name="exam_valid" 
                           id="exam_valid" 
                           class="spinner input-mini uneditable-input"/>
                </div>
            </div>            
        </div>
        
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn" aria-hidden="true">Cancel</button>
            <button class="btn btn-primary" type="submit" id="edit_exam_button">Create</button>
        </div>
    </form>
</div>