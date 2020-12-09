<div class="container">
    <div class="wrap-career " style="margin-top:110px;margin-left:50px;">
        <h2 class="font-weight-medium text-center mt-2 mb-5">Add New Member Details</h2>
        <?php echo form_open('member/add_member',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
        <?php echo validation_errors(); ?> 
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="name">Full Name <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="name" id="name">
                    <div class="invalid-feedback">
                        Valid Full Name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="email">Email <span class="text-danger font-weight-medium">*</span></label>
                    <input type="email" class="form-control" name="email" id="email">
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="phone">Phone <span class="text-danger font-weight-medium">*</span></label>
                    <input type="tel" class="form-control" name="phone" id="phone">
                    <div class="invalid-feedback">
                        Valid phone number is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="alt_phone">Alternate Phone Number <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="alt_phone" id="alt_phone">
                    <div class="invalid-feedback">
                        Valid Alternate Phone Number is required.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="dob">Birth Date <span class="text-danger font-weight-medium">*</span></label>
                    <input type="date" class="form-control" rows="3" name="dob" id="dob"/>
                    <div class="invalid-feedback">
                        Valid Gender is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="gender">Gender</label>
                    <select class="custom-select d-block w-100" name="gender" id="gender">
                        <option>---Select---</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>    
                    </select>
                    <div class="invalid-feedback">
                        Please provide a valid gender.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="other_info">Any Other Information<span class="text-danger font-weight-medium">*</span></label>
                    <input type="email" class="form-control" name="other_info" id="other_info">
                    <div class="invalid-feedback">
                        Please enter a valid Other Information.
                    </div>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="role">Role</label>
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
                    <label class="label-input" for="joining_date">Date of Joining<span class="text-danger font-weight-medium">*</span></label>
                    <input type="date" class="form-control" name="joining_date" id="joining_date">
                    <div class="invalid-feedback">
                        Valid name is Date of Joining.
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button class="btn btn-primary" name="member_submit" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
