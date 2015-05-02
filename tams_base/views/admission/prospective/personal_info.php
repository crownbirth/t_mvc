<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * TAMS
 * Prospective Registartion form 1 
 * 
 * @category   View
 * @package    Admission
 * @subpackage Prospective registaration
 * @author     Sule-odu Adedayo <suleodu.adedayo@gmail.com>
 * @copyright  Copyright © 2014 TAMS.
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */

//var_dump($exam_grade['rs']);
?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered box-color">
            <div class="box-title">
                <h3><i class="icon-th-list"></i> Application Form - Step 1</h3>
                <ul class="tabs small">
                    <li class="btn btn-blue"><small>Bio Data</small></li>
                    <li class="btn btn-grey-2"><small>Next of Kin / Sponsor's Details </small></li>
                    <li class="btn btn-grey-2"><small>Education Background </small></li>
                    <li class="btn btn-grey-2"><small>UTME/DE Result </small></li>
                    <li class="btn btn-grey-2"><small>Programme Choice </small></li>
                </ul>
            </div>
            <div class="box-content">
                <h4 class="span"><i class="glyphicon-user"></i> Personal Information </h4>
                <form class="form-horizontal form-bordered" 
                    enctype="multipart/form-data"
                    method="POST" 
                    action="<?php echo site_url('admission/registration_submit/1')?>">
                    <div class="row-fluid">
                        <table class="table table-bordered table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th colspan="4">Bio Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>PASSPORT : </th>
                                    <td colspan="3">
                                        <div data-provides="fileupload" class="fileupload fileupload-new">
                                            <input type="hidden">
                                            <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"></div>
                                            <div style="max-width: 200px; max-height: 150px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="userfile"></span>
                                                <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                                            </div>
                                        </div>
                                    </td>  
                                </tr>
                                <tr>
                                    <th>Surname : </th>
                                    <td>
                                        <input type="text" class="input-large " id="firstname" name="fname" value="<?php echo $users['rs']['fname']?>" placeholder="Enter Surname here " required="required">
                                    </td>
                                    <th>First Name :</th>
                                    <td>
                                        <input type="text" class="input-large " id="anotherelem"value="<?php echo $users['rs']['lname']?>" name="lname" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Middle Name : </th>
                                    <td><input type="text" class="input-large " id="additionalfield" value="<?php echo $users['rs']['mname']?>" name="mname" required="required"></td>
                                    <th>Sex :</th>
                                    <td>
                                        <div class="span4">
                                            <select id="sex" name="sex" class=" input-small chosen-select " required="required">
                                                <option value="">Choose</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date Of Birth: </th>
                                    <td>
                                         <input type="text" class="input-large datepick" id="dob" value="<?php echo $users['rs']['dob']?>" name="dob" required="required">
                                    </td>
                                    <th>Phone :</th>
                                    <td>
                                        <input type="text" class="input-large" value="<?php echo $users['rs']['phone']?>" id="phone" name="phone" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Address: </th>
                                    <td>
                                        <textarea class="input-large" name="address"   rows="3" required="required"><?php echo $users['rs']['address']?></textarea>
                                    </td>
                                    <th>E-Mail :</th>
                                    <td>
                                        <input type="email" class="input-large " id="additionalfield" value="<?php echo $users['rs']['email']?>" name="email" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nationality : </th>
                                    <td>
                                        <div class="span4">
                                            <select id="nationality" name="nationality" class=" input-large chosen-select " data-rule-required="true">
                                                <option value="">Choose</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                    </td>
                                    <th>State Of Origin :</th>
                                    <td>
                                        <div class="span6">
                                            <select id="soforig" name="soforig" ng-model="state" class=" input-large chosen-select " required="required">
                                                <option value="">Choose</option>
                                                <?php foreach($state['rs'] as $st){?>
                                                <option value="<?php echo $st['stateid']?>"><?php echo $st['statename']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Marital Status  : </th>
                                    <td>
                                        <div class="span6">
                                            <select id="marital" name="marital" class=" input-large chosen-select" required="required">
                                                <option value="">Choose</option>
                                                <option value="married">Married</option>
                                                <option value="single">Single</option>
                                                <option value="divorce">Divorce</option>
                                                <option value="widow">Widow</option>
                                            </select>
                                        </div>
                                    </td>
                                    <th>Lga :</th>
                                    <td>
                                        <div class="span6">
                                            <select id="lgaoforig" name="lgaoforig" class=" input-large" required="required">
                                                <option value="">Choose</option>
                                                <option ng-repeat="n in state_local" value="{{n.lgaid}}">{{n.lganame}}</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Blood Group: </th>
                                    <td>
                                        <div class="span6">
                                            <select id="blood" name="blood" class=" input-large chosen-select " required="required">
                                                <option value="">Choose</option>
                                                <option value="O">O</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                            </select>
                                        </div> 
                                    </td>
                                    <th>Physical Disability :</th>
                                    <td>
                                        <div class="span6">
                                            <select id="disable" name="disable" ng-model="disable"  class=" input-large chosen-select " required="required">
                                                <option value="">Choose</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            <span ng-show="disable == 'yes'">
                                                <textarea class="input-large" name="disable_desc"  rows="3" placeholder="Describe your disability"></textarea>
                                            </span>
                                        </div> 
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hobby : </th>
                                    <td>
                                         <div class="span10"><input type="text" name="hobby" id="hobby" class=" tagsinput input-large"></div>
                                    </td>
                                    <th>Religion :</th>
                                    <td>
                                        <div class="span6">
                                            <select id="religion" name="religion" class=" input-large chosen-select " required="required">
                                                <option value="">Choose</option>
                                                <option value="Christianity">Christianity</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Others">Others</option>      
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>  
                    </div>
                    <div class="form-actions">
                            <button class="btn btn-primary" type="submit">Save changes</button>
                            <button class="btn" type="button">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var state = <?php echo (is_array($state['rs']))? json_encode($state['rs']): '[]'?>;
    var lga = <?php echo (is_array($lga['rs']))? json_encode($lga['rs']): '[]'?>;
    var exam_groups = <?php echo (is_array($exam_group['rs']))? json_encode($exam_group['rs']): '[]'?>;
    var exam_type_period = <?php echo (is_array($exam_type_period['rs']))? json_encode($exam_type_period['rs']): '[]'?>;
    var exam_subjects = <?php echo (is_array($exam_subject['rs']))? json_encode($exam_subject['rs']): '[]'?>;
    var exam_grades = <?php echo (is_array($exam_grade['rs']))? json_encode($exam_grade['rs']): '[]'?>;
</script>