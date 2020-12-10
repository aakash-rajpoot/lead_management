<div class="container">
    <div class="wrap-career " style="margin-top:110px;margin-left:120px;">
        <h2 class="font-weight-medium text-center mt-2 mb-5">Update Member Details</h2>
        <?php echo form_open('lead/update_lead/'.$id,array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
        <?php echo validation_errors(); ?> 
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="name">Full Name <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="<?=$name; ?>">
                    <div class="invalid-feedback">
                        Valid Full Name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="email">Email <span class="text-danger font-weight-medium">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" value="<?=$email; ?>">
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="phone">Phone <span class="text-danger font-weight-medium">*</span></label>
                    <input type="tel" class="form-control" name="phone" id="phone" value="<?=$phone; ?>">
                    <div class="invalid-feedback">
                        Valid phone number is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="alt_phone">Alternate Phone Number <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="alt_phone" id="alt_phone" value="<?=$alt_phone; ?>">
                    <div class="invalid-feedback">
                        Valid Alternate Phone Number is required.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="property_address">Property of address <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" rows="3" name="property_address" id="property_address"><?=$property_address;?></textarea>
                    <div class="invalid-feedback">
                        Valid Property of address is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="client_address">Client Address <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" rows="3" name="client_address" id="client_address" ><?=$client_address;?></textarea>
                    <div class="invalid-feedback">
                        Please enter a valid Client Address.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="other_info">Any Other Information<span class="text-danger font-weight-medium">*</span></label>
                    <input type="email" class="form-control" name="other_info" id="other_info" value="<?=$other_info; ?>">
                    <div class="invalid-feedback">
                        Please enter a valid Other Information.
                    </div>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="role">Role</label>
                    <select class="custom-select d-block w-100" name="role" id="role">
                        <option>---Select---</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Supervisors"))){ echo 'Selected'; } ?>>Supervisors</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Manager"))){ echo 'Selected'; } ?>>Manager</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Team Leader"))){ echo 'Selected'; } ?>>Team Leader</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Department Head"))){ echo 'Selected'; } ?>>Department Head</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Advisors"))){ echo 'Selected'; } ?>>Advisors</option>
                        <option <?php if(trim(strtolower($role)) === trim(strtolower("Sales"))){ echo 'Selected'; } ?>>Sales</option>      
                    </select>
                    <div class="invalid-feedback">
                        Please provide a valid role.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="remark">Remarks<span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="remark" id="remark" value="<?=$remark;?>">
                    <div class="invalid-feedback">
                        Valid name is remark.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="reference">Reference by – only for sales team <span class="text-danger font-weight-medium">*</span></label>
                    <input type="email" class="form-control" name="reference" id="reference" value="<?=$reference;?>">
                    <div class="invalid-feedback">
                        Please enter a valid reference by.
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button class="btn btn-primary" name="lead_update" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
