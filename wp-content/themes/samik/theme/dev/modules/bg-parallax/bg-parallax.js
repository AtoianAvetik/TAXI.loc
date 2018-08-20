module('parallax', function() {
    var $container = $(this),
        $img = $container.find('[data-js=parallax-img]'),
        scrolled;

    // Populate img from data attribute.
    var imageSrc = $img.data('image-src');
    var imageHeight = $img.data('height');
    $img.css('background-image','url(' + imageSrc + ')');
    $img.css('height', imageHeight);

    // Attach scroll event to window. Calculate the scroll ratio of each element
    // and change the image position with that ratio.
    // https://codepen.io/lemagus/pen/RWxEYz
    $(window).on('scroll.parallax', function() {
        scrolled = $(window).scrollTop();

        var initY = $img.offset().top;
        var height = $img.height();
        var endY  = initY + $img.height();

        // Check if the element is in the viewport.
        var visible = $img.isInViewport();
        if(visible) {
            var diff = scrolled - initY;
            var ratio = Math.round((diff / height) * 100);
            $img.css('background-position','center ' + parseInt(-(ratio * 1.5)) + 'px')
        }
    })
});

$(function() {
    $(window).on('scroll.px.parallax, scroll.parallax', function (event) {
        if ( $('body').is('.-backdrop') ) {
            event.stopImmediatePropagation();
        }
    });
});