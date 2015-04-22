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

//var_dump($exam_grade['rs']);
?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered box-color">
            <div class="box-title">
                <h3><i class="icon-th-list"></i> Prospective Registration Form</h3>
            </div>
            <div class="box-content">
                <h4 class="span"><i class="glyphicon-user"></i> Personal Information </h4>
                <form class="form-horizontal form-bordered" 
                    enctype="multipart/form-data"
                    method="POST" 
                    action="#">
                    
                    <div class="row-fluid">
                        <div class="span3">
                            <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"></div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="fname">Surname</label>
                                <div class="controls">
                                   Sule-odu Adedayo
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="manme">Middle name</label>
                                <div class="controls">
                                    Lateef
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="dob">Date of Birth</label>
                                <div class="controls">
                                    04-09-1980
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="address">Contact Address</label>
                                <div class="controls">
                                    12, adegbola street Mushin off itire road ilasamaja lagos 
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="nationality">Nationality</label>
                                <div class="controls">
                                    Nigeria
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="marital">Marital Status</label>
                                <div class="controls">
                                    Single
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="blood">Blood Group</label>
                                <div class="controls">
                                    O
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="hobby">Hobby</label>
                                <div class="controls">
                                    jump, book, game
                                </div>
                            </div>
                        </div>
                        
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lname">first name</label>
                                <div class="controls">
                                    Adedayo
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="sex">Sex</label>
                                <div class="controls">
                                    Male
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="phone">phone</label>
                                <div class="controls">
                                    08074000367
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="email">Email</label>
                                <div class="controls">
                                    suleodu.adedayo@gmail.com
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="soforig">State of Origin</label>
                                <div class="controls">
                                    Ogun
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="lgaoforig">Local Govt Areal</label>
                                <div class="controls">
                                    Ijebu-ode
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="disable">Physical Disability</label>
                                <div class="controls">
                                    No
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="religion">Religion</label>
                                <div class="controls">
                                    Islam
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div span12>
                            <h4><i class="glyphicon-parents"></i>  Next of Kin Details</h4>
                        </div>
                    </div>
                    <div class="row-fluid ">
                        <div class="span6">
                            <div class="box-bordered">
                                <h6><i class="icon-list"></i>  Next of Kin Details</h6>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="nkfname">Next of Kin Surname</label>
                                <div class="controls">
                                    <input type="text" class="input-large ui-wizard-content" id="nkfname" name="nkfname" placeholder="Enter Next of kin Surname  " data-rule-required="false">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="nkoname">Next of Kin Other names</label>
                                <div class="controls">
                                    <input type="text" class="input-large ui-wizard-content" id="nkoanme" name="nkoanme" placeholder="Enter Next of kin Other names" data-rule-required="false">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="nkphone">Next of Kin Phone</label>
                                <div class="controls">
                                    <input type="text" class="input-large ui-wizard-content" id="nkphone" name="nkphone" placeholder="Enter Next of kin phone"data-rule-required="false">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="nkmail">Next of Kin E-mail</label>
                                <div class="controls">
                                    <input type="email" class="input-large ui-wizard-content " id="nkphone" name="nkmail" placeholder="Enter Next of kin E-mail" data-rule-required="false">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="nkaddress">Next of Kin Contact Address</label>
                                <div class="controls">
                                    <textarea class="input-large" name="nkaddress" rows="3" placeholder="Enter Next of kin Contact Address" data-rule-required="false"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="relationship">Relationship</label>
                                <div class="controls">
                                    <input type="text" class="input-large ui-wizard-content " id="nkphone" name="relationship" placeholder="Relationship with Next of kin" data-rule-required="false">
                                </div>
                            </div>
                        </div>
                        <!--Sponsor Details -->
                        <div class="span6">
                            <div class="box-bordered">
                                <h6><i class="icon-list"></i>  Sponsor's Details</h6>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="sp_flname">Sponsor's Full Name</label>
                                <div class="controls">
                                    <input type="text" class="input-large ui-wizard-content" id="sp_flname" name="sp_flname" placeholder="Enter Sponsor's Full Name"data-rule-required="false">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="sp_phone">Sponsor's Phone</label>
                                <div class="controls">
                                    <input type="text" class="input-large ui-wizard-content" id="sp_phone" name="sp_phone" placeholder="Enter Sponsor's Phone No" data-rule-required="false">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="sp_mail">Sponsor's E-mail</label>
                                <div class="controls">
                                    <input type="email" class="input-large ui-wizard-content" id="sp_phone" name="sp_mail" placeholder="Enter Sponsor's E-mail" data-rule-required="false">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="sp_address">Sponsor's Contact Address</label>
                                <div class="controls">
                                    <textarea class="input-large" name="sp_address" rows="3" placeholder="Enter Sponsor's Contact Address" data-rule-required="false"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div span12>
                        <h4><i class="glyphicon-parents"></i> Previous Qualification </h4>
                    </div>
                    <div class="row-fluid">
                        <div class="span12"> 
                            <table class="table table-bordered table-colored-header table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Certificate Obtain</th>
                                        <th>School Name</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>NCE</td>
                                        <td>Tasued</td>
                                        <td>2006</td>
                                        <td>2009</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>OND</td>
                                        <td>Tasued</td>
                                        <td>2006</td>
                                        <td>2009</td>
                                    </tr>
                                </tbody>
                            </table> 
                           
                        </div>
                    </div>
                    <div span12>
                        <h4><i class="glyphicon-parents"></i> O'Level/ A'Level Result </h4>
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
