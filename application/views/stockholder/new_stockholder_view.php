<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>New Stockholder
            <small>This page is used for adding a <strong>new stockholder</strong> into the system.</small>
        </h1>
    </section>

    <section class="content"> <!-- Main content -->
        <?php if($this->session->flashdata('success_flag')) { ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info-circle"></i> Success</h4>
            New stockholder has been added.
        </div>
        <?php } ?>
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>stockholder/save_new_stockholder" name="frm_new_stockholder">
            <div class="box"> <!-- Default box -->
                <div class="box-header with-border">
                    <h3 class="box-title">Stockholder Information Entry</h3>
                </div>
                <div class="box-body">
                        <input type="file" id="person_image" name="person_image" class="hidden" onchange="PreviewImage('person_image','person_pic')"/>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Stockholder No</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="30" class="form-control" placeholder="Stockholder Number" name="stockholder_no" value="<?php echo set_value('stockholder_no');?>" />
                                    <span class='help-block form-error-msg'><?php echo form_error('stockholder_no');?></span>
                                </div>
                            </div>
			    <div class="form-group">
                                <label class="col-md-3 control-label">Barcode No</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="30" class="form-control" placeholder="Barcode Number" name="barcode_no" value="<?php echo set_value('barcode_no');?>" />
                                    <span class='help-block form-error-msg'><?php echo form_error('barcode_no');?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Name</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="50" class="form-control" placeholder="First Name" name="first_name" value="<?php echo set_value('first_name');?>"/>
                                    <span class='help-block form-error-msg'><?php echo form_error('first_name');?></span>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Middle Name</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="50"class="form-control" placeholder="Middle Name" name="middle_name" value="<?php echo set_value('middle_name');?>"/>
                                    <span class='help-blo ck form-error-msg'><?php echo form_error('middle_name');?></span>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Last Name</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="50" class="form-control" placeholder="Last Name" name="last_name" value="<?php echo set_value('last_name');?>"/>
                                    <span class='help-block form-error-msg'><?php echo form_error('last_name');?></span>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Contact No</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="25" class="form-control" placeholder="Contact Number" name="contact_no" value="<?php echo set_value('contact_no');?>"/>
                                    <span class='help-block form-error-msg'><?php echo form_error('contact_no');?></span>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Address</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" placeholder="Address" name="address"><?php echo set_value('address');?></textarea>
                                    <span class='help-block form-error-msg'><?php echo form_error('address');?></span>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6"> <!-- right side for respondent -->
                                <div class="person-image-new">
                                    <img src="<?php echo base_url();?>assets/images/person_images/default.jpg" id="person_pic" width="220" height="220" class="img-rounded"/>
                                    <button class="btn btn-default btn-primary" type="button" id="btn_upload_photo">Change Photo</button>   
                                   <!--  <div class="dropdown">
                                        <button class="btn btn-default btn-primary col-xs-12 dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">Change Photo</button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-target="#takephoto" data-toggle="modal">Take Picture</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="btn_upload_photo">Upload Photo</a></li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div> <!-- end of right side for respondent -->
                        </div>
                </div> <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div> <!-- /.box-footer-->
            </div><!-- /.box -->
        </form>
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    $("#btn_upload_photo").click(function(){
        $("#person_image").click();
    });
</script>



