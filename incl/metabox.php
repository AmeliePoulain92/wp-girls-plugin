<?php

add_action('add_meta_boxes', 'my_girls_fields', 1);

function my_girls_fields() {
	add_meta_box( 'extra_fields', 'Свойства Девушек', 'extra_fields_box_func', 'girls', 'normal', 'high'  );
}

function extra_fields_box_func( $post ){
	?>
	<p>
		<label>
			Возраст: 
			<input type="text" name="girls[age]" value="<?php echo get_post_meta($post->ID, 'age', 1); ?>" style="width:50%" />
		</label>
	</p>
	<p>
		<label>
			Бюст: 
			<input type="text" name="girls[bust]" value="<?php echo get_post_meta($post->ID, 'bust', 1); ?>" style="width:50%" />
		</label>
	</p>
	<p>
		<label>
			Бедра: 
			<input type="text" name="girls[thighs]" value="<?php echo get_post_meta($post->ID, 'thighs', 1); ?>" style="width:50%" />
		</label>
	</p>
	<p>
		<label>
			Рост: 
			<input type="text" name="girls[growth]" value="<?php echo get_post_meta($post->ID, 'growth', 1); ?>" style="width:50%" />
		</label>
	</p>
	<p>
		<label>
			Вес: 
			<input type="text" name="girls[weight]" value="<?php echo get_post_meta($post->ID, 'weight', 1); ?>" style="width:50%" />
		</label>
	</p>

	<input type="hidden" name="girls_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<?php
}

add_action('save_post', 'my_girls_fields_update', 0);

function my_girls_fields_update( $post_id )
{
	if ( !isset($_POST['girls_fields_nonce']) || !wp_verify_nonce($_POST['girls_fields_nonce'], __FILE__) ) return false; 
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; 

	if ( !current_user_can('edit_post', $post_id) ) return false; 

	if( !isset($_POST['girls']) ) return false; 

	$_POST['girls'] = array_map('trim', $_POST['girls']);

	foreach( $_POST['girls'] as $key=>$value ){

		if( empty($value) ){
			delete_post_meta($post_id, $key); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
	}
	return $post_id;
}