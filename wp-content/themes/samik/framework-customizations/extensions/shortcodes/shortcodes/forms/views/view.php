<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$shortcodes = fw()->extensions->get( 'shortcodes' );
$shortcode_instance = $shortcodes->get_shortcode( 'forms' );

    echo do_shortcode( $shortcodes->get_shortcode( 'contact_form' )->render(get_option('forms_fw_settings_form')[$atts['form']] ) );
?>

