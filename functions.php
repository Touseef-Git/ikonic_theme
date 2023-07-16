<?php

// Register a new navigation menu
add_action( 'after_setup_theme', 'register_primary_menu' );

function register_primary_menu() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'theme-text-domain' ) );
}

function add_normalize_CSS() {
    wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
 }
 add_action('wp_enqueue_scripts', 'add_normalize_CSS');

// Register a new sidebar simply named 'sidebar'
function add_widget_support() {
    register_sidebar( array(
        'name'          => 'Footer',
        'id'            => 'footer',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Navbar',
        'id'            => 'navbar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_widget_support' );


// Creating shortcode for getting and showing REST countries
add_shortcode('print_rest_countries', 'print_rest_countries');
function print_rest_countries() {
    $rest_url = 'http://restcountries.com/v3.1/all?fields=name,flags';
    $data = file_get_contents($rest_url);

    $countries = json_decode($data, true);
    ?>
    <div class="rest_countries">
        <?php
        foreach ($countries as $country) {
            $names = $country['name'];
            $flags = $country['flags']
            ?>
            <div class="res_single_country">
                <div>
                    <img width="100" height="100" src="<?php echo $flags['png']; ?>" />
                </div>
                <div>
                    <b>Name:</b> <?php echo $names['common']; ?> 				
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'ikonic_styles', get_template_directory_uri() . '/assets/css//ikonic_style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();

    // Create a new options page
    acf_add_options_page(array(
        'page_title' => 'Ikonic Global Settings',
        'menu_title' => 'Ikonic Global Settings',
        'menu_slug' => 'ikonic-global-settings',
        'capability' => 'edit_posts',
        'position' => false,
        'icon_url' => false,
        'show_in_menu' => true,
        'admin_menu_icon' => 'dashicons-admin-settings',
        'redirect' => false
    ));

   
}

