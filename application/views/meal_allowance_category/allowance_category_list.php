<div class="content-wrapper" id="app"> <!-- Content Wrapper. Contains page content -->
    <!-- <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Success alert preview. This alert is dismissable.
    </div> -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Food Categories</h1>
    </section>
    <section class="content"> <!-- Main content -->
    <div class="box"> <!-- Default box -->
        <div class="box-header with-border">
            <h3 class="box-title">List of Meal Allowance Categories</h3>

            <div class="box-tools pull-right">
                <a href="#" data-toggle="modal" data-target="#formModal" class="btn btn-primary btn-sm">New Category</a>
            </div>
        </div>
        <div class="box-body">
            <table id="tbl_food_categories_list" class="display table dt-responsive nowrap"  cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Rate</th>
                        <th>Start Time</th>
                        <th>Shift hours</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, index) in meal_allowance_categories">
                        <td>{{ row.department_name }}</td>
                        <td>{{ row.meal_allowance_rate }}</td>
                        <td>{{ row.meal_allowance_start_time  }}</td>
                        <td>{{ row.shift_hours  }}</td>
                        <td><a href="#" @click="editForm(row)"><i class="fa fa-edit"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div> <!-- /.box-body -->
      
    </div><!-- /.box -->
    </section> <!-- /.content -->

    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="float:left;">Meal Allowance Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form">
                        <input type="hidden" class="form-control" v-model="form.department_id"/>
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" class="form-control" v-model="form.department_name"/>
                            <p class="text-danger">{{ errors['department_name'] }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Rate</label>
                            <input type="text" class="form-control" v-model="form.meal_allowance_rate"/>
                            <p class="text-danger">{{ errors['meal_allowance_rate'] }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Start Time</label>
                            <input type="time" class="form-control" v-model="form.meal_allowance_start_time"/>
                            <p class="text-danger">{{ errors['meal_allowance_start_time'] }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Shift hours</label>
                            <input type="text" class="form-control" v-model="form.shift_hours"/>
                            <p class="text-danger">{{ errors['shift_hours'] }}</p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="save()">Save changes</button>
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
            meal_allowance_categories: <?php echo json_encode($categories, JSON_HEX_TAG); ?>,
            department_id : 1,
            employees: [],
            search : '',
            departments : [],
            submitFlag : false,
            global_start_date: '',
            global_end_date: '',
            form: {
                department_id : 0,
                department_name : '',
                meal_allowance_rate : '',
                meal_allowance_start_time: '',
                shift_hours: ''
            },
            errors: []
        }
    },
    methods : {
        save(){
            if(this.form.department_id == 0) {
                this.create();
            } else {
                this.update();
            }
        },
        editForm(row){
            this.form.department_id = row.id;
            this.form.department_name = row.department_name;
            this.form.meal_allowance_rate = row.meal_allowance_rate;
            this.form.meal_allowance_start_time = row.meal_allowance_start_time;
            this.form.shift_hours = row.shift_hours;
            $("#formModal").modal('show');
        },
        update(){
            var self = this;
            this.validateForm();
            if(Object.keys(this.errors).length == 0){
                $.ajax({
                    type:"POST",
                    url:"update",
                    data : {
                        category: self.form
                    },
                    success:function(response){
                        alert(response);
                        window.location.reload();
                    }
                });
            }
        },
        create(){
            var self = this;
            this.validateForm();
            if(Object.keys(this.errors).length == 0){
                $.ajax({
                    type:"POST",
                    url:"create",
                    data : {
                        category: self.form
                    },
                    success:function(response){
                        alert(response);
                        window.location.reload();
                    }
                });
            }
        },
        validateForm(){
            if(this.form.department_name == '') {
                this.errors['department_name'] = '* Category name is required.';
            } else {
                delete this.errors['department_name'];
            }

            if(this.form.meal_allowance_rate == '') {
                this.errors['meal_allowance_rate'] = '* Meal allowance rate is required.';
            } else {
                if(isNaN(this.form.meal_allowance_rate)) {
                    this.errors['meal_allowance_rate'] = '* Must be a number';
                } else {
                    delete this.errors['meal_allowance_rate'];
                }  
            }
            
            if(this.form.meal_allowance_start_time == '') {
                this.errors['meal_allowance_start_time'] = '* Meal allowance start time is required.';
            } else {
                delete this.errors['meal_allowance_start_time'];
            }

            if(this.form.shift_hours == '') {
                this.errors['shift_hours'] = '* Shift hours is required.';
            } else {
                if(isNaN(this.form.shift_hours)) {
                    this.errors['shift_hours'] = '* Must be a number';
                } else {
                    delete this.errors['shift_hours'];
                } 
            }
        }
    },
    mounted : function () {
    }
}).mount('#app')

</script>




