<?php
#-----------------------------------------
#	RT-Theme loading.php
#	version: 1.0
#-----------------------------------------

#
# 	Load the theme
#

class RTFramework{
 
	//Available Social Media Icons
	public $rtframework_social_media_icons=array(  
			"RSS"             => "rss", 
			"Email"           => "mail", 
			"Twitter"         => "twitter", 
			"Facebook"        => "facebook", 
			"Flickr"          => "flickr", 
			"Google +"        => "gplus", 
			"Pinterest"       => "pinterest", 
			"Tumblr"          => "tumblr", 
			"Linkedin"        => "linkedin", 
			"Dribbble"        => "dribbble", 
			"Skype"           => "skype", 
			"Behance"         => "behance", 
			"Github"          => "github", 
			"Vimeo"           => "vimeo", 
			"StumbleUpon"     => "stumbleupon", 
			"Lastfm"          => "lastfm", 
			"Spotify"         => "spotify", 
			"Instagram"       => "instagram", 
			"Dropbox"         => "dropbox", 
			"Evernote"        => "evernote", 
			"Flattr"          => "flattr", 
			"Paypal"          => "paypal", 
			"Picasa"          => "picasa", 
			"Vkontakte"       => "vkontakte", 
			"YouTube"         => "youtube-play", 
			"SoundCloud"      => "soundcloud",
			"Foursquare"      => "foursquare",
			"Delicious"       => "delicious",
			"Forrst"          => "forrst",
			"eBay"            => "ebay",
			"Android"         => "android", 
			"Xing"            => "xing",
			"Reddit"          => "reddit",
			"Digg"            => "digg",
			"Apple App Store" => "macstore",
			"MySpace"         => "myspace",
			"Stack Overflow"  => "stackoverflow",
			"Slide Share"     => "slideshare",
			"Weibo"           => "sina-weibo",
			"Odnoklassniki"   => "odnoklassniki",
			"Telegram"        => "telegram",
			"WhatsApp"        => "whatsapp"
	);
				
 
	#
	# Start
	#    
	function start($v){

		global $rtframework_social_media_icons;
		$rtframework_social_media_icons = apply_filters("rt_social_icon_list", $this->rtframework_social_media_icons ); 
 
		//Create Menus 
		add_action('registered_taxonomy', array(&$this,'global_constants'));

		// Load text domain
		load_theme_textdomain('businesslounge', get_template_directory().'/languages' );

		//Call Theme Constants
		$this->theme_constants($v);	  

		//Load Classes
		$this->load_classes($v);
		
		//Load Functions
		$this->load_functions($v);

		//Create Menus 
		add_action('init', array(&$this,'rt_create_menus'));
				
		//Theme Supports
		$this->theme_supports();


		//check woocommerce
		if ( class_exists( 'Woocommerce' ) ) {
			include(RT_THEMEFRAMEWORKDIR . "/functions/woo-integration.php");
		}

		//check bbpress
		if ( class_exists( 'bbPress' ) ) {
			include(RT_THEMEDIR . "/bbpress/bbpress-config.php");
		}

	}
 

	#
	#	Global Constants
	#
	function global_constants($v) {
		if( ! defined( 'RT_FRAMEWOK' ) ) define('RT_FRAMEWOK', TRUE);

	}   
	
