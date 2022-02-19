<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <!-- <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Success alert preview. This alert is dismissable.
    </div> -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Unit of Measure</h1>
      
    </section>
    <section class="content"> <!-- Main content -->
    <div class="box"> <!-- Default box -->
        <div class="box-header with-border">
            <h3 class="box-title">List of Unit of Measures</h3>

            <div class="box-tools pull-right">
                <a href="unit_of_measure/new_uom" class="btn btn-primary btn-sm">New Unit of Measure</a>
              
            </div>
        </div>
        <div class="box-body">
            <table id="tbl_uom_list" class="display table dt-responsive nowrap"  cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>UOM No</th>
                        <th>Abbeviation</th>
                        <th>Description</th>
                        <th>Edit</th>
                        
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
      var dt = $('#tbl_uom_list').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "unit_of_measure/dt_get_unit_of_measures",
        "columns": [
            { "data": "uom_no" },
            { "data": "abbreviation" },
            { "data": "description" },
            { "data": "uom_id" }
        ],
        "scrollX" : true
    });

    
});
</script>

