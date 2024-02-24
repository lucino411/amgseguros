<?php	
/*
	
		@package latincorrosionheme
	
	========================
		WIDGET CLASS
	========================
*/

class BE_Profile_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'blastingexperts-profile-widget',
			'description' => 'Custom BE Profile Widget',
		);
		parent::__construct( 'blastingexperts_profile', 'Blasting Experts Profile', $widget_ops );
		
	}
	
	//back-end display of widget
	public function form( $instance ) {
		echo '<p><strong>No hay opciones para este Widget!</strong><br/>Puedes controlar los campos de este Widget desde <a href="./admin.php?page=blastingexperts">Esta Página</a></p>';
	}
	
	//front-end display of widget
	public function widget( $args, $instance ) {
		
		$picture = esc_attr( get_option( 'profile_picture' ) );
		$firstName = esc_attr( get_option( 'first_name' ) );
		$lastName = esc_attr( get_option( 'last_name' ) );
		$fullName = $firstName . ' ' . $lastName;
		$description = esc_attr( get_option( 'user_description' ) );
		
		$twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
		$facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
		$gplus_icon = esc_attr( get_option( 'gplus_handler' ) );
		
		echo $args['before_widget'];
		?>
		<div class="text-center">
			<div class="image-container">
				<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
			</div>
			<h1 class="blastingexperts-username"><?php print $fullName; ?></h1>
			<h2 class="blastingexperts-description"><?php print $description; ?></h2>
			<div class="icons-wrapper">
				<?php if( !empty( $twitter_icon ) ): ?>
					<a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank"><span class="blastingexperts-icon-sidebar be-icons icon-twitter"></span></a>
					<?php endif; 
				if( !empty( $gplus_icon ) ): ?>
					<a href="https://plus.google.com/u/0/+<?php echo $gplus_icon; ?>" target="_blank"><span class="blastingexperts-icon-sidebar be-icons icon-google"></span></a>
					<?php endif; 
				if( !empty( $facebook_icon ) ): ?>
					<a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank"><span class="blastingexperts-icon-sidebar be-icons icon-facebook"></span></a>
					<?php endif; ?>
			</div>
		</div>
				<?php
		echo $args['after_widget'];
	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'BE_Profile_Widget' );
} );


/*
	Edit default WordPress widgets
*/

function be_tag_cloud_font_change( $args ) {
	
	$args['smallest'] = 10;
	$args['largest'] = 13;
	
	return $args;
		
}
add_filter( 'widget_tag_cloud_args', 'be_tag_cloud_font_change' );


function blastingexperts_list_categories_output_change( $links ) {
	
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	
	return $links;
	
}
add_filter( 'wp_list_categories', 'blastingexperts_list_categories_output_change' );

/*
	Save Posts views
*/
function blastingexperts_save_post_views( $postID ) {
	
	$metaKey = 'blastingexperts_post_views';
	$views = get_post_meta( $postID, $metaKey, true );
	
	$count = ( empty( $views ) ? 0 : $views );
	$count++;
	
	update_post_meta( $postID, $metaKey, $count );
	
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/*
	Popular Posts Widget
*/

class BE_Popular_Posts_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'blastingexperts-popular-posts-widget',
			'description' => 'Popular Posts Widget',
		);
		parent::__construct( 'blastingexperts_popular_posts', 'BE Popular Posts', $widget_ops );
		
	}
	
	// back-end display of widget
	public function form( $instance ) {
		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Popular Posts' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';
		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Posts:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';
		
		echo $output;
		
	}
	
	//update widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
		return $instance;
		
	}
	
	//front-end display of widget
	public function widget( $args, $instance ) {
		
		$tot = absint( $instance[ 'tot' ] );
		
		$posts_args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $tot,
			'meta_key'			=> 'blastingexperts_post_views',
			'orderby'			=> 'meta_value_num',
			'order'				=> 'DESC'
		);
		
		$posts_query = new WP_Query( $posts_args );
		
		echo $args[ 'before_widget' ];
		
		if( !empty( $instance[ 'title' ] ) ):
			
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
		endif;
		
		if( $posts_query->have_posts() ):
		
			//echo '<ul>';
				
			while( $posts_query->have_posts() ): $posts_query->the_post();
				
			echo '<div class="media">';
			echo '<div class="media-left"><img class="media-object" src="' . get_template_directory_uri() . '/img/post-' . ( get_post_format() ? get_post_format() : 'standard') . '.png" alt="' . get_the_title() . '"/></div>';
			echo '<div class="media-body">';
			echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';
			// echo '<div class="row"><div class="col-12">'. blastingexperts_posted_footer( true ) .'</div></div>';
			echo '</div>';
			echo '</div>';
			endwhile;
				
			//echo '</ul>';
		
		endif;
		
		echo $args[ 'after_widget' ];
		
	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'BE_Popular_Posts_Widget' );
} );


