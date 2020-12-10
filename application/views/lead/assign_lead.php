<div style="margin-left:200px; margin-top:150px;">
    <?=form_open('lead/assign_lead',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
    <?=validation_errors(); ?> 
    <div class="col-md-6 mb-3">
        <label class="label-input" for="lead_name">Lead Name: </label>
        <input type="text" class="form-control" name="lead_name" id="lead_name">
        <!-- <div class="invalid-feedback">
            Valid name is remark.
        </div> -->
    </div>

    <div class="col-md-8 mb-3">
        <label class="label-input" for="assign_lead">Lead Assign: </label>
        <select class="custom-select d-block w-100" name="assign_lead" id="assign_lead">
            <option>---Select---</option>

        <?php 
        foreach($leads as $lead ){ ?>
            <option ><?=$lead['name'].' ('.$lead['role'].')'; ?></option>
        <?php } ?>
        </select>
        <!-- <div class="invalid-feedback">
            Please provide a valid role.
        </div> -->
    </div>

    
<?=form_close();?>
</div>