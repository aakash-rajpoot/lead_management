
<div class="row">
<div class="col-lg-9">
<div class="content-wrapper content-wrapper--with-bg">
<div style=" margin-top:150px;">
    <?=form_open('lead/assign_lead',array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
    <?=validation_errors(); ?> 
   <div class="row">
    <div class="col-lg-12 mb-3">
        <label class="label-input" for="lead_name">Lead Name: </label>
        <input type="text" class="form-control" name="lead_name" id="lead_name">
    </div>
    </div>
    <div class="row">
    <div class="col-lg-12 mb-3">
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
    </div>
    
<?=form_close();?>
</div>
</div>
</div>
</div>