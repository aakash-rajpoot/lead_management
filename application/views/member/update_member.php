<style>
#profile-img {
      display: none!important;
  }
  
  span.btn {
      margin-top: -167px!important;
  }

</style>
<div class="content-wrapper content-wrapper--with-bg">
    <div class="top-space-hea">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-career">
                    <h3 class="font-weight-medium mt-2 mb-5">Update Agent Details</h2>
                    <?=form_open('member/update_member/'.$id,array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation','enctype' => 'multipart/form-data')); ?>
                        <?=validation_errors(); ?>  

                        <?php if($profile_image == ''){
                            $profile_image = 'avatar.png';
                        } ?>
                        
                        <div class="text-center">
                            <img src="<?=base_url('media/agent_photo/'.$profile_image);?>" class="avatar rounded-circle profile_size img-thumbnail" alt="avatar">
                        </div>  
                        <div class="profile-view pt-3 pb-5">
                        <label for="file" class="sr-only">Select a file</label>
                            <input id="profile-img"  type="file" name="profile_image" />  
                        </div>  
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="fname">First Name: <span class="text-danger font-weight-medium">*</span></label>
                                <input type="text" class="form-control" name="fname" id="fname" value="<?=$fname; ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="lname">Last Name: <span class="text-danger font-weight-medium">*</span></label>
                                <input type="text" class="form-control" name="lname" id="lname" value="<?=$lname; ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="email">Email-Id: <span class="text-danger font-weight-medium">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" value="<?=$email; ?>" readonly>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="phone">Phone: <span class="text-danger font-weight-medium">*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone" value="<?=$phone; ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="alt_phone">Alternate Phone Number: </label>
                                <input type="text" class="form-control" name="alt_phone" id="alt_phone" value="<?=$alt_phone; ?>">
                            </div>
                        
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="dob">Birth Date: <span class="text-danger font-weight-medium">*</span></label>
                                <div  class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                                <input type="text" class="form-control" rows="3" name="dob" id="dob" value="<?=$dob;?>" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="gender">Gender: </label>
                                <select class="custom-select d-block w-100 form-control" name="gender" id="gender">
                                    <option value="">---Select gender---</option>
                                    <option <?php if(trim(strtolower($gender)) === trim(strtolower("Male"))){ echo 'Selected'; } ?>>Male</option>
                                    <option <?php if(trim(strtolower($gender)) === trim(strtolower("Female"))){ echo 'Selected'; } ?>>Female</option>
                                    <option <?php if(trim(strtolower($gender)) === trim(strtolower("Other"))){ echo 'Selected'; } ?>>Other</option>    
                                </select>
                            </div>
                        
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="aadhar">Aadhar Card: <?php if($aadhar == '') { ?><span class="text-danger font-weight-medium">*</span><?php }?></label>
                                <input type="file" class="form-control" name="aadhar" id="aadhar" value="<?=$aadhar;?>">
                                <?php if($aadhar !== '') { ?>
                                    <p class="fa fa-check-circle upload_success"> Aadhar card uploaded successfully. <a href="<?=base_url();?>media/aadhar/<?=$aadhar;?>" target="_blank"><?=$aadhar;?></a></p>                                    
                                <?php }?>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="joining_date">Date of Joining: </label>
                                <div  class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                                    <input type="text" class="form-control" name="joining_date" id="joining_date" value="<?=$joining_date;?>">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="permanent">Permanent Address: <span class="text-danger font-weight-medium">*</span></label>
                                <textarea  class="form-control" cols = "50" name="permanent" id="permanent"><?=$permanent;?></textarea>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="correspondence">Correspondence Address:</label>
                                <textarea class="form-control" cols = "50" name="correspondence" id="correspondence"><?=$correspondence;?></textarea>
                            </div>
                        
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="pan">Pan Card: <?php if($pan == '') { ?><span class="text-danger font-weight-medium">*</span><?php }?></label>
                                <input type="file" class="form-control" name="pan" id="pan">
                                <?php if($pan !== '') { ?>
                                    <p class="fa fa-check-circle upload_success"> Pan card uploaded successfully. <a href="<?=base_url();?>media/pan/<?=$pan;?>" target="_blank"><?=$pan;?></a></p>
                                <?php }?>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label class="label-input">User Role: <span class="text-danger font-weight-medium">*</span></label>
                                <div class="form-group">
                                    <select name="role" class="form-control">
                                        <option value="">Select Role</option>
                                        <?php foreach($roles as $data ) { ?>
                                            <option value="<?=$data['role_id']?>" <?php if($role == $data['role']){ echo 'Selected'; }?> class="form-control"> <?=$data['role'];?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <input type="checkbox" name="approval" <?php if($approval){ echo 'Checked'; }?>  value="1">
                            <label for="approval">&nbsp; Give permission to add own team.</label><br>
                        </div>
                        </div>
                        <div class="d-flex  mt-3 mb-5">
                            <button class="btn button-hor btn-success" name="member_update" type="submit">Update</button>
                        </div>
                    <?=form_close();?>
                </div>
            </div>
        </div>
    <?php $user = $this->session->get_userdata();
    //print_r($user);
    if($user['id']!==$id AND ($user['role']==1 || $user['role']==2 || $user['role']==3 )){?>
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-career">
                    <h3 class="font-weight-medium mt-2">Letters & Comments</h2>
                    <hr>
                    <?=form_open('member/update_member/'.$id,array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation','enctype' => 'multipart/form-data')); ?>
                        <?=validation_errors(); ?>  
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="letter_type">Select Letter Type: <span class="text-danger font-weight-medium">*</span></label>
                                <select name="letter_type" id="letter_type" class="form-control">
                                    <option value="">Select Letter</option>                                    
                                    <option value="Appointment">Appointment Letter</option>
                                    <option value="Appraisal">Appraisal Letter</option>
                                    <option value="Promotion">Promotion Letter</option>
                                    <option value="Warning">Warning Letter</option>
                                </select> 
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="label-input" for="letters">Upload Letter (Warning / Appraisal / Promotion / Appointment) : <span class="text-danger font-weight-medium">*</span></label>
                                <input type="file" class="form-control" name="letters" id="letters">
                            </div>                            
                            <div class="col-md-6 mb-3">
                                <label class="label-input" for="comments">Add Comments: <span class="text-danger font-weight-medium">*</span></label>
                                <textarea class="form-control" cols = "50" name="comments" id="comments"></textarea>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="d-flex  mt-3 mb-5">
                                <button class="btn button-hor btn-success" name="add_review" type="submit">Submit</button>
                            </div> 
                        </div> 
                    <?=form_close();?>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<script>
    $('#profile-img').each(function() {
  // get label text
  var label = $(this).parents('.form-group').find('label').text();
    label = (label) ? label : 'Upload File';

    // wrap the file input
    $(this).wrap('<div class="input-file"></div>');
    // display label
    $(this).before('<span class="btn">'+label+'</span>');
    // we will display selected file here
    $(this).before('<span class="file-selected"></span>');

    // file input change listener 
    $(this).change(function(e){
        // Get this file input value
        var val = $(this).val();
        
        // Let's only show filename.
        // By default file input value is a fullpath, something like 
        // C:\fakepath\Nuriootpa1.jpg depending on your browser.
        var filename = val.replace(/^.*[\\\/]/, '');

        // Display the filename
        $(this).siblings('.file-selected').text(filename);
    });
});

// Open the file browser when our custom button is clicked.
$('.input-file .btn').click(function() {
    $(this).siblings('input[type="file"]').trigger('click');
});
</script>