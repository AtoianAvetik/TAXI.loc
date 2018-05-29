module('tabs', function() {
    var $container = $(this),
        $trigger = $container.find('*[data-js=trigger]');

    function showTab(id) {
        var $content = $container.find($(id)),
            $tab = $container.find('*[href="'+id+'"]').parent();

        $tab.addClass('-active')
            .siblings()
            .removeClass('-active');
        
        $content.addClass('-active')
            .siblings()
            .removeClass('-active');
    }


    $trigger.on('click', function(e) {
        var id = $(this).attr('href');
        showTab(id);
        e.preventDefault();
    });

    return{
        show: showTab
    }
});