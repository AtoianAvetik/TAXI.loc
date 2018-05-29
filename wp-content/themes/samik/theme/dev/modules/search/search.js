module('search', function() {
    var $container = $(this),
        $btn = $container.find('*[data-js="btn"]'),
        $closeBtn = $container.find('*[data-js="close-btn"]'),
        $input = $container.find('*[data-js="input"]'),
        $form = $container.find('*[data-js="form"]'),
        isShown = false;

    $btn.on('click', function() {
        showSearch();
        isShown && $form.submit();
    });

    $closeBtn.on('click', function() {
        hideSearch();
    });

    $container.outside('click', function() {
        hideSearch();
    });

    function showSearch() {
        $container.addClass('-active');
        setTimeout(function() {
            $input.focus();
            isShown = true;
        }, 300);
    }

    function hideSearch() {
        $container.removeClass('-active');
        isShown = false;
    }
});
