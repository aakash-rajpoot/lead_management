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
</head>
<div style="margin-top:150px; margin-bottom:150px;">
    <body class="sidebar-is-reduced">
        <header class="l-header">
            <div class="l-header__inner clearfix">
                <div class="c-header-icon js-hamburger">
                    <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
                </div>
                <div class="c-header-icon has-dropdown">
                    <span class=" c-badge--header-icon animated shake"></span><i class="fa fa-bell"></i>
                    <div class="c-dropdown c-dropdown--notifications">
                        <div class="c-dropdown__header"></div>
                        <div class="c-dropdown__content"></div>
                    </div>
                </div>
                <div class="c-search">
                    <input class="c-search__input u-input" placeholder="Search..." type="text" />
                </div>
                <div class="header-icons-group">
                    <div class="c-header-icon basket"><span class=" c-badge--header-icon animated shake"></span><i class="fa fa-shopping-basket"></i></div>
                    <div class="c-header-icon logout"><i class="fa fa-power-off"></i></div>
                </div>
            </div>
        </header>
        <div class="l-sidebar">
            <div class="logo">
                <div class="logo__txt"><img src="<?=base_url('media/kritak_logo.png')?>" class="logo-img"></div>
            </div>
            <div class="l-sidebar__content">
                <nav class="c-menu js-menu">
                    <ul class="u-list">
                        <li class="c-menu__item is-active" data-toggle="tooltip" title="Profile">
                            <div class="c-menu__item__inner"><i class="fa fa-user"></i>
                                <div class="c-menu-item__title"><span>Profile</span></div>
                            </div>
                        </li>
                        <!-- <li class="c-menu__item is-active" data-toggle="tooltip" title="Members">
                            <div class="c-menu__item__inner"><i class="fa fa-plane"></i>
                                <div class="c-menu-item__title"><span>Members</span></div>
                            </div>
                        </li> -->
                        <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Members">
                            <a href="<?=base_url('index.php/member')?>">
                                <div class="c-menu__item__inner"><i class="fa fa-users"></i>
                                    <div class="c-menu-item__title"><span>Members</span></div>
                                    <div class="c-menu-item__expand js-expand-submenu"><i class="fa fa-angle-down"></i></div>
                                </div>
                            </a>
                        
                        </li>
                        <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Lead">
                            <a href="#table2">
                                <div class="c-menu__item__inner"><i class="fa fa-bar-chart"></i>
                                    <div class="c-menu-item__title"><span>Lead</span></div>
                                </div>
                            </a>
                        </li>
  
                        <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Settings">
                            <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
                                <div class="c-menu-item__title"><span>Settings</span></div>
                            </div>
                        </li>
                        <!-- <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Settings">
                            <a href="http://127.0.0.1:5500/dashboard.html">
                                <div class="c-menu__item__inner"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    <div class="c-menu-item__title"><span>Back</span></div>
                                </div>
                            </a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </body>
  

<!-- <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script> -->

<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script> -->
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

            $("body").toggleClass("sidebar-is-reduced sidebar-is-expanded");
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

</html>