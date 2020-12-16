<html>

<head>

    <meta charset='UTF-8'>
    <title>Kritak</title>
    <meta name="keywords" content="dummy content">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Favicon-->
    <link rel="icon" href="<?=base_url('media/kritak_logo.png')?>" type="image/x-icon" size="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <script src='https://use.fontawesome.com/2188c74ac9.js'></script>
    <!-- custom css-->
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src='https://use.fontawesome.com/2188c74ac9.js'></script>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <script src='https://use.fontawesome.com/2188c74ac9.js'></script>

<style>
<<<<<<< HEAD
  
=======
    .add_search{
        margin-left:450px;
        padding:12px; 
    }
>>>>>>> 63a40b636d2fdf58b3eedab7810d9db932018577
    .search_button{
        border-radius:5px;
        border:1px solid white;
        background-color:transparent ;
        width:60px;
    }
    .input_button{
        border-radius:5px;
        border:1px solid white;
        width:100%;
    }
    .search_button:hover{
        border:1px solid white;
        border-radius:3px;
        background: #0b7dda;
        width:70px;
    }

</style>

</head>
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
                    <div class="dropdown">
                    <div class="c-header-icon user dropbtn"><span class=" c-badge--header-icon animated shake" ></span><i class="glyphicon glyphicon-user" title="Admin"></i>
                    <div class="dropdown-content">
                    <div class="row">
                        <a href="<?=base_url('index.php/admin/view_profile');?>">
                            <div class="col-md-12 mb-1 pt-2">
                                <h5>View Profile</h5>
                            </div>
                        </a>
                        <a href="<?=base_url('index.php/admin/change_pass');?>">
                            <div class="col-md-12 mb-1">
                                <h5>Change Password</h5>
                            </div>
                        </a>
                        <a href="<?=base_url('index.php/admin/logout');?>">
                            <div class="col-md-12 mb-1">
                                <h5>Logout</h5>
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
                <div class="logo__txt"><img src="<?=base_url('media/kritak_logo.png')?>" class="logo-img" title="logo"></div>
            </div>
            <div class="l-sidebar__content">
                <nav class="c-menu js-menu">
                    <ul class="u-list site-menu">
                        <li class="c-menu__item is-active">
                            <a href="<?=base_url('index.php/admin/admin_dashboard')?>">
                                <div class="c-menu__item__inner menusss">
                                    <i class="fa fa-user"> <span class="icon-titles">&nbsp; Dashboard</span></i>
                                        <div class="c-menu-item__title"></div>
                                </div>
                            </a>
                        </li>    
                        <li class="c-menu__item site-menu-item main-menu">
                        <a href="<?=base_url('index.php/member')?>">
                            <div class="c-menu__item__inner menusss">
                                <i class="fa fa-users"> <span class="icon-titles">&nbsp; Members</span></i>
                                <!-- &nbsp; &nbsp; <i class="fa fa-angle-down"></i>  -->
                            </div>
                        </a>
                               
                            <ul class="site-menu-sub ">
                                <li class="site-menu-item" title="All Member">  
                                    <a href="<?=base_url('index.php/member')?>">
                                        <div class="c-menu__item__inner">
                                            <i class="fa fa-user-circle-o" aria-hidden="true">&nbsp; <span class="icon-titles">All Members</span></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="site-menu-item" title="Add Member">
                                    <a href="<?=base_url('index.php/member/add_member')?>">
                                        <div class="c-menu__item__inner">
                                            <i class="fa fa-user-circle" aria-hidden="true">&nbsp;  <span class="icon-titles">Add Member</span></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="c-menu__item site-menu-item main-menu" title="Lead">
                        <a href="<?=base_url('index.php/lead')?>"> 
                            <div class="c-menu__item__inner menusss">
                                <i class="fa fa-bar-chart">&nbsp;&nbsp;<span class="icon-titles">Lead</span></i>
                                <!-- &nbsp; &nbsp; <i class="fa fa-angle-down"></i> --> 
                            </div>
                        </a>
                        <ul class="site-menu-sub ">
                            <li class="site-menu-item "  title="All Lead">
                                <a href="<?=base_url('index.php/lead')?>">
                                    <div class="c-menu__item__inner">
                                        <i class="fa fa-universal-access" aria-hidden="true">&nbsp;<span class="icon-titles">All Lead</span></i>
                                        <!-- <div class="c-menu-item__title  sub-menus"></div> -->
                                    </div>
                                </a>
                            </li>
                            <li class="site-menu-item" title="Add Lead"> 
                                <a href="<?=base_url('index.php/lead/add_lead')?>">
                                    <div class="c-menu__item__inner">
                                        <i class="fa fa-user-circle" aria-hidden="true">&nbsp; <span class="icon-titles">Add Lead</span></i>
                                    </div>
                                </a>
                            </li>
                            <!-- <li class="site-menu-item" title="Assign Lead"> 
                                <a href="<?//=base_url('index.php/lead/assign_lead')?>">
                                    <div class="c-menu__item__inner">
                                        <i class="fa fa-user-circle" aria-hidden="true">&nbsp; <span class="icon-titles">Lead Assign</span></i>
                                    </div>
                                </a>
                            </li> -->
                        </ul>
                    </li>
                        <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Settings">
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
    </body>
<!-- <script>
$(function (event) {
    $(document).ready(function() {
        $('.site-menu li:has(ul)').click(function(e) {
            e.preventDefault();
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).children('ul').slideUp();
            }else{
                $('.site-menu li ul').slideUp();
                $('.site-menu li').removeClass('active');
                $(this).addClass('active');
                $(this).children('ul').slideDown();
            }
        });
    });
});
</script> -->
<script>
 $('.site-menu li').removeClass('active');
                $(this).addClass('active');
                $(this).children('ul').slideDown();
            }
        });
    });
});
</script>

</html>