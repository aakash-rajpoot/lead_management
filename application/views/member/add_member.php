<div class="row">
<div class="col-lg-12">
<div class="content-wrapper content-wrapper--with-bg">

    <div class="wrap-career top-space-hea">
        <h2 class="font-weight-medium mt-2 mb-5">Add New Agent</h2>
        <?=form_open('member/add_member',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation','enctype' => 'multipart/form-data')); ?>
            <?=validation_errors(); ?>     
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="name">Agent Name: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="email">Email-Id: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="phone">Phone: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="alt_phone">Alternate Phone Number:</label>
                    <input type="text" data-date-format="dd-mm-yyyy" class="form-control" name="alt_phone" id="alt_phone">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="dob">Birth Date: <span class="text-danger font-weight-medium" >*</span></label>
                    <div class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                        <input type="text" class="form-control"  placeholder="dd-mm-yy" name="dob" id="dob" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
               </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="gender">Gender: </label>
                    <select class="custom-select d-block w-100 gender-custom form-control" name="gender" id="gender">
                        <option value=""> Select Gender </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="permanent">Permanent Address: <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" cols = "50" name="permanent" id="permanent"></textarea>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="correspondence">Correspondence Address:</label>
                    <textarea class="form-control" cols = "50" name="correspondence" id="correspondence"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="aadhar">Aadhar Card: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="file" class="form-control" name="aadhar" id="aadhar">
                    <p class="upload_warning"> * Only pdf format is allowed.</p>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="pan">Pan Card: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="file" class="form-control" name="pan" id="pan">
                    <p class="upload_warning"> * Only pdf format is allowed.</p>
                </div>
            </div>
            <div class="row">                
                <div class="col-md-6 mb-3">
                    <label class="label-input " for="joining_date">Date of Joining: </label>
                    <div  class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                        <input type="text" class="form-control" name="joining_date" id="joining_date" placeholder="dd-mm-yy">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input">User Role: <span class="text-danger font-weight-medium">*</span></label>
                    <div class="form-group">
                        <select name="role" class="form-control">
                            <?php foreach($roles as $role ) { ?>
                                <option value="<?=$role['role_id']?>" class="form-control"><?=$role['role'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row ml-2 ">
                <input type="checkbox" name="approval" value="1">
                <label for="approval">&nbsp; Give permission to add own team.</label><br>
            </div>
            <div class="d-flex  mt-5 mb-5">
                <button class="btn button-hor btn-success" name="member_submit" type="submit">Submit</button>
            </div>
        <?=form_close();?>
    </div>
</div>
</div>
</div>
<script>
$(function () {
  $(".datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

</script>