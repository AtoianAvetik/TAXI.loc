<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

?>

<section>
    <div class="map" data-module="map">
        <div class="map_inner" data-js="map" data-lat="<?php echo $atts['location']['coordinates']['lat']?>" data-lng="<?php echo $atts['location']['coordinates']['lng']?>"></div>
    </div>
</section>
