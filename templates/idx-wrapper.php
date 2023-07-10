<?php /* Template Name: IDX Wrapper */ ?>

<?php get_header(); ?>

<div id="primary">
	<main id="main" class="site-main">

		<?php $banner_bg = get_field('default_banner_background', 'options'); ?>
			

		<div class="container container--wide">

			<h1 class="page-title"><?php the_title(); ?></h1>

			<div class="template template--idx">

				<?php the_content(); ?>
				
			</div>

		</div><!-- .container -->

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
