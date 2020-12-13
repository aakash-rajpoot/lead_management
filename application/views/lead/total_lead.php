<!-- <html>

<head>
    <meta charset="utf-8"> -->
    <!-- custom css-->
    <!-- <link rel="stylesheet" href="<?//=base_url('css/style.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <script src='https://use.fontawesome.com/2188c74ac9.js'></script> -->

<style>
   .ex1 {
 
  /* width: 100%; */
  overflow-x: scroll;
  /* overflow-y: scroll;
  height:400px; */
}
.ex2{
  overflow-y: scroll;
  height:600px;
}

</style>

<div id="table1" class="ex2">
    <div class="content-wrapper content-wrapper--with-bg">
        <div class="container">
            <div class="mt-5 ex1" style="margin-top:110px;margin-left:170px;">
                <table id="dt-all-checkbox" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="th-sm">Lead Name</th>
                            <th class="th-sm">Assign TO</th>
                            <th class="th-sm">Email Id</th>
                            <th class="th-sm">Phone Number</th>
                            <th class="th-sm">Alternate Phone Number</th>
                            <th class="th-sm">Property Of Address</th>
                            <th class="th-sm">Client Address</th>
                            <th class="th-sm">Role</th>
                            <th class="th-sm">Remarks</th>
                            <th class="th-sm">Other Information</th>
                            <th class="th-sm">Reference By</th>
                            <th class="th-sm">Action</th>
                            <th class="th-sm">Lead Action</th>
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
                            <td><?=$totallead['email']?></td>
                            <td><?=$totallead['phone']?></td>
                            <td><?=$totallead['alt_phone']?></td>
                            <td><?=$totallead['property_address']?></td>
                            <td><?=$totallead['client_address']?></td>
                            <td><?=$totallead['role']?></td>
                            <td><?=$totallead['remark']?></td>
                            <td><?=$totallead['other_info']?></td>
                            <td><?=$totallead['reference']?></td>
                            <td class="edit-icon">
                                <a href="<?=base_url('index.php/lead/update_lead/'.$totallead['id'])?>" class="fa fa-pencil-square-o mt-3" data-toggle="modal" aria-hidden="true" title="Edit details"></a> <br/>
                                <a href="#" onClick = "softDelete(<?=$totallead['id'];?>);" name="delete" data-href="<?php echo base_url();?>index.php/lead/delete_lead_soft_data/<?=$totallead['id'];?>" id="delete-<?=$i?>" class="fa fa-trash mt-4" aria-hidden="true" title="Soft Delete"></a> <br/>
                                <a href="#" onClick = "hardDelete(<?=$totallead['id'];?>);" name="delete" data-href="<?php echo base_url();?>index.php/lead/delete_lead_hard_data/<?=$totallead['id'];?>" id="delete-<?=$i?>" class="fa fa-trash mt-4" aria-hidden="true" title="Hard Delete"></a>
                            </td>
                            <td>
                                <a href="#" onClick = "deAssignLead(<?=$totallead['id'];?>);" class="btn btn-primary mt-3">De-assign</a>
                                <a href="<?=base_url('index.php/lead/reassign_lead/'.$totallead['id'])?>" class="btn btn-primary mt-4">Re-assign</a>
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

    function hardDelete(leadId) {
        if(confirm('Are you sure to delete permanentaly from records ?')) {
            window.location.replace('<?php echo base_url();?>index.php/lead/hard_delete_lead_data/'+leadId);
        }
    }

    function deAssignLead(leadId) {
        if(confirm('Are you sure to delete your assigned lead from records ?')) {
            window.location.replace('<?php echo base_url();?>index.php/lead/deassign_lead/'+leadId);
        }
    }
</script>

</body>

</html>