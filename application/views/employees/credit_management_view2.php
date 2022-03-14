<div class="content-wrapper" id="app"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Credits list
            <small>This page lists all persons with credit</small>
        </h1>
    </section>    
    <section class="content"> <!-- Main content -->      
        <div class="alert alert-success alert-dismissible" v-if="submitFlag">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> System message</h4>
            {{ message }}
        </div>
        <div class="box box-primary" > <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Credit Management</h3>                
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" style="width:40%" v-model="search" placeholder="Search by name..."/>
                        </div>
                        <table class="table display" width="100%" cellspacing="0" id="employees_list">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Customer Type</th>
                                    <th>Employee No</th>
                                    <th>Name</th>
                                    <th>Credit Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(row, index) in filteredEmployees">
                                    <td><button type='button' @click="openPaymentModal(row, index)" class='btn btn-info btn-sm'>Pay</button></td>
                                    <td>{{ row.person_type_name }}</td>
                                    <td>{{ row.employee_no }}</td>
                                    <td>{{ row.name }}</td>
                                    <td>{{ row.credit_amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- /.box-body -->
        </div><!-- /.box -->
      
    </section> <!-- /.content -->

    <div class="modal fade" id="modalPayment" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Credit Payment</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Employee No.</label>
                        <input type="text" class="form-control" readonly="readonly" :value="selectedEmployee.employee_no"/>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" readonly="readonly" :value="selectedEmployee.name"/>
                    </div>
                    <div class="form-group">
                        <label for="">Credit amount</label>
                        <input type="text" class="form-control" readonly="readonly" :value="selectedEmployee.credit_amount"/>
                    </div>
                    <div class="form-group">
                        <label for="">Payment amount</label>
                        <input type="text" class="form-control" v-model="selectedEmployee.paid_amount" />
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="updateCredit()">Confirm</button>
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
            search : '',
            employees: [],
            selectedEmployee : [],
            selectedRowIndex : 0,
            message : '',
            submitFlag : false
        }
    },
    methods : {
        loadEmployees(){
            var self = this;
            $.ajax({
                type:"GET",
                url:"ajax_get_employees_with_credit",
                success:function(response){
                   var employees = JSON.parse(response);
                   self.employees = employees;  
                }
            });
        },
        updateCredit(){
            var self = this;
            self.submitFlag = false;
            $.ajax({
                type:"POST",
                data : self.selectedEmployee,
                url:"ajax_update_credit",
                success:function(response){
                    self.message = response;
                    self.submitFlag = true;
                    $("#modalPayment").modal('hide');
                    self.employees.splice(self.selectedRowIndex, 1);
                }
            });
        },
        openPaymentModal(row, index){
            this.selectedEmployee = row;
            this.selectedRowIndex = index;
            $("#modalPayment").modal('show');
        }
    },
    mounted : function () {
        this.loadEmployees();
    },
    computed: {
        filteredEmployees() {
            return this.employees.filter(employee => {
                return employee.name.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    }
}).mount('#app')
</script>