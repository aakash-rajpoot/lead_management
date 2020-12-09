<style>
   .ex1 {
 
  /* width: 100%; */
  overflow-x: scroll;
  /* overflow-y: scroll;
  height:400px; */
}
.ex2{
  overflow-y: scroll;
  height:550px;
}

img.avatar.rounded-circle.profile_size.img-thumbnail {
    height: 230;
    width: 230;
}
    </style>
<div class="container" style="margin-top:50px;">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 both-space">
            <div class="card mt-3 mb-5 border-0 card-opacity shadow ">
                <div class="card-body rounded-sm">
                    <div class="text-box ex2">
                    <h3 class="heading-title text-center mt-4 mb-5">Your Profile</h3>
                    <?php echo form_open('admin/view_profile',array('method'=>'post','novalidate'=>"novalidate",'enctype' => "multipart/form-data")); ?>
                        <?php echo validation_errors(); ?>
                        <?php if($profile_image == ''){
                            $profile_image = 'avatar.png';
                        } ?>
                        <div class="text-center">
                            <img src="<?php echo base_url();?>/media/images/<?=$profile_image; ?>" class="avatar rounded-circle profile_size img-thumbnail" alt="avatar">
                        </div>  
                        <div class="text-center pt-3 pb-5">
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
                                <select class="custom-select d-block w-100" name="gender" id="gender">
                                    <option> ---Select--- </option>
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
                        <div class="d-flex justify-content-center mt-3 mb-4">
                            <button type="submit" class="btn btn-primary" title="update" name="update_profile">Update</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
