<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hive-starter
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">

<div class="site-footer__main" style="background-image: url(<?php echo get_field('footer_background_image', 'options') ?>);">
	<div class="container">
		<div class="site-footer__inner d-md-flex">
	
			<div class="site-footer__branding col col-sm-7 col-lg-4">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php $logoImg = get_field('site_logo_white', 'options'); ?>
							<?php if ($logoImg): ?>
						<?php echo wp_get_attachment_image($logoImg, 'full', '', array("class" => "site-branding__image")); ?>
						<?php else: ?>
							<img src="<?php echo get_theme_root_uri(); ?>/hive-starter/images/hive-logo.png" alt="Hive Starter Logo" />
						<?php endif; ?>
					</a>
					
			</div><!-- .footer-branding -->
	
			<div class="site-footer__content d-sm-flex flex-wrap">
	
				<div class="site-footer__menu col col-sm-7 col-lg-3">
					<h4 class="site-footer__heading">Menu</h4>
					<?php wp_nav_menu( array(
						'menu'            => 'footer-menu-navigation',
					) ); ?>
				</div>
				
				<div class="site-footer__social col col-sm-6 col-lg-5">
					<h4 class="site-footer__heading">Follow Us</h4>
					<?php if ( have_rows( 'social_link', 'options' ) ): ?>
						<?php while ( have_rows( 'social_link', 'options' ) ): the_row(); ?>
							<a href="<?php echo get_sub_field( 'url', 'options' ); ?>" target="_blank"><?php the_sub_field( 'icon', 'options' ); ?></a>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="site-footer__contact col col-sm-6 col-lg-3">
					<h4 class="site-footer__heading">Contact Us</h4>
					<p><a href="https://www.google.com/maps/search/<?php echo preg_replace('/\n/', ' ', strip_tags(get_field('footer_address', 'options'))); ?>" target="_blank"><?php the_field('footer_address', 'options'); ?></a></p>
					<a href="tel:<?php the_field('phone_number', 'options'); ?>" >
						<span class="fas fa-phone-alt" style="margin-right: 3px;"></span>
						<span>Call Us</span>
						<?php the_field('phone_number', 'options'); ?>
					</a>
				</div>
	
			</div><!-- .footer-content -->
	
		</div><!-- .site-info -->
	</div><!-- .container -->
</div>

<div class="site-footer__copyright">
	<div class="container">
		<?php
		wp_nav_menu( array(
			'menu'        => 'secondary-footer-links',
		) );
		?>
		<p>© Lowe Hogan All rights reserved.</p>
	</div>
</div>


</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>


<?php
$het_options = get_option( 'het_settings', '' );
if(is_array($het_options)) {
	echo $het_options['het_textarea_field_2'];
}
?>

</body>
</html>
