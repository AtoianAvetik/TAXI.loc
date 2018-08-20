module('masonryGallery', function() {
    var $container = $(this);

    var $grid = $container.imagesLoaded( function() {
        // init Masonry after all images have loaded
        $grid.masonry({
            percentPosition: true,
            itemSelector: '.masonry-gallery_item',
            gutter: 20
        });

        media('screen and (max-width: 860px)', function() {
            $grid.masonry({
                gutter: 15
            })
        });
    });

//    Lightbox options
    lightbox.option({
        'fadeDuration': 300,
        'imageFadeDuration': 300,
        'resizeDuration': 300
    })
});