/*
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
	 Custom Taxonomies Widget                    
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
*/


/*-- ----- Granalladoras Widget ----- --*/
	class BE_Portafolio_Granalladoras_Widget extends WP_Widget {
	
		//setup the widget name, description, etc...
		public function __construct() {
			
			$widget_ops = array(
				'classname' => 'blastingexperts-portafolio-granalladoras-widget',
				'description' => 'Granalladoras Portafolio',
			);
			parent::__construct( 'blastingexperts_portafolio_granalladoras', 'Granalladoras Portafolio', $widget_ops );
			
		}
		
		// back-end display of widget
		public function form( $instance ) {
			
			$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Granalladoras' );
			$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
			
			$output = '<p>';
			$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
			$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
			$output .= '</p>';
			
			$output .= '<p>';
			$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
			$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
			$output .= '</p>';
			
			echo $output;
			
		}

		
		//update widget
		public function update( $new_instance, $old_instance ) {
			
			$instance = array();
			$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
			$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
			
			return $instance;
			
		}

		//front-end display of widget
		function widget( $args, $instance ) {
			echo $args['before_widget'];			
			$title = apply_filters( 'widget_title', $instance['title'] );
			if( !empty( $instance[ 'title' ] ) ):
				
				echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
				
			endif;
			
			echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
					'hide_empty'		=> 0,
					'post_type'			=> 'post',
					'orderby' 			=> 'term_order',
					'hierarchical' 		=> 1,
					'taxonomy' 			=> 'granalladoras',
					'echo'				=> 0,
					'title_li' 			=> '')) . "</ul>";
			echo $args['after_widget'];
		}
		
	}
	
	add_action( 'widgets_init', function() {
		register_widget( 'BE_Portafolio_Granalladoras_Widget' );
	} );


/*-- ----- Tolvas Widget ----- --*/

// class BE_Portafolio_Tolvas_Widget extends WP_Widget {
	
// 	//setup the widget name, description, etc...
// 	public function __construct() {
		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-tolvas-widget',
// 			'description' => 'Tolvas Portafolio',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_tolvas', 'Tolvas Portafolio', $widget_ops );
		
// 	}
	
// 	// back-end display of widget
// 	public function form( $instance ) {
		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Tolvas' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';
		
// 		echo $output;
		
// 	}

	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {
		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
// 		return $instance;
		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];			
// 		endif;		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'tolvas',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}
	
// }

// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_Tolvas_Widget' );
// } );


/*-- ----- Wet Blasting Widget ----- --*/

// class BE_Portafolio_Wetblasting_Widget extends WP_Widget {
	
// 	//setup the widget name, description, etc...
// 	public function __construct() {		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-wetblasting-widget',
// 			'description' => 'Wet Blasting Portafolio',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_wetblasting', 'Wet Blasting Portafolio', $widget_ops );
		
// 	}



