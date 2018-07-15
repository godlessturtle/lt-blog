<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); 
$author = get_the_author();
?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blogpost1  -->
    <div id="content-area" class="col-md-8">
      <div class="row">

        <!-- Title -->
        <div id="post_container">

          <h3 class="mt-4"><?php the_title(); ?></h3><br>

          <!-- Date/Time -->
          <div id="det_container" class="col-md-12">
           <span id="badge-bg" class="badge badge-info text-center cat badge-post">
            <i class="fa fa-user-circle-o"></i> Yazar : <?php echo $author; ?>
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
    </div> <!-- ./row.post -->
  </div>
<?php endwhile; endif; ?>
<!-- Sidebar -->
<?php get_sidebar(); ?>
</div>
<!-- /.row -->
</div>
<!-- /.container -->
<!-- Footer -->
<?php get_footer(); ?>