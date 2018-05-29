module('notification', function() {
    var $notificationBar = $(this),
        $notificationCloseBtn = $notificationBar.find('[data-js=close-btn]');

    $notificationCloseBtn.on('click', function(e) {
        e.preventDefault();

        $notificationBar.removeClass('-active');
    });
});