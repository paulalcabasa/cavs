<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->

    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Food Sales Inventory
  
        </h1>
    </section>
    <section class="content"> <!-- Main content -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">  
              <li class="active">
                <a href="#tbl_data" data-toggle="tab" data-state="5" aria-expanded="true" class="btn_get_table_data">New</a>
              </li>
              <li>
                <a href="#tbl_data" data-toggle="tab" data-state="4" aria-expanded="true" class="btn_get_table_data">Opened</a>
              </li>
              <li>
                <a href="#tbl_data" data-toggle="tab" data-state="3" aria-expanded="true" class="btn_get_table_data">Closed</a>
              </li>
              <li >
                <a href="#tbl_data" data-toggle="tab" data-state="2" aria-expanded="true" class="btn_get_table_data">Cancelled</a>
              </li>
                <li class='pull-right'>
                <button type="button" class="btn btn-sm btn-primary" id="btn_print_barcode">Print Barcode</a>
              </li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tbl_data">
                <?php
                $current_date = date('Y-m-d');
                $date = DateTime::createFromFormat("Y-m-d", $current_date);
                $interval = new DateInterval("P2M"); // 4 months
                $start_date = $date->sub($interval);
                $start_date = $start_date->format("Y-m-d");
              ?>
                <div class="row">
                    <div class="col-md-6">
                        <form class="form-horizontal" id="frm_data" target="_blank" method="POST" action="<?php echo base_url();?>food_inventory/print_food_barcode">
                            <div class="form-group">  
                                <label class="col-md-3 control-label">Date</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="txt_display_date"
                                     value="<?php echo format_date_slash($start_date) . ' - ' . format_date_slash($current_date);?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-3"><input id="txt_food_ids" type="hidden" name="food_ids"></div>
                              <div class="col-md-9">
                                <div class="checkbox">
                                  <label><input id="cb_main" type="checkbox">Select / Unselect All</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </form>
                     
                </div>
            <table class="table table-bordered" id="tbl_active_inventory">
              <thead>
                <tr>
                  <th></th>
                  <th>Food No</th>
                  <th>Food Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>No. of Sales</th>
                  <th>Status</th>
                  <th>Date Created</th>
                  <th>Action</th>
                  <th>Transaction State ID</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
              </div>
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
function initialize_table(start_date,end_date,status_ids){
    tbl = $('#tbl_active_inventory').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url();?>food_inventory/dt_all_inventory_list/"+status_ids+"/"+start_date+"/"+end_date,
    		"columnDefs": [
    			{ "visible": false, "targets": 10 }
    		]
    });
     return tbl;
}
$(document).ready(function(){
	var food_id;
	var current_qty;
	var start_date;
  var end_date;
  var txt_display_date = $("#txt_display_date").val().split("-");
  var status_ids = "5";
  start_date = moment(txt_display_date[0],"MM/DD/YYYY").format('YYYY-MM-DD');
  end_date = moment(txt_display_date[1],"MM/DD/YYYY").format('YYYY-MM-DD');
  var tbl = initialize_table(start_date,end_date,status_ids);
	$("body").on("click",".btn_update_status",function(){
		food_id = $(this).data("id");
		transaction_state_id = $(this).data("state_id");
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>food_inventory/update_food_state",
			data:{
				food_id : food_id,
				transaction_state_id : transaction_state_id
			},
			success:function(response){
				tbl.draw();
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


	$("#btn_save_adjustments").click(function(){
		$.ajax({
			type:"POST",
			url : "<?php echo base_url();?>food_inventory/ajax_adjust_quantity",
			data:{
				food_id : food_id,
				added_qty : $("#txt_adj_food_to_qty").val(),
        remarks : $("#txt_adj_remarks").val()
			},
			success:function(response){
				tbl.draw();
				$("#dialog_qty_adjustment").modal("hide");
			}
		});
	});


    $('#txt_display_date').daterangepicker({
        "showDropdowns": true,
        "showWeekNumbers": true,
          ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });

    $('#txt_display_date').on('apply.daterangepicker', function(ev, picker) {
        start_date = picker.startDate.format('YYYY-MM-DD');
        end_date = picker.endDate.format('YYYY-MM-DD');
        tbl.destroy();
        tbl = initialize_table(start_date,end_date,status_ids);
    });

    $("body").on("click",".btn_get_table_data",function(){
        status_ids = $(this).data('state');
        tbl.destroy();
        tbl = initialize_table(start_date,end_date,status_ids);
    });

    $("#cb_main").click(function(){
        if($(this).is(":checked")){
          $(".cb_food").prop("checked",true);
        }
        else {
            $(".cb_food").prop("checked",false);
        }
    });

    $("#btn_print_barcode").click(function(){
       var selected_foods = [];
       var index = 0;
        $('.cb_food').each(function(){
            if($(this).is(":checked")){
                selected_foods[index] = $(this).val();
                index++;
            }
        });
        if(index > 0){
           $("#txt_food_ids").val(selected_foods);
           $("#frm_data").submit();
        }
        else {
            alert('Kindly select foods to print barcode.');
        }
    });
});
</script>