	#
	#	Theme Constants
	#
	function theme_constants($v) {

		if( ! defined( 'RT_THEMENAME' ) ) define('RT_THEMENAME', $v['theme']);
		if( ! defined( 'RT_THEMESLUG' ) ) define('RT_THEMESLUG', $v['slug']); // a unique slugname for this theme
		if( ! defined( 'RT_COMMON_THEMESLUG' ) ) define('RT_COMMON_THEMESLUG', "rttheme"); // a commone slugnam for all rt-themes
		if( ! defined( 'RT_THEMEVERSION' ) ) define('RT_THEMEVERSION', $this->get_theme_version()); 
		if( ! defined( 'RT_THEMEDIR' ) ) define('RT_THEMEDIR', get_template_directory());
		if( ! defined( 'RT_THEMEURI' ) ) define('RT_THEMEURI', get_template_directory_uri());
		if( ! defined( 'RT_FRAMEWORKSLUG' ) ) define('RT_FRAMEWORKSLUG', 'rt-framework'); 
		if( ! defined( 'RT_THEMEFRAMEWORKDIR' ) ) define('RT_THEMEFRAMEWORKDIR', get_template_directory().'/rt-framework'); 
		if( ! defined( 'RT_THEMEADMINDIR' ) ) define('RT_THEMEADMINDIR', get_template_directory().'/rt-framework/admin');
		if( ! defined( 'RT_THEMEADMINURI' ) ) define('RT_THEMEADMINURI', get_template_directory_uri().'/rt-framework/admin');
		if( ! defined( 'RT_WPADMINURI' ) ) define('RT_WPADMINURI', get_admin_url());
		if( ! defined( 'RT_THEMESTYLE' ) ) define('RT_THEMESTYLE', get_option("businesslounge_style")); 
		if( ! defined( 'RT_EXTENSIONS_PLUGIN' ) ) define('RT_EXTENSIONS_PLUGIN', "BusinessLounge_Extensions"); 
		if ( ! defined( 'RT_THEME_PLUGINNAME' ) )  define('RT_THEME_PLUGINNAME', 'BusinessLounge | Extensions Plugin' );
		if ( ! defined( 'ELEMENTOR_PARTNER_ID' ) )  define('ELEMENTOR_PARTNER_ID', 2143 );		
		
		//unique theme name for default settings
		if( ! defined( 'RT_UTHEME_NAME' ) ) define('RT_UTHEME_NAME', "businesslounge");

		if( ! defined( 'RT_BLOGURL' ) ){
			if( function_exists('icl_get_home_url') ){
				define('RT_BLOGURL', icl_get_home_url());
			}else{
				define('RT_BLOGURL', esc_url(home_url('/')) );  
			}
		}		

	}    
	
	#
	#	Load Functions
	#
	
	function load_functions($v) {
		include(RT_THEMEFRAMEWORKDIR . "/functions/common_functions.php");		
		include(RT_THEMEFRAMEWORKDIR . "/functions/rt_comments.php");		
		include(RT_THEMEFRAMEWORKDIR . "/functions/theme_functions.php");
		include(RT_THEMEFRAMEWORKDIR . "/functions/theme_manager.php");
		include(RT_THEMEFRAMEWORKDIR . "/functions/rt_breadcrumb.php");
		include(RT_THEMEFRAMEWORKDIR . "/functions/wpml_functions.php");
		include(RT_THEMEFRAMEWORKDIR . "/functions/custom_styling.php");
		include(RT_THEMEFRAMEWORKDIR . "/functions/rt_resize.php");		
	}

	#
	#	Load Classes
	#
	
