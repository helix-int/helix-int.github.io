<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * RT-Theme Blog Options
 */
		$this->options["typography"] = array(

				'title' => esc_html_x("Typography Options", 'Admin Panel','businesslounge'), 
				'description' => "", 
				'priority' => 3,
				'sections' => array(

									array(
										'id'       => 'body',
										'title'    => esc_html_x("Body", 'Admin Panel','businesslounge'), 
										'controls' => array( 
															array(
																"id"          => 'businesslounge_body_font',															
																"label"       => esc_html_x("Font",'Admin Panel','businesslounge'),
																"choices"     =>  $this->fonts,
																"input_attrs" => array("class"=>"rt_fonts", "data-variant-id"=> 'businesslounge_body_font_variant', "data-subset-id"=> 'businesslounge_body_font_subset'),
																"default"   => "google||Fira Sans",
																"transport" => "refresh", 
																"type"      => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => 'businesslounge_body_font_subset',															
																"label"       => esc_html_x("Subsets",'Admin Panel','businesslounge'),
																"choices"     => array(),			
																"default"     => array("latin"),
																"input_attrs" => array("multiple"=>"multiple"),
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => 'businesslounge_body_font_variant',															
																"label"       => esc_html_x("Font Weight",'Admin Panel','businesslounge'),
																"choices"     => array(),			
																"default"     => "regular",
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Body Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_body_font_size",
																"default"     => "16", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

													),
									),		


							array(
										'id'       => 'secondary',
										'title'    => esc_html_x("Secondary Font",'Admin Panel','businesslounge'),
										'controls' => array( 

															array(
																"id"          => 'businesslounge_secondary_font',															
																"label"       => esc_html_x("Font",'Admin Panel','businesslounge'),
																"choices"     => $this->fonts,
																"input_attrs" => array("class"=>"rt_fonts", "data-variant-id"=> 'businesslounge_secondary_font_variant', "data-subset-id"=> 'businesslounge_secondary_font_subset'),
																"default"   => "google||Fira Sans",
																"transport" => "refresh", 
																"type"      => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => 'businesslounge_secondary_font_subset',															
																"label"       => esc_html_x("Subsets",'Admin Panel','businesslounge'),
																"choices"     => array(),			
																"default"     => array("latin"),
																"input_attrs" => array("multiple"=>"multiple"),
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => 'businesslounge_secondary_font_variant',															
																"label"       => esc_html_x("Font Weight",'Admin Panel','businesslounge'),
																"choices"     =>  array(),			
																"default"     => "italic",
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

													),
									),				 


									array(
										'id'       => 'headings',
										'title'    => esc_html_x("Headings", 'Admin Panel','businesslounge'), 
										'controls' => array( 
															array(
																"id"          => 'businesslounge_heading_font',															
																"label"       => esc_html_x("Font",'Admin Panel','businesslounge'),
																"choices"     =>  $this->fonts,
																"input_attrs" => array("class"=>"rt_fonts", "data-variant-id"=> 'businesslounge_heading_font_variant', "data-subset-id"=> 'businesslounge_heading_font_subset'),
																"default"   => "google||Fira Sans",
																"transport" => "refresh", 
																"type"      => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => 'businesslounge_heading_font_subset',															
																"label"       => esc_html_x("Subsets",'Admin Panel','businesslounge'),
																"choices"     => array(),			
																"default"     => array("latin"),
																"input_attrs" => array("multiple"=>"multiple"),
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => 'businesslounge_heading_font_variant',															
																"label"       => esc_html_x("Font Weight",'Admin Panel','businesslounge'),
																"choices"     => array(),			
																"default"     => "700",
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),


															array(
																"label"       => esc_html_x("H1 Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_h1_font_size",
																"default"     => "38", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("H2 Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_h2_font_size",
																"default"     => "32", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),
															array(
																"label"       => esc_html_x("H3 Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_h3_font_size",
																"default"     => "26", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),
															array(
																"label"       => esc_html_x("H4 Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_h4_font_size",
																"default"     => "22", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),
															array(
																"label"       => esc_html_x("H5 Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_h5_font_size",
																"default"     => "18", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),
															array(
																"label"       => esc_html_x("H6 Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_h6_font_size",
																"default"     => "16", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

													),
									),				 

									array(
										'id'       => 'menu',
										'title'    => esc_html_x("Main Menu (Desktop)", 'Admin Panel','businesslounge'), 
										'controls' => array( 



															array(
																"id"          => "businesslounge_main_menu_seperator_1",	
																"label"       => esc_html_x('Top Level Items','Admin Panel','businesslounge'),															
																"type"        => "rt_subsection_heading"
															),			

															array(
																"id"          => 'businesslounge_menu_font',															
																"label"       => esc_html_x("Font",'Admin Panel','businesslounge'),
																"choices"     =>  $this->fonts,
																"input_attrs" => array("class"=>"rt_fonts", "data-variant-id"=> 'businesslounge_menu_font_variant', "data-subset-id"=> 'businesslounge_menu_font_subset'),
																"default"   => "google||Fira Sans",
																"transport" => "refresh", 
																"type"      => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => 'businesslounge_menu_font_subset',															
																"label"       => esc_html_x("Subsets",'Admin Panel','businesslounge'),
																"choices"     => array(),			
																"default"     => array("latin"),
																"input_attrs" => array("multiple"=>"multiple"),
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => 'businesslounge_menu_font_variant',															
																"label"       => esc_html_x("Font Weight",'Admin Panel','businesslounge'),
																"choices"     => array(),			
																"default"     => "700",
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Top Level Item Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_menu_font_size",
																"default"     => "14", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),
 
 															array(
																"id"          => "businesslounge_main_menu_seperator_2",	
																"label"       => esc_html_x('Sub Level Items','Admin Panel','businesslounge'),															
																"type"        => "rt_subsection_heading"
															),			

															array(
																"id"          => 'businesslounge_sub_menu_font',															
																"label"       => esc_html_x("Font",'Admin Panel','businesslounge'),
																"choices"     =>  $this->fonts,
																"input_attrs" => array("class"=>"rt_fonts", "data-variant-id"=> 'businesslounge_sub_menu_font_variant', "data-subset-id"=> 'businesslounge_sub_menu_font_subset'),
																"default"   => "google||Fira Sans",
																"transport" => "refresh", 
																"type"      => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => 'businesslounge_sub_menu_font_subset',															
																"label"       => esc_html_x("Subsets",'Admin Panel','businesslounge'),
																"choices"     => array(),			
																"default"     => array("latin"),
																"input_attrs" => array("multiple"=>"multiple"),
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => 'businesslounge_sub_menu_font_variant',															
																"label"       => esc_html_x("Font Weight",'Admin Panel','businesslounge'),
																"choices"     => array(),			
																"default"     => "regular",
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Sub Level Item Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_menu_sub_font_size",
																"default"     => "14", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

													),
									),	


									array(
										'id'       => 'mobile_menu',
										'title'    => esc_html_x("Main Menu (Mobile)", 'Admin Panel','businesslounge'), 
										'controls' => array( 

															array(
																"label"       => esc_html_x("Mobile Menu - Top Level Item Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_mobile_menu_font_size",
																"default"     => "14", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Mobile Menu - Sub Level Items Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_mobile_menu_sub_font_size",
																"default"     => "14", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

													),
									),	

									array(
										'id'       => 'miscellaneous',
										'title'    => esc_html_x("Miscellaneous", 'Admin Panel','businesslounge'), 
										'controls' => array( 



															array(
																"label"       => esc_html_x("Top Bar Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_top_bar_font_size",
																"default"     => "12", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),			

															array(
																"id"          => "businesslounge_top_bar_font",
																"label"       => esc_html_x("Top Bar Font",'Admin Panel','businesslounge'),			
																"description" => "",
																"transport"   => "refresh",
																"choices"     => array(																					
																					"body" => esc_html_x("Use the body font family",'Admin Panel','businesslounge'), 
																					"heading" => esc_html_x("Use the heading font family",'Admin Panel','businesslounge'),
																					"secondary" => esc_html_x("Use the secondary font family",'Admin Panel','businesslounge'),
																					"menu" => esc_html_x("Use the menu font family",'Admin Panel','businesslounge'), 
																					"sub_menu" => esc_html_x("Use the sub menu font family",'Admin Panel','businesslounge'), 
																				),
																"type"    => "select",
																"default" => "menu",
																"rt_skin" => true
															),


     														array(
																"label"       => esc_html_x("Header Widgets Font Size",'Admin Panel','businesslounge'),													
																"id"          => "businesslounge_header_widgets_font_size",
																"default"     => "14", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),			


															array(
																"id"          => "businesslounge_header_widgets_font",
																"label"       => esc_html_x("Header Widgets Font",'Admin Panel','businesslounge'),			
																"description" => "",
																"transport"   => "refresh",
																"choices"     => array(																					
																					"body" => esc_html_x("Use the body font family",'Admin Panel','businesslounge'), 
																					"heading" => esc_html_x("Use the heading font family",'Admin Panel','businesslounge'),
																					"secondary" => esc_html_x("Use the secondary font family",'Admin Panel','businesslounge'),
																					"menu" => esc_html_x("Use the menu font family",'Admin Panel','businesslounge'), 
																					"sub_menu" => esc_html_x("Use the sub menu font family",'Admin Panel','businesslounge'), 
																				),
																"type"    => "select",
																"default" => "menu",
																"rt_skin" => true
															),


															array(
																"label"       => esc_html_x("Page Heading Font Size",'Admin Panel','businesslounge'),
																"id"          => "businesslounge_page_heading_font_size",
																"default"     => "", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Breadcrumb Menu Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_breadcrumb_font_size",
																"default"     => "12", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Blog List Heading Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_blog_title_font_size",
																'description' => esc_html_x("Only for H1 and H2 headings in blog lists.",'Admin Panel','businesslounge'),
																"default"     => "24", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Sidebar Widget Heading Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_sidebar_widget_heading_font_size",
																"default"     => "16", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Footer Widget Heading Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_footer_heading_font_size",
																"default"     => "16", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Side Panel Widget Heading Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_sidepanel_widget_heading_font_size",
																"default"     => "16", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Side Panel Menu Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_sidepanel_menu_font_size",
																"default"     => "16", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => esc_html_x("Side Panel Font Size",'Admin Panel','businesslounge'),																
																"id"          => "businesslounge_sidepanel_font_size",
																"default"     => "16", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

													),
									),		

							)
			);