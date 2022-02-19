<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
<!--     <section class="content-header"> 
        <h1>New Transaction
            <small>This page records transactions of employees and charged to their meal allowances</small>
        </h1>
    </section> -->
    <section class="content"> <!-- Main content -->
    	<div class="row">
	    	<div class="col-md-8">
	    		<div class="nav-tabs-custom" style="min-height:550px;">
				    <ul class="nav nav-tabs" id="food_categories">
				    <?php 
				    	$ctr = 1;
				    	foreach($food_categories as $category){
				    		$is_active = $ctr == 1 ? "active" : "";
				    ?>
						<li class="<?php echo $is_active?>"><a href="#main_foods_container" data-category_id="<?php echo $category->id;?>" data-toggle="tab" class="btn_load_foods"><?php echo $category->category;?></a></li>
				    <?php
				    		$ctr++;
				    	}
				    ?>				 
				    </ul>
				    <div class="tab-content">
				      <div class="tab-pane active" id="main_foods_container">
				      </div>
				    </div> <!-- /.tab-content -->
				</div>
		    </div>

		  	<div class="col-md-4">
			  <div class="nav-tabs-custom" style="min-height:550px;">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#tab_1" data-toggle="tab">Orders</a></li>
	              <li><a href="#tab_2" data-toggle="tab">Customer</a></li>
	              <li><a href="#tab_3" data-toggle="tab" id="lnk_billing">Billing</a></li>
	            </ul>
	            <div class="tab-content">
	              <div class="tab-pane active" id="tab_1">
	              	<div class="row">
			        	<div class="col-sm-12">
			        	<!-- 	<h5 class="orders-h5">Order Summary</h5>
			        		<hr class="orders-hr"/> -->
			        		<div class="form-group">
			        			<input type="text" class='form-control' placeholder="Scan item barcode here..." id="txt_orders_barcode"/>
			        			<span class="text-danger" id="orders_barcode_msg"></span>
			        		</div>
			        		<table class="table orders-summary-table" id="tbl_orders_summary">
			        			<thead>
			        				<tr>
			        					<th style="width:40%;">Description</th>
			        					<th style="width:20%;">Price</th>
			        					<th style="width:15%;">Quantity</th>
			        					<th style="width:20%;">Subtotal</th>
			        					<th style="width:5%;"></th>
			        				</tr>
			        			</thead>
			        			<tbody></tbody>
			        			<tfoot>
			        				<tr>		
			        					<td colspan="3" align="right">Total</td>
			        					<td align="right" id="grand_total">0.00</td>
			        				</tr>
			        			</tfoot>
			        		</table>
			        	</div>
					    </div>
	              </div>
	              <!-- /.tab-pane -->
	              <div class="tab-pane" id="tab_2">
	             	<div class="row">
		        		<div class="col-sm-12">
			        		<div class="form-group">
			        			<label class="control-label ">Customer Type</label>
			        			<select class="form-control input-sm" id="sel_customer_type">
			        			<?php
			        				foreach($customer_list as $customer){
			        					$is_selected = ($customer->id == $default_customer) ? "selected" : "";
			        			?>
			        				<option value='<?php echo $customer->id;?>' <?php echo $is_selected;?>><?php echo $customer->person_type_name;?></option>
			        			<?php
			        				}
			        			?>
			        			</select>
			        		</div>
		        		</div>
	        		</div>
		        	<div class="row" id="employee_details">
			        	<div class="col-sm-6">
			        		<div class="img-wrapper">
			        			<img class="img-rounded img-responsive" style="width:150px;height:150px;" id="person_img" src="<?php echo base_url();?>/assets/images/person_images/default.jpg" />
			        		</div>
			        	</div>
			        	<div class="col-sm-6">
			        		<input type="hidden" id="txt_person_id"/>
			        		<input type="hidden" id="txt_meal_allowance_id"/>
			        		<input type="hidden" id="txt_barcode_no_used"/>
			        		<span class="text-bold" id="lbl_person_id">Barcode no</span><br/>
			        		<span><input type="text" id="txt_barcode_no" placeholder="Select Employee" class="form-control input-sm"  /></span>
			        		<span class="text-bold">Employee No</span><br/>
			        		<span><span id="lbl_employee_no"><i class='text-muted'>(Select customer)</i></span></span><br/>
			        		<span class="text-bold">Name</span><br/>
			        		<span id="lbl_employee_name"><i class='text-muted'>(Select customer)</i></span><br/>
			        		<span class="text-bold">Meal Allowance</span><br/>
			        		<span>PHP <span id="lbl_meal_allowance">0.00</span></span><br/>
			        		<span class="text-bold">Validity</span><br/>
			        		<span><span id="lbl_meal_allowance_validity"></span></span><br/>
			        		<span class="text-bold" id="lbl_sd">Salary Deduction<br/></span>
			        		<span id="lbl_sd_amount_container">PHP <span id="lbl_sd_amount">0.00</span><br/></span>
			        		<div id="stockholder_data">
			        		<span class="text-bold">Weekly Claims Count</span><br/>
			        		<span><span id="lbl_weekly_claims_count">0</span></span><br/>
			        		<span class="text-bold">Daily Claims Allowance</span><br/>
			        		<span>PHP <span id="lbl_daily_claims_allowance">0.00</span></span><br/>
			        		</div>
			        	</div>
			        </div>
			        <div class="row" id="guest_details">
			        	<div class="col-md-12">
			        		<div class="form-group">
			        			<label class="control-label">Customer Name</label>
			        			<input type="text" class="form-control input-sm" id="txt_customer_name" />
			        		</div>
			        	</div>
			        </div>
			        <div class="row" id="patient_details">
			        	<div class="col-md-12">
			        		<div class="form-group">
			        			<label class="control-label">Patient Name</label>
			        			<input type="text" class="form-control input-sm" id="txt_patient_name" />
			        		</div>
			        		<div class="form-group">
			        			<label class="control-label">Admission No</label>
			        			<input type="text" class="form-control input-sm" id="txt_patient_ref_no" />
			        		</div>
			        		<div class="form-group">
			        			<label class="control-label">Room No</label>
			        			<input type="text" class="form-control input-sm" id="txt_room_no" />
			        		</div>
			        		<div class="form-group">
			        			<label class="control-label">Room Type</label>
			        			<input type="text" class="form-control input-sm" id="txt_room_type" />
			        		</div>
			        	</div>
			        </div>
	              </div>
	              <!-- /.tab-pane -->
	              <div class="tab-pane" id="tab_3">
	               <div class="row">	
		        	<div class="col-md-12">
		        		<!-- <h5 class="orders-h5">Billing Details</h5>
		        		<hr class="orders-hr"/> -->
		        		<div class="form-group">
		        			<label class="control-label">Mode of Payment</label>
		        			<div class="checkbox" id="payment_modes_wrapper"></div>
		        		</div>
		        		<div class="row">
		        			<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Total Payments</label>
									<input type="text" class="form-control input-sm money" readonly="readonly" id="txt_payments_total"/>
								</div>
		        			</div>
		        			<div class="col-md-6">
		        				<div class="form-group">
									<label class="control-label">Total Orders</label>
									<input type="text" class="form-control input-sm money" readonly="readonly" id="txt_orders_total"/>
								</div>
		        			</div>
		        		</div>
		        		
		   				<div class="row">
		   					<div class="col-md-6">
		   						<div class="form-group">
				        			<label class="control-label">Amount Tendered</label>
				        			<input type="text" class="form-control input-sm money" id="txt_amount_tendered"/>
				        		</div>
		   					</div>
		   					<div class="col-md-6">
		   						<div class="form-group">
				        			<label class="control-label">Change</label>
				        			<input type="text" readonly="readonly" class="form-control input-sm money" id="txt_change"/>
				        		</div>
		   					</div>
		   				</div>
		        		
		        		
		        		<div class="form-group">
		        			<label class="control-label">Remarks</label>
		        			<textarea class="form-control textarea-noresize" id="txt_remarks"></textarea>
		        		</div>
						<div class="form-group">
		        			<button type="button" class="btn btn-success" id="btn_transact">Transact</button>
		        		</div>
		        	</div>
			        </div>
	              </div>
	              <!-- /.tab-pane -->
	            </div>
	            <!-- /.tab-content -->
	          </div> <!--  end of tabs -->
		    </div>
	    </div>
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal fade" id="txn_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Transaction</h4>
      </div>
      <div class="modal-body" id="txn_body">
      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
