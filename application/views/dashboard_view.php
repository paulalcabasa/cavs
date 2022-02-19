<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content"> <!-- Main content -->
    <div class="box"> <!-- Default box -->
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
          <table id="tbl_stockholders_list" class="display table nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      
                        <th style="width:15%;">Stockholder No</th>
                        <th style="width:30%;">Name</th>
                        <th style="width:15%;">Alloted Allowance</th>
                        <th style="width:15%;">Remaining Allowance</th>
                        <th style="width:15%;">Daily Meal Allowance</th>
                        <th style="width:15%;">Weekly Claims Count</th>
                        <th style="width:10%;">Validity Date</th>
                     <!--    <th style="width:10%;">Date Added</th> -->
                        <th style="width:5%;">Edit</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div> <!-- /.box-body -->
        <div class="box-footer">
        Footer
        </div> <!-- /.box-footer-->
    </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->



<script>
$(document).ready(function(){
    var dt = $('#tbl_stockholders_list').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "stockholder/dt_get_stockholders",
        "columns": [
            { "data": "employee_no" },
            { "data": "person_name" },
            { "data": "alloted_amount" },
            { "data": "remaining_amount" },
            { "data": "max_allowance_daily" },
            { "data": "ma_weekly_claims_count" },
            { "data": "ma_validity_date" },
       //     { "data": "ma_date_created" },
            { "data": "person_id" } 
        ],
        "order": [[1, 'asc']],
        "scrollX" : true
    });
});
</script>