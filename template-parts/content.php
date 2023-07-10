<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hive-starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-single__content">
		<div class="container">
			<h1 class="post-single__title"><?php the_title(); ?></h1>
			<?php
				the_content();
			?>	
		</div>
	</div>

	<div class="container">
		<div class="post-single__share-icons">
			<h3 class="font--semibold color--blue-alt">Share:</h3> <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a> <a href="http://www.twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo get_the_permalink(); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
		</div>
		<div class="post-single__author">
			<h4>Submitted by <?php the_author(); ?></h4>
		</div>
	</div>

	<div class="container">
		<div class="post-single__related-posts related-posts section">

			<h2 class="text-center section-heading">Related Posts</h2>

			<?php 
				$args = array( 
				  'post_type' => 'post',
				  'posts_per_page' => 3
				);
				$posts_query = new WP_Query( $args );


			?>
			 
			<?php if ( $posts_query->have_posts() ) : ?>
				<div class="d-md-flex">
					<?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
								 
					<div class="col-md-4 related-posts__item">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumbnail-sm'); ?>
						<h3 class="related-posts__title"><?php the_title(); ?></h3></a>
						<div class="related-posts__category">
							<?php foreach (get_the_category() as $category): ?>
								<?php echo $category->name.' '; ?>
							<?php endforeach; ?>
						</div>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>">Read More</a>
					</div>
								 
					<?php endwhile; ?>
				 </div>
			<?php endif; ?>
			 
			<!--IMPORTANT-->
			<?php wp_reset_postdata(); ?>
			
		</div>
	</div>

</article><!-- #post-## -->
