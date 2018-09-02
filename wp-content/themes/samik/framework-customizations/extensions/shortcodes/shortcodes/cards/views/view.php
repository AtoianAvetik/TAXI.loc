<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cards = $atts['cards'];

?>

<section class="p-gap">
    <div class="container">
        <?php if ( ! empty( $atts['title'] ) ): ?>
            <div class="content-heading text-white mb-3">
                <div class="h1"><?php echo $atts['title'] ?></div>
            </div>
        <?php endif; ?>
        <div class="row -equal-height card-list">
            <?php
                foreach($cards as $card):
            ?>
                <div class="col-4 col-md-6 col-xs-12">
                    <div class="card -frame">
                        <?php if ( ! empty( $card['image'] ) ) { ?><div class="card_image -bg" style="background-image: url(<?php echo $card['image']['url']?>)"></div><?php } ?>
                        <?php if ( ! empty( $card['title'] ) ) { ?><div class="card_title h4"><?php echo $card['title'] ?></div><?php } ?>
                        <?php if ( ! empty( $card['text_content'] ) ) { ?>
                            <div class="card_content">
                                <div class="text-content"><?php echo $card['text_content'] ?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>