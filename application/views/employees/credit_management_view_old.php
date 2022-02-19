 <div class="box"  style="min-height:500px;"> <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Report</h3>

                <div class="box-tools pull-right">
                    <a href="export_customer_credits" class="btn btn-primary">Export Credits</a>
                    <button type="button" class="btn btn-success" id="btn_upload_debit">Upload Debits</button>
                </div>
            </div>
            <div class="box-body">
                <form id="frm_debit_xls" name="frm_debit_xls" method="POST" enctype="multipart/form-data" action="import_customer_debits" class="hidden">
                    <input type="file" id="xls_debit" name="xls_debit"/>
                </form>
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