	function load_classes($v) {
		global $rtframework_sidebars_class, $wp_customize;

		//Backend only jobs
		if(is_admin()){		
			require_once (RT_THEMEFRAMEWORKDIR.'/classes/admin.php'); 
			$RTadmin = new RTFrameworkAdmin();
			$RTadmin->admin_init(); 
		}

		//Customize Panel
		if( is_admin() || $wp_customize ){			
			include(RT_THEMEFRAMEWORKDIR . "/classes/rt_customize_panel.php");
		}

		//Create Sidebars
		include(RT_THEMEFRAMEWORKDIR . "/classes/sidebar.php");  
		$rtframework_sidebars_class = new RTFrameworkSidebar(); 

		//is login or register page		
		$is_login = in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ));

		//Frontend only jobs
		if(!is_admin() && !$is_login){
			require_once (RT_THEMEFRAMEWORKDIR.'/classes/theme.php'); 
			$RTFrameworkSite = new RTFrameworkSite();
			$RTFrameworkSite -> theme_init();

			//Navigation Walker
			include(RT_THEMEFRAMEWORKDIR . "/classes/navigation_walker.php");		
		} 

		//Common Classes
		include(RT_THEMEFRAMEWORKDIR . "/classes/common_classes.php");   
		
	}    	 

	#
	#	Create WP Menus
	#

	function rt_create_menus() {
		
		register_nav_menu( 'businesslounge-main-navigation', esc_html_x( 'Main Navigation' , 'Admin Panel','businesslounge') ); 
		register_nav_menu( 'businesslounge-footer-navigation', esc_html_x( 'Footer Navigation' , 'Admin Panel','businesslounge' ));  
		register_nav_menu( 'businesslounge-side-navigation', esc_html_x( 'Side Panel Navigation' , 'Admin Panel','businesslounge' ));  
		register_nav_menu( 'businesslounge-mobile-navigation', esc_html_x( 'Mobile Navigation' , 'Admin Panel','businesslounge' ));  

		wp_create_nav_menu( esc_html_x( 'Main Navigation' , 'Admin Panel','businesslounge'), array( 'slug' => 'businesslounge-main-navigation' ) );
		wp_create_nav_menu( esc_html_x( 'Side Panel Navigation', 'Admin Panel','businesslounge'), array( 'slug' => 'businesslounge-side-navigation' ) );
		wp_create_nav_menu( esc_html_x( 'Footer Navigation', 'Admin Panel','businesslounge'), array( 'slug' => 'businesslounge-footer-navigation') ); 
	
	}

	#
	#	Theme Supports
	#
	 
	function theme_supports(){
 
		//Automatic Feed Links
		add_theme_support( 'automatic-feed-links' );
		
		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );		
		
		//post thumbnails
		add_theme_support( 'post-thumbnails' );  

		//woocommerce support
		add_theme_support( 'woocommerce' ); 

		//gutenberg
		add_theme_support(
			'gutenberg',
			array( 'wide-images' => true )
		);			

		add_theme_support('editor-styles');

		//classic widgets
		add_action( 'after_setup_theme', array(&$this,'classic_widget_editor'));
	}	

	#
	# Classic Widget Editor
	#
	function classic_widget_editor() {
		remove_theme_support( 'widgets-block-editor' );
	}


	#
	#	Get Pages as array
	#

	public static function rt_get_pages(){
		  
		// Pages		
		$pages = query_posts('posts_per_page=-1&post_type=page&orderby=title&order=ASC');
		$rt_getpages = array();
		
		if(is_array($pages)){
			foreach ($pages as $page_list ) {
				$rt_getpages[$page_list->ID] = $page_list ->post_title;
			}
		}
		
		return $rt_getpages;
		
	}


	#
	#	Get Blog Categories - only post categories
	#

	public static function rt_get_categories(){

		if( ! taxonomy_exists("category") ){
			return array();
		}

		// Categories
		$args = array(
			'type'                     => 'post',
			'child_of'                 => 0, 
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,  
			'taxonomy'                 => 'category',
			'pad_counts'               => false
			);
		
		
		$categories = get_categories($args);
		$rt_getcat = array();
		
		if(is_array($categories)){
			foreach ($categories as $category_list ) {
				$rt_getcat[$category_list->cat_ID] = $category_list->cat_name;
			}
		}
	
		return $rt_getcat;
	}
 

	/**
	 * Get Theme Version 
	 *
	 * Returns the theme version of orginal theme only not childs
	 * 
	 * @return void
	 */
	public function get_theme_version(){ 

		$theme_data = wp_get_theme(); 
		$main_theme_data = $theme_data->parent(); 

		if( ! empty( $main_theme_data ) ){		
			return $main_theme_data->get("Version");
		}else{		
			return $theme_data->get("Version");
		}
	}	
}
?>