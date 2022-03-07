<div class="content-wrapper" id="app"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Meal Allowance
            <small>You can reload meal allowance of employees in this page</small>
        </h1>    
    </section>
    <section class="content"> <!-- Main content -->
        <p class="alert alert-info">Remove the persons to exclude from the meal allowance, not checking anyone will reset all alowances of all the employees.</p>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li v-bind:class="department_id == row.id ? 'active' : ''" v-for="(row, index) in departments">
                    <a href="" 
                        @click="loadEmployees(row.id)"
                        data-toggle="tab" 
                        aria-expanded="true"
                    >{{ row.department_name }}</a>
                </li>
                <li class='pull-right'>
                    <button type="button" class="btn btn-primary" @click="submit()">Save</a>
                </li>
             </ul>
            <div class="tab-content">
              <div class="tab-pane active" >
                    <div class="form-group">
                        <input type="text" class="form-control" style="width:40%" v-model="search" placeholder="Search by employee name..."/>
                    </div>
                    <table class="table display" width="100%" cellspacing="0" id="employees_list">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Employee No</th>
                                <th>Name</th>
                                <th>Meal Allowance Rate</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in filteredEmployees">
                                <td><button type='button' @click="removeEmployee(index)" class='btn btn-danger btn-sm btn-remove-person'>Remove</td>
                                <td>{{ row.employee_no }}</td>
                                <td>{{ row.person_name }}</td>
                                <td><input type='text' class='form-control' v-model='row.meal_allowance_rate' /></td>
                                <td><input type='datetime-local' class='form-control start_date' v-model='row.start_date' /></td>
                                <td><input type='datetime-local' class='form-control end_date' v-model='row.end_date' /></td>
                            </tr>
                        </tbody>
                    </table>
              </div>
            
            </div>
            <!-- /.tab-content -->
        </div>
          
         
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script src="../assets/js/vue.js"></script>
<script>

var $idown;  // Keep it outside of the function, so it's initialized once.
var table;
function load_employees(department_id){
   $.ajax({
        type:"POST",
        data:{
            department_id : department_id
        },
        url:"ajax_get_employees_by_department2",
        success:function(response){
            $("#employees_list tbody").html(response);
            table =  $('#employees_list').DataTable( {
                "scrollY":        "350px",
                "scrollCollapse": true,
                "paging":         false,
                "searching" : true,
                "ordering" : false,
                "info" : false
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
    
    
  //  load_employees(department_id);
    $("#btn_trigger_xls").click(function(){
        $("#ma_xls").click();
    });

    $("#ma_xls").change(function(){
        $("#frm_ma_xls").submit();
    });
   
    // $("body").on("click",".btn_get_employees",function(){
    //     var department_id = $(this).data('department_id');
    //     table.destroy();
    //     load_employees(department_id);
    // });

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

   

    $('.start_date, .end_date').datetimepicker({
        "showDropdowns": true,
        "showWeekNumbers": true,
        singleDatePicker: true,
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


Vue.createApp({
    data() {
        return {
            department_id : 1,
            employees: [],
            search : '',
            departments : []
        }
    },
    methods : {
        loadEmployees(department_id){
            var self = this;
            $.ajax({
                type:"POST",
                data:{
                    department_id : department_id
                },
                url:"ajax_get_employees_by_department2",
                success:function(response){
                    var employees = JSON.parse(response);
                    self.employees = employees;  
                }
            });
        },
        loadDepartments(){
            var self = this;
            $.ajax({
                type:"GET",
                url:"ajax_get_departments",
                success:function(response){
                    var departments = JSON.parse(response);
                    self.departments = departments;  
                    console.log(departments);
                }
            });
        },
        removeEmployee(index){
            this.employees.splice(index, 1);
        },
        submit(){
            var self = this;

            $.ajax({
                type:"POST",
                url:"ajax_reload_meal_allowance",
                data : {
                    employees: self.employees
                },
                success:function(response){
                    console.log(response);
                }
            });
        }
    },
    mounted : function () {
        var self = this;
        this.loadDepartments();
        this.loadEmployees(this.department_id);
    },
    computed: {
        filteredEmployees() {
            return this.employees.filter(employee => {
            return employee.person_name.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    }
}).mount('#app')

</script>

