

<?php get_header(); ?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blogpost1  -->
    <div id="content-area" class="col-md-8">
    <div style="background:#ccc;border-radius:4px; margin-top:25px; color:#545454; padding:7px 5px 1px 5px;" class="well">
    <h3><?php printf( esc_html__( '"%s" Sorgusu ile alakalı yazılar;', 'lt-blog' ), esc_html( get_search_query() ) ); ?></h3>
    </div>
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



    
        <?php while ( have_posts() ) : the_post(); ?>

         

        <?php endwhile; ?>
     

     
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

      

    <!-- /.pagination -->
  </div>  


  <!-- Sidebar -->


  <?php get_sidebar(); ?>


</div>


<!-- /.row -->

</div>


<?php get_footer(); ?>