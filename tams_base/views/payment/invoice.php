<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered box-color">
            <div class="box-title">
                <h3>
                    <i class="icon-money"></i>
                    Invoice
                </h3>
            </div>
            <div class="box-content">
                    <div class="invoice-info">
                            <div class="invoice-to">
                                    <span>To</span>
                                    <p>
                                        <strong>Matric No :- </strong>  <?php echo $student_details['matric'];?><br/>
                                        <strong>Full Name :-</strong> <?php echo $student_details['fname'].' '.$student_details['lname'].' '.$student_details['mname'] ;?><br/>
                                    </p>
                                    <address>
                                            <abbr title="Address">Address:</abbr>  <?php echo $student_details['address'];?> <br>
                                            <abbr title="Phone">Phone:</abbr>  <?php echo $student_details['phone'];?> <br>
                                            <abbr title="E-mail">E-mail:</abbr>  <?php echo $student_details['email'];?> 
                                    </address>
                            </div>
<!--                            <div class="invoice-infos">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>Date:</th>
                                            <td>Aug 06, 2012</td>
                                        </tr>
                                        <tr>
                                            <th>Invoice #:</th>
                                            <td>0001752188s</td>
                                        </tr>
                                        <tr>
                                            <th>Product:</th>
                                            <td>Service Hotline</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>-->
                    </div>
                <table class="table table-striped table-invoice table-bordered">
                    <thead>
                        <tr>
                            <th>Payment Description</th>
                            <th style="text-align: right">Price</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $form_fields['sessionname'] ." ".$form_fields['scheduletype']?></td>
                            <td style="text-align: right"><?php echo 'NGN '. number_format(($form_fields['amount'] - $form_fields['penalty']), 2)?></td>
                        </tr>
                        <?php if($form_fields['penalty_status'] == "active"){?>
                        <tr>
                            <td style="color: red"><?php echo $form_fields['sessionname'] ." ".$form_fields['scheduletype']." Penalty"?></td>
                            <td style="text-align: right; color: red"><?php echo 'NGN '. number_format($form_fields['penalty'], 2)?></td>
                        </tr> 
                        <?php }?>
                        <tr>
                            <td>
                                <p>
                                    <span class="light"><strong>Amount In Word </strong></span>
                                </p>
                                <p style="color: blue">
                                    <?php echo ucwords($form_fields['amount2word']. " Naira Only.")?>
                                </p>
                            </td >
                            <td class="taxes">
                                    <p>
                                            <span class="light">Subtotal</span>
                                            <span><?php echo 'NGN '. number_format($form_fields['amount'], 2)?></span>
                                    </p>
<!--                                    <p>
                                            <span class="light">Tax(0%)</span>
                                            <span>NGN 0.0</span>
                                    </p>-->
                                    <p>
                                            <span class="light">Total</span>
                                            <span class="totalprice" style="color: blue">
                                                    <?php echo 'NGN '. number_format($form_fields['amount'], 2)?>
                                            </span>
                                    </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <div class="invoice-payment" style="float: left">
                    <span>Payment methods</span>
                    <ul>
                        <li>
                            <img alt="" src="<?php echo base_url("img/demo/paypal.png")?>">
                        </li>
                        <li>
                            <img alt="" src="<?php echo base_url("img/demo/visa.png")?>">
                        </li>
                        <li>
                            <img alt="" src="<?php echo base_url("img/demo/directd.png")?>">
                        </li>
                        <li>
                            <img alt="" src="<?php echo base_url("img/demo/mastercard.png")?>">
                        </li>
                    </ul>
                </div>
                
                <div class="invoice-payment" style="float: right">
                    <span>Pay </span>
                    <form method="post" action="<?php echo site_url('payment/process_pay')?>">
                        <ul>
                            <li>
                                <a href="#" class="btn btn-mini btn-lightgrey"><i class="glyphicon-print"></i>  Print Invoice</a>
                            </li>
                            <li>
                                <button type="submit" class="btn btn-mini btn-green" ><i class="icon-credit-card"></i>  Pay Now</button>
                            </li>
                        </ul>
                        <input type="hidden" name="can_name" value="<?php echo $student_details['fname'].' '.$student_details['lname'].' '.$student_details['mname'] ;?>">
                        <input type="hidden" name="schedule_id" value="<?php echo $form_fields['scheduleid'] ?>">
                        <input type="hidden" name="exception_id" value="<?php echo $form_fields['exceptionid'] ?>">
                        <input type="hidden" name="school_id" value="<?php echo $form_fields['schoolid'] ?>">
                        <input type="hidden" name="percentage" value="<?php echo $form_fields['percent'] ?>">
                        <input type="hidden" name="schedule_type" value="<?php echo $form_fields['scheduletype'] ?>">
                        <input type="hidden" name="session_name" value="<?php echo $form_fields['sessionname'] ?>">
                        <input type="hidden" name="session_id" value="<?php echo $form_fields['sessionid'] ?>">
                        <input type="hidden" name="schedule_id" value="<?php echo $form_fields['scheduleid'] ?>">
                        <input type="hidden" name="penalty" value="<?php echo $form_fields['penalty'] ?>">
                        <input type="hidden" name="user_id" value="<?php echo $form_fields['userid'] ?>">
                        <input type="hidden" name="amount" value="<?php echo $form_fields['amount'] ?>">
                        <input type="hidden" name="revhead" value="<?php echo $form_fields['revenuehead'] ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>