function load_foods_per_category(category){
	$.ajax({
		type:"POST",
		data : {
			category : category
		},
		url:"<?php echo base_url();?>food_inventory/ajax_get_foods_menu",
		success:function(response){
			
			$("#main_foods_container").html(response);
		}
	});
}
function initialize_customer_details(customer_type){
	// 1 = Employee
	// 8 = Core Stockholder
	// 11 = Guest
	// 12 = Patient
	// 14 = MDI

	if(customer_type == 1) {
		
		$("#employee_details,#lbl_sd,#lbl_sd_amount_container").show();
		$("#guest_details,#patient_details,#stockholder_data").hide();
		$("#txt_barcode_no").val("");
		$("#txt_barcode_no").blur();
	}
	else if(customer_type == 8) {

		$("#employee_details,#stockholder_data").show();
		$("#guest_details,#patient_details,#lbl_sd,#lbl_sd_amount_container").hide();
		$("#txt_barcode_no").val("");
		$("#txt_barcode_no").blur();
	}
	else if(customer_type == 11) {
		$("#guest_details").show();
		$("#employee_details,#patient_details").hide();
	}
	else if(customer_type == 12) {
		$("#patient_details").show();
		$("#employee_details,#guest_details").hide();
	}
	else if(customer_type == 14){
		$("#employee_details,#patient_details").hide();
		$("#guest_details").show();
	}

	$.ajax({
		type:"POST",
		data:{
			person_type_id : customer_type
		},
		url:"<?php echo base_url();?>"+"transaction/ajax_get_applicable_payment_modes",
		success:function(response){

			var payment_modes = "";
			payment_modes += "<table class='table' id='tbl_payment_modes'>";
			$(jQuery.parseJSON(response	)).each(function() {  
				is_default = (this.is_default_payment_mode == 1) ? "checked" : "";
				default_flag = (this.is_default_payment_mode == 1) ? "txt_default" : ""; // to know that the field is default
				is_cash = (this.payment_mode_id == 2) ? "txt_cash" : ""; // to know that the field is cash tendered
 				payment_modes += "<tr>";		
				payment_modes += "<td><label><input type='checkbox' value='' "+is_default+" class='cb_payment_modes' />"+this.mode_of_payment+"</label></td>";
				payment_modes += "<td><input type='text' class='form-control input-sm money txt_charges "+is_cash+"' id='"+default_flag+"' data-payment_mode_id='"+this.payment_mode_id+"'/></td>";
				payment_modes += "</tr>";
				//console.log(this.charge_id + " " + this.charge_type_id + " " + this.charge_type_name + " " + this.is_default_charge);
			});
			payment_modes += "</table>";
			$("#payment_modes_wrapper").html(payment_modes);

		}
	});
}

