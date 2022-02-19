<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Food Category</h1>
      
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
            <h3 class="box-title">New Food Category</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" id="btn_save_food_category">Save</button>
            </div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" name="frm_food_category" id="frm_food_category" action="save_new_food_category" method="POST">
                <div clas="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="category_name" value="<?php echo set_value('category_name');?>"/>
                                <span class="form-error-msg"><?php echo form_error('category_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Sequence</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="sequence_no" value="<?php echo $last_sequence_no;?>"/>
                                <span class="form-error-msg"><?php echo form_error('sequence_no'); ?></span>
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
    $("#btn_save_food_category").click(function(){
        $("#frm_food_category").submit();
    }); 
});
</script>

