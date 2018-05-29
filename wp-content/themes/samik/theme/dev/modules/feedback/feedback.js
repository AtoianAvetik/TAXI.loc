module('feedback', function () {
    var $container = $(this).find('[data-js="container"]'),
        $expandBtn = $(this).find('[data-js="expandBtn"]'),
        $collapseBtn = $container.find('[data-js="collapseBtn"]');

    init();

    $expandBtn.on('click', function () {
        expand();
    });

    $collapseBtn.on('click', function () {
        collapse();
    });

    function init() {
        setTimeout(function () {
            $expandBtn.removeClass('feedback-hide');
        }, 2000);
    }

    function expand() {
        $expandBtn.addClass('feedback-hide');

        setTimeout(function () {
            $container.removeClass('feedback-hide');
        }, 300);
    }

    function collapse() {
        $container.addClass('feedback-hide');

        setTimeout(function () {
            $expandBtn.removeClass('feedback-hide');
        }, 600);
    }
});