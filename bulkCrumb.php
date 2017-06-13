<?php
/*
Plugin Name: BKO bulkCrumb
Depends:
Provides: breadcrumb!
Plugin URI:
Description: breadcrumb!
Version: 1.0.0
Author: Bulko
Author URI: http://www.bulko.net/
License: http://www.wtfpl.net/
*/
// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) )
{
	wp_die( 'Hi there!  I\'m just a plugin, not much I can do when called directly.' );
}
//include required wp mod
require_once( ABSPATH . '/wp-config.php' );
add_filter('the_content', 'add_breadcrumb');
add_action( 'enqueue_scripts', 'css_breadcrumb' );
function add_breadcrumb( $content )
{
	if ( function_exists('yoast_breadcrumb') )
	{
		yoast_breadcrumb('
		<p id="breadcrumbs" class="bulkCrumb">','</p>
		');
	}
	return $content;
}

function css_breadcrumb()
{
	wp_enqueue_style( 'css_breadcrumb', plugins_url( "breadcrumb.css", __FILE__ ) );
}
