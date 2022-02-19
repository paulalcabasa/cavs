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
            <h3 class="box-title">Update Food Category</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" id="btn_save_food_category">Save Changes</button>
            </div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" name="frm_food_category_details" id="frm_food_category_details" action="<?php echo base_url();?>food_categories/update_food_category" method="POST">
                <div clas="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Food Category No</label>
                            <div class="col-md-9">
                              
                                <input type="text" name="food_category_id" class="form-control" readonly="readonly" value="<?php echo $food_category_details[0]->id;?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="food_category_name" value="<?php echo $food_category_details[0]->category;?>"/>
                                <span class="form-error-msg"><?php echo form_error('food_category_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Sequence</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="sequence" value="<?php echo $food_category_details[0]->sequence;?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <select class="form-control" name="sel_status">
                                    <option value='Y' <?php echo $food_category_details[0]->active == 'Y' ? 'selected' : '';?>>Yes</option>
                                    <option value='N' <?php echo $food_category_details[0]->active == 'N' ? 'selected' : '';?>>No</option>
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
    $("#btn_save_food_category").click(function(){
        $("#frm_food_category_details").submit();
    }); 
});
</script>

