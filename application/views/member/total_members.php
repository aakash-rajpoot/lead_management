
<div id="table1" class="ex2">
    <div class="content-wrapper content-wrapper--with-bg">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="mt-5 ex1" style="margin-top:110px;">
                <table id="dt-all-checkbox" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="th-sm">Agent-Id</th>
                            <th class="th-sm">Agent Name</th>
                            <th class="th-sm">Email Id</th>
                            <th class="th-sm">Phone Number</th>
                            <th class="th-sm">Gender</th>
                            <th class="th-sm">Permanent Address</th>
                            <th class="th-sm">Joining Date</th>
                            <th class="th-sm">Resignation Date</th>
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
                        <?php if($totalmember['status'] == 1) { ?>
                            <tr class="active_agent">
                                <td><?=$i;?></td>
                                <td><?="Emp-".$totalmember['id']?></td>
                                <td><a href="<?=base_url('index.php/member/agent_profile_details/'.$totalmember['id']);?>"><?=$totalmember['name']?></a></td>
                                <td><?=$totalmember['email']?></td>
                                <td><?=$totalmember['phone']?></td>
                                <td><?=$totalmember['gender']?></td>
                                <td><?=$totalmember['permanent']?></td>
                                <td><?=$totalmember['joining_date']?></td>
                                <td></td>
                                <td class="edit-icon">
                                    <a href="<?=base_url('index.php/member/update_member/'.$totalmember['id']);?>"  class="fa fa-pencil-square-o" title="Edit" data-toggle="modal" aria-hidden="true">edit</a><br/><br/>
                                    <a href="#" onClick = "softDelete(<?=$totalmember['id'];?>);" name="delete" data-href="<?=base_url();?>index.php/member/delete_member_soft_data/<?=$totalmember['id'];?>" title="delete" id="delete-<?=$i?>" class="fa fa-trash soft-recode" aria-hidden="true">delete</a>
                                </td>
                            </tr>
                        <?php }else{ ?>
                            <tr class="inactive_agent">
                                <td><?=$i;?></td>
                                <td><?="Emp-".$totalmember['id']?></td>
                                <td><a href="<?=base_url('index.php/member/agent_profile_details/'.$totalmember['id']);?>"><?=$totalmember['name']?></a></td>
                                <td><?=$totalmember['email']?></td>
                                <td><?=$totalmember['phone']?></td>
                                <td><?=$totalmember['gender']?></td>
                                <td><?=$totalmember['permanent']?></td>
                                <td><?=$totalmember['joining_date']?></td>
                                <td><?=$totalmember['resignation_date']?></td>
                                <td></td>
                            </tr>
                        <?php } ?>    
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

