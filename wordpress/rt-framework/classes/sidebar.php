<?php
#-----------------------------------------
#	RT-Theme sidebar.php
#	version: 1.0
#-----------------------------------------

#
#	Sidebar Class
#
if ( ! class_exists("RTFrameworkSidebar")){

	class RTFrameworkSidebar extends RTFramework{
	 	
		public $rt_sidebars               = array();
		private $rt_user_created_sidebars = array();
		private $rt_disabled_sidebars     = array();
		public $rt_sidebar_descriptions   = array();
		public $rt_active_sidebars        = array(); 

		#
		# Construct
		#	 
		function __construct() {


	//sidebar descriptions	
			$this->rt_sidebar_descriptions = array( 
				"businesslounge-sidebar-for-footer-column-1"     => esc_html_x("Widget Area : Sidebar for Footer (column 1). Go to the Theme Customizer / Styling Options / Footer and make sure this column is enabled with 'Footer Widgets Layout' option.", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-footer-column-2"     => esc_html_x("Widget Area : Sidebar for Footer (column 2). Go to the Theme Customizer / Styling Options / Footer and make sure this column is enabled with 'Footer Widgets Layout' option.", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-footer-column-3"     => esc_html_x("Widget Area : Sidebar for Footer (column 3). Go to the Theme Customizer / Styling Options / Footer and make sure this column is enabled with 'Footer Widgets Layout' option.", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-footer-column-4"     => esc_html_x("Widget Area : Sidebar for Footer (column 4). Go to the Theme Customizer / Styling Options / Footer and make sure this column is enabled with 'Footer Widgets Layout' option.", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-footer-column-5"     => esc_html_x("Widget Area : Sidebar for Footer (column 5). Go to the Theme Customizer / Styling Options / Footer and make sure this column is enabled with 'Footer Widgets Layout' option.", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-footer-column-6"     => esc_html_x("Widget Area : Sidebar for Footer (column 6). Go to the Theme Customizer / Styling Options / Footer and make sure this column is enabled with 'Footer Widgets Layout' option.", 'Admin Panel', 'businesslounge'),

				"businesslounge-sidebar-for-header-first-row-1"  => esc_html_x("Widget Area for the left side of the first header row.", 'Admin Panel', 'businesslounge'). " " .esc_html_x("This widget area will only visible when header style 1, 2 or 4.", 'Admin Panel', 'businesslounge'). " " .esc_html_x("This widget area supports only 'Text', 'Social Media Icons', 'Custom HTML' and 'Custom Menu' widgets and it will be hid in small screens. Do not use the title of the widget.", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-header-first-row-2"  => esc_html_x("Widget Area for the right side of the first header row.", 'Admin Panel', 'businesslounge'). " " .esc_html_x("This widget area supports only 'Text', 'Social Media Icons', 'Custom HTML' and 'Custom Menu' widgets and it will be hid in small screens. Do not use the title of the widget.", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-header-second-row-1" => esc_html_x("Widget Area for the right side of the second header row.", 'Admin Panel', 'businesslounge'). " " .esc_html_x("This widget area will only visible when header style 1 or 2.", 'Admin Panel', 'businesslounge'). " " .esc_html_x("This widget area supports only 'Text', 'Social Media Icons', 'Custom HTML' and 'Custom Menu' widgets and it will be hid in small screens. Do not use the title of the widget.", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-header-second-row-2" => esc_html_x("Widget Area for the right side of the second header row.", 'Admin Panel', 'businesslounge'). " " .esc_html_x("This widget area will only visible when header style 1 or 2.", 'Admin Panel', 'businesslounge'). " " .esc_html_x("This widget area supports only 'Text', 'Social Media Icons', 'Custom HTML' and 'Custom Menu' widgets and it will be hid in small screens. Do not use the title of the widget.", 'Admin Panel', 'businesslounge'),
								
				"businesslounge-common-sidebar"                  => esc_html_x("Widget Area : Common Sidebar Widget area. Widgets dropped in the Common Sidebar container will show in every page/post.", 'Admin Panel', 'businesslounge'),	
				"businesslounge-sidebar-for-pages"               => esc_html_x("Widget Area : Sidebar for Pages. Widgets dropped in this container, will show in every page when a sidebar available.", 'Admin Panel', 'businesslounge'),			
				"businesslounge-sidebar-for-topbar-left"         => esc_html_x("Widget Area for the left side of the top bar. This widget area supports only 'Text', 'Social Media Icons' and 'Custom Menu' widgets and it will be hid in small screens. Do not use the title of the widget. Make sure the top bar has been enabled via Customize > Styling Options > Top Bar.", 'Admin Panel', 'businesslounge'),			
				"businesslounge-sidebar-for-topbar-right"        => esc_html_x("Widget Area for the right side of the top bar. This widget area supports only 'Text', 'Social Media Icons' and 'Custom Menu' widgets and it will be hid in small screens. Do not use the title of the widget. Make sure the top bar has been enabled via Customize > Styling Options > Top Bar.", 'Admin Panel', 'businesslounge'),								
				"businesslounge-sidebar-for-side-panel"          => esc_html_x("Widget Area : Sidebar for Side Panel. Widgets dropped in this container, will show in the side panel when available.", 'Admin Panel', 'businesslounge'),	
				
				"businesslounge-sidebar-for-portfolio"           => esc_html_x('Widget Area : Sidebar for Portfolio. Widgets will be displayed in all portfolio categories and single portfolio item pages.' , 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-portfolios"          => esc_html_x("Widget Area : Sidebar for Single Portfolio Item. Widgets dropped in this Sidebar container will show in every single portfolio page when the page-layout is set to a sidebar layout.", 'Admin Panel', 'businesslounge'),			
				"businesslounge-sidebar-for-portfolio-categories"=> esc_html_x('Widget Area : Sidebar for Portfolio Categories.' , 'Admin Panel', 'businesslounge'),				

				"businesslounge-sidebar-for-blog"                => esc_html_x('Widget Area : Sidebar for Blog. Widgets will be displayed in all blog categories and single post pages.', 'Admin Panel', 'businesslounge'),		
				"businesslounge-sidebar-for-blog-categories"     => esc_html_x("Widget Area : Sidebar for Blog Categories. Widgets will be displayed in all blog categories.", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-single"              => esc_html_x("Widget Area : Sidebar for Single Post. Widgets will be displayed in all single post pages.", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-search"              => esc_html_x('Widget Area : Sidebar for Search Results', 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-archive"             => esc_html_x('Widget Area : Sidebar for Archives', 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-tags"                => esc_html_x('Widget Area : Sidebar for Tags', 'Admin Panel', 'businesslounge'),			
				"businesslounge-woo-commerce-contents"           => esc_html_x('Widget Area : Sidebar for WooCommerce. Widgets dropped in this Sidebar container will show in WooCommerce related pages when the page-layout is set to a sidebar layout.', 'Admin Panel', 'businesslounge'),

				"businesslounge-bbpress"                             => esc_html_x('Widget Area: Sidebar for bbPress.', 'Admin Panel', 'businesslounge'),

				"businesslounge-free-1"                          => esc_html_x('Free Widget Area', 'Admin Panel', 'businesslounge'). " 1",
				"businesslounge-free-2"                          => esc_html_x('Free Widget Area', 'Admin Panel', 'businesslounge'). " 2",
				"businesslounge-free-3"                          => esc_html_x('Free Widget Area', 'Admin Panel', 'businesslounge'). " 3",
			);

			//default sidebars	
			$this->rt_sidebars = array( 
				"businesslounge-sidebar-for-footer-column-1"     => esc_html_x("Footer (Column 1)", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-footer-column-2"     => esc_html_x("Footer (Column 2)", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-footer-column-3"     => esc_html_x("Footer (Column 3)", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-footer-column-4"     => esc_html_x("Footer (Column 4)", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-footer-column-5"     => esc_html_x("Footer (Column 5)", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-footer-column-6"     => esc_html_x("Footer (Column 6)", 'Admin Panel', 'businesslounge'),
				
				"businesslounge-sidebar-for-header-first-row-1"  => esc_html_x("Header First Row - Left Side", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-header-first-row-2"  => esc_html_x("Header First Row - Right Side", 'Admin Panel', 'businesslounge'),
				
				"businesslounge-sidebar-for-header-second-row-1" => esc_html_x("Header Second Row - Left Side", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-header-second-row-2" => esc_html_x("Header Second Row - Right Side", 'Admin Panel', 'businesslounge'),
				
				"businesslounge-common-sidebar"                  => esc_html_x("Common Sidebar", 'Admin Panel', 'businesslounge'),	
				"businesslounge-sidebar-for-pages"               => esc_html_x("Pages", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-topbar-left"         => esc_html_x("Top Bar (Left)", 'Admin Panel', 'businesslounge'),			
				"businesslounge-sidebar-for-topbar-right"        => esc_html_x("Top Bar (Right)", 'Admin Panel', 'businesslounge'),			
				"businesslounge-sidebar-for-side-panel"          => esc_html_x("Side Panel", 'Admin Panel', 'businesslounge'),			
				
				"businesslounge-sidebar-for-portfolio"           => esc_html_x("Portfolio", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-portfolios"          => esc_html_x("Single Portfolio Item", 'Admin Panel', 'businesslounge'),	
				"businesslounge-sidebar-for-portfolio-categories" => esc_html_x("Portfolio Categories", 'Admin Panel', 'businesslounge'),	
				
				"businesslounge-sidebar-for-blog"                => esc_html_x("Blog", 'Admin Panel', 'businesslounge'),			
				"businesslounge-sidebar-for-blog-categories"     => esc_html_x("Blog Categories", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-single"              => esc_html_x("Blog Single Post", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-search"              => esc_html_x("Search Results", 'Admin Panel', 'businesslounge'),
				"businesslounge-woo-commerce-contents"           => esc_html_x("WooCommerce", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-archive"             => esc_html_x("Archives", 'Admin Panel', 'businesslounge'),
				"businesslounge-sidebar-for-tags"                => esc_html_x("Tags", 'Admin Panel', 'businesslounge'),

				"businesslounge-bbpress"                             => esc_html_x('bbPress', 'Admin Panel', 'businesslounge'),

				"businesslounge-free-1"                          => esc_html_x('Free Widget Area', 'Admin Panel', 'businesslounge'). " 1",
				"businesslounge-free-2"                          => esc_html_x('Free Widget Area', 'Admin Panel', 'businesslounge'). " 2",
				"businesslounge-free-3"                          => esc_html_x('Free Widget Area', 'Admin Panel', 'businesslounge'). " 3",				
			);

	  		$this->rt_active_sidebars = array_merge_recursive( $this->rt_sidebars, $this->rt_user_created_sidebars );


	  		foreach ($this->rt_active_sidebars as $rtframework_sidebarID => $sidebarName ) { 
	  			if( ! $this->is_enabled_sidebar($rtframework_sidebarID) ){  
	  				unset($this->rt_active_sidebars[$rtframework_sidebarID]);
	  			}
	  		}
	 
	 		//register sidebars
			add_action('widgets_init',array(&$this,'register_sidebars'));

	 		//show widgetes
			add_action('widgets_init',array(&$this,'call_display_sidebars'));
	 	}


		#
		# Register Sidebars
		#
		function register_sidebars(){
			foreach ($this->rt_active_sidebars as $rtframework_sidebarID => $sidebarName) {  
				$this->register_sidebar($rtframework_sidebarID,$sidebarName); 
			} 
		}

		#
		# Register Sidebar
		#
		function register_sidebar($rtframework_sidebarID,$sidebarName){ 
			
				$description = ( isset( $this->rt_sidebar_descriptions[$rtframework_sidebarID] ) ) ? $this->rt_sidebar_descriptions[$rtframework_sidebarID] : esc_html_x('User created sidebar', 'Admin Panel','businesslounge'); 
			 
				if(
					stripos($rtframework_sidebarID, "sidebar-for-footer")
				){

					//get footer page layout
					register_sidebar(array(
						'id'            => $rtframework_sidebarID,
						'name'          => $sidebarName,
						'before_widget' => '<div id="%1$s" class="footer_widget widget %2$s">',
						'description'   => $description,
						'after_widget'  => '</div>',
						'before_title'  => '<h5>',
						'after_title'   => '</h5>',
					));							

				}elseif(//header widgets
					$rtframework_sidebarID=="businesslounge-sidebar-for-header-first-row-1" ||
					$rtframework_sidebarID=="businesslounge-sidebar-for-header-first-row-2" || 
					$rtframework_sidebarID=="businesslounge-sidebar-for-header-second-row-1" || 
					$rtframework_sidebarID=="businesslounge-sidebar-for-header-second-row-2"
				){
					register_sidebar(array(
						'id'            => $rtframework_sidebarID,
						'name'          => $sidebarName,
						'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
						'description'   => $description,
						'after_widget'  => '</div>',
						'before_title'  => '<h5>',
						'after_title'   => '</h5>',
					));	

				}elseif(//topbar widgets
					$rtframework_sidebarID=="businesslounge-sidebar-for-topbar-left" ||
					$rtframework_sidebarID=="businesslounge-sidebar-for-topbar-right"
				){
					register_sidebar(array(
						'id'            => $rtframework_sidebarID,
						'name'          => $sidebarName,
						'before_widget' => '<div id="%1$s" class="topbar-widget widget %2$s">',
						'description'   => $description,
						'after_widget'  => '</div>',
						'before_title'  => '<h5>',
						'after_title'   => '</h5>',
					));

				}elseif(//sidepanel widgets
					$rtframework_sidebarID=="businesslounge-sidebar-for-side-panel" 
				){
					register_sidebar(array(
						'id'            => $rtframework_sidebarID,
						'name'          => $sidebarName,
						'before_widget' => '<div id="%1$s" class="sidepanel-widget widget %2$s">',
						'description'   => $description,
						'after_widget'  => '</div>',
						'before_title'  => '<h5>',
						'after_title'   => '</h5>',
					));	
				
				}else{
					register_sidebar(array(
						'id'            => $rtframework_sidebarID,
						'name'          => $sidebarName,
						'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s">',
						'description'   => $description,
						'after_widget'  => '</div>',
						'before_title'  => '<h5>',
						'after_title'   => '</h5>',
					));					
				} 
		} 

		#
		# Display Sidebars
		#
	 	
	 	function call_display_sidebars(){
	 		add_action('rtframework_load_widgets',array(&$this,'display_sidebars'),20);
	 	}

		function display_sidebars(){
			global $post;

			$post_id = isset( $post ) && isset( $post->ID ) ? $post->ID : "" ;
			$post_type = isset( $post->post_type ) ? $post->post_type : "" ; 


			// Get user custom sidebar list
			$user_custom_sidebar_list = rtframework_get_setting("custom_sidebar_locations");
			rtframework_load_sidebar_list($user_custom_sidebar_list);

			// WooCommerce
			if ( class_exists( 'Woocommerce' ) ) {		
				if(empty( $user_custom_sidebar_list ) && is_woocommerce() || is_cart() || is_account_page() || is_checkout() ){ 
					dynamic_sidebar('businesslounge-woo-commerce-contents');
					$WooCommercePage = "TRUE";
				}
			}		 
	 
	 		// Call Search Sidebar
			if( is_search() && $this->is_enabled_sidebar('businesslounge-sidebar-for-search') ){  
				dynamic_sidebar('businesslounge-sidebar-for-search');  
				dynamic_sidebar('businesslounge-common-sidebar');
				return false;
			}   
			
			// Page Sidebar
			if( empty( $user_custom_sidebar_list ) && ! is_front_page() && is_page() && $this->is_enabled_sidebar('businesslounge-sidebar-for-pages') ){ dynamic_sidebar('businesslounge-sidebar-for-pages'); } 

			// Portfolio Sidebar - all portfolio contents 
			if( rtframework_is_portfolio_page() ) { dynamic_sidebar('businesslounge-sidebar-for-portfolio'); }
			
			// Portfolio Sidebar - single portfolios 
			if( empty( $user_custom_sidebar_list ) && is_single() && $post_type=='portfolio' && $this->is_enabled_sidebar('businesslounge-sidebar-for-portfolios') ){ dynamic_sidebar('businesslounge-sidebar-for-portfolios'); }

			// Portfolio Sidebar Listings
			if( get_query_var('taxonomy')=="portfolio_categories" && $this->is_enabled_sidebar('businesslounge-sidebar-for-portfolio-categories') ){ dynamic_sidebar('businesslounge-sidebar-for-portfolio-categories'); }

			// Blog All
			if( empty( $user_custom_sidebar_list ) && rtframework_is_blog_page() && !isset($WooCommercePage) && $this->is_enabled_sidebar('businesslounge-sidebar-for-blog') ){ dynamic_sidebar('businesslounge-sidebar-for-blog'); }

			// Blog Single
			if( empty( $user_custom_sidebar_list ) && is_single() && $post->post_type=='post' && $this->is_enabled_sidebar('businesslounge-sidebar-for-single') ){ dynamic_sidebar('businesslounge-sidebar-for-single'); }

			// Blog Categories
			if( is_category() && !isset($WooCommercePage) && $this->is_enabled_sidebar('businesslounge-sidebar-for-blog-categories') ){ dynamic_sidebar('businesslounge-sidebar-for-blog-categories'); }

			// Archives 
			if( is_archive() && get_query_var('taxonomy')=="" && !isset($WooCommercePage) && ! is_category() && $this->is_enabled_sidebar('businesslounge-sidebar-for-archive')){ dynamic_sidebar('businesslounge-sidebar-for-archive'); } 

			// Tags archives
			if( is_tag() && !isset($WooCommercePage) && $this->is_enabled_sidebar('businesslounge-sidebar-for-tags')){ dynamic_sidebar('businesslounge-sidebar-for-tags'); }

			// Common Sidebar - For all site
			if( empty( $user_custom_sidebar_list ) && $this->is_enabled_sidebar('businesslounge-common-sidebar') ){ dynamic_sidebar('businesslounge-common-sidebar'); }

			// bbpress
			if ( class_exists( 'bbPress' ) ) {
				if( is_bbpress() ){ 
					dynamic_sidebar('businesslounge-bbpress');
				}
			}			
		}

		#
		# count sidebar items
		#
		function count_sidebar_items($id){		
			$get_sidebar_items   = wp_get_sidebars_widgets();		
			$count_sidebar_items = count($get_sidebar_items[$id]);		
			return $count_sidebar_items;
		}


		#
		# checks if given sidebar is a default sidebar
		#	 
		private function is_default_sidebar( $rtframework_sidebarID ){  
			return array_key_exists( $rtframework_sidebarID, $this->rt_sidebars );
		}


		#
		# checks if the sidebar is enabled
		#	  
		private function is_enabled_sidebar( $rtframework_sidebarID ){  
			
			if ( array_key_exists( $rtframework_sidebarID, $this->rt_disabled_sidebars ) ){
				return false;
			}else{
				return true;
			}
		}
 
	}

}
?>