module('modal', function() {
    var $container = $(this),
        $body = $('body'),
        $modalTrigger = $('*[data-modal]'),
        $modals = $container.find('*[data-js=modal]'),
        $closeBtn = $container.find('*[data-js=closeBtn]'),
        $activeModal = $(),
        scrollTopPosition = 0,
        isOpened = false;

    $modalTrigger.on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal($(this).data('modal'));
    });

    $modals.outside('click', function() {
        hideModal();
    });

    $closeBtn.on('click', function() {
        hideModal();
    });

    $(document).on('keyup, keydown', function(e) {
        if ( e.keyCode === 27 ) {
            hideModal();
        }
    });

    function getScrollTop() {
        scrollTopPosition = $body.scrollTop();
        $body.css({
            top: -scrollTopPosition
        });
    }

    function setScrollTop() {
        $body.css({
            top: ''
        }).scrollTop(scrollTopPosition);
    }

    function showModal(name) {
        module.backstage.show();
        getScrollTop();
        $activeModal = $container.find('#' + name);
        $body.addClass('-backdrop');
        $activeModal.fadeIn(10, function() {
            $activeModal.addClass('-active');
        });
        isOpened = true;
    }

    function hideModal() {
        if ( isOpened ) {
            module.backstage.hide();
            $body.removeClass('-backdrop');
            $activeModal.removeClass('-active');
            $activeModal.hide();
            isOpened = false;
            setScrollTop();
        }
    }

    return {
        show: showModal,
        hide: hideModal
    }
});
