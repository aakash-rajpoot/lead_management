<div class="content-wrapper content-wrapper--with-bg">
    <div class="top-space-hea">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrap-career">
                    <h2 class="font-weight-medium mt-2 mb-5">Update Agent Details</h2>
                    <?=form_open('member/update_member/'.$id,array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation','enctype' => 'multipart/form-data')); ?>
                        <?=validation_errors(); ?>  

                        <?php if($profile_image == ''){
                            $profile_image = 'avatar.png';
                        } ?>
                        
                        <div class="text-center">
                            <img src="<?=base_url('media/agent_photo/'.$profile_image);?>" class="avatar rounded-circle profile_size img-thumbnail" alt="avatar">
                        </div>  
                        <div class="profile-view pt-3 pb-5">
                            <input type="file" name="profile_image" />  
                        </div>  
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="name">Agent Name: <span class="text-danger font-weight-medium">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" value="<?=$name; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="email">Email-Id: <span class="text-danger font-weight-medium">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" value="<?=$email; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="phone">Phone: <span class="text-danger font-weight-medium">*</span></label>
                                <input type="tel" class="form-control" name="phone" id="phone" value="<?=$phone; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="alt_phone">Alternate Phone Number: </label>
                                <input type="tel" class="form-control" name="alt_phone" id="alt_phone" value="<?=$alt_phone; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="dob">Birth Date: <span class="text-danger font-weight-medium">*</span></label>
                                <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                <input type="text" class="form-control" rows="3" name="dob" id="dob" value="<?=$dob;?>" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="gender">Gender: </label>
                                <select class="custom-select d-block w-100 form-control" name="gender" id="gender">
                                    <option value="">---Select gender---</option>
                                    <option <?php if(trim(strtolower($gender)) === trim(strtolower("Male"))){ echo 'Selected'; } ?>>Male</option>
                                    <option <?php if(trim(strtolower($gender)) === trim(strtolower("Female"))){ echo 'Selected'; } ?>>Female</option>
                                    <option <?php if(trim(strtolower($gender)) === trim(strtolower("Other"))){ echo 'Selected'; } ?>>Other</option>    
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="aadhar">Aadhar Card: <span class="text-danger font-weight-medium">*</span></label>
                                <input type="file" class="form-control" name="aadhar" id="aadhar" value="<?=$aadhar;?>">
                                <?php if($aadhar !== '') { ?>
                                    <p class="fa fa-check-circle upload_success"> Aadhar card uploaded successfully.</p>
                                <?php }?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="pan">Pan Card: <span class="text-danger font-weight-medium">*</span></label>
                                <input type="file" class="form-control" name="pan" id="pan">
                                <?php if($pan !== '') { ?>
                                    <p class="fa fa-check-circle upload_success"> Pan card uploaded successfully.</p>
                                <?php }?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="permanent">Permanent Address: <span class="text-danger font-weight-medium">*</span></label>
                                <textarea  class="form-control" cols = "50" name="permanent" id="permanent"><?=$permanent;?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="correspondence">Correspondence Address:</label>
                                <textarea class="form-control" cols = "50" name="correspondence" id="correspondence"><?=$correspondence;?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="joining_date">Date of Joining: </label>
                                <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                    <input type="text" class="form-control" name="joining_date" id="joining_date" value="<?=$joining_date;?>">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input">User Role: <span class="text-danger font-weight-medium">*</span></label>
                                <div class="form-group">
                                    <select name="role" class="form-control">
                                        <option value="">Select Role</option>
                                        <?php foreach($roles as $data ) { ?>
                                        <!-- print_r($role['role']); -->
                                            <option value="<?=$data['role_id']?>" <?php if($role == $data['role']){ echo 'Selected'; }?> class="form-control"> <?=$data['role'];?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="checkbox" name="approval" <?php if($approval){ echo 'Checked'; }?>  value="1">
                            <label for="approval"> Give permission to add own team.</label><br>
                        </div>
                        </div>
                        <div class="d-flex  mt-3 mb-5">
                            <button class="btn button-hor btn-success" name="member_update" type="submit">Update</button>
                        </div>
                    <?=form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>