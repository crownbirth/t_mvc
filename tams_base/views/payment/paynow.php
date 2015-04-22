<div class="span12">
    <div class="box box-bordered box-color">
        <div class="box-title">
            <h3><i class="icon-credit-card"></i> Make Payment </h3>
        </div>
        <div class="box-content">
            <?php //var_dump($my_paying)
            if($my_paying['penalty_status'] == 'active'){?>
                <div class="alert alert-block alert-warning">
                    <i class=" icon-warning-sign" style="font-size: 35px"></i>
                    <strong>Sorry! </strong> Late payment Penalty Fee of <strong>NGN <?php echo number_format($my_paying['penalty'], 2)?> </strong> Has been Activated on this pay Schedule 
                      See Details bellow and Proceed with your payment.
                </div>
            <?php }?>
            <table class="table table-bordered table-condensed table-hover table-striped" width="690">
                <thead>
                    <tr>
                        <th width="300">Payment Description</th>
                        <?php if($my_paying['penalty_status'] == 'active'){?>
                        <th width="100" >Actual Amount</th>
                        <th width="100" >Penalty</th>
                        <?php }?>
                        <th width="100">Amount <?php echo ($my_paying['penalty_status'] == 'active') ? "+ Penalty ": ''?></th>
                        <th width="100">Installment Option(s) </th>
                        <th width="90">&nbsp; </th>
                    </tr>
                </thead>
                <tbody>
                    <form method="post" action="<?php echo base_url('payment/invoice')?>">
                        <tr >
                            <td><strong><?php echo $my_paying['session_name'] .' '. $my_paying['schedule_type'] ?></strong></td>
                            
                            <?php if($my_paying['penalty_status'] == 'active'){?>
                            <td style="color: blue"><?php echo 'NGN '. number_format(($my_paying['paying_amount'] - $my_paying['penalty']), 2);?></td>
                            <td style="color: red"><?php echo 'NGN '. number_format($my_paying['penalty'], 2);?></td>
                            
                            <?php }?>
                            
                            <td style="color: green ;font-weight: bold"><?php echo 'NGN '. number_format($my_paying['paying_amount'], 2);?></td>
                            <td>
                                <select  name="percentage" class=" input-mini chosen-select" >
                                    <?php   
                                    if($my_paying['penalty_status'] == 'inactive'){
                                        if($my_paying['total_percent_paid'] < 1){ ?>
                                    
                                            <option value="100">100</option>
                                    <?php }
                                        foreach($my_paying['percentage'] as $val) { ?>
                                            <option value="<?php echo $val?>"> <?php echo $val?></option>
                                        <?php }
                                     }else{
                                     ?>
                                        <option value="<?php echo $my_paying['penalty_percentage']?>"> <?php echo $my_paying['penalty_percentage']?></option>
                                     <?php }?>       
                                </select>
                            </td>
                            <input type="hidden" name="exceptionid" value="<?php echo $my_paying['exception_id']?>">
                            <input type="hidden" name="schoolid" value="<?php echo $my_paying['school_id']?>">
                            <input type="hidden" name="scheduleid" value="<?php echo $my_paying['schedule_id']?>">
                            <input type="hidden" name="scheduletype" value="<?php echo $my_paying['schedule_type']?>">
                            <input type="hidden" name="sessionname" value="<?php echo $my_paying['session_name']?>">
                            <input type="hidden" name="sessionid" value="<?php echo $my_paying['session_id']?>">
                            <input type="hidden" name="amount" value="<?php echo $my_paying['paying_amount']?>">
                            <input type="hidden" name="penalty_status" value="<?php echo $my_paying['penalty_status']?>">
                            <input type="hidden" name="penalty" value="<?php echo $my_paying['penalty']?>">
                            <input type="hidden" name="revenue_head" value="<?php echo $my_paying['revenue_head']?>">
                            <td style="text-align: center"><button class="btn btn-file btn-magenta" type="submit"><i class="icon-shopping-cart"></i> Get Invoice</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div>