$(document).ready(function(){
    //init swiper slider
    new Swiper('*[data-js=swiper]', {
        loop: true,
        centeredSlides: true,
        pagination: '.swiper-pagination',
        paginationClickable: true,
        calculateHeight: true,
        autoHeight: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev'
    })
});