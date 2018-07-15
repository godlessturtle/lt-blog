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
<?php do_action('lt_single_post_action'); ?>
      <!-- Comments Form -->
      <div class="col-md-12"></div>
      <!-- yorumlar -->
      <!-- ./Post -->
    </div> <!-- ./row.post -->
    <section id="yorumlar_section">
      <div class="card my-4">
        <h5 class="card-header">Yorumlar</h5>
        <div class="card-body">
          <div class="col-md-12">
            <div class="form-group">
              <?php if ( comments_open() || get_comments_number() ) :
              comments_template();
              endif; ?>
            </div>
          </div>

        </div>
      </div>
    </section>

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