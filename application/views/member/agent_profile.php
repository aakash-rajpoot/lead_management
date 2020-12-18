<div class="row">
<div class="col-lg-12">
<div class="content-wrapper content-wrapper--with-bg">
<div class="container">
    <div class="wrap-career " style="margin-top:110px;">
        <h2 class="font-weight-medium text-center mt-2 mb-5">Your Profile</h2>
        <?php echo form_open('member/agent_profile_details',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation','enctype' => 'multipart/form-data')); ?>
            <?=validation_errors(); ?>
            <?php if($profile_image == ''){
                $profile_image = 'avatar.png';
            } ?>
            <div class="text-center">
                <img src="<?php echo base_url();?>media/agent_photo/<?=$profile_image;?>" class="avatar rounded-circle profile_size img-thumbnail" alt="avatar">
            </div>   
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="name">Agent Name: </label>&nbsp; <?=$name;?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="email">Email-Id: </label>&nbsp; <?=$email;?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="phone">Phone: </label>&nbsp; <?=$phone;?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="alt_phone">Alternate Phone Number:</label>&nbsp; <?=$alt_phone;?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="dob">Birth Date: </label>&nbsp; <?=$dob;?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="gender">Gender: </label>&nbsp; <?=$gender;?>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="permanent">Permanent Address:</label>&nbsp; <?=$permanent;?>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="correspondence">Correspondence Address:</label>&nbsp; <?=$correspondence;?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="aadhar">Aadhar Card:</label>&nbsp;
                    <a href="<?=base_url();?>media/aadhar/<?=$aadhar;?>" target="_blank"><?=$aadhar;?></a>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="pan">Pan Card:</label>&nbsp;
                    <a href="<?=base_url();?>media/pan/<?=$pan;?>" target="_blank"><?=$pan;?></a>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-md-6 mb-3">
                    <label class="label-input" for="role">Role: </label>&nbsp; <?//=$role;?>
                    
                </div> -->
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="joining_date">Date of Joining: </label>&nbsp; <?=$joining_date;?>
                </div>
            </div>
        </div> 
        <?php echo form_close();?>
    </div>
</div>
</div>
</div>
</div>