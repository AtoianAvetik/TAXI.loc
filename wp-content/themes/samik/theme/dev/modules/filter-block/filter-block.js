module('filterBlock', function() {
    var $container = $(this),
        $body = $('body'),
        $filterContent = $container.find('.filtr-container'),
        $filterBtn = $container.find('*[data-filter]');

    $filterBtn.on('click', function() {
        toggleButtons($(this));
    });

    function init() {
        $body.addClass('-overflow_scroll');
        $filterContent.filterizr();
    }

    function toggleButtons($target) {
        $filterBtn.removeClass('-active');
        $target.addClass('-active');
    }

    init();
});