<div class="wrap-career">
<div class="row">
<div class="col-lg-12">
<div class="content-wrapper content-wrapper--with-bg">
        <?=form_open('member/agent_profile_details',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation','enctype' => 'multipart/form-data')); ?>
            <?=validation_errors(); ?>
            <?php if($profile_image == ''){
                $profile_image = 'avatar.png';
            } ?>
            <div class="text-center">
                <img src="<?=base_url();?>media/agent_photo/<?=$profile_image;?>" class="avatar rounded-circle profile_size img-thumbnail mb-5" alt="avatar">
            </div>   
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                <div class=" form-control">
                    <label class="label-input">Agent Name: </label>&nbsp;&nbsp;&nbsp; <?=$name;?>
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <div class=" form-control">
                    <label class="label-input">Email Id: </label>&nbsp;&nbsp;&nbsp; <?=$email;?>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                <div class=" form-control">
                    <label class="label-input">Phone: </label>&nbsp;&nbsp;&nbsp; <?=$phone;?>
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <div class=" form-control">
                    <label class="label-input">Alternate Phone Number:</label>&nbsp;&nbsp;&nbsp; <?=$alt_phone;?>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                <div class=" form-control">
                    <label class="label-input">Birth Date: </label>&nbsp;&nbsp;&nbsp; <?=$dob;?>
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <div class=" form-control">
                    <label class="label-input">Gender: </label>&nbsp;&nbsp;&nbsp; <?=$gender;?>
                </div>   
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                <div class=" form-control  address-box">
                    <label class="label-input">Permanent Address:</label>&nbsp;&nbsp;&nbsp; <?=$permanent;?>
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <div class=" form-control address-box">
                    <label class="label-input">Correspondence Address:</label>&nbsp;&nbsp;&nbsp; <?=$correspondence;?>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3 ">
                <div class=" form-control">
                    <label class="label-input">Aadhar Card:</label>&nbsp;&nbsp;&nbsp;
                    <a href="<?=base_url();?>media/aadhar/<?=$aadhar;?>" target="_blank"><?=$aadhar;?></a>
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <div class=" form-control">
                    <label class="label-input">Pan Card:</label>&nbsp;&nbsp;&nbsp;
                    <a href="<?=base_url();?>media/pan/<?=$pan;?>" target="_blank"><?=$pan;?></a>
                </div>
                </div>
            </div>
            <div class="row mb-5">
                <!-- <div class="col-md-6 mb-3">
                    <label class="label-input" for="role">Role: </label>&nbsp; <?//=$role;?>
                    
                </div> -->
                <div class="col-md-6 mb-3">
                <div class=" form-control">
                    <label class="label-input">Date of Joining: </label>&nbsp;&nbsp;&nbsp; <?=$joining_date;?>
                </div>
                </div>
            </div>
        <?=form_close();?>
    </div>
</div>
</div>
</div>