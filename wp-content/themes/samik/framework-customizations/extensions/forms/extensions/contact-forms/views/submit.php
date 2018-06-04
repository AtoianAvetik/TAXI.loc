<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var int $form_id
 * @var string $submit_button_text
 * @var array $extra_data
 */
?>

<div class="row -center">
	<button class="btn-primary -large" type="submit"><?php echo esc_attr( $submit_button_text ) ?></button>
</div>