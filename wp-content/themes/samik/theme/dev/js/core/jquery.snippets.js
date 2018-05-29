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

