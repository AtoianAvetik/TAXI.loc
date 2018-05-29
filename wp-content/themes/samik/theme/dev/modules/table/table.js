module('highlightTable', function () {
    var $table = $(this).find('[data-js=table]'),
        $cells = $table.find('[data-col*=col]');

    $cells.hover(function () {
        $cells.filter("[data-col='" + this.getAttribute('data-col') + "']").addClass('col-hover');
    }, function () {
        $cells.filter("[data-col='" + this.getAttribute('data-col') + "']").removeClass('col-hover');
    });
});