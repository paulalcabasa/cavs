<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Credits Ledger Report
            <small>This page lists all persons with credit</small>
        </h1>
       
    </section>
    <section class="content"> <!-- Main content -->
        <form id="frm_debit_xls" name="frm_debit_xls" method="POST" enctype="multipart/form-data" action="import_customer_debits" class="hidden">
            <input type="file" id="xls_debit" name="xls_debit"/>
             <input type="hidden" name="employee_type" value="1"/><!--  employee type is same as person type 1 which is MDI employee -->
        </form>
             <?php
    
                $start_date = date( 'Y-m-d', strtotime( 'sunday last week' ) );
                $end_date = date( 'Y-m-d', strtotime( 'saturday this week' ) );
            ?>
        <div class="box box-primary" > <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Credit Management</h3>
                <div class="dropdown pull-right">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Action
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <?php if(in_array($user_type_id,array(3,16))) { ?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="btn_export_credits">Export Credits List</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" id="btn_upload_debit">Upload Debits</a></li>
                        <?php } ?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" id="btn_print">Print</a></li>
                    </ul>
                </div>                    
            </div>

            <div class="box-body">
                <div class="container">
                    <div class="col-md-6">
                        <form class="form-horizontal">
                            <div class="form-group">  
                                <label class="control-label">Cut-off Date</label>
                                <input type="text" class="form-control" id="txt_display_date"  value="<?php echo format_date_slash($start_date) . ' - ' . format_date_slash($end_date);?>"/>
                                <input type="hidden" id="txt_from_date" value="<?php echo ($start_date);?>"/>
                                <input type="hidden" id="txt_end_date" value="<?php echo ($end_date);?>"/>
                            </div>
                            <div class="form-group">  
                                <label class="control-label">Department</label>
                                <select class="form-control" id="sel_department_id">
                                    <option value="all">All</option>
                                <?php
                                    foreach($departments as $row){
                                ?>
                                    <option value="<?php echo $row->id;?>"><?php echo $row->department_name;?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="btn_generate">Generate</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table display" width="100%" cellspacing="0" id="employees_list">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="cb_main"/></th>
                                    <th>No</th>
                                    <th>Customer Type</th>
                                    <th>Employee No</th>
                                    <th>Name</th>
                                    <th>Credit Amount</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- /.box-body -->
        </div><!-- /.box -->
      
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal fade" id="cm_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Credit Management</h4>
      </div>
      <div class="modal-body" id="cm_body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="<?php echo base_url();?>/plugins/jquery-block-ui/jquery-block-ui.js"></script>

<script>
var $idown;  // Keep it outside of the function, so it's initialized once.
var department_id = 0;
function load_employees(department_id,from_date,to_date){
   $.ajax({
        type:"POST",
        data:{
            department_id : department_id,
            from_date : from_date,
            end_date : to_date
        },
        url:"ajax_get_employees_with_credit_by_department",
        success:function(response){
            $.unblockUI();
            $("#employees_list tbody").html(response);
            table =  $('#employees_list').DataTable( {
                "scrollY":        "350px",
                "scrollCollapse": true,
                "paging":         false,
                "searching" : true,
                "ordering" : false
            });      
        }
    });
}
function downloadURL(url) {
    if ($idown) {
        $idown.attr('src',url);
    } else {
        $idown = $('<iframe>', { id:'idown', src:url }).hide().appendTo('body');
    }
}
$(document).ready(function(){

    table =  $('#employees_list').DataTable( {
                "scrollY":        "350px",
                "scrollCollapse": true,
                "paging":         false,
                "searching" : true,
                "ordering" : false
            }); 

    //load_employees(department_id,$("#txt_from_date").val(),$("#txt_end_date").val());

    $("#btn_generate").click(function(){
        $("#employees_list tbody").html('<tr><td colspan="5">Please wait...</td></tr>');
        var department_id = $("#sel_department_id").val();
        table.destroy();
        $.blockUI({ message: '<h1>Please wait...</h1>' });
        var from_date = $("#txt_from_date").val();
        var to_date = $("#txt_end_date").val();
        load_employees(department_id,from_date,to_date);
    });
 /*   $("body").on("click",".btn_get_employees",function(){

       // $("#employees_list tbody").html('<tr><td colspan="5">Please wait...</td></tr>');
        var department_id = $(this).data('department_id');
        table.destroy();
        var from_date = $("#txt_from_date").val();
        var to_date = $("#txt_end_date").val();
        load_employees(department_id,from_date,to_date);
    });
*/
    $("#cb_main").click(function(){
        if($(this).is(":checked")){
            $(".cb_employee").prop("checked",true);
        }
        else {
           $(".cb_employee").prop("checked",false);
        }
    });

    $("#btn_export_credits").click(function(){
        var selected_employees = [];
        var index = 0;
        //$("#btn_download_exported_employees").click();
        $('.cb_employee').each(function(){
            if($(this).is(":checked")){
                selected_employees[index] = $(this).data('person_id');
                index++;
            }
        });

        if(index > 0){
            $("#cm_body").html('Please wait...');
            $("#cm_modal").modal('show');
            $.ajax({
                type:"POST",
                data:{
                    selected_employees : selected_employees,
                    employee_type : "mdi",
                    from_date : $("#txt_from_date").val(),
                    end_date : $("#txt_end_date").val()
                },
                url:"ajax_export_selected_employees_credit",
                success:function(response){
                   //... How to use it:
                    downloadURL('<?php echo base_url();?>files/exported_employees/employee_credits_mdi.xls');
                    $("#cm_modal").modal('hide');
                }
            });
        }
        else {
            alert('Kindly select employees to download.');
        }
    });

    $("#btn_upload_debit").click(function(){
        $("#xls_debit").click();
    });  

    $("#xls_debit").on("change",function(){
        $("#frm_debit_xls").submit();
    });

    $("#btn_print").click(function(){
        var selected_employees = [];
        var from_date = $("#txt_from_date").val();
        var to_date = $("#txt_end_date").val();
        var index = 0;
        //$("#btn_download_exported_employees").click();
        $('.cb_employee').each(function(){
            if($(this).is(":checked")){
                selected_employees[index] = $(this).data('person_id');
                index++;
            }
        });



        if(index > 0){
            $("#cm_body").html('Please wait...');
            $("#cm_modal").modal('show');
            $.ajax({
                type:"POST",
                data:{
                    selected_employees : selected_employees,
                    employee_type : "mdi",
                    from_date : from_date,
                    to_date : to_date
                },
                url:"ajax_print_employee_credits",
                success:function(response){
                   //... How to use it:
                    $("#cm_modal").modal('hide');
                    window.location = '<?php echo base_url();?>files/exported_employees/employee_credits_mdi.pdf';
                }
            });
        }
        else {
            alert('Kindly select employees to download.');
        }
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
        //status_id = $(this).data('transaction_status');
        $("#txt_from_date").val(start_date);
        $("#txt_end_date").val(end_date);
        //tbl.destroy();
        //tbl = initialize_table(start_date,end_date,status_id);
    });


});
</script>