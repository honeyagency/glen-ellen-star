<?php

// Adding documentation to the dash
function bc_dashboard_widget_function() {
    $docs_template = get_template_directory() . '/library/docs.php';
    load_template($docs_template);
}
function bc_add_dashboard_widgets() {
    wp_add_dashboard_widget('wp_dashboard_widget', 'Glen Ellen Star Training', 'bc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'bc_add_dashboard_widgets');

// add ie conditional html5 shim to header
function add_ie_html5_shim() {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');

// Remove WP 4.2 emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Getting rid of WP Default jquery and adding from google
if (!is_admin()) add_action("wp_enqueue_scripts", "jquery_enqueue", 11);

function jquery_enqueue()
{
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');
    wp_register_script('jquery',  get_template_directory_uri() . '/app/jquery-1.9.1.min.js', false, null);
}

function localInstall()
{

    if (strpos($_SERVER["HTTP_HOST"], 'test') !== false) {
        $reloadScript = 'http://localhost:35729/livereload.js';
        wp_register_script('livereload', $reloadScript, null, false, true);
        wp_enqueue_script('livereload');
    }
}

// Enqueuing all of our scripts and styles
function buscemi_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_style('buscemi_style', get_template_directory_uri() . '/app/main.min.css', null, null, null);
    wp_enqueue_script('buscemi_script', get_template_directory_uri() . '/app/app.min.js', array('jquery'), null, null, true);
    wp_enqueue_style('zoom_style', get_template_directory_uri() . '/app/vendors/zoom.css', null, null, null);
    wp_enqueue_script('zoom_script', get_template_directory_uri() . '/app/vendors/zoom.min.js', array('jquery'), null, null, true);
}
add_action('wp_enqueue_scripts', 'buscemi_scripts');

// Allowing SVG preveiw in WP Upload
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Setting up ACF options page
if(function_exists('acf_add_options_page')) { 
	acf_add_options_page();
}


require_once ('custom-fields.php');



?>
