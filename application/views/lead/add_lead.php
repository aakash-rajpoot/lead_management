<style>
#checkboxes label{
    padding-right:30px;
}
</style>


<div class="row">
<div class="col-lg-12">
<div class="content-wrapper content-wrapper--with-bg">
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
                    <label class="label-input" for="property_address">Project Name: <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" rows="3" name="property_address" id="property_address"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="label-input" for="client_address">Client Address: <span class="text-danger font-weight-medium">*</span></label>
                    <textarea class="form-control" rows="3" name="client_address" id="client_address"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="label-input">Type of units: </label>
                    <div id="checkboxes">
                        <label for="1rk">
                            <input type="checkbox" name="unit[]" class="form-control" id="1rk" />1RK</label>
                        <label for="1bhk">
                            <input type="checkbox" name="unit[]" class="form-control" id="1bhk" />1BHK</label>
                        <label for="2bhk">
                            <input type="checkbox" name="unit[]" class="form-control" id="2bhk" />2BHK</label>
                        <label for="3bhk">
                            <input type="checkbox" name="unit[]" class="form-control" id="3bhk" />3BHK</label>
                        <label for="4bhk">
                            <input type="checkbox" name="unit[]" class="form-control" id="4bhk" />4BHK</label>
                        <label for="p_house">
                            <input type="checkbox" name="unit[]" class="form-control" id="p_house" />P.House</label>
                        <label for="villa">
                            <input type="checkbox" name="unit[]" class="form-control" id="villa" />Villa</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                <label class="label-input">Type of units: </label>
                <div class="form-group">
			<select id="checkbox"  multiple >						    
				<option value="php" class="form-control" id="1rk" name="unit[]">1RK</option>
				<option value="python" class="form-control" id="1rk" name="unit[]">1BHK</option>		
				<option value="javascript" class="form-control" id="2bhk" name="unit[]">2BHK</option>
				<option value="java" class="form-control" id="3bhk" name="unit[]">3BHK</option>
				<option value="c" class="form-control" id="4bhk" name="unit[]">4BHK</option>	
                <option value="java" class="form-control" id="p_house" name="unit[]">P.House</option>
				<option value="c" class="form-control" id="4bhk" name="unit[]">Villa</option>				
			</select>	
		</div>	
                </div>
            </div>

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

