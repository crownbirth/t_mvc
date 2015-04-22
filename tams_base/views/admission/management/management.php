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

//var_dump($groups['rs']);
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
                        <a data-toggle="tab" href="#thirds3322"><i class="icon-tag"></i> Upload UTME</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#thirds33"><i class="icon-trash"></i> Upload Admitted</a>
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
                                                <table class="table table-bordered table-condensed table-striped">
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
                                                                            <a ng-click="openEditDialog('group', $index, $event)">Edit</a>
                                                                        </li>
                                                                        <li>
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
                                                <table class="table table-hover table-nomargin table-condensed">
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
                                                <table class="table table-hover table-nomargin dataTable">
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
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_subject_modal">                             
                                                        <i class="icon-plus"> </i> New Exam Subject                        
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="t5" class="tab-pane ">
                                                <ul class="tabs pull-right form">
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_grade_modal">
                                                        <i class="icon-plus"></i> New Grade
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="t6" class="tab-pane ">
                                                <ul class="tabs pull-right form">
                                                    <li class="btn btn-green" data-toggle="modal" href="#create_grade_modal">
                                                        <i class="icon-plus"></i> New Exam Grade
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="second22" class="tab-pane">
                        here                    
                    </div>
                    <div id="thirds3322" class="tab-pane">
                        here
                    </div>
                    <div id="thirds33" class="tab-pane">
                        here
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var groups = <?php echo (is_array($groups['rs']))? json_encode($groups['rs']): '[]'?>;

    var exams = <?php echo (is_array($exams['rs']))? json_encode($exams['rs']): '[]'?>;
    
    var grades = <?php echo (is_array($grades['rs']))? json_encode($grades['rs']): '[]'?>;
    
    var subjects = <?php echo (is_array($subjects['rs']))? json_encode($subjects['rs']): '[]'?>;
</script>