<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <!-- <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Success alert preview. This alert is dismissable.
    </div> -->

    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Inventory Items Stock</h1>
    </section>
    <section class="content"> <!-- Main content -->
        <div class="row">
            <div class="col-md-3">
                <div class="box"> <!-- Default box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Inventory Item Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form>
                                    <div class="form-group">
                                        <label>Inventory Item No</label>
                                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $inventory_item_details[0]->inventory_item_no?>"/>
                                        <input type="hidden" id="inventory_item_id" class="form-control"  value="<?php echo $inventory_item_details[0]->inventory_item_id?>"/>
                                    </div>
                                      
                                    <div class="form-group">
                                        <label>Inventory Item Name</label>
                                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $inventory_item_details[0]->item_name?>"/>
                                    </div>

                                     <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $inventory_item_details[0]->status?>"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-5">
                <div class="box"> <!-- Default box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Current Stock Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                                <form>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Stock No</label>
                                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $inventory_item_details[0]->stock_no?>"/>
                                        </div>
                                          
                                        <div class="form-group">
                                            <label>Initial Quantity</label>
                                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $inventory_item_details[0]->initial_quantity?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Remaining Quantity</label>
                                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $inventory_item_details[0]->remaining_quantity?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Unit of Measure</label>
                                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $inventory_item_details[0]->unit_of_measure?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Unit Cost</label>
                                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $inventory_item_details[0]->unit_cost?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Supplier</label>
                                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $inventory_item_details[0]->supplier_name?>"/>
                                        </div>
                                    </div>
                                </form>
                         
                        </div>
                    </div> <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-4">
                <div class="box"> <!-- Default box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Stock Summary</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                               <table class="table table-condensed">
                                   <thead>
                                       <tr>
                                          
                                           <th><abbr title="Quantity">Qty</abbr></th>
                                           <th><abbr title="Unit of Measure">UOM</abbr></th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                    <?php
                                    foreach($remaining_qty_summary as $rem_qty){                                    
                                    ?>
                                        <tr>
                                      
                                            <td><?php echo number_format($rem_qty->quantity,2,'.',',');?></td>
                                            <td><?php echo $rem_qty->unit_of_measure;?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                   </tbody>
                               </table>
                            </div>
                        </div>
                    </div> <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
       
          
        
        <div class="box"> <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">List of Inventory Item Stock</h3>

                <div class="box-tools pull-right">
                    <a href="../new_item_stock/<?php echo $inventory_item_id_enc;?>" class="btn btn-primary btn-sm">New Stock</a>
                </div>
            </div>
            <div class="box-body">
                <table id="tbl_item_stock" class="display table dt-responsive nowrap"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Stock No</th>
                            <th>Initial Quantity</th>
                            <th>Remaining Quantity</th>
                            <th>Unit Cost</th>
                            <th>Unit of Measure</th>
                            <th>Supplier Name</th>
                            <th>Date Purchased</th>
                            <th>Status</th>
                            <th>Action</th>
                       
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div> <!-- /.box-body -->
          
        </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
$(document).ready(function(){
      var dt = $('#tbl_item_stock').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url();?>inventory_items/dt_get_inventory_item_stock/<?php echo $inventory_item_id;?>",
        "columns": [
            { "data": "stock_no" },
            { "data": "initial_quantity" },
            { "data": "remaining_quantity" },
            { "data": "unit_cost" },
            { "data": "unit_of_measure" },
            { "data": "supplier_name" },
            { "data": "purchase_date" },
            { "data": "status" },
            { "data": "actions" }
        ]
      //  "scrollX" : true
    });

    $("body").on('click','.btn_update_status',function(ev){
        ev.preventDefault();
        var stock_id = $(this).data('stock_id');
        var status = $(this).data('status_id');
        $.ajax({
            type:"POST",
            data:{
                stock_id : stock_id,
                status : status
            },
            url:"<?php echo base_url();?>inventory_items/ajax_update_item_stock_status",
            success:function(response){
                dt.draw();
            }
        });
    });

    $("body").on('click','.btn_set_current',function(ev){
        ev.preventDefault();
        var stock_id = $(this).data('stock_id');
        var inventory_item_id = $('#inventory_item_id').val();
        $.ajax({
            type:"POST",
            data:{
                stock_id : stock_id,
                inventory_item_id : inventory_item_id
            },
            url:"<?php echo base_url();?>inventory_items/ajax_update_item_stock",
            success:function(response){
                location.reload();
            }
        });
    });
});
</script>

