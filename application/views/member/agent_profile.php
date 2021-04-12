<div class="wrap-career">
    <div class="row">
        <div class="col-md-12">
            <div class="content-wrapper content-wrapper--with-bg">                 
                    <?php if($profile_image == ''){
                        $profile_image = 'avatar.png';
                    } ?>
                    <div class="text-center">
                        <img src="<?=base_url();?>media/agent_photo/<?=$profile_image;?>" class="avatar rounded-circle profile_size img-thumbnail mb-5" alt="avatar">
                    </div>   
                    <div class="row mt-3">
                        <div class="col-md-3 mb-3">
                            <div class=" form-control">
                                <label class="label-input">Name: </label>&nbsp;&nbsp;&nbsp; <?=$fname;?>&nbsp;&nbsp; <?=$lname;?>
                            </div>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <div class=" form-control">
                                <label class="label-input">Email Id: </label>&nbsp;&nbsp;&nbsp; <?=$email;?>
                            </div>
                        </div> 
                        <div class="col-md-3 mb-3">
                            <div class=" form-control">
                                <label class="label-input">Phone: </label>&nbsp;&nbsp;&nbsp; <?=$phone;?>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class=" form-control">
                                <label class="label-input">Alternate Phone Number:</label>&nbsp;&nbsp;&nbsp; <?=$alt_phone;?>
                            </div>
                        </div> 
                        <div class="col-md-3 mb-3">
                            <div class=" form-control">
                                <label class="label-input">Birth Date: </label>&nbsp;&nbsp;&nbsp; <?=$dob;?>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class=" form-control">
                                <label class="label-input">Gender: </label>&nbsp;&nbsp;&nbsp; <?=$gender;?>
                            </div>   
                        </div> 
                        <div class="col-md-3 mb-3 ">
                            <div class=" form-control">
                                <label class="label-input">Aadhar Card:</label>&nbsp;&nbsp;&nbsp;
                                <a href="<?=base_url();?>media/aadhar/<?=$aadhar;?>" target="_blank"><?=$aadhar;?></a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class=" form-control">
                                <label class="label-input">Pan Card:</label>&nbsp;&nbsp;&nbsp;
                                <a href="<?=base_url();?>media/pan/<?=$pan;?>" target="_blank"><?=$pan;?></a>
                            </div>
                        </div> 
                        <div class="col-md-3 mb-3">
                            <div class=" form-control">
                                <label class="label-input">Date of Joining: </label>&nbsp;&nbsp;&nbsp; <?=$joining_date;?>
                            </div>
                        </div>
                        <?php if($role>=3){ ?>
                            <div class="col-md-3 mb-3">
                                <div class=" form-control">
                                    <label class="label-input">Reporting Manager :</label>&nbsp;&nbsp;&nbsp; <?=$finame.' '.$laname;?>
                                </div>
                            </div> 
                        <?php }?>
                        <div class="col-md-3 mb-3">
                            <div class=" form-control  address-box">
                                <label class="label-input">Permanent Address:</label>&nbsp;&nbsp;&nbsp; <?=$permanent;?>
                            </div>
                        </div>                        
                        <div class="col-md-3 mb-3">
                            <div class=" form-control address-box">
                                <label class="label-input">Correspondence Address:</label>&nbsp;&nbsp;&nbsp; <?=$correspondence;?>
                            </div>
                        </div> 
                    </div> 
            </div>
        </div>
    </div>
    
    <?php if($this->session->get_userdata()['role']<=2){ ?>
    <div class="row">
        <div class="col-md-12">
            <div class="content-wrapper content-wrapper--with-bg">
                <h3 class="font-weight-medium">Change Password</h2>
                <hr>
                <?=form_open('member/update_member/'.$id,array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation','enctype' => 'multipart/form-data')); ?>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="label-input" for="password">Change password: <span class="text-danger font-weight-medium">*</span></label>
                        <input type="password" class="form-control" name="password" id="password" value="<?=$password; ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="label-input">&nbsp;</label>
                        <button class="form-control btn button-hor btn-success" name="password_update" type="submit">Update</button>
                    </div>
                </div>
                <?=form_close();?>
            </div> 
        </div>
    </div>
    <?php }?>

    
    <div class="row">
        <div class="col-md-12">
            <div class="content-wrapper content-wrapper--with-bg">
                <h3 class="font-weight-medium">Assigned Leads</h2>
                <hr>
                <table id="dt-all-checkbox" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="th-sm">Status</th>
                            <th class="th-sm">Lead Name</th> 
                            <th class="th-sm">Assign Date</th>
                            <th class="th-sm">Phone Number</th>
                            <th class="th-sm">Project Name</th>
                            <th class="th-sm">Client Address</th>                            
                            <th class="th-sm">Lead Source By</th>                            
                            <th class="th-sm">Remark</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                    <?php 
                    if ($leads) {
                        $i = 0;
                        foreach($leads as $lead) {
                        $i++;
                    ?>
                        <tr>
                            <td><?=$i;?></td>
                            <td style="background-color:<?=$lead['color_code'];?>"><?=$lead['status_name']?></td>
                            <td><a href="<?=base_url('index.php/lead/view_lead/'.$lead['id'])?>"><?=$lead['name']?></a></td>                               
                            <td><?=$lead['assign_date']?></td>
                            <td><?=$lead['phone']?></td>
                            <td><?=$lead['property_address']?></td>
                            <td><?=$lead['client_address']?></td>                            
                            <td><?=$lead['source_name']?></td>                            
                            <td><?=$lead['remark']?></td>
                        </tr>                   
                        <?php } ?>                                                    
                    <?php } else{?>
                        <tr class="inactive_agent">
                            <td colspan="8">No lead assined</td>
                        <tr>
                    <?php } ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="content-wrapper content-wrapper--with-bg">
                <h3 class="font-weight-medium">Letters & Comments</h2>
                <hr>
                <table id="dt-all-checkbox" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="th-sm">Sr No. </th>
                            <th class="th-sm">Reviewer Name</th>                            
                            <th class="th-sm">Letter type</th>
                            <th class="th-sm">Letter</th>
                            <th class="th-sm">Review Date</th>
                            <th class="th-sm">Comments </th>
                        </tr>
                        <?php if ($reviews) { $i = 0; ?>
                        <tbody class="table-bordered">
                        <?php
                            foreach($reviews as $review ) { $i++;   ?>
                            <tr class="<?php if($review['letter_type']=="Warning") { echo 'inactive_agent';}else{ echo 'active_agent';}?>">
                                <td><?=$i;?></td>
                                <td><?=$review['fname'];?> <?=$review['lname'];?></td>
                                <td><?=$review['letter_type'];?></td>
                                <td><a href="<?=base_url();?>media/letters/<?=$review['letter_name'];?>" target="_blank"><?=$review['letter_name'];?></a> </td>
                                <td><?=$review['review_date'];?></td>
                                <td><?=$review['comments'];?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                        <?php }?>
                    </thead>
                </table>
            </div> 
        </div>
    </div>
    

</div>