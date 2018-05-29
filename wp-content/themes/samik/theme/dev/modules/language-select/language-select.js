module('langugeSelect', function() {
    var $container = $(this),
        $btn = $container.find('*[data-js="btn"]'),
        isLanguageOpen = false;

    $container.on('click', function(event) {
        showOptions();
    });

    $container.outside('click', function() {
        hideOptions();
    });

    $btn.on('click', function() {
        isLanguageOpen && setTimeout(function() {
            hideOptions();
        });
    });

    function showOptions() {
        $container.addClass('-active');
        isLanguageOpen = true;
    }

    function hideOptions() {
        $container.removeClass('-active');
        isLanguageOpen = false;
    }

});

