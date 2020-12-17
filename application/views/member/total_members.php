<div class="row">
<div class="col-lg-9">
<div id="table1" class="ex2">
    <div class="content-wrapper content-wrapper--with-bg">
        <div class="container">
            <div class="mt-5 ex1" style="margin-top:110px;">
                <table id="dt-all-checkbox" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="th-sm">Full Name</th>
                            <th class="th-sm">Email Id</th>
                            <th class="th-sm">Phone Number</th>
                            <!-- <th class="th-sm">Alternate Phone Number</th> -->
                            <th class="th-sm">Gender</th>
                            <!-- <th class="th-sm">Birth Date</th> -->
                            <th class="th-sm">Role</th>
                            <th class="th-sm">Date of Joining</th>
                            <!-- <th class="th-sm">Other Information</th> -->
                            <th class="th-sm">Action</th>
                        </tr>
                    </thead>
                        <?php 
                            if ($total_member) {
                                $i = 0;
                                foreach($total_member as $totalmember) {
                                    $i++; 
                        ?>
                    <tbody class="table-bordered">
                        <tr>
                            <td><?=$i;?></td>
                            <td><a href="<?=base_url('index.php/member/agent_profile_details')?>"><?=$totalmember['name']?></a></td>
                            <td><?=$totalmember['email']?></td>
                            <td><?=$totalmember['phone']?></td>
                            <!-- <td><?//=$totalmember['alt_phone']?></td> -->
                            <td><?=$totalmember['gender']?></td>
                            <!-- <td><?//=$totalmember['dob']?></td> -->
                            <td><?=$totalmember['role']?></td>
                            <td><?=$totalmember['joining_date']?></td>
                            <!-- <td><?//=$totalmember['other_info']?></td> -->
                            <td class="edit-icon">
                                <a href="<?=base_url('index.php/member/update_member/'.$totalmember['id'])?>"  class="fa fa-pencil-square-o" title="Edit" data-toggle="modal" aria-hidden="true"></a>&nbsp
                                <a href="#" onClick = "softDelete(<?=$totalmember['id'];?>);" name="delete" data-href="<?php echo base_url();?>index.php/member/delete_member_soft_data/<?=$totalmember['id'];?>" title="Soft delete" id="delete-<?=$i?>" class="fa fa-trash soft-recode" aria-hidden="true"></a>
                                <!-- <a href="#" onClick = "hardDelete(<?//=$totalmember['id'];?>);" name="delete" data-href="<?php echo base_url();?>index.php/member/delete_member_hard_data/<?//=$totalmember['id'];?>" title="Hard delete" id="delete-<?//=$i?>" class="fa fa-trash hard-recode" aria-hidden="true"></a> -->
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#dt-all-checkbox').dataTable({

            columnDefs: [{
                orderable: false,
                className: 'select-checkbox select-checkbox-all',
                targets: 0
            }],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            }
        });
    });

    function softDelete(memberId) {
        if(confirm('Are you sure to remove this record ?')) {
            window.location.replace('<?php echo base_url();?>index.php/member/delete_member_soft_data/'+memberId);
        }
    }

    // function hardDelete(memberId) {
    //     if(confirm('Are you sure to delete permanentaly from records ?')) {
    //         window.location.replace('<?//=base_url();?>index.php/member/delete_member_hard_data/'+memberId);
    //     }
    // }
</script>

