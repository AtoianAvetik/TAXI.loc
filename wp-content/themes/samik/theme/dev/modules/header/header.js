module('header', function() {
    var $header = $(this),
        $navbar = $header.find('[data-js=navbar]'),
        $stickyNavbar = $header.find('[data-js=navbarSticky]'),
        $body = $('body'),
        isBackdrop = $body.hasClass('-backdrop'),
        scrollTop = $(window).scrollTop(),
        startPoint = 0;

    $(window).on('scroll', function() {
        isBackdrop =  $body.hasClass('-backdrop');
        if ( !isBackdrop ) {
            scrollTop = $(window).scrollTop();
        }

        initStickyNavbarOnScroll();
    });

    $(window).on('resize', function () {
        setTimeout(function () {   // fix bug on mobile device when if change orientation script will call before css animation end and calculate wrong header height
            initStickyNavbarOnScroll();
        }, 300);
    }).resize();

    media('screen and (min-width: 860px)', function() {
        $body.css('padding-top', '');
        $navbar.removeClass('navbar_fixed');
    }, function () {
        $body.css('padding-top', '70px');
        $navbar.addClass('navbar_fixed');
    });

    function initStickyNavbarOnScroll() {
        calculateStartPoint();

        if(scrollTop > startPoint) {
            $stickyNavbar.addClass('-sticky');
        } else {
            $stickyNavbar.removeClass('-sticky');
        }
    }

    function calculateStartPoint() {
        startPoint = $navbar.innerHeight();
    }
});