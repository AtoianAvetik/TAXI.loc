<?php if (!defined('FW')) die('Forbidden');

class FW_Shortcode_Cards extends FW_Shortcode
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
}