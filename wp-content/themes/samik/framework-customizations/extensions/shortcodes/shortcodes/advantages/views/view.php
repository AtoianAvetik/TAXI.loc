<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$advantages = $atts['advantages'];

?>

<section class="-bg-primary -bg-city p-gap">
    <div class="container">
        <?php if ( ! empty( $atts['title'] ) ): ?>
            <div class="content-heading text-white mb-3">
                <div class="h1"><?php echo $atts['title'] ?></div>
            </div>
        <?php endif; ?>
        <div class="row -around info-card-row">
            <?php
                foreach($advantages as $advantage){
            ?>
                <div class="col-4 col-md-6 col-sm-12">
                    <div class="info-card -solid -light-content">
                        <i class="info-card_icon <?php echo $advantage['icon']['icon-class-without-root']; ?>"></i>
                        <div class="info-card_title h3">
                            <?php echo $advantage['title']; ?>
                        </div>
                        <div class="info-card_content text-content"><?php echo $advantage['text_content']; ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>