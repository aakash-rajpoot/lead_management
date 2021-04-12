<div class="row">
<div class="col-lg-12">
    <div class="content-wrapper content-wrapper--with-bg">
        <div class="wrap-career">
            <h2 class="p-1">Lead Details</h2><hr>
                <div class="row py-3">
                    <div class="col-md-3 mb-3"> 
                        <label class="label-input" for="name">Lead Name: </label> <span><?=$data['name'];?> </span>
                    </div>
                    <div class="col-md-3 mb-3"> 
                        <label class="label-input" for="email">Email Id: </label> <span><a href="mailto:<?=$data['email'];?>"><?=$data['email'];?></a>  </span>                      
                    </div> 
                    <div class="col-md-3 mb-3">
                        <label class="label-input" for="phone">Phone: </label> <span><a href="callto:<?=$data['phone'];?>"><?=$data['phone'];?></a> </span>
                    </div>
                    <div class="col-md-3 mb-3"> 
                        <label class="label-input" for="alt_phone">Alternate Phone Number: </label> <span><?=$data['alt_phone']?$data['alt_phone']:' --NA-- '; ?> </span>
                    </div> 
                    <div class="col-md-3 mb-3"> 
                        <label class="label-input" for="property_address">Project Name: </label> <span><?=$data['property_address'];?> </span>
                    </div>
                    <div class="col-md-3 mb-3"> 
                        <label class="label-input" for="client_address">Client Address: </label> <span><?=$data['client_address'];?> </span>
                    </div> 
                    <div class="col-md-3 mb-3"> 
                        <label class="label-input">Available units: </label>                         
                        <?php $i=0;  foreach($units as $unit){ $i++?>
                            <span><?=$unit['unit_type'].'('.$unit['unit_size'].') ';?></span>
                        <?php if($i<count($units)){ echo ", ";} }?>
                    </div> 
                    <div class="col-md-3 mb-3"> 
                        <label class="label-input" for="reference">Lead Source By: </label> <span><?=$data['source_name'];?> </span>
                    </div> 
                </div>
                <h3 class="p-0">Lead History</h3><hr class="my-3">
                <div class="row">
                    <div class="col-md-12 mb-3">
                    <table id="dt-all-checkbox" class="table table-bordered">
                        <thead>
                            <tr> 
                                <th class="th-sm">Date & Time</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">Updated By</th>
                                <th class="th-sm">Activity type</th>
                                <th class="th-sm">Transferred to</th>
                                <th class="th-sm">Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  
                        $i = 1;
                        foreach($lead_history as $history) {?>
                            <tr>
                                <td><?=$history['activity_date'];?></td>
                                <td><?=$history['status_name'];?></td>
                                <td><?=$history['fname'];?> <?=$history['lname'];?></td>
                                <td><?=$history['activity_type'];?></td>
                                <td><?=$history['transfer_user_id']!=0?$history['ffname'].' '.$history['llname']:'--';?></td>
                                <td><?=$history['activity_comment'];?></td>
                            </tr>
                        <?php $i++; }?>
                        </tbody>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3"> 
                        <label class="label-input" for="remark">Lead Status: </label> <span><?=$data['status']?'Active':'Deleted';?> </span>   <br> 
                        <label class="label-input" for="assign_date">Follow-up Status: </label> <span><?=$data['status_name'];?> </span><br>
                        <label class="label-input" for="assign_date">Assigned To : </label> <a  href="<?=base_url('index.php/member/profile_details/'.$data['assign_to']);?>" ><span><?=$data['fname'];?> <?=$data['lname'];?> </span></a><br>                       
                        <label class="label-input" for="assign_date">Created Date: </label> <span><?=isset($data['lead_date']) ? date("m-d-Y", strtotime($data['lead_date'])) :''?>  </span>                                               
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="label-input" for="assign_date">Assigned Date: </label> <span><?=isset($data['assign_date']) ? date("m-d-Y", strtotime($data['assign_date'])) :''?>  </span> <br>
                        <label class="label-input" for="remark">Last update: </label> <span><?=isset($data['last_update']) ? date("m-d-Y", strtotime($data['last_update'])) :''?> </span> <br>
                        <label class="label-input" for="remark">Last Remark: </label> <span><?=$data['remark'];?> </span>
                    </div>
                </div>
                <h4 class="p-0">Update Lead : </h4>
                <hr class="my-3">
                <?=form_open(null, array('method'=>'post')); ?>
                <?=validation_errors(); ?>
                    <div class="row">
                        <div class="col-md-3 mb-3 top-data">
                            <label class="label-input" for="followup_date">Follow-up Date: <span class="text-danger font-weight-medium">*</span></label>
                            <div class="input-group date datepicker followup_date" data-date-format="m-d-Y">
                                <input type="text" class="form-control" value="<?=isset($data['followup_date']) ? date("m-d-Y", strtotime($data['followup_date'])) :''?>" name="followup_date" id="followup_date" placeholder="Follow-up Date">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 top-data">
                            <label class="label-input" for="status">Change Status: <span class="text-danger font-weight-medium">*</span></label>
                            <select  class="form-control" name="status" id="status">
                                <option value="">Change Status</option>
                                <?php foreach($lead_statuses as $status ) { ?>
                                    <?php if($status['id']!=5){?>
                                        <option <?=$data['status'] ==  $status['id']? 'selected' :''?>  value="<?=$status['id']?>" class="form-control"><?=$status['status_name']; ?></option>
                                    <?php }?>                                    
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-3">
                            <label class="label-input" for="remark">Remarks:</label>
                            <textarea class="form-control" rows="3" name="remark" id="remark"></textarea>
                        </div>   
                        <div class="col-md-2  mt-3 mb-5">
                            <button class="btn  button-hor btn-success" name="lead_update" type="submit">Save</button>
                        </div>
                    </div>
                <?=form_close();?> 
            </div>
        </div>
    </div>
</div>
</div>

<script>
$(document).ready(function() {
    var date = new Date();
    date.setDate(date.getDate()-1);
    $("#followup_date").datepicker({  startDate: date, dateFormat: 'dd-mm-yy' });
    $('.input-group.date.followup_date .glyphicon-calendar').click(function(){
        $("#followup_date").datepicker().focus();
    });
});
</script>
