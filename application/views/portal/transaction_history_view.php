<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Transactions
            <small>This is page displays all the inventorial items registered in the system</small>
        </h1>
      
    </section>
    <section class="content"> <!-- Main content -->
        <div class="nav-tabs-custom" style="min-height:550px;">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#transaction_tab" class="btn_get_transactions" data-transaction_status="1" data-toggle="tab">Completed</a></li>
                <li class=""><a href="#transaction_tab" class="btn_get_transactions" data-transaction_status="2" data-toggle="tab">Cancelled</a></li>
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
                </div>
           
                <table class="table table-bordered" id="tbl_all_transactions">
                    <thead>
                        <tr>
                            <th>Transaction No</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                </div>
            </div> <!-- /.tab-content -->
        </div>
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
function initialize_table(start_date,end_date,status_id){
    tbl = $('#tbl_all_transactions').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url();?>portal/dt_customer_transactions/"+start_date+"/"+end_date+"/" + status_id
    });
     return tbl;
}
$(document).ready(function(){
    var start_date;
    var end_date;
    var txt_display_date = $("#txt_display_date").val().split("-");
    start_date = moment(txt_display_date[0],"MM/DD/YYYY").format('YYYY-MM-DD');
    end_date = moment(txt_display_date[1],"MM/DD/YYYY").format('YYYY-MM-DD');
    var status_id = 1;
    var tbl = initialize_table(start_date,end_date,status_id);
    
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
        tbl = initialize_table(start_date,end_date,status_id);
    });

    $("body").on('click',".btn_get_transactions",function(){
        tbl.destroy();
        status_id = $(this).data('transaction_status');
        tbl = initialize_table(start_date,end_date,status_id);
    });

   

});
</script>

