<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
*  Portfolio Options
*/
$this->options["rt_portfolio_options"] = array(

	'title' => esc_html_x("Portfolio Options", "Admin Panel", "businesslounge"), 
	//'description' => "", 
	'priority' => 4,
	'sections' => array(

						array(
							'id'       => 'misc',
							'title'    => esc_html_x("General Portfolio Options", "Admin Panel", "businesslounge"), 
							'controls' => array( 
									
												array(
													"label"       => esc_html_x("Display Post Navigation","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portfolio_navigation",
													"default"     => 1,
													"transport"   => "refresh",
													"type"        => "rt_checkbox"
												),


												array(
													"label"       => esc_html_x("Display Social Share","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portfolio_share",
													"default"     => 1,
													"transport"   => "refresh",
													"type"        => "rt_checkbox"
												),


										),
						),			

						array(
							'id'       => 'layout',
							'title'    => esc_html_x("Global Listing Options", "Admin Panel", "businesslounge"), 
							'controls' => array( 
												array(
													"id"          => "businesslounge_portfolio_layout",															
													"label"       => esc_html_x("Layout","Admin Panel","businesslounge"),
													"description" => esc_html_x("Select and set a default column layout for the Portfolio category & archive listing pages for each of the (single) post items listed within those pages.","Admin Panel","businesslounge"),
													"choices"     =>  array(
																		"1/6" => "1/6", 
																		"1/4" => "1/4",
																		"1/3" => "1/3",
																		"1/2" => "1/2",
																		"1/1" => "1/1"
															  		),			
													"default"   => "1/3",
													"transport" => "refresh", 
													"type"      => "select"
												),										
												array(
													'id'          => RT_THEMESLUG.'_portfolio_layout_style',
													'label'       => esc_html_x("Layout Style","Admin Panel","businesslounge"),
													"description" => esc_html_x("Select and set a default layout style for the Portfolio category & archive listing pages","Admin Panel","businesslounge"),
													'type'        => 'select',
													'default'     => 'grid',
													"transport"   => "refresh",
													'choices'     => array(
																		"grid" => esc_html_x("Grid","Admin Panel","businesslounge"),
																		"masonry" => esc_html_x("Masonry","Admin Panel","businesslounge"),
																	),
												),
												array(
													"label"       => esc_html_x("Item Style","Admin Panel","businesslounge"),
													"description" => esc_html_x("Select a style for the portfolio item in listing pages & categories.","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portfolio_item_style",
													"choices"     =>  array(
																		"style-1" => esc_html_x("Style 1 - Info under the featured image","Admin Panel","businesslounge"),						
																		"style-2" => esc_html_x("Style 2 - Info embedded to the featured image ","Admin Panel","businesslounge"),
																	),			
													"default"   => "style-1",
													"transport" => "refresh", 
													"type"      => "select"
												),			


												array(
													"id"          => "businesslounge_portfolio_box_style",															
													"label"       => esc_html_x("Box Style","Admin Panel","businesslounge"), 
													"choices"     =>  array(
																		'' => _x('Default','Admin Panel','businesslounge'),
																		'boxed' => _x('Boxed','Admin Panel','businesslounge'),
															  		),			
													"default"   => "",
													"transport" => "refresh", 
													"type"      => "select",
													"input_attrs" => array("data-depends-id" => "businesslounge_portfolio_item_style", "data-depends-values" => "style-1")
												),		


												array(
													"label"       => esc_html_x( 'Hover Style', 'Admin Panel','businesslounge' ),
													"description" => esc_html_x('Select an overlay text style.', 'Admin Panel','businesslounge' ),	
													"id"          => "businesslounge_portfolio_hover_style",
													"choices"     =>  array(
																			"hover-1" => esc_html_x( 'Style 1', 'Admin Panel','businesslounge' ),
																			"hover-2" => esc_html_x( 'Style 2', 'Admin Panel','businesslounge' ),
																	),			
													"default"   => "hover-1",
													"transport" => "refresh", 
													"type"      => "rt_select",
													"input_attrs" => array("data-depends-id" => "businesslounge_portfolio_item_style", "data-depends-values" => "style-2")
												),		


												array(
													"label"       => esc_html_x("Display Categories","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portfolio_display_categories",
													"default"     => false,
													"transport"   => "refresh",
													"type"        => "rt_checkbox",
													"input_attrs" => array("data-depends-id" => "businesslounge_portfolio_item_style", "data-depends-values" => "style-1")
												),


												array(
													"label"       => esc_html_x("Display Excerpts","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portfolio_display_excerpts",
													"default"     => true,
													"transport"   => "refresh",
													"type"        => "rt_checkbox",
													"input_attrs" => array("data-depends-id" => "businesslounge_portfolio_item_style", "data-depends-values" => "style-1")
												),

										),
						),							

						array(
							'id'       => 'style',
							'title'    => esc_html_x("Listing Parameters", "Admin Panel", "businesslounge"), 
							'controls' => array( 

												array(
													"label"       => esc_html_x("Amount of portfolio items to show per page","Admin Panel","businesslounge"),
													"description" => esc_html_x("Set the amount of portfolio items to show per page before pagination kicks in.","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portf_pager",
													"min"         => "1",
													"max"         => "200",
													"default"     => "9", 
													"type"        => "number",
													"transport"   => "refresh",
													"input_attrs" => array("min"=>1,"max"=>201)
												),
									
												array(
													"label"       => esc_html_x("OrderBy Parameter","Admin Panel","businesslounge"),
													"description" => esc_html_x("Select and set the sorting order for the portfolio items within the portfolio listing pages by this parameter.","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portf_list_orderby",
													"choices"     => array('author'=>esc_html_x('Author',"Admin Panel","businesslounge"),'date'=>esc_html_x('Date',"Admin Panel","businesslounge"),'title'=>esc_html_x('Title',"Admin Panel","businesslounge"),'modified'=>esc_html_x('Modified',"Admin Panel","businesslounge"),'ID'=>esc_html_x('ID',"Admin Panel","businesslounge"),'rand'=>esc_html_x('Randomized','Admin Panel','businesslounge')), 
													"default"     => "date",
													"transport"   => "refresh",
													"type"        => "select"
												),
									
												array(
													"label"       => esc_html_x("Order","Admin Panel","businesslounge"),
													"description" => esc_html_x("Select and set the ascending or descending order for the ORDERBY parameter.","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portf_list_order",
													"choices"     => array('ASC'=>esc_html_x('Ascending',"Admin Panel","businesslounge"),'DESC'=>esc_html_x('Descending','Admmin Panel','businesslounge')),
													"default"     => "DESC",
													"transport"   => "refresh",				
													"type"        => "select"
												),

										),
						),		

						array(
							'id'       => 'featured_img',									
							'title'    => esc_html_x("Featured Images", "Admin Panel", "businesslounge"), 
							"description" => esc_html_x('Enable the "Image Resize" to resize or crop the featured images automatically. These settings will be used as globaly and you can change for each portfolio post individiually (via edit post screen). 
												Please note, since the theme is reponsive the images cannot be wider than the column they are in. Leave these values "0" to use theme defaults.',"Admin Panel","businesslounge"),

							'controls' => array( 

												array(
													"label"       => esc_html_x("Image Resize","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portfolio_image_resize",
													"choices"     =>  array(
																		"false" => esc_html_x("Disabled","Admin Panel","businesslounge"),						
																		"true" => esc_html_x("Enabled","Admin Panel","businesslounge"),
																	),			
													"default"   => "true",
													"transport" => "postMessage", 
													"type"      => "select"
												),		

												array(
													"label"       => esc_html_x("Featured Image Max Width","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portfolio_image_width",
													"default"     => 0, 
													"type"        => "number",
													"transport"   => "postMessage",
													"input_attrs" => array("min"=>0,"max"=>3000, "data-depends-id" => "businesslounge_portfolio_image_resize", "data-depends-values" => "true")
												),


												array(
													"label"       => esc_html_x("Featured Image Max Height","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portfolio_image_height",
													"default"     => 0, 
													"type"        => "number",
													"transport"   => "postMessage",
													"input_attrs" => array("min"=>0,"max"=>3000, "data-depends-id" => "businesslounge_portfolio_image_resize", "data-depends-values" => "true")
												),

												array(
													"label"       => esc_html_x("Crop Featured Image","Admin Panel","businesslounge"),
													"id"          => "businesslounge_portfolio_image_crop",
													"default"     => "",
													"transport"   => "postMessage",
													"type"        => "rt_checkbox",
													"input_attrs" => array("data-depends-id" => "businesslounge_portfolio_image_resize", "data-depends-values" => "true")
												),
									 

										),
						),		


						array(
							'id'       => 'comment',									
							'title'    => esc_html_x("Comments", "Admin Panel", "businesslounge"), 
							'controls' => array( 

												array(
													"label"       => esc_html_x("Enable Commenting","Admin Panel","businesslounge"),
													"description" => esc_html_x('If enabled your website visitors will be able to leave a comment in the single portfolio item page while viewing that single portfolio page. If enabled in here you can still turn commenting off in the single portfolio item itself by unchecking the comments option in that post in the admin backend. If you don&#39;t see that option you can enable it by clicking on the screen options below the admin name while you are working in the single portfolio item.',"Admin Panel","businesslounge"),
													"id"          => "businesslounge_portfolio_comments",
													"default"     => "",
													"transport"   => "postMessage",
													"type"        => "checkbox"
												),
									 

										),
						),


				)
);
