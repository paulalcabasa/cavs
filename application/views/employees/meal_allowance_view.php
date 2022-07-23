<div class="content-wrapper" id="app"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Meal Allowance
            <small>You can reload meal allowance of employees in this page</small>
        </h1>    
    </section>
    
    <section class="content"> <!-- Main content -->
        <p class="alert alert-info">Remove the persons to exclude from the meal allowance, not checking anyone will reset all alowances of all the employees.</p>
        <p class="alert alert-success" v-if="submitFlag">Meal allowances has been successfully updated.</p>
        
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
                    <table class="table display" width="100%" cellspacing="0" id="employees_list">
                        <thead>
                            <tr>
                                <th colspan="4">
                                    <input  style="font-weight: 400;" type="text" class="form-control" v-model="search" placeholder="Search by employee name..."/>
                                </th>
                                <th>
                                    <input  style="font-weight: 400;" type='datetime-local' class='form-control start_date' v-model="global_start_date"/>
                                </th>
                                <th>
                                    <input  style="font-weight: 400;" type='datetime-local' class='form-control end_date' v-model="global_end_date" />
                                </th>
                            </tr>
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
                                <td><button type='button' @click="removeEmployee(index)" class='btn btn-danger btn-sm btn-remove-person'>Remove</button></td>
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

<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      
      </div>
      <div class="modal-body">
        <p>Are you sure to submit the meal allowance details?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="updateMealAllowance()">Confirm</button>
      </div>
    </div>
  </div>
</div>
</div><!-- /.content-wrapper -->
<script src="../assets/js/vue.js"></script>
<script>
Vue.createApp({
    data() {
        return {
            department_id : 1,
            employees: [],
            search : '',
            departments : [],
            submitFlag : false,
            global_start_date: '',
            global_end_date: ''
        }
    },
    methods : {
        loadEmployees(department_id){
            var self = this;
            this.submitFlag = false;
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
            $("#modalConfirm").modal('show');
        },
        updateMealAllowance(){
            var self = this;
            $.ajax({
                type:"POST",
                url:"ajax_reload_meal_allowance",
                data : {
                    employees: self.employees
                },
                success:function(response){
                    self.submitFlag = true;
                    $("#modalConfirm").modal('hide');
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
    },
    watch: {
        global_start_date: function(val, oldVal){
            this.employees.map( (employee, index) => {
                this.employees[index].start_date = val; 
            });
        },
        global_end_date: function(val, oldVal){
            this.employees.map( (employee, index) => {
                this.employees[index].end_date = val; 
            });
        }
    }
}).mount('#app')

</script>

