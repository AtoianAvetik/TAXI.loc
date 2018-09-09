<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

?>

<section>
    <div class="form-card">
        <div class="form-card_header">
            <div class="form-card_title"><?php echo $atts['title']; ?></div>
        </div>
        <div class="form-card_content">
            <div class="form-card_row">
                <div class="text-content">
                    <?php echo do_shortcode( $atts['text'] ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
