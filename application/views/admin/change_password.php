<div style="margin-top:100px">
<div class="py-5 " id="section-quote">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 both-space">
                <div class="card mb-5 border-0 card-opacity shadow ">
                    <div class="card-body rounded-sm">
                        <div class="text-box">
                            <h3 class="text-center mt-3 mb-4">Change Password</h3>
                            <?php echo form_open('admin/change_pass',array('class' => 'needs-validation','method' => 'post','novalidate'=>'novalidate')); ?>
                            <?php echo validation_errors();?>
                                <div class="row">
                                    <div class="col-lg-12">
									<label class="label-input" for="old_pass">Old Password <span class="text-danger font-weight-medium">*</span></label>
				                 	<input class="form-control form-control-lg"  type="password" name="old_pass" id="old_pass"><br /><br />
                                        <div class="invalid-feedback">
                                            Valid Old Password is required.
                                        </div>
                                    </div>
                        
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
									<label  class="label-input" for="new_pass">New Password <span class="text-danger font-weight-medium">*</span></label>
				                  	<input class="form-control form-control-lg"  type="password" name="new_pass" id="new_pass"><br/><br />
                                        <div class="invalid-feedback">
                                            Valid New Password is required.
                                        </div>
                                    </div>
                        
                                </div> 
                                <div class="row">
                                    <div class="col-lg-12">
									<label  class="label-input" for="confirm_pass">Confirm Password <span class="text-danger font-weight-medium">*</span></label>
					                <input class="form-control form-control-lg" type="password" name="confirm_pass" id="confirm_pass"><br/><br />
                                    <div class="invalid-feedback">
                                        Valid Confirm Password is required.
                                    </div>
                                </div>
                            </div> 
                            <div class="d-flex justify-content-center mb-4">
								<input type="submit" name="admin_change_password" value="Change Password" class="btn btn-primary" /><br />
                            </div>
							<?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
