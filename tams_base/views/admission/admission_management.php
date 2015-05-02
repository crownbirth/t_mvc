<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * TAMS
 * Admission Managent 
 * 
 * @category   View
 * @package    Admission
 * @subpackage Admission Management
 * @author     Sule-odu Adedayo <suleodu.adedayo@gmail.com>
 * @copyright  Copyright © 2014 TAMS.
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */

//var_dump($admissions['rs']);
?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered box-color">
            <div class="box-title">
                <h3><i class="icon-reorder"></i> Admission Management</h3>
            </div>
            <div class="box-content nopadding">
                <ul class="tabs tabs-inline tabs-top">
                    <li class="active">
                        <a data-toggle="tab" href="#first11"><i class="icon-inbox"></i> Exam Setup</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#second22"><i class="icon-share-alt"></i> Admission Setup</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#thirds3322"><i class="glyphicon-cloud-upload"></i> Upload UTME</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#thirds33"><i class="glyphicon-cloud-upload"></i> Upload Admitted</a>
                    </li>
                </ul>
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div id="first11" class="tab-pane active">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="box box-bordered">
                                    <div class="box-title">
                                        <h3>
                                            <i class="icon-reorder"></i> Exam Setup
                                        </h3>
                                        <ul class="tabs">
                                            <li class="active">
                                                <a data-toggle="tab" href="#t1">Exam Group</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#t2">Exam</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#t3">Subject</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#t4">Exam Subject</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#t5">Grade</a>
                                            </li>
                                             <li class="">
                                                <a data-toggle="tab" href="#t6">Exam Grade</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="box-content">
                                        <div class="tab-content">
                                            <div id="t1" class="tab-pane active">
                                                <ul class="tabs pull-right form">
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_group_modal">                             
                                                        <i class="icon-plus"> </i> New Exam Group                       
                                                    </li>
                                                </ul>
                                                <p>&nbsp;</p><br/>
                                                <table id="examgroup" class="table table-bordered table-condensed table-striped dataTable dataTables_filter dataTables_paginate">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Name</th>
                                                            <th>Require</th>
                                                            <th>Max. Entry</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        <tr ng-repeat="group in data.groups">
                                                            <td ng-bind="$index+1"></td>
                                                            <td ng-bind="group.groupname"></td>
                                                            <td ng-bind="group.required"></td>
                                                            <td ng-bind="group.maxentries"></td> 
                                                            <td ng-bind="group.status"></td>  
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                                                                        <i class="icon-cog"> </i>
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-success">
                                                                        <li>
                                                                            <a ng-click="openEditDialog('user', $index, $event)">Edit</a>
                                                                        </li>
                                                                        <li ng-if="group.setup == 'predefine'">
                                                                            <a ng-click="openDeleteDialog('group', $index, $event)">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr ng-show="data.groups.length < 1">                                
                                                            <td colspan="6">
                                                                <?php echo sprintf($this->lang->line('no_entries'), 'groups')?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="t2" class="tab-pane">
                                                <ul class="tabs pull-right form">
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_exam_modal">
                                                        <i class="icon-plus"> </i> New Exam
                                                    </li>
                                                </ul>
                                                <p>&nbsp;</p><br/>
                                                <table id="exam" class="table table-hover table-nomargin table-condensed dataTable dataTables_filter dataTables_paginate">
                                                    <thead>
                                                        <th>S/N</th>                                
                                                        <th>Name</th>
                                                        <th>Shortname</th>                               
                                                        <th>Valid Exam Years</th>
                                                        <th>Minimum Subjects</th>                                
                                                        <th>Score-Based</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </thead> 
                                                    <tbody>
                                                        <tr ng-repeat="exam in data.exams">
                                                            <td ng-bind="$index+1"></td>
                                                            <td ng-bind="exam.examname"></td>
                                                            <td ng-bind="exam.shortname"></td>
                                                            <td ng-bind="exam.validyears"></td>
                                                            <td ng-bind="exam.minsubject"></td>
                                                            <td ng-bind="exam.scorebased"></td> 
                                                            <td ng-bind="exam.status"></td>  
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                                                                        <i class="icon-cog"> </i>
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-success">
                                                                        <li>
                                                                            <a ng-click="openEditDialog('exam', $index, $event)">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a ng-click="openDeleteDialog('exam', $index, $event)">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr ng-show="data.exams.length < 1">                                
                                                            <td colspan="8">
                                                                <?php echo sprintf($this->lang->line('no_entries'), 'exams')?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="t3" class="tab-pane ">
                                                <ul class="tabs pull-right form">
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_subject_modal">                             
                                                        <i class="icon-plus"> </i> New Subject                        
                                                    </li>
                                                </ul>
                                                <p>&nbsp;</p><br/>
                                                <table id="subject" class="table table-hover table-nomargin dataTable dataTables_filter dataTables_paginate">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>                                
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="subj in data.subjects">
                                                            <td ng-bind="$index+1"></td>
                                                            <td ng-bind="subj.subname"></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                                                                        <i class="icon-cog"> </i>
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-success">
                                                                        <li>
                                                                            <a ng-click="openEditDialog('subject', $index, $event)">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a ng-click="openDeleteDialog('subject', $index, $event)">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr ng-show="data.subjects.length < 1">                                
                                                            <td colspan="3">
                                                                <?php echo sprintf($this->lang->line('no_entries'), 'subjects')?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="t4" class="tab-pane ">
                                                <ul class="tabs pull-right form">
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_exam_subject_modal">                             
                                                        <i class="icon-plus"> </i> New Exam Subject                        
                                                    </li>
                                                </ul>
                                                <p>&nbsp;</p><br/>
                                                <table id="examsubject" class="table table-hover table-nomargin dataTable dataTables_filter dataTables_paginate">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Exam Names</th>
                                                            <th>Subjects </th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="exsubj in data.exam_subjects">
                                                            <td ng-bind="$index +1"></td>
                                                            <td ng-bind="exsubj.shortname"></td>
                                                            <td ng-bind="exsubj.subname"></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                                                                        <i class="icon-cog"> </i>
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-success">
                                                                        <li>
                                                                            <a ng-click="openEditDialog('exam_subject', $index, $event)">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a ng-click="openDeleteDialog('grade', $index, $event)">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="t5" class="tab-pane ">
                                                <ul class="tabs pull-right form">
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_grade_modal">
                                                        <i class="icon-plus"></i> New Grade
                                                    </li>
                                                </ul>
                                                <p>&nbsp;</p><br/>
                                                <table id="grade" class="table table-hover table-nomargin table-bordered table-condensed dataTable dataTables_filter dataTables_paginate">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>                                
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="grade in data.grades">
                                                            <td ng-bind="$index+1"></td>
                                                            <td ng-bind="grade.gradename"></td> 
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                                                                        <i class="icon-cog"> </i>
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-success">
                                                                        <li>
                                                                            <a ng-click="openEditDialog('grade', $index, $event)">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a ng-click="openDeleteDialog('grade', $index, $event)">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr ng-show="data.grades.length < 1">                                
                                                            <td colspan="5">
                                                                <?php echo sprintf($this->lang->line('no_entries'), 'grades')?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="t6" class="tab-pane ">
                                                <ul class="tabs pull-right form">
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_exam_grade_modal">
                                                        <i class="icon-plus"></i> New Exam Grade
                                                    </li>
                                                </ul>
                                                <p>&nbsp;</p><br/>
                                                <table id="examgrade" class="table table-hover table-nomargin dataTable dataTables_filter dataTables_paginate">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Exam Names</th>
                                                            <th>Grade</th>
                                                            <th>Weight </th>
                                                            <th>Description  </th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="exgrd in data.exam_grades">
                                                            <td ng-bind="$index +1"></td>
                                                            <td ng-bind="exgrd.shortname"></td>
                                                            <td ng-bind="exgrd.gradename"></td>
                                                            <td ng-bind="exgrd.gradeweight"></td>
                                                            <td ng-bind="exgrd.gradedesc"></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                                                                        <i class="icon-cog"> </i>
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-success">
                                                                        <li>
                                                                            <a ng-click="openEditDialog('exam_grade', $index, $event)">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a ng-click="openDeleteDialog('exam_grade', $index, $event)">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="second22" class="tab-pane">
                         <div class="row-fluid">
                            <div class="span12">
                                <div class="box box-color">
                                    <div class="box-title">
                                        <h3>
                                            <i class="icon-reorder"></i> Admission Setup
                                        </h3>
                                        <ul class="tabs">
                                            <li class="active">
                                                <a data-toggle="tab" href="#t7">Admissions</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#t8">Admission Types</a>
                                            </li>  
                                        </ul>
                                    </div>
                                    <div class="box-content">
                                        <div class="tab-content">
                                            <div id="t7" class="tab-pane active">
                                                 <ul class="tabs pull-right form">
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_admission_modal">                             
                                                        <i class="icon-plus"></i> Set Admission                       
                                                    </li>
                                                </ul>
                                                <p>&nbsp;</p><br/>
                                                <table id="adm-table" class="table table-bordered table-condensed table-striped dataTable dataTables_filter dataTables_paginate">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Admission Title </th>
                                                            <th>Session</th>
                                                            <th>Date Created</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        <tr ng-repeat="adm in data.admissions">
                                                            <td ng-bind="$index+1"></td>
                                                            <td ng-bind="adm.displayname"></td>
                                                            <td ng-bind="adm.sesname"></td> 
                                                            <td ng-bind="adm.created"></td>  
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                                                                        <i class="icon-cog"> </i>
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-success">
                                                                        <li>
                                                                            <a ng-click="openEditDialog('admission', $index, $event)">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a ng-click="openDeleteDialog('admission', $index, $event)">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr ng-show="data.admissions.length < 1">                                
                                                            <td colspan="6">
                                                                <?php echo sprintf($this->lang->line('no_entries'), 'groups')?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="t8" class="tab-pane">
                                                <ul class="tabs pull-right form">
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_admission_type_modal">                             
                                                        <i class="icon-plus"></i> Add Admission Type                     
                                                    </li>
                                                </ul>
                                                <p>&nbsp;</p><br/>
                                                <table id="adm-table" class="table table-bordered table-condensed table-striped dataTable dataTables_filter dataTables_paginate">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Admission Title </th>
                                                            <th>Session</th>
                                                            <th>Admission Type</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        <tr ng-repeat="adm_typ in data.admission_types">
                                                            <td ng-bind="$index+1"></td>
                                                            <td ng-bind="adm_typ.displayname"></td>
                                                            <td ng-bind="adm_typ.sesname"></td> 
                                                            <td ng-bind="adm_typ.type"></td>
                                                            <td ng-bind="adm_typ.status"></td>  
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                                                                        <i class="icon-cog"> </i>
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-success">
                                                                        <li>
                                                                            <a ng-click="openEditDialog('admission_type', $index, $event)">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a ng-click="openDeleteDialog('admission_type', $index, $event)">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr ng-show="data.admissions.length < 1">                                
                                                            <td colspan="6">
                                                                <?php echo sprintf($this->lang->line('no_entries'), 'groups')?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                 
                    </div>
                    <div id="thirds3322" class="tab-pane">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="box">
                                    <div class="box-title">
                                        <h3>
                                            <i class="glyphicon-cloud-upload"></i> UTME Result Upload
                                        </h3>
                                        <ul class="tabs">
                                            <li class="active">
                                                <a data-toggle="tab" href="#utme1">Upload UTME</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#utme2">Sample tab #2</a>
                                            </li>  
                                        </ul>
                                    </div>
                                    <div class="box-content">
                                        <div class="tab-content">
                                            <div id="utme1" class="tab-pane active">
                                                <div id="accordion2" class="accordion">
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading">
                                                            <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                                                Add Single Record
                                                            </a>
                                                        </div>
                                                        <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                                                            <div class="accordion-inner">
                                                                Single UTME Submission Here
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading">
                                                            <a href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                                                Upload from file
                                                            </a>
                                                        </div>
                                                        <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                                                            <div class="accordion-inner">
                                                                <div class="span12">
                                                                    <form 
                                                                        id="create_exam_form" 
                                                                        class="form-horizontal form-striped" 
                                                                        method="post" 
                                                                        action="<?php echo site_url('admission/create_exam')?>">
                                                                        <table class="table table-bordered table-condensed table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th colspan="4">UTME File Upload</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>Admission name: </th>
                                                                                    <td>
                                                                                        <select name="adm_name">
                                                                                            <option value="">--Choose--</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Admission type: </th>
                                                                                    <td>
                                                                                        <select name="adm_name">
                                                                                            <option value="">--Choose--</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Select File : </th>
                                                                                    <td>
                                                                                        <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="aaaa">
                                                                                            <div class="input-append">
                                                                                                <div class="uneditable-input span3">
                                                                                                    <i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span>
                                                                                                </div>
                                                                                                <span class="btn btn-file">
                                                                                                    <span class="fileupload-new">Select file</span>
                                                                                                    <span class="fileupload-exists">Change</span>
                                                                                                    <input type="file" name="">
                                                                                                </span><a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>&nbsp;</th>
                                                                                    <td>
                                                                                        <button type="submit" class="btn btn-success btn-small">Upload</button>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </form>
                                                                    <br/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="utme2" class="tab-pane">
                                                here 2
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div id="thirds33" class="tab-pane">
                        here4
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    var cur_adm_session = <?php echo (is_array($adm_session))? json_encode($adm_session): '[]'?>;

    var groups = <?php echo (is_array($groups['rs']))? json_encode($groups['rs']): '[]'?>;

    var exams = <?php echo (is_array($exams['rs']))? json_encode($exams['rs']): '[]'?>;
    
    var grades = <?php echo (is_array($grades['rs']))? json_encode($grades['rs']): '[]'?>;
    
    var subjects = <?php echo (is_array($subjects['rs']))? json_encode($subjects['rs']): '[]'?>;
    
    var exam_subjects = <?php echo (is_array($exam_subjects['rs']))? json_encode($exam_subjects['rs']): '[]'?>;
    
    var exam_grades = <?php echo (is_array($exam_grades['rs']))? json_encode($exam_grades['rs']): '[]'?>;
    
    var admissions = <?php echo (is_array($admissions['rs']))? json_encode($admissions['rs']): '[]'?>;
    
    var admission_types = <?php echo (is_array($admission_types['rs']))? json_encode($admission_types['rs']): '[]'?>;
</script>











