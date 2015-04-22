
<!--create Pay schedule modal-->
<div 
    class="modal hide fade" 
    id="create_paysch_modal" 
    tabindex="-1" role="dialog" 
    aria-labelledby="basicModal" 
    aria-hidden="true" 
    ng-controller="ScheduleController">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">Create Schedule</h4>
    </div>
    <form id="create_college_form"
          class="form-horizontal form-striped"
          method="post"
          action="<?php echo base_url('payment/setup/sets/schedule')?>">
    <div class="modal-body">
        <div class="control-group">
            <label for="session" class="control-label">Session :</label>
            <div class="controls">
                <div class="input-xlarge">
                    <select name="session_id"  class='chosen-select' required="">
                        <option value="">Choose</option>
                        <?php foreach($session as $ses){?>
                        <option value="<?php echo $ses['sesid']?>"><?php echo $ses['sesname']?></option>
                        <?php }?>
                    </select>                                                                     
                </div>
            </div>
        </div>
        <div class="control-group">
            <label for="payhead" class="control-label">Pay. Head :</label>
            <div class="controls">
                <div class="input-xlarge">
                    <select name="pay_head" id="payhead" class='chosen-select' required="">
                        <option value="">Choose</option>
                        <?php foreach ($payhead as $ph){?>
                        <option value="<?php echo $ph['payheadid']?>"><?php echo $ph['type']?></option>
                        <?php }?>
                    </select>                                                                     
                </div>
            </div>
        </div> 
        <div class="control-group">
            <label for="usertype" class="control-label">User Type :</label>
            <div class="controls">
                <div class="input-xlarge">
                    <select  class='chosen-select' id="usertype" name="user_type"  required="">
                        <option value="">Choose Type</option>
                        <option value="Admin">Admin</option>
                        <option value="Management">Management</option>
                        <option value="Staff">Staff</option>
                        <option value="Student">Student</option>
                    </select>                                                                    
                </div>
            </div>
        </div>
        <div class="control-group">
            <label for="instalment" class="control-label">Instalment :</label>
            <div class="controls">
                <div class="input-xlarge">
                    <select name="instalment" id="instalment" class='chosen-select' required="">
                        <option value="">Choose</option>
                        <?php foreach ($instalments as $inst) {?>
                        <option value="<?php echo $inst['instid']?>"><?php echo $inst['percentage']?></option>
                       <?php } ?>
                    </select>                                                                     
                </div>
            </div>
        </div>
        <div class="control-group">
            <label for="unittype" class="control-label">User' Specification :</label>
            <div class="controls">
                <div class="input-xlarge">
                    <select name="unittype" class='chosen-select' id="unit_type" ng-model="unittype"  ng-change="getUnit(unittype)">
                        <option value=""> Choose </option>
                        <option value="college">College</option>
                        <option value="department">Department</option>
                        <option value="programme">Programme</option>
                        <option value="all">University</option>
                    </select>                                                                     
                </div>
            </div>
        </div>
        <div class="control-group" >
            <label for="unitname" class="control-label">Specification Type :</label>
            <div class="controls">
                <div class="input-xlarge" ng-show="university" >
                    <input type="text" name="unitname" class="" value="all" readonly="">    
                </div>
                <div class="input-xlarge" ng-show="college">
                    <select name="unitname[]" id="unit_name0" class='chosen-select' multiple="" >
                        <?php foreach ($college as  $col) {?>
                        <option value="<?php echo $col['colid']?>"><?php echo $col['coltitle']?></option>
                        <?php }?>       
                    </select>
                </div>
                
                <div class="input-xlarge" ng-show="department" >
                    <select name="unitname[]" id="unit_name1" class='chosen-select'  multiple="">
                        <?php foreach ($departments as  $dept) {?>
                        <option value="<?php echo $dept['deptid']?>"><?php echo $dept['deptname']?></option>
                        <?php }?>
                    </select>
                </div>
                
                <div class="input-xlarge" ng-show="programme" >
                    <select name="unitname[]" id="unit_name2" class='chosen-select' multiple="">
                        <?php foreach ($programmes as  $prog) {?>
                        <option value="<?php echo $prog['progid']?>"><?php echo $prog['progname']?></option>
                        <?php }?>  
                    </select>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label for="level" class="control-label">Level :</label>
            <div class="controls">
                <div class="input-xlarge">
                    <select  class='chosen-select' id="shlevel" name="level[]" ng-model="level" multiple="" required="">
                            <?php for($idx = 1; $idx <= $max_prog_duration['duration']; $idx++){?>
                            <option value="<?php echo $idx?>"><?php echo $idx.'00'?></option>
                            <?php }?>     
                    </select>                                                                    
                </div>
            </div>
        </div>
        <div class="control-group">
            <label for="level" class="control-label">Amount :</label>
            <div class="controls">
                <div class="input-append input-prepend">
                    <span class="add-on">NGN</span>
                    <input class="input-small" type="text" name="amount">
                    <span class="add-on">.00</span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label for="pamount" class="control-label">Penalty :</label>
            <div class="controls">
                <div class="input-append input-prepend">
                    <span class="add-on">NGN</span>
                    <input class="input-small" type="text" name="pamount">
                    <span class="add-on">.00</span>
                </div>
            </div>  
        </div>
        </div>                                          
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn" aria-hidden="true">Cancel</button>
            <button class="btn btn-primary" type="submit" id="create_college_button">Create</button>
        </div> 
    </form>
</div> 
