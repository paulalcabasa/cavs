<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Credits Ledger Report
            <small></small>
        </h1>
       
    </section>
    <section class="content"> <!-- Main content -->
    <div class="box"  style="min-height:500px;"> <!-- Default box -->
        <div class="box-header with-border">
            <h3 class="box-title">Report</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table" id="tbl_data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer Type</th>
                        <th>Employee No</th>
                        <th>Name</th>
                        <th>Credit Amount</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $ctr = 1;
                    foreach($credits_ledger_list as $row){
                ?>
                    <tr>
                        <td><?php echo $ctr; ?></td>
                        <td><?php echo $row->person_type_name; ?></td>
                        <td><?php echo $row->employee_no; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->credit_amount; ?></td>
                        
                    </tr>

                <?php 
                        $ctr++;
                    }
                ?>
                </tbody>

            </table>
               
        </div> <!-- /.box-body -->
     
    </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->
