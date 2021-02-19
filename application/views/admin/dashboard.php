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
.piechart {
      display: flex;
      justify-content: center;
      align-items: center;
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
.piechart-box{
  display: flex; 
  justify-content: center; 
  align-items: center; 
  margin-left:232px;
  text-align:center;
}
</style>
<div class="wrap-career ">
  <div class="content-wrapper content-wrapper--with-bg">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-4">
            <a href="<?=base_url('index.php/member')?>"> 
              <div class="card-counter primary">
                <i class="fa fa-code-fork"></i>
                <span class="count-numbers"><?=$count['members']?></span>
                <span title="Agents" class="count-name">Agents</span>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?=base_url('index.php/lead')?>"> 
              <div class="card-counter danger">
                <i class="fa fa-ticket"></i>
                <span class="count-numbers"><?=$count['leads'];?></span>
                <span  title="Leads" class="count-name">Leads</span>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?=base_url('index.php/unit')?>"> 
              <div class="card-counter success">
                <i class="fa fa-database"></i>
                <span class="count-numbers"><?=$count['units'];?></span>
                <span title="Units" class="count-name">Units</span>
              </div>
            </a>
          </div>
            <div class="row">
                <div class="piechart-box">
                <div id="piechart3d" style="width:80rem;height:45rem; margin-bottom:-136px;">
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- status -->
<div class="mt-5 ex1 top-space-hea" >
    <div class="row">
     <div class="col-lg-12">
        <div id="table1" class="ex2">
            <div class="content-wrapper content-wrapper--with-bg">
                <?=form_open(null, array('method'=>'get')); ?>
                <div class="row inventory-filter">
                    <div class="col-md-3 mb-3 top-data">
                        <input type="tel" class="form-control" value="<?=isset($_GET['user_id']) ? $_GET['user_id'] :''?>" name="user_id" id="user_id" placeholder="User ID">
                    </div>
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
                        <input type="text" class="form-control" value="<?=isset($_GET['property_address']) ? $_GET['property_address'] :''?>" name="property_address" id="property_address" placeholder="Property Address">
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                        <input type="text" class="form-control" value="<?=isset($_GET['client_address']) ? $_GET['client_address'] :''?>" name="client_address" id="client_address" placeholder="Client Address">
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                      <div  class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                          <input type="text" class="form-control" value="<?=isset($_GET['lead_date']) ? $_GET['lead_date'] :''?>" name="lead_date" id="lead_date" placeholder="Lead Create Date">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                      <div  class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                          <input type="text" class="form-control" value="<?=isset($_GET['assign_date']) ? $_GET['assign_date'] :''?>" name="assign_date" id="assign_date" placeholder="Lead Assign Date">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                      <div  class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                          <input type="text" class="form-control" value="<?=isset($_GET['status_date']) ? $_GET['status_date'] :''?>" name="status_date" id="status_date" placeholder="Lead Status Date">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                        <select  class="form-control" name="available_unit">
                            <option value="">Select Unit</option>
                            <?php foreach($units as $unit ) { ?>
                                <option <?=isset($_GET['available_unit']) && $_GET['available_unit'] ==  $unit['id']? 'selected' :''?>  value="<?=$unit['id']?>" class="form-control"><?=$unit['unit_type'].' ('.$unit['unit_size'].' '.$unit['size_measure'].')'; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                        <select  class="form-control" name="status">
                            <option value="">Select Status</option>
                            <?php foreach($statuses as $status) {  ?>
                                <option <?=isset($_GET['status']) && $_GET['status'] ==  $status['id']? 'selected' :''?> style="color:<?=$status['color_code']?>;" value="<?=$status['id']?>" class="form-control"><?=$status['status_name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="submit" class="btn btn-success" name="inventory_filter" value="Submit">
                        <a href="<?=base_url().'admin/admin_dashboard'?>" class="btn btn-default">Reset</a>
                    </div>
                </div>
                <?=form_close();?>
                <div class="row">
                  <?php foreach ($inventories as $inventory): ?>
                    <div class="column" onclick="openTab('b1');" style="background:<?=$inventory->color_code?>;">
                        <a href="<?=base_url('index.php/lead/view_lead/').$inventory->id?>">
                            <p class="title"><?=$inventory->name?></p>
                            <p class="lead-des"><?=$inventory->property_address?></p>
                        </a>
                    </div>
                <?php endforeach; ?>
                <?php if($total_rows > $per_page){ ?>
                <div class="pagination-inv mb-5"><?=$links; ?></div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
</div>