// 	// back-end display of widget
// 	public function form( $instance ) {		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Wet Blasting' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';		
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';		
// 		echo $output;
// 	}

	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );		
// 		return $instance;
		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):
			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
// 		endif;
		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'wetblasting',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}
	
// }

// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_Wetblasting_Widget' );
// } );



/*-- ----- Abrasivos Widget ----- --*/

// class BE_Portafolio_Abrasivos_Widget extends WP_Widget {
	
// 	//setup the widget name, description, etc...
// 	public function __construct() {
		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-abrasivos-widget',
// 			'description' => 'Abrasivos Portafolio',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_abrasivos', 'Abrasivos Portafolio', $widget_ops );
		
// 	}
	
// 	// back-end display of widget
// 	public function form( $instance ) {
		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Abrasivos' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';		
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';
		
// 		echo $output;
		
// 	}
	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {
		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
// 		return $instance;
		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):
			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
// 		endif;
		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'abrasivos',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}
	
// }

// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_Abrasivos_Widget' );
// } );

/*-- ----- Boquillas, Mangueras y Acoples Widget ----- --*/

// class BE_Portafolio_BMyA_Widget extends WP_Widget {
	
// 	//setup the widget name, description, etc...
// 	public function __construct() {
		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-bmya-widget',
// 			'description' => 'Abrasivos Portafolio',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_bmya', 'Boquillas, Mangueras y Acoples Portafolio', $widget_ops );
		
// 	}
	
// 	// back-end display of widget
// 	public function form( $instance ) {
		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Boquillas, Mangueras y Acoples' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';		
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';
		
// 		echo $output;
		
// 	}
	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {
		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
// 		return $instance;
		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):
			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
// 		endif;
		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'bmya',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}
	
// }

// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_BMyA_Widget' );
// } );


/*-- ----- Hidrolavadoras Widget ----- --*/

// class BE_Portafolio_Hidrolavadoras_Widget extends WP_Widget {
	
// 	//setup the widget name, description, etc...
// 	public function __construct() {
		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-hidrolavadoras-widget',
// 			'description' => 'Hidrolavadoras Portafolio',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_hidrolavadoras', 'Hidrolavadoras Portafolio', $widget_ops );
		
// 	}
	
// 	// back-end display of widget
// 	public function form( $instance ) {
		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Hidrolavadoras' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';		
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';
		
// 		echo $output;
		
// 	}
	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {
		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
// 		return $instance;
		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):
			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
// 		endif;
		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'hidrolavadoras',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}
	
// }

// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_Hidrolavadoras_Widget' );
// } );


/*-- ----- Inspección, Medición y Control Widget ----- --*/

// class BE_Portafolio_IMYC_Widget extends WP_Widget {
	
// 	//setup the widget name, description, etc...
// 	public function __construct() {
		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-imyc-widget',
// 			'description' => 'Hidrolavadoras Portafolio',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_imyc', 'Inspección, Medición y Control Widget  Portafolio', $widget_ops );
		
// 	}
	
// 	// back-end display of widget
// 	public function form( $instance ) {
		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Inspección, Medición y Control' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';		
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';
		
// 		echo $output;
		
// 	}
	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {
		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
// 		return $instance;
		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):
			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
// 		endif;
		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'imyc',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}
	
// }

// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_IMYC_Widget' );
// } );


/*-- ----- Láser Widget ----- --*/

// class BE_Portafolio_Laser_Widget extends WP_Widget {
	
// 	//setup the widget name, description, etc...
// 	public function __construct() {
		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-laser-widget',
// 			'description' => 'Láser Portafolio',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_laser', 'Sistema de Limpieza Láser', $widget_ops );
		
// 	}
	
// 	// back-end display of widget
// 	public function form( $instance ) {
		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Láser' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';		
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';
		
// 		echo $output;
		
// 	}
	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {
		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
// 		return $instance;
		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):
			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
// 		endif;
		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'laser',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}
	
// }

// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_Laser_Widget' );
// } );


