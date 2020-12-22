<div class="mt-5 ex1" style="margin-top:110px;">
<div class="row">
   <div class="col-lg-12">
      <div class="content-wrapper content-wrapper--with-bg">
         <h2 class="text-center  mb-5">General Setting</h3>
         <?=form_open('setting',array('method'=>'post','novalidate'=>"novalidate",'enctype' => 'multipart/form-data')); ?>
         <div class="row mt-3">
            <div class="col-lg-6 col-md-6 mb-3">
               <label for="site">Site Title: </label>
               <input type="text" class="form-control"  id="site" name="site" value="<?=$site;?>">
            </div>
            <div class="col-lg-6 col-md-6  mb-3">
               <label for="tagline">Tagline: </label>
               <input type="text" class="form-control" id="tagline" name="tagline" value="<?=$tagline;?>" >
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 mb-3">
               <label for="admin_email">Admin Email-Id: </label>
               <input type="email" class="form-control" id="admin_email" name="admin_email" value="<?=$admin_email;?>" >
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
               <label for="personal_email">Personal Email-Id: </label>
               <input type="email"  class="form-control" id="personal_email" name="personal_email" value="<?=$personal_email;?>" >
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 mb-3">
               <label for="logo">Upload Logo: </label>
               <input type="file" class="form-control" id="logo" name="logo" value="<?=$logo;?>" >
               <?php if($logo !== '') { ?>
                  <p class="fa fa-check-circle upload_success"> Logo uploaded successfully.</p>
               <?php } ?>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 mb-3">
               <label for="mail_config">Mail Configuration: </label>
               <input type="text" class="form-control" id="mail_config" name="mail_config" >
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
               <label for="time_zone">Time Zone: </label>
               <input type="text" class="form-control" id="time_zone" name="time_zone" >
            </div>
         </div>
         <div class="d-flex justify-content-center mt-3">
            <button class="btn btn-primary button-hor" name="save" type="submit">Save</button>
         </div>
         <?=form_close();?>
      </div>
   </div>
</div>
</div>
