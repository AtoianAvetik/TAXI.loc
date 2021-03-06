<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$bg_image = '';
if ( ! empty( $atts['bg_image'] ) ) {
    $bg_image = $atts['bg_image'];
}

?>

<section class="promo" <?php if ( ! $atts['bg_parallax'] ): ?>style="background-image: url(<?php echo $bg_image['url'] ?>)" <?php endif; ?>>
    <?php if ( $atts['bg_parallax'] ): ?>
        <div class="bg-parallax -absolute" data-parallax="scroll" data-image-src="<?php echo $bg_image['url'] ?>" data-speed="0.3"></div>
    <?php endif; ?>
    <?php if ( ! empty( $atts['bg_video'] ) ): ?>
        <div class="bg-video">
            <video src="<?php echo $atts['bg_video']['url']?>" autoplay loop muted preload="none" type="video/mp4"></video>
        </div>
    <?php endif; ?>
    <div class="promo-container container -narrow">
        <?php if ( ! empty( $atts['title'] ) ): ?>
            <span class="promo_title content-heading text-white"><?php echo $atts['title'] ?></span>
        <?php endif; ?>
        <?php if ( ! empty( $atts['text_content'] ) ): ?>
            <div class="promo_content text-content"><?php echo $atts['text_content'] ?></div>
        <?php endif; ?>
        <?php if ( ! empty( $atts['button'] ) ): ?>
            <div class="promo_btn-block">
                <?php foreach ($atts['button'] as $button): ?>
                    <a class="btn-dark promo_btn" href="#" <?php echo $button['attrs']; ?>><?php echo $button['button_label']; ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>