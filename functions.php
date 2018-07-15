<?php 
// Theme parts
require_once get_template_directory() . '/includes/theme-init.php';
register_nav_menus( array(
	'primary' 			=> 	esc_html__( 'Primary Menu', 'lt-blog' ),
	'secondary' 		=> 	esc_html__( 'Secondary Menu', 'lt-blog' ),
) );

function get_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 75);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
$excerpt = $excerpt."  [...]";
return $excerpt;
}

function get_excerpt_sidebar(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 40);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
	$excerpt = $excerpt."...";
	return $excerpt;
	}

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'primary-sidebar',
        'description' => 'Sidebar Bileşeni',
        'before_widget' => '<div id="%1$s" class="card my-4">',
        'after_widget' => '</div>',
        'before_title' => '<h5 id="card_bg" class="card-header"><i class="fa fa-dot-circle-o pull-left" id="icon-hizala"></i> <b>',
        'after_title' => '</b></h5>',
    ));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
			'name' => 'Footer Sol',
			'id' => 'secondary-sidebar',
			'description' => 'Footer Sol Kutu',
			'before_widget' => '<div class="col-md-4">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="text-white"><b>',
			'after_title' => '</b></h2>',
	));
}


if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
			'name' => 'Footer Orta',
			'id' => 'third-sidebar',
			'description' => 'Footer Orta Kutu',
			'before_widget' => '<div class="col-md-4">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="text-white"><b>',
			'after_title' => '</b></h2>',
	));
}


if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
			'name' => 'Footer Sağ',
			'id' => 'fourth-sidebar',
			'description' => 'Footer Sağ Kutu',
			'before_widget' => '<div class="col-md-4">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="text-white"><b>',
			'after_title' => '</b></h2>',
	));
}

/* arama formu özelleştir */
function sidebar_search_form( $form ) {
    $form = '
	<form role="search" method="get" id="searchform" class="searchform" action="'.esc_url( home_url( '/' ) ).'" >
	<div class="card-body">
	<div class="input-group">
	  <input type="text" class="form-control" name="s" id="s" placeholder="Şunu arıyorum..."/>
	  <span class="input-group-btn">
		<button id="araButon searchsubmit" class="btn btn-secondary" type="button">Ara!</button>
	  </span>
	</div>
	</div>
	
	</form>';
    return $form;
}
add_filter( 'get_search_form', 'sidebar_search_form' );

/**
 * Plugin Name:   Customize Widgets
 * Plugin URI:    https://jonpenland.com
 * Description:   Adds an example widget that displays the site title and tagline in a widget area.
 * Version:       1.0
 * Author:        Jon Penland
 * Author URI:    https://www.jonpenland.com
 */
class lt_soundcloud_widget extends WP_Widget {
	// Set up the widget name and description.
	public function __construct() {
	  $widget_options = array( 'classname' => 'soundcloud_widget', 'description' => 'Soundcloud üzerinden ses paylaşım widgeti.(yalnızca sidebar)' );
	  parent::__construct( 'soundcloud_widget', 'Soundcloud (LT-Blog Sidebar)', $widget_options );
	}
	// Create the widget output.
	public function widget( $args, $instance ) { 
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$url = apply_filters( 'widget_url', $instance[ 'url' ] );
		?>
	
	<div class="card my-4">
	<h5 id="card_bg" class="card-header"><i class="fa fa-music pull-left" id="icon-hizala"></i><b> <?php echo  $title; ?> </b></h5>
	<div class="card-body soundcloud">
	 <iframe width="100%" height="150" scrolling="no" frameborder="no" allow="autoplay" src="<?php echo esc_url($url); ?>"></iframe>
   </div>
 </div>
<?php	}
	
