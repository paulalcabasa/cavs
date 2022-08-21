<style>
	.main-sidebar {
		display: none;
	}

	.content-wrapper {
		margin-left: 0 !important;
		
	}

	.transaction-controls {
		display: flex; 
		justify-content:space-between;
	}

	.customer-types {
		display: flex;
		align-items: left;
		flex-wrap: wrap;
		justify-content: left;
	}

	.customer-types button {
		margin-right: 5px;
		margin-bottom: 5px;
	}

	.transaction-header {
		padding: 0;
		margin:0 ;
		flex-grow: 2;
		text-align: center;
	}

	.numpad-container {
		display: grid;
		grid-template-columns: auto auto auto;
		padding: 10px;
		column-gap: 5px;
		row-gap: 5px;
	}
	.numpad-item {
		border: 1px solid rgba(0, 0, 0, 0.8);
		padding: 15px;
		font-size: 20px;
		text-align: center;
		background-color: #3c8dbc;
		border-color: #367fa9;
		border-radius: 10px;
		color: #fff;
		font-weight: bold;
		cursor: pointer;
	}
	.discount {
		font-weight: bold;
		font-size: 16px;
	}
	.total {
		font-weight: bold;
		font-size: 16px;
	}
</style>

<div class="content-wrapper" id="app"> <!-- Content Wrapper. Contains page content -->
    <section class="content"> <!-- Main content -->
    	<div id="log"></div>
		<div class="row">
			<div class="col-md-6">
				<div class="box">
					<div class="box-header with-border transaction-controls">
						<div>
							<a href="<?php echo base_url();?>transaction/all_transactions" class="btn btn-primary">BACK TO HOME</a>	
						</div>
						<h3 class="transaction-header">ORDERS</h3>
						<div>
							<button type="button" class="btn btn-success" @click="saveOrder()">SAVE</button>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-5">
								<div class="customer-types">
									<button 
										type="button" 
										class="btn btn-sm"
										:class="row.id == transaction.customer_type ? 'btn-info' : 'btn-primary'"
									 	@click="updateCustomerType(row)" 
										v-for="(row, index) in customer_types">
										 {{ row.person_type_name}}
									</button>
								</div>
								<div class="row" id="employee_details" v-if="transaction.customer_type == 1">
									<div class="col-sm-12">
										<input type="hidden" id="txt_person_id"/>
										<input type="hidden" id="txt_meal_allowance_id"/>
										<input type="hidden" id="txt_barcode_no_used"/>
										<span class="text-bold" id="lbl_person_id">Barcode no</span><br/>
										<span><input type="text" id="txt_barcode_no" placeholder="Select Employee" class="form-control input-sm"  /></span>
										<input type="hidden" id="txt_barcode_no_vue" v-model="employee_barcode_no" placeholder="Select Employee" class="form-control input-sm"  />
										
										<span class="text-bold">Employee No</span><br/>
										<span>
											<span>{{ !employee.employee_no ? '(Select customer)' : employee.employee_no }}</span>
										</span><br/>
										
										<span class="text-bold">Name</span><br/>
										<span>{{ !employee.employee_no ? '(Select customer)' : employee.first_name + ' ' + employee.last_name }}</span><br/>

										<span class="text-bold">Meal Allowance</span><br/>
										<span>PHP <span>{{ !employee.remaining_amount ? '0.00' : employee.remaining_amount}}</span></span><br/>

										<span class="text-bold">Daily Limit</span><br/>
										<span>PHP <span>{{ !employee.meal_allowance_rate ? '0.00' : employee.meal_allowance_rate}}</span></span><br/>

										<span class="text-bold">Consumed Amount</span><br/>
										<span>PHP <span>{{ !employee.meal_allowance_rate ? '0.00' : employee.consumed_amount}}</span></span><br/>
									</div>
								</div>
								<div class="row" id="guest_details" v-if="transaction.customer_type == 11">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label" id="guest_attribute1">Customer Name</label>
											<input type="text" class="form-control input-sm" v-model="transaction.customer_name" />
										</div>
										<div class="form-group">
											<label class="control-label" id="guest_attribute2">Customer ID No</label>
											<input type="text" class="form-control input-sm" v-model="transaction.customer_id_no" />
										</div>
									</div>
								</div>
								<div class="row" id="patient_details" v-if="transaction.customer_type == 12">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Patient Name</label>
											<input type="text" class="form-control input-sm"  v-model="transaction.customer_name" />
										</div>
										<div class="form-group">
											<label class="control-label">Admission No</label>
											<input type="text" class="form-control input-sm" v-model="transaction.patient_ref_no" />
										</div>
										<div class="form-group">
											<label class="control-label">Room No</label>
											<input type="text" class="form-control input-sm" v-model="transaction.room_no" />
										</div>
										<div class="form-group">
											<label class="control-label">Room Type</label>
											<input type="text" class="form-control input-sm" v-model="transaction.room_type" />
										</div>
									</div>
								</div>
								<div class="row" id="doctor_details" v-if="transaction.customer_type == 13">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Name of Doctor</label>
											<input type="text" class="form-control input-sm" v-model="transaction.customer_name" />
										</div>
										<div class="form-group">
											<label class="control-label">Room No</label>
											<input type="text" class="form-control input-sm" v-model="transaction.attribute2" />
										</div>
										<div class="form-group">
											<label class="control-label">Name of Patient</label>
											<input type="text" class="form-control input-sm" v-model="transaction.attribute3" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-7">
								<p class="alert alert-danger" v-if="transaction.customer_type == 1 && (parseFloat(employee.consumed_amount) == parseFloat(employee.meal_allowance_rate)) && parseFloat(employee.consumed_amount) > 0">Meal allowance for this employee has been fully consumed!</p>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Scan item barcode here..." id="txt_orders_barcode" />
									<input type="hidden" class='form-control' placeholder="Scan item barcode here..." id="txt_orders_barcode_vue" v-model="order_item_barcode"/>
									<span class="input-group-btn">
										<button class="btn btn-default" type="button" id="txt_orders_barcode_clear">Clear</button>
									</span>
								</div>
								<span class="text-danger" id="orders_barcode_msg">{{ order_item_barcode_message }}</span>
								<table class="table orders-summary-table" id="tbl_orders_summary">
									<thead>
										<tr>
											<th style="width:30%;">Description</th>
											<th style="width:20%;">Price</th>
											<th style="width:35%;">Quantity</th>
											<th style="width:20%;">Subtotal</th>
											<th style="width:5%;"></th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(row, index) in transaction.orders">
											<td>{{ row.food_name }}</td>
											<td>{{ row.price }}</td>
											<td>
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button" @click="reduceItemQuantity(row, index)">-</button>
													</span>
													<input type="text" v-model="row.quantity" class="form-control" />
													<span class="input-group-btn">
														<button class="btn btn-default" type="button" @click="addItemQuantity(row, index)">+</button>
													</span>
												</div>
											</td>
											<td>{{ row.quantity * row.price }}</td>
											<td><a href="#" @click="removeItem(index)">x</a></td>
										</tr>
									</tbody>
									<tfoot v-if="transaction.orders.length > 0">
										
										<tr class="text-danger discount" v-if="customer_type.discount_percent != '0'">
											<td colspan="3" align="right">Discount</td>
											<td align="right">{{ customer_type.discount_percent }}%</td>
										</tr>

										<tr class="text-danger discount" v-if="customer_type.discount_percent != '0'">
											<td colspan="3" align="right">Less Discount</td>
											<td align="right">{{ computeDiscountAmount(computeTotal(), customer_type.discount_percent) }}</td>
										</tr>
									
										<tr class="total">		
											<td colspan="3" align="right">Total</td>
											<td align="right" id="grand_total">{{ computeGrandTotal() }}</td>
										</tr>

										<tr v-for="(row, index) in payment_modes[transaction.customer_type]">
											<td colspan="3" align="right">{{ row.mode_of_payment  }}</td>
											<td><input type='text' class='form-control input-sm money txt_charges' v-model="row.amount" /></td>
										</tr>
							
										<tr >
											<td colspan="3"  align="right">Amount Tendered</td>
											<td>
												<input type="text" class="form-control input-sm money" placeholder="" v-model="amount_tendered"/>
											</td>
										</tr>

										<tr class="total">
											<td align="right" colspan="3">Change</td>
											<td align="right">
												<span v-if="amount_tendered != ''">{{ parseFloat(amount_tendered) - (computeGrandTotal()) }}</span>
												<span v-if="amount_tendered == ''">0.00</span>
											</td>
										</tr>
									</tfoot>
								</table>

								<div class="numpad-container">
									<div class="numpad-item" @mousedown="addToInput(row)" v-for="(row, index) in numpad_items">{{ row }}</div>
								</div>
							</div>
						</div>
					</div>
				</div>  
		    </div>
	    	<div class="col-md-6">
	    		<div class="nav-tabs-custom" style="min-height:550px;">
				    <ul class="nav nav-tabs" id="food_categories">
						<li v-for="(row, index) in food_categories" :class="(index == 0 ? 'active' : '')" @click="fetchFoodMenuByCategory(row)">
							<a href="#main_foods_container" data-toggle="tab">{{ row.category }}</a>
						</li>
				    </ul>
				    <div class="tab-content">
						<div class="tab-pane active">
							<!-- start  -->
							<div class="col-md-3 col-sm-6 col-xs-12" v-for="(row, index) in food_menu_by_category">
								<div class="box food-container" :class="row.quantity > 0 ? 'has-stock box-success' : 'no-stock box-danger'" @click="addToOrder(row)">
									<div class="box-body">
										<div class="food-img-wrapper">
											<img :src="meal_img_dir + (row.food_image !== null ? row.food_image : 'default_food_image.png')" class="img-responsive"/>
										</div>
										<div class="food-description">
											<div class="food-name-wrapper">
												<span class="food-name">{{ row.food_name }}</span><br/>   
											</div>
											<div class="row">
												<div class="col-md-12">
													<span class="food-price text-danger">Price : {{ row.unit_price }}</span><br/>
														<span class="food-available-quantity text-muted">Quantity : 
														<span class="food-qty">{{ row.quantity > 0 ? row.quantity : 'Out of stock!'}}</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--  end -->
						</div>
				    </div> <!-- /.tab-content -->
				</div>
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

