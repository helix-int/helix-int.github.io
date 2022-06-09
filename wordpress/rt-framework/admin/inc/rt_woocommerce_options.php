<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * RT-Theme WooCommerce Options
 */

$this->options["woocommerce"] = array(

		'title' => esc_html_x("WooCommerce", "Admin Panel","businesslounge"), 
		'description' => "", 
		'priority' => 10,
		'sections' => array(

							array(
								'id'       => 'misc',
								'title'    => esc_html_x("Global Layout Options", "Admin Panel","businesslounge"), 
								'controls' => array( 
													array(
														"id"          => "businesslounge_woo_layout",															
														"label"       => esc_html_x("Layout","Admin Panel","businesslounge"),
														"description" => esc_html_x("Select and set a default column layout for the product category & archive listing pages for each of the (single) post items listed within those pages.","Admin Panel","businesslounge"),
														"choices"     =>  array(
																			"6" => "1/6", 
																			"5" => "1/5",
																			"4" => "1/4",
																			"3" => "1/3",
																			"2" => "1/2",
																			"1" => "1/1"
																  		),			
														"default"   => "3",
														"transport" => "refresh", 
														"type"      => "select"
													),			

													array(
														"label"       => esc_html_x("Amount of product items to show per page","Admin Panel","businesslounge"),
														"description" => esc_html_x("Set the amount of portfolio items to show per page before pagination kicks in.","Admin Panel","businesslounge"),
														"id"          => "businesslounge_woo_list_pager",
														"min"         => "1",
														"max"         => "200",
														"default"     => "9", 
														"type"        => "number",
														"transport"   => "refresh",
														"input_attrs" => array("min"=>1,"max"=>201),
														"callback"    => array(&$this, 'rt_sanitize_number')
													),

											),
							),							
 
 							array(
								'id'       => 'single_woo',
								'title'    => esc_html_x("Single Page Options", "Admin Panel","businesslounge"), 
								'controls' => array( 
   													array(
														"label"       => esc_html_x("Disable Product Image Zoom",'Admin Panel','businesslounge'),
														"description" => "",
														"id"          => "businesslounge_woo_disable_zoom",
														"default"     => "",
														"transport"   => "refresh",
														"type"        => "rt_checkbox",
														"input_attrs" => array("data-depends-id" => "businesslounge_woo_image_style", "data-depends-values" => "")
													),

 													array(
														"label"       => esc_html_x("Disable Lightbox",'Admin Panel','businesslounge'),
														"description" => "",
														"id"          => "businesslounge_woo_disable_lightbox",
														"default"     => "",
														"transport"   => "refresh",
														"type"        => "rt_checkbox",
														"input_attrs" => array("data-depends-id" => "businesslounge_woo_image_style", "data-depends-values" => "")
													),
 											),	
							),	

					)
	);