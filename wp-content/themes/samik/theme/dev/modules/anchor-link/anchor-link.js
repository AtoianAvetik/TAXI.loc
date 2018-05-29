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