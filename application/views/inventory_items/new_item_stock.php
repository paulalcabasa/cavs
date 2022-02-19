<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Inventory Item Stock</h1>
    </section>
    <section class="content"> <!-- Main content -->
      <?php if($this->session->flashdata('success_flag')) {?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> <?php echo $this->session->flashdata('subject'); ?></h4>
        <?php echo $this->session->flashdata('message'); ?>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-4">
            <div class="box"> <!-- Default box -->
                <div class="box-header with-border">
                    <h3 class="box-title">Item Details</h3>
                </div>
                <div class="box-body">
                    <form>
                        <div class="form-group">
                            <label>Inventory Item No</label>
                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $inventory_item_details[0]->inventory_item_no?>"/>
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
                </div> <!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-8">
            <div class="box"> <!-- Default box -->
                <div class="box-header with-border">
                    <h3 class="box-title">New Item Stock</h3>
                     <a href="<?php echo base_url();?>inventory_items" class="btn btn-primary btn-sm" >Back to Items</a>
                    <div class="box-tools pull-right"> 

                        <button type="button" class="btn btn-primary btn-sm" id="btn_save_item_stock">Save</button>
                    </div>
                </div>
                <div class="box-body">
                    <form  name="frm_data" id="frm_data" action="<?php echo base_url();?>inventory_items/save_new_item_stock" method="POST">
                        <input type='hidden' name="inventory_item_id" value="<?php echo $inventory_item_id;?>"/>
                        <div class="form-group">
                            <label class="control-label">Quantity</label>
                            <input type="text" class="form-control" name="quantity" value="<?php echo set_value('quantity');?>"/>
                            <span class="form-error-msg"><?php echo form_error('quantity'); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Unit of Measure</label>
                            <select class="form-control" name="unit_of_measure" id="unit_of_measure">
                            <?php
                                foreach($uom_list as $uom){
                            ?>
                                <option value="<?php echo $uom->id;?>"><?php echo $uom->description;?></option>
                            <?php
                                }
                            ?>
                            </select>
                            <span class="form-error-msg"><?php echo form_error('unit_of_measure'); ?></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Unit Cost</label>
                            <input type="text" class="form-control" name="unit_cost" value="<?php echo set_value('unit_cost');?>"/>
                            <span class="form-error-msg"><?php echo form_error('unit_cost'); ?></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Supplier</label>
                            <select class="form-control" name="supplier" id="supplier">
                            <?php
                                foreach($supplier_list as $supplier){
                            ?>
                                <option value="<?php echo $supplier->id;?>"><?php echo $supplier->supplier_name;?></option>
                            <?php
                                }
                            ?>
                            </select>
                            <span class="form-error-msg"><?php echo form_error('supplier'); ?></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Date of Purchase</label>
                            <input type="text" class="form-control" name="disp_date_of_purchase" id="disp_date_of_purchase" value="<?php echo set_value('date_of_purchase');?>"/>
                            <input type="hidden" class="form-control" name="date_of_purchase" id="date_of_purchase" value="<?php echo date('Y-m-d');?>"/>
                            <span class="form-error-msg"><?php echo form_error('date_of_purchase'); ?></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Setup</label>
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" name="finalized_flag" id="cb_finalized_flag">Finalized</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" name="current_stock_flag" id="cb_current_stock_flag" disabled="disabled">Current Stock</label>
                            </div>
                        </div>
                    </form>
                </div> <!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
 
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>

$(document).ready(function(){
    $("#unit_of_measure").select2();

    $("#supplier").select2();

    $('#disp_date_of_purchase').daterangepicker({     
        singleDatePicker: true,
        showDropdowns: true,
        },
        function(start, end, label) {
            $("#date_of_purchase").val(start.format('YYYY-MM-DD'));
        }
    );

   // $("#disp_date_of_purchase").val("");
    
    $("#btn_save_item_stock").click(function(){
        $("#frm_data").submit();
    });

    $("#cb_finalized_flag").on('change',function(){
        if($("#cb_finalized_flag").is(":checked")){
            $("#cb_current_stock_flag").attr('disabled',false);
        }
        else {
            $("#cb_current_stock_flag").attr('disabled',true);
        }  
    });
});
</script>

