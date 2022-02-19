<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
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
            <h3 class="box-title">List of Food Categories</h3>

            <div class="box-tools pull-right">
                <a href="food_categories/new_food_category" class="btn btn-primary btn-sm">New Food Category</a>
            </div>
        </div>
        <div class="box-body">
            <table id="tbl_food_categories_list" class="display table dt-responsive nowrap"  cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Food Category</th>
                        <th>Sequence</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div> <!-- /.box-body -->
      
    </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
$(document).ready(function(){
      var dt = $('#tbl_food_categories_list').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "food_categories/dt_get_food_categories",
        "columns": [
            { "data": "category" },
            { "data": "sequence" },
            { "data": "active" },
            { "data": "id" }
        ],
        "scrollX" : true
    });

    
});
</script>

