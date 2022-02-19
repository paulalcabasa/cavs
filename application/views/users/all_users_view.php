<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>All Users
            <small>Comprehensive list of CMS Users</small>
        </h1>
    </section>
    <section class="content"> <!-- Main content -->
    <div class="box"> <!-- Default box -->
        <div class="box-header with-border">
            <a href="<?php echo base_url();?>user/new_user" class="btn btn-primary btn-sm pull-right">New </a>
        </div>
        <div class="box-body">
            <table id="tbl_users_list" class="display table dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="no-sort" style="width:5%;"></th>
                        <th style="width:30%;">Name</th>
                        <th style="width:15%;">User Type</th>
                        <th style="width:15%;">Status</th>
                        <th style="width:15%;">Last Login</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div> <!-- /.box-body -->
    <!--   <div class="box-footer">
        
    </div> <!-- /.box-footer-->
    </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
function format ( d ) {
    //"";
    //"<a href=''><i class='fa fa-edit fa-1x'></i> Edit</a>" 
    row_data = "<table cellspacing='5'>";
        row_data += "<tr>";
            row_data += "<td width='175'><img class='img-rounded' width='150' height='150' src='<?php echo base_url();?>assets/images/person_images/"+d.person_image+"' /></td>";
            row_data += "<td valign='top'>";
                row_data += "<table>";
                    row_data += "<tr>";
                        row_data += "<td><strong>Name</strong> </td>";
                        row_data += "<td> : "+d.person_name+"</td>";
                    row_data += "</tr>";
                     row_data += "<tr>";
                        row_data += "<td><strong>User Type</strong> </td>";
                        row_data += "<td> : "+d.person_type_name+"</td>";
                    row_data += "</tr>";
                    row_data += "<tr>";
                        row_data += "<td colspan='2'>";
                        row_data += "<a href='user/edit/"+ d.enc_person_id +"' class='btn btn-info btn-sm'><i class='fa fa-edit fa-1x'></i> Edit</a>";
                     //   row_data += "<a href='#' class='btn btn-danger btn-sm lmar1em'><i class='fa fa-remove fa-1x'></i> Deactivate</a>";
                        row_data += "</td>";
                    row_data += "</tr>";
                row_data += "</table>";
            row_data += "</td>";
        row_data += "</tr>";
    row_data += "</table>";
    return row_data;
}

$(document).ready(function(){
    var dt = $('#tbl_users_list').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "user/dt_get_users_list",
        "columns": [
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": ""
            },
            { "data": "person_name" },
            { "data": "person_type_name" },
            { "data": "status" },
            { "data": "last_login" }
        ],
        "order": [[1, 'asc']]
    });

     // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#tbl_users_list tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );
 
    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        });
    });

});
</script>

