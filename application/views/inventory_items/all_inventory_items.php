<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <!-- <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Success alert preview. This alert is dismissable.
    </div> -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Inventory Items</h1>
      
    </section>
    <section class="content"> <!-- Main content -->
    <div class="box"> <!-- Default box -->
        <div class="box-header with-border">
            <h3 class="box-title">List of Inventory Items</h3>

            <div class="box-tools pull-right">
                <a href="inventory_items/new_item" class="btn btn-primary btn-sm">New Item</a>
              
            </div>
        </div>
        <div class="box-body">
            <table id="tbl_inventory_items" class="display table dt-responsive nowrap"  cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Inventory No</th>
                        <th>Item Name</th>
                        <th>Remaining Quantity</th>
                        <th>Unit of Measure</th>
                        <th>Stocks</th>
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
      var dt = $('#tbl_inventory_items').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "inventory_items/dt_get_inventory_items",
        "columns": [
            { "data": "inventory_item_no" },
            { "data": "item_name" },
            { "data": "remaining_quantity" },
            { "data": "unit_of_measure" },
            { "data": "item_stock" },
            { "data": "edit_item" }
        ],
        "scrollX" : true
    });

    
});
</script>

