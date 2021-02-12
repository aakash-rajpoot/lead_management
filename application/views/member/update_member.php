<div class="content-wrapper content-wrapper--with-bg">
    <div class="top-space-hea">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrap-career top-space-hea">
                    <h2 class="font-weight-medium text-center mt-2 mb-5">Update Agent Details</h2>
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
                                <input type="email" class="form-control" name="email" id="email" value="<?=$email; ?>">
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
                                <input type="date" class="form-control" rows="3" name="dob" id="dob" value="<?=$dob;?>" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="gender">Gender: </label>
                                <select class="custom-select d-block w-100" name="gender" id="gender">
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
                                <input type="date" class="form-control" name="joining_date" id="joining_date" value="<?=$joining_date;?>">
                            </div>
                        </div>
                        <div class="d-flex  mt-3 mb-5">
                            <button class="btn  button-sub button-hor" name="member_update" type="submit">Update</button>
                        </div>
                    <?=form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>