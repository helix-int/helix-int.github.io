<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Create options
 */
$this->options["rt_color_schemas"] = array(
		'title' => esc_html_x("Styling Options", 'Admin Panel', "businesslounge"),  
		'priority'=> 2,
		'sections' => array(

							array(
								'id'       => 'topbar',
								'title'    => esc_html_x("Top Bar", 'Admin Panel', 'businesslounge'),
								"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector=".businesslounge-top-bar" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel', 'businesslounge').'"></a>'. esc_html_x('Use the following settings to customize your top bar.','Admin Panel', 'businesslounge'),
								'controls' => array(

													array(
														"id"          => "businesslounge_display_topbar",		
														"label"       => esc_html_x("Display Top Bar",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"default"     => false,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => RT_THEMESLUG."_top_bar_content_width",
														"label"       => esc_html_x("Top Bar Content Width",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"choices"     => array(
																			"fullwidth" => esc_html_x("Full Width",'Admin Panel', 'businesslounge'),
																			"default"   => esc_html_x("Default",'Admin Panel', 'businesslounge'),
																		),
														"type"    => "select",
														"default" => "default",
														"rt_skin" => true
													),

													array(
														"id"          => RT_THEMESLUG."_top_bar_colors",
														"label"       => esc_html_x('Color Set for Top Bar','Admin Panel', 'businesslounge'),
														"type"        => "rt_seperator"
													),


	 												array(
														"id"          => RT_THEMESLUG."_topbar_bg_color",
														"label"       => esc_html_x("Background Color",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#000000",
														"type"        => "rt_color",
														"rt_skin"     => true
													),

													array(
														"id"          => RT_THEMESLUG."_topbar_font_color",
														"label"       => esc_html_x("Font Color",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#ffffff",
														"type"        => "rt_color",
														"rt_skin"     => true
													),

													array(
														"id"          => RT_THEMESLUG."_topbar_link_color",
														"label"       => esc_html_x("Link Color",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#ffffff",
														"type"        => "rt_color",
														"rt_skin"     => true
													),

													array(
														"id"          => RT_THEMESLUG."_topbar_link_hover_color",
														"label"       => esc_html_x("Link Hover Color",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#CE1B28",
														"type"        => "rt_color",
														"rt_skin"     => true
													),

													array(
														"id"          => RT_THEMESLUG."_topbar_border_color",
														"label"       => esc_html_x("Elements Border Color",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#333333",
														"type"        => "rt_color",
														"rt_skin"     => true
													),

													array(
														"id"          => RT_THEMESLUG."_topbar_bottom_border_color",
														"label"       => esc_html_x("Bottom Border Color",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#333333",
														"type"        => "rt_color",
														"rt_skin"     => true
													),


											),
							),


							array(
								'id'       => 'body',
								'title'    => esc_html_x("Body",'Admin Panel', "businesslounge"), 
								"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector="body" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel','businesslounge').'"></a>'. esc_html_x('Following settings will be applied to the page body and the content holder.','Admin Panel',"businesslounge"),
								'controls' => array( 

													array(
														"id"          => "businesslounge_boxed_body",		
														"label"       => esc_html_x("Boxed Body Style",'Admin Panel','businesslounge'),
														"transport"   => "refresh",															
														"default"     => "",
														"type"        => "checkbox",
														"rt_skin"     => true
													),


 													array(
														"id"          => "businesslounge_body_seperator2",	
														"label"       => esc_html_x('Body Background','Admin Panel','businesslounge'),
														"description" => esc_html_x("Note: Page body will only be visible when a content row width is not full width or has a transparent background.",'Admin Panel','businesslounge'),															
														"type"        => "rt_subsection_heading"
													),


													array(
														"id"          => "businesslounge_body_background_color",	
														"label"       => esc_html_x("Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "#ffffff",															
														"type"        => "color",
														"rt_skin"     => true
													),
													
													array(
														"id"          => "businesslounge_body_background_image_url", 	
														"label"       => esc_html_x("Background Image",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"type"        => "media",
														"default"     => "",
														"rt_skin"     => true
													), 
													 
													array(
														"id"          => "businesslounge_body_background_position",	
														"label"       => esc_html_x("Position",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																					"right top"     => esc_html_x("Right Top",'Admin Panel',"businesslounge"),
																					"right center"  => esc_html_x("Right Center",'Admin Panel',"businesslounge"),
																					"right bottom"  => esc_html_x("Right Bottom",'Admin Panel',"businesslounge"),
																					"left top"      => esc_html_x("Left Top",'Admin Panel',"businesslounge"),
																					"left center"   => esc_html_x("Left Center",'Admin Panel',"businesslounge"),
																					"left bottom"   => esc_html_x("Left Bottom",'Admin Panel',"businesslounge"),
																					"center top"    => esc_html_x("Center Top",'Admin Panel',"businesslounge"),
																					"center center" => esc_html_x("Center Center",'Admin Panel',"businesslounge"),
																					"center bottom" => esc_html_x("Center Bottom",'Admin Panel',"businesslounge"),
																				),  
														"type"        => "select",
														"default"     => "center center",
														"rt_skin"     => true
													), 
												
													array(
														"id"          => "businesslounge_body_background_attachment",	
														"label"       => esc_html_x("Attachment",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array("scroll" =>esc_html_x("Scroll",'Admin Panel',"businesslounge"), "fixed"  =>esc_html_x("Fixed",'Admin Panel',"businesslounge")),  
														"type"        => "radio",
														"default"     => "scroll",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_body_background_repeat",	
														"label"       => esc_html_x("Repeat",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																					"repeat"       => esc_html_x("Tile",'Admin Panel',"businesslounge"),
																					"repeat-x"     => esc_html_x("Tile Horizontally",'Admin Panel',"businesslounge"),
																					"repeat-y"     => esc_html_x("Tile Vertically",'Admin Panel',"businesslounge"),
																					"no-repeat"    => esc_html_x("No Repeat",'Admin Panel',"businesslounge"),
																				),  
														"type"        => "radio",
														"default"     => "repeat",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_body_background_size",	
														"label"       => esc_html_x("Background Size",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																				"auto auto" => esc_html_x("Auto",'Admin Panel',"businesslounge"),
																				"cover"     => esc_html_x("Cover",'Admin Panel',"businesslounge"),
																				"contain"   => esc_html_x("Contain",'Admin Panel',"businesslounge"),
																				"100% auto" => esc_html_x("100%",'Admin Panel',"businesslounge"),
																				"50% auto"  => esc_html_x("50%",'Admin Panel',"businesslounge"),
																				"25% auto"  => esc_html_x("25%",'Admin Panel',"businesslounge"),
																			),  
														"default" => "auto auto",
														"type"    => "select",
														"rt_skin"   => true
													),  
 
											),
							),

							array(
								'id'       => 'content_rows',
								'title'    => esc_html_x("Content Rows", 'Admin Panel','businesslounge'), 
								'controls' => array( 

													array(
														"id"          => "businesslounge_default_content_wrapper_width",	
														"label"       => esc_html_x("Default Content Width",'Admin Panel','businesslounge'),
														"description" => esc_html_x("Select a globally width for the content rows.",'Admin Panel','businesslounge'),
														"transport"   => "refresh",															
														"choices"     => array(		
																			"default" => esc_html_x("Default",'Admin Panel','businesslounge'),
																			"fullwidth" => esc_html_x("Full Width",'Admin Panel','businesslounge'),
																		),  
														"type"    => "select",
														"default" => "default",
														"rt_skin" => true
													)												
											),
							),

							array(
								'id'       => 'main_header',
								'title'    => esc_html_x("Header",'Admin Panel',"businesslounge"), 
								"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector=".top-header" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel','businesslounge').'"></a>'. esc_html_x('Use following settings to customize the header section of your website.','Admin Panel',"businesslounge"),
								'controls' => array( 


													array(
														"id"          => "businesslounge_header_seperator_2",	
														"label"       => esc_html_x('Header Functionality','Admin Panel','businesslounge'),															
														"type"        => "rt_subsection_heading"
													),

													array(
														"id"          => "businesslounge_display_header",		
														"label"       => esc_html_x("Header Visibility",'Admin Panel','businesslounge'),
														"description" => esc_html_x('Control the visibility of the header.','Admin Panel','businesslounge'),
														"transport"   => "refresh",															
														"default"     => true,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_sticky_header", 	
														"label"       => esc_html_x("Sticky Header",'Admin Panel','businesslounge'),
														"description" => esc_html_x("Enable / disable the sticky header.",'Admin Panel','businesslounge'), 
														"transport"   => "refresh",															
														"default"     => true,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_sticky_header_style",	
														"label"       => esc_html_x("Sticky Header Behaviour",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																				"1" => esc_html_x("Stick when scrolling up",'Admin Panel', 'businesslounge'),
																				"2" => esc_html_x("Stick always",'Admin Panel', 'businesslounge'),
																			),  
														"type" => "select",
														"default" => "1",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_overlapped_header", 	
														"label"       => esc_html_x("Overlapped Header",'Admin Panel','businesslounge'),
														"description" => esc_html_x("If checked the main header or a part of it will be overlapped onto the next content.",'Admin Panel','businesslounge'), 
														"transport"   => "refresh",															
														"default"     => true,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_display_main_menu",		
														"label"       => esc_html_x("Display Main Menu",'Admin Panel','businesslounge'),
														"description" => esc_html_x("Control the visibility of the the main navigation menu.",'Admin Panel','businesslounge'), 
														"transport"   => "refresh",
														"default"     => true,
														"type"        => "checkbox",
														"rt_skin"     => true
													),																										

													array(
														"id"          => "businesslounge_header_wpml",		
														"label"       => esc_html_x("Display Languages Menu Icon",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"default"     => true,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_header_search",		
														"label"       => esc_html_x("Display Search Icon",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"default"     => true,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_header_cart",		
														"label"       => esc_html_x("Display Cart Icon",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"default"     => true,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_header_user",		
														"label"       => esc_html_x("Display User Icon",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"default"     => false,
														"type"        => "checkbox",
														"rt_skin"     => true
													),


													array(
														"id"          => "businesslounge_header_sidepanel",		
														"label"       => esc_html_x("Display Side Panel Icon",'Admin Panel','businesslounge'). " - " .esc_html_x("Desktop",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"default"     => false,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_header_sidepanel_mobile",		
														"label"       => esc_html_x("Display Side Panel Icon",'Admin Panel','businesslounge'). " - " .esc_html_x("Mobile",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"default"     => false,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													
													array(
														"id"          => "businesslounge_header_seperator_3",	
														"label"       => esc_html_x('Header Styling','Admin Panel','businesslounge'),															
														"description" => wp_kses_post('Note: Skin related header colors can be found inside the "Styling Options > Dark Header Skin" and "Styling Options > Light Header Skin" sections.','Admin Panel','businesslounge'),															
														"type"        => "rt_subsection_heading"
													),

													array(
														"id"          => "businesslounge_header_width",	
														"label"       => esc_html_x("Global Header Width",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																					"default"   => esc_html_x("Content Width",'Admin Panel', 'businesslounge'),
																					"fullwidth" => esc_html_x("Full Width",'Admin Panel', 'businesslounge'),  
																			),  
														"type" => "select",
														"default" => "default",
														"rt_skin"   => true
													),


													array(
														"id"          => "businesslounge_header_style",	
														"label"       => esc_html_x("Global Header Style",'Admin Panel', 'businesslounge'), 
														"description" => esc_html_x('Note 1: When you change the header style, you must check the other header related settings like Header Height, Header Background Color and Header Skin.','Admin Panel','businesslounge')
																		.'(<a href="javascript:void();" id="rt-header-defaults" class="rt-skin-selector">'. esc_html_x('click here to apply the default values of the selected style','Admin Panel','businesslounge'). '</a>) '
																		.'<br /><br />'. sprintf(esc_html_x('Note 2: You may also need to re-organize the header related widgets via the %sWidgets%s section.','Admin Panel','businesslounge'),'<a href="javascript:wp.customize.panel( \'widgets\' ).focus();">','</a>'),
														"transport"   => "refresh",															
														"choices"     => array(		
																				"1"  => esc_html_x("Style 1",'Admin Panel', 'businesslounge') ." - ". esc_html_x("Two Rows & Double Row Logo Box ",'Admin Panel', 'businesslounge'),
																				"2"  => esc_html_x("Style 2",'Admin Panel', 'businesslounge') ." - ". esc_html_x("Two Rows & One Row Logo Box ",'Admin Panel', 'businesslounge'),
																				"3"  => esc_html_x("Style 3",'Admin Panel', 'businesslounge') ." - ". esc_html_x("One Row, Left Logo Box ",'Admin Panel', 'businesslounge'),
																				"4"  => esc_html_x("Style 4",'Admin Panel', 'businesslounge') ." - ". esc_html_x("One Row, Centered Logo Box ",'Admin Panel', 'businesslounge'),
																			),  
														"type" => "select",
														"default" => "1",
														"rt_skin"   => true
													),


													array(
														"id"          => "businesslounge_first_header_row_seperator",	
														"label"       => esc_html_x("First Header Row",'Admin Panel', 'businesslounge'),  
														"type"        => "rt_seperator"
													),

													array(
														"id"          => "businesslounge_header_first_color_skin",	
														"label"       => esc_html_x("Global Header Skin - First Row",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																					"dark"  => esc_html_x("Header Dark Skin",'Admin Panel', 'businesslounge'),
																					"light" => esc_html_x("Header Light Skin",'Admin Panel', 'businesslounge'), 
																			),  
														"type" => "select",
														"default" => "dark",
														"rt_skin"   => true
													),

													array(
															"id"          => "businesslounge_main_header_first_row_bg_color",	
															"label"       => esc_html_x("Background Color - First Row",'Admin Panel','businesslounge'),
															"description" => "",
															"transport"   => "refresh",
															"default"     => "#ffffff",	 										
															"type"        => "rt_color",
															"rt_skin"     => true
													),		

 													array(
														"id"          => "businesslounge_header_height_first",	
														"label"       => esc_html_x("Header Height (px) - First Row",'Admin Panel','businesslounge'),
														"description" =>  esc_html_x("Height of the first row of the header. The value should not be lower than 40px.",'Admin Panel','businesslounge'), 
														"type"        => "number",
														"transport"   => "refresh",
														"default"     => 65,
														"input_attrs" => array("min"=>40,"max"=>500, "data-depends-id" => "businesslounge_header_style", "data-depends-values" => "1,2"),
														"rt_skin"     => true
													),

 													array(
														"id"          => "businesslounge_header_height_single",	
														"label"       => esc_html_x("Header Height (px) - First Row",'Admin Panel','businesslounge'),
														"description" =>  esc_html_x("Height of the first row of the header. The value should not be lower than 40px.",'Admin Panel','businesslounge'), 
														"type"        => "number",
														"transport"   => "refresh",
														"default"     => 100,
														"input_attrs" => array("min"=>40,"max"=>500, "data-depends-id" => "businesslounge_header_style", "data-depends-values" => "3,4"),
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_second_header_row_seperator",	
														"label"       => esc_html_x("Second Header Row",'Admin Panel', 'businesslounge'), 
														"input_attrs" => array("data-depends-id" => "businesslounge_header_style", "data-depends-values" => "1,2"),
														"type"        => "rt_seperator"
													),

													array(
														"id"          => "businesslounge_header_second_color_skin",	
														"label"       => esc_html_x("Global Header Skin - Second Row",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																					"dark"  => esc_html_x("Header Dark Skin",'Admin Panel', 'businesslounge'),
																					"light" => esc_html_x("Header Light Skin",'Admin Panel', 'businesslounge'), 
																			),  
														"type" => "rt_select",
														"default" => "light",
														"input_attrs" => array("data-depends-id" => "businesslounge_header_style", "data-depends-values" => "1,2"),
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_main_header_second_row_bg_color",	
														"label"       => esc_html_x("Background Color - Second Row",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "rgba(0,0,0,0.17)",	 										
														"type"        => "rt_color",
														"input_attrs" => array("data-depends-id" => "businesslounge_header_style", "data-depends-values" => "1,2"),
														"rt_skin"     => true
													),		


 													array(
														"id"          => "businesslounge_header_height_second",	
														"label"       => esc_html_x("Header Height (px) - Second Row",'Admin Panel','businesslounge'),
														"description" =>  esc_html_x("Height of the second row of the header. The value should not be lower than 40px.",'Admin Panel','businesslounge'), 
														"type"        => "number",
														"transport"   => "refresh",
														"default"     => 65,
														"input_attrs" => array("min"=>40,"max"=>500,"data-depends-id" => "businesslounge_header_style", "data-depends-values" => "1,2"),
														"rt_skin"     => true
													),


													array(
														"id"          => "businesslounge_sticky_header_row_seperator",	
														"label"       => esc_html_x("Sticky Header",'Admin Panel', 'businesslounge'),  
														"type"        => "rt_seperator"
													),

													array(
														"id"          => "businesslounge_header_color_skin_sticky",	
														"label"       => esc_html_x("Global Sticky Header Skin",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																					"dark"  => esc_html_x("Header Dark Skin",'Admin Panel', 'businesslounge'),
																					"light" => esc_html_x("Header Light Skin",'Admin Panel', 'businesslounge'), 
																			),  
														"type" => "select",
														"default" => "dark",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_main_header_row_bg_color_sticky",	
														"label"       => esc_html_x("Sticky Header Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#ffffff",															
														"type"        => "rt_color",
														"rt_skin"     => true
													),		




													array(
														"id"          => "businesslounge_header_seperator_4",	
														"description" => "",
														"label"       => esc_html_x('Miscellaneous Settigns','Admin Panel','businesslounge'),															
														"type"        => "rt_subsection_heading"
													),

													array(
														"id"          => "businesslounge_header_menu_location",	
														"label"       => esc_html_x("Menu Location",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																				"1"  => esc_html_x("First Row - Left",'Admin Panel', 'businesslounge'),
																				"2"  => esc_html_x("First Row - Right",'Admin Panel', 'businesslounge'),
																				"3"  => esc_html_x("Second Row - Left",'Admin Panel', 'businesslounge'),
																				"4"  => esc_html_x("Second Row - Right",'Admin Panel', 'businesslounge'),
																			),  
														"type" => "select",
														"default" => "3",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_header_icon_location",	
														"label"       => esc_html_x("Tool Icons Location",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																				"1"  => esc_html_x("First Row - Left",'Admin Panel', 'businesslounge'),
																				"2"  => esc_html_x("First Row - Right",'Admin Panel', 'businesslounge'),
																				"3"  => esc_html_x("Second Row - Left",'Admin Panel', 'businesslounge'),
																				"4"  => esc_html_x("Second Row - Right",'Admin Panel', 'businesslounge'),
																			),  
														"type" => "select",
														"default" => "2",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_header_seperator_5",	
														"description" => "",
														"label"       => esc_html_x('Navigation Paddings','Admin Panel','businesslounge'),															
														"type"        => "rt_subsection_heading"
													),

													array(
														"id"          => "businesslounge_nav_item_vertical_padding",	
														"label"       => esc_html_x("Item Vertical Padding (px)",'Admin Panel','businesslounge'),
														"type"        => "number",
														"transport"   => "refresh",
														"default"     => 8,
														"input_attrs" => array("min"=>0,"max"=>100),
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_nav_item_horizontal_padding",	
														"label"       => esc_html_x("Item Horizontal Padding (px)",'Admin Panel','businesslounge'),
														"type"        => "number",
														"transport"   => "refresh",
														"default"     => 12,
														"input_attrs" => array("min"=>0,"max"=>100),
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_sub_nav_item_horizontal_padding",	
														"label"       => esc_html_x("Sub Item Horizontal Padding (px)",'Admin Panel','businesslounge'),
														"type"        => "number",
														"transport"   => "refresh",
														"default"     => 20,
														"input_attrs" => array("min"=>0,"max"=>100),
														"rt_skin"     => true
													),
											),
							),		

							array(
								'id'       => 'mobile_header',
								'title'    => esc_html_x("Mobile Header",'Admin Panel',"businesslounge"), 
								"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector=".top-header" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel','businesslounge').'"></a>'. esc_html_x('Use following settings to customize the header section of your website.','Admin Panel',"businesslounge"),
								'controls' => array( 

													array(
														"id"          => "businesslounge_display_mobile_header",		
														"label"       => esc_html_x("Mobile Header Visibility",'Admin Panel','businesslounge'),
														"description" => esc_html_x('Control the visibility of the mobile header.','Admin Panel','businesslounge'),
														"transport"   => "refresh",															
														"default"     => true,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_mobile_menu",		
														"label"       => esc_html_x("Mobile Menu",'Admin Panel','businesslounge'),
														"description" => esc_html_x("Control the visibility of only the mobile menu for small screens.",'Admin Panel','businesslounge'),
														"transport"   => "refresh",															
														"default"     => true,
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_header_color_skin_mobile",	
														"label"       => esc_html_x("Mobile Header Skin",'Admin Panel', 'businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																					"dark"  => esc_html_x("Header Dark Skin",'Admin Panel', 'businesslounge'),
																					"light" => esc_html_x("Header Light Skin",'Admin Panel', 'businesslounge'), 
																			),  
														"type" => "select",
														"default" => "dark",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_mobile_header_top_padding",	
														"label"       => esc_html_x("Top Padding (px)",'Admin Panel','businesslounge'),
														"type"        => "number",
														"transport"   => "refresh",
														"default"     => 10,
														"input_attrs" => array("min"=>0,"max"=>100),
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_mobile_header_bottom_padding",	
														"label"       => esc_html_x("Bottom Padding (px)",'Admin Panel','businesslounge'),
														"type"        => "number",
														"transport"   => "refresh",
														"default"     => 10,
														"input_attrs" => array("min"=>0,"max"=>100),
														"rt_skin"     => true
													),
 
													array(
														"id"          => "businesslounge_mobile_header_row_bg_color",	
														"label"       => esc_html_x("Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#ffffff",															
														"type"        => "rt_color",
														"rt_skin"     => true
													),		
 
													array(
														"id"          => "businesslounge_nav_seperator_mobile",	
														"label"       => esc_html_x('Mobile Menu Colors','Admin Panel','businesslounge'),															
														"description" => esc_html_x('Customize the mobile menu colors.','Admin Panel','businesslounge'),															
														"type"        => "rt_subsection_heading"
													),

													array(
														"id"          => "businesslounge_mobile_nav_item_background_color",	
														"label"       => esc_html_x("Mobile Menu Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#000000",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_mobile_nav_item_font_color",	
														"label"       => esc_html_x("Menu Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#ffffff",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_mobile_nav_item_desc_font_color",	
														"label"       => esc_html_x("Menu Item Description Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#dddddd",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		

													array(
														"id"          => "businesslounge_mobile_nav_item_font_color_active",	
														"label"       => esc_html_x("Active Menu Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#CE1B28",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_mobile_nav_item_border_color",	
														"label"       => esc_html_x("Mobile Menu Border Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#464646",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
											),
							),		

							array(
								'id'       => 'main_header_dark_skin',
								'title'    => esc_html_x("Dark Header Skin",'Admin Panel',"businesslounge"), 
								"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector=".businesslounge-dark-header  .top-header" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel','businesslounge').'"></a>'. esc_html_x('Use following settings to customize the dark header skin of your website.','Admin Panel',"businesslounge"),
								'controls' => array( 


													array(
														"id"          => "main_header_dark_skin_c1",	
														"label"       => esc_html_x('Colors','Admin Panel','businesslounge'),															
														"description" => "",															
														"type"        => "rt_subsection_heading"
													),

 													array(
														"id"          => "businesslounge_main_header_primary_color_dark",	
														"label"       => esc_html_x("Primary Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#CE1B28",															
														"type"        => "rt_color",
														"rt_skin"     => true
													),		 

 													array(
														"id"          => "businesslounge_main_header_border_color_dark",	
														"label"       => esc_html_x("Border Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "rgba(0, 0, 0, 0.07)",															
														"type"        => "rt_color",
														"rt_skin"     => true
													),		 
 	 
													array(
														"id"          => "businesslounge_main_header_font_color_dark",	
														"label"       => esc_html_x("Header Text Font Color",'Admin Panel','businesslounge'),
														"transport"   => "refresh",
														"default"     => "#444444",
														"type"        => "rt_color",
														"rt_skin"     => true
													),


													array(
														"id"          => "main_header_dark_skin_s2",	
														"label"       => esc_html_x('Top Level Menu Items','Admin Panel','businesslounge'),															
														"description" => esc_html_x("Customize the top level menu items of the main navigation which appears top of the page.",'Admin Panel','businesslounge'),															
														"type"        => "rt_subsection_heading"
													),

													array(
														"id"          => "businesslounge_nav_item_background_color_dark",	
														"label"       => esc_html_x("Menu Item Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
													 
													array(
														"id"          => "businesslounge_nav_item_font_color_dark",	
														"label"       => esc_html_x("Menu Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "#444444",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		 

													array(
														"id"          => "businesslounge_nav_item_border_color_dark",	
														"label"       => esc_html_x("Menu Item Border Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		 

													array(
														"id"          => "businesslounge_nav_item_background_color_active_dark",	
														"label"       => esc_html_x("Active Menu Item Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
													 
													array(
														"id"          => "businesslounge_nav_item_font_color_active_dark",	
														"label"       => esc_html_x("Active Menu Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#757575",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_nav_item_indicator_color_active_dark",	
														"label"       => esc_html_x("Active Menu Item Indicator Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#CE1B28",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),


													array(
														"id"          => "main_header_dark_skin_s3",	
														"label"       => esc_html_x('Sub Level Menu Items','Admin Panel','businesslounge'),															
														"description" => esc_html_x('Customize the sub level menu items of the main navigation.','Admin Panel','businesslounge'),															
														"type"        => "rt_subsection_heading"
													),

													array(
														"id"          => "businesslounge_sub_nav_item_background_color_dark",	
														"label"       => esc_html_x("Sub Menu Item Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "#222222",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
													 
													array(
														"id"          => "businesslounge_sub_nav_item_font_color_dark",	
														"label"       => esc_html_x("Sub Menu Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "#ffffff",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),						 

													array(
														"id"          => "businesslounge_sub_nav_item_desc_font_color_dark",	
														"label"       => esc_html_x("Sub Menu Item Description Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#d3d3d3",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		

													array(
														"id"          => "businesslounge_sub_nav_item_border_color_dark",	
														"label"       => esc_html_x("Sub Menu Item Border Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "rgba(255, 255, 255, 0.2)",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		 

													array(
														"id"          => "businesslounge_sub_nav_item_background_color_active_dark",	
														"label"       => esc_html_x("Active Sub Menu Item Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
													 
													array(
														"id"          => "businesslounge_sub_nav_item_font_color_active_dark",	
														"label"       => esc_html_x("Active Sub Menu Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#CE1B28",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_sub_nav_item_indicator_color_active_dark",	
														"label"       => esc_html_x("Active Sub Menu Item Indicator Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#CE1B28",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
 
 													array(
														"id"          => "businesslounge_mega_title_item_font_color_dark",	
														"label"       => esc_html_x("Multi Column Title Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#ffffff",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		 

													array(
														"id"          => "businesslounge_mega_title_item_border_color_dark",	
														"label"       => esc_html_x("Multi Column Title Item Border Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "rgba(255, 255, 255, 0.2)",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		 

											),
							),		

							array(
								'id'       => 'main_header_light_skin',
								'title'    => esc_html_x("Light Header Skin",'Admin Panel',"businesslounge"), 
								"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector=".businesslounge-light-header .top-header" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel','businesslounge').'"></a>'. esc_html_x('Use following settings to customize the light header skin of your website.','Admin Panel',"businesslounge"),
								'controls' => array( 

													array(
														"id"          => "main_header_light_skin_c1",	
														"label"       => esc_html_x('Colors','Admin Panel','businesslounge'),															
														"description" => "",															
														"type"        => "rt_subsection_heading"
													),


 													array(
														"id"          => "businesslounge_main_header_primary_color_light",	
														"label"       => esc_html_x("Primary Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "rgba(255, 255, 255, 0.85)",															
														"type"        => "rt_color",
														"rt_skin"     => true
													),		 

 													array(
														"id"          => "businesslounge_main_header_border_color_light",	
														"label"       => esc_html_x("Border Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "rgba(255, 255, 255, 0.2)",															
														"type"        => "rt_color",
														"rt_skin"     => true
													),		 

													array(
														"id"          => "businesslounge_main_header_font_color_light",	
														"label"       => esc_html_x("Text Logo Font Color",'Admin Panel','businesslounge'),
														"transport"   => "refresh",
														"default"     => "#ffffff",
														"type"        => "rt_color",
														"rt_skin"     => true
													),

													array(
														"id"          => "main_header_light_skin_s2",	
														"label"       => esc_html_x('Top Level Menu Items','Admin Panel','businesslounge'),															
														"description" => esc_html_x("Customize the top level menu items of the main navigation which appears top of the page.",'Admin Panel','businesslounge'),															
														"type"        => "rt_subsection_heading"
													),


													array(
														"id"          => "businesslounge_nav_item_background_color_light",	
														"label"       => esc_html_x("Menu Item Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
													 
													array(
														"id"          => "businesslounge_nav_item_font_color_light",	
														"label"       => esc_html_x("Menu Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "#ffffff",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		 

													array(
														"id"          => "businesslounge_nav_item_border_color_light",	
														"label"       => esc_html_x("Menu Item Border Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		 

													array(
														"id"          => "businesslounge_nav_item_background_color_active_light",	
														"label"       => esc_html_x("Active Menu Item Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
													 
													array(
														"id"          => "businesslounge_nav_item_font_color_active_light",	
														"label"       => esc_html_x("Active Menu Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "rgba(255, 255, 255, 0.5)",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_nav_item_indicator_color_active_light",	
														"label"       => esc_html_x("Active Menu Item Indicator Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "rgba(255, 255, 255, 0.52)",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),


													array(
														"id"          => "main_header_light_skin_s3",	
														"label"       => esc_html_x('Sub Level Menu Items','Admin Panel','businesslounge'),															
														"description" => esc_html_x('Customize the sub level menu items of the main navigation.','Admin Panel','businesslounge'),															
														"type"        => "rt_subsection_heading"
													),

													array(
														"id"          => "businesslounge_sub_nav_item_background_color_light",	
														"label"       => esc_html_x("Sub Menu Item Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "#ffffff",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
													 
													array(
														"id"          => "businesslounge_sub_nav_item_font_color_light",	
														"label"       => esc_html_x("Sub Menu Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "#323232",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),						 

													array(
														"id"          => "businesslounge_sub_nav_item_desc_font_color_light",	
														"label"       => esc_html_x("Sub Menu Item Description Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#8e8e8e",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		

													array(
														"id"          => "businesslounge_sub_nav_item_border_color_light",	
														"label"       => esc_html_x("Sub Menu Item Border Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#efefef",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		 

													array(
														"id"          => "businesslounge_sub_nav_item_background_color_active_light",	
														"label"       => esc_html_x("Active Sub Menu Item Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
													 
													array(
														"id"          => "businesslounge_sub_nav_item_font_color_active_light",	
														"label"       => esc_html_x("Active Sub Menu Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#CE1B28",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_sub_nav_item_indicator_color_active_light",	
														"label"       => esc_html_x("Active Sub Menu Item Indicator Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#CE1B28",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),
 
  													array(
														"id"          => "businesslounge_mega_title_item_font_color_light",	
														"label"       => esc_html_x("Multi Column Title Item Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#CE1B28",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		 

													array(
														"id"          => "businesslounge_mega_title_item_border_color_light",	
														"label"       => esc_html_x("Multi Column Title Item Border Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#efefef",															
														"type"        => "rt_color",
														"rt_skin"   => true
													),		 

											),
							),		
 
							array(
								'id'       => 'sub_header',
								'title'    => esc_html_x("Sub Header", 'Admin Panel',"businesslounge"), 
								"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector=".sub_page_header" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel','businesslounge').'"></a>'. esc_html_x('Use following settings to customize the sub header section of your website.','Admin Panel',"businesslounge"),
								'controls' => array( 

													array(
														"id"          => "businesslounge_sub_header_style",	
														"label"       => esc_html_x("Style",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			"style-1"  => esc_html_x("Style 1",'Admin Panel','businesslounge') ."-". esc_html_x("Classic",'Admin Panel','businesslounge'), 
																			"style-2"  => esc_html_x("Style 2",'Admin Panel','businesslounge') ."-". esc_html_x("Centered Title & Breadcrumb Menu",'Admin Panel','businesslounge'), 
																		),  
														"default" => "style-1",
														"type"    => "select",
														"rt_skin" => true
													), 

													array(
														"id"          => "businesslounge_hide_page_title", 	
														"label"       => esc_html_x("Hide Page Titles",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"default"     => "",
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_hide_breadcrumb_menu", 	
														"label"       => esc_html_x("Hide Breadcrumb Menus",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"default"     => "",
														"type"        => "checkbox",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_header_row_seperator",	
														"label"       => "",
														"description" => esc_html_x('Sub Header Styling','Admin Panel','businesslounge'),															
														"type"        => "rt_seperator"
													),

													array(
														"id"          => "businesslounge_header_row_top_padding",	
														"label"       => esc_html_x("Top Padding (px)",'Admin Panel','businesslounge'),
														"type"        => "number",
														"transport"   => "refresh",
														"default"     => 80,
														"input_attrs" => array("min"=>0,"max"=>100),
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_header_row_bottom_padding",	
														"label"       => esc_html_x("Bottom Padding (px)",'Admin Panel','businesslounge'),
														"type"        => "number",
														"transport"   => "refresh",
														"default"     => 40,
														"input_attrs" => array("min"=>0,"max"=>100),
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_header_row_font_color",	
														"label"       => esc_html_x("Page Title Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#ffffff",															
														"type"        => "color",
														"rt_skin"     => true
													),			

													array(
														"id"          => "businesslounge_header_row_bg_color",	
														"label"       => esc_html_x("Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",
														"default"     => "#CE1B28",
														"type"        => "rt_color",
														"rt_skin"     => true
													),			

													array(
														"id"          => "businesslounge_header_row_bg_image", 	
														"label"       => esc_html_x("Background Image",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"type"        => "media",
														"rt_skin"     => true
													), 
													
													array(
														"id"          => "businesslounge_header_row_bg_position",	
														"label"       => esc_html_x("Position",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			"right top"     => esc_html_x("Right Top",'Admin Panel','businesslounge'),
																			"right center"  => esc_html_x("Right Center",'Admin Panel','businesslounge'),
																			"right bottom"  => esc_html_x("Right Bottom",'Admin Panel','businesslounge'),
																			"left top"      => esc_html_x("Left Top",'Admin Panel','businesslounge'),
																			"left center"   => esc_html_x("Left Center",'Admin Panel','businesslounge'),
																			"left bottom"   => esc_html_x("Left Bottom",'Admin Panel','businesslounge'),
																			"center top"    => esc_html_x("Center Top",'Admin Panel','businesslounge'),
																			"center center" => esc_html_x("Center Center",'Admin Panel','businesslounge'),
																			"center bottom" => esc_html_x("Center Bottom",'Admin Panel','businesslounge'),
																		),  
														"type"    => "select",
														"rt_skin" => true
													), 

												
													array(
														"id"          => "businesslounge_header_row_bg_attachment",	
														"label"       => esc_html_x("Attachment",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array("scroll" =>esc_html_x("Scroll",'Admin Panel','businesslounge'), "fixed"  =>esc_html_x("Fixed",'Admin Panel','businesslounge')),  
														"type"        => "radio",
														"default"     => "scroll",
														"rt_skin"   => true
													),


													array(
														"id"          => "businesslounge_header_row_bg_image_repeat",	
														"label"       => esc_html_x("Repeat",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																		"repeat"       => esc_html_x("Tile",'Admin Panel','businesslounge'),
																		"repeat-x"     => esc_html_x("Tile Horizontally",'Admin Panel','businesslounge'),
																		"repeat-y"     => esc_html_x("Tile Vertically",'Admin Panel','businesslounge'),
																		"no-repeat"    => esc_html_x("No Repeat",'Admin Panel','businesslounge'),
																		),  
														"type"    => "radio",
														"default" => "no-repeat",
														"rt_skin"   => true
													),

													array(
														"id"          => "businesslounge_header_row_bg_size",	
														"label"       => esc_html_x("Background Size",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																		"auto auto" => esc_html_x("Auto",'Admin Panel','businesslounge'),
																		"cover" => esc_html_x("Cover",'Admin Panel','businesslounge'),
																		"contain" => esc_html_x("Contain",'Admin Panel','businesslounge'),
																		"100% auto" => esc_html_x("100%",'Admin Panel','businesslounge'),
																		"50% auto" => esc_html_x("50%",'Admin Panel','businesslounge'),
																		"25% auto" => esc_html_x("25%",'Admin Panel','businesslounge'),
																		),  
														"default" => "auto auto",
														"type"    => "select",
														"rt_skin"   => true
													),  


													array(
														"id"          => "businesslounge_breadcrumb_seperator",	
														"label"       => "",
														"description" => esc_html_x('Breadcrumb Menu Styling','Admin Panel','businesslounge'),															
														"type"        => "rt_seperator"
													),

													array(
														"id"          => "businesslounge_breadcrumb_font_color",	
														"label"       => esc_html_x("Breadcrumb Font Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "rgba(255, 255, 255, 0.7)",															
														"type"        => "rt_color",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_breadcrumb_link_color",	
														"label"       => esc_html_x("Breadcrumb Link Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "#ffffff",															
														"type"        => "rt_color",
														"rt_skin"     => true
													),

													array(
														"id"          => "businesslounge_breadcrumb_bg_color",	
														"label"       => esc_html_x("Breadcrumb Background Color",'Admin Panel','businesslounge'),
														"description" => "",
														"transport"   => "postMessage",
														"default"     => "",															
														"type"        => "rt_color",
														"rt_skin"     => true
													),

											),
							),						

			)
	);


if( ! function_exists("rtframework_create_color_set_options") ){
	/**
	 * Add additional controls to the footer colors
	 * @return array
	 */
	function rtframework_create_color_set_options( $options ){

		$color_list = array();

		//Color Schemas

		$color_list[".side-panel-holder"] = array(
			"id" => "side_panel",
			"label" => esc_html_x("Side Panel",'Admin Panel','businesslounge'),
			"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector=".side-panel-holder" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel','businesslounge').'"></a>'. esc_html_x('A color set that can be applied to any content rows or column.','Admin Panel','businesslounge'),
			"colors" => array(
				"primary_color"         => array("color"=> "#CE1B28", "label" => esc_html_x("Primary Color",'Admin Panel','businesslounge')),
				"bg_color"              => array("color"=> "#ffffff", "label" => esc_html_x("Row Background Color",'Admin Panel','businesslounge')),				
				"font_color"            => array("color"=> "#777777", "label" => esc_html_x("Text Color",'Admin Panel','businesslounge')),
				"secondary_font_color"  => array("color"=> "#b9b9b9", "label" => esc_html_x("Secondary Text Color",'Admin Panel','businesslounge')),
				"light_text_color"      => array("color"=> "#ffffff", "label" => esc_html_x("Opposite Text Color",'Admin Panel','businesslounge')),
				"link_color"            => array("color"=> "#CE1B28", "label" => esc_html_x("Link Color",'Admin Panel','businesslounge')),
				"heading_color"         => array("color"=> "#000000", "label" => esc_html_x("Heading Color",'Admin Panel','businesslounge')),
				"border_color"          => array("color"=> "#E8E8E8", "label" => esc_html_x("Border Color",'Admin Panel','businesslounge')),
				"form_button_bg_color"  => array("color"=> "#000000", "label" => esc_html_x("Form Button Background Color",'Admin Panel','businesslounge')),
				"social_media_bg_color" => array("color"=> "#000000", "label" => esc_html_x("Social Media Icons Background Color",'Admin Panel','businesslounge')), 
			));
		
		$color_list[".default-style"] = array( 
			"id" => "default",
			"label" => esc_html_x("Color Set 1",'Admin Panel','businesslounge'),
			"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector=".default-style" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel','businesslounge').'"></a>'. esc_html_x('A color set that can be aplied to any content rows or columns.','Admin Panel','businesslounge'),
			"colors" => array(

				"primary_color"         => array("color"=> "#CE1B28", "label" => esc_html_x("Primary Color",'Admin Panel','businesslounge')),
				"bg_color"              => array("color"=> "#ffffff", "label" => esc_html_x("Row Background Color",'Admin Panel','businesslounge')),				
				"font_color"            => array("color"=> "#777777", "label" => esc_html_x("Text Color",'Admin Panel','businesslounge')),
				"secondary_font_color"  => array("color"=> "#b9b9b9", "label" => esc_html_x("Secondary Text Color",'Admin Panel','businesslounge')),
				"light_text_color"      => array("color"=> "#ffffff", "label" => esc_html_x("Opposite Text Color",'Admin Panel','businesslounge')),
				"link_color"            => array("color"=> "#CE1B28", "label" => esc_html_x("Link Color",'Admin Panel','businesslounge')),
				"heading_color"         => array("color"=> "#000000", "label" => esc_html_x("Heading Color",'Admin Panel','businesslounge')),
				"border_color"          => array("color"=> "#E8E8E8", "label" => esc_html_x("Border Color",'Admin Panel','businesslounge')),
				"form_button_bg_color"  => array("color"=> "#000000", "label" => esc_html_x("Form Button Background Color",'Admin Panel','businesslounge')),
				"social_media_bg_color" => array("color"=> "#000000", "label" => esc_html_x("Social Media Icons Background Color",'Admin Panel','businesslounge')),
				"item_bg_color"          => array("color"=> "#ffffff", "label" => esc_html_x("Frames/Boxes Background Color",'Admin Panel','businesslounge')),
			));

		$color_list[".alt-style-1"] = array( 
			"id" => "alt_style_1",
			"label" => esc_html_x("Color Set 2",'Admin Panel','businesslounge'),
			"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector=".alt-style-1" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel','businesslounge').'"></a>'. esc_html_x('A color set that can be aplied to any content rows or columns.','Admin Panel','businesslounge'),
			"colors" => array(

				"primary_color"         => array("color"=> "#000000", "label" => esc_html_x("Primary Color",'Admin Panel','businesslounge')),
				"bg_color"              => array("color"=> "#B21F28", "label" => esc_html_x("Row Background Color",'Admin Panel','businesslounge')),				
				"font_color"            => array("color"=> "#ffffff", "label" => esc_html_x("Text Color",'Admin Panel','businesslounge')),
				"secondary_font_color"  => array("color"=> "rgba(255, 255, 255, 0.74)", "label" => esc_html_x("Secondary Text Color",'Admin Panel','businesslounge')),
				"light_text_color"      => array("color"=> "#ffffff", "label" => esc_html_x("Opposite Text Color",'Admin Panel','businesslounge')),
				"link_color"            => array("color"=> "#ffffff", "label" => esc_html_x("Link Color",'Admin Panel','businesslounge')),
				"heading_color"         => array("color"=> "#ffffff", "label" => esc_html_x("Heading Color",'Admin Panel','businesslounge')),
				"border_color"          => array("color"=> "rgba(255, 255, 255, 0.38)", "label" => esc_html_x("Border Color",'Admin Panel','businesslounge')),
				"form_button_bg_color"  => array("color"=> "#8e1118", "label" => esc_html_x("Form Button Background Color",'Admin Panel','businesslounge')),
				"social_media_bg_color" => array("color"=> "#8e1118", "label" => esc_html_x("Social Media Icons Background Color",'Admin Panel','businesslounge')),
				"item_bg_color"          => array("color"=> "#8e1118", "label" => esc_html_x("Frames/Boxes Background Color",'Admin Panel','businesslounge')),
			));

		$color_list[".light-style"] = array( 
			"id" => "light_style",
			"label" => esc_html_x("Color Set 3",'Admin Panel','businesslounge'),
			"description" => '<a class="highlight-section rt-panel-icon-flash" data-section-selector=".light-style" href="#" title="'.esc_html_x('Blink the section (if used) in the current page.','Admin Panel','businesslounge').'"></a>'. esc_html_x('A color set that can be aplied to any content rows or columns.','Admin Panel','businesslounge'),
			"colors" => array(

				"primary_color"         => array("color"=> "#CE1B28", "label" => esc_html_x("Primary Color",'Admin Panel','businesslounge')),
				"bg_color"              => array("color"=> "#000000", "label" => esc_html_x("Row Background Color",'Admin Panel','businesslounge')),				
				"font_color"            => array("color"=> "#e1e1e1", "label" => esc_html_x("Text Color",'Admin Panel','businesslounge')),
				"secondary_font_color"  => array("color"=> "#fff", "label" => esc_html_x("Secondary Text Color",'Admin Panel','businesslounge')),
				"light_text_color"      => array("color"=> "#fff", "label" => esc_html_x("Opposite Text Color",'Admin Panel','businesslounge')),
				"link_color"            => array("color"=> "#CE1B28", "label" => esc_html_x("Link Color",'Admin Panel','businesslounge')),
				"heading_color"         => array("color"=> "#ffffff", "label" => esc_html_x("Heading Color",'Admin Panel','businesslounge')),
				"border_color"          => array("color"=> "rgba(255, 255, 255, 0.25)", "label" => esc_html_x("Border Color",'Admin Panel','businesslounge')),
				"form_button_bg_color"  => array("color"=> "#CE1B28", "label" => esc_html_x("Form Button Background Color",'Admin Panel','businesslounge')),
				"social_media_bg_color" => array("color"=> "rgba(255, 255, 255, 0.1)", "label" => esc_html_x("Social Media Icons Background Color",'Admin Panel','businesslounge')),
				"item_bg_color"          => array("color"=> "rgba(255, 255, 255, 0)", "label" => esc_html_x("Frames/Boxes Background Color",'Admin Panel','businesslounge')),
			));

		$color_list[".footer"] = array( 
			"id" => "footer",
			"label" => esc_html_x("Footer",'Admin Panel','businesslounge'),
			"description" => esc_html_x('Use following settings to customize the footer section of your website.','Admin Panel','businesslounge'),
			"colors" => array(

				"primary_color"         => array("color"=> "#CE1B28", "label" => esc_html_x("Primary Color",'Admin Panel','businesslounge')),
				"bg_color"              => array("color"=> "#000000", "label" => esc_html_x("Row Background Color",'Admin Panel','businesslounge')),				
				"font_color"            => array("color"=> "#aaaaaa", "label" => esc_html_x("Text Color",'Admin Panel','businesslounge')),
				"secondary_font_color"  => array("color"=> "#777777", "label" => esc_html_x("Secondary Text Color",'Admin Panel','businesslounge')),
				"light_text_color"      => array("color"=> "#ffffff", "label" => esc_html_x("Light Text Color",'Admin Panel','businesslounge')),
				"link_color"            => array("color"=> "#ffffff", "label" => esc_html_x("Link Color",'Admin Panel','businesslounge')),
				"heading_color"         => array("color"=> "#ffffff", "label" => esc_html_x("Heading Color",'Admin Panel','businesslounge')),
				"border_color"          => array("color"=> "#282828", "label" => esc_html_x("Border Color",'Admin Panel','businesslounge')),
				"form_button_bg_color"  => array("color"=> "#CE1B28", "label" => esc_html_x("Form Button Background Color",'Admin Panel','businesslounge')),
				"social_media_bg_color" => array("color"=> "rgba(255, 255, 255, 0.1)", "label" => esc_html_x("Social Media Icons Background Color",'Admin Panel','businesslounge')),
				"item_bg_color"          => array("color"=> "rgba(255,255,255,0.2)", "label" => esc_html_x("Frames/Boxes Background Color",'Admin Panel','businesslounge')),
			));


		//Create Color Sets
		foreach ($color_list as $seletor => $schema ) {
				
			$controls  =array();

			foreach ($schema["colors"] as $color_id => $color_values  ) {

				$transport = $color_id == "bg_color" ? "refresh" : "postMessage";
				$transport = $color_id == "primary_color" ? "refresh" : "postMessage";

				array_push($controls, array(
						'id'        => 'businesslounge_'.$schema["id"]."_".$color_id,
						'label'     => $color_values["label"],    
						"transport" => $transport,
						"default"   => $color_values["color"],															
						"type"      => "rt_color",
						"rt_skin"   => true
					)
				);

			}

			array_push($options["rt_color_schemas"]["sections"], array(
					'id'          => $schema["id"],
					'title'       => $schema["label"], 
					'description' => $schema["description"], 
					'controls'    => apply_filters("rtframework_color_controls_".$schema["id"], $controls )
				)
			);

		}

		return $options;
	}
}
add_filter( 'rtframework_customizer_options', 'rtframework_create_color_set_options', 10 );

if( ! function_exists("rtframework_add_new_footer_options") ){
	/**
	 * Add additional controls to the footer colors
	 * @return array
	 */
	function rtframework_add_new_footer_options( $controls ){

		array_unshift($controls, 

				array(
					"id"          => "businesslounge_display_footer",		
					"label"       => esc_html_x("Footer Visibility",'Admin Panel','businesslounge'),
					"description" => esc_html_x('Control the visibility of the footer','Admin Panel','businesslounge'),
					"transport"   => "refresh",															
					"default"     => true,
					"type"        => "checkbox",
					"rt_skin"     => true
				),

				array(
					"id"          => "businesslounge_display_footer_widgets",		
					"label"       => esc_html_x("Footer Widgets Visibility",'Admin Panel','businesslounge'),
					"description" => esc_html_x('Control the visibility of the widgets of the footer','Admin Panel','businesslounge'),
					"transport"   => "refresh",															
					"default"     => true,
					"type"        => "checkbox",
					"rt_skin"     => true
				),

				array(
					"id"          => "businesslounge_footer_layout_seperator",	
					"label" 	  => esc_html_x("Footer Layout",'Admin Panel','businesslounge'),
					"type"        => "rt_subsection_heading"
				),

				array(
					"id"          => "businesslounge_footer_width",	
					"label"       => esc_html_x("Global Footer Width",'Admin Panel', 'businesslounge'),
					"description" => "",
					"transport"   => "refresh",															
					"choices"     => array(		
												"default"  => esc_html_x("Content Width",'Admin Panel', 'businesslounge'),
												"fullwidth" => esc_html_x("Full Width",'Admin Panel', 'businesslounge'),  
										),  
					"type" => "select",
					"default" => "default",
					"rt_skin"   => true
				),

				array(
					"id"          => "businesslounge_footer_column_count",															
					"label"       => esc_html_x("Footer Column Count",'Admin Panel','businesslounge'),
					"description" => esc_html_x("Select and set the column layout of the footer widget area. Footer widgets can be presented into 1 column up to 4 columns.",'Admin Panel','businesslounge'),
					"choices"     =>  array(
												"1" => "1",
												"2" => "2",
												"3" => "3",
												"4" => "4",
												"5" => "5",
												"6" => "6",
							  				),			
					"default"   => "4",
					"transport" => "refresh", 
					"type"      => "rt_select"
				),	

				array(
					"id"          => "businesslounge_footer_col_seperator_1",	
					"label" 	  => sprintf(esc_html_x("Footer Column %s",'Admin Panel','businesslounge'),"1"),
					"type"        => "rt_seperator",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "1,2,3,4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_1",															
					"label"       => esc_html_x("Desktop Layout",'Admin Panel','businesslounge') ." (&#8805; 1200px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "6/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "1,2,3,4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_1_m",															
					"label"       => esc_html_x("Tablet Layout",'Admin Panel','businesslounge')  ." (1200px <> 768px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "12/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "1,2,3,4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_featured",		
					"label"       => esc_html_x("Featured First Column?",'Admin Panel','businesslounge'),
					"description" => "",
					"transport"   => "refresh",															
					"default"     => true,
					"type"        => "checkbox",
					"rt_skin"     => true
				),

				array(
					"id"          => "businesslounge_footer_col_seperator_2",	
					"label" 	  => sprintf(esc_html_x("Footer Column %s",'Admin Panel','businesslounge'),"2"),
					"type"        => "rt_seperator",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "2,3,4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_2",															
					"label"       => esc_html_x("Desktop Layout",'Admin Panel','businesslounge') ." (&#8805; 1200px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "2/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "2,3,4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_2_m",															
					"label"       => esc_html_x("Tablet Layout",'Admin Panel','businesslounge')  ." (1200px <> 768px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "4/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "2,3,4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_seperator_3",	
					"label" 	  => sprintf(esc_html_x("Footer Column %s",'Admin Panel','businesslounge'),"3"),													
					"type"        => "rt_seperator",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "3,4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_3",															
					"label"       => esc_html_x("Desktop Layout",'Admin Panel','businesslounge') ." (&#8805; 1200px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "2/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "3,4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_3_m",															
					"label"       => esc_html_x("Tablet Layout",'Admin Panel','businesslounge')  ." (1200px <> 768px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "4/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "3,4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_seperator_4",	
					"label" 	  => sprintf(esc_html_x("Footer Column %s",'Admin Panel','businesslounge'),"4"),															
					"type"        => "rt_seperator",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_4",															
					"label"       => esc_html_x("Desktop Layout",'Admin Panel','businesslounge') ." (&#8805; 1200px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "2/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_4_m",															
					"label"       => esc_html_x("Tablet Layout",'Admin Panel','businesslounge')  ." (1200px <> 768px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "4/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "4,5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_seperator_5",	
					"label" 	  => sprintf(esc_html_x("Footer Column %s",'Admin Panel','businesslounge'),"5"),															
					"type"        => "rt_seperator",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_5",															
					"label"       => esc_html_x("Desktop Layout",'Admin Panel','businesslounge') ." (&#8805; 1200px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "6/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_5_m",															
					"label"       => esc_html_x("Tablet Layout",'Admin Panel','businesslounge')  ." (1200px <> 768px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "6/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "5,6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_seperator_6",	
					"label" 	  => sprintf(esc_html_x("Footer Column %s",'Admin Panel','businesslounge'),"6"),
					"type"        => "rt_seperator",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_6",															
					"label"       => esc_html_x("Desktop Layout",'Admin Panel','businesslounge') ." (&#8805; 1200px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "6/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "6"),
				),	

				array(
					"id"          => "businesslounge_footer_col_6_m",															
					"label"       => esc_html_x("Tablet Layout",'Admin Panel','businesslounge')  ." (1200px <> 768px)" ,
					"choices"     =>  array(
												"1/12" => "1/12",
												"2/12" => "2/12",
												"3/12" => "3/12",
												"4/12" => "4/12",
												"5/12" => "5/12",
												"6/12" => "6/12",
												"7/12" => "7/12",
												"8/12" => "8/12",
												"9/12" => "9/12",
												"10/12" => "10/12",		
												"11/12" => "11/12",		
												"12/12" => "12/12",																																																
							  				),			
					"default"   => "6/12",
					"transport" => "refresh", 
					"type"      => "rt_select",
					"input_attrs" => array("data-depends-id" => "businesslounge_footer_column_count", "data-depends-values" => "6"),
				),	

				array(
					"id"          => "businesslounge_footer_row_seperator",	
					"label" 	  => esc_html_x("Color Set",'Admin Panel','businesslounge'),
					"description" => esc_html_x('A color set that used only for footer elements.','Admin Panel','businesslounge'),															
					"type"        => "rt_subsection_heading"
				)			
		);

		return $controls;
	}
}
add_filter( 'rtframework_color_controls_footer', 'rtframework_add_new_footer_options', 20 );
