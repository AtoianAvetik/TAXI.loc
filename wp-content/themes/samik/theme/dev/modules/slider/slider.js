module('swiper', function() {
    var $container = $(this),
        options = $container.data('options'),
        defaultOptions = {
            loop: true,
            centeredSlides: true,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            calculateHeight: true,
            autoHeight: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        };

    //init swiper slider
    new Swiper($container, options || defaultOptions);

    $container.addClass('swiper-container-with-bullets');
});