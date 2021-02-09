<div class="wrap-career " style="margin-top:110px;">
  <div class="content-wrapper content-wrapper--with-bg">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-4">
            <a href="<?=base_url('index.php/member')?>"> 
              <div class="card-counter primary">
                <i class="fa fa-code-fork"></i>
                <span class="count-numbers"><?=$members;?></span>
                <span title="Agent" class="count-name">Agents</span>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?=base_url('index.php/lead')?>"> 
              <div class="card-counter danger">
                <i class="fa fa-ticket"></i>
                <span class="count-numbers"><?=$leads;?></span>
                <span  title="Lead" class="count-name">Leads</span>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?=base_url('index.php/unit')?>"> 
              <div class="card-counter success">
                <i class="fa fa-database"></i>
                <span class="count-numbers"><?=$units;?></span>
                <span title="Unit" class="count-name">Units</span>
              </div>
            </a>
          </div>
          
          <!-- <div class="container">
            <div class="row">
              <div id="piechart3d" style="width:80rem;height:80rem;"></div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
