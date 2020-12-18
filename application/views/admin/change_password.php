<div style="margin-top:100px;margin-left:170px;">
    <div class="py-5 " id="section-quote">
        <div class="container">
        <div class="row">
           <div class="col-lg-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 both-space">
                    <div class="rounded-sm">
                        <div class="text-box">
                            <h3 class="text-center mt-3 mb-4">Change Password</h3>
                            <?=form_open('admin/change_pass',array('class' => 'needs-validation','method' => 'post','novalidate'=>'novalidate')); ?>
                            <?=validation_errors();?>
                                <div class="row">
                                    <div class="col-lg-12">
									    <label class="label-input" for="old_pass">Old Password <span class="text-danger font-weight-medium">*</span></label>
				                 	    <input class="form-control form-control-sm"  type="password" name="old_pass" id="old_pass"><br />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
									    <label  class="label-input" for="new_pass">New Password <span class="text-danger font-weight-medium">*</span></label>
				                  	    <input class="form-control form-control-sm"  type="password" name="new_pass" id="new_pass"><br/>
                                    </div>
                        
                                </div> 
                                <div class="row">
                                    <div class="col-lg-12">
									    <label  class="label-input" for="confirm_pass">Confirm Password <span class="text-danger font-weight-medium">*</span></label>
					                    <input class="form-control form-control-sm" type="password" name="confirm_pass" id="confirm_pass"><br/><br />
                                </div>
                            </div> 
                            <div class="d-flex justify-content-center">
								<input type="submit" name="admin_change_password" value="Change Password" class="btn btn-primary button-hor" />
                            </div>
							<?=form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
