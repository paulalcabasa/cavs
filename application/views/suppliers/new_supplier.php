<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Suppliers</h1>
      
    </section>
    <section class="content"> <!-- Main content -->
      <?php if($this->session->flashdata('success_flag')) {?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> <?php echo $this->session->flashdata('subject'); ?></h4>
        <?php echo $this->session->flashdata('message'); ?>
    </div>
    <?php } ?>
    <div class="box"> <!-- Default box -->
        <div class="box-header with-border">
            <h3 class="box-title">New Supplier</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" id="btn_save_supplier">Save</button>
            </div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" name="frm_supplier_details" id="frm_supplier_details" action="save_new_supplier" method="POST">
                <div clas="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Supplier Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="supplier_name" value="<?php echo set_value('supplier_name');?>"/>
                                <span class="form-error-msg"><?php echo form_error('supplier_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">TIN</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tin" value="<?php echo set_value('tin');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contact No</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="contact_no" value="<?php echo set_value('contact_no');?>"/>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address"><?php echo set_value('address');?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- /.box-body -->
      
    </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
$(document).ready(function(){
    $("#btn_save_supplier").click(function(){
        $("#frm_supplier_details").submit();
    }); 
});
</script>