/*-- ----- Protección Operario-PPE Widget ----- --*/

// class BE_Portafolio_PPE_Widget extends WP_Widget {	
// 	//setup the widget name, description, etc...
// 	public function __construct() {		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-ppe-widget',
// 			'description' => 'Protección Operario-PPE',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_ppe', 'Protección Operario-PPE', $widget_ops );		
// 	}
	
// 	// back-end display of widget
// 	public function form( $instance ) {		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Protección Operario-PPE' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';		
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';		
// 		echo $output;		
// 	}
	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );		
// 		return $instance;		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];			
// 		endif;		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'ppe',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}	
// }
// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_PPE_Widget' );
// } );

/*-- ----- Secadores y Deshumidificadores Widget ----- --*/

// class BE_Portafolio_SecyDeshum_Widget extends WP_Widget {
	
// 	//setup the widget name, description, etc...
// 	public function __construct() {
		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-secydeshum-widget',
// 			'description' => 'Secadores y Deshumidificadores',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_secydeshum', 'Secadores y Deshumidificadores', $widget_ops );
		
// 	}
	
// 	// back-end display of widget
// 	public function form( $instance ) {
		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Secadores y Deshumidificadores' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';		
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';
		
// 		echo $output;
		
// 	}
	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {
		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
// 		return $instance;
		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):
			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
// 		endif;
		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'secydeshum',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}
	
// }

// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_SecyDeshum_Widget' );
// } );

/*-- ----- Shot Peening Widget ----- --*/

// class BE_Portafolio_ShotPeening_Widget extends WP_Widget {
	
// 	//setup the widget name, description, etc...
// 	public function __construct() {
		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-shotpeening-widget',
// 			'description' => 'Shot Peening',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_shotpeening', 'Shot Peening', $widget_ops );
		
// 	}
	
// 	// back-end display of widget
// 	public function form( $instance ) {
		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Shot Peening' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';		
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';
		
// 		echo $output;
		
// 	}
	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {
		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
// 		return $instance;
		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):
			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
// 		endif;
		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'shotpeening',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}
	
// }

// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_ShotPeening_Widget' );
// } );

/*-- ----- Water Jetting Widget ----- --*/

// class BE_Portafolio_Water_Jetting_Widget extends WP_Widget {
	
// 	//setup the widget name, description, etc...
// 	public function __construct() {
		
// 		$widget_ops = array(
// 			'classname' => 'blastingexperts-portafolio-water-jetting-widget',
// 			'description' => 'Water Jetting Portafolio',
// 		);
// 		parent::__construct( 'blastingexperts_portafolio_water_jetting', 'Water Jetting', $widget_ops );
		
// 	}
	
// 	// back-end display of widget
// 	public function form( $instance ) {
		
// 		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Water Jetting' );
// 		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
// 		$output = '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
// 		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
// 		$output .= '</p>';		
// 		$output .= '<p>';
// 		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
// 		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
// 		$output .= '</p>';
		
// 		echo $output;
		
// 	}
	
// 	//update widget
// 	public function update( $new_instance, $old_instance ) {
		
// 		$instance = array();
// 		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
// 		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
// 		return $instance;
		
// 	}

// 	//front-end display of widget
// 	function widget( $args, $instance ) {
// 		echo $args['before_widget'];			
// 		$title = apply_filters( 'widget_title', $instance['title'] );
// 		if( !empty( $instance[ 'title' ] ) ):
			
// 			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
// 		endif;
		
// 		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
// 				'hide_empty'		=> 0,
// 				'post_type'			=> 'post',
// 				'orderby' 			=> 'term_order',
// 				'hierarchical' 		=> 1,
// 				'taxonomy' 			=> 'waterjetting',
// 				'echo'				=> 0,
// 				'title_li' 			=> '')) . "</ul>";
// 		echo $args['after_widget'];
// 	}
	
// }

