<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hive-starter
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

 <script id="rs-embedded">
  (function() {
    var script = document.createElement("script");
    script.className = "rs-embedded-script";
    script.async = true;
    script.src = "https://em.realscout.com/assets/em/v3/all.js";
    var entry = document.getElementsByTagName("script")[0];
    entry.parentNode.insertBefore(script, entry);
  })();
</script>

</head>

<body <?php body_class(); ?>>

<a class="screen-reader-text skip-link" href="#content">Skip to content</a>

<?php get_template_part('partials/slideoutnav/slideout-nav'); ?>

<?php $sticky_bg_color = get_field( 'sticky_header_bg_color', 'options' ); ?>

<?php if ($sticky_bg_color == 'light'): ?>
	<?php $sticky_color = ' sticky--light'; ?>
<?php elseif ($sticky_bg_color == 'dark'): ?>
	<?php $sticky_color = ' sticky--dark'; ?>
<?php endif; ?>

<header id="masthead" class="site-header<?php echo $sticky_color; ?>">

	<div class="container">

		<i class="fa fa-navicon slideout-navicon"></i>

		<div class="site-header__inner d-md-flex align-items-center">

			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

					<?php $logoImg = get_field('site_logo', 'options'); ?>
						<?php if ($logoImg): ?>
					<?php echo wp_get_attachment_image($logoImg, 'full', '', array("class" => "site-branding__image")); ?>
					<?php else: ?>
						<img src="<?php echo get_theme_root_uri(); ?>/hive-starter/images/hive-logo.png" alt="Hive Starter Logo" />
					<?php endif; ?>
				</a>

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation align-items-center">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu'        => 'main-nav',
				) );
				?>
	            <?php if (get_field('phone_number', 'options')): ?>
					<div class="main-navigation__number">
						<span class="fas fa-phone-alt"></span>
						<a href="tel:<?php the_field('phone_number', 'options'); ?>" >
							<span>CALL OR TEXT:</span>
							<?php the_field('phone_number', 'options'); ?>
							
						</a>
					</div>
	            <?php endif; ?>
			</nav><!-- #site-navigation -->

		</div><!-- .site-header__inner -->

	</div><!-- .container -->
</header><!-- #masthead -->

<div id="page" class="site">

	<?php if ( have_rows( 'hero_slider' ) ): ?>
		<div class="hero-slider">
			<?php while ( have_rows( 'hero_slider' ) ): the_row(); ?>
				<div class="hero-slider__slide">
					<?php echo wp_get_attachment_image(get_sub_field( 'background_image' ), 'hero-slider'); ?>
					<div class="container">
						<div class="hero-slider__content">
							
							<h1 class="hero-slider__heading"><?php the_sub_field( 'heading_text' ); ?></h1>
							<p class="hero-slider__description"><?php the_sub_field( 'description_text' ); ?></p>
						
						</div>
					</div>
				</div>
			<?php endwhile; ?>

		</div>
	<?php endif; ?>

	<?php if (is_front_page()): ?>

		<div class="hero-form">
			<div class="container">
				<div class="hero-form__inner">
					<div class="realscout-search advanced" data-rep="eugenelowe" data-title-color="#000000" data-button-color="#010101" data-button-font="#ffffff" data-background-color="#eee" style="width: px"></div>
				</div>
			</div>
		</div>

	<?php endif; ?>

	<?php if (is_home()): ?>

		<div class="page-banner">
			<?php echo wp_get_attachment_image(get_field( 'header_background_image', 30 ), 'page-banner'); ?>
			<div class="page-banner__content">
				<div class="container">
					<h1 class="page-banner__heading"><?php echo get_the_title(30); ?></h1>
				</div>
			</div>
		</div>

	<?php endif; ?>

	<div id="content" class="site-content">
