
<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Unit of Measure</h1>
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
            <h3 class="box-title">Update unit of measure</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" id="btn_save">Save Changes</button>
            </div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" name="frm_data" id="frm_data" action="<?php echo base_url();?>unit_of_measure/update_uom" method="POST">
                <div clas="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Uom No</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $uom_details[0]->uom_no;?>" readonly="readonly"/>
                                <input type="hidden" name="uom_id" value="<?php echo $uom_details[0]->uom_id;?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Abbreviation</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="abbreviation" value="<?php echo $uom_details[0]->abbreviation;?>"/>
                                <span class="form-error-msg"><?php echo form_error('abbreviation'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="description" value="<?php echo $uom_details[0]->description;?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <select class="form-control" name="status">
                                <?php
                                    foreach($status_list as $state){
                                        if(in_array($state->id,array(1,2))){
                                        $is_selected = $state->id == $uom_details[0]->status_id ? "selected" : "";
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
    $("#btn_save").click(function(){
        $("#frm_data").submit();
    }); 
});
</script>

