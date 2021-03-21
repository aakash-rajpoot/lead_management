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
                    <div class="col-md-6 mb-3">
                        <div class=" form-control">
                            <label class="label-input">Name: </label>&nbsp;&nbsp;&nbsp; <?=$fname;?>&nbsp; <?=$lname;?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class=" form-control">
                            <label class="label-input">Email Id: </label>&nbsp;&nbsp;&nbsp; <?=$email;?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class=" form-control">
                            <label class="label-input">Phone: </label>&nbsp;&nbsp;&nbsp; <?=$phone;?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class=" form-control">
                            <label class="label-input">Alternate Phone Number:</label>&nbsp;&nbsp;&nbsp; <?=$alt_phone;?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class=" form-control">
                            <label class="label-input">Birth Date: </label>&nbsp;&nbsp;&nbsp; <?=$dob;?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class=" form-control">
                            <label class="label-input">Gender: </label>&nbsp;&nbsp;&nbsp; <?=$gender;?>
                        </div>   
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class=" form-control  address-box">
                            <label class="label-input">Permanent Address:</label>&nbsp;&nbsp;&nbsp; <?=$permanent;?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class=" form-control address-box">
                            <label class="label-input">Correspondence Address:</label>&nbsp;&nbsp;&nbsp; <?=$correspondence;?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 ">
                        <div class=" form-control">
                            <label class="label-input">Aadhar Card:</label>&nbsp;&nbsp;&nbsp;
                            <a href="<?=base_url();?>media/aadhar/<?=$aadhar;?>" target="_blank"><?=$aadhar;?></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class=" form-control">
                            <label class="label-input">Pan Card:</label>&nbsp;&nbsp;&nbsp;
                            <a href="<?=base_url();?>media/pan/<?=$pan;?>" target="_blank"><?=$pan;?></a>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6 mb-3">
                        <div class=" form-control">
                            <label class="label-input">Date of Joining: </label>&nbsp;&nbsp;&nbsp; <?=$joining_date;?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <?php $user = $this->session->get_userdata();
    //print_r($user);
    if($user['role']!=='1'){?>
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
    <?php }?>
</div>