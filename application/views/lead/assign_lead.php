<div class="row">
    <div class="col-lg-12">
    <div class="content-wrapper content-wrapper--with-bg">
        <div class="wrap-career  top-space-hea">
            <?php if(!empty($lead)){  
                ?>
                <?=form_open('lead/assign_lead/'.$lead['id'],array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation')); ?>
                <?=validation_errors(); ?> 
                <div class="row"> 
                    <div class="col-md-3 mb-3">
                        <label class="label-input" for="lead_name">Lead Name: </label>
                        <input class="form-control" name="lead_name" id="lead_name" value="<?=$lead['name'];?>" readonly>
                        <input type="hidden" class="form-control" name="lead_email" id="lead_email" value="<?=$lead['email'];?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="label-input" for="current_assign_name">Assigned to: </label>
                        <input class="form-control" name="current_assign_name" id="current_assign_name" value="<?=$lead['fname'];?> <?=$lead['lname'];?>" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="label-input" for="assign_lead">Lead Assign: </label>
                        <select class="custom-select d-block  form-control" name="assign_lead" id="assign_lead">
                            <option>---Select---</option>
                            <?php if(!empty($members)){
                                foreach($members as $member) { ?>
                                    <option <?php if($member['id']==$lead['assign_to']){ echo 'selected';}?> value="<?=$member['id']?>"> <?=$member['fname'].' '.$member['fname'].' ['.$member['email'].']'?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>      
                    </div>
                    <div class="col-md-3 col-lg-3 mb-3">
                        <label class="label-input" for="remark">Remarks:</label>
                        <textarea class="form-control" rows="3" name="remark" id="remark"></textarea>
                    </div>
                </div>
                <div class="row">        
                    <div class="d-flex  mt-5 mb-5 col-md-8 mb-3">
                        <button class="btn  button-hor btn-success" name="lead_assign" type="submit">Assign</button>
                    </div>
                </div>  
                <?=form_close();?>
            <?php } ?> 
            </div>
        </div>
    </div>
</div>
