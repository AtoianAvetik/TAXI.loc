<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$section_extra_classes = '';

$custom_class = ( isset( $atts['custom_class'] ) && $atts['custom_class'] ) ? ' ' . $atts['custom_class'] . '' : '';
$custom_id = ( isset( $atts['custom_id'] ) && $atts['custom_id'] ) ? ' id="' . $atts['custom_id'] . '"': '';
?>
<section<?php echo $custom_id; ?> class="<?php echo $custom_class; ?> <?php echo esc_attr($section_extra_classes) ?>">
    <?php echo do_shortcode( $content ); ?>
</section>
