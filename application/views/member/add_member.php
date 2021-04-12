<div class="row">
    <div class="col-lg-12">
        <div class="content-wrapper content-wrapper--with-bg">
            <div class="wrap-career top-space-hea">
                <h2 class="font-weight-medium mt-2 mb-5">Add New Agent</h2>
                <?=form_open('member/add_member',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation','enctype' => 'multipart/form-data')); ?>
                    <?=validation_errors(); ?>     
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="name">First Name: <span class="text-danger font-weight-medium">*</span></label>
                            <input type="text" class="form-control" name="fname" id="fname" value="<?=isset($_POST['fname']) ? $_POST['fname'] :''?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="lname">Last Name: <span class="text-danger font-weight-medium">*</span></label>
                            <input type="text" class="form-control" name="lname" id="lname" value="<?=isset($_POST['lname']) ? $_POST['lname'] :''?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="email">Email-Id: <span class="text-danger font-weight-medium">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" value="<?=isset($_POST['email']) ? $_POST['email'] :''?>">
                        </div> 
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="phone">Phone: <span class="text-danger font-weight-medium">*</span></label>
                            <input type="text" class="form-control" name="phone" id="phone" value="<?=isset($_POST['phone']) ? $_POST['phone'] :''?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="password">Password: <span class="text-danger font-weight-medium">*</span></label>
                            <input type="password" class="form-control" name="password" id="password" value="<?=isset($_POST['password']) ? $_POST['password'] :''?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="alt_phone">Alternate Phone Number:</label>
                            <input type="text" class="form-control" name="alt_phone" id="alt_phone" value="<?=isset($_POST['alt_phone']) ? $_POST['alt_phone'] :''?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="dob">Birth Date: <span class="text-danger font-weight-medium" >*</span></label>
                            <div  class="input-group date datepicker dob" data-format="dd/mm/yyyy">
                                <input type="text" class="form-control" rows="3" name="dob" id="dob" value="<?=$dob;?>" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="gender">Gender: </label>                           
                            <select class="custom-select d-block w-100 form-control" name="gender" id="gender">
                                <option value="">Select gender</option>
                                <option <?php if(isset($_POST['gender']) && trim(strtolower($_POST['gender'])) === trim(strtolower("Male"))){ echo 'Selected'; } ?>>Male</option>
                                <option <?php if(isset($_POST['gender']) && trim(strtolower($_POST['gender'])) === trim(strtolower("Female"))){ echo 'Selected'; } ?>>Female</option>
                                <option <?php if(isset($_POST['gender']) && trim(strtolower($_POST['gender'])) === trim(strtolower("Other"))){ echo 'Selected'; } ?>>Other</option>    
                            </select>
                        </div> 
                        <div class="col-md-3 mb-3">
                            <label class="label-input">User Role: <span class="text-danger font-weight-medium">*</span></label>
                            <div class="form-group">
                                <select name="role" class="form-control">
                                <option value="">Select role</option>
                                    <?php foreach($roles as $role ) { ?>
                                        <option value="<?=$role['role_id']?>" class="form-control" ><?=$role['role'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-input">Reporting Manager: <span class="text-danger font-weight-medium">*</span></label>
                            <div class="form-group">
                                <select name="manager" class="form-control">
                                <option value="">Select Manager</option>
                                    <?php  
                                        foreach($managers as $manager) {?>
                                            <option value="<?=$manager['id'];?>" <?php if(isset($_POST['manager']) && $_POST['manager']==$manager['id']){ echo "selected";}?>><?=$manager['fname'];?> <?=$manager['lname'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="joining_date">Date of Joining: </label>
                            <div  class="input-group date datepicker joining_date">
                                <input type="text" class="form-control" name="joining_date" id="joining_date" value="<?=$joining_date;?>">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="pan">Pan Card: <span class="text-danger font-weight-medium">*</span></label>
                            <input type="file" class="form-control" name="pan" id="pan">
                            <p class="upload_warning"> * Only pdf format is allowed.</p>
                        </div> 
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="aadhar">ID Proof (Aadhar Card / Voter ID Card / Driving license): <span class="text-danger font-weight-medium">*</span></label>
                            <input type="file" class="form-control" name="aadhar" id="aadhar">
                            <p class="upload_warning"> * Only pdf format is allowed. Any of one from list</p>
                        </div> 
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="permanent">Permanent Address: <span class="text-danger font-weight-medium">*</span></label>
                            <textarea class="form-control" cols = "50" name="permanent" id="permanent"><?=isset($_POST['permanent']) ? $_POST['permanent'] :''?></textarea>
                        </div>
                    
                        <div class="col-md-3 mb-3">
                            <label class="label-input" for="correspondence">Correspondence Address:</label>
                            <textarea class="form-control" cols = "50" name="correspondence" id="correspondence"><?=isset($_POST['correspondence']) ? $_POST['correspondence'] :''?></textarea>
                        </div> 
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
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        endDate: '+0d',
        autoclose: true
    });
    $("#dob").datepicker({ dateFormat: 'dd-mm-yy' });
    $("#joining_date").datepicker({ dateFormat: 'dd-mm-yy' });
    
    $('.input-group.date.joining_date .glyphicon-calendar').click(function(){
        $("#joining_date").datepicker().focus();
    });
    $('.input-group.date.dob .glyphicon-calendar').click(function(){
        $("#dob").datepicker().focus();
    });
});

</script>