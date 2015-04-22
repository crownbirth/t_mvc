<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * TAMS
 * Prospective Registartion form 4 
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
                <h3><i class="icon-th-list"></i> Application Form - Step 4</h3>
                <ul class="tabs small">
                    <li class="btn btn-grey-2">Personal Information</li>
                    <li class="btn btn-grey-2 ">Next of Kin / Sponsor's Details</li>
                    <li class="btn btn-grey-2">Education Background</li>
                    <li class="btn btn-blue">UTME/DE Result</li>
                    <li class="btn btn-grey-2">Programme Choice</li>
                </ul>
            </div>
            <div class="box-content">
                <h4 class="span"><i class="glyphicon-book"></i> UTME / DE Result  </h4>
                <form class="form-horizontal form-bordered" 
                    enctype="multipart/form-data"
                    method="POST" 
                    action="<?php echo site_url('admission/registration_submit/4')?>">
                    <div class="row-fluid">
                        <h6><i class="icon-list"></i> UTME/DE Result </h6>
                        <div class="span12 row">
                            <?php if($prospective['rs']['admtype'] == 'UTME'){?>
                            <div class='span11'>
                                <div class="box-bordered">
                                    <h6><i class="icon-list"></i>UTME Result </h6>
                                </div>
                                <div class="row-fluid">
                                    <div class="control-group">
                                        <label class="control-label span2" for="exam_cart">Exam Category</label>
                                        <div class="controls">
                                            <div class='span4'>
                                                <select id="exam_cart" name="exam_cart" class="chosen-select">
                                                    <option value="">Choose</option>
                                                    <?php foreach ($exam_group['rs'] as $group){ ?>
                                                    <option value="<?php echo $group['groupid']?>"> <?php echo $group['groupname']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label span2" for="exam_cart">Exam Type</label>
                                        <div class="controls">
                                            <div class='span4'>
                                                <select name="olevel[0][examtype]"  class="input-medium"   ng-model="exam_type1" >
                                                    <option value="">--Exam Type--</option>
                                                    <option ng-repeat="ex in ex_typ_periods" value="{{ex.examid}}">{{ex.shortname}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label span2" for="exam_cart">Exam Type</label>
                                        <div class="controls">
                                            <div class='span4'>
                                                <select name="olevel[0][examyr]" class="ui-wizard-content input-small" >
                                                    <option value="">--Exam Year--</option>
                                                    <?php 
                                                    $i =0;
                                                    do{
                                                       $year = $this_year - $i;  
                                                    ?>
                                                    <option value="<?php echo $year?>"><?php echo $year?></option>
                                                    <?php 
                                                    $i++;
                                                    }while($i <= 30)?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label span2" for="exam_cart">Exam Type</label>
                                        <div class="controls">
                                            <div class='span4'>
                                                <input type="text" name="olevel[0][examnum]" id="examnum[first]" placeholder="Exam No " class="input-small">
                                            </div>
                                        </div>
                                    </div>
                                   <input type="hidden" name="olevel[0][sitting]" value="first"> 
                                   <div class="control-list">
                                        <table class="table table-bordered table-condensed table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Subject</th>
                                                    <th>Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 0;
                                                do{?>
                                                <tr>
                                                    <td><?php echo $i +1?></td>
                                                    <td>
                                                         <select name="utme[subject]">
                                                             <option value="">--Subject--</option>
                                                             <option value="{{sbj.examsubjectid}}" ng-repeat="sbj in subject1">{{sbj.subname}}</option>
                                                         </select> 
                                                    </td>
                                                    <td>
                                                        <input type="number" name="utme[grade][]" class="input-small" min="0" max="100" >
                                                    </td>
                                                </tr>
                                                <?php 
                                                $i++;
                                                }while($i < 4)?>
                                            </tbody>
                                        </table>
                                    </div>
                                   <input type="hidden" name="admtype" value="UTME">
                                </div>
                            </div>
                            <?php }else{?>
                            <div class="span11">
                                <div class="box-bordered">
                                    <h6><i class="icon-list"></i>  DE Result</h6>
                                </div>
                                <div class="row-fluid">
                                    <div class="control-group">
                                        <label class="control-label span2" for="inst_name">Institution Name</label>
                                        <div class="controls">
                                            <div class='span6'>
                                                <input type="text" name="inst_name" id="inst_name" placeholder="School Name" class="input-xxlarge">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label span2" for="inst_name">Institution Address</label>
                                        <div class="controls">
                                            <div class='span6'>
                                                <textarea name="inst_address" class="input-xxlarge" placeholder="School Addresss"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label span2" for="cert_obtain">Certificate Obtained</label>
                                        <div class="controls">
                                            <div class='span6'>
                                                <input type="text" name="cert_obtain" id="inst_name" placeholder="Certificate Obtained" class="input-xxlarge">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label span2" for="grade">Grade</label>
                                        <div class="controls">
                                            <div class='span6'>
                                                <select name="grade" class="chosen-select">
                                                    <option value="">--Choose--</option>
                                                    <option value="Distinction">Distinction</option>
                                                    <option value="Upper-Credit">Upper-Credit</option>
                                                    <option value="Lower-Credit">Lower-Credit</option>
                                                    <option value="Merit">Merit</option>
                                                    <option value="Pass">Pass</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label span2" for="grad_year">Graduation Year</label>
                                        <div class="controls">
                                            <div class='span6'>
                                                <input type="text" name="grad_year" maxlength="4" class="input-xxlarge" placeholder="YYYY">
                                                <span class="help-block"><small>Format : YYYY</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="admtype" value="DE">
                                </div>
                            </div>   
                            <?php }?>
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