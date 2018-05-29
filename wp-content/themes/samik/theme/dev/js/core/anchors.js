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