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
            <small>View history of employee's allowance</small>
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
                                    <th>Amount</th>
                                    <th>Charge to</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_orders as $order) { ?>
                                <tr>
                                    <td><?= $order->order_id ?></td>
                                    <td><?= $order->date_created ?></td>
                                    <td><?= $order->food_name ?></td>
                                    <td><?= $order->amount ?></td>
                                    <td><?= $order->mode_of_payment ?></td>
                                    <td><a href="<?php echo base_url() . 'transaction/view/'. encode_string($order->order_id);?>">View transaction</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /.content -->

</div><!-- /.content-wrapper -->


