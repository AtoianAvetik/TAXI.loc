<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $form_values
 * @var array $shortcode_to_item
 */

?>

<table border="1" cellpadding="10" style="border-collapse: collapse;width: 100%;">
	<tbody>
	<?php foreach ($form_values as $shortcode => $form_value): ?>
		<?php
        $title = '';
        $value = '';

        if ($shortcode_to_item[$shortcode]['type'] === 'card-section') {
            $title = $shortcode_to_item[$shortcode]['options']['title'];
        ?>
                </tbody>
            </table>
            <br>
            <h3><?php echo $title?></h3>
            <table border="1" cellpadding="10" style="border-collapse: collapse;width: 100%;">
                <tbody>
        <?php }

		if ( ! isset( $shortcode_to_item[ $shortcode ] ) ) {
			continue;
		}

		$item = &$shortcode_to_item[$shortcode];

		if ( ! isset( $item['options'] ) ) {
			continue;
		}

		$item_options = &$item['options'];

		switch ($item['type']) {
			case 'checkboxes':
				$title = ( isset( $item_options['label'] ) ) ? fw_htmlspecialchars($item_options['label']) : '';

				if ( ! is_array( $form_value ) || empty( $form_value ) ) {
					break;
				}

				$value = implode(', ', $form_value);
				break;
			case 'iconed-checkboxes':
				$title = ( isset( $item_options['label'] ) ) ? fw_htmlspecialchars($item_options['label']) : '';

				if ( ! is_array( $form_value ) || empty( $form_value ) ) {
					break;
				}

				$value = implode(', ', $form_value);
				break;
			case 'textarea':
				$title = ( isset( $item_options['label'] ) ) ? fw_htmlspecialchars($item_options['label']) : '';
				$value = '<pre>'. fw_htmlspecialchars($form_value) .'</pre>';
				break;
			case 'additional-block':
				$title = ( isset( $item_options['label'] ) ) ? fw_htmlspecialchars($item_options['label']) : '';
                ?>
                <tr>
                    <td colspan="2" valign="top"><b><?php echo $title ?></b></td>
<!--                    <td valign="top">--><?php //echo print_r($item_options, true) ?><!--</td>-->
                </tr>
                <?php
                continue 2;
			case 'recaptcha':
				continue 2;
			default:
				$title = ( isset( $item_options['label'] ) ) ? fw_htmlspecialchars($item_options['label']) : '';

				if (is_array($form_value)) {
                    $value .= '<pre>';
                    foreach ($form_value as $array_value) {
                        $value .= '<span style="display: block">'. fw_htmlspecialchars( print_r($array_value, true) ) .'</span>';
                    }
                    $value .= '</pre>';
				} else {
					$value = fw_htmlspecialchars( $form_value );
				}
		}
		if (!empty($value) || !empty($title)) {
		?>
            <tr>
                <td width="35%" valign="top"><b><?php echo $title ?></b></td>
                <td valign="top"><?php echo $value ?></td>
<!--                <td valign="top">--><?php //echo $item['type'] ?><!--</td>-->
<!--                <td valign="top">--><?php //echo print_r($item_options, true) ?><!--</td>-->
            </tr>
        <?php } ?>
	<?php endforeach; ?>
	</tbody>
</table>
