<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Expense Item
          
        </h1>
    </section>
    <section class="content"> <!-- Main content -->
    	<div class="row">
        	<div class='col-md-4'>
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
	        <div class='col-md-8'>
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
		       
	        </div>
        </div>

		

           
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->




