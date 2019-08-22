<?php



//Adds script and stylesheets
function inhabitant_files() {
    wp_enqueue_script('inhabitent_main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), NULL, true);
    wp_enqueue_style('inhabitant_styles', get_stylesheet_uri('/build/css/style.min.css'), NULL, microtime());
    wp_enqueue_style('fonts', "https://fonts.googleapis.com/css?family=Lato&display=swap");
    wp_enqueue_style('font-awesome', "https://use.fontawesome.com/releases/v5.8.1/css/all.css");
}

add_action('wp_enqueue_scripts', 'inhabitant_files');

//Adds theme support - ex: title tag
function inhabitant_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus( array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
}

add_action('after_setup_theme', 'inhabitant_features');

// initialize sidebar widget

function inhabitant_sidebar_widget() {
    register_sidebar( array(
        'name' => esc_html('Sidebar'),
        'id' => 'sidebar-1',
        'description' => 'This is a nice sidebar',
        'class' => 'side-bar',
        'before_widget' => '<aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'inhabitant_sidebar_widget');

function inhabitant_post_type() {
    register_post_type('products', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'labels' => array(
            'name' => 'Products',
            'add_new_item' => 'Add New Product',
            'edit_item' => 'Edit Product',
            'all_items' => 'All Products',
            'singular_name' => 'Product'
        ),
        'menu_icon' => 'dashicons-cart'
    ));
}

add_action('init', 'inhabitant_post_type');

// Custom Taxonomies

function inhabitant_register_taxonomies() {
    register_taxonomy('product-type', 'products', array(
        'show_in_rest' => true,
        'hierarchical' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Product Types',
            'singular_name' => 'Product Type',
        )
        ));
}

add_action('init', 'inhabitant_register_taxonomies');

// /**
//  * Customize the logo WP login page.
//  */
function inhabitent_login_logo() {
	echo '<style>
		#login h1 a {
			background: url(' . get_template_directory_uri() . '/images/logos/inhabitent-logo-text-dark.svg) no-repeat !important;
			background-size: 300px 53px !important; width: 300px !important; height: 53px !important;
		}
		#login .button.button-primary {
			background-color: #248A83;
		}
	</style>';
}
add_action( 'login_head', 'inhabitent_login_logo' );
// ​
// /**
//  * Customize the URL the logo points to WP login page.
//  */
// ​
function inhabitent_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'inhabitent_login_logo_url' );
// ​
// /**
//  * Customize the title attribute for the login logo link.
//  *
//  */
function inhabitent_login_title() {
	return 'Inhabitent Login';
}
add_filter( 'login_title', 'inhabitent_login_title' );

?>



