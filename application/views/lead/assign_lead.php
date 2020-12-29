<div class="content-wrapper content-wrapper--with-bg">
    <div style="margin-left:375px; margin-top:150px;">
        <?php foreach($rename as $renames ) { ?>
        <?=form_open('lead/assign_lead/'.$renames['id'],array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
        <?=validation_errors(); ?> 
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-8 mb-3">
                    <label class="label-input" for="lead_name">Lead Name: </label>
                    <input class="form-control" name="lead_name" id="lead_name" value="<?=$renames['name'];?>" readonly>
                </div>
                <?php } ?>
                <div class="col-md-8 mb-3">
                    <label class="label-input" for="assign_lead">Lead Assign: </label>
                    <select class="custom-select d-block w-100" name="assign_lead" id="assign_lead">
                        <option>---Select---</option>
                        <?php foreach($leads as $lead ) { ?>
                            <option ><?=$lead['name']?></option>
                        <?php } ?>
                    </select>      
                </div>
                <div class="d-flex justify-content-center mt-5 col-md-8 mb-3">
                    <button class="btn btn-primary button-hor" name="lead_assign" type="submit">Assign</button>
                </div>
            </div>
        </div>   
        <?=form_close();?>
    </div>
</div>
