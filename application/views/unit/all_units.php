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
    </style>
<div class="mt-5 ex1" style="margin-top:110px;">
    <div class="row">
     <div class="col-lg-12">
        <div id="table1" class="ex2">
            <div class="content-wrapper content-wrapper--with-bg">
                <table id="dt-all-checkbox" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="th-sm">Unit Type</th>
                            <th class="th-sm">Unit Size</th>
                            <th class="th-sm">Unit Range</th>
                            <th class="th-sm">Remark</th>
                            <th class="th-sm">Actions</th>
                        </tr>
                    </thead>
                        <?php
                            if ($total_unit) {
                                $i = 0;
                                foreach($total_unit as $totalunit) {
                                    $i++;
                        ?>
                    <tbody class="table-bordered">
                        <tr>
                            <td><?=$i;?></td>
                            <td><?=$totalunit['unit_type']?></td>
                            <td><?=$totalunit['unit_size'].' '.$totalunit['size_measure']?></td>
                            <td><?=$totalunit['unit_range']." "." INR"?></td>
                            <td><?=$totalunit['unit_remark']?></td>
                            <td class="edit-icon">
                                <a href="<?=base_url('index.php/unit/update_unit/'.$totalunit['id'])?>" class="fa fa-pencil-square-o mt-3" data-toggle="modal" aria-hidden="true" title="Edit"></a><br/>
                                <a href="#" onClick = "unitDelete(<?=$totalunit['id'];?>);"  data-href="<?php echo base_url();?>index.php/unit/delete_unit/<?=$totalunit['id'];?>" id="delete-<?=$i?>" class="fa fa-trash mt-4 delete" aria-hidden="true" title="Delete"></a><br/>
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

    function unitDelete(unitId) {
        if(confirm('Are you sure to remove this record ?')) {
            window.location.replace('<?php echo base_url();?>index.php/unit/delete_unit/'+unitId);
        }
    }
    
</script>

