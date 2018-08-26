<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $form_id
 * @var string $form_html
 * @var array $extra_data
 */
?>

<section class="-bg-airport p-gap" id="onlineOrder">
    <div class="container">
        <?php if ( ! empty( $extra_data['form-title'] ) ): ?>
        <div class="content-heading row -center no-gutters">
            <div class="heading h3 primary-text">
                <?php echo $extra_data['form-title'] ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row -center">
            <div class="col-9 col-md-12">
                <?php echo $form_html; ?>
            </div>
        </div>
    </div>
</section>