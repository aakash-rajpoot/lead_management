<div class="wrap-career " style="margin-top:73px;">
<div class="row">
<div class="col-lg-12">
<div class="content-wrapper content-wrapper--with-bg">  
        <h2 class="font-weight-medium text-center mt-2 mb-5">Update Agent Details</h2>
        <?php echo form_open('member/update_member/'.$id,array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation','enctype' => 'multipart/form-data')); ?>
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
            </div>
        </div>
    </div>
</div>