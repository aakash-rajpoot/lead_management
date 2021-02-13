<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title><?=$site;?></title>
    <meta name="keywords" content="dummy content">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Favicon-->
    <?php if($logo == ""){
        $logo = 'kritak_logo.png';
    } ?>
    <link rel="icon" href="<?=base_url('media/logo/'.$logo)?>" type="image/x-icon">
    <!-- custom css-->
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <script src='https://use.fontawesome.com/2188c74ac9.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
</head>
<?php print_r($this->uri->segment(1)); ?>
    <body class="sidebar-is-reduced">
        <header class="l-header">
            <div class="l-header__inner clearfix">
                <div class="c-header-icon js-hamburger" title="Open">
                    <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
                </div>
                
                <div class="c-search add_search ">
                    <input type="text" class="input_button" placeholder="Search.." name="search2">
                    <button type="submit" class="search_button"><i class="fa fa-search"></i></button>
                </div>
                <div class="header-icons-group">
                    <div class="c-header-icon has-dropdown">
                    <span class=" c-badge--header-icon animated shake"></span><i class="fa fa-bell" title="Notification"></i>
                    <div class="c-dropdown c-dropdown--notifications">
                        <div class="c-dropdown__header"></div>
                        <div class="c-dropdown__content"></div>
                    </div>
                </div>
                    <?php if($profile_image == ''){
                        $profile_image = 'avatar.png';
                    } ?>
                    <div class="dropdown">
                    <div class="c-header-icon user dropbtn"><span class=" c-badge--header-icon animated shake" ></span><a href="<?=base_url('index.php/admin/view_profile');?>"><img src="<?=base_url('media/images/'.$profile_image)?>" alt="round cricle image" class="avatar rounded-circle admin_header_image"></a>
                    <div class="dropdown-content">
                    <div class="row">
                        <a href="<?=base_url('index.php/admin/view_profile');?>">
                            <div class="col-md-12 mb-1 pt-2">
                                <h6 class="view-heading" title="view profile"><i class="fa fa-user" aria-hidden="true"></i> View Profile</h6>
                            </div>
                        </a>
                        <a href="<?=base_url('index.php/admin/change_pass');?>">
                            <div class="col-md-12 mb-1">
                                <h6 class="view-heading" title="change password"><i class="fa fa-key" aria-hidden="true"></i> Change Password</h6>
                            </div>
                        </a>
                        <a href="<?=base_url('index.php/admin/logout');?>">
                            <div class="col-md-12 mb-1">
                                <h6 class="view-heading" title="logout"><i class="fa fa-lock" aria-hidden="true"></i> Logout</h6>
                            </div>
                        </a>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </header>
      
        <div class="l-sidebar">
            <div class="logo">
            <a href="<?=base_url('index.php/admin/admin_dashboard')?>">
                <div class="logo__txt"><img src="<?=base_url('media/logo/'.$logo)?>" class="logo-img" title="<?=$site;?> (<?=$tagline;?>)"></div>
            </a>
            </div>
            <div class="row">
      <div class="col-lg-12">
            <div class="l-sidebar__content">
                <nav class="c-menu js-menu navigation">
                    <ul class="u-list site-menu mainmenu">
                        <li class="c-menu__item is-active" title="Dashboard">
                            <a href="<?=base_url('index.php/admin/admin_dashboard')?>">
                                <div class="c-menu__item__inner menusss">
                                    <i class="fa fa-user"> <span class="icon-titles">&nbsp; Dashboard</span></i>
                                </div>
                            </a>
                        </li>    
                        <li class="c-menu__item site-menu-item main-menu <?php echo $this->uri->segment(1) == 'member' ? 'active' : ''; ?>" title="Sales">
                        <a href="<?=base_url('index.php/member')?>">
                            <div class="c-menu__item__inner menusss">
                                <i class="fa fa-users"> <span class="icon-titles">&nbsp; Sales Team</span></i>
                            </div>
                        </a>
                               
                            <ul class="site-menu-sub limain submenu ">
                                <li class="site-menu-item lichild" title="All Sales Team">  
                                    <a href="<?=base_url('index.php/member')?>">
                                        <div class="c-menu__item__inner submenu-color">
                                            <i class="fa fa-user-circle-o" aria-hidden="true">&nbsp; <span class="icon-titles">Sales User</span></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="site-menu-item lichild" title="Add Sales Team">
                                    <a href="<?=base_url('index.php/member/add_member')?>">
                                        <div class="c-menu__item__inner submenu-color">
                                            <i class="fa fa-user-plus" aria-hidden="true">&nbsp;  <span class="icon-titles">Add User</span></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="c-menu__item site-menu-item main-menu <?php echo $this->uri->segment(1) == 'lead' ? 'active' : ''; ?>" title="Lead">
                        <a href="<?=base_url('index.php/lead')?>"> 
                            <div class="c-menu__item__inner menusss">
                                <i class="fa fa-industry">&nbsp;&nbsp;<span class="icon-titles">Manage Leads</span></i>
                            </div>
                        </a>
                        <ul class="site-menu-sub submenu ">
                            <li class="site-menu-item"  title="All Lead">
                                <a href="<?=base_url('index.php/lead')?>">
                                    <div class="c-menu__item__inner submenu-color">
                                        <i class="fa fa-universal-access" aria-hidden="true">&nbsp;<span class="icon-titles">All Lead</span></i>
                                    </div>
                                </a>
                            </li>
                            <li class="site-menu-item" title="Add Lead"> 
                                <a href="<?=base_url('index.php/lead/add_lead')?>">
                                    <div class="c-menu__item__inner submenu-color">
                                        <i class="fa fa-id-badge" aria-hidden="true">&nbsp; <span class="icon-titles">Add Lead</span></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="c-menu__item site-menu-item main-menu <?php echo $this->uri->segment(1) == 'unit' ? 'active' : ''; ?>" title="Unit">
                        <a href="<?=base_url('index.php/unit')?>"> 
                            <div class="c-menu__item__inner menusss">
                                <i class="fa fa-bar-chart">&nbsp;&nbsp;<span class="icon-titles">Property Unit</span></i>
                            </div>
                        </a>
                        <ul class="site-menu-sub submenu">
                            <li class="site-menu-item"  title="All unit">
                                <a href="<?=base_url('index.php/unit')?>">
                                    <div class="c-menu__item__inner submenu-color">
                                        <i class="fa fa-universal-access" aria-hidden="true">&nbsp;<span class="icon-titles">All Units</span></i>
                                    </div>
                                </a>
                            </li>
                            <li class="site-menu-item" title="Add Unit"> 
                                <a href="<?=base_url('index.php/unit/add_unit')?>">
                                    <div class="c-menu__item__inner submenu-color">
                                        <i class="fa fa-id-badge" aria-hidden="true">&nbsp; <span class="icon-titles">Add Unit</span></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                        <li class="c-menu__item has-submenu " data-toggle="tooltip" title="Settings">
                            <a href="<?=base_url('index.php/setting')?>">
                                <div class="c-menu__item__inner menusss">
                                    <i class="fa fa-cogs">&nbsp;&nbsp;<span class="icon-titles">Settings</span></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        </div>
        </div>

<script>
  $( function() {
    $( "#joining_date" ).datepicker({dateFormat:'dd-mm-yy'});
    // $( "#joining_date" ).datepicker('show');
    $( "#dob" ).datepicker({dateFormat:'dd-mm-yy'});
  });
  </script>
<script>
$(document).ready(function() {       
	$('#checkbox').multiselect({		
		nonSelectedText: 'Select Unit '				
	});
});
</script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
    $(document).ready(function(){

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    <?php
        $pending = $progress = $booked = 0;
        foreach($lead_status as $data){
            if($data['status']=='1'){
                $pending += 1;
            } else if($data['status']=='2') {
                $progress += 1;
            }else{
                $booked += 1;
            }
        }?>

var data = google.visualization.arrayToDataTable([
['Task', 'Status'],
['Pending', <?=$pending;?>],
['Progress', <?=$progress;?>],
['Booked', <?=$booked;?>]
]);

var options = {
title: 'Assigned Lead Status',
is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('piechart3d'));

chart.draw(data, options);
}


});

$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
</script>
<script>
    $(function () {
  $("#datepicker1").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
    </script>