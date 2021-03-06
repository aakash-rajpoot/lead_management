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
                        <input type="text" class="form-control" value="<?=isset($_GET['permanent']) ? $_GET['permanent'] :''?>" name="permanent" id="permanent" placeholder="Permanent Address">
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                        <input type="text" class="form-control" value="<?=isset($_GET['correspondence']) ? $_GET['correspondence'] :''?>" name="correspondence" id="correspondence" placeholder="Correspondence Address">
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                    <div  class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                        <input type="text" class="form-control" value="<?=isset($_GET['joining_date']) ? $_GET['joining_date'] :''?>" name="joining_date" id="joining_date" placeholder="Joining Date">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                    <div  class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                        <input type="text" class="form-control" value="<?=isset($_GET['resignation_date']) ? $_GET['resignation_date'] :''?>" name="resignation_date" id="resignation_date" placeholder="Resignation Date">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                        <input type="submit" class="btn btn-success" name="member_filter" value="Submit">
                        <a href="<?=base_url().'member/index'?>" class="btn btn-default">Reset</a>
                    </div>
                </div>
                <?=form_close();?>
  
                <table id="dt-all-checkbox" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="th-sm">Agent-Id</th>
                            <th class="th-sm">Agent Name</th>
                            <th class="th-sm">Email Id</th>
                            <th class="th-sm">Phone Number</th>
                            <th class="th-sm">Gender</th>
                            <th class="th-sm">Permanent Address</th>
                            <th class="th-sm">Joining Date</th>
                            <th class="th-sm">Resignation Date</th>
                            <th class="th-sm all-icon">Action</th>
                        </tr>
                    </thead>
                        <?php 
                            if ($total_member) {
                                $i = 0;
                                foreach($total_member as $totalmember) {
                                    $i++; 
                        ?>
                    <tbody class="table-bordered">
                        <?php if($totalmember['active'] == 1) { ?>
                            <tr class="active_agent">
                                <td><?=$totalmember['id']?></td>
                                <td><a href="<?=base_url('index.php/member/agent_profile_details/'.$totalmember['id']);?>"><?=$totalmember['name']?></a></td>
                                <td><?=$totalmember['email']?></td>
                                <td><?=$totalmember['phone']?></td>
                                <td><?=$totalmember['gender']?></td>
                                <td><?=$totalmember['permanent']?></td>
                                <td><?=$totalmember['joining_date']?></td>
                                <td></td>
                                <td class="edit-icon">
                                    <a href="<?=base_url('index.php/member/update_member/'.$totalmember['id'])?>"  class="fa fa-pencil-square-o" title="Edit" data-toggle="modal" aria-hidden="true"></a>
                                    <a href="#" data-href="<?=base_url('index.php/member/resign_agent/'.$totalmember['id'])?>" onClick = "resignAgent(<?=$totalmember['id'];?>);" class="fa fa-sign-out " title="Resign" data-toggle="modal" aria-hidden="true"></a>
                                    <a href="#" onClick = "softDelete(<?=$totalmember['id'];?>);" data-href="<?=base_url();?>index.php/member/delete_member_soft_data/<?=$totalmember['id'];?>" title="delete" id="delete-<?=$i?>" class="fa fa-trash soft-recode delete" aria-hidden="true"></a>
                                    <a href="<?=base_url('index.php/chat/index/'.$totalmember['id'])?>" class="fa fa-comment text-success" title="Message"></a>
                                </td>
                            </tr>
                        <?php }else{ ?>
                            <tr class="inactive_agent">
                                <td><?=$totalmember['id'];?></td>
                                <!-- <td data-search="{{ hit['_source']['filter'] }}"><?="Emp".$totalmember['id']?></td> -->
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
                <div class="pagination-inv mb-5"><?=$links; ?></div>
            </div>
        </div>
    </div>
    </div>
</div>



<script>
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
    $(function () {
  $(".datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
</script>

