<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$title = '';
if ( ! empty( $atts['title'] ) ) {
	$title = $atts['title'];
}

    echo do_shortcode( fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' )->render(get_option('forms_fw_settings_form') ) );
?>

