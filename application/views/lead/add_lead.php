<div class="container">
    <div class="wrap-career " style="margin-top:110px;margin-left:120px;">
        <h2 class="font-weight-medium text-center mt-2 mb-5">Add New Lead</h2>
        <?=form_open('lead/add_lead',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
        <?=validation_errors(); ?> 
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="name">Lead Name: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="name" id="name">
                    <div class="invalid-feedback">
                        Valid Full Name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="email">Email Id: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="email" class="form-control" name="email" id="email">
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="phone">Phone: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="tel" class="form-control" name="phone" id="phone">
                    <div class="invalid-feedback">
                        Valid phone number is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="alt_phone">Alternate Phone Number: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="alt_phone" id="alt_phone">
                    <div class="invalid-feedback">
                        Valid Alternate Phone Number is required.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="property_address">Property of address: <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" rows="3" name="property_address" id="property_address"></textarea>
                    <div class="invalid-feedback">
                        Valid Property of address is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="client_address">Client Address: <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" rows="3" name="client_address" id="client_address"></textarea>
                    <div class="invalid-feedback">
                        Please enter a valid Client Address.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="other_info">Any Other Information: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="email" class="form-control" name="other_info" id="other_info">
                    <div class="invalid-feedback">
                        Please enter a valid Other Information.
                    </div>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="role">Role: </label>
                    <select class="custom-select d-block w-100" name="role" id="role">
                        <option>---Select---</option>
                        <option value="Supervisors">Supervisors</option>
                        <option value="Manager">Manager</option>
                        <option value="Team Leader">Team Leader</option>
                        <option value="Department Head">Department Head</option>
                        <option value="Advisors">Advisors</option>
                        <option value="Sales">Sales</option>      
                    </select>
                    <div class="invalid-feedback">
                        Please provide a valid role.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="remark">Remarks: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="remark" id="remark">
                    <div class="invalid-feedback">
                        Valid name is remark.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="reference">Reference by – only for sales team: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="email" class="form-control" name="reference" id="reference">
                    <div class="invalid-feedback">
                        Please enter a valid reference by.
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button class="btn btn-primary btn-lg" name="lead_submit" type="submit">Submit</button>
            </div>
        <?=form_close();?>
    </div>
</div>