<style>
input[type="file"] {
      display: none!important;
  }
  
  span.btn {
      margin-top: -167px!important;
  }

</style>
<div class="row">
<div class="col-lg-12">
<div class="content-wrapper content-wrapper--with-bg">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 both-space">
            <div class=" border-0">
                <div class="rounded-sm">
                    <div class="text-box ex2">
                    <?=form_open('admin/view_profile',array('method'=>'post','novalidate'=>"novalidate",'enctype' => "multipart/form-data")); ?>
                        <?=validation_errors(); ?>
                        <?php if($profile_image == ''){
                            $profile_image = 'avatar.png';
                        } ?>
                        <div class="text-center" title="upload image" >
                            <img src="<?=base_url();?>media/images/<?=$profile_image; ?>" class="avatar rounded-circle profile_size img-thumbnail" alt="avatar">
                        </div>  
                        <div class="profile-view">
                        <label for="file" title="upload image"  class="sr-only">Select a file</label>
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
                                <div  class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                                <input class="form-control" type="text" name="dob" id="dob" value="<?=$dob;?>">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              </div>
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
                            <button type="submit" class="btn  button-hor btn-success" title="update" name="update_profile">Update</button>
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
<script>
    $('input[type="file"]').each(function() {
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
$(function () {
  $(".datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

</script>