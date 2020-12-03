<<<<<<< HEAD
=======

>>>>>>> square1
    <main class="l-main" id="table2">
        <div class="content-wrapper content-wrapper--with-bg">
            <h1 class="page-title">Dashboard</h1>
            <div class="page-content">Content goes here</div>
            <div class="row mt-4">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Translation By H. Rackham</h4>
                            <p class="card-text"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
                                more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                            <a href="#" class="btn btn-primary view-more btn-md">View more <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text"> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
                                more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                            <a href="#" class="btn btn-primary view-more btn-md">View more <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>


</main>

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