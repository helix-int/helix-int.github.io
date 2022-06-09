<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head> 
<meta charset="<?php bloginfo( 'charset' ); ?>" />  
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php do_action("rtframework_after_body"); ?>

<!-- background wrapper -->
<div id="container">   
<?php do_action("rtframework_after_container"); ?> 
<?php get_template_part("top-bar") ?> 
<?php get_template_part("header-layout".rtframework_get_setting("header_style") ); ?>
<?php get_template_part("mobile-header-layout");?>
<?php do_action("rtframework_after_header"); ?> 

<!-- main contents -->
<div id="main_content">

<?php 

	/**
	 * Get sub page header
	 * @hooked rtframework_sub_page_header_function
	 */
	do_action( "rtframework_sub_page_header");

?>

<?php 		
	/**
	 * Get page container
	 * @hooked rtframework_content_container
	 */	
	
	do_action("rtframework_content_container", array("action"=>"start", "sidebar"=>rtframework_get_setting('sidebar_position'),"echo" => ! rtframework_is_composer_allowed(),  "class" => rtframework_get_setting("default_content_row_width"), "wrapper_class" => rtframework_get_setting("default_content_wrapper_width") ) );
?>