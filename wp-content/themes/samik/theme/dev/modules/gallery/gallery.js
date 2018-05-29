module('gallery', function() {
    
    var $container = $(this),
        $top = $container.find('*[data-js=top]'),
        $thumbs = $container.find('*[data-js=thumbs]');
    
    
    function init(){
        var galleryTop = new Swiper($top, {
            spaceBetween: 10
        });

        var galleryThumbs = new Swiper($thumbs, {
            spaceBetween: 10,
            centeredSlides: true,
            slidesPerView: 'auto',
            touchRatio: 0.2,
            slideToClickedSlide: true
        });

        galleryTop.params.control = galleryThumbs;
        galleryThumbs.params.control = galleryTop;
    }

    init();
});

