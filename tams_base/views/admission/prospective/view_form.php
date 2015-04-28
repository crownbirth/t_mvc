<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * TAMS
 * Prospective View Registration Form
 * 
 * @category   View
 * @package    Admission
 * @subpackage Prospective registaration
 * @author     Sule-odu Adedayo <suleodu.adedayo@gmail.com>
 * @copyright  Copyright © 2014 TAMS.
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */

//var_dump($record);
?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered box-color">
            <div class="box-title">
                <h3><i class="icon-th-list"></i> Application From</h3>
            </div>
            <div class="box-content">
                <table class="table table-condensed table-striped table-bordered table-colored-header"">
                    <thead>
                        <tr>
                            <th colspan="4">Personal Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4">
                                
                                <table>
                                    <tr >
                                        <td><div style="width: 200px; height: 150px;" class="fileupload-new thumbnail "><img style="width: 197px; height: 140px;" src="<?php echo $url?>"></div></td>
                                        <td style="text-align: center; vertical-align: middle; font-size: 25px">
                                            &nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            
                        </tr>
                        <tr>
                            <th width="50">SURNAME: </th>
                            <td width="150"><?php echo $record['fname']?></td>
                            <th width="50">OTHER NAMES: </th>
                            <td width="150"><?php echo $record['lname'].' '.$record['mname']?></td>
                        </tr>
                        <tr>
                            <th width="50">E-MAIL: </th>
                            <td width="150"><?php echo $record['email']?></td>
                            <th width="50">PHONE: </th>
                            <td width="150"><?php echo $record['phone']?></td>
                        </tr>
                        <tr>
                            <th width="50">Date of Birth : </th>
                            <td width="150"><?php echo date("D, d-m-Y", strtotime($record['dob']) ) ?></td>
                            <th width="50">Sex: </th>
                            <td width="150"><?php echo $record['sex']?></td>
                        </tr>
                        <tr>
                            <th width="50">Contact Address: </th>
                            <td width="150"><?php echo $record['address'] ?></td>
                            <th width="50">Religion : </th>
                            <td width="150"><?php echo $record['religion']?></td>
                        </tr>
                        <tr>
                            <th width="50">State of Origin : </th>
                            <td width="150"><?php echo $record['statename'] ?></td>
                            <th width="50">L.G.A : </th>
                            <td width="150"><?php echo $record['lganame']?></td>
                        </tr>
                        <tr>
                            <th width="50">Nationality : </th>
                            <td width="150"><?php echo $record['nationality'] ?></td>
                            <th width="50">Blood Group : </th>
                            <td width="150"><?php echo $record['blood']?></td>
                        </tr>
                        <tr>
                            <th width="50">Marital Status : </th>
                            <td width="150"><?php echo $record['marital'] ?></td>
                            <th width="50">Hobby : </th>
                            <td width="150"><?php echo $record['hobby'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <table class="table table-condensed table-striped table-bordered table-colored-header">
                    <thead>
                        <tr>
                            <td colspan="2">Next of Kin / Sponsor's Information</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="50%">
                                <table class="table table-condensed table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <td colspan="2">Next of Kin</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th width="25%">Surname :</th>
                                            <td width="75%"><?php echo $record['nkfname']?></td>
                                        </tr>
                                        <tr>
                                            <th>Other Names :</th>
                                            <td><?php echo $record['nkoname']?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone :</th>
                                            <td><?php echo $record['nkphone']?></td>
                                        </tr>
                                        <tr>
                                            <th>Mail :</th>
                                            <td><?php echo $record['nkmail']?></td>
                                        </tr>
                                        <tr>
                                            <th>Address :</th>
                                            <td><?php echo $record['nkaddress']?></td>
                                        </tr>
                                        <tr>
                                            <th>Relationship with Kin :</th>
                                            <td><?php echo $record['nkrelation']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            
                            <td width="50%">
                                <table id="tbl1" class="table table-condensed table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <td colspan="2">Sponsor</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th width="25%">Full Name :</th>
                                            <td width="75%"><?php echo $record['spname']?></td>
                                        </tr>
                                        <tr>
                                            <th>Address :</th>
                                            <td><?php echo $record['spaddress']?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone :</th>
                                            <td><?php echo $record['spphone']?></td>
                                        </tr>
                                        <tr>
                                            <th>E-mail :</th>
                                            <td><?php echo $record['spemail']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <table class="table table-condensed table-striped table-bordered table-colored-header">
                    <thead>
                        <tr>
                            <td colspan="2">O'level Result</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="50%"> 
                                <table class="table table-condensed table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">O'Level Sitting 1</th>
                                        </tr>
                                    </thead>
                                    <?php if(!empty($olevel1)){?>
                                    <tbody>
                                        <tr>
                                            <th width="25%">Exam Type:</th>
                                            <td colspan="2"><?php echo $olevel1[0]['shortname']?></td>
                                        </tr>
                                        <tr>
                                            <th>Exam Year:</th>
                                            <td colspan="2"><?php echo $olevel1[0]['examyear']?></td>
                                        </tr>
                                        <tr>
                                            <th>Exam No:</th>
                                            <td colspan="2"><?php echo $olevel1[0]['examnumber']?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <table class="table table-condensed table-striped table-bordered">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Subject</th>
                                                        <th>Grade</th>
                                                    </tr>
                                                    <tbody>
                                                        <?php foreach($olevel1 AS $key => $olv){?>
                                                        <tr>
                                                            <td><?php echo ($key + 1)?></td>
                                                            <td><?php  echo $olv['subname']?></td>
                                                            <td><?php  echo $olv['gradename']?></td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table> 
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php }else{?>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"> No O'level Result Submitted</td>
                                        </tr>
                                    </tbody>
                                    <?php }?>
                                </table>
                            </td>
                            <td width="50%"> 
                                <table class="table table-condensed table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">O'Level Sitting 2</th>
                                        </tr>
                                    </thead>
                                    <?php if(!empty($olevel2)){?>
                                    <tbody>
                                        <tr>
                                            <th width="25%">Exam Type:</th>
                                            <td colspan="2"><?php echo $olevel2[0]['shortname']?></td>
                                        </tr>
                                        <tr>
                                            <th>Exam Year:</th>
                                            <td colspan="2"><?php echo $olevel2[0]['examyear']?></td>
                                        </tr>
                                        <tr>
                                            <th>Exam No:</th>
                                            <td colspan="2"><?php echo $olevel2[0]['examnumber']?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <table class="table table-condensed table-striped table-bordered">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Subject</th>
                                                        <th>Grade</th>
                                                    </tr>
                                                    <tbody>
                                                        <?php foreach($olevel2 AS $key => $olv){?>
                                                        <tr>
                                                            <td><?php echo ($key + 1)?></td>
                                                            <td><?php  echo $olv['subname']?></td>
                                                            <td><?php  echo $olv['gradename']?></td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table> 
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php }else{?>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"> No O'level Result Submitted</td>
                                        </tr>
                                    </tbody>
                                    <?php }?>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <table class="table table-condensed table-striped table-bordered table-colored-header">
                    <thead>
                        <tr>
                            <th colspan="2">UTME Result / Programme Choice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='50%'>
                                <table class="table table-condensed table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <th colspan="2">UTME Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th width='25%'>UTME Reg.Id</th>
                                            <td><?php echo $utme[0]['regid']?></td>
                                        </tr>
                                        <tr>
                                            <th>Year</th>
                                            <td><?php echo $utme[0]['year']?></td>
                                        </tr>
                                        <tr> 
                                            <td colspan="2">
                                                <table class="table table-condensed table-striped table-bordered">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Subject</th>
                                                        <th>Score</th>
                                                    </tr>
                                                    <tbody>
                                                        <?php 
                                                            $total = 0;
                                                            
                                                            foreach($utme AS $key => $olv){
                                                            $total += $olv['score'];
                                                        ?>
                                                        
                                                        <tr>
                                                            <td><?php echo ($key + 1)?></td>
                                                            <td><?php  echo $olv['subname']?></td>
                                                            <td><?php  echo $olv['score']?></td>
                                                        </tr>
                                                        <?php }?>
                                                        <tr>
                                                            <th colspan="2">Aggregate :</th>
                                                            <td><?php echo $total?></td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            </td> 
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td width='50%'>
                                <table class="table table-condensed table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Programme Choice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th width='25%'>Choice 1</th>
                                            <td><?php echo $record['prg1']?></td>
                                        </tr>
                                        <tr>
                                            <th>Choice 2</th>
                                            <td><?php echo $record['prg2']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