<script src="../assets/js/vue.js"></script>
<script src="../assets/js/vue-barcode-scanner.js"></script>
<script>
$("document").ready(function(){
	$("#txt_orders_barcode").scannerDetection(function(){
		$("#txt_orders_barcode_vue").val($("#txt_orders_barcode").val());
		$('#txt_orders_barcode_vue')[0].dispatchEvent(new CustomEvent('input'));
	}); 

	$("#txt_orders_barcode_clear").click(function(){
		$("#txt_orders_barcode_vue, #txt_orders_barcode").val('');
	});

	$("#txt_barcode_no").scannerDetection(function(){
		$("#txt_barcode_no_vue").val($("#txt_barcode_no").val());
		$('#txt_barcode_no_vue')[0].dispatchEvent(new CustomEvent('input'));
	}); 

	$("#txt_barcode_no").change(function(){
		$("#txt_barcode_no_vue").val($("#txt_barcode_no").val());
		$('#txt_barcode_no_vue')[0].dispatchEvent(new CustomEvent('input'));
	}); 

	
	$("#txt_barcode_no").on('input', function(){
		$("#txt_barcode_no_vue").val($("#txt_barcode_no").val());
		$('#txt_barcode_no_vue')[0].dispatchEvent(new CustomEvent('input'));
	}); 
});

