<?php
$qty_adjustments = 0;
$qty_adjustments_tbl = '<table class="table">
							<thead>
								<tr>
									<td>No.</td>
									<td>Added Quantity</td>
									<td>Date Added</td>
									<td>Added By</td>
								</tr>
							</thead>

							<tbody>';
$ctr = 1;
foreach($food_adjustments_list as $adj){
	$qty_adjustments += $adj->added_quantity;
	$qty_adjustments_tbl .= '<tr>
								<td>'.$ctr.'</td>
								<td>'.$adj->added_quantity.'</td>
								<td>'.$adj->date_created.'</td>
								<td>'.$adj->person_name.'</td>
							 </tr>';
	$ctr++;
}
$qty_adjustments_tbl .= '</tbody></table>';

?>
<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Cost Vs Sales Report
            <small>Page for viewing cost versus sales report for foods</small>
        </h1>

    </section>
    <section class="content"> <!-- Main content -->
    	<div class="row">
        	<div class='col-md-6'>
		        <div class="box"> <!-- Default box -->
		            <div class="box-header with-border">
		                <h3 class="box-title">Food Details</h3>
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
                          		<span id="food_barcode"><?php echo $food_details[0]->barcode_value;?></span>
                          		<a href="#" data-barcode_no='<?php echo $food_details[0]->barcode_value;?>' data-food_no="<?php echo $food_no;?>" id="btn_edit_barcode">Edit</a>
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
			        				<span class="col-md-12 text-bold">Adjusted Quantity</span>
			        				<span class="col-md-12"><a href="#" data-toggle="modal" data-target="#dialog_qty_adjustments"><?php echo number_format($qty_adjustments,2,'.',',');?></a></span>
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
                <h3 class="box-title">Cost of Ingredients</h3>
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
           <!--  <div class="box-footer">    
              
            </div> <!-- /.box-footer-->
        </div><!-- /.box -->

         <div class="box"> <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Sales</h3>
            </div>
            <div class="box-body">
            	<div class="row">
            		<?php $total_sales = 0; ?>
	                <div class="col-md-12">
	                    <table class="table" id="tbl_data">
	                        <thead>
	                            <tr>
	                                <th>Transaction No.</th>
	                                <th>Customer Type</th>
	                                <th>Customer Name</th>
	                                <th>Food Name</th>
	                                <th>Unit Price</th>
	                                <th>Quantity</th>
	                                <th>Amount</th>
	                                <th>Transaction Date</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php 
	                       		foreach($food_sales_list as $sales){
	                       			$total_sales += $sales->quantity * $sales->unit_price;
	                        ?>
	                        	<tr>
	                        		<td><?php echo $sales->transaction_no;?></td>
	                        		<td><?php echo $sales->customer_type;?></td>
	                        		<td><?php echo $sales->customer_name;?></td>
	                        		<td><?php echo $sales->food_name;?></td>
	                        		<td><?php echo $sales->unit_price;?></td>
	                        		<td><?php echo $sales->quantity;?></td>
	                        		<td><?php echo $sales->amount;?></td>
	                        		<td><?php echo $sales->transaction_date;?></td>
	                        	</tr>
	                        <?php
	                        	}
	                        ?>
	                        </tbody>
	                        <tfoot>
	                        	<tr>
	                        		<td class="text-bold" colspan="6" align="right">Total Sales</td>
	                        		<td class="text-bold text-danger" colspan="2"><?php echo number_format($total_sales,2,'.',',');?></td>
	                        	</tr>
	                        </tfoot>
	                    </table>
	                </div>
            	</div>
            </div> <!-- /.box-body -->
          <!--   <div class="box-footer">    
              
            </div> <!-- /.box-footer-->
        </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal fade" id="dialog_qty_adjustments" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Quantity Adjustments</h4>
      </div>
      <div class="modal-body">
      	<?php echo $qty_adjustments_tbl; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="dialog_change_barcode" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Update barcode</h4>
      </div>
      <div class="modal-body">
      	<form class="form">
      		<div class="form-group">
      			<label class="control-label">Old Barcode</label>
      			<input type="text" class="form-control " readonly="readonly"  value="<?php echo $food_details[0]->barcode_value;?>"/>
      		</div>
      		<div class="form-group">
      			<label class="control-label">New Barcode</label>
      			<input type="text" class="form-control"  value="" id="txt_new_barcode" name="txt_new_barcode"/>
      			<input type="hidden" class="form-control"  value="<?php echo $food_details[0]->id;?>" id="txt_food_id" name="txt_food_id"/>
      		</div>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_save_barcode" name="btn_save_barcode">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>	
$(document).ready(function(){
	
	$("#btn_edit_barcode").click(function(){
		$("#dialog_change_barcode").modal('show');
	});

	$("#btn_save_barcode").click(function(){

		var food_id = $("#txt_food_id").val();
		var new_barcode = $("#txt_new_barcode").val();
		if(new_barcode != ""){
			$.ajax({
				type:"POST",
				data:{
					food_id : food_id,
					new_barcode : new_barcode
				},
				url:"<?php echo base_url();?>food_inventory/ajax_update_food_barcode",
				success(response){
					if(response == 'exists'){
						alert("Barcode already exists, please enter a new barcode.");
					}
					else {
						$("#food_barcode").text(new_barcode);
						alert(response);
					}
				}
			});
		}
		else {
			alert("Enter value for new barcode");
		}
	});


	/*$("#dialog_change_barcode").on('hidden.bs.modal',function(){
		window.reload();
	});*/

});
</script>


