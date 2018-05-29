module.mapInit = function() {
    (module.map instanceof Array)
        ? module.map.forEach(function(map) {
            map.create();
        })
        : module.map.create();
};

module('map', function() {
    var $container = $(this),
        $map = $container.find('*[data-js=map]'),
        lat = $map.data('lat'),
        lng = $map.data('lng'),
        googleMap,
        markerImage = 'img/elements/map-marker.png';

    function createMap() {
        googleMap = new google.maps.Map($map[0], {
            zoom: 12,
            center: {lat: lat, lng: lng}
        });

        createMarker(markerImage, lat, lng);
    }

    function createMarker(img, lat, lng) {

        var marker = new google.maps.Marker({
            position: {lat: lat, lng: lng},
            map: googleMap,
            icon: {
                url: img,
                size: new google.maps.Size(50, 50),
                anchor: new google.maps.Point(25, 50)
            }
        })
    }

    return {
        create: createMap
    }
});

