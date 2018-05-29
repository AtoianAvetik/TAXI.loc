$(function () {
   $('[data-show-checkbox]').each(function () {
       var $content = $(this),
           $trigger = $("#" + $content.attr('data-show-checkbox'));
       $trigger.on('click', function () {
           $trigger.is(':checked') ? $content.stop(true, true).slideDown(400) : $content.stop(true, true).slideUp(400);
       });
   });
});