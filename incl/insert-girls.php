<?php 
/**
 * Create default girls
**/
function girls_plugin_add_posts()
{
	$girls = array(
		'Girl 1' => array(
			'post_data' => array(
				'post_type'    => 'girls',
				'post_title'   => 'Василиса',
				'post_content' => 'Wanna play with me?',
				'post_status'  => 'publish',
				'post_author'  => 1,
			),
			'post_meta' => array(
				'age' 	 => 21,
				'bust'   => 91,
				'thighs' => 61,
				'growth' => 181,
				'weight' => 61
			)
		), 
		'Girl 2' => array(
			'post_data' => array(
				'post_type'    => 'girls',
				'post_title'   => 'Галя',
				'post_content' => 'Wanna play with me again?',
				'post_status'  => 'publish',
				'post_author'  => 1,
			),
			'post_meta' => array(
				'age' 	 => 22,
				'bust'   => 92,
				'thighs' => 62,
				'growth' => 182,
				'weight' => 62
			)
		), 
		'Girl 3' => array(
			'post_data' => array(
				'post_type'    => 'girls',
				'post_title'   => 'Ира',
				'post_content' => 'Do you remember me?',
				'post_status'  => 'publish',
				'post_author'  => 1,
			),
			'post_meta' => array(
				'age'    => 23,
				'bust'   => 93,
				'thighs' => 63,
				'growth' => 183,
				'weight' => 63
			)
		), 
		'Girl 4' => array(
			'post_data' => array(
				'post_type'    => 'girls',
				'post_title'   => 'Катя',
				'post_content' => 'Do you remember me?',
				'post_status'  => 'publish',
				'post_author'  => 1,
			),
			'post_meta' => array(
				'age'    => 34,
				'bust'   => 74,
				'thighs' => 59,
				'growth' => 150,
				'weight' => 43
			)
		), 
	);

	foreach ($girls as $girl) {

		$girl_post_id = wp_insert_post( $girl['post_data'] );

		foreach ($girl['post_meta'] as $key => $value) {

			update_post_meta( $girl_post_id, $key, $value );
		}
	}

}