function isExist(searched_food_id){
	var ctr = 0;
	$("#tbl_orders_summary tbody tr").each(function(){
		food_id = $(this).data('food_id');
		if(food_id == searched_food_id){
			ctr++;
		
		}
	});
	return ctr >= 1 ? true : false;
}

function increaseQty(searched_food_id){
	$("#tbl_orders_summary tbody tr").each(function(){
		food_id = $(this).data('food_id');
		var element = $(this);
		if(food_id == searched_food_id){
			var qty_element = element.find("td:nth-child(3)").find("input");
			new_qty = parseInt(qty_element.val()) + 1;
			qty_element.val(new_qty);
			return;
		}
	});
}

function addOrder(food_id,food_name,price,qty,table){
	var new_order = "";
	new_order += "<tr data-food_id='"+food_id+"'>";
		new_order += "<td>"+food_name+"</td>";
		new_order += "<td data-orig_price='"+price+"'><input type='text' readonly='readonly' size='9' class='txt_price' maxlength='10' value='"+price+"'/></td>";
		new_order += "<td><input type='text' size='3' maxlength='4' class='txt_qty' step='1' style='width:100%;' value='1' readonly='readonly' /></td>";
		new_order += "<td>"+price+"</td>";
		new_order += "<td><a href='#' class='btn-remove-order' data-food_id='"+food_id+"'><i class='fa fa-remove fa-1x text-danger'></i></a></td>";
	new_order += "</tr>";
	table.append(new_order);
}

