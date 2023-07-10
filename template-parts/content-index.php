<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hive-starter
 */

?>

<div class="container">
	
	<div class="col">
	
		<div class="d-flex align-items-center filter-options">
			<button class="filter-toggle">
				<div class="filter-icon">
					<span class="filter-icon__bar"></span>
					<span class="filter-icon__bar"></span>
					<span class="filter-icon__bar"></span>
				</div>
				<div class="filter-toggle__label">Filter</div>
			</button>
			
			<button data-id="0" class="filter-reset"><i class="fas fa-times"></i> Reset</button>
		</div>

		<?php 
		
			if( $terms = get_terms( array(
			    'taxonomy' => 'category',
			    'orderby' => 'name'
			) ) ) : 
	
				echo '<ul class="filter-toggle__dropdown">';

				foreach ( $terms as $term ) :
					echo '<li data-id='.$term->term_id.'>' . $term->name . '</li>';
				endforeach;

				echo '</ul>';
			endif;
		
		?>

		<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" class="filter-form">
			<?php 
			
				if( $terms = get_terms( array(
				    'taxonomy' => 'category',
				    'orderby' => 'name'
				) ) ) : 

					echo '<select name="categoryfilter">';

					foreach ( $terms as $term ) :
						echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
					endforeach;

					echo '</select>';
				endif;
			
			?>
			<input type="hidden" name="action" value="myfilter">
		</form>
	 </div>

</div>

<div id="response">

	<?php while (have_posts()): the_post(); ?>
		
		<?php get_template_part( 'template-parts/content', 'blog-index-post' ); ?>

	<?php endwhile; ?>

</div>

<div class="post-index__pagination">
	<div class="container">
		<?php 
		
		the_posts_pagination( array(
			'screen_reader_text'		=> '',
		    'mid_size'  => 2,
		    'prev_text' => __( '&laquo; Prev', 'textdomain' ),
		    'next_text' => __( 'Next &raquo;', 'textdomain' ),
		) );
		
		 ?>
	 </div>
</div>
