<div class="row">
<div class="col-lg-10">
<div class="content-wrapper content-wrapper--with-bg">
<div class="container">
    <div class="wrap-career " style="margin-top:110px;">
        <h2 class="font-weight-medium text-center mt-2 mb-5">Update Agent Details</h2>
        <?php echo form_open('member/update_member/'.$id,array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
        <?=validation_errors(); ?>    
            <?php //if($profile_image == ''){
                    //$profile_image = 'avatar.png';
            //} ?>
            <div class="text-center">
                <img src="<?=base_url('media/images/avatar.png');?>" class="avatar rounded-circle profile_size img-thumbnail" alt="avatar">
            </div>  
            <div class="profile-view pt-3 pb-5">
                <input type="file" name="profile_image" />  
            </div>  
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="name">Full Name: <span class="text-danger font-weight-medium">*</span></label>
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
                    <input type="text" class="form-control" name="alt_phone" id="alt_phone" value="<?=$alt_phone; ?>">
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
                        <option value="">---Select---</option>
                        <option <?php if(trim(strtolower($gender)) === trim(strtolower("Male"))){ echo 'Selected'; } ?>>Male</option>
                        <option <?php if(trim(strtolower($gender)) === trim(strtolower("Female"))){ echo 'Selected'; } ?>>Female</option>
                        <option <?php if(trim(strtolower($gender)) === trim(strtolower("Other"))){ echo 'Selected'; } ?>>Other</option>    
                    </select>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-md-6 mb-3">
                    <label class="label-input" for="other_info">Any Other Information<span class="text-danger font-weight-medium">*</span></label>
                    <input type="email" class="form-control" name="other_info" id="other_info" value="<?//=$other_info; ?>">
                    <div class="invalid-feedback">
                        Please enter a valid Other Information.
                    </div>
                </div> -->
            
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="role">Role: <span class="text-danger font-weight-medium">*</span></label>
                    <select class="custom-select d-block w-100" name="role" id="role">
                        <option value="">---Select---</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Supervisors"))){ echo 'Selected'; } ?>>Supervisors</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Manager"))){ echo 'Selected'; } ?>>Manager</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Team Leader"))){ echo 'Selected'; } ?>>Team Leader</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Department Head"))){ echo 'Selected'; } ?>>Department Head</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Advisors"))){ echo 'Selected'; } ?>>Advisors</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Sales"))){ echo 'Selected'; } ?>>Sales</option>      
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="label-input" for="joining_date">Date of Joining: </label>
                    <input type="date" class="form-control" name="joining_date" id="joining_date" value="<?=$joining_date;?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="aadhar">Aadhar Card:</label>
                    <input type="file" class="form-control" name="aadhar" id="aadhar">
                </div>
            
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="pan">Pan Card:</label>
                    <input type="file" class="form-control" name="pan" id="pan">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="permanent">Permanent Address:</label>
                    <textarea  class="form-control" cols = "50" name="permanent" id="permanent"></textarea>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="correspondence">Correspondence Address:</label>
                    <textarea class="form-control" cols = "50" name="correspondence" id="correspondence"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button class="btn btn-primary" name="member_update" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>