function loadPersonDetails(barcode_no,customer_type){
	$("#person_img").attr("src","<?php echo base_url();?>/assets/images/ajax-pic-load.gif");

	$.ajax({
		type:"POST",
		url:"<?php echo base_url();?>"+"transaction/ajax_get_employee_details",
		data:{
			barcode_no   : barcode_no,
			customer_type : customer_type
		},
		success:function(response){

			if($.trim(response)!="invalid"){
				
				var data = JSON.parse(response);
				$("#txt_person_id").val(data[0].person_id);
				
				if(data[0].remaining_amount != null){
					$("#lbl_meal_allowance").text(data[0].remaining_amount);
				}
				else {
					$("#lbl_meal_allowance").text("0.00");
				}
				$("#lbl_meal_allowance_validity").html(data[0].ma_validity_date);
				$("#lbl_employee_name").html(data[0].full_name1);	
				$("#txt_customer_name").val(data[0].full_name1);
				$("#lbl_employee_no").html(data[0].employee_no);
				$("#lbl_daily_claims_allowance").html(data[0].max_allowance_daily);	
				$("#lbl_weekly_claims_count").html(data[0].ma_weekly_claims_count);	
				$("#lbl_sd_amount").html(data[0].salary_deduction);	
				$("#person_img").attr("src","<?php echo base_url();?>/assets/images/person_images/"+data[0].person_image);
				$("#txt_barcode_no_used").val($("#txt_barcode_no").val());
				$("#txt_meal_allowance_id").val(data[0].meal_allowance_id);
			/*	if(customer_type == 8){
					if(data[0].max_allowance_daily == 0){
						$("#btn_transact").hide();
					}
				}*/
			}
			else {
				$("#person_img").attr("src","<?php echo base_url();?>/assets/images/invalid.png");
				$("#txt_person_id").val("");
				$("#lbl_meal_allowance").text('0.00');
				$("#lbl_employee_name").html('<span class="text-danger">Invalid</span>');
				$("#txt_barcode_no_used,#txt_meal_allowance_id,#txt_person_id").val("");
			}

			$("#txt_barcode_no").val("");
		}
	});
}

function computeTotal(){
	var grand_total = 0;
	$("#tbl_orders_summary tbody tr").each(function(){
		var parent_element = $(this);
		price = parent_element.find("td:nth-child(2)").find("input").val();
		qty = parent_element.find("td:nth-child(3)").find("input").val();
		subtotal = parent_element.find("td:nth-child(4)");
		subtotal_price = (parseFloat(qty) * parseFloat(price)).toFixed(2);
		grand_total = (grand_total + parseFloat(subtotal_price));
	});

	$("#grand_total").text(grand_total.toFixed(2));
	$("#txt_orders_total").val(grand_total.toFixed(2));
	setCharges(grand_total.toFixed(2));
}

function setCharges(grand_total){
	$("#txt_default").val(grand_total);
}

