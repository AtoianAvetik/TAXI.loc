<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$section_extra_classes = ( isset( $atts['gaps'] ) && $atts['gaps'] === 'yes' ) ? 'm-gap' : '';

$custom_class = ( isset( $atts['custom_class'] ) && $atts['custom_class'] ) ? ' ' . $atts['custom_class'] . '' : '';
$custom_id = ( isset( $atts['custom_id'] ) && $atts['custom_id'] ) ? ' id="' . $atts['custom_id'] . '"': '';
?>
<section<?php echo $custom_id; ?> class="<?php echo $custom_class; ?> <?php echo esc_attr($section_extra_classes) ?>">
        <?php if ( $atts['is_fullwidth'] === 'no' ): ?>
            <div class="container">
        <?php endif; ?>
            <?php if ( ! empty ( $atts['content_heading'] ) ): ?>
                <div class="content-heading row -center no-gutters">
                    <div class="heading h3 primary-text">
                        <?php echo $atts['content_heading'] ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row -center">
                <?php echo do_shortcode( $content ); ?>
            </div>
        <?php if ( $atts['is_fullwidth'] === 'no' ): ?>
            </div>
        <?php endif; ?>
</section>