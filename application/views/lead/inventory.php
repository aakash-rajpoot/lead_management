<style>
* {
  box-sizing: border-box;
}

/* Create four equal col-sm-2s that floats next to each other */
.col-sm-2 {
  float: left;
  width: 18%;
  padding: 10px;
  height: 200px; /* Should be removed. Only for demonstration */
}
</style>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* The grid: Three equal columns that floats next to each other */
.column {
   float: left;
    width: 20%;
    padding: 5px;
    text-align: center;
    font-size: 14px;
    cursor: pointer;
    color: white;
    border: 1px solid white;
    height: 85px;
}
.column a p {
    margin: 0px;
    color: white;

}
.column .lead-des {
    font-size: 10px;
}
.containerTab {
  padding: 2px;
  color: white;
}

.inventory-filter .cols-md-3 text {
    padding-right: 0px;
}
</style>
<div class="mt-5 ex1" style="margin-top:110px;">
    <div class="row">
     <div class="col-lg-12">
        <div id="table1" class="ex2">
            <div class="content-wrapper content-wrapper--with-bg">
                <?=form_open(null, array('method'=>'get')); ?>
                <div class="row inventory-filter">
                    <div class="col-md-3 mb-3">
                        <input type="tel" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" name="property_address" id="property_address" placeholder="Property Address">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" name="client_address" id="client_address" placeholder="Client Address">
                    </div>
                    <div class="col-md-3 mb-3">
                        <select  class="form-control" name="available_unit">
                            <option value="">Select Unit</option>
                            <?php foreach($units as $unit ) { ?>
                                <option value="<?=$unit['id']?>" class="form-control"><?=$unit['unit_type'].' ('.$unit['unit_size'].' '.$unit['size_measure'].')'; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <input type="submit" class="btn btn-success" name="inventory_filter" value="Submit">
                        <a href="<?=base_url().'lead/inventory'?>" class="btn btn-default">Reset</a>
                    </div>
                    
                </div>
                <?=form_close();?>
                <div class="row">
                  <?php foreach ($inventories as $inventory): ?>
                    <div class="column" onclick="openTab('b1');" style="background:<?=$inventory->color_code?>;">
                        <a href="<?=base_url('index.php/lead/view_lead/').$inventory->id?>">
                            <p class="title"><?=$inventory->name?></p>
                            <p class="lead-des"><?=$inventory->property_address?></p>
                            <p class="lead-des"><?=$inventory->available_unit?></p>
                        </a>
                    </div>
                <?php endforeach; ?>
                <p><?=$links; ?></p>
            </div>
        </div>
    </div>
    </div>
</div>


<script>
    $(document).ready(function() {
       
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
