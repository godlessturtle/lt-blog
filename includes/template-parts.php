<?php
/**
 * Custom template parts for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package lt-blog
*/
if ( ! function_exists( 'lt_blog_top_footer' ) ) :
	function lt_blog_top_footer() { ?>

<footer class="py-5 footer-bg-dark">
  <div class="container">
    <div class="row">
      <!-- Footer Sol -->
      <?php if ( ! function_exists('dynamic_sidebar') || !dynamic_sidebar('secondary-sidebar') ) : endif; ?>
      <!-- /.Footer Sol -->
      <br class="hidden-md-up">
      <br class="hidden-md-up">
      <br class="hidden-md-up">
      <br class="hidden-md-up">
      <br class="hidden-md-up">
      <!-- Footer Orta -->
      <?php if ( ! function_exists('dynamic_sidebar') || !dynamic_sidebar('third-sidebar') ) : endif; ?>
      <!-- /.Footer Orta -->
      <div class="seperator"></div>
      <!-- Footer Sağ -->
      <?php if ( ! function_exists('dynamic_sidebar') || !dynamic_sidebar('fourth-sidebar') ) : endif; ?>
        <!-- /.Footer Sağ -->
      </div>
    </div>
    <!-- /.container -->
  </footer>
  <footer class="py-3 text-center" id="footer_alt">
    <p id="setColor">Copyright 2018 &copy; <br/><a id="author_uri" href="http://yazilimgunlugum.com" rel="dofollow">Yazılım Günlüğüm</a> Tarafından <i class="fa fa-heart" style="color:red"></i> İle</p>
  </footer>
	
<?php
		}
endif;
add_action( 'lt_blog_top_footer_action',  'lt_blog_top_footer', 10 );





if ( ! function_exists( 'lt_blog_nav' ) ) :
	function lt_blog_nav() { ?>

<nav id="<?php if( is_admin_bar_showing() && ! is_customize_preview() ) {$nav_id = "navbar-set-top";} echo $nav_id; ?>" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
  <a class="navbar-brand" href="<?php bloginfo(url); ?>"><b><?php bloginfo('name'); ?></b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
  <?php
	
			wp_nav_menu( array(
				'menu'              => 'primary',
				'theme_location'    => 'primary',
				'depth'             => 3,
				'container'         => '',
				'container_class'   => '',
				'menu_class'        => 'navbar-nav ml-auto',
				'menu_id'		    => '',
				'echo' 				=> true,
				'fallback_cb'       => 'lt_blog_Wp_Bootstrap_Navwalker::fallback',
				'walker'            => new lt_blog_Wp_Bootstrap_Navwalker()
			));

  ?>
  </div>
</div>
</nav>
	
<?php
		}
endif;
add_action( 'lt_blog_nav_action',  'lt_blog_nav', 10 );




if ( ! function_exists( 'lt_blog_post' ) ) :
	function lt_blog_post() { ?>

<div class="card mb-4">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    <?php if(has_post_thumbnail()): ?>
      <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fg-medium'); ?>
      <img class="card-img-top post-img" src="<?php echo $image[0]; ?>" height="140" alt="<?php the_title(); ?>"/>
    <?php else: ?>
      <img class="card-img-top post-img" src="<?php bloginfo('template_url'); ?>/img/img-default.png" height="140" alt="<?php the_title(); ?>"/>
    <?php endif; ?>
</a>
    <div class="card-body">
      <a href="<?php the_permalink(); ?>" id="linkBlack"><h2 class="card-title"><?php the_title(); ?></h2></a>
      <span id="badge-bg" class="badge  text-center"><i class="fa fa-user-circle-o"></i> Yazar : <?php echo $author; ?></span>
      <span id="badge-bg" class="badge text-center"><i class="fa fa-clock-o"></i> <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' Önce'; ?></span>
      <span id="badge-bg" class="badge text-center"><i class="fa fa-list"></i> <a href="#" style="color: #fff;"><?php the_category( ', ' ); ?></a></span>
      <span id="badge-bg" class="badge text-center"><i class="fa fa-comment-o"></i> 
        <?php echo get_comments(array(
          'post_id' => get_the_ID(),
          'count' => true
        )); ?> Yorum</span>
      <p class="card-text icerik_ozet"><?php echo get_excerpt(); ?></p>
      <a href="<?php the_permalink(); ?>" id="sag" class="btn btn-primary btn-sm pull-right linkWhite">Devamını Oku &rarr;</a>
    </div>
  </div>
	
<?php
		}
endif;
add_action( 'lt_blog_post_action',  'lt_blog_post', 10 );



if ( ! function_exists( 'lt_single_post' ) ) :
	function lt_single_post() { ?>

		

<div id="post_container">

<h3 class="mt-4"><?php the_title(); ?></h3><br>

<!-- Date/Time -->
<div id="det_container" class="col-md-12">
 <span id="badge-bg" class="badge badge-info text-center cat badge-post">
  <i class="fa fa-user-circle-o"></i> Yazar : <?php echo $author; ?>
</span>
<span id="badge-bg" class="badge badge-info text-center cat badge-post">
  <i class="fa fa-list"></i> Kategori : <a id="author_post" href="#"><?php the_category( ', ' ); ?></a>
</span>
<span id="badge-bg" class="badge badge-info text-center cat badge-post">
  <i class="fa fa-clock-o"></i> <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' Önce'; ?>
</span>
</div>

<hr>
<?php if(has_post_thumbnail()): ?>
<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fg-post'); ?>
<!-- Preview Image -->
<img class="img-fluid rounded img-wid" width="750" height="300" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
<?php else: ?>
<img class="img-fluid rounded img-wid" width="750" height="300" src="<?php bloginfo('template_url'); ?>/img/img-default.png" alt="<?php the_title(); ?>">
<?php endif; ?>
<div id="sep25px"></div>
<!-- Post Content -->
<p class="lead"><?php the_content(); ?></p>
<section class="text-muted etiket_sec">
<b>Etiketler:</b><br/>
<?php
$posttags = get_the_tags();
if($posttags != ''){
  foreach($posttags as $tag) {
	echo '<span id="badge-bg" class="badge text-center etiket_t etiketler">#' . $tag->name . '</span>';
  }
}
else{
  echo "Bu gönderi için etiket bulunamadı.";
}
?>
<hr>
</section>
</div>

	
<?php
		}
endif;
add_action( 'lt_single_post_action',  'lt_single_post', 10 );



?>