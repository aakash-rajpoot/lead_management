<html>

<head>
    <meta charset="utf-8">
    <!-- custom css-->
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <script src='https://use.fontawesome.com/2188c74ac9.js'></script>

</head>
<body>
<div id="table1">
    <div class="content-wrapper content-wrapper--with-bg">
        <div class="container">
            <div class="mt-5">
                <table id="dt-all-checkbox" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="th-sm">Full Name</th>
                            <th class="th-sm">Email Id</th>
                            <th class="th-sm">Phone Number</th>
                            <th class="th-sm">Alternate Phone Number</th>
                            <th class="th-sm">Property Of Address</th>
                            <!-- <th class="th-sm">Client Address</th>
                            <th class="th-sm">Role</th>
                            <th class="th-sm">Remarks</th>
                            <th class="th-sm">Other Information</th>
                            <th class="th-sm">Reference By</th> -->
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
                            <td><?=$totalmember['name']?></td>
                            <td><?=$totalmember['email']?></td>
                            <td><?=$totalmember['phone']?></td>
                            <td><?=$totalmember['alt_phone']?></td>
                            <td><?=$totalmember['property_address']?></td>
                            <!-- <td><?//=$totalmember['client_address']?></td>
                            <td><?//=$totalmember['role']?></td>
                            <td><?//=$totalmember['remark']?></td>
                            <td><?//=$totalmember['other_info']?></td>
                            <td><?//=$totalmember['reference']?></td> -->
                            <td class="edit-icon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp
                                <i><a href="#" onClick="softDelete(<?=$totalmember['id'];?>);" name="delete" data-href="<?php echo base_url();?>index.php/member/delete_member_soft_data/<?=$totalmember['id'];?>" id="delete-<?=$i?>" class="fa fa-trash deleteThis" aria-hidden="true"></a></i>
                                <i><a href="#" onClick="hardDelete(<?=$totalmember['id'];?>);" name="delete" data-href="<?php echo base_url();?>index.php/member/delete_member_hard_data/<?=$totalmember['id'];?>" id="delete-<?=$i?>" class="fa fa-trash deleteThis" aria-hidden="true"></a></i>
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
            window.location.replace('<?php echo base_url();?>index.php/member/delete_member_data/'+memberId);
        }
    }

    function hardDelete(memberId) {
        if(confirm('Are you sure to delete permanentaly from records ?')) {
            window.location.replace('<?php echo base_url();?>index.php/member/delete_member_data/'+memberId);
        }
    }
</script>

</body>

</html>