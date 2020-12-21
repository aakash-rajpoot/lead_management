
<div class="row">
<div class="col-lg-12">
<div class="content-wrapper content-wrapper--with-bg"> 
    <div class="wrap-career " style="margin-top:110px;">
        <h2 class="font-weight-medium text-center mt-2 mb-5">Update Member Details</h2>
        <?php echo form_open('lead/update_lead/'.$id,array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
        <?php echo validation_errors(); ?> 
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="name">Lead Name: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="<?=$name; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="email">Email: </label>
                    <input type="email" class="form-control" name="email" id="email" value="<?=$email; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="phone">Phone: <span class="text-danger font-weight-medium">*</span></label>
                    <input type="tel" class="form-control" name="phone" id="phone" value="<?=$phone; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="alt_phone">Alternate Phone Number: </label>
                    <input type="text" class="form-control" name="alt_phone" id="alt_phone" value="<?=$alt_phone; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="property_address">Property of address: <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" rows="3" name="property_address" id="property_address"><?=$property_address;?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="client_address">Client Address: <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" rows="3" name="client_address" id="client_address" ><?=$client_address;?></textarea>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="remark">Remark: </label>
                    <textarea type="text" row="2" class="form-control" name="remark" id="remark"><?=$remark;?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="reference">Reference by – only for sales team: </label>
                    <input type="email" class="form-control" name="reference" id="reference" value="<?=$reference;?>">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button class="btn btn-primary button-hor" name="lead_update" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>