
<div class="content-wrapper content-wrapper--with-bg">
<div class="container">
<div class="row">
<div class="col-lg-12">
    <div class="wrap-career " style="margin-top:110px;">

        <h2 class="font-weight-medium text-center mt-2 mb-5">Add New Lead</h2>
        <?=form_open('lead/add_lead',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
        <?=validation_errors(); ?> 
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="name">Lead Name: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="email">Email Id: </label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="phone">Phone: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="tel" class="form-control" name="phone" id="phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="alt_phone">Alternate Phone Number:</label>
                    <input type="text" class="form-control" name="alt_phone" id="alt_phone">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="property_address">Property of address: <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" rows="3" name="property_address" id="property_address"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="client_address">Client Address: <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" rows="3" name="client_address" id="client_address"></textarea>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="other_info">Any Other Information: </label>
                    <input type="email" class="form-control" name="other_info" id="other_info">
                </div>
            
                
            </div> -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="remark">Remark:</label>
                    <textarea type="text" row="3" class="form-control" name="remark" id="remark"> </textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="reference">Reference By:</label>
                    <input type="text" class="form-control" name="reference" id="reference">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button class="btn btn-primary button-hor" name="lead_submit" type="submit">Submit</button>
            </div>
        <?=form_close();?>
    </div>
</div>
</div>
</div>
</div>