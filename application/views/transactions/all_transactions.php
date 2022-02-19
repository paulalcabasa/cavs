<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Transactions
            <small>This is page displays all the inventorial items registered in the system</small>
        </h1>
      
    </section>
    <section class="content"> <!-- Main content -->
        <div class="nav-tabs-custom" style="min-height:550px;">
            <ul class="nav nav-tabs ">
                <li class="active"><a href="#transaction_tab" class="btn_get_transactions" data-transaction_status="1" data-toggle="tab">Completed</a></li>
                <li class=""><a href="#transaction_tab" class="btn_get_transactions" data-transaction_status="2" data-toggle="tab">Cancelled</a></li>
           <!--      <li class=""><a href="#pending_transaction_tab"  data-toggle="tab">Pending <span class="badge" id="pending_ctr"><?php echo $pending_ctr == 0 ? "" : $pending_ctr;?></span></a></li> -->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="transaction_tab">
                 <?php
                   // $current_date = date('Y-m-d');
                   // $date = DateTime::createFromFormat("Y-m-d", $current_date);
                   // $interval = new DateInterval("P2M"); // 4 months
                   // $start_date = $date->sub($interval);
                  //  $start_date = $start_date->format("Y-m-d");
                    $start_date = date( 'Y-m-d', strtotime( 'sunday last week' ) );
                    $end_date = date( 'Y-m-d', strtotime( 'saturday this week' ) );
                ?>
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal">
                                <div class="form-group">  
                                    <label class="col-md-3 control-label">Date</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="txt_display_date"
                                         value="<?php echo format_date_slash($start_date) . ' - ' . format_date_slash($end_date);?>"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
           
                    <table class="table table-bordered" id="tbl_all_transactions">
                        <thead>
                            <tr>
                                <th>Transaction No</th>
                                <th>Customer Type</th>
                                <th>Customer Name</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
               <!--  <div class="tab-pane" id="pending_transaction_tab">
                
                    <table class="table table-bordered" id="tbl_pending_transactions" style="width:100%">
                        <thead>
                            <tr>
                                <th>Transaction No</th>
                                <th>Food No</th>
                                <th>Food Name</th>
                                <th>Quantity</th>
                                <th>Added By</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
    
                </div> -->
            </div> <!-- /.tab-content -->
        </div>
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
function initialize_table(start_date,end_date,status_id){
    tbl = $('#tbl_all_transactions').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url();?>transaction/dt_all_transactions/"+start_date+"/"+end_date+"/" + status_id
    });
     return tbl;
}
function count_pending(){
    $.ajax({
        type:"POST",
        data:{},
        url:"<?php echo base_url();?>transaction/ajax_count_pending_transactions",
        success:function(response){
          $("#pending_ctr").text(response);  
        }
    });
}
$(document).ready(function(){
  
    var start_date;
    var end_date;
    var txt_display_date = $("#txt_display_date").val().split("-");
    start_date = moment(txt_display_date[0],"MM/DD/YYYY").format('YYYY-MM-DD');
    end_date = moment(txt_display_date[1],"MM/DD/YYYY").format('YYYY-MM-DD');
    var tbl = initialize_table(start_date,end_date,1);
    var status_id = 1;
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
        //status_id = $(this).data('transaction_status');
        tbl.destroy();
        tbl = initialize_table(start_date,end_date,status_id);
    });

    $("body").on('click',".btn_get_transactions",function(){
        tbl.destroy();
        status_id = $(this).data('transaction_status');
        tbl = initialize_table(start_date,end_date,status_id);
    });

    var tbl_pending = $('#tbl_pending_transactions').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url();?>transaction/dt_pending_transactions"
    });
      
    $("body").on('click',".btn_return_to_inventory",function(){
        var food_id = $(this).data('food_id');
        var quantity = $(this).data('quantity');
        var header_id = $(this).data('header_id');
        $.ajax({
            type:"POST",
            data:{
                temp_transaction_id : header_id,
                food_id : food_id,
                quantity : quantity
            },
            url:"<?php echo base_url();?>transaction/ajax_remove_temp_transaction_line",
            success:function(response){
                alert("Item returned to inventory.");
                tbl_pending.draw();
                count_pending();
            }
        });

    });
});
</script>

