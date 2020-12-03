<div class="container">
            <div class="wrap-career " style="margin-top:110px">
                <h2 class="font-weight-medium text-center mt-2 mb-5">Add New Member</h2>
                <form class="needs-validation" method="post" action="enquiry.php" novalidate="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="name">Name <span class="text-danger font-weight-medium">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="" required="">
                            <div class="invalid-feedback">
                                Valid name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="email">Email <span class="text-danger font-weight-medium">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="mobile">Phone <span class="text-danger font-weight-medium">*</span></label>
                            <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Phone Number" value="" required="">
                            <div class="invalid-feedback">
                                Valid phone number is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="qualification">Contact Number <span class="text-danger font-weight-medium">*</span></label>
                            <input type="text" class="form-control" name="qualification" id="qualification" placeholder="Degree" value="" required="">
                            <div class="invalid-feedback">
                                Valid Qualification is required.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="name">Property of address <span class="text-danger font-weight-medium">*</span></label>
                            <textarea class="form-control" rows="3" name="message" id="message" placeholder="Please fill" required></textarea>
                            <div class="invalid-feedback">
                                Valid name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="email">Client Address <span class="text-danger font-weight-medium">*</span></label>
                            <textarea class="form-control" rows="3" name="message" id="message" placeholder="Please fill" required></textarea>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <label class="label-input" for="email">Any Other Information<span class="text-danger font-weight-medium">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>
                    
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="state">Role</label>
                            <select class="custom-select d-block w-100" name="state" id="state" required="">
                                <option value="" >-Choose-</option>
                                <option value="" title="">Supervisors</option>
                                <option value="" title="">Manager</option>
                                <option value="" title="">Team Leader</option>
                                <option value="" title="">Department Heads</option>
                                <option value="" title="">Advisors</option>
                                <option value="" title="">California</option>
                                <option value="" title="">Colorado</option>
                                <option value="" title="">Connecticut</option>
                                <option value="" title="">Delaware</option>
                              
                      </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <label class="label-input" for="name">Remarks<span class="text-danger font-weight-medium">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="" required="">
                            <div class="invalid-feedback">
                                Valid name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="email">Refenceby – only for sales team <span class="text-danger font-weight-medium">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
