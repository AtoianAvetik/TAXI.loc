<?php if (!defined('FW')) die('Forbidden');

class FW_Shortcode_Forms extends FW_Shortcode
{
	public static function my_thecat() {

		$result = array();

		$categories = get_categories( array(
		    'orderby' => 'name'
		) );

		foreach( $categories as $category ) {
			$result[ $category->term_taxonomy_id  ] = array('text' => $category->name,'attr' => array( 'data-cat'=> $category->term_taxonomy_id  ));
		}

		return $result;
	}

    public function get_forms_from_db()
    {
        $forms_data = get_option('forms_fw_settings_form', array());

        $forms_array = array_map(function($form) {
            return $form['title'];
        }, $forms_data);

        return $forms_array;
    }
}