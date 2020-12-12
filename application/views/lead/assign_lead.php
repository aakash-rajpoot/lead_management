<div style="margin-left:200px; margin-top:150px;">

    <?=form_open('lead/assign_lead/',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
    <?=validation_errors(); ?> 
    <?php if(!empty($rename)) { ?>
        <?php 
        foreach($rename as $renames ) { ?>
        <div class="col-md-8 mb-3">
            <label class="label-input" for="lead_name">Lead Name: </label>
            <input class="custom-select d-block w-100" name="lead_name" id="lead_name" value="<?=$renames['name'];?>" readonly>
        </div>
        <?php } ?>
    <?php } else { ?>
    <div class="col-md-8 mb-3">
        <label class="label-input" for="lead_name">Lead Name: </label>
        <select class="custom-select d-block w-100" name="lead_name" id="lead_name">
            <option>---Select---</option>
        <?php 
        foreach($names as $name ) { ?>
            <option ><?=$name['name']; ?></option>
        <?php } ?>
        </select>
        <!-- <div class="invalid-feedback">
            Valid name is remark.
        </div> -->
    </div>
    <?php } ?>
    <div class="col-md-8 mb-3">
        <label class="label-input" for="assign_lead">Lead Assign: </label>
        <select class="custom-select d-block w-100" name="assign_lead" id="assign_lead">
            <option>---Select---</option>

        <?php 
        foreach($leads as $lead ) { ?>
            <option ><?=$lead['name'].' ('.$lead['role'].')'; ?></option>
        <?php } ?>
        </select>
        <!-- <div class="invalid-feedback">
            Please provide a valid role.
        </div> -->
        
    </div>
    <div class="d-flex justify-content-center mt-5 col-md-8 mb-3">
        <button class="btn btn-primary btn-lg" name="lead_assign" type="submit">Assign</button>
    </div>

    
<?=form_close();?>
</div>