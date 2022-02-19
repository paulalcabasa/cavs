<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <!-- <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Success alert preview. This alert is dismissable.
    </div> -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Suppliers</h1>
      
    </section>
    <section class="content"> <!-- Main content -->
    <div class="box"> <!-- Default box -->
        <div class="box-header with-border">
            <h3 class="box-title">List of Suppliers</h3>

            <div class="box-tools pull-right">
                <a href="supplier/new_supplier" class="btn btn-primary btn-sm">New Supplier</a>
              
            </div>
        </div>
        <div class="box-body">
            <table id="tbl_suppliers_list" class="display table dt-responsive nowrap"  cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Supplier No</th>
                        <th>Name</th>
                        <th>TIN</th>
                        <th>Contact No</th>
                        <th>Address</th>
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
      var dt = $('#tbl_suppliers_list').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "supplier/dt_get_suppliers",
        "columns": [
            { "data": "supplier_no" },
            { "data": "supplier_name" },
            { "data": "tin" },
            { "data": "address" },
            { "data": "contact_no" },
            { "data": "supplier_id" }
        ],
        "scrollX" : true
    });

    
});
</script>

