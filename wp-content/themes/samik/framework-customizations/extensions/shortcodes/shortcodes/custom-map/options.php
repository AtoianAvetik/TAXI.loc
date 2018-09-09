<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'location' => array(
        'type'  => 'map',
        'value' => array(
            'coordinates' => array(
                'lat'   => -34,
                'lng'   => 150,
            )
        ),
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Location', 'samik'),
        'help'  => __('Find a location by searching or select on the map', 'samik'),
    )
);