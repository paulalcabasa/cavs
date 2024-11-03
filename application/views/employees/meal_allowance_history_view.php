<style>
    .current-allowance {
        background-color: green;
        color: white;
        font-weight: bold;
        font-size: 16px;
    }
    .employee-information {
        font-size: 14px;
        padding-top: 10px;
    }
    .label-details {
        font-weight: bold;
    }
    .value-details {
        font-size: 16px;
    }
</style>
<div class="content-wrapper" id="app"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Meal Allowance History
            <small>View history of employee's allowance</small>
        </h1>    
    </section>
    
    <section class="content"> <!-- Main content -->
        <div class="row">
            <div class="col-md-6">
                <div class="box employee-information"> <!-- Default box -->
                    <div class="box-header">
                        <h3 class="box-title">Employee Information</h3>
                        <div class="row name-details">
                            <div class="col-md-4 label-details">Name</div>
                            <div class="col-md-8 value-details">{{ person_details[0].first_name }} {{ person_details[0].last_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 label-details">Meal Allowance Category</div>
                            <div class="col-md-8 value-details">{{ person_details[0].department_name }}</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box"> <!-- Default box -->
                    <div class="box-header with-border"></div>
                    <div class="box-body">
                        <table class="table display" width="100%" cellspacing="0" id="meal_allowance_list">
                            <thead>
                                <tr>
                                    <th>Meal Allowance Id </th>
                                    <th>Alloted Amount</th>
                                    <th>Remaining Amount</th>
                                    <th>Valid From</th>
                                    <th>Valid Until</th>
                                    <th>Date created</th>
                                    <th>Created by</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(row, index) in meal_allowance_history" :class="index == 0  ? 'current-allowance' : ''">
                                    <td>{{ row.id }}</td>
                                    <td>{{ row.alloted_amount }}</td>
                                    <td>{{ row.remaining_amount }}</td>
                                    <td>{{ row.valid_from }}</td>
                                    <td>{{ row.valid_until }}</td>
                                    <td>{{ row.date_created }}</td>
                                    <td>{{ row.created_by }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
            meal_allowance_history: <?php echo json_encode($meal_allowance_history, JSON_HEX_TAG); ?>,
            person_details: <?php echo json_encode($person_details, JSON_HEX_TAG); ?>,
            submitFlag : false,
        }
    },
    mounted()  {
    },
    methods : {
    }

}).mount('#app')

</script>

