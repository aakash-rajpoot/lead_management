<style>
    .edit-icon {
        font-size: 20px!important;
        text-align: center!important;
    }
    .delete{
        color:red!important;
    }
    .sorting {
        text-align: center!important;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        vertical-align: middle!important; 
    }
    td {
        text-align: center;
    }
    input.empty {
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
}
.dataTables_empty {
    display: none;
  }
    </style>
<div class="mt-5 ex1" style="margin-top:110px;">
<div class="row">
 <div class="col-lg-12">
    <div id="table1" class="ex2">
    <div class="content-wrapper content-wrapper--with-bg">    
                <table id="dt-all-checkbox" class="table table-bordered">
                    <thead>
                        <tr>
                            <th >S.No</th>
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
                                <td><?="Emp".$totalmember['id']?></td>
                                <td><a href="<?=base_url('index.php/member/agent_profile_details/'.$totalmember['id']);?>"><?=$totalmember['name']?></a></td>
                                <td><?=$totalmember['email']?></td>
                                <td><?=$totalmember['phone']?></td>
                                <td><?=$totalmember['gender']?></td>
                                <td><?=$totalmember['permanent']?></td>
                                <td><?=$totalmember['joining_date']?></td>
                                <td></td>
                                <td class="edit-icon">
                                    <a href="<?=base_url('index.php/member/update_member/'.$totalmember['id'])?>"  class="fa fa-pencil-square-o" title="Edit" data-toggle="modal" aria-hidden="true"></a><br/>
                                    <a href="#" data-href="<?=base_url('index.php/member/resign_agent/'.$totalmember['id'])?>" onClick = "resignAgent(<?=$totalmember['id'];?>);" class="fa fa-sign-out " title="Resign" data-toggle="modal" aria-hidden="true"></a><br/>
                                    <a href="#" onClick = "softDelete(<?=$totalmember['id'];?>);" data-href="<?=base_url();?>index.php/member/delete_member_soft_data/<?=$totalmember['id'];?>" title="delete" id="delete-<?=$i?>" class="fa fa-trash soft-recode delete" aria-hidden="true"></a>
                                </td>
                            </tr>
                        <?php }else{ ?>
                            <tr class="inactive_agent">
                                <td><?=$i;?></td>
                                <td data-search="{{ hit['_source']['filter'] }}"><?="Emp".$totalmember['id']?></td>
                                <td data-search="{{ hit['_source']['filter'] }}"><a href="<?=base_url('index.php/member/agent_profile_details/'.$totalmember['id']);?>"><?=$totalmember['name']?></a></td>
                                <td data-search="{{ hit['_source']['filter'] }}"><?=$totalmember['email']?></td>
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

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>

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
            window.location.replace('<?=base_url();?>index.php/member/delete_member_soft_data/'+memberId);
        }
    }

    function resignAgent(memberId) {
        if(confirm('Are you sure to resign permanentaly from here ?')) {
            window.location.replace('<?=base_url();?>index.php/member/resign_agent/'+memberId);
        }
    }
    $('#iconified').on('keyup', function() {
    var input = $(this);
    if(input.val().length === 0) {
        input.addClass('empty');
    } else {
        input.removeClass('empty');
    }
});
</script>