	// Create the admin area widget settings form.
	public function form( $instance ) {
	  $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
	  ?>
	  <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		<br>
	
	<?php	$url = ! empty( $instance['url'] ) ? $instance['url'] : ''; 
	  ?>

		<label for="<?php echo $this->get_field_id( 'url' ); ?>">Souncloud URL:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo esc_attr( $url ); ?>" />
		<br><small><span style="color:red">*Embed Url Eklenmelidir.</span></small>
	  </p>
	  
	  <?php


	}
	// Apply settings to the widget instance.
	public function update( $new_instance, $old_instance ) {
	  $instance = $old_instance;
	  $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
	  $instance[ 'url' ] = strip_tags( $new_instance[ 'url' ] );
	  return $instance;
	}
  }
  // Register the widget.
  function lt_register_soundcloud_widget() { 
	register_widget( 'lt_soundcloud_widget' );
  }
  add_action( 'widgets_init', 'lt_register_soundcloud_widget' );






  /************************************************************* */



  class lt_recent_posts_widget extends WP_Widget {
	// Set up the widget name and description.
	public function __construct() {
	  $widget_options = array( 'classname' => 'recent_posts_widget', 'description' => 'LT-Blog Teması için özel olarak tasarlanmış son yazılar widgeti.(yalnızca sidebar)' );
	  parent::__construct( 'recent_posts_widget', 'Son Yazılar (LT-Blog Sidebar) ', $widget_options );
	}
	// Create the widget output.
	public function widget( $args, $instance ) { 
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$postSayisi = apply_filters( 'widget_post_sayisi', $instance[ 'postSayisi' ] );
		?>
	
		
	
       <!-- Popüler -->
       <div class="card my-4">
        <h5 id="card_bg" class="card-header"><i class="fa fa-dot-circle-o pull-left" id="icon-hizala"></i> <b><?php echo esc_attr($title); ?></b></h5>
        <div class="card-body">
		<?php
		if ($postSayisi):
			$postSy = 'posts_per_page=' . $postSayisi;
		else:
			$postSy = 'posts_per_page=5';
	endif; //endif 
	$the_query = new WP_Query( $postSy );
 while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
          <div class="media">

            <div class="media-left">
              <a href="<?php the_permalink(); ?>">
			  <?php if(has_post_thumbnail()): ?>
      <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fg-medium');?>
                <img class="media-object" width="50" height="50" id="round_img" src="<?php echo $image[0]; ?>" alt="<?php esc_attr(the_title()); ?>">
	<?php 
else: ?>
<img class="media-object" width="50" height="50" id="round_img" src="<?php bloginfo('template_url'); ?>/img/img-default.png" alt="<?php esc_attr(the_title()); ?>">

<?php endif; ?>
			  </a>
            </div>

            <div class="media-body">
              <h5 class="media-heading" id="pop_title"><a href="<?php the_permalink(); ?>" id="pop_sidebar"><?php the_title(); ?></a></h5>
              <p id="pop_more"><?php echo get_excerpt_sidebar(); ?></p>
            </div>

          </div>
		  <center><div id="sep"></div></center>
		  <?php 
endwhile;
wp_reset_postdata();
?>
         
        </div>
      </div>

<?php	}
	
	// Create the admin area widget settings form.
	public function form( $instance ) {
	  $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
	  ?>
	  <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Başlık:&nbsp;</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		<br>
	
	<?php	$postSayisi = ! empty( $instance['postSayisi'] ) ? $instance['postSayisi'] : ''; 
	  ?>

		<label for="<?php echo $this->get_field_id( 'postSayisi' ); ?>">Yazı Adedi:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'postSayisi' ); ?>" name="<?php echo $this->get_field_name( 'postSayisi' ); ?>" value="<?php echo esc_attr( $postSayisi ); ?>" />
		<br><small><span style="color:red">*Gösterilecek Yazı Adedi.</span></small>
	  </p>
	  
	  <?php

	}
	// Apply settings to the widget instance.
	public function update( $new_instance, $old_instance ) {
	  $instance = $old_instance;
	  $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
	  $instance[ 'postSayisi' ] = strip_tags( $new_instance[ 'postSayisi' ] );
	  return $instance;
	}
  }
  // Register the widget.
  function lt_register_recent_posts_widget() { 
	register_widget( 'lt_recent_posts_widget' );
  }
  add_action( 'widgets_init', 'lt_register_recent_posts_widget' );





  /************************************************************* */



  class lt_categories_widget extends WP_Widget {
	// Set up the widget name and description.
	public function __construct() {
	  $widget_options = array( 'classname' => 'categories_widget', 'description' => 'LT-Blog Teması için özel olarak tasarlanmış kategoriler widgeti.(yalnızca sidebar)' );
	  parent::__construct( 'categories_widget', 'Kategoriler (LT-Blog) ', $widget_options );
	}
	// Create the widget output.
	public function widget( $args, $instance ) { 
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );

		$categories = get_categories( array(
			'orderby' => 'count',
			'order'   => 'DESC'
		) ); ?>
		 
	<div class="card my-4">

<h5 id="card_bg" class="card-header"><i class="fa fa-list pull-left" id="icon-hizala"></i> <b><?php echo esc_attr($title); ?></b></h5>
<div class="card-body">
  <div class="row">
  
	<div class="col-lg-12">
	  <ul id="cats" class="list-unstyled mb-0">

	  <?php foreach( $categories as $category ) { ?>
		<li>
		  <span id="badge-bg" class="badge badge-info text-center kategori_t">
			<a id="cat_set" href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo esc_html($category->name); ?>(<?php echo $category->category_count; ?>)</a>
		  </span>
		</li>
<?php } ?>

	  </ul>
	</div>

  </div>
</div>

</div>
<?php	}
	
	// Create the admin area widget settings form.
	public function form( $instance ) {
	  $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
	  ?>
	  <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Başlık:&nbsp;</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		<br>
	  <?php

	}
	// Apply settings to the widget instance.
	public function update( $new_instance, $old_instance ) {
	  $instance = $old_instance;
	  $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
	  return $instance;
	}
  }
  // Register the widget.
  function lt_register_categories_widget() { 
	register_widget( 'lt_categories_widget' );
  }
  add_action( 'widgets_init', 'lt_register_categories_widget' );





	
  /************************************************************* */



  class lt_footer_recent_posts extends WP_Widget {
		// Set up the widget name and description.
		public function __construct() {
			$widget_options = array( 'classname' => 'footer_recent', 'description' => 'LT-Blog Teması için özel olarak tasarlanmış son yazılar widgeti.(footer)' );
			parent::__construct( 'footer_recent', 'Son Yazılar (LT-Blog Footer) ', $widget_options );
		}
		// Create the widget output.
		public function widget( $args, $instance ) { 
			$title = apply_filters( 'widget_title', $instance[ 'title' ] );
			$postSayisi = apply_filters( 'widget_post_sayisi', $instance[ 'postSayisi' ] );
			?>
		
			<?php
			if ($postSayisi):
				$postSy = 'posts_per_page=' . $postSayisi;
			else:
				$postSy = 'posts_per_page=5';
		endif; //endif 
?>
		<div class="col-md-4 text-white">
				<h2 class="text-white"><b>Son Yazılar</b></h2>

	<?php	$the_query = new WP_Query( $postSy );
	 while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
						<div class="media">
          <div class="media-left">
						<a href="<?php the_permalink(); ?>">
						<?php if(has_post_thumbnail()): ?>
      <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fg-medium'); ?>
              <img class="media-object" width="50" height="50" id="round_img" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
	<?php else: ?>
	<img class="media-object" width="50" height="50" id="round_img" src="<?php bloginfo('template_url'); ?>/img/img-default.png" alt="<?php the_title(); ?>">
	<?php endif; ?>					
</a>
          </div>
          <div class="media-body">
            <h5 class="media-heading" id="pop_title"><a id="footer_pop" href=""><?php the_title(); ?></a></h5>
            <p id="pop_more" class="pop_more_footer"><?php echo get_excerpt_sidebar(); ?></p>
          </div>
        </div>
				<center><div id="sep"></div></center>
				<?php 
	endwhile;
	wp_reset_postdata();
	?>
	   </div>
					 

	
	<?php	}
		
		// Create the admin area widget settings form.
		public function form( $instance ) {
			$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
			?>
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Başlık:&nbsp;</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
			<br>
		
		<?php	$postSayisi = ! empty( $instance['postSayisi'] ) ? $instance['postSayisi'] : ''; 
			?>
	
			<label for="<?php echo $this->get_field_id( 'postSayisi' ); ?>">Yazı Adedi:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'postSayisi' ); ?>" name="<?php echo $this->get_field_name( 'postSayisi' ); ?>" value="<?php echo esc_attr( $postSayisi ); ?>" />
			<br><small><span style="color:red">*Gösterilecek Yazı Adedi.</span></small>
			</p>
			
			<?php
	
		}
		// Apply settings to the widget instance.
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
			$instance[ 'postSayisi' ] = strip_tags( $new_instance[ 'postSayisi' ] );
			return $instance;
		}
		}
		// Register the widget.
		function lt_register_footer_recent_posts() { 
		register_widget( 'lt_footer_recent_posts' );
		}
		add_action( 'widgets_init', 'lt_register_footer_recent_posts' );
	
	




		class lt_blog_Wp_Bootstrap_Navwalker extends Walker_Nav_Menu {
			/**
			 * @see Walker::start_lvl()
			 * @since 3.0.0
			 */
			public function start_lvl( &$output, $depth = 0, $args = array() ) {
				$indent = str_repeat( "\t", $depth );
				$output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\">\n";
			}
		
			/**
			 * @see Walker::start_el()
			 * @since 3.0.0
			 */
			public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
				/**
				 * Dividers, Headers or Disabled
				 */
				if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
					$output .= $indent . '<li role="presentation" class="divider item-has-children">';
				} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
					$output .= $indent . '<li role="presentation" class="divider item-has-children">';
				} else if ( strcasecmp( $item->attr_title, 'dropdown-header item-has-children') == 0 && $depth === 1 ) {
					$output .= $indent . '<li role="presentation" class="dropdown-header item-has-children">' . esc_attr( $item->title );
				} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
					$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
				} else {
		
					$class_names = $value = '';
		
					$classes = empty( $item->classes ) ? array() : (array) $item->classes;
					$classes[] = 'nav-item menu-item-' . $item->ID;
		
					$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		
					if ( $args->has_children )
						$class_names .= 'sub item-has-children';
		
					if ( in_array( 'current-menu-item', $classes ) )
						$class_names .= ' active';
		
					$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		
					$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
					$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		
					$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
					$atts = array();
					$atts['title']  = ! empty( $item->title )	? $item->title	: '';
					$atts['target'] = ! empty( $item->target )	? $item->target	: '';
					$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
		
					// If item has_children add atts to a.
					if ( $args->has_children && $depth === 0 ) {
						$atts['href']   		= $item->url;
						$atts['data-toggle']	= 'dropdown';
						$atts['class']			= 'dropdown-toggle dropdown';
					} else {
						$atts['href'] = ! empty( $item->url ) ? $item->url : '';
					}
		
					$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
		
					$attributes = '';
					foreach ( $atts as $attr => $value ) {
						if ( ! empty( $value ) ) {
							$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
							$attributes .= ' ' . $attr . '="' . $value . '"';
						}
					}
		
					$item_output = $args->before;
		
					/*
					 * Glyphicons
					 **/
					if ( ! empty( $item->attr_title ) )
						$item_output .= '<a'. $attributes .'><span class=" ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
					else
						$item_output .= '<a class="nav-link" data-scroll '. $attributes .'>';
		
					$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
					$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
					$item_output .= $args->after;
		
					$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				}
			}
		
			/**
			 * Traverse elements to create list from elements.
			 **/
			public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
						if ( ! $element )
								return;
		
						$id_field = $this->db_fields['id'];
		
						// Display this element.
						if ( is_object( $args[0] ) )
							 $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		
						parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
				}
		
			/**
			 * Menu Fallback
			 **/
			public static function fallback( $args ) {
				if ( current_user_can( 'manage_options' ) ) {
		
					extract( $args );
		
					$fb_output = null;
		
					if ( $container ) {
						$fb_output = '<' . $container;
		
						if ( $container_id )
							$fb_output .= ' id="' . $container_id . '"';
		
						if ( $container_class )
							$fb_output .= ' class="' . $container_class . '"';
		
						$fb_output .= '>';
					}
		
					$fb_output .= '<ul';
		
					if ( $menu_id )
						$fb_output .= ' id="' . $menu_id . '"';
		
					if ( $menu_class )
						$fb_output .= ' class="' . $menu_class . '"';
		
					$fb_output .= '>';
					$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">' . esc_html__('Menü Ekle','lt-blog') .'</a></li>';
					$fb_output .= '</ul>';
		
					if ( $container )
						$fb_output .= '</' . $container . '>';
		
					echo ($fb_output);
				}
			}
		}
		
		





?>


