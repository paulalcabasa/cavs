<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Close Food Item
            <small>Page for viewing cost versus sales report for foods</small>
        </h1>
    </section>
    <section class="content"> <!-- Main content -->
    	<div class="row">
        	<div class='col-md-6'>
		        <div class="box"> <!-- Default box -->
		            <div class="box-header with-border">
		                <h3 class="box-title">Item Details</h3>
		            </div>
		            <div class="box-body">
		            	<div class="row">
                            <label class="col-md-3">Food No</label>
                            <div class="col-md-9">
                          		<?php echo $food_no;?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Category</label>
                            <div class="col-md-9">
                          		<?php echo $food_details[0]->category;?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Food Name</label>
                            <div class="col-md-9">
                          		<?php echo $food_details[0]->food_name;?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Barcode</label>
                            <div class="col-md-9">
                          		<?php echo $food_details[0]->barcode_value;?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Image</label>
                            <div class="col-md-9">
                            	<img src="<?php echo base_url();?>assets/images/foods/<?php echo $food_image;?>"  width="150" height="150" class="img-rounded"/>
                            </div>
                        </div>
		            </div> <!-- /.box-body -->
		        </div><!-- /.box -->
	        </div>
	        <div class='col-md-6'>
		    
		        <div class="box"> <!-- Default box -->
		            <div class="box-header with-border">
		                <h3 class="box-title">Cost Vs Sales</h3>
		            </div>
		            <div class="box-body">
		            	<?php
		            		$expected_revenue = ($food_details[0]->total_food_price - $food_details[0]->total_food_cost);
		            	?>
		        		<div class="row">
		        			<div class="col-md-6">
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Initial Quantity</span>
			        				<span class="col-md-12"><?php echo $food_details[0]->initial_quantity;?></span>
		        				</div>
		        				
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Item Cost</span>
			        				<span class="col-md-12"><?php echo $food_details[0]->unit_cost;?></span>
		        				</div>
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Mark Up Percentage</span>
			        				<span class="col-md-12"><?php echo round($food_details[0]->mark_up_percentage);?>%</span>
		        				</div>
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Mark Up Value</span>
			        				<span class="col-md-12"><?php echo number_format(round($food_details[0]->mark_up_value),2,'.',',');?></span>
		        				</div>
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Total Food Cost</span>
			        				<span class="col-md-12"><?php echo number_format($food_details[0]->total_food_cost,2,'.',',');?></span>
		        				</div>
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Total Price Dine In <br/><small>(Selling Price x Initial Quantity)</small></span>
			        				<span class="col-md-12"><?php echo number_format($food_details[0]->total_food_price,2,'.',',');?></span>
		        				</div>
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Expected Revenue <br/><small>(Total Price Dine In - Total Food Cost)</small></span>
			        				<span class="col-md-12"><?php echo number_format($expected_revenue,2,'.',',');?></span>
		        				</div>
		        			</div>
		        			<div class="col-md-6">
		        				<?php
		        					$sold_qty = $food_details[0]->initial_quantity - $food_details[0]->quantity;
		        					$total_sales = $food_details[0]->unit_price * $sold_qty;
		        				?>
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Sold Quantity</span>
			        				<span class="col-md-12"><?php echo $sold_qty;?></span>
		        				</div>
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Selling Price</span>
			        				<span class="col-md-12"><?php echo $food_details[0]->unit_price;?></span>
		        				</div>
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Total Sales</span>
			        				<span class="col-md-12"><?php echo number_format($total_sales,2,'.',',');?></span>
		        				</div>
		        				<div class="row">
			        				<span class="col-md-12 text-bold">Total Revenue <br/><small>(Total Sales - Total Food Cost)</small></span>
			        				<span class="col-md-12"><?php echo number_format($total_sales - $food_details[0]->total_food_cost,2,'.',',');?></span>
		        				</div>
		        			</div>
		        		</div>
		            </div> <!-- /.box-body -->
		        </div><!-- /.box -->
	        </div>
        </div>

		<div class="box"> <!-- Default box -->
	        <div class="box-header with-border">
	            <h3 class="box-title">Cost of Item</h3>
	        </div>
	        <div class="box-body">
	            <table class="table" id="tbl_food_ingredients">
	                <thead>
	                    <tr>
	                        <th style="width:25%;">Food Item</th>
	                        <th style="width:15%;">Amount</th>
	                        <th style="width:15%;">Unit of Measure</th>
	                        <th style="width:25%;">Unit Cost</th>
	                        <th style="width:20%;">Total</th>
	                    </tr>
	                </thead>
	                <tbody>
	                <?php
	                
	  					foreach($food_ingredients as $ingredient){
	  				?>
	  					<tr>
	  						<td><?php echo $ingredient->item_name;?></td>
	  						<td><?php echo $ingredient->quantity;?></td>
	  						<td><?php echo $ingredient->unit_of_measure;?></td>
	  						<td><?php echo $ingredient->unit_cost;?></td>
	  						<td><?php echo ($ingredient->quantity * $ingredient->unit_cost);?></td>
	  					</tr>
	  				<?php
	  					}
	                ?>
	                </tbody>
	                <tfoot>
	                    <tr>
	                        <td colspan="4" align="right" class='text-bold'>Total Cost</td>
	                        <td class='text-bold text-danger' id="txt_total_cost"><?php echo number_format($food_details[0]->total_food_cost,2,'.',',');?></td>
	                    </tr>
	                </tfoot>
	            </table>
	        </div> <!-- /.box-body -->
		</div><!-- /.box -->
        	
	    <div class="box" > <!-- Default box -->
	        <div class="box-header with-border">
	            <h3 class="box-title">Closeing Details</h3>
	        </div>
	        <div class="box-body">
	            <form class="form" method="POST" id="frm_close" action="<?php echo base_url();?>food_inventory/process_food_closing">
	                <input type="hidden" id="food_id" name="food_id" value="<?php echo $food_details[0]->id;?>"/>
	                <div class="form-group">
	                    <label class="control-label">Kindly Specify your reason for the closing of the item</label>
	                    <textarea class="form-control" rows="10" id="txt_reason" name="reason"></textarea>
	                    <span class="help-block form-error-msg" id="lbl_error_msg"></span>
	                </div>
	                <div class="form-group">
	                    <button type="button" class="btn btn-primary pull-right" id="btn_confirm_close">Confirm Closing</button>
	                </div>
	            </form>
	        </div> <!-- /.box-body -->
	    </div><!-- /.box -->
           
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
$(document).ready(function(){
	$("#btn_confirm_close").click(function(){
		error_ctr = validateTextBox($("#txt_reason"),"Kindly specify your reason.");
		if(error_ctr == 0){
			$("#frm_close").submit();
		}
	});
});
</script>


