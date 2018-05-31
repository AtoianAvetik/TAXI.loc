<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$title = '';
if ( ! empty( $atts['title'] ) ) {
	$title = $atts['title'];
}
$phone_number = '';
if ( ! empty( $atts['phone_number'] ) ) {
	$phone_number = $atts['phone_number'];
}

?>

<section class="p-gap promo -blue -large-icon">
    <div class="container -narrow">
        <?php if ( ! empty( $title ) ) { ?>
            <span class="promo_title h2"><?php echo $title ?></span>
        <?php } ?>
        <div class="promo_content text-content">
            <p class="h2">
                <i class="thin-icon-phone-call"></i> <?php echo $phone_number ?>
            </p>
        </div>
    </div>
</section>