<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Credits Ledger Report
            <small>This page lists all persons with credit</small>
        </h1>
       
    </section>
    <section class="content"> <!-- Main content -->
        <form id="frm_debit_xls" name="frm_debit_xls" method="POST" enctype="multipart/form-data" action="import_customer_debits" class="hidden">
            <input type="file" id="xls_debit" name="xls_debit"/>
            <input type="hidden" name="employee_type" value="19"/><!--  employee type is same as person type 19 which is SRUHO employee -->
        </form>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                 <li class="active">
                        <a href="#employees_list" data-toggle="tab" aria-expanded="true" >All</a>
                    </li>
                <li class="dropdown pull-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Action <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                    
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="btn_export_credits">Export Credits List</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" id="btn_upload_debit">Upload Debits</a></li>
                      
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
                        <tbody>
                        <?php
                            $ctr = 1;
                             foreach($credits_ledger_list as $emp){
                        ?>
                            <tr>
                               <td><input type='checkbox' class='cb_employee' data-person_id='<?php echo $emp->person_id;?>'/></td>
                               <td><?php echo $ctr; ?></td>
                               <td><?php echo $emp->person_type_name; ?></td>
                               <td><?php echo $emp->employee_no; ?></td>
                               <td><?php echo $emp->name; ?> </td>
                               <td><?php echo $emp->credit_amount; ?></td>
                           </tr>

            
                        <?php
                                $ctr++;
                            }
                        ?>
                         
                        </tbody>
                    </table>
              </div>
            
            </div>
            <!-- /.tab-content -->
        </div>

       
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
var $idown;  // Keep it outside of the function, so it's initialized once.

function downloadURL(url) {
    if ($idown) {
        $idown.attr('src',url);
    } else {
        $idown = $('<iframe>', { id:'idown', src:url }).hide().appendTo('body');
    }
}
$(document).ready(function(){

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
      
        $('.cb_employee').each(function(){
            if($(this).is(":checked")){
                selected_employees[index] = $(this).data('person_id');
                index++;
            }
        });

        if(index > 0){
            $.ajax({
                type:"POST",
                data:{
                    selected_employees : selected_employees,
                    employee_type : "sruho"
                },
                url:"ajax_export_selected_employees_credit",
                success:function(response){
                   //... How to use it:
                    downloadURL('<?php echo base_url();?>files/exported_employees/employee_credits_sruho.xls');
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
            $.ajax({
                type:"POST",
                data:{
                    selected_employees : selected_employees,
                    employee_type : "sruho"
                },
                url:"ajax_print_employee_credits",
                success:function(response){
                   //... How to use it:
                    window.location = '<?php echo base_url();?>files/exported_employees/employee_credits_sruho.pdf';
                }
            });
        }
        else {
            alert('Kindly select employees to download.');
        }
    });

});
</script>