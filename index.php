<?php get_header(); ?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blogpost1  -->
    <div id="content-area" class="col-md-8">
      <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
          <?php include 'post.php'; ?>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="col-md-12" style="background: #fff; padding: 1em">
          Bu siteye henüz herhangi bir içerik girilmemiştir.
        </div>
      <?php endif; ?>
    </div>
      <?php if ( have_posts() ) : ?>
        <nav class="col-md-12">
          <ul class="pagination">
            <li class="page-item">
              <i class="fa fa-arrow-left"></i> <?php previous_posts_link( 'Daha Yeni' ); ?>
            </li>
            <li class="page-item pull-right">
              <?php next_posts_link( 'Daha Eski' ); ?> <i class="fa fa-arrow-right"></i>
            </li>
          </ul>
        </nav>
      <?php else : ?>
        <?php _e('Geçerli bir içerik bulunamadı.'); ?>
      <?php endif; ?>
  </div>  
  <?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>