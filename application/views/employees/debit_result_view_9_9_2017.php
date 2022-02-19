<?php 
    if($this->session->flashdata('debit_flag') == null){ 
        if($this->session->userdata('user_type_id') == 6){
            header('location:credit_management_sruho'); 
        }
        else if($this->session->userdata('user_type_id') == 3 || $this->session->userdata('user_type_id') == 16){
            header('location:credit_management'); 
        }
    }
?>
<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Credit Management - Debit Result
            <small>Results of debitted salary deductions</small>
        </h1>
    
    </section>
    <section class="content"> <!-- Main content -->
        <?php if($this->session->flashdata('debit_flag') == "success") {?>
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?php echo $this->session->flashdata('debit_message_subject'); ?>
        </div>
        <?php } else if ($flag == "error") {?>
        <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-remove"></i> Error!</h4>
                <?php echo $this->session->flashdata('debit_message_subject'); ?>
        </div>
        <?php }?>
        <div class="box"> <!-- Default box -->
            <div class="box-header with-border">
             <!--    <a href="credit_management">Go back to credits</a>          -->  
            </div>
            <div class="box-body">
            <?php echo $this->session->flashdata('debit_message_body'); ?>
        </div>
          
            </div> <!-- /.box-body -->
           
        </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->



