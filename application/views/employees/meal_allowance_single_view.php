<div class="content-wrapper" id="app"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Meal Allowance
            <small>You can reload meal allowance of employees in this page</small>
        </h1>    
    </section>
    
    <section class="content"> <!-- Main content -->
        <p class="alert alert-success" v-if="submitFlag">Meal allowances has been successfully updated.</p>
        
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
               
                <li style="padding: 14px;" class='pull-right'>
                    <button type="button" class="btn btn-primary" @click="submit()">Save</button>
                </li>
             </ul>
            <div class="tab-content">
              <div class="tab-pane active" >
                    <table class="table display" width="100%" cellspacing="0" id="employees_list">
                        <thead>
                           
                            <tr>
                           
                                <th>Employee No</th>
                                <th>Name</th>
                                <th>Meal Allowance Rate</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in employees">
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
<script src="<?php echo base_url(); ?>assets/js/vue.js"></script>
<script>
Vue.createApp({
    data() {
        return {
            employees: <?php echo json_encode($employees_list, JSON_HEX_TAG); ?>,
            submitFlag : false,
        }
    },
    methods : {
        submit(){
            $("#modalConfirm").modal('show');
        },
        updateMealAllowance(){
            var self = this;
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>employee/ajax_reload_meal_allowance",
                data : {
                    employees: self.employees
                },
                success:function(response){
                    self.submitFlag = true;
                    $("#modalConfirm").modal('hide');
                }
            });
        }
    }

}).mount('#app')

</script>

