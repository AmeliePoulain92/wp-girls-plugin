<?php

// add_action('wp_ajax_get_girl', 'get_random_girl');

function get_random_girl()
{
    $args = array(
        'post__not_in'      => array($_POST['post_id']),
        'post_type'         => 'girls',
        'orderby'           => 'rand',
        'post_status'       => 'publish',
        'posts_per_page'    => 1, 
    ); 

	$query = new WP_Query($args); ?>

	<?php global $post;

	if( $query->have_posts() ): ?>

		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
    
            <div id="<?php the_ID( ); ?>" <?php post_class(); ?>>

                    <?php if(has_post_thumbnail( get_the_ID() )): ?>
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ); ?>"><br/>
                    <?php else: ?>
                        Нет фото <br/>
                    <?php endif; ?>

                   <ul class="girls-characteristics">
                        <li>Имя: <?php the_title(); ?></li>
                        <li>Возраст: <?php echo get_post_meta( get_the_ID(), 'age', TRUE ); ?></li>
                        <li>Бюст: <?php echo get_post_meta( get_the_ID(), 'bust', TRUE ); ?></li>
                        <li>Бедра: <?php echo get_post_meta( get_the_ID(), 'thighs', TRUE ); ?></li>
                        <li>Рост: <?php echo get_post_meta( get_the_ID(), 'growth', TRUE ); ?></li>
                        <li>Вес: <?php echo get_post_meta( get_the_ID(), 'weight', TRUE ); ?></li>
                    </ul>

                    <button type="button" id="ajax_rand_girl">
                        <span>Другая</span>
                    </button>
                </div>
            
		<?php endwhile; ?>

	<?php endif; ?>

	<?php wp_reset_postdata();

	wp_die();
}


add_action('wp_ajax_get_girl', 'get_random_girl');
add_action('wp_ajax_nopriv_get_girl', 'get_random_girl');