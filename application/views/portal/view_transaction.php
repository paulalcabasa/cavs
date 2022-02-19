<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>View Transaction
            <small>This is a page for viewing transactions.</small>
        </h1>
    </section>
    <section class="content"> <!-- Main content -->
        <div class="row">
            <div class="col-md-6">
                <div class="box" > <!-- Default box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Transaction Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4 text-bold">Transaction No</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->transaction_no;?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Transaction Date</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->transaction_date;?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Transacted By</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->transact_user;?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Remarks</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->remarks;?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Status</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->status;?></div>
                        </div>
                        <?php 
                            if($transaction_header_details->transaction_status == 2) { 
                        ?>
                        <div class="row">
                            <div class="col-md-4 text-bold">Date Cancelled</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->date_cancelled;?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Cancelled By</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->date_cancelled;?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Reason</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->cancellation_remarks;?></div>
                        </div>
                        <?php 
                            }
                        ?>

                    </div> <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box" > <!-- Default box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4 text-bold">Customer Type</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->customer_type;?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Customer Name</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->customer_name;?></div>
                        </div>
                        <?php
                            if($transaction_header_details->customer_type_id == 1 || $transaction_header_details->customer_type_id == 8){
                        ?>
                        <div class="row">
                            <div class="col-md-4 text-bold">Barcode No</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->employee_no;?></div>
                        </div>
                        <?php 
                            }
                        ?>
                        <div class="row">
                            <div class="col-md-4 text-bold">Paid By</div>
                            <div class="col-md-8">
                                <table class="table" style="font-size:14px;">
                                    <thead>
                                        <tr>
                                            <th>Mode of Payment</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $payments_total = 0;
                                        foreach($payment_details as $row){
                                    ?>
                                        <tr>
                                            <td><?php echo $row->mode_of_payment; ?></td>
                                            <td><?php echo $row->amount; ?></td>
                                          
                                        </tr>
                                    <?php
                                            $payments_total += $row->amount;
                                        }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th><?php echo $payments_total;?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Amount Tendered</div>
                            <div class="col-md-8"><?php echo $transaction_header_details->amount_tendered;?></div>
                        </div>
                    </div> <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box" > <!-- Default box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Order Details</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>Line No</th>
                                    <th>Food No</th>
                                    <th>Food Category</th>
                                    <th>Food Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $ctr = 1;
                                $grand_total = 0;
                                foreach($transaction_line_details as $line){
                                    $subtotal = $line->selling_price * $line->quantity;
                            ?>
                                <tr>
                                    <td><?php echo $ctr;?></td>
                                    <td><?php echo format_food_id($line->food_id);?></td>
                                    <td><?php echo $line->category;?></td>
                                    <td><?php echo $line->food_name;?></td>
                                    <td><?php echo $line->selling_price;?></td>
                                    <td><?php echo $line->quantity;?></td>
                                    <td><?php echo $subtotal;?></td>
                                </tr>
                            <?php   
                                    $grand_total += $subtotal;
                                    $ctr++;
                                }
                            ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="6" class="text-right" >Grand Total : </th>
                                        <th ><?php echo $grand_total;?></th>
                                    </tr>
                                </tfoot>
                            </tbody>
                        </table>
                    </div> <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
     
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->



<script>


</script>

