<?php 
/**
 *
 * @package WordPress
 * @subpackage lt_blog
 * @since lt_blog 1.0
 *
**/

/*************************************************
## stil ve script
*************************************************/


function lt_blog_scripts() {

    wp_enqueue_style( 'lt-tema-stili', 		get_template_directory_uri() . '/css/styles.css',false, '1.0');
    wp_enqueue_style( 'lt-bootstrap', 		get_template_directory_uri() . '/css/bootstrap.min.css',false, '1.0');
    wp_enqueue_style( 'lt-animate', 		get_template_directory_uri() . '/css/animate.css',false, '1.0');
    wp_enqueue_style( 'lt-fontaw', 		get_template_directory_uri() . '/css/font-awesome.css',false, '1.0');

    //default
    wp_enqueue_style( 'lt-blog-style',		get_stylesheet_uri() );
    

    wp_enqueue_script('lt-jquery', 	get_template_directory_uri() .  '/js/jquery.min.js',array('jquery'), '1.0', true);
    wp_enqueue_script('lt-bundle-js', 	get_template_directory_uri() .  '/js/bootstrap.bundle.min.js',array('jquery'), '1.0', true);
    wp_enqueue_script('lt-bs-js', 	get_template_directory_uri() .  '/js/bootstrap.js',array('jquery'), '1.0', true);
    wp_enqueue_script('lt-custom-js', 	get_template_directory_uri() .  '/js/custom.js',array('jquery'), '1.0', true);
}

add_action( 'wp_enqueue_scripts', 'lt_blog_scripts' );


// Theme parts
require_once get_template_directory() . '/includes/template-parts.php';

?>

