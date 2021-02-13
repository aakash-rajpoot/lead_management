<div class="row">
<div class="col-lg-12">
<div class="content-wrapper content-wrapper--with-bg">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 both-space">
            <div class="mt-3 mb-5 border-0">
                <div class="rounded-sm">
                    <div class="text-box ex2">
                    <h3 class="heading-title text-center mt-4 mb-5">Your Profile</h3>
                    <?=form_open('admin/view_profile',array('method'=>'post','novalidate'=>"novalidate",'enctype' => "multipart/form-data")); ?>
                        <?=validation_errors(); ?>
                        <?php if($profile_image == ''){
                            $profile_image = 'avatar.png';
                        } ?>
                        <div class="text-center">
                            <img src="<?=base_url();?>media/images/<?=$profile_image; ?>" class="avatar rounded-circle profile_size img-thumbnail" alt="avatar">
                        </div>  
                        <div class="profile-view pt-3 pb-5">
                            <input type="file" name="profile_image" />  
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="username">UserName: <span class="text-danger font-weight-medium">*</span></label>
                                <input class="form-control" type="text" name="username" id="username"  value="<?=$username;?>" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="email">Email Id: <span class="text-danger font-weight-medium">*</span></label>
                                <input class="form-control" type="email" name="email" id="email" value="<?=$email;?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="fname">First Name:</label>
                                <input class="form-control" type="text" name="fname" id="fname"  value="<?=$fname;?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="lname">Last Name:</label>
                                <input class="form-control" type="text" name="lname" id="lname" value="<?=$lname;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="dob">Birth Date:</label>
                                <input class="form-control" type="date" name="dob" id="dob" value="<?=$dob;?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="mobile">Mobile:</label>
                                <input class="form-control" type="text" name="mobile" id="mobile" value="<?=$mobile;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-input">Gender:</label>
                                <select class="custom-select d-block w-100 form-control" name="gender" id="gender">
                                    <option value=""> ---select gender--- </option>
                                    <option <?php if(trim(strtolower($gender)) === trim(strtolower("Male"))){ echo 'Selected'; } ?>>Male</option>
                                    <option <?php if(trim(strtolower($gender)) === trim(strtolower("Female"))){ echo 'Selected'; } ?>>Female</option>
                                    <option <?php if(trim(strtolower($gender)) === trim(strtolower("Other"))){ echo 'Selected'; } ?>>other</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="address">Address:<span class="text-danger font-weight-medium">*</span></label>
                                <textarea class="form-control" row="2" type="text" name="address" id="address"><?=$address;?></textarea>
                            </div>
                        </div>
                        <div class="d-flex mt-3 mb-4">
                            <button type="submit" class="btn btn-primary button-hor" title="update" name="update_profile">Update</button>
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