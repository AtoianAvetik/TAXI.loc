module('accordion', function() {
    var $accordion = $(this),
        $trigger = $accordion.find('*[data-js=trigger]'),
        $activeItem = $accordion.find('*[data-js=item].-active'),
        animationTime = 300,
        isHarmonica = $accordion.data('harmonica');


    $trigger.on('click', function(e) {
        isHarmonica
            ? onHarmonicaTrigger.call(this)
            : onTrigger.call(this);
        e.preventDefault();
    });

    function onHarmonicaTrigger() {
        var $item = $(this).closest('*[data-js=item]');
        closeItem($activeItem);
        assignActiveItem($item);
        openItem($activeItem);
    }

    function onTrigger() {
        var $item = $(this).closest('*[data-js=item]');
        $item.hasClass('-active')
            ? closeItem($item)
            : openItem($item);
    }

    function openItem($item){
        var $content = $item.find('*[data-js=content]');
        $item.addClass('-active');
        $content.stop(true, true).slideDown(animationTime);
    }

    function closeItem($item){
        var $content = $item.find('*[data-js=content]');
        $item.removeClass('-active');
        $content.stop(true, true).slideUp(animationTime);
    }

    function assignActiveItem($item) {
        $activeItem = $item.is($activeItem) ? $() : $item;
    }
});