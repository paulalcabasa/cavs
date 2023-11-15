<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Food Sales Inventory (Closed)</h1>
        <small>Total Items: <span class="badge btn-success"><?= count($foods); ?></span></small>
    </section>
    <section class="content"> <!-- Main content -->
        <div class="box"> <!-- Default box -->
            <div class="box-body">
                <table class="table food-sales-table">
                    <thead>
                        <th>Food No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sales</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Barcode</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($foods as $food) : ?>
                        <tr>
                            <td><?= $food->food_id ?></td>
                            <td><?= $food->food_name ?></td>
                            <td><?= $food->category ?></td>
                            <td><?= $food->unit_price ?></td>
                            <td><?= $food->quantity ?></td>
                            <td><?= $food->no_of_sales ?></td>
                            <td>
                                <?php if ($food->status == 'New') { ?>
                                    <span class="badge btn-primary">
                                <?php } else if ($food->status == 'Closed') { ?>
                                    <span class="badge btn-danger">
                                <?php } else if ($food->status == 'Opened') { ?>
                                    <span class="badge btn-info">
                                <?php } else { ?>
                                    <span class="badge btn-secondary">
                                <?php } ?>
                                    <?= $food->status ?>
                                </span>
                            </td>
                            <td><?= $food->date_created ?></td>
                            <td><?= $food->barcode_value ?></td>
                            <td>
                            <?php if ($food->status == 'New') { ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" class="btn_update_status" data-id="<?= $food->food_id ?>" data-state_id="4">Open</a></li>
                                        <li><a href="cancel_food_item/<?= encode_string($food->food_id) ?>">Cancel</a></li>      
                                    </ul>
                                </div>
                            <?php } else if ($food->status == 'Opened') { ?>
                                <?php
                                    $enc_food_id = encode_string($food->food_id);
                                    $no_of_sales = $food->no_of_sales; 
                                    $status = $food->transaction_state_id;
                                    $current_quantity = $food->quantity;
                                    $food_id = $food->food_id;
                                    $formatted_food_id = format_food_id($food_id);
                                ?>
                              
                                <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                      </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="edit_food/<?= $enc_food_id ?>">Edit</a></li>
                                            <li><a href="<?= base_url() ?>reports/cost_vs_sales_report/<?= $enc_food_id ?>" target="_blank">View Details</a></li>
                                            <?php  if ($user_type_id == 6 || $user_type_id == 3){ ?>
                                                <li>
                                                    <a href="#" 
                                                        data-food_name="<?= $food->food_name ?>" 
                                                        data-current_qty="<?= $food->quantity ?>" 
                                                        data-food_id="<?= $food->food_id; ?>" 
                                                        data-formatted_food_id="<?= $formatted_food_id ?>" 
                                                        class="btn_adjust_qty">Stock Adjustment</a>
                                                </li>
                                            <?php } ?>
                                            <?php if ($current_quantity > 0) { ?>
                                                <li><a href="close_food_item/<?= $enc_food_id ?>" data-id="<?= $food_id ?>">Close</a></li>
                                            <?php } else { ?>
                                                <li><a href="#" class="btn_update_status" data-id="<?= $food_id ?>" data-state_id="3">Close</a></li>
                                            <?php } ?>
                                            <?php if ($no_of_sales == 0) { ?>
                                                <li><a href="cancel_food_item/<?= $enc_food_id ?>'">Cancel</a></li>
                                            <?php } ?>
                                        </ul>
                                </div>
                            <?php } ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
          
            </div>  
        </div>
        
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->
<div class="modal fade" id="dialog_qty_adjustment" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Quantity Adjustment</h4>
      </div>
      <div class="modal-body">
      	<form >
      		<div class="form-group">
      			<label class="control-label">Food ID</label>
      			<input type="text" class="form-control" readonly="readonly" id="txt_adj_food_id"/>
      		</div>
      			<div class="form-group">
      			<label class="control-label">Food Name</label>
      			<input type="text" class="form-control" readonly="readonly" id="txt_adj_food_name"/>
      		</div>
      		<div class="form-group">
      			<label class="control-label">Current Quantity</label>
      			<input type="text" class="form-control" readonly="readonly" id="txt_adj_food_from_qty"/>      		
      		</div>
      		<div class="form-group">
      			<label class="control-label">Adjusted Quantity</label>
      			<input type="text" class="form-control" id="txt_adj_food_to_qty"/>      		
      		</div>
          <div class="form-group">
            <label class="control-label">Remarks</label>
            <textarea class="form-control" id="txt_adj_remarks"></textarea>          
          </div> 
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_save_adjustments">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
$("body").on("click",".btn_update_status",function(){
    food_id = $(this).data("id");
    transaction_state_id = $(this).data("state_id");
    $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>Food_Inventory/update_food_state",
        data:{
            food_id : food_id,
            transaction_state_id : transaction_state_id
        },
        success:function(response){
            window.location.reload();
        }
    });
});
$("#btn_save_adjustments").click(function(){
    $.ajax({
        type:"POST",
        url : "<?php echo base_url();?>Food_Inventory/ajax_adjust_quantity",
        data:{
            food_id : food_id,
            added_qty : $("#txt_adj_food_to_qty").val(),
            remarks : $("#txt_adj_remarks").val()
        },
        success:function(response){
            window.location.reload();
        }
    });
});

$("body").on("click",".btn_adjust_qty",function(){
    food_id = $(this).data("food_id");
    current_qty = $(this).data("current_qty");
    formatted_food_id = $(this).data('formatted_food_id');
    food_name = $(this).data('food_name');
    $("#txt_adj_food_id").val(formatted_food_id);
    $("#txt_adj_food_name").val(food_name);
    $("#txt_adj_food_from_qty").val(current_qty);
    $("#dialog_qty_adjustment").modal('show');
});
</script>

