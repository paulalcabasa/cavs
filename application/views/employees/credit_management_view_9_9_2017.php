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
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <?php
                    $ctr = 1;
                    $initial_list = 0;
                    foreach($departments as $row){
                        $is_active = $ctr == 1 ? "active" : "";
                        if($ctr == 1){
                            $initial_list = $row->id;
                        }
                ?> 
                    <li class="<?php echo $is_active?>">
                        <a href="#employees_list" 
                           id="btn_get_employees" 
                           data-department_id="<?php echo $row->id;?>" 
                           data-toggle="tab" 
                           aria-expanded="true"
                           class="btn_get_employees"
                        ><?php echo $row->department_name;?></a>
                    </li>
                <?php
                        $ctr++;
                    }
                ?>  
                 <li>
                        <a href="#employees_list" 
                           id="btn_get_employees" 
                           data-department_id="0" 
                           data-toggle="tab" 
                           aria-expanded="true"
                           class="btn_get_employees"
                        >All</a>
                    </li>
                <li class="dropdown pull-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Action <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if(in_array($user_type_id,array(3,16))) { ?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="btn_export_credits">Export Credits List</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" id="btn_upload_debit">Upload Debits</a></li>
                        <?php } ?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" id="btn_print">Print</a></li>
                    </ul>
                </li>       
             </ul>
            <div class="tab-content">
              <div class="tab-pane active" >
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
            <!-- /.tab-content -->
        </div>

       
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


<script>
var $idown;  // Keep it outside of the function, so it's initialized once.
var department_id = "<?php echo $initial_list;?>";
function load_employees(department_id){
   $.ajax({
        type:"POST",
        data:{
            department_id : department_id
        },
        url:"ajax_get_employees_with_credit_by_department",
        success:function(response){
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


    load_employees(department_id);

     $("body").on("click",".btn_get_employees",function(){
        var department_id = $(this).data('department_id');
        table.destroy();
        load_employees(department_id);
    });


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
                    employee_type : "mdi"
                },
                url:"ajax_export_selected_employees_ma",
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
                    employee_type : "mdi"
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

});
</script>