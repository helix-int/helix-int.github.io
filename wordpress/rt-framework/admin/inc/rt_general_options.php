<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * RT-Theme Options Without Panels
 */
$this->options["rt_single_options"] = array(

			array(
				'id'       => 'copyright',
				'title'    => esc_html_x("Copyright Text", 'Admin Panel', 'businesslounge'), 
				'controls' => array( 

									array(
										"id"          => "businesslounge_copyright", 	
										"label"       => esc_html_x("Copyright Text",'Admin Panel', 'businesslounge'),
										"description" => esc_html_x('The copyright text will be displayed in the footer of your website.','Admin Panel', 'businesslounge'),
										"transport"   => "refresh",		
										"default"     => esc_html_x('Copyright &copy; Company Name, Inc.','Admin Panel', 'businesslounge'),											
										"type"        => "textarea",
										"sanitize_callback" => "rt_sanitize_basic_html"
									), 

							),
			), 
	);

/**
 * RT-Theme General Options
 */
$this->options["rt_general_options"] = array(

		'title' => esc_html_x("General Options", 'Admin Panel', 'businesslounge'), 
		'priority' => 1,
		//'description' => esc_html_x("General Options Desc", 'Admin Panel', 'businesslounge'), 
		'sections' => array(


							array(
								'id'       => 'breadcrumb',
								'title'    => esc_html_x("Breadcrumb Menus", 'Admin Panel', 'businesslounge'), 
								'controls' => array( 

													array(
														"id"          => "businesslounge_blog_page",															
														"label"       => esc_html_x("Blog Start Page",'Admin Panel', 'businesslounge'),
														"description" => esc_html_x("Select blog start page to add after home link.",'Admin Panel', 'businesslounge'),
														"default"   => "0",
														"transport" => "refresh", 
														"type"      => "dropdown-pages"
													),													

													array(
														"id"          => "businesslounge_portfolio_page",															
														"label"       => esc_html_x("Portfolio Start Page",'Admin Panel', 'businesslounge'),
														"description" => esc_html_x("Select a start page to add after home link for single portfolio pages and categories.",'Admin Panel', 'businesslounge'),
														"default"   => "0",
														"transport" => "refresh", 
														"type"      => "dropdown-pages"
													),																							

													array(
														"id"          => "businesslounge_staff_page",															
														"label"       => esc_html_x("Team Start Page",'Admin Panel', 'businesslounge'),
														"description" => esc_html_x("Select a start page to add after home link for team member single pages and categories",'Admin Panel', 'businesslounge'),
														"default"   => "0",
														"transport" => "refresh", 
														"type"      => "dropdown-pages"
													),		

													array(
														"id"          => "businesslounge_shop_start_page",															
														"label"       => esc_html_x("WooCommerce Shop Start Page",'Admin Panel', 'businesslounge'),
														"description" => esc_html_x("Select shop start page to add after the home link for WooCommerce links. Note: When you define a start page by using this option, the default WooCommerce breadcrumb menu will be disabled.",'Admin Panel', 'businesslounge'),
														"default"   => "0",
														"transport" => "refresh", 
														"type"      => "dropdown-pages"
													),		


											),
							),


							array(
								'id'       => 'sidebars',
								'title'    => esc_html_x("Sidebar Options", 'Admin Panel', 'businesslounge'), 
								'controls' => array( 
													
													array(
														"id"          => "businesslounge_sidebar_position",	
														"label"       => esc_html_x("Default Sidebar Position",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			"fullwidth" => esc_html_x("No Sidebar",'Admin Panel', 'businesslounge'),
																			"left"  => esc_html_x("Left Sidebar",'Admin Panel', 'businesslounge'),
																			"right" => esc_html_x("Right Sidebar",'Admin Panel', 'businesslounge'), 
																		),  
														"type" => "select",
														"default" => "fullwidth",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_sidebar_blog_single",	
														"label"       => esc_html_x("Sidebar Position for Single Blog Posts",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			"fullwidth" => esc_html_x("No Sidebar",'Admin Panel', 'businesslounge'),
																			"left"  => esc_html_x("Left Sidebar",'Admin Panel', 'businesslounge'),
																			"right" => esc_html_x("Right Sidebar",'Admin Panel', 'businesslounge'), 
																		),  
														"type" => "select",
														"default" => "right",
														"rt_skin"   => true
													), 
													
													array(
														"id"          => "businesslounge_sidebar_blog_cats",	
														"label"       => esc_html_x("Sidebar Position for Blog Categories",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			"fullwidth" => esc_html_x("No Sidebar",'Admin Panel', 'businesslounge'),
																			"left"  => esc_html_x("Left Sidebar",'Admin Panel', 'businesslounge'),
																			"right" => esc_html_x("Right Sidebar",'Admin Panel', 'businesslounge'), 
																		),  
														"type" => "select",
														"default" => "right",
														"rt_skin"   => true
													), 

													array(
														"id"          => "businesslounge_sidebar_portfolio_cats",	
														"label"       => esc_html_x("Sidebar Position for Portfolio Categories",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			"fullwidth" => esc_html_x("No Sidebar",'Admin Panel', 'businesslounge'),
																			"left"  => esc_html_x("Left Sidebar",'Admin Panel', 'businesslounge'),
																			"right" => esc_html_x("Right Sidebar",'Admin Panel', 'businesslounge'), 
																		),  
														"type" => "select",
														"default" => "fullwidth",
														"rt_skin"   => true
													), 

													array(
														"id"          => "businesslounge_sidebar_bbpress",	
														"label"       => esc_html_x("Sidebar Position for bbPress",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			"fullwidth" => esc_html_x("No Sidebar",'Admin Panel', 'businesslounge'),
																			"left"  => esc_html_x("Left Sidebar",'Admin Panel', 'businesslounge'),
																			"right" => esc_html_x("Right Sidebar",'Admin Panel', 'businesslounge'), 
																		),  
														"type" => "select",
														"default" => "fullwidth",
														"rt_skin"   => true
													), 


													array(
														"id"          => "businesslounge_sidebar_woo_cats",	
														"label"       => esc_html_x("Sidebar Position for WooCommerce Categories",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			""      => esc_html_x("No Sidebar",'Admin Panel', 'businesslounge'),
																			"left"  => esc_html_x("Left Sidebar",'Admin Panel', 'businesslounge'),
																			"right" => esc_html_x("Right Sidebar",'Admin Panel', 'businesslounge'),
																		),  
														"type" => "select",
														"default" => "right",
														"rt_skin"   => true
													),	
													

											),
							),


							array(
								'id'          => 'page_comments',
								'title'       => esc_html_x("Page Comments", 'Admin Panel', 'businesslounge'), 
								"description" => esc_html_x("Use this option to control the page comments of all pages. Turn ON this option if you want to hide comment part of pages. If you don't see the page comments even if you select 'Enabled' option; make sure 'Allow Comments' box is also checked for individual pages (in edit page screen). If you dont see that option in your pages make sure to turn on the &#39;discussions&#39; option in the screen options below the admin name while you are in that page editing the content. ",'Admin Panel', 'businesslounge'),				
								'controls'    => array( 

													array(
														"id"          => "businesslounge_page_comments",	
														"label"       => esc_html_x("Enabled/Disable page comments of all pages",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			""  => esc_html_x("Enabled",'Admin Panel', 'businesslounge'),
																			"disabled" => esc_html_x("Disabled",'Admin Panel', 'businesslounge'), 
																		),  
														"type" => "select",
														"default" => "",
														"rt_skin"   => true
													),	

											),
							),
   

							array(
								'id'          => 'page_loading',
								'title'       => esc_html_x("Page Loading Effect", 'Admin Panel', 'businesslounge'), 
								"description" => esc_html_x("Check this option to enable page loading effect",'Admin Panel', 'businesslounge'),				
								'controls'    => array( 

														array(
															"id"        => "businesslounge_page_loading_effect",															
															"label"     => esc_html_x("Page Loading Effect",'Admin Panel', 'businesslounge'),														
															"default"   => "",
															"transport" => "refresh",
															"type"      => "checkbox",
														),	

														array(
															"id"        => "businesslounge_page_transition_effect",															
															"label"     => esc_html_x("Page Transition Effect",'Admin Panel', 'businesslounge'),														
															"default"   => "on",
															"transport" => "refresh",
															"type"      => "checkbox",
														),	

														array(
															"id"          => "businesslounge_loading_color_skin",	
															"label"       => esc_html_x("Select a logo set for the page loading window.",'Admin Panel', 'businesslounge'),
															"transport"   => "refresh",
															"choices"     => array(		
																						"dark"  => esc_html_x("Dark Logo Set",'Admin Panel', 'businesslounge'),
																						"light" => esc_html_x("Light Logo Set",'Admin Panel', 'businesslounge'), 
																				),  
															"type" => "select",
															"default" => "dark",
															"rt_skin"   => true
														),

														array(
															"id"          => "businesslounge_loading_background_color",	
															"label"       => esc_html_x("Loading Screen Background Color",'Admin Panel','businesslounge'),
															"description" => "",
															"transport"   => "refresh",
															"default"     => "#fff",															
															"type"        => "rt_color",
															"rt_skin"   => true
														),		 
														
														array(
															"id"          => "businesslounge_loading_bar_color",	
															"label"       => esc_html_x("Loading Screen Bar Color",'Admin Panel','businesslounge'),
															"description" => "",
															"transport"   => "refresh",
															"default"     => "#000",															
															"type"        => "rt_color",
															"rt_skin"   => true
														),		 

											),
							),


							array(
								'id'          => 'google_maps',
								'title'       => esc_html_x("Google Maps", 'Admin Panel', 'businesslounge'), 
								"description" => esc_html_x("Enter your Google API key. Refer online documentation of the theme to learn how to get your API key.", 'Admin Panel', 'businesslounge'), 				
								'controls'    => array( 

														array(
															"id"        => "businesslounge_google_api_key",															
															"label"     => esc_html_x("Google API Key", 'Admin Panel', 'businesslounge'), 													
															"default"   => "",
															"transport" => "refresh",
															"type"      => "text",
														),	

											),
							),	

							array(
								'id'          => 'go_to_top',
								'title'       => esc_html_x("Go to Top Button", 'Admin Panel', 'businesslounge'), 
								"description" => esc_html_x("Check this option to display a 'go to top' button right bottom corner of your website",'Admin Panel', 'businesslounge'),				
								'controls'    => array( 

													array(
														"id"        => "businesslounge_go_top_button",															
														"label"     => esc_html_x("Display go to top button",'Admin Panel', 'businesslounge'),														
														"default"   => 1,
														"transport" => "refresh",
														"type"      => "checkbox",
													),	

											),
							),

					)
	);