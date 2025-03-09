<style>
    .current-allowance {
        background-color: green;
        color: white;
        font-weight: bold;
        font-size: 16px;
    }
    .employee-information {
        font-size: 14px;
        padding-top: 10px;
    }
    .label-details {
        font-weight: bold;
    }
    .value-details {
        font-size: 16px;
    }
</style>
<div class="content-wrapper" id="app"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Meal Allowance History
            <small>Today's transactions</small>
        </h1>    
    </section>
    
    <section class="content"> <!-- Main content -->
        <div class="row">
            <div class="col-md-6">
                <div class="box employee-information"> <!-- Default box -->
                    <div class="box-header">
                        <h3 class="box-title">Employee Information</h3>
                        <div class="row name-details">
                            <div class="col-md-4 label-details">Name</div>
                            <div class="col-md-8 value-details"><?= $person_details[0]->first_name ?> <?= $person_details[0]->last_name ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 label-details">Meal Allowance Category</div>
                            <div class="col-md-8 value-details"><?= $person_details[0]->department_name ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 label-details">Meal Allowance Rate</div>
                            <div class="col-md-8 value-details"><?= $person_details[0]->meal_allowance_rate ?></div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-4 label-details">Remaining Allowance</div>
                            <div class="col-md-8 value-details"><?= $person_details[0]->meal_allowance_rate - $person_details[0]->consumed_amount ?></div>
                        </div> -->
                    </div>
                    <div class="box-body"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box"> <!-- Default box -->
                    <div class="box-header with-border"></div>
                    <div class="box-body">
                        <table class="table display" width="100%" cellspacing="0" id="meal_allowance_list">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Item</th>
                                    <th style="text-align:right;">Amount</th>
                                    <th>Charge to</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $orderTotal = 0;
                                ?>
                                <?php foreach ($recent_orders as $order) { ?>
                                <tr>
                                    <td><?= $order->order_id ?></td>
                                    <td><?= $order->date_created ?></td>
                                    <td><?= $order->food_name ?></td>
                                    <td style="text-align:right;"><?= $order->amount ?></td>
                                    <td><?= $order->mode_of_payment ?></td>
                                    <td><a href="<?php echo base_url() . 'transaction/view/'. encode_string($order->order_id);?>">View transaction</a></td>
                                </tr>
                                <?php $orderTotal += $order->amount; ?>
                                <?php } ?>
                            </tbody>
                            <tr>
                                <td colspan="3"  style="text-align:right;">Total</td>
                                <td style="text-align:right;"><?= number_format($orderTotal, 2) ?></td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="3"  style="text-align:right;">Remaining allowance</td>
                                <td style="text-align:right;"><?= number_format($person_details[0]->meal_allowance_rate  - $orderTotal, 2) ?></td>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /.content -->

</div><!-- /.content-wrapper -->


