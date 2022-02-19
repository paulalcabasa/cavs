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
            <h3 class="box-title">Update Supplier</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" id="btn_save_supplier">Save Changes</button>
            </div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" name="frm_supplier_details" id="frm_supplier_details" action="<?php echo base_url();?>supplier/update_supplier" method="POST">
                <div clas="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Supplier No</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="supplier_name" value="<?php echo $supplier_details[0]->supplier_no;?>" readonly="readonly"/>
                                <input type="hidden" name="supplier_id" value="<?php echo $supplier_details[0]->supplier_id;?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Supplier Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="supplier_name" value="<?php echo $supplier_details[0]->supplier_name;?>"/>
                                <span class="form-error-msg"><?php echo form_error('supplier_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">TIN</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tin" value="<?php echo $supplier_details[0]->tin;?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contact No</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="contact_no" value="<?php echo $supplier_details[0]->contact_no;?>"/>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address"><?php echo $supplier_details[0]->address;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <select class="form-control" name="status">
                                <?php
                                    foreach($status_list as $state){
                                        if(in_array($state->id,array(1,2))){
                                        $is_selected = $state->id == $supplier_details[0]->status_id ? "selected" : "";
                                ?>
                                    <option value="<?php echo $state->id?>" <?php echo $is_selected;?>><?php echo $state->description;?></option>
                                <?php
                                        }
                                    }
                                ?>
                                </select>
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

