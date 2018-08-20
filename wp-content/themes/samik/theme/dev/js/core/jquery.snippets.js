//jquery snippets

$.fn.refresh = function() {
    var elems = $(this.selector);
    this.splice(0, this.length);
    this.push.apply( this, elems );
    return this;
};

$.fn.set = function(userEvent, callback){
    $(document).on(userEvent, this.selector, callback);
    return this;
};

$.fn.unset = function(userEvent){
    $(document).off(userEvent, this.selector);
    return this;
};


$.fn.outside = function(userEvent, callback){
    var $self = $(this);

    setTimeout(function(){
        $(document).on(userEvent, function(event){
            var $target = $(event.target);
            if ( $target.closest($self).length < 1 ){
                callback();
            }
        });
    });

    return this;
};

$.fn.isInViewport = function(){
    var node = $(this)[0];
    // Am I visible? Height and Width are not explicitly necessary in visibility
    // detection, the bottom, right, top and left are the essential checks. If an
    // image is 0x0, it is technically not visible, so it should not be marked as
    // such. That is why either width or height have to be > 0.
    var rect = node.getBoundingClientRect();
    return (
        (rect.height > 0 || rect.width > 0) &&
        rect.bottom >= 0 &&
        rect.right >= 0 &&
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.left <= (window.innerWidth || document.documentElement.clientWidth)
    )
};

