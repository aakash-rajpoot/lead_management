<div class="mt-5 ex1" style="margin-top:110px;">
    <div class="row">
     <div class="col-lg-12"> 
        <div id="table1" class="ex2">
            <div class="content-wrapper content-wrapper--with-bg">
                <table id="dt-all-checkbox" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="th-sm">Lead Name</th>
                            <th class="th-sm">Assign TO</th>
                            <!-- <th class="th-sm">Email Id</th> -->
                            <th class="th-sm">Phone Number</th>
                            <!-- <th class="th-sm">Alternate Phone Number</th> -->
                            <th class="th-sm">Project Name</th>
                            <th class="th-sm">Client Address</th>
                            <!-- <th class="th-sm">Role</th> -->
                            <th class="th-sm">Remark</th>
                            <!-- <th class="th-sm">Other Information</th> -->
                            <th class="th-sm">Lead Source By</th>
                            <th class="th-sm">Actions</th>
                            <!-- <th class="th-sm">Lead Action</th> -->
                        </tr>
                    </thead>
                        <?php 
                            if ($total_lead) {
                                $i = 0;
                                foreach($total_lead as $totallead) {
                                    $i++; 
                        ?>
                    <tbody class="table-bordered">
                        <tr>
                            <td><?=$i;?></td>
                            <td><?=$totallead['name']?></td>
                            <td><?=$totallead['assign_to']?></td>
                            <!-- <td><?//=$totallead['email']?></td> -->
                            <td><?=$totallead['phone']?></td>
                            <!-- <td><?//=$totallead['alt_phone']?></td> -->
                            <td><?=$totallead['property_address']?></td>
                            <td><?=$totallead['client_address']?></td>
                            <!-- <td><?//=$totallead['role']?></td> -->
                            <td><?=$totallead['remark']?></td>
                            <!-- <td><?//=$totallead['other_info']?></td> -->
                            <td><?=$totallead['reference']?></td>
                            <td class="edit-icon">
                                <a href="<?=base_url('index.php/lead/update_lead/'.$totallead['id'])?>" class="fa fa-pencil-square-o mt-3" data-toggle="modal" aria-hidden="true" title="Edit">edit </a> <br/>
                                <a href="#" onClick = "softDelete(<?=$totallead['id'];?>);" name="delete" data-href="<?php echo base_url();?>index.php/lead/delete_lead_soft_data/<?=$totallead['id'];?>" id="delete-<?=$i?>" class="fa fa-trash mt-4 " aria-hidden="true" title="Delete">delete</a> <br/>
                                <!-- <a href="#" onClick = "hardDelete(<?//=$totallead['id'];?>);" name="delete" data-href="<?//=base_url();?>index.php/lead/delete_lead_hard_data/<?//=$totallead['id'];?>" id="delete-<?//=$i?>" class="fa fa-trash mt-4" aria-hidden="true" title="Hard Delete"></a> -->
                                <a href="<?=base_url('index.php/lead/assign_lead/'.$totallead['id'])?>" class="fa fa-pencil mt-3" aria-hidden="true" title="Assign"  >assign</a>
                                <a href="#" onClick = "deAssignLead(<?=$totallead['id'];?>);" class="fa fa-pencil-square mt-3 text-warning" aria-hidden="true" title="De-Assign" >deassign</a>
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

    function softDelete(leadId) {
        if(confirm('Are you sure to remove this record ?')) {
            window.location.replace('<?php echo base_url();?>index.php/lead/soft_delete_lead_data/'+leadId);
        }
    }

    // function hardDelete(leadId) {
    //     if(confirm('Are you sure to delete permanentaly from records ?')) {
    //         window.location.replace('<?//=base_url();?>index.php/lead/hard_delete_lead_data/'+leadId);
    //     }
    // }

    function deAssignLead(leadId) {
        if(confirm('Are you sure to delete your assigned lead from records ?')) {
            window.location.replace('<?php echo base_url();?>index.php/lead/deassign_lead/'+leadId);
        }
    }
</script>
