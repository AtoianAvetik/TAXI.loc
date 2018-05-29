module('menu', function() {
    var $container = $(this),
        $btn = $('.menu-btn'),
        $carret = $container.find('*[data-js=carret]'),
        $body = $('body'),
        isMenuOpen = false,
        scrollTopPosition = 0;

    $btn.on('click', function(event) {
        isMenuOpen ? closeMenu() : openMenu();
    });
    $carret.on('click', function(event) {
        subMenuHandler.apply(this);
        event.stopPropagation();
        event.preventDefault();
    });

    function getScrollTop() {
        console.log($body.scrollTop());
        scrollTopPosition = $body.scrollTop();
        $body.css({
            top: -scrollTopPosition
        });
    }

    function setScrollTop() {
        $body.css({
            top: ''
        }).scrollTop(scrollTopPosition);
    }

    function subMenuHandler() {
        var $subMenu = $(this).parent().next('*[data-js=subMenu]');

        $subMenu.hasClass('-active')
            ? closeSubMenu($subMenu)
            : openSubMenu($subMenu);
    }

    function closeSubMenu($subMenu) {
        $subMenu.slideUp(300, function() {
            $subMenu.removeClass('-active');
        });
    }

    function openSubMenu($subMenu) {
        $subMenu.slideDown(300, function() {
            $subMenu.addClass('-active');
        });
    }

    function openMenu() {
        getScrollTop();
        $container.addClass('-active').slideDown();
        $body.addClass('-backdrop');
        $btn.find('.hamburger').addClass('-active');
        isMenuOpen = true;
    }

    function closeMenu() {
        $container.removeClass('-active').slideUp(200, function() {
            $container.css("display","");
            $body.removeClass('-backdrop');
            setScrollTop();
            isMenuOpen = false;
            $btn.find('.hamburger').removeClass('-active');
        });
    }

    return {
        open: openMenu,
        close: closeMenu
    }
});