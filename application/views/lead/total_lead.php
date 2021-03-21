<div class="mt-5 ex1 top-space-hea">
    <div class="row">
     <div class="col-lg-12">
        <div id="table1" class="ex2">
            <div class="content-wrapper content-wrapper--with-bg">
            <?=form_open(null, array('method'=>'get')); ?>
                <div class="row inventory-filter">
                    <div class="col-md-3 mb-3 top-data">
                        <input type="tel" class="form-control" value="<?=isset($_GET['name']) ? $_GET['name'] :''?>" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                        <input type="text" class="form-control" value="<?=isset($_GET['email']) ? $_GET['email'] :''?>" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                        <input type="text" class="form-control" value="<?=isset($_GET['phone']) ? $_GET['phone'] :''?>" name="phone" id="phone" placeholder="Phone">
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                        <input type="text" class="form-control" value="<?=isset($_GET['property_address']) ? $_GET['property_address'] :''?>" name="property_address" id="property_address" placeholder="Project Name">
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                        <input type="text" class="form-control" value="<?=isset($_GET['client_address']) ? $_GET['client_address'] :''?>" name="client_address" id="client_address" placeholder="Client Address">
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                        <select  class="form-control" name="available_unit">
                            <option value="">Select Unit</option>
                            <?php foreach($units as $unit ) { ?>
                                <option <?=isset($_GET['available_unit']) && $_GET['available_unit'] ==  $unit['id']? 'selected' :''?>  value="<?=$unit['id']?>" class="form-control"><?=$unit['unit_type'].' ('.$unit['unit_size'].' '.$unit['size_measure'].')'; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="submit" class="btn btn-success" name="inventory_filter" value="Submit">
                        <a href="<?=base_url().'lead/index'?>" class="btn btn-default">Reset</a>
                    </div>
                </div>
                <?=form_close();?>

                <table id="dt-all-checkbox" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="th-sm">Lead Name</th>
                            <th class="th-sm">Assign TO</th>
                            <th class="th-sm">Assign Date</th>
                            <th class="th-sm">Phone Number</th>
                            <th class="th-sm">Project Name</th>
                            <th class="th-sm">Client Address</th>
                            <th class="th-sm">Remark</th>
                            <th class="th-sm">Lead Source By</th>
                            <th class="th-sm">Actions</th>
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
                            <td><?='Emp'.$totallead['assign_to']?></td>
                            <td><?=$totallead['assign_date']?></td>
                            <td><?=$totallead['phone']?></td>
                            <td><?=$totallead['property_address']?></td>
                            <td><?=$totallead['client_address']?></td>
                            <td>
                                <?=$totallead['remark']?>
                            </td>
                            <td><?=$totallead['reference']?></td>
                            <td class="edit-icon">
                                <a href="<?=base_url('index.php/lead/update_lead/'.$totallead['id'])?>" class="fa fa-pencil-square-o mt-3" data-toggle="modal" aria-hidden="true" title="Edit"></a>
                                <a href="#" onClick = "softDelete(<?=$totallead['id'];?>);"  data-href="<?php echo base_url();?>index.php/lead/delete_lead_soft_data/<?=$totallead['id'];?>" id="delete-<?=$i?>" class="fa fa-trash delete mt-4 " aria-hidden="true" title="Delete"></a>
                                <a href="#" onClick ="checkLead(this);" data-id="<?=$totallead['id'];?>" data-user='<?=$totallead['assign_to'];?>' class="fa fa-plus-circle text-success mt-3" aria-hidden="true" title="Assign"></a>
                                <a href="#" onClick = "deAssignLead(<?=$totallead['id'];?>);" class="fa fa-minus-circle mt-3 text-danger" aria-hidden="true" title="De-Assign"></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                    <?php } ?>
                </table>
                <div class="pagination-inv mb-5"><?=$links; ?></div>
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

    function checkLead($this) {
        var lead_id = $($this).attr('data-id');
        var lead_user = $($this).attr('data-user');
        if(lead_user != '' && lead_user >'0') {
            var conf = confirm('This lead is already assigned to a sales user, Do you want to re-assigne this lead to some other user?');
        } else {
            var conf = confirm("Are you sure you want to assign this lead to sales user?");
        }
        if(conf) {
            window.location.replace('<?php echo base_url();?>index.php/lead/assign_lead/'+lead_id);
        }
        return false;
    }
    
</script>
