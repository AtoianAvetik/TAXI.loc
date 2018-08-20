module('anchorLink', function() {
    var $link = $(this),
        $target = $($link.attr('href') || $link.data('target')),
        scrollTime = 1000;

    $link.on('click', function(e) {
        scrollTo();
        e.preventDefault();
    });

    function scrollTo(){
        $('html, body').animate({
            scrollTop: $target.offset().top
        }, scrollTime);
    }
});

//jQuery for page scrolling

var anchorsController = (function(){
    // Cache selectors
    var topMenu = $('[data-js="navbarSticky"]'),
        topMenuHeight = parseInt(topMenu.outerHeight(true));

    // Bind click handler to menu items
    // so we can get a fancy scroll animation
    $(document).on('click', '[data-anchor]', function(event){
        event.preventDefault();
        event.stopPropagation();
        var anchor = $(this).attr('data-anchor'),
            offsetTop = parseInt($(anchor).offset().top) - topMenuHeight;
        scrollTo(offsetTop);
    });

    function scrollTo(top) {
        $('html, body').animate({
            scrollTop: top
        }, 1000);
    }
})();