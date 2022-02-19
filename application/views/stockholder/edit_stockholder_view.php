
<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Modify Details
            <small>This page is used for updating details of <strong>stockholder</strong> into the system.</small>
        </h1>
    </section>

    <section class="content"> <!-- Main content -->
    	<?php if($this->session->flashdata('success_flag')) { ?>
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-info-circle"></i> Success</h4>
			Stockholder details has been updated.
		</div>
		<?php } ?>
	
	    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>stockholder/update_stockholder_details" id="frm_update_stockholder" name="frm_update_stockholder">
		    <input type="hidden" name="employee_id" value="<?php echo $person_details->person_id;?>" />
		    <input type="hidden" name="old_person_image" value="<?php echo $person_details->person_image;?>" />
		    <input type="hidden" name="employee_no" value="<?php echo $person_details->employee_no;?>" />
		    <input type="file" id="person_image" name="person_image" class="hidden" onchange="PreviewImage('person_image','person_pic')"/>
		    <div class="box"> <!-- Default box -->
		    	<div class="box-header with-border">
	            	<h3 class="box-title">Stockholder Details</h3>
	        	</div>
		        <div class="box-body">
		        		
		        		<div class="col-md-6">
		        			<div class="form-group">
			        			<label class="col-md-3 control-label">Stockholder No</label>
			        			<div class="col-md-9">
			        				<input type="text" maxlength="30" readonly="readonly" class="form-control" placeholder="Stockholder Number" value="<?php echo $person_details->employee_no;?>" />
			        		
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label class="col-md-3 control-label">Barcode No</label>
			        			<div class="col-md-9">
			        				<input type="text" maxlength="30" readonly="readonly" class="form-control" placeholder="Barcode Number"  value="<?php echo $person_details->barcode_value;?>" />
			        			
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label class="col-md-3 control-label">First Name</label>
			        			<div class="col-md-9">
			        				<input type="text" maxlength="50" class="form-control" placeholder="First Name" name="first_name" value="<?php echo $person_details->first_name;?>"/>
			        				<span class='help-block form-error-msg'><?php echo form_error('first_name');?></span>
			        			</div>
			        			
			        		</div>
			        		<div class="form-group">
			        			<label class="col-md-3 control-label">Middle Name</label>
			        			<div class="col-md-9">
			        				<input type="text" maxlength="50" class="form-control" placeholder="Middle Name" name="middle_name" value="<?php echo $person_details->middle_name;?>"/>
			        				<span class='help-blo ck form-error-msg'><?php echo form_error('middle_name');?></span>
			        			</div>
			        			
			        		</div>
			        		<div class="form-group">
			        			<label class="col-md-3 control-label">Last Name</label>
			        			<div class="col-md-9">
			        				<input type="text" maxlength="50" class="form-control" placeholder="Last Name" name="last_name" value="<?php echo $person_details->last_name;?>"/>
			        				<span class='help-block form-error-msg'><?php echo form_error('last_name');?></span>
			        			</div>
			        			
			        		</div>
			        		<div class="form-group">
			        			<label class="col-md-3 control-label">Contact No</label>
			        			<div class="col-md-9">
			        				<input type="text" maxlength="25" class="form-control" placeholder="Contact Number" name="contact_no" value="<?php echo $person_details->contact_no;?>"/>
			        				<span class='help-block form-error-msg'><?php echo form_error('contact_no');?></span>
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label class="col-md-3 control-label">Address</label>
			        			<div class="col-md-9">
			        				<textarea class="form-control" placeholder="Address" name="address"><?php echo $person_details->address;?></textarea>
			        				<span class='help-block form-error-msg'><?php echo form_error('address');?></span>
			        			</div>
			        			
			        		</div>

			        		<div class="form-group">
			        			<label class="col-md-3 control-label">State</label>
			        			<div class="col-md-9">
			        			
			        				<select class="form-control" name="state" id="state">
			        				<?php
			        					foreach($list_of_state as $state){
			        						$is_selected = $employee_details->person_state_id == $state->id ? "selected" : "";
			        				?>
			        					<option value="<?php echo $state->id;?>" <?php echo $is_selected;?>><?php echo $state->status;?></option>	
			        				<?php
			        					}
			        				?>
			        				</select>
			        			</div>
			        		</div>
		        		</div>
		        		<div class="col-md-6">
		        			<div class="col-md-6"> <!-- right side for respondent -->
				       			<div class="person-image-new">
					            	<img src="<?php echo base_url();?>assets/images/person_images/<?php echo $person_details->person_image;?>" id="person_pic" width="220" height="220" class="img-rounded"/>
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



