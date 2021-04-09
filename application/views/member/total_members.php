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
    <div class="col-sm-12">
        <div id="table1" class="ex2">
            <div class="content-wrapper content-wrapper--with-bg">  
            <?=form_open(null, array('method'=>'get')); ?>
                <div class="row inventory-filter">
                    <div class="col-sm-3 col-md-2 mb-3 top-data">
                        <input type="tel" class="form-control" value="<?=isset($_GET['fname']) ? $_GET['fname'] :''?>" name="fname" id="fname" placeholder="First Name">
                    </div>
                    <div class="col-sm-3 col-md-2 mb-3 top-data">
                        <input type="tel" class="form-control" value="<?=isset($_GET['lname']) ? $_GET['lname'] :''?>" name="lname" id="lname" placeholder="Last Name">
                    </div>
                    <div class="col-sm-3 col-md-2 mb-3 top-data">
                        <input type="text" class="form-control" value="<?=isset($_GET['email']) ? $_GET['email'] :''?>" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="col-sm-3 col-md-2 mb-3 top-data">
                        <input type="text" class="form-control" value="<?=isset($_GET['phone']) ? $_GET['phone'] :''?>" name="phone" id="phone" placeholder="Phone">
                    </div>
                    <div class="col-sm-3 col-md-2 mb-3 top-data">                      
                        <select name="role" class="form-control">
                            <option value="">Select Role</option>
                            <?php 
                            if ($roles) {
                                foreach($roles as $role) {?>
                                    <option value="<?=$role['role_id'];?>" <?php if(isset($_GET['role']) && $_GET['role']==$role['role_id']){ echo "selected";}?>><?=$role['role'];?></option>
                            <?php }
                            }
                            ?>
                        </select>                                    
                    </div>
                    <div class="col-sm-3 col-md-2 mb-3 top-data">                      
                        <select name="manager" class="form-control">
                            <option value="">Select Manager</option>
                            <?php 
                            if ($managers) {
                                foreach($managers as $manager) {?>
                                    <option value="<?=$manager['id'];?>" <?php if(isset($_GET['manager']) && $_GET['manager']==$manager['id']){ echo "selected";}?>><?=$manager['fname'];?> <?=$manager['lname'];?></option>
                            <?php }
                            }
                            ?>
                        </select>                                    
                    </div>
                    <div class="col-sm-3 col-md-2 mb-3 top-data">
                        <div  class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                            <input type="text" class="form-control" value="<?=isset($_GET['joining_date']) ? $_GET['joining_date'] :''?>" name="joining_date" id="joining_date" placeholder="Joining Date">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-3 col-md-2 mb-3 top-data">
                        <input type="submit" class="btn btn-success" name="member_filter" value="Search">
                        <a href="<?=base_url().'member/index'?>" class="btn btn-default">Reset</a>
                    </div>
                </div>
                <?=form_close();?>
                <hr>
                <table id="dt-all-checkbox" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="th-sm">Id</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Email</th>
                            <th class="th-sm">Phone</th>
                            <th class="th-sm">Gender</th>
                            <th class="th-sm">User Role</th>
                            <th class="th-sm">Manager</th>
                            <th class="th-sm">Joining Date</th>
                            <th class="th-sm all-icon">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                        <?php 
                        if ($total_member) {
                            $i = 0;
                            foreach($total_member as $member) {
                            $i++; 
                        ?>
                    
                        <?php if($member['active'] == 1) { ?>
                            <tr class="active_agent">
                                <td><?=$member['id']?></td>
                                <td><a href="<?=base_url('index.php/member/profile_details/'.$member['id']);?>"><?=$member['fname']?> &nbsp;<?=$member['lname']?></a></td>
                                <td><?=$member['email']?></td>
                                <td><?=$member['phone']?></td>
                                <td><?=$member['gender']?></td>
                                <td><?=$member['urole']?></td>
                                <td><?=$member['finame'].' '. $member['laname'] ;?> </td>
                                <td><?=$member['joining_date']?></td>
                                <td class="edit-icon">
                                    <?php if($this->session->get_userdata()['role']<=3 || $member['id'] == $this->session->get_userdata()['id']){?> 
                                        <a href="<?=base_url('index.php/member/update_member/'.$member['id'])?>"  class="fa fa-pencil-square-o" title="Edit" data-toggle="modal" aria-hidden="true"></a>
                                    <?php } ?>
                                    <!-- <a href="#" data-href="<?=base_url('index.php/member/profile_details/'.$member['id'])?>" onClick = "resignAgent(<?=$member['id'];?>);" class="fa fa-sign-out " title="Resign" data-toggle="modal" aria-hidden="true"></a>
                                    <a href="#" onClick = "softDelete(<?=$member['id'];?>);" data-href="<?=base_url();?>index.php/member/delete_member_soft_data/<?=$member['id'];?>" title="delete" id="delete-<?=$i?>" class="fa fa-trash soft-recode delete" aria-hidden="true"></a> -->
                                   <?php if($member['id'] != $this->session->get_userdata()['id']){?> <a href="<?=base_url('index.php/chat?mid'.$member['id'])?>" class="fa fa-comment text-success" title="Message"></a><?php } ?>
                                </td>
                            </tr>
                        <?php }else{ ?>
                            <tr class="inactive_agent">
                                <td><?=$member['id'];?></td>
                                <td data-search="{{ hit['_source']['filter'] }}"><a href="<?=base_url('index.php/member/profile_details/'.$member['id']);?>"><?=$member['fname']?> &nbsp;<?=$member['lname']?></a></a></td>
                                <td data-search="{{ hit['_source']['filter'] }}"><?=$member['email']?></td>
                                <td><?=$member['phone']?></td>
                                <td><?=$member['gender']?></td>
                                <td><?=$member['urole']?></td>
                                <td><?=$member['finame'].' '. $member['laname'] ;?> </td>
                                <td><?=$member['joining_date']?></td>
                                <td><?=$member['resignation_date']?></td> 
                            </tr>
                        <?php } ?> 
                    <?php } ?>

                    <?php } else{?>
                        <tr class="inactive_agent">
                            <td colspan="10">No result found</td>
                        <tr>
                    <?php } ?>
                    </tbody>
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
    
    /*$(function () {
        $(".datepicker").datepicker({ 
                autoclose: true, 
                todayHighlight: true
        }).datepicker('update', new Date());
    });*/
    $("#joining_date").datepicker({ dateFormat: 'dd-mm-yy' });
</script>

