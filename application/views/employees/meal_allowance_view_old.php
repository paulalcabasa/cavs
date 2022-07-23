<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Meal Allowance
            <small>You can reload meal allowance of employees in this page</small>
        </h1>    
    </section>
    <section class="content"> <!-- Main content -->
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
                <li class="dropdown pull-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Action <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="btn_download_list">Download List</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#ma_modal" data-backdrop="static" data-keyboard="false">Upload List</a></li>
                    </ul>
                </li>       
             </ul>
            <div class="tab-content">
              <div class="tab-pane active" >
                    <table class="table display" width="100%" cellspacing="0" id="employees_list">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="cb_main"/></th>
                                <th>Employee No</th>
                                <th>Name</th>
                                <th>Remaining Allowance</th>
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

<!-- Modal -->
<div id="ma_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload Meal Allowance</h4>
      </div>
      <div class="modal-body">
            <div id="msg" class="alert alert-info" style="display:none;"> 
            <!--     <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                <span style="font-size:20px;">Processing</span> -->
            </div >
            <form id="frm_ma_reload" name="frm_ma_reload" method="post" enctype="multipart/form-data" action="reload_employee_meal_allowance">
                <div class="form-group">
                    <label class="control-label">Validity Date</label>
                    <input type="text" class="form-control" id="txt_validity_date" name="txt_validity_date"/>
                    <input type="hidden" id="txt_valid_from" name="txt_valid_from"/>
                    <input type="hidden" id="txt_valid_until" name="txt_valid_until"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Excel File (List of Employees)</label>
                    <input type="file" name="ma_xls" id="ma_xls" id="ma_xls"/>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_reload_ma">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<form method="POST" class="hidden" enctype="multipart/form-data" action="<?php echo base_url();?>employee/ajax_export_selected_employees_ma" target="_blank" id="frm_selected_employees"><input type="Text" name="selected_employees" id="selected_employees"/></form>

<script>
var $idown;  // Keep it outside of the function, so it's initialized once.
var table;
var department_id = "<?php echo $initial_list;?>";
function load_employees(department_id){
   $.ajax({
        type:"POST",
        data:{
            department_id : department_id
        },
        url:"ajax_get_employees_by_department",
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
    $("#btn_trigger_xls").click(function(){
        $("#ma_xls").click();
    });

    $("#ma_xls").change(function(){
        $("#frm_ma_xls").submit();
    });
   
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

    $("#btn_download_list").click(function(){
        var selected_employees = [];
        var index = 0;
         $("#btn_download_exported_employees").click();
        $('.cb_employee').each(function(){
            if($(this).is(":checked")){
                selected_employees[index] = $(this).data('person_id');
                index++;
            }
        });
        if(index > 0){
            $("#selected_employees").val(selected_employees);
           /*var formData = new FormData($("#frm_selected_employees")[0]);
           formData.append("selected_employees", selected_employees);*/

           $("#frm_selected_employees").submit();
            /*$.ajax({
                type:"POST",
                data:{
                    selected_employees : selected_employees
                },
                url:"ajax_export_selected_employees_ma",
                success:function(response){
                    alert(response);
                   //... How to use it:
                 //  alert("<?php echo base_url();?>files/exported_employees/ma_employees.xls");
                 //   downloadURL('<?php echo base_url();?>files/exported_employees/ma_employees.xls');
                }
            });*/
        }
        else {
            alert('Kindly select employees to download.');
        }
    });

   

    $('#txt_validity_date').daterangepicker({
        "showDropdowns": true,
        "showWeekNumbers": true
        /*  ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }*/
    });

    $("#txt_validity_date").val("");

    $('#txt_validity_date').on('apply.daterangepicker', function(ev, picker) {
        start_date = picker.startDate.format('YYYY-MM-DD');
        end_date = picker.endDate.format('YYYY-MM-DD');
        $("#txt_valid_from").val(start_date);
        $("#txt_valid_until").val(end_date);
    });
        
    $("#btn_reload_ma").click(function(){
        if($("#txt_valid_from").val() == "" || $("#txt_valid_until").val() == ""){
            $("#msg").html('Kindly select validity date.');
        }
        else if($("#ma_xls").val() == ""){
            $("#msg").html('Kindly select file.');
        }
        else {
            $("#msg").html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span style="font-size:20px;">Processing</span>');
            $("#frm_ma_reload").submit();
        }
        $("#msg").show();
    });
    
});
</script>

