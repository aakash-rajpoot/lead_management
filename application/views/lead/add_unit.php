<div class="content-wrapper content-wrapper--with-bg">
    <div class="wrap-career">
        <h2 class="font-weight-medium text-center mt-5 mb-5">Add Available Units</h2>
        <?=form_open('lead/add_unit',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
        <?=validation_errors(); ?> 
        <div class="row">
            <div class="col-md-4 mb-3 ml-5">
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
            <div class="col-md-2 mb-3">
                <label class="label-input" for="unit_size">Unit Size: </label>
                <input type="text" class="form-control" name="unit_size">
                <div id="newElementId"></div>
            </div>
            <div class="justify-content-center ml-3" id="dynamicCheck">
                <button class="btn btn-success" onclick="createNewElement();" name="add" type="button">Add</button>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <button class="btn btn-primary button-hor" name="unit_submit" type="submit">Submit</button>
        </div>
        <?=form_close();?>
    </div>
</div>
<script type="text/JavaScript">
    function createNewElement() {
	    var txtNewInputBox = document.createElement('div');
	    txtNewInputBox.innerHTML = "<input type='text' class='form-control'>";
	    document.getElementById("newElementId").appendChild(txtNewInputBox);
    }
</script>