// add_action( 'widgets_init', function() {
// 	register_widget( 'BE_Portafolio_Water_Jetting_Widget' );
// } );

/*-- ----- Alquiler Widget ----- --*/

class BE_Portafolio_Alquiler_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {		
		$widget_ops = array(
			'classname' => 'blastingexperts-portafolio-alquiler-widget',
			'description' => 'Alquiler Portafolio',
		);
		parent::__construct( 'blastingexperts_portafolio_alquiler', 'Alquiler Portafolio', $widget_ops );		
	}
	
	// back-end display of widget
	public function form( $instance ) {		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Láser' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';		
		echo $output;		
	}
	
	//update widget
	public function update( $new_instance, $old_instance ) {		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );		
		return $instance;		
	}

	//front-end display of widget
	function widget( $args, $instance ) {
		echo $args['before_widget'];			
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( !empty( $instance[ 'title' ] ) ):			
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];			
		endif;
		
		echo "<ul class='portafolio-granalladoras-term'>" . wp_list_categories(array(
				'hide_empty'		=> 0,
				'post_type'			=> 'post',
				'orderby' 			=> 'term_order',
				'hierarchical' 		=> 1,
				'taxonomy' 			=> 'alquiler',
				'echo'				=> 0,
				'title_li' 			=> '')) . "</ul>";
		echo $args['after_widget'];
	}	
}

add_action( 'widgets_init', function() {
	register_widget( 'BE_Portafolio_Alquiler_Widget' );
} );


/*-- ----- Categoria Noticias Widget ----- --*/

class BE_Category_News_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {		
		$widget_ops = array(
			'classname' => 'categories-news-widget',
			'description' => 'Categorias Noticias',
		);
		parent::__construct( 'be_categories_news', 'Categoria Noticias', $widget_ops );		
	}
	
	// back-end display of widget
	public function form( $instance ) {		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Noticias' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';		
		echo $output;		
	}
	
	//update widget
	public function update( $new_instance, $old_instance ) {		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );		
		return $instance;		
	}

	//front-end display of widget
	function widget( $args, $instance ) {
		echo $args['before_widget'];			
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( !empty( $instance[ 'title' ] ) ):			
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];			
		endif;
		
		echo "<ul class='category-widget-term'>" . wp_list_categories(array(
				'hide_empty'		=> 0,
				'post_type'			=> 'post',
				'orderby' 			=> 'term_order',
				'hierarchical' 		=> 1,
				'taxonomy' 			=> 'clasificacion',
				'echo'				=> 0,
				'title_li' 			=> '')) . "</ul>";
		echo $args['after_widget'];
	}	}

add_action( 'widgets_init', function() {
	register_widget( 'BE_Category_News_Widget' );
} );

/*-- ----- Categoria Industrias Widget ----- --*/

class BE_Category_Industry_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {		
		$widget_ops = array(
			'classname' => 'categories-industry-widget',
			'description' => 'Categorias Industrias',
		);
		parent::__construct( 'be_categories_industry', 'Categoria Industrias', $widget_ops );		
	}
	
	// back-end display of widget
	public function form( $instance ) {		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Industrias' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';		
		echo $output;		
	}
	
	//update widget
	public function update( $new_instance, $old_instance ) {		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );		
		return $instance;		
	}

	//front-end display of widget
	function widget( $args, $instance ) {
		echo $args['before_widget'];			
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( !empty( $instance[ 'title' ] ) ):			
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];			
		endif;
		
		echo "<ul class='category-widget-term'>" . wp_list_categories(array(
				'hide_empty'		=> 0,
				'post_type'			=> 'post',
				'orderby' 			=> 'term_order',
				'hierarchical' 		=> 1,
				'taxonomy' 			=> 'latinindustrias',
				'echo'				=> 0,
				'title_li' 			=> '')) . "</ul>";
		echo $args['after_widget'];
	}	}

add_action( 'widgets_init', function() {
	register_widget( 'BE_Category_Industry_Widget' );
} );

