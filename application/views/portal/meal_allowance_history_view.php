<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Meal Allowance</h1>
    </section>
    <section class="content"> <!-- Main content -->
        <div class="row">
            <div class="col-md-3">
                <div class="box"> <!-- Default box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Current Meal Allowance</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Meal Allowance No</label>
                            <input type="text" readonly="readonly" class="form-control input-sm" value="<?php echo format_meal_allowance_no($person_detail[0]->meal_allowance_id);?>"/>
                        </div>
                      
                        <div class="form-group">
                            <label>Remaining Amount</label>
                            <input type="text" readonly="readonly" class="form-control input-sm" value="<?php echo $person_detail[0]->remaining_amount;?>"/>
                        </div>
                        <div class="form-group">
                            <label>Validity Date</label>
                            <input type="text" readonly="readonly" class="form-control input-sm" value="<?php echo $person_detail[0]->ma_validity_date;?>"/>
                        </div>
                      
                         <div class="form-group">
                            <label>Salary Deduction</label>
                            <input type="text" readonly="readonly" class="form-control input-sm" value="<?php echo $person_detail[0]->salary_deduction;?>"/>
                        </div>
                    </div> <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-9">
                  <div class="box"> <!-- Default box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Meal Allowance History</h3>

                    </div>
                    <div class="box-body">
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
                       
                        <table class="table table-bordered" id="tbl_data">
                            <thead>
                                <tr>
                                    <th>Meal Allowance No</th>
                                    <th>Days Worked</th>
                                    <th>Alloted Amount</th>
                                    <th>Remaining Amount</th>
                                    <th>Validity Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div> <!-- /.box-body --> 
                </div><!-- /.box -->
            </div>
        </div>
      
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
function initialize_table(start_date,end_date,status_id){
    tbl = $('#tbl_data').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url();?>portal/dt_person_meal_allowance/"+start_date+"/"+end_date+"/" + status_id
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
   
});
</script>



