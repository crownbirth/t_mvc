<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * TAMS
 * Application Fee
 * 
 * @category   View
 * @package    Admission
 * @subpackage prospective
 * @author     Sule-odu Adedayo <suleodu.adedayo@gmail.com>
 * @copyright  Copyright © 2014 TAMS.
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */
var_dump($prm);
?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered box-color">
            <div class="box-title">
                    <h3>
                            <i class="icon-money"></i>
                            Application Fee 
                    </h3>
            </div>
            <div class="box-content">
                <form method="post" action="#">
                    <table class="table table-bordered table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Percentage</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $prm['scheduleid']?></td>
                                <td><?= '% '.$prm['percentage']?></td>
                                <td><?= 'NGN '.number_format($prm['amount'], 2)?></td>
                                <td><button type="submit" class="btn btn-primary">Pay Now</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="">
                </form>
            </div>
        </div>
    </div>
</div>
