/* ========================================================================

Main.js ( Main Theme JS file )

Theme Name: Falr - Bootstrap 4 Admin Dashboard Template
Version: 1.0
Author: Vizz Studio
Author URI: http://themeforest.net/user/vizzstudio
If you having trouble in editing js. please send a mail to hq8055@gmail.com

=========================================================================
 */


"use strict";

/*======== Doucument Ready Function =========*/
jQuery(document).ready(function () {

    // === following js will activate the menu in left side bar based on url ====
    $("#sidebar-menu a").each(function () {
        var pageUrl = window.location.href.split(/[?#]/)[0];
        if (this.href == pageUrl) {
            $(this).addClass("active");
            $(this).parent().addClass("active"); // add active to li of the current link
            $(this).parent().parent().addClass("active");
            $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
            $(this).parent().parent().parent().addClass("active");
            $(this).parent().parent().parent().parent().addClass("active"); // add active to li of the current link
            $(this).parent().parent().parent().parent().parent().addClass("active");
        }
    });
    /*--------------------------------
         Mailbox Star
     --------------------------------*/
    $('.mail_list table .star i').click(function(e) {
        $(this).toggleClass("fa-star fa-star-o");
    });

    //CACHE JQUERY OBJECTS
    var $window = $(window);

    $window.on( 'load', function () {
        /*======== Preloader =========*/

        $(".loading-text").fadeOut();
        $(".loading").delay(350).fadeOut("slow");

        /* END of Preloader */

    });

    // Mailbox read mail Link

    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });

    /*================================
    sidebar menu
    ==================================*/

    $("#sidebar_menu").metisMenu();

    $('.button-menu-mobile,.mobile_menu_btn').on('click', function (event) {
        event.preventDefault();
        $("body").toggleClass("side_collapsed");
    });

    if ($(window).width() < 1025 || $('.icon_sidebar').length == 1) {
        $('body').addClass('side_collapsed');
    } else {
        $('body').removeClass('side_collapsed');
    }

    /*================================
    slimscroll activation
    ==================================*/
     $('.menu-inner').slimscroll({
        height: 'auto',
        position: 'right',
        size: "5px",
        color: '#9ea5ab',
        wheelStep: 5,
        touchScrollStep: 50
    });

    $('.slimscroll').slimscroll({
        height: 'auto',
        position: 'right',
        size: "5px",
        color: '#9ea5ab',
        touchScrollStep: 50
    });

    $('.nofity-list').slimScroll({
        height: '435px'
    });
    $('.timeline-area').slimScroll({
        height: '500px'
    });
    $('.recent-activity').slimScroll({
        height: 'calc(100vh - 114px)'
    });
    $('.settings-list').slimScroll({
        height: 'calc(100vh - 158px)'
    });

    // Main Menu Horizontal
    $(function() {
        var body = $('body');
        var footer = $('.footer');

        var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
        $('.rt_nav_header.horizontal-layout .nav-bottom .page-navigation .nav-item').each(function() {
            var $this = $(this);
            if (current === "") {
                //for root url
                if ($this.find(".nav-link").attr('href').indexOf("index.html") !== -1) {
                    $(this).find(".nav-link").parents('.nav-item').last().addClass('active');
                    $(this).addClass("active");
                }
            } else {
                //for other url
                if ($this.find(".nav-link").attr('href').indexOf(current) !== -1) {
                    $(this).find(".nav-link").parents('.nav-item').last().addClass('active');
                    $(this).addClass("active");
                }
            }
        })

        $(".rt_nav_header.horizontal-layout .nav_wrapper_main .navbar-toggler").on("click", function() {
            $(".rt_nav_header.horizontal-layout .nav-bottom").toggleClass("header-toggled");
        });

        // Navigation in mobile menu on click
        var navItemClicked = $('.page-navigation >.nav-item');
        navItemClicked.on("click", function(event) {
            if(window.matchMedia('(max-width: 991px)').matches) {
                if(!($(this).hasClass('show-submenu'))) {
                    navItemClicked.removeClass('show-submenu');
                }
                $(this).toggleClass('show-submenu');
            }
        })

        $(window).scroll(function() {
            if(window.matchMedia('(min-width: 992px)').matches) {
                var header = '.rt_nav_header.horizontal-layout';
                if ($(window).scrollTop() >= 50) {
                    $(header).addClass('fixed-on-scroll');
                } else {
                    $(header).removeClass('fixed-on-scroll');
                }
            }
        });
    });

    /*================================
    //          to-do list
    ==================================*/

    $(".todo_add_item").on('keypress', function(e) {

        var code = (e.keyCode ? e.keyCode : e.which);

        if (code == 13) {

            var v = $(this).val();

            var s = v.replace(/ +?/g, '');

            if (s == "") {

                return false;

            } else {

                $(".todo_content ul").append("<li><label><input type='checkbox'><i></i><span>" + v + "</span><a href='#' class='ti-trash'></a></label></li>");

                $(this).val("");

            }

        }

    });
    $(".submit_list_btn").on('click', function(e) {

        var v = $('.todo_add_item').val();

        var s = v.replace(/ +?/g, '');

        if (s == "") {

            return false;

        } else {

            $(".todo_content ul").append("<li><label><input type='checkbox'><i></i><span>" + v + "</span><a href='#' class='ti-trash'></a></label></li>");

            $('.todo_add_item').val("");

        }

    });

    $(".todo_content a").on("click", function() {

        var _li = $(this).parent().parent("li");

        _li.addClass("remove").stop().delay(100).slideUp("fast", function() {

            _li.remove();

        });

        return false;

    });

    // for dynamically created a tags

    $(".todo_content").on('click', "a", function() {

        var _li = $(this).parent().parent("li");

        _li.addClass("remove").stop().delay(100).slideUp("fast", function() {

            _li.remove();

        });

        return false;

    });

    /*================================
    stickey Header
    ==================================*/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop(),
            mainHeader = $('#sticky-header'),
            mainHeaderHeight = mainHeader.innerHeight();

        // console.log(mainHeader.innerHeight());
        if (scroll > 1) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });
    /*================================
    Start Footer resizer
    ==================================*/
    var e = function() {
        var e = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 5;
        (e -= 67) < 1 && (e = 1), e > 67 && $(".blank_page .main-content").css("min-height", e + "px")
    };
    $(window).ready(e), $(window).on("resize", e);

    /*================================
    form bootstrap validation
    ==================================*/
    $('[data-toggle="popover"]').popover()

    /*------------- Start form Validation -------------*/
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    /*================================
    Fullscreen Page
    ==================================*/

    if ($('#full-view').length) {

        var requestFullscreen = function(ele) {
            if (ele.requestFullscreen) {
                ele.requestFullscreen();
            } else if (ele.webkitRequestFullscreen) {
                ele.webkitRequestFullscreen();
            } else if (ele.mozRequestFullScreen) {
                ele.mozRequestFullScreen();
            } else if (ele.msRequestFullscreen) {
                ele.msRequestFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var exitFullscreen = function() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var fsDocButton = document.getElementById('full-view');
        var fsExitDocButton = document.getElementById('full-view-exit');

        fsDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            requestFullscreen(document.documentElement);
            $('body').addClass('expanded');
        });

        fsExitDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            exitFullscreen();
            $('body').removeClass('expanded');
        });
    }

    /*================================
    slider-area background setting
    ==================================*/
    $('.settings-btn, .offset-close').on('click', function() {
        $('.offset-area').toggleClass('show_hide');
        $('.settings-btn').toggleClass('active');
    });

    /*================================
    login form
    ==================================*/
    $('.form-gp input').on('focus', function() {
        $(this).parent('.form-gp').addClass('focused');
    });
    $('.form-gp input').on('focusout', function() {
        if ($(this).val().length === 0) {
            $(this).parent('.form-gp').removeClass('focused');
        }
    });

    /*======== Brand Slider =========*/

    $("#mt_client .owl-carousel").owlCarousel({
        loop: false,
        margin: 24,
        autoplay: false,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        dot: true,
        smartSpeed:850,
        responsive: {
            0: {
                items: 1,
                dots: true
            },
            600: {
                items: 3,
                dots: true
            },
            1000: {
                items: 5,
                dots: true
            },
            1201: {
                items: 5,
                dots: true
            }
        }
    });
    /*======== End Brand Slider =========*/
    /*======== Team Section =========*/
    $("#mt_team .owl-carousel").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        smartSpeed:850,
        responsive: {
            0: {
                items: 1,
                dots: true
            },
            450: {
                items: 2,
                dots: true
            },
            500: {
                items: 2,
                dots: true
            },
            600: {
                items: 2,
                dots: true
            },
            1000: {
                items: 3,
                dots: true
            },
            1201: {
                items: 3,
                dots: true
            }
        }
    });

    /*======== End Team Section =========*/
    /*======== Testimonial Section =========*/

    $("#mt_testimonial .owl-carousel").owlCarousel({
        loop: false,
        margin: 24,
        autoplay: false,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        dot: true,
        smartSpeed:850,
        responsive: {
            0: {
                items: 1,
                dots: true
            },
            600: {
                items: 1,
                dots: true
            },
            1000: {
                items: 3,
                dots: true
            },
            1201: {
                items: 3,
                dots: true
            }
        }
    });

    /*======== End Testimonial Section =========*/
    /*======== Portfolio Detail 1 Section =========*/

    $(".project_gallery .owl-carousel").owlCarousel({
        center: true,
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsiveBaseElement: window,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 2,
                nav: true
            },
            1201: {
                items: 2,
                nav: true
            }
        }
    });

    /*======== End Portfolio Detail 1 Section =========*/

    /*======== Portfolio Gallery 2 =========*/

    $(".portfolio_gallery .owl-carousel").owlCarousel({
        center: true,
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsiveBaseElement: window,
        responsiveClass: true,
        navText: ["<img src='images/arrow-left.png'>","<img src='images/arrow-right.png'>"],
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            1000: {
                items: 1,
                nav: true
            },
            1201: {
                items: 1,
                nav: true
            }
        }
    });

    /*======== End Portfolio Gallery2 =========*/

});
/*======== End Doucument Ready Function =========*/



