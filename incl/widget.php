<?php  

class wpb_widget extends WP_Widget {

	function __construct() {
		parent::__construct(

		'wpb_widget', 

		__('Random Girl', 'wpb_widget_domain'), 

		array( 'description' => __( 'Sample widget based on GIRLS Tutorial', 'wpb_widget_domain' ), ) 
		);
	}

	public function widget( $args, $instance ) {

		
		$args = array(
			'post_type' => 'girls',
			'orderby'	=> 'rand',
			'post_status' => 'publish',
			'posts_per_page' => 1, 
			);

		$the_query = new WP_Query( $args ); ?>

		<section class="girls-widget">

		<?php $title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) ?>
		
		<h2 class="widget-title"><?php echo $args['before_title'] . $title . $args['after_title']; ?></h2>

		<?php if ( $the_query->have_posts() ) { ?>
			<div class="girls-post-wrapper">
			<?php while ( $the_query->have_posts() ) {  
				$the_query->the_post(); ?>
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
			<?php }
			wp_reset_postdata();
		} else {

		$string .= 'в данный момент все девушки заняты.';
		} ?>
		</div>	
		<!-- girls-post-wrapper  -->
		</section>
		<?php echo $args['after_widget'];
	}
		
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
		}
		else {
		$title = __( 'New title', 'wpb_widget_domain' );
		}

		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
	

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} 

function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
