<?php
/**
 * hive-starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hive-starter
 */

/**
 * Implement the Starter ACF Fields
 */
require get_template_directory() . '/inc/acf-starters.php';

/**
 * Load Hive Easy Tag
 */
require get_template_directory() . '/inc/hive-easy-tag.php';

/**
 * Grab schema ACF field and wp_head hook
 */
require get_template_directory() . '/inc/schema.php';

/**
 * Theme helper functions
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * WordPress Options
 */
function hive_starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hive-starter, use a find and replace
	 * to change 'hive-starter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hive-starter', get_template_directory() . '/languages' );


	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'hive-starter' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}

add_action( 'after_setup_theme', 'hive_starter_setup' );

/**
 * Header Clean Up.
 */
function hive_cleanup_head() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link', 10);
	remove_action('wp_head', 'start_post_rel_link', 10);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	remove_action('wp_head', 'print_emoji_detection_script', 7 );
	remove_action('admin_print_scripts', 'print_emoji_detection_script' );
	remove_action('wp_print_styles', 'print_emoji_styles' );
	remove_action('admin_print_styles', 'print_emoji_styles' );
}

add_action('after_setup_theme', 'hive_cleanup_head');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hive_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hive-starter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hive-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'hive_starter_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function hive_starter_scripts() {

	//remote vendor scripts CDNs
	// wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
	wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');


	// Font Awesome 5 (uncomment to enable)
	//wp_enqueue_script('fontawesome',  'https://kit.fontawesome.com/4d819d64c8.js');
	wp_enqueue_script('font-awesome-kit',  '//kit.fontawesome.com/9ffe5d2a38.js');

	if ( WP_DEV == true ) {

		// Dev full CSS
		wp_enqueue_style( 'hive-starter-style', get_template_directory_uri() . '/css/style.css', array(), '1.0' );

		// Dev full JS
		wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), null);

	} else {

		// Minified CSS
		wp_enqueue_style( 'hive-starter-style', get_template_directory_uri() . '/css/style.min.css', array(), '1.0' );

		// Minified JS
		wp_enqueue_script('main-js', get_template_directory_uri() . '/js/dist/main.min.js', array('jquery'), null);

	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'hive_starter_scripts' );

/**
 * Add ACF site settings page
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'edit_posts',
		'position' 	    => '2.1',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'site-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-settings',
	));

}

if (function_exists('add_image_size')) {

	add_image_size('hero-slider', 1900, 970, true);
	add_image_size('page-banner', 1900, 445, true);
	add_image_size('info-box-img', 495, 415, true);
	add_image_size('alternating-img', 940, 580, true);
	add_image_size('alternating-images', 938, 580, true);
	add_image_size('blog-thumbnail', 378, 246, true);
	add_image_size('blog-thumbnail-sm', 490, 245, true);
	add_image_size('gallery-thumbnail', 272, 240, true);

}

add_filter( 'image_size_names_choose', 'custom_image_sizes' );

function custom_image_sizes( $sizes ) {

  global $_wp_additional_image_sizes;
  if (empty($_wp_additional_image_sizes)) {
    return $sizes;
  }
  foreach ($_wp_additional_image_sizes as $id => $data) {
    if (!isset($sizes[$id])) {
      $sizes[$id] = ucfirst(str_replace('-', ' ', $id));
    }
  }
  return $sizes;

}

add_action('wp_ajax_myfilter', 'filter_posts');
add_action('wp_ajax_nopriv_myfilter', 'filter_posts');

function filter_posts(){
	$args = array(
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'] // ASC or DESC
	);

	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);

	$query = new WP_Query( $args );

	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
			get_template_part('template-parts/content', 'blog-index-post');
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;

	die();
}


//Remove Gutenberg Block Library CSS from loading on the frontend
function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );