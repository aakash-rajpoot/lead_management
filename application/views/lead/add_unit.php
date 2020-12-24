<div class="content-wrapper content-wrapper--with-bg">
    <div style="margin-top:100px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrap-career">
                    <h2 class="font-weight-medium text-center mt-5 mb-5">Add Available Units</h2>
                    <?=form_open('lead/add_unit',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
                    <?=validation_errors(); ?> 
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="unit_type">Type of units: </label>
                            <input type="text" class="form-control" name="unit_type"> <br>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="unit_size">Unit Size: </label>
                            <input type="text" class="form-control" name="unit_size"> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="rate">Property Unit Range: </label>
                            <input type="text" class="form-control" name="rate"> <br>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-input" for="remarks">Remarks: </label>
                            <input type="text" class="form-control" name="remarks"> <br>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button class="btn btn-primary button-hor" name="unit_submit" type="submit">Submit</button>
                    </div>
                    <?=form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