/*-- ----- Categoria Eventos Widget ----- --*/

class BE_Category_Eventos_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {		
		$widget_ops = array(
			'classname' => 'categories-eventos-widget',
			'description' => 'Categorias Eventos',
		);
		parent::__construct( 'be_categories_eventos', 'Categoria Eventos', $widget_ops );		
	}
	
	// back-end display of widget
	public function form( $instance ) {		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Eventos' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';		
		echo $output;		
	}
	
	//update widget
	public function update( $new_instance, $old_instance ) {		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );		
		return $instance;		
	}

	//front-end display of widget
	function widget( $args, $instance ) {
		echo $args['before_widget'];			
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( !empty( $instance[ 'title' ] ) ):			
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];			
		endif;
		
		echo "<ul class='category-widget-term'>" . wp_list_categories(array(
				'hide_empty'		=> 0,
				'post_type'			=> 'post',
				'orderby' 			=> 'term_order',
				'hierarchical' 		=> 1,
				'taxonomy' 			=> 'latinevento',
				'echo'				=> 0,
				'title_li' 			=> '')) . "</ul>";
		echo $args['after_widget'];
	}	}

add_action( 'widgets_init', function() {
	register_widget( 'BE_Category_Eventos_Widget' );
} );

/*-- ----- Categoria Nosotros Widget ----- --*/
class BE_Category_Nosotros_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {		
		$widget_ops = array(
			'classname' => 'categories-nosotros-widget',
			'description' => 'Categorias Nosotros',
		);
		parent::__construct( 'be_categories_nosotros', 'Categoria Nosotros', $widget_ops );		
	}
	
	// back-end display of widget
	public function form( $instance ) {		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Nosotros' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';		
		echo $output;		
	}
	
	//update widget
	public function update( $new_instance, $old_instance ) {		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );		
		return $instance;		
	}

	//front-end display of widget
	function widget( $args, $instance ) {
		echo $args['before_widget'];			
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( !empty( $instance[ 'title' ] ) ):			
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];			
		endif;
		
		echo "<ul class='category-widget-term'>" . wp_list_categories(array(
				'hide_empty'		=> 0,
				'post_type'			=> 'post',
				'orderby' 			=> 'term_order',
				'hierarchical' 		=> 1,
				'taxonomy' 			=> 'latinnosotros',
				'echo'				=> 0,
				'title_li' 			=> '')) . "</ul>";
		echo $args['after_widget'];
	}	}

add_action( 'widgets_init', function() {
	register_widget( 'BE_Category_Nosotros_Widget' );
} );

/*-- ----- Categoria Proyectos Widget ----- --*/
class BE_Category_Proyectos_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {		
		$widget_ops = array(
			'classname' => 'categories-proyectos-widget',
			'description' => 'Categorias Proyectos',
		);
		parent::__construct( 'be_categories_proyectos', 'Categoria Proyectos', $widget_ops );		
	}
	
	// back-end display of widget
	public function form( $instance ) {		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Proyectos' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Products:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';		
		echo $output;		
	}
	
	//update widget
	public function update( $new_instance, $old_instance ) {		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );		
		return $instance;		
	}

	//front-end display of widget
	function widget( $args, $instance ) {
		echo $args['before_widget'];			
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( !empty( $instance[ 'title' ] ) ):			
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];			
		endif;
		
		echo "<ul class='category-widget-term'>" . wp_list_categories(array(
				'hide_empty'		=> 0,
				'post_type'			=> 'post',
				'orderby' 			=> 'term_order',
				'hierarchical' 		=> 1,
				'taxonomy' 			=> 'pmaquina',
				// 'taxonomy' 			=> 'lugar',
				'echo'				=> 0,
				'title_li' 			=> '')) . "</ul>";
		echo $args['after_widget'];
	}	}

add_action( 'widgets_init', function() {
	register_widget( 'BE_Category_Proyectos_Widget' );
} );