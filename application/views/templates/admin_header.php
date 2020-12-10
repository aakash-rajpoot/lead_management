<html>

<head>

    <meta charset='UTF-8'>
    <!-- <link rel="canonical" href="https://codepen.io/jaca90/pen/vZJZMx?depth=everything&order=popularity&page=10&q=statistics&show_forks=false" /> -->
    <title>kritak</title>
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
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src='https://use.fontawesome.com/2188c74ac9.js'></script>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script> -->
    <!-- <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
    <script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <script src='https://use.fontawesome.com/2188c74ac9.js'></script>
  <style>

  .submenus{
    margin-left: -25px;
  }

  /* add */
  /* Dropdown Button */

.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  margin-top:218px;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 153px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 5px 16px;
  text-decoration: none;
  text-align:center;
  display: block;
}


/* Change color of dropdown links on hover */
/* .dropdown-content a:hover {
    margin-left: 30px;
} */

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
/* .dropdown:hover .dropbtn {background-color: #3e8e41;} */

  </style>
</head>
<div style="margin-top:150px margin-bottom:150px">
    <body class="sidebar-is-reduced">
        <header class="l-header">
            <div class="l-header__inner clearfix">
                <div class="c-header-icon js-hamburger" title="Open">
                    <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
                </div>
                <div class="c-search">
                    <input class="c-search__input u-input" placeholder="Search..." type="text" />
                </div>
                <div class="header-icons-group">
                    <div class="c-header-icon has-dropdown">
                        <span class=" c-badge--header-icon animated shake"></span><i class="fa fa-bell" title="Notification"></i>
                        <div class="c-dropdown c-dropdown--notifications">
                            <div class="c-dropdown__header"></div>
                            <div class="c-dropdown__content"></div>
                        </div>
                    </div>
                    <!-- <div class="c-header-icon basket"><span class=" c-badge--header-icon animated shake"></span><i class="fa fa-shopping-basket"></i></div> -->
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
                <!-- <div class="c-header-icon logout"><a href="<?//=base_url('index.php/admin/logout');?>"><i class="fa fa-power-off" title="Logout"></i></a></div> -->
                </div>
            </div>
        </header>
        <div class="l-sidebar">
            <div class="logo">
                <div class="logo__txt"><img src="<?=base_url('media/kritak_logo.png')?>" class="logo-img" title="logo"></div>
            </div>
            <div class="l-sidebar__content">
                <nav class="c-menu js-menu">
                    <ul class="u-list">
                        <li class="c-menu__item is-active" data-toggle="tooltip" title="Profile">
                            <div class="c-menu__item__inner"><i class="fa fa-user"></i>
                                <div class="c-menu-item__title"><span>Profile</span></div>
                            </div>
                        </li>
                        <li class="c-menu__item has-submenu " data-toggle="tooltip" title="Members">
                        <div class="c-menu__item__inner"><i class="fa fa-users"></i>
                            <div class="c-menu-item__title"><span>Members</span></div>
                        </div>
                        </li>
                        <div class="c-menu-item__expand js-expand-submenu">
                        <!-- <i class="fa fa-angle-down"></i> -->
                        </div>
                        <ul class="submenus">
                            <li class="c-menu__item "  title="All Member">
                                <a href="<?=base_url('index.php/member')?>">
                                <div class="c-menu__item__inner"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                        <div class="c-menu-item__title  sub-menus"><span>All Members</span></div>
                                </div></a>
                            </li>
                            <li class="c-menu__item" title="Add Member"> 
                            <a href="<?=base_url('index.php/member/add_member')?>">
                                <div class="c-menu__item__inner"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <div class="c-menu-item__title sub-menus"><span>Add Member</span></div>
                                </div>
                                </a>
                            </li>
                        </ul>
                        <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Lead">
                            <div class="c-menu__item__inner"><i class="fa fa-bar-chart"></i>
                                <div class="c-menu-item__title"><span>Lead</span></div>
                            </div>
                        </li>

                        <ul class="submenus">
                            <li class="c-menu__item "  title="All Lead">
                                <a href="<?=base_url('index.php/lead')?>">
                                <div class="c-menu__item__inner"><i class="fa fa-universal-access" aria-hidden="true"></i>
                                        <div class="c-menu-item__title  sub-menus"><span>All Lead</span></div>
                                </div></a>
                            </li>
                            <li class="c-menu__item" title="Add Lead"> 
                            <a href="<?=base_url('index.php/lead/add_lead')?>">
                                <div class="c-menu__item__inner"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <div class="c-menu-item__title sub-menus"><span>Add Lead</span></div>
                                </div>
                                </a>
                            </li>
                            <li class="c-menu__item" title="Assign Lead"> 
                            <a href="<?=base_url('index.php/lead/assign_lead')?>">
                                <div class="c-menu__item__inner"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <div class="c-menu-item__title sub-menus"><span>Assign Lead</span></div>
                                </div>
                                </a>
                            </li>
                        </ul>
  
                        <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Settings">
                        <a href="<?=base_url('index.php/setting')?>">
                            <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
                                <div class="c-menu-item__title"><span>Settings</span></div>
                            </div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </body>

<script>
    "use strict";

    var Dashboard = function() {
        var global = {
            tooltipOptions: {
                placement: "right"
            },
            menuClass: ".c-menu"
        };

        var menuChangeActive = function menuChangeActive(el) {
            var hasSubmenu = $(el).hasClass("has-submenu");
            $(global.menuClass + " .is-active").removeClass("is-active");
            $(el).addClass("is-active");

            // if (hasSubmenu) {
            // 	$(el).find("ul").slideDown();
            // }
        };

        var sidebarChangeWidth = function sidebarChangeWidth() {
            var $menuItemsTitle = $("li .menu-item__title");

            $("body").toggleClass("sidebar-is-expanded");
            $(".hamburger-toggle").toggleClass("is-opened");

            if ($("body").hasClass("sidebar-is-expanded")) {
                $('[data-toggle="tooltip"]').tooltip("destroy");
            } else {
                $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
            }
        };

        return {
            init: function init() {
                $(".js-hamburger").on("click", sidebarChangeWidth);

                $(".js-menu li").on("click", function(e) {
                    menuChangeActive(e.currentTarget);
                });

                $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
            }
        };
    }();

    Dashboard.init();
    //# sourceURL=pen.js
</script>
<script>
/* navigation sub-menu display */

// Change 'hover' to 'click' if you want to


// $('.slideout-menu li').click(
//         function() {
//              $(this).children('.mobile-sub-menu').show();
//         },
//         function() {
//               $(this).children('.mobile-sub-menu').hide();
//     }); 
</script>

</html>