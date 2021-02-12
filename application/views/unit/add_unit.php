<style>
    .custom-select{
        font-size:13px;
        font-weight:bold;
    }
 
</style>
<div class="content-wrapper content-wrapper--with-bg">
    <div class="top-space-hea">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrap-career">
                    <h2 class="font-weight-medium mt-5 mb-5">Add Available Units</h2>
                    <?=form_open('unit/add_unit',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
                    <?=validation_errors(); ?> 
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="label-input">Type of units: </label>
                            <input type="text" class="form-control" name="unit_type"> <br>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <label class="label-input">Unit Size: </label>
                            <input type="text" class="form-control" name="unit_size">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 mb-3">
                            <select class="custom-select d-block w-100 mt-5" name="size_measure" id="size_measure">
                                <option value="sq.ft">Square feet</option>
                                <option value="sq.yard">Square yard</option>
                                <option value="sq.m">Square meter</option> 
                                <option value="gaj">Gaj</option>    
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                            <label class="label-input">Property Unit Range: </label>
                            <input type="text" class="form-control" name="unit_range"> <br>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                            <label class="label-input">Remarks: </label>
                            <input type="text" class="form-control" name="unit_remark">
                        </div>
                    </div>
                    <div class="d-flex mt-2 mb-5">
                        <button class="btn  button-sub button-hor" name="unit_submit" type="submit">Submit</button>
                    </div>
                    <?=form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>

