module('backstage', function() {
   var $container = $(this),
       fadeTime = 200;

   return {
       show: function() {
           $container.fadeIn(fadeTime);
       },

       hide: function() {
           $container.fadeOut(fadeTime);
       }
   }
});