function computeSubtotal(element){
	var parent_element = element.parent().parent();
	price = parent_element.find("td:nth-child(2)").find("input").val();
	qty = element.val();
	subtotal = parent_element.find("td:nth-child(4)");
	subtotal_price = (parseFloat(qty) * parseFloat(price)).toFixed(2);
	subtotal.text(subtotal_price);
}
function computePaymentsTotal(){
	var total = 0;
	$(".txt_charges").each(function(){
		cb = $(this).parent().parent().find('td:nth-child(1)').children().find('input:first-child');
		if(cb.is(':checked')){
			if($(this).val()!=""){
				total += parseFloat($(this).val());
			}
		}
	});
	$("#txt_payments_total").val(total.toFixed(2));
}
$(document).ready(function(){



	/*
		CODE FOR LOADING MENU ITEMS
		ADDED NOVEMBER 27, 2016
	*/

	var default_category = $("#food_categories li[class='active']").children('a:first-child').data('category_id');
	load_foods_per_category(default_category);

	$("body").on('click','.btn_load_foods',function(){
		load_foods_per_category($(this).data('category_id'));
	});
	/*
		END OF CODE FOR LOADING MENU ITEMS
	*/


	initialize_customer_details($("#sel_customer_type").val());

	var tbl_orders_summary = $("#tbl_orders_summary tbody");
	var tbl_orders_summary_rows = $("#tbl_orders_summary tbody tr");
	var is_reload_flag = false;

	$("#sel_customer_type").on("change",function(){
		initialize_customer_details($(this).val());
	});

	$("body").on("click",".btn-add-to-order",function(){

		var food_name = $(this).data('food_name');
		var price = $(this).data('price');
		var qty = $(this).data('qty');
		var food_id = $(this).data('food_id');
		var currenty_food_qty_elem = $(this).parent().parent().children().find('span').children('span');
		var current_qty = currenty_food_qty_elem.text();
		
		
		if(current_qty > 0){
			if(!isExist(food_id)){

				addOrder(food_id,food_name,price,qty,tbl_orders_summary);
				computeTotal();
				computePaymentsTotal();
			}
			else {

				increaseQty(food_id);
				computeTotal();
				computePaymentsTotal();
				$("#tbl_orders_summary tbody tr").each(function(){
					searched_food_id = $(this).data('food_id');
					element = $(this);
					if(food_id == searched_food_id){
						qty_element = $(this).find("td:nth-child(3)").find("input");
						computeSubtotal(qty_element);
					}
				});
			}
			current_qty--;

			currenty_food_qty_elem.text(current_qty);
		}
		else {
				alert("Asd");
		}
	});

	$("body").on("click",".btn-remove-order",function(ev){
		food_id = 'fd_'+ $(this).data('food_id');
		food_element = $("#" + food_id);
		to_remove_qty = $(this).parent().parent().find('td:nth-child(3)').find("input").val();
		food_element_qty = food_element.children().find('span[class=food-qty]');
		new_qty = parseFloat(food_element_qty.text()) + parseFloat(to_remove_qty);
		food_element_qty.text(new_qty.toFixed(2));

		$(this).parent().parent().remove();
		computeTotal();
		ev.preventDefault();
	});

	$("#txt_barcode_no").on("change",function(){
		loadPersonDetails($(this).val(),$("#sel_customer_type").val());
	});

	$("body").on("blur",".txt_price",function(ev){
		var parent_element = $(this).parent().parent();
		qty = parent_element.find("td:nth-child(3)").find("input").val();
		price = $(this).val();
		subtotal = parent_element.find("td:nth-child(4)");
		subtotal_price = (parseFloat(qty) * parseFloat(price)).toFixed(2);
		subtotal.text(subtotal_price);
		computeTotal();
	});

	$("body").on("input",".txt_qty",function(ev){
		//var parent_element = $(this).parent().parent();
		/*price = parent_element.find("td:nth-child(2)").find("input").val();
		qty = $(this).val();
		subtotal = parent_element.find("td:nth-child(4)");
		subtotal_price = (parseFloat(qty) * parseFloat(price)).toFixed(2);
		subtotal.text(subtotal_price);*/
		computeSubtotal($(this));
		computeTotal();
	});
	
	$("#txt_amount_tendered").on("blur",function(){
		var cash = $(".txt_cash").val();
		var amount_tendered = $(this).val();
		var change = parseFloat(amount_tendered) - parseFloat(cash);
		$("#txt_change").val(change.toFixed(2));
	});

	//$('.money').mask('000,000,000,000,000.00', {reverse: true});

	$("#btn_transact").click(function(){

		//
		// type of customer
		customer_type = $("#sel_customer_type").val();

		// used if guest or patient
		customer_name = $("#txt_customer_name").val();

		// used if patient
		patient_ref_no = $("#txt_patient_ref_no").val();
		room_no = $("#txt_room_no").val();
		room_type = $("#txt_room_type").val();
		// used if employee or stockholder
		person_id = $("#txt_person_id").val();
		barcode_no = $("#txt_barcode_no_used").val();
		meal_allowance_id = $("#txt_meal_allowance_id").val();
		employee_no = $("#lbl_employee_no").text();
		
		// particular in every transaction
		amount_tendered = $("#txt_amount_tendered").val();
		remarks = $("#txt_remarks").val();
		grand_total = parseFloat($("#grand_total").text());
		
		// orders summary
		orders_list = [];
		orders_index = 0;
		$("#tbl_orders_summary tbody tr").each(function(){
			food_id = $(this).data('food_id');
			price = $(this).find("td:nth-child(2)").find("input").val();
			qty = $(this).find("td:nth-child(3)").find("input").val();
			orders_list[orders_index] = [food_id,price,qty];
			orders_index++;
		});
		
		// payments
		payments_list = [];
		payments_index = 0;
		$(".cb_payment_modes").each(function(){
			cb_element = $(this);
			if(cb_element.is(":checked")){
				row = cb_element.parent().parent().parent();
				row_input = row.find("td:nth-child(2)").find("input");
				payment_mode_id = row_input.data('payment_mode_id');
				amount = row_input.val();
				payments_list[payments_index] = [payment_mode_id,amount];
				payments_index++;
			}
		});


/*
person_id != "" && barcode_no != "" && meal_allowance_id != ""){*/
		if(orders_index > 0){ // check if orders exist
			if(customer_type == 8 || customer_type == 1){ // if customer is employee or stockholder, require person_id
				if(person_id != "" && employee_no != "" && barcode_no !=""){
					if(payments_index > 0){ // if there are selected mode of payments
						if($("#txt_payments_total").val() == $("#txt_orders_total").val()){ // if payments and orders are equal
							$.ajax({
								type:"POST",
								url:"<?php echo base_url();?>"+"transaction/ajax_add_new_transaction",
								data:{
									customer_type 	  :customer_type,
									customer_name 	  :customer_name,
									patient_ref_no 	  :patient_ref_no,
									room_no 		  :room_no,
									room_type         :room_type,
									person_id 		  :person_id,
									barcode_no 	      :barcode_no,
									employee_no       :employee_no,
									meal_allowance_id :meal_allowance_id,
									amount_tendered   :amount_tendered,
									remarks 		  :remarks,
									grand_total 	  :grand_total,
									orders_list 	  :orders_list,
									payments_list 	   :payments_list
								},
								success:function(response){

									var data = JSON.parse(response);
									if(data.transaction_status){ // if there were errors 
										is_reload_flag = false;
									}
									else {
										is_reload_flag = true;
									}
									$("#txn_body").html(data.message);
									$("#txn_modal").modal("show");
								}
							});
						}
						else {
							is_reload_flag = false;
							$("#txn_body").html("Error : The total of payments should be equal to the total of the orders.");
							$("#txn_modal").modal("show");
						}
					}
					else {
						is_reload_flag = false;
							$("#txn_body").html("Select payment modes for the transaction");
							$("#txn_modal").modal("show");
					}
				}
				else {
					is_reload_flag = false;
					$("#txn_body").html("Error : Scan or type customer barcode");
					$("#txn_modal").modal("show");
				}
			}
			else { // if customer is MDI, patient, guest do not require person_id
				if(payments_index > 0){ // if there are selected mode of payments
					if($("#txt_payments_total").val() == $("#txt_orders_total").val()){ // if payments and orders are equal
						
						$.ajax({
							type:"POST",
							url:"<?php echo base_url();?>"+"transaction/ajax_add_new_transaction",
							data:{
								customer_type 	  :customer_type,
								customer_name 	  :customer_name,
								patient_ref_no 	  :patient_ref_no,
								room_no 		  :room_no,
								room_type         :room_type,
								person_id 		  :person_id,
								barcode_no 	      :barcode_no,
								meal_allowance_id :meal_allowance_id,
								amount_tendered   :amount_tendered,
								remarks 		  :remarks,
								grand_total 	  :grand_total,
								orders_list 	  :orders_list,
								payments_list 	   :payments_list
							},
							success:function(response){

								var data = JSON.parse(response);
								if(data.transaction_status){ // if there were errors 
									is_reload_flag = false;
								}
								else {
									is_reload_flag = true;
								}
								$("#txn_body").html(data.message);
								$("#txn_modal").modal("show");
							}
						});
					}
					else {
						is_reload_flag = false;
						$("#txn_body").html("Error : The total of payments should be equal to the total of the orders.");
						$("#txn_modal").modal("show");
					}
				}
				else {
					is_reload_flag = false;
						$("#txn_body").html("Select payment modes for the transaction");
						$("#txn_modal").modal("show");
				}
			}
		}
		else {
			is_reload_flag = false;
			$("#txn_body").html("Select orders for the transaction");
			$("#txn_modal").modal("show");
		}
	});

	$("#lnk_billing").click(function(ev){
		computeTotal();
	});

	$("#txn_modal").on("hidden.bs.modal",function(){
		if(is_reload_flag){
			location.reload();
		}
	});

	$("#txt_patient_name").on("blur",function(){
		$("#txt_customer_name").val($("#txt_patient_name").val());
	});

 	$("#txt_barcode_no").scannerDetection(function(){
 		loadPersonDetails($(this).val(),$("#sel_customer_type").val());
 	}); 

 	$("#txt_orders_barcode").scannerDetection(function(){
 		var item_barcode = $(this).val();

 		$.ajax({
 			type:"POST",
 			data:{
 				item_barcode : item_barcode 
 			},
 			url:"ajax_get_food_details_by_barcode",
 			success:function(response){
 				if($.trim(response) != 'error'){
	 				var data = JSON.parse(response);
	 				container = $("#fd_" + data[0].food_id);
	 				button_element = container.children().find('div[class=food-description]').children().find('div:last-child').children();
	 				button_element.click();
	 				currenty_food_qty_elem = button_element.parent().parent().children().find("span:nth-child(3)").find("span[class=food-qty]");
				 	current_qty = currenty_food_qty_elem.text();
				 	if(current_qty > 0) {
	 					$("#orders_barcode_msg").html("");
	 				}
	 				else {
	 					$("#orders_barcode_msg").html('Out of stock!');
	 				}
 				}
 				else {
 					$("#orders_barcode_msg").html('<strong>'+$("#txt_orders_barcode").val()+'</strong> : Item does not exist or closed for transaction.');
 				}
 				$("#txt_orders_barcode").val("");
 			}
 		});
 	}); 

 	$("body").on("blur",".txt_charges",function(){
 		computePaymentsTotal();
 	});

	$("body").on("change",".cb_payment_modes",function(){
		computePaymentsTotal();
	}); 	

	$("body").addClass('sidebar-collapse');

	$(".sidebar-toggle").remove();


});
</script>
