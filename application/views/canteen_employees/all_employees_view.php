<style>
    div.dataTables_wrapper {
        width: 100%;
    }
</style>
<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>All Employees
            <small>Comprehensive list of Santa Rosa United Healthy Options Employees</small>
        </h1>
    </section>
    <section class="content"> <!-- Main content -->
        <div class="box"> <!-- Default box -->
            <div class="box-header with-border">
                <a href="<?php echo base_url();?>employee/new_employee/<?php echo encode_string('19');?>" class="btn btn-primary btn-sm pull-right">New </a>
            </div>
            <div class="box-body">
                <table id="tbl_employees_list" class="display table nowrap" cellspacing="0"  width="100%">
                    <thead>
                        <tr>
                            <th style="width:15%;">Employee No</th>
                            <th style="width:20%;">Name</th>
                            <th style="width:20%;">Salary Deduction</th>
                            <th style="width:5%;">Edit</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div> 
        </div>
    </section>
</div>

<script>

$(document).ready(function(){
    var dt = $('#tbl_employees_list').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url();?>employee/dt_canteen_employees_list",
        "columns": [
            { "data": "employee_no" },
            { "data": "person_name" },
            { "data": "salary_deduction" },
            { "data": "person_id" }
        ],
       
    });
});
</script>

