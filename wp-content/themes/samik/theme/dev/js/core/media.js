var media = function(expression, matchCallback, mismatchCallback){
    if (matchMedia) {
        var mediaQuery = window.matchMedia(expression);
        mediaQuery.addListener(widthChange);
        widthChange(mediaQuery);
    }

    function widthChange(mediaQuery) {
        if (mediaQuery.matches){
            matchCallback();
        }else{
            (typeof mismatchCallback !== 'undefined') && mismatchCallback();
        }
    }
};

media.isTouch = 'ontouchstart' in document.documentElement || (navigator.MaxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0);