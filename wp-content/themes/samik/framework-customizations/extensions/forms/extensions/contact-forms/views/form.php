<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $form_id
 * @var string $form_html
 * @var array $extra_data
 */
?>

<div class="container p-gap">
    <div class="content-heading row -center no-gutters">
        <div class="heading h3 primary-text"></div>
    </div>
    <div class="row -center m-gap">
        <div class="col-9 col-md-12">
            <?php echo $form_html; ?>
        </div>
    </div>
</div>