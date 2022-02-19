<style>
    div.dataTables_wrapper {
        width: 100%;
    }
</style>
<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>All Employees
            <small>Comprehensive list of New Sinai MDI Employees</small>
        </h1>
    </section>
    <section class="content"> <!-- Main content -->
    <form id="frm_filter" method="post" action="employee" class="hidden">
        <input type="text" value="1" name="status_id"/>
    </form>
    <div class="nav-tabs-custom" style="min-height:550px;">
            <ul class="nav nav-tabs ">
                <li class="<?php if($status_id == 1) echo 'active';?>"><a href="#employees_tab" class="btn_get_employees" data-person_state_id="1" data-toggle="tab">Active</a></li>
                <li class="<?php if($status_id == 2) echo 'active';?>"><a href="#employees_tab" class="btn_get_employees" data-person_state_id="2" data-toggle="tab">Inactive</a></li>
                <li class="dropdown pull-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Action <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>employee/new_employee/<?php echo encode_string('1');?>">New </a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>employee/meal_allowance">Meal Allowance </a></li>
                    </ul>
                </li>   
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="employees_tab">
                     <table id="tbl_employees_list" class="display table nowrap" cellspacing="0"  width="100%">
                        <thead>
                            <tr>
                                <th style="width:10%;">Employee No</th>
                                <th style="width:10%;">Employee No</th>
                                <th style="width:15%;">Name</th>
                                <th style="width:10%;">Department</th>
                                <th style="width:10%;">Alloted Amount</th>
                                <th style="width:10%;">Remaining Amount</th>
                                <th style="width:10%;">Validity Date</th>
                                <th style="width:5%;">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach($employees_list as $employee){
                        ?>
                            <tr>
                                <td><img width="50" height="50" src="<?php echo base_url();?>assets/images/person_images/<?php echo $employee->person_image;?>"/></td>
                                <td><?php echo $employee->employee_no;?></td>
                                <td><?php echo $employee->person_name;?></td>
                                <td><?php echo $employee->department_name;?></td>
                                <td><?php echo $employee->alloted_amount;?></td>
                                <td><?php echo $employee->remaining_amount;?></td>
                                <td><?php echo $employee->ma_validity_date;?></td>
                                <td><a href='employee/edit/<?php echo encode_string($employee->person_id);?>'><i class='fa fa-edit fa-1x'></i></a></td>
                               
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
               
            </div> <!-- /.tab-content -->
        </div>
  
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
/*function format ( d ) {
    //"";
    //"<a href=''><i class='fa fa-edit fa-1x'></i> Edit</a>" 
    row_data = "<table cellspacing='5'>";
        row_data += "<tr>";
            row_data += "<td width='175'><img class='img-rounded' width='150' height='150' src='<?php echo base_url();?>assets/images/person_images/"+d.person_image+"' /></td>";
            row_data += "<td valign='top'>";
                row_data += "<table>";
                    row_data += "<tr>";
                        row_data += "<td><strong>Employee No</strong> </td>";
                        row_data += "<td> : "+d.employee_no+"</td>";
                    row_data += "</tr>";
                    row_data += "<tr>";
                        row_data += "<td><strong>Name</strong> </td>";
                        row_data += "<td> : "+d.person_name+"</td>";
                    row_data += "</tr>";
                    row_data += "<tr>";
                        row_data += "<td><strong>Alloted Amount</strong> </td>";
                        row_data += "<td> : "+d.meal_allowance+"</td>";
                    row_data += "</tr>";
                    row_data += "<tr>";
                        row_data += "<td colspan='2'>";
                        row_data += "<a href='employee/edit/"+ d.enc_person_id +"' class='btn btn-info btn-sm'><i class='fa fa-edit fa-1x'></i> Edit</a>";
                     //   row_data += "<a href='#' class='btn btn-danger btn-sm lmar1em'><i class='fa fa-remove fa-1x'></i> Deactivate</a>";
                        row_data += "</td>";
                    row_data += "</tr>";
                row_data += "</table>";
            row_data += "</td>";
        row_data += "</tr>";
    row_data += "</table>";
    return row_data;
}*/
/*
function initialize_table(person_state_id){
    tbl = $('#tbl_employees_list').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "employee/get_employees_list/"+person_state_id,
        "columns": [
            { "data": "employee_no" },
            { "data": "person_name" },
            { "data": "department_name" },
            { "data": "alloted_amount" },
            { "data": "remaining_amount" },
            { "data": "ma_validity_date" },
            { "data": "person_id" }
        ],
        "order": [[1, 'asc']],
        "scrollX" : true
    });
    return tbl;
}*/

$(document).ready(function(){

    $("#tbl_employees_list").DataTable();
    $(".btn_get_employees").click(function(){
        $("input[name=status_id]").val($(this).data('person_state_id'));
        $("#frm_filter").submit();
    });
    // 1 is active, initialize table with only active employees
  //  var tbl = initialize_table(1);
/*    var dt = $('#tbl_employees_list').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "employee/get_employees_list",
        "columns": [
            { "data": "employee_no" },
            { "data": "person_name" },
            { "data": "department_name" },
            { "data": "alloted_amount" },
            { "data": "remaining_amount" },
            { "data": "ma_validity_date" },
            { "data": "person_id" }
        ],
        "order": [[1, 'asc']],
        "scrollX" : true
    });
*/
     /*$("body").on('click',".btn_get_employees",function(){
        tbl.destroy();
        tbl = initialize_table($(this).data('person_state_id'));
    });*/
     // Array to track the ids of the details displayed rows
/*    var detailRows = [];
 
    $('#tbl_employees_list tbody').on( 'click', 'tr td.details-control', function () {
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
    } );*/
 
    // On each draw, loop over the `detailRows` array and show any child rows
/*    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        });
    });
*/
});
</script>

