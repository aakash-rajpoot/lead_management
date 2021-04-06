<style>
/* Create four equal col-sm-2s that floats next to each other */
.col-sm-2 {
  float: left;
  width: 18%;
  padding: 10px;
  height: 200px; /* Should be removed. Only for demonstration */
}
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
  text-align:center;
}
</style>

<div class="wrap-career ">
  <div class="content-wrapper content-wrapper--with-bg">
    <div class="row">
      <div class="col-md-12">
          <div class="row">
            <div class="col-md-8">
              <div class="row">
              <?php foreach($leads as $lead) {?>              
                <div class="col-md-3 p-0">
                  <a href="<?=base_url('index.php/lead?status='.$lead->status.'&search_term='.$lead->short_name)?>"> 
                    <div class="card-counter primary" style="background-color:<?=$lead->color;?>;">
                    <i class="fa <?=$lead->icon;?>" aria-hidden="true"></i>
                      <span class="count-numbers"><?=$lead->count;?></span>
                      <span class="count-name"><?=$lead->name;?></span>
                    </div>
                  </a>
                </div>
                <?php } ?>
                
                <div class="col-md-3 p-0">
                  <a href="<?=base_url('index.php/lead')?>"> 
                    <div class="card-counter primary">
                      <i class="fa fa-ticket"></i>
                      <span class="count-numbers"><?=$count['leads'];?></span>
                      <span  title="Leads" class="count-name">Total Leads</span>
                    </div>
                  </a>
                </div>
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="piechart-box">
                <div id="piechart3d" style="width:50rem;height:32rem;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- status -->
<!-- <div class="mt-2 ex1 top-space-hea" >
    <div class="row">
     <div class="col-md-12">
        <div id="table1" class="ex2">
            <div class="content-wrapper content-wrapper--with-bg">
            <hr>
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
                      <div  class="input-group date datepicker" data-date-format="m-d-Y">
                          <input type="text" class="form-control" value="<?=isset($_GET['lead_date']) ? $_GET['lead_date'] :''?>" name="lead_date" id="lead_date" placeholder="Lead Create Date">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                      <div  class="input-group date datepicker" data-date-format="m-d-Y">
                          <input type="text" class="form-control" value="<?=isset($_GET['assign_date']) ? $_GET['assign_date'] :''?>" name="assign_date" id="assign_date" placeholder="Lead Assign Date">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                    </div>
                    <div class="col-md-3 mb-3 top-data">
                      <div  class="input-group date datepicker" data-date-format="m-d-Y">
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
                <hr>
                <div class="row m-0">
                  <?php foreach ($inventories as $inventory): ?>
                    <div class="column" onclick="openTab('b1');" style="background:<?=$inventory->color_code?>;">
                        <a href="<?=base_url('index.php/lead/view_lead/').$inventory->id?>">
                            <p class="title"><?=$inventory->name?></p>
                            <p class="lead-des"><?=$inventory->property_address?></p>
                        </a>
                    </div>
                  <?php endforeach; ?>                  
                </div> 
                <div class="row m-0">
                  <div class="col-md-12 mb-5">
                    <?php if($total_rows > $per_page){ ?>
                      <div class="pagination-inv"><?=$links; ?></div>
                    <?php } ?>  
                  </div>     
                </div>                    
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
<script>
$(document).ready(function() {
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        <?php
        $pending = $progress = $booked = $dumped = 0;
        if(!empty($lead_status)) {
            foreach($lead_status as $data){
                if($data['status']=='1'){
                    $pending += 1;
                } else if($data['status']=='2') {
                    $progress += 1;
                }else if($data['status']=='3'){
                    $booked += 1;
                }
                else if($data['status']=='4'){
                  $dumped += 1;
              }
            }
        }?>

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Status'],
            ['New', <?=$pending?>],
            ['Progress', <?=$progress?>],
            ['Booked', <?=$booked?>],
            ['Dumped', <?=$dumped?>],
        ]);

        var options = {
            title: 'Assigned Lead Status',
            verticalAlign: 'middle',
            is3D: true,
            slices: {
                0: { color: '#007bff' },
                1: { color: '#e8df4b' },
                2: { color: '#65b551' },
                3: { color: '#c95150' }
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart3d'));
        chart.draw(data, options);
    }
    //$('#table1').DataTable();
    $("#status_date").datepicker({ dateFormat: 'dd-mm-yy' });
    $("#lead_date").datepicker({ dateFormat: 'dd-mm-yy' });
    $("#assign_date").datepicker({ dateFormat: 'dd-mm-yy' });
    
});
</script>