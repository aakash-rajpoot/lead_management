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
                            <th class="th-sm">Assign Date</th>
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
                            <td><?=$totallead['assign_date']?></td>
                            <td><?=$totallead['phone']?></td>
                            <td><?=$totallead['property_address']?></td>
                            <td><?=$totallead['client_address']?></td>
                            <td>
                                <!-- <button type="button" class="btn add_new_remark" onclick="createNewElement();">+</button>
                                <input type='text' class='form-control' id='newInputBox' value="<?//=$totallead['remark']?>" />
                                <div id="newElementId"></div> -->
                                <?=$totallead['remark']?>
                            </td>
                            <td><?=$totallead['reference']?></td>
                            <td class="edit-icon">
                                <a href="<?=base_url('index.php/lead/update_lead/'.$totallead['id'])?>" class="fa fa-pencil-square-o mt-3" data-toggle="modal" aria-hidden="true" title="Edit">edit </a> <br/>
                                <a href="#" onClick = "softDelete(<?=$totallead['id'];?>);" name="delete" data-href="<?php echo base_url();?>index.php/lead/delete_lead_soft_data/<?=$totallead['id'];?>" id="delete-<?=$i?>" class="fa fa-trash mt-4 " aria-hidden="true" title="Delete">delete</a> <br/>
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

    function deAssignLead(leadId) {
        if(confirm('Are you sure to delete your assigned lead from records ?')) {
            window.location.replace('<?php echo base_url();?>index.php/lead/deassign_lead/'+leadId);
        }
    }

</script>
<!-- <script type="text/JavaScript">
    function createNewElement() {

        var txtNewInputBox = document.createElement('div');

        txtNewInputBox.innerHTML = "<input type='text' class='form-control' id='newInputBox'>";

        document.getElementById("newElementId").appendChild(txtNewInputBox);
    }
</script> -->
