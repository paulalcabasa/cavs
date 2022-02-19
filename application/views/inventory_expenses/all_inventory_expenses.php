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
                <a href="#tbl_data" data-toggle="tab" data-state="6" aria-expanded="true" class="btn_get_table_data">Finalized</a>
              </li>
            
              <li >
                <a href="#tbl_data" data-toggle="tab" data-state="2" aria-expanded="true" class="btn_get_table_data">Cancelled</a>
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
                        <form class="form-horizontal">
                            <div class="form-group">  
                                <label class="col-md-3 control-label">Date</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="txt_display_date"
                                     value="<?php echo format_date_slash($start_date) . ' - ' . format_date_slash($current_date);?>"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <table class="table table-bordered" id="tbl_expense_data">
              <thead>
                <tr>
                  <th>Expense No</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Total Expense</th>
                  <th>Status</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
              </div>
            </div>
        </div>
	   
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
function initialize_table(start_date,end_date,status_ids){
    tbl = $('#tbl_expense_data').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url();?>inventory_expense/dt_all_inventory_expenses/"+status_ids+"/"+start_date+"/"+end_date
    		
    });
     return tbl;
}
$(document).ready(function(){


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
        tbl.destroy();
        tbl = initialize_table(start_date,end_date,$(this).data('state'));
    });
});
</script>

