<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * TAMS
 * Prospective Registartion form 2 
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
                <h3><i class="icon-th-list"></i> Application Form - Step 2</h3>
                <ul class="tabs">
                    <li class="btn btn-grey-2"><small>Bio Data</small></li>
                    <li class="btn btn-blue "><small>Next of Kin / Sponsor's Details</small></li>
                    <li class="btn btn-gray-2"><small>Education Background</small></li>
                    <li class="btn btn-grey-2"><small>UTME/DE Result</small></li>
                    <li class="btn btn-grey-2"><small>Programme Choice</small></li>
                </ul>
            </div>
            <div class="box-content">
                 <h4 class="span"><i class="glyphicon-parents"></i> Next of Kin / Sponsor's Details </h4>
                <form class="form-horizontal form-bordered" 
                    enctype="multipart/form-data"
                    method="POST" 
                    action="<?php echo site_url('admission/registration_submit/2')?>">
                   
                    <div class="row-fluid">
                        <div class="span6">
                            <table class="table table-condensed table-striped table-bordered table-colored-header">
                                <thead>
                                    <tr>
                                        <th colspan="2">Next of Kin Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="label-darkblue" width="150">Next of Kin Surname : </th>
                                        <td>
                                            <input type="text" class="input-large " id="nkfname" name="nkfname" placeholder="Enter Next of kin Surname  " required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Next of Kin Other names : </th>
                                        <td>
                                            <input type="text" class="input-large " id="nkoanme" name="nkoanme" placeholder="Enter Next of kin Other names" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Next of Kin Phone : </th>
                                        <td>
                                            <input type="text" class="input-large " id="nkphone" name="nkphone" placeholder="Enter Next of kin phone"required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Next of Kin E-mail : </th>
                                        <td>
                                            <input type="email" class="input-large  " id="nkphone" name="nkmail" placeholder="Enter Next of kin E-mail" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Next of Kin Contact Address : </th>
                                        <td>
                                            <textarea class="input-large" name="nkaddress" rows="3" placeholder="Enter Next of kin Contact Address" required="required"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Relationship : </th>
                                        <td>
                                            <input type="text" class="input-large  " id="nkphone" name="relationship" placeholder="Relationship with Next of kin" required="required">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="span6">
                            <table class="table table-condensed table-striped table-bordered table-colored-header">
                                <thead >
                                    <tr>
                                        <th colspan="2">Sponsor's Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th width="150">Sponsor's Full Name: </th>
                                        <td>
                                            <input type="text" class="input-large " id="sp_flname" name="sp_flname" placeholder="Enter Sponsor's Full Name"required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sponsor's phone : </th>
                                        <td>
                                            <input type="text" class="input-large " id="sp_phone" name="sp_phone" placeholder="Enter Sponsor's Phone No" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sponsor's E-mail : </th>
                                        <td>
                                            <input type="email" class="input-large " id="sp_phone" name="sp_mail" placeholder="Enter Sponsor's E-mail" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sponsor's Address: </th>
                                        <td>
                                            <textarea class="input-large" name="sp_address" rows="3" placeholder="Enter Sponsor's Contact Address" required="required"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>  
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
