
<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Modify Details
            <small>This page is used for updating details of <strong>users</strong> into the system.</small>
        </h1>
    </section>

    <section class="content"> <!-- Main content -->
    	<?php if($this->session->flashdata('success_flag')) { ?>
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-info-circle"></i> Success</h4>
			User details has been updated.
		</div>
		<?php } ?>
	
	    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>user/update_user_details" id="frm_update_user" name="frm_update_user">
		    <input type="hidden" name="user_id" id="user_id" value="<?php echo $person_details->user_id;?>" />
		    <input type="hidden" name="person_id" value="<?php echo $person_details->person_id;?>" />
		    <input type="hidden" name="old_person_image" value="<?php echo $person_details->person_image;?>" />
		    <input type="file" id="person_image" name="person_image" class="hidden" onchange="PreviewImage('person_image','person_pic')"/>
		    <div class="box"> <!-- Default box -->
		    	<div class="box-header with-border">
	            	<h3 class="box-title">User Details</h3>
	        	</div>
		        <div class="box-body">
		        		
		        		<div class="col-md-6">
		   
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
			        			<label class="col-md-3 control-label">Username</label>
			        			<div class="col-md-9">
			        				<input type="text" readonly="readonly" class="form-control" placeholder="Username" name="username" value="<?php echo $person_details->username;?>"/>
			        			</div>
			        		</div>

			        		<div class="form-group">
			        			<label class="col-md-3 control-label">Password</label>
			        			<div class="col-md-9">
			        				<div class='input-group'>
			        					<input type="password" readonly="readonly" class="form-control" placeholder="Password" name="password" value="<?php echo decode_string($person_details->passcode);?>"/>
			        					<span class='input-group-btn'>
			        						<button type="button" class='btn btn-primary' id="btn_change_pass">Change</button>
			        					</span>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="form-group hidden" id="new_pass_wrapper">
			        			<label class="col-md-3 control-label">New Password</label>
			        			<div class="col-md-9">
			        				<div class='input-group'>
			        					<input type="password" class="form-control" placeholder="New Password" id="new_password" name="new_password"/>
			        					<span class='input-group-btn'>
			        						<button type="button" class='btn btn-primary' id="btn_save_new_pass">Save</button>
			        					</span>

			        				</div>
			        				<span class='help-block form-error-msg' id="new_pass_err_msg"></span>
			        			</div>
			        		</div>

			        		<div class="form-group">
			        			<label class="col-md-3 control-label">User Type</label>
			        			<div class="col-md-9">
			        				<select class="form-control" name="sel_user_type">
				        			<?php
				        			foreach($person_types as $type){
				        				$is_selected = $person_details->person_type_id == $type->id ? "selected" : "";
				        				if($type->id == 6|| $type->id == 4){
				        			?>
				       					<option value="<?php echo $type->id;?>" <?php echo $is_selected;?> ><?php echo $type->person_type_name?></option>
				   					<?php 
				   						} 
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

	$("#btn_change_pass").click(function(){
		$("#new_pass_wrapper").removeClass('hidden');
	});

	$("#btn_save_new_pass").click(function(){
		var new_pass = $("#new_password").val();
		var user_id = $("#user_id").val();
		if(new_pass == ""){
			$("#new_pass_err_msg").text('Please enter the new password.');
		}
		else {
			$("#new_pass_err_msg").text('Please wait...');
			$.ajax({
				type:"POST",
				data:{
					user_id : user_id,
					password : new_pass
				},
				url:"<?php echo base_url()?>user/ajax_change_password",
				success:function(response){
					location.reload();
				}
			});
		}

		
	});
</script>



