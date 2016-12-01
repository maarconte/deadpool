<?php
/**
 * deadpool functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package deadpool
 */


function my_scripts_enqueue() {
    wp_register_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js', array('jquery'), NULL, true );
	wp_register_script('tether', get_template_directory_uri() . '/js/tether.min.js');
	wp_register_script('carousel', get_template_directory_uri() . '/js/carousel.min.js');
    wp_enqueue_script( 'bootstrap-js' );
	wp_enqueue_script( 'tether' );
	wp_enqueue_script( 'carousel' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_enqueue' );

function wpt_register_css() {
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/bootstrap/bootstrap.min.css' );
	//wp_register_style( 'bootstrap-flex.min', get_template_directory_uri() . '/bootstrap/bootstrap-flex.min.css' );
	wp_register_style( 'bootstrap-grid.min', get_template_directory_uri() . '/bootstrap/bootstrap-grid.min.css' );
	wp_register_style( 'bootstrap-reboot.min', get_template_directory_uri() . '/bootstrap/bootstrap-reboot.min.css' );
    wp_enqueue_style( 'bootstrap.min' );
	//wp_enqueue_style( 'bootstrap-flex.min' );
	wp_enqueue_style( 'bootstrap-grid.min' );
	wp_enqueue_style( 'bootstrap-reboot.min' );
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

//enqueues our locally supplied font awesome stylesheet
function enqueue_our_required_stylesheets(){
	wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/font-awesome-4.7.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');

if ( ! function_exists( 'deadpool_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function deadpool_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on deadpool, use a find and replace
	 * to change 'deadpool' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'deadpool', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
		'primary' => esc_html__( 'Primary', 'deadpool' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'deadpool_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'deadpool_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function deadpool_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'deadpool_content_width', 640 );
}
add_action( 'after_setup_theme', 'deadpool_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function deadpool_widgets_init() {
		register_sidebar( array(
		'name'          => esc_html__( 'Qui sommes nous', 'deadpool' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'deadpool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Nous contacter', 'deadpool' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'deadpool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
			register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'deadpool' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'deadpool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'deadpool_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function deadpool_scripts() {
	wp_enqueue_style( 'deadpool-style', get_stylesheet_uri() );

	wp_enqueue_script( 'deadpool-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'deadpool-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'deadpool_scripts' );

add_action('init', 'my_custom_init'); function my_custom_init() {
/* notre code PHP pour rajouter les custom post type */
register_post_type(   'equipe',
array(
		'label' => 'Equipe',
		'labels' => array(
		'name' => 'Equipe',
		'singular_name' => 'Membre',
		'all_items' => 'Toute l\'equipe',
		'add_new_item' => 'Ajouter un membre',
		'edit_item' => 'Éditer le membre',
		'new_item' => 'Nouveau membre',
		'view_item' => 'Voir le membre',
		'search_items' => 'Rechercher parmi les membres',
		'not_found' => 'Pas de membres trouvés',
		'not_found_in_trash'=> 'Pas de membre dans la corbeille'
	),
	'public' => true,
	'capability_type' => 'post',
	'supports' => array(
		'title',
		'thumbnail',
	),
) );
register_post_type(   'portfolio',
array(
		'label' => 'Portfolio',
		'labels' => array(
		'name' => 'Portfolio',
		'singular_name' => 'Projet',
		'all_items' => 'Tous les projets',
		'add_new_item' => 'Ajouter un projet',
		'edit_item' => 'Éditer le projet',
		'new_item' => 'Nouveau projet',
		'view_item' => 'Voir le projet',
		'search_items' => 'Rechercher parmi les projets',
		'not_found' => 'Pas de projets trouvés',
		'not_found_in_trash'=> 'Pas de projet dans la corbeille'
	),
	'public' => true,
	'capability_type' => 'post',
	'supports' => array(
		'title',
		'thumbnail',
		//'editor',
	),
) );
register_post_type(   'clients',
array(
		'label' => 'Clients',
		'labels' => array(
		'name' => 'Clients',
		'singular_name' => 'Client',
		'all_items' => 'Tous les clients',
		'add_new_item' => 'Ajouter un client',
		'edit_item' => 'Éditer le client',
		'new_item' => 'Nouveau client',
		'view_item' => 'Voir le client',
		'search_items' => 'Rechercher parmi les clients',
		'not_found' => 'Pas de clients trouvés',
		'not_found_in_trash'=> 'Pas de client dans la corbeille'
	),
	'public' => true,
	'capability_type' => 'post',
	'supports' => array(
		'title',
		'thumbnail',
	),
) );

	register_post_type(   'services',
array(
		'label' => 'Services',
		'labels' => array(
		'name' => 'Services',
		'singular_name' => 'Service',
		'all_items' => 'Tous les services',
		'add_new_item' => 'Ajouter un service',
		'edit_item' => 'Éditer le service',
		'new_item' => 'Nouveau service',
		'view_item' => 'Voir le service',
		'search_items' => 'Rechercher parmi les service',
		'not_found' => 'Pas de services trouvés',
		'not_found_in_trash'=> 'Pas de services dans la corbeille'
	),
	'public' => true,
	'capability_type' => 'post',
	'supports' => array(
		'title',
		'editor',
	),
) );
}


$new_general_setting = new new_general_setting();

class new_general_setting {
    function new_general_setting( ) {
        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
    }
    function register_fields() {
        register_setting( 'general', 'phone_number', 'esc_attr' );
        add_settings_field('phone_number', '<label for="phone_number">'.__('Your Phone Number' , 'phone_number' ).'</label>' , array(&$this, 'fields_html') , 'general' );
    }
	function fields_html() {
        $value = get_option( 'phone_number', '' );
        echo '<input type="text" id="phone_number" name="phone_number" value="' . $value . '" />';
    }
}

/* Autoriser les fichiers SVG */
function wpc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

include_once get_template_directory() . '/lib/plugins.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');
