module('gallery', function() {
    
    var $container = $(this),
        $top = $container.find('*[data-js=top]'),
        $thumbs = $container.find('*[data-js=thumbs]'),
        galleryTop, galleryThumbs;
    
    
    function init(){
        galleryTop = new Swiper($top, {
            spaceBetween: 10
        });

        galleryThumbs = new Swiper($thumbs, {
            spaceBetween: 10,
            centeredSlides: true,
            slidesPerView: 'auto',
            touchRatio: 0.2,
            slideToClickedSlide: true
        });

        galleryTop.controller.control = galleryThumbs;
        galleryThumbs.controller.control = galleryTop;

        if ( $container.closest('[data-js=modal]').length ) {
            $container.closest('[data-js=modal]').on('modal.opened', function () {
                update();
            });
        }
    }

    init();

    function update() {
        galleryTop.update();
        galleryThumbs.update();
    }

    return {
        update: update
    }
});

