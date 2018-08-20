module('videoBlock', function() {
    var $container = $(this),
        $iframe = $container.find('iframe'),
        $cover = $container.find('*[data-js=cover]')

    if ( $cover.length ) {
        $iframe.removeAttr('src');

        $container.on('click', function() {
            var src = $iframe.data('src');
            if ( src )
                $iframe.attr('src', src);
            $cover.fadeOut();
        })
    }
});

//Resize

//var $container = $(this);
//// Find all YouTube video
//var $video = $container.find("iframe[src^='//www.youtube.com']"),
//
//    // The element that is fluid width
//    $fluidEl = $container;
//
//// Figure out and save aspect ratio
//$video
//    .data('aspectRatio', this.height / this.width)
//
//    // and remove the hard coded width/height
//    .removeAttr('height')
//    .removeAttr('width');
//
//
//// When the window is resized
//$(window).resize(function() {
//
//    var newWidth = $fluidEl.width();
//
//    // Resize all videos according to their own aspect ratio
//    $video
//        .width(newWidth)
//        .height(newWidth * $video.data('aspectRatio'));
//
//    // Kick off one resize to fix all videos on page load
//}).resize();