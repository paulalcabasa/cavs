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
            <h3 class="box-title">New Unit of Measure</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" id="btn_save_uom">Save</button>
            </div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" name="frm_uom_details" id="frm_uom_details" action="save_new_uom" method="POST">
                <div clas="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Abbreviation</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="abbreviation" value="<?php echo set_value('abbreviation');?>"/>
                                <span class="form-error-msg"><?php echo form_error('abbreviation'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="description" value="<?php echo set_value('description');?>"/>
                                <span class="form-error-msg"><?php echo form_error('description'); ?></span>
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
    $("#btn_save_uom").click(function(){
        $("#frm_uom_details").submit();
    }); 
});
</script>