Vue.createApp({
    data() {
        return {
			customer_types: <?php echo json_encode($customer_list, JSON_HEX_TAG); ?>,
			payment_modes: <?php echo json_encode($payment_modes, JSON_HEX_TAG); ?>,
			food_categories: <?php echo json_encode($food_categories, JSON_HEX_TAG); ?>,
			meal_img_dir: <?php echo json_encode($meal_img_dir, JSON_HEX_TAG); ?>,
			food_menu_by_category: [],
			order_item_barcode : '',
			order_item_barcode_message : '',
			employee_barcode_no : '',
			employee : {},
			customer_type : {},
			amount_tendered: '',
			transaction: {
				customer_type : <?php echo json_encode($default_customer, JSON_HEX_TAG); ?>,
				orders: [],
				customer_name : '', // only used if guest or doctor
				customer_id_no : '',
				patient_ref_no : '',
				room_no : '',
				room_type : '',
				attribute2 : '',
				attribute3 : ''
			},
			numpad_items: ['7','8','9','4','5','6','1','2','3','.','0', 'C']
        }
    },
	watch: {
		order_item_barcode(newBarcode, oldBarcode){
			var _this = this;

			if(newBarcode == '') {
				return false;
			}

			$.ajax({
				type:"POST",
				data:{
					item_barcode : newBarcode 
				},
				url:"ajax_get_food_details_by_barcode",
				success:function(response){
					if($.trim(response) == 'error'){
						_this.order_item_barcode_message = newBarcode + ': Item does not exist or closed for transaction.';
						_this.order_item_barcode = '';
						$("#txt_orders_barcode, #txt_orders_barcode_vue").val('');
						return false;
					}

					var data = JSON.parse(response)[0];

					if(data.quantity > 0) {
						_this.addToOrder({
							food_id : data.food_id,
							food_name : data.food_name,
							quantity : 1,
							unit_price : parseFloat(data.unit_price)
						});

						_this.order_item_barcode_message = ''
					} else {
						_this.order_item_barcode_message = 'Insufficient stock.'
					}
					
					_this.order_item_barcode = '';
					$("#txt_orders_barcode, #txt_orders_barcode_vue").val('');
				}
			});
		},
		employee_barcode_no(newBarcode, oldBarcode){
			
			if(newBarcode == ''){
				return false;
			}


			var customerType = this.transaction.customer_type;
			var _this = this;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url();?>"+"transaction/ajax_get_employee_details",
				data:{
					barcode_no   : newBarcode,
					customer_type : customerType
				},
				success:function(response){
					if($.trim(response) === "invalid"){
						return false;
					}

					var data = JSON.parse(response);
					_this.employee = data[0];
					_this.employee_barcode_no = '';
					$("#txt_barcode_no, #txt_barcode_no_vue").val("");
					_this.computePayments();
				}
			});
		}
	},
    methods : {
		fetchFoodMenuByCategory(category){
			var _this = this;
			$.ajax({
				type:"POST",
				data : {
					category : category.id
				},
				url:"<?php echo base_url('Food_Inventory/ajax_get_foods_menu_data');?>",
				success:function(response){
					_this.food_menu_by_category = JSON.parse(response);
				}
			});
		},
		addToOrder(item){
			let itemIndex = this.getItemIndex(item);
	
			if(itemIndex == -1){
				this.transaction.orders.push({
					food_id : item.food_id,
					food_name : item.food_name,
					quantity : 1,
					price : item.unit_price
				});
			} else {
				this.transaction.orders[itemIndex].quantity = this.transaction.orders[itemIndex].quantity + 1;
			}

			this.computePayments();
		},
		getItemIndex(item) {
			for(let i = 0; i < this.transaction.orders.length; i++){
				let order = this.transaction.orders[i];
				if(order.food_id === item.food_id) {
					return i;
				} 
			}

			return -1;
		},
		computeTotal(){
			let total = 0;
			for(let i = 0; i < this.transaction.orders.length; i++){
				let order = this.transaction.orders[i];
				total += order.price * order.quantity;
			}
			return total;
		},
		removeItem(index){
			this.transaction.orders.splice(index, 1);
		},
		updateCustomerType(customerType){
			this.transaction.customer_type = customerType.id;
			this.customer_type = this.getCustomerTypeData(customerType.id);
		},
		getCustomerTypeData(customerTypeId){
			for(let i = 0; i < this.customer_types.length; i++){
				if(this.customer_types[i].id == customerTypeId){
					return this.customer_types[i];
				}
			}

			return false;
		},
		computeDiscountAmount(total, discountPercent){
			return parseFloat(total) * parseFloat(discountPercent/100);
		},
		computeGrandTotal(){
			let total = this.computeTotal();
			let discountPercent = this.customer_type.discount_percent;
			let discountAmount = parseFloat(total) * parseFloat((discountPercent/100));

			return total - discountAmount;
		},
		reduceItemQuantity(item, index){
			if(this.transaction.orders[index].quantity > 0){
				this.transaction.orders[index].quantity = parseFloat(this.transaction.orders[index].quantity) - 1;
				this.computePayments();
			}
		},
		addItemQuantity(item, index){
			if(this.transaction.orders[index].quantity > 0){
				this.transaction.orders[index].quantity = parseFloat(this.transaction.orders[index].quantity) + 1;
				this.computePayments();
			}
		},
		addToInput(number){
			event.preventDefault();
			if(number == 'C') {
				document.activeElement.value = '';
			} else {
				document.activeElement.value = document.activeElement.value + number;
			}

			document.activeElement.dispatchEvent(new CustomEvent('input'));																						
		},
		computePayments(){
			var grandTotal = this.computeGrandTotal();
		
			// if employee
			if(this.transaction.customer_type == 1) {
				if(!this.employee.employee_no){
					alert('Please scan employee barcode no.');
					return false;
				}	

				var mealAllowance = this.employee.remaining_amount;
				var allowedAllowanceDaily = this.employee.meal_allowance_rate - this.employee.consumed_amount;
				
				var excessToAllowance = 0;
				var chargeToAllowance = 0;
				
				if(allowedAllowanceDaily < grandTotal) {
					excessToAllowance = grandTotal - allowedAllowanceDaily;
					chargeToAllowance = allowedAllowanceDaily;
				} else {
					chargeToAllowance = grandTotal;
				}

				// meal allowance
				if(chargeToAllowance > 0){
					this.payment_modes[this.transaction.customer_type][0].amount = chargeToAllowance;
				}
				
				// cash
				if(excessToAllowance > 0){
					this.payment_modes[this.transaction.customer_type][1].amount = excessToAllowance;
				}
			} else {
				this.payment_modes[this.transaction.customer_type][0].amount = grandTotal;
			}
		},
		saveOrder(){

			if(this.transaction.customer_type == 1) {
				if(!this.employee.employee_no){
					alert('Please scan employee barcode no.');
					return false;
				}	
			}

			var grandTotal = this.computeGrandTotal();
		
			var ordersList = [];
			for(let i = 0; i < this.transaction.orders.length; i++){
				let order = this.transaction.orders[i];
				ordersList.push([
					order.food_id,
					order.price,
					order.quantity
				]);
			}

			var paymentsList = [];
			for(let i = 0; i < this.payment_modes[this.transaction.customer_type].length; i++){
				let payment = this.payment_modes[this.transaction.customer_type][i];
				if(payment.amount){
					paymentsList.push([
						payment.payment_mode_id,
						payment.amount
					]);
				}
			}
			
			var transactionData = {
				customer_type 	  : this.transaction.customer_type,
				customer_name 	  : this.transaction.customer_name,
				patient_ref_no 	  : this.transaction.patient_ref_no,
				room_no 		  : this.transaction.room_no,
				room_type         : this.transaction.room_type,
				person_id 		  : this.employee.person_id,
				barcode_no 	      : this.employee.barcode_value,
				employee_no       : this.employee.employee_no,
				meal_allowance_id : this.employee.meal_allowance_id,
				amount_tendered   : this.amount_tendered,
				remarks 		  : '', // not used in this implementation
				grand_total 	  : grandTotal,
				discount_percent  : this.customer_type.discount_percent,
				customer_id_no    : this.transaction.customer_id_no,
				orders_list 	  : ordersList,
				payments_list 	  : paymentsList,
				attribute1 		  : this.transaction.customer_name,
				attribute2 		  : this.transaction.attribute2,
				attribute3 		  : this.transaction.attribute3
			};

		
			$.ajax({
				type:"POST",
				url:"<?php echo base_url();?>"+"transaction/ajax_add_new_transaction",
				data: transactionData,
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
    },
    mounted : function () {
		this.fetchFoodMenuByCategory(this.food_categories[0]);
		
		this.customer_type = this.getCustomerTypeData(this.transaction.customer_type);

    }
}).mount('#app')


</script>