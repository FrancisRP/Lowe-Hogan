<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hive-starter
 */

get_header(); ?>

  <header class="post-single__header">
    <?php if (has_post_thumbnail()) : ?> 
      <div class="post-single__image" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')">
        <div class="post-single__title-wrapper">
          <div class="container">
            <h2 class="post-single__page-title">News</h2>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </header>

  <div class="post post-single">

    <div id="primary" class="content-area">

      <main id="main" class="site-main">

        <?php
        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content', get_post_format() );

          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            //comments_template();
          endif;

        endwhile; // End of the loop.
        ?>


      </main><!-- #main -->

    </div><!-- #primary -->


  </div>


<?php 
get_footer();
