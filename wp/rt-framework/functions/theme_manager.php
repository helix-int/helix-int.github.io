<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * 
 * RT-Theme Tools
 *
 */

class RTFrameworkManager
{

	/**
	 * Capability
	 */
	public static $capability = "edit_theme_options";

    /**
     * Plugins TGMPA format
     */
    public $plugins_tgmpa_format = array();

    /**
     * Plugins
     */    
    public $plugins = array();

    /**
     * TGMPA
     */
    public $tgmpa = false;

    /**
     * TGMPA config
     */
    public $tgmpa_config = array();

    /**
     * Theme data
     */
    public $theme_data = "";     

    /**
     * Parent Slug
     */
    public $parent_slug = "";

    /**
     * License
     */
    public $license = false;

    /**
     * Nags
     */
    public $nags = array();

    /**
     * API
     */
    public $api = 'https://api.rtthemes.com/v1';


    /**
     * API
     */
    public $item = '20587127';

    

	/**
	 * Construct
	 */
	public function __construct()
	{

		if( ! is_admin() ){
			return;
		}

        $this->license();

        // Plugins
        $this->plugins_tgmpa_format = array( 
            array(
                'name'                  => esc_html_x('BusinessLounge | Extensions Plugin','Admin Panel','businesslounge'), // The plugin name
                'slug'                  => 'businesslounge-extensions', // The plugin slug (typically the folder name)
                'source'                => RT_THEMEFRAMEWORKDIR . '/plugins/packages/businesslounge-extensions.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '1.9.9', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
                'confirm'            	=> array('preselect' => true, 'desc' => esc_html_x('The extensions plugin that exclusively coded for the theme. It is required to be installed and activated to benefit most of the advertised features of the theme.','Admin Panel','businesslounge'), 'class' => "BusinessLounge_Extensions", 'index' => 'businesslounge-extensions.php' )
            ), 
            
            array(
                'name'                  => esc_html_x('Slider Revolution','Admin Panel','businesslounge'), // The plugin name
                'slug'                  => 'revslider', // The plugin slug (typically the folder name)
                'source'                => RT_THEMEFRAMEWORKDIR . '/plugins/packages/revslider.zip', // The plugin source
                'required'              => false, // If false, the plugin is only 'recommended' instead of required
                'version'               => '6.5.19', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
                'confirm'            	=> array('preselect' => true, 'desc' => esc_html_x('Advanced slider plugin. It has been used to create some of the sliders that are seen on the demo site. ','Admin Panel','businesslounge'),'class' => 'RevSliderFunctions', 'index' => 'revslider.php' )
            ), 		

            array(
                'name'      => esc_html_x('Elementor','Admin Panel','businesslounge'),
                'slug'      => 'elementor',
                'required'  => false,
                'confirm'   => array('preselect' => true, 'desc' => esc_html_x('Page builder plugin that used to create complex page layouts such as the demo home page.','Admin Panel','businesslounge'),'definition' => 'ELEMENTOR_VERSION', 'index' => 'elementor.php' )
            ),

            array(
                'name'      => esc_html_x('Contact Form 7','Admin Panel','businesslounge'),
                'slug'      => 'contact-form-7',
                'required'  => false,
                'confirm'   => array('preselect' => true, 'desc' => esc_html_x('Popular contact form plugin. It has been used to create some of the contact forms that are seen on the demo site. ','Admin Panel','businesslounge'),'class' => 'WPCF7', 'index' => 'wp-contact-form-7.php' )
            ),

            array(
                'name'      => esc_html_x('WooCommerce','Admin Panel','businesslounge'),
                'slug'      => 'woocommerce',
                'required'  => false,
                'confirm'   => array('preselect' => false, 'desc' => esc_html_x('WooCommerce is the world’s most popular open-source eCommerce solution. If you are planning to sell online, you need to install and activate this plugin.','Admin Panel','businesslounge'),'class' => 'WooCommerce', 'index' => 'woocommerce.php' )
            ),

            array(
                'name'                  => esc_html_x('WPBakery Page Builder','Admin Panel','businesslounge'), // The plugin name
                'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
                'source'                => RT_THEMEFRAMEWORKDIR . '/plugins/packages/js_composer.zip', // The plugin source
                'required'              => false, // If false, the plugin is only 'recommended' instead of required
                'version'               => '6.8.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL,
                'confirm'   => array('preselect' => false, 'desc' => esc_html_x('Alternative page builder plugin.','Admin Panel','businesslounge'),'definition' => 'WPB_VC_VERSION', 'index' => 'js_composer.php' )
            )
            
        );

        // Plugins array
        foreach( $this->plugins_tgmpa_format as $plugin ){
            $this->plugins[$plugin['slug']] = $plugin;
        }

        // tgmpa
        include(RT_THEMEFRAMEWORKDIR . "/plugins/class-tgm-plugin-activation.php");	 
        add_action( 'tgmpa_register', array(&$this, 'load_tgmpa'));   
        
        // plugin status
        add_action( 'admin_init', array(&$this, 'plugin_status') ); 

        // theme data
        $this->theme_data = rtframework_get_theme();  

        //parent slug
        if( class_exists('BusinessLounge_Extensions') ){
            $this->parent_slug = 'admin.php';
        }else{
            $this->parent_slug = 'themes.php';
        }

        // after_switch_theme
        add_action( 'after_switch_theme', array(&$this, 'switch_theme'));  

 
        add_action( 'admin_notices', array(&$this, 'register_notice') );
        add_action( 'admin_notices', array(&$this, 'update_notice') );
        add_action( 'admin_notices', array(&$this, 'plugin_activate') );
        add_action( 'admin_notices', array(&$this, 'plugin_update') );
        add_action( 'admin_init', array(&$this, 'redirect') ); 
        add_action( 'admin_init', array(&$this, 'check_updates') ); 

        add_action( 'admin_notices', array(&$this, 'print_wp_nags') );
       

        add_filter( 'pre_set_site_transient_update_themes', array(&$this, 'register_updates' ) );
        add_action( 'upgrader_process_complete', array(&$this, 'theme_updated' ), 10, 2 );  
        add_action( 'wp_ajax_rtframework_license_manager', array(&$this,'manager') );
        add_action( 'wp_ajax_nopriv_rtframework_license_manager', array(&$this,'manager') );
        add_action( 'wp_ajax_rtframework_plugin_manager', array(&$this,'plugin_manager') );
        add_action( 'wp_ajax_nopriv_rtframework_plugin_manager', array(&$this,'plugin_manager') );


       
        add_action( 'rt_framework_admin_notices', array(&$this, 'license_card') );
        add_action( 'rt_framework_admin_notices', array(&$this, 'print_admin_nags') );

        add_action( 'admin_menu', array(&$this, 'add_theme_page'), 10);  


        // remove wpbakery welcome page
        remove_action( 'admin_init', 'vc_page_welcome_redirect' );
	}

    /**
     * TGMPA
     */
    public function load_tgmpa(){
 
        
        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $this->tgmpa_config = array(
            'id'           => 'tgmpa',              // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => false,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
            'strings'           => array(
                'page_title'                                => esc_html_x( 'Install Required Plugins', 'Admin Panel','businesslounge' ),
                'menu_title'                                => esc_html_x( 'Install Plugins', 'Admin Panel','businesslounge' ),
                'installing'                                => esc_html_x( 'Installing Plugin: %s', 'Admin Panel','businesslounge' ), // %1$s = plugin name
                'oops'                                      => esc_html_x( 'Something went wrong with the plugin API.', 'Admin Panel','businesslounge' ),
                'notice_can_install_required'               => _nx_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'Admin Panel','businesslounge' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'            => _nx_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'Admin Panel','businesslounge' ), // %1$s = plugin name(s)
                'notice_cannot_install'                     => _nx_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'Admin Panel','businesslounge' ), // %1$s = plugin name(s)
                'notice_can_activate_required'              => _nx_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'Admin Panel','businesslounge' ), // %1$s = plugin name(s)
                'notice_can_activate_recommended'           => _nx_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'Admin Panel','businesslounge' ), // %1$s = plugin name(s)
                'notice_cannot_activate'                    => _nx_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'Admin Panel','businesslounge' ), // %1$s = plugin name(s)
                'notice_ask_to_update'                      => _nx_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'Admin Panel','businesslounge' ), // %1$s = plugin name(s)
                'notice_cannot_update'                      => _nx_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'Admin Panel','businesslounge' ), // %1$s = plugin name(s)
                'install_link'                              => _nx_noop( 'Begin installing plugin', 'Begin installing plugins', 'Admin Panel','businesslounge' ),
                'activate_link'                             => _nx_noop( 'Activate installed plugin', 'Activate installed plugins', 'Admin Panel','businesslounge' ),
                'return'                                    => esc_html_x( 'Return to Required Plugins Installer', 'Admin Panel','businesslounge' ),
                'plugin_activated'                          => esc_html_x( 'Plugin activated successfully.', 'Admin Panel','businesslounge' ),
                'complete'                                  => esc_html_x( 'All plugins installed and activated successfully. %s', 'Admin Panel','businesslounge' ) // %1$s = dashboard link
            )
        ); 

        if( $this->license ){
            tgmpa( $this->plugins_tgmpa_format, $this->tgmpa_config );     
            $this->tgmpa = isset( $GLOBALS['tgmpa'] ) ? $GLOBALS['tgmpa'] : TGM_Plugin_Activation::get_instance();
        }
    }

	/**
	 * Theme page
	 */
    public function add_theme_page() {
 
		if ( ! class_exists("BusinessLounge_Extensions") || ! defined("RT_FRAMEWORK_COMPATIBLE")  ){
			add_theme_page( RT_THEMENAME, RT_THEMENAME, 'manage_options', 'rt_framework_welcome', array(&$this,'welcome_page'),1);
			add_theme_page( sprintf(esc_html_x('%1$s Plugins','Admin Panel','businesslounge'),RT_THEMENAME), sprintf(esc_html_x('%1$s Plugins','Admin Panel','businesslounge'),RT_THEMENAME), 'manage_options', "rt_framework_plugins", array(&$this,'plugins_page'),2);
        }
	}

    /**
     * Is plugin active?
     */
    public function is_plugin__active( $slug = "" ){
        if( isset( $this->plugins[ $slug ] ) ){

            if( isset( $this->plugins[ $slug ]["confirm"]["class"] ) ){
                if( class_exists( $this->plugins[ $slug ]["confirm"]["class"] ) ){
                    return true;
                }
            }

            if( isset( $this->plugins[ $slug ]["confirm"]["definition"] ) ){
                if( defined( $this->plugins[ $slug ]["confirm"]["definition"] ) ){
                    return true;
                }
            }					

            return false;

        }
    }

    /**
     * License
     */
    public function license(){  
        $this->license = get_option("rt_framework_license"); 
    }

    /**
     * Licanse card
     */

   /**
     * License
     */
    public function license_card(){

        if( $this->license ){ 
            return;
        }

        unset($this->nags['activate']);    
        // unset($this->nags['update_plugins']);       

        ?> 
   		<div class="rt-framework-admin-notice">
			<div>
                <div class="rt-framework-license-activation">

                    <h4><?php echo esc_html_x('Please activate your theme to install / update premium plugins and easily update the theme.','Admin Panel','businesslounge') ;?></h4>                                    

                    <div class="rt-framework-license-row">
                        <span><?php echo esc_html_x('Item Purchase Code:','Admin Panel','businesslounge') ;?></span>
                        
                        <div>
                            <input type="text" id="rt-framework-license-key" />                            
                        </div>

                        <div class="rt-framework-installer-bottom">
                            <button id="rt-framework-license-check" class="button button-primary" data-wpnonce-manager="<?php echo wp_create_nonce( 'rt-framework-license-manager' );?>"><?php echo esc_html_x('Activate','Admin Panel','businesslounge') ;?></button>
                            <img src="images/spinner.gif" class="rt-framework-installer-loading" />
                            <span class="rt-framework-installer-status plugin"></span>
                        </div>
                    </div>

                    <hr style="margin:1em 0;"/>

                    <p class="rt-framework-admin-list"><i class="dashicons dashicons-admin-network"></i> <?php printf( esc_html_x('%1$sWhere can i find my purchase code?%2$s','Admin Panel','businesslounge'), '<a href="https://docs.rtthemes.com/document/license-activation/" target="_blank">','</a>' ) ;?></p>
                    <p class="rt-framework-admin-list"><i class="dashicons dashicons-sos"></i> <?php printf( esc_html_x('%1$sContact support team%2$s','Admin Panel','businesslounge'), '<a href="https://rtthemes.com/contact-us/" target="_blank">','</a>' ) ;?></p>
                    <p class="rt-framework-admin-list"><i class="dashicons dashicons-cart"></i> <?php printf( esc_html_x('%1$sPurchase a new license%2$s','Admin Panel','businesslounge'), '<a href="https://1.envato.market/c/1306339/275988/4415?subId1=panel&u=themeforest.net/item/'.RT_THEMESLUG.'/'.$this->item.'" target="_blank">','</a>' ) ;?></p>

                </div>
            </div>
        </div>
        <?php
        
    }


    /**
     * Plugin status
     */
    public function plugin_status(){
        
        if( $this->tgmpa ){
            $installed_plugins = $this->tgmpa->get_plugins();
        }else{
            if ( function_exists( 'get_plugins' ) ) { 
                $installed_plugins = get_plugins();
            }
        }
     
        foreach( $this->plugins as $slug => $plugin  ){

            // is active?
            $this->plugins[ $slug ]["is_active"] = $this->is_plugin__active( $slug );
            
            if( $this->tgmpa ){

                if( $this->tgmpa->is_plugin_installed( $slug ) ){
                    // installed
                    $this->plugins[ $slug ]["is_installed"] =  true;                

                    // installed version 
                    $this->plugins[ $slug ]["installed_version"] = isset( $installed_plugins[ $slug.'/'.$plugin["confirm"]["index"] ] ) ? $installed_plugins[ $slug.'/'.$plugin["confirm"]["index"] ]['Version'] : "";  
                
                    // has update?
                    $this->plugins[ $slug ]["has_update"] = $this->tgmpa->does_plugin_have_update( $slug );
                }

            }else{
                 
                if( isset( $installed_plugins ) && is_array( $installed_plugins ) && isset( $installed_plugins[ $plugin["slug"].'/'.$plugin["confirm"]["index"] ] ) ){
                    
                    // installed
                    $this->plugins[ $slug ]["is_installed"] =  true; 

                    // installed version 
                    $installed_version = $installed_plugins[ $slug.'/'.$plugin["confirm"]["index"] ]['Version'];
                    $this->plugins[ $slug ]["installed_version"] = $installed_version;  

                    // has update?
                    if( isset( $plugin["version"] ) && version_compare( $installed_version, $plugin["version"] , "<" )  ){ 
                        $this->plugins[ $slug ]["has_update"] = true;        
                    }

                }
            }	
        }

    }
    
	/**
	 * 
	 * Admin Header
	 * 
	 * @return output
	 * 
	 */	
	public function admin_header( $title = "", $about = "" ){	
		
		$is_plugin_active = false;
		$is_theme_active = $this->license;
		 
		if( class_exists('BusinessLounge_Extensions') ){	
			$is_plugin_active = true;
		}
		  
		$key = get_option("rt_framework_license"); 
		$current_page = $_GET["page"];

		?>

		<div class="wrap about-wrap">
			<div class="rt-admin-layout-wrapper">
				
				<div class="rt-admin-info-bar">
                    <div class="rt-theme-info">
                        <span><?php echo esc_html( RT_THEMENAME );?></span>
                    </div>
					<h1><?php echo esc_html($title);?></h1>

					<div class="about-text">
						<?php echo wp_kses_post($about); ?>
					</div>

                    <?php
                    if( $this->license ){
                        echo '<p class="rt-framework-verified">';
                        echo esc_html_x('Activated','Admin Panel','businesslounge');
                        echo '</p>';
                    } 
                    ?>

					<div class="wp-badge">
						<span>v<?php echo esc_html(RT_THEMEVERSION) ?></span>
					</div>
				</div>

				<?php 
					$rt_framework_admin_tabs = [
						'rt_framework_welcome' => esc_html_x('About','Admin Panel','businesslounge'), 
						'rt_framework_plugins' => esc_html_x('Manage Plugins','Admin Panel','businesslounge'),
						'rt_demo_import' => esc_html_x('Demo Import','Admin Panel','businesslounge'),
						'rt_utilities' => esc_html_x('Utilities','Admin Panel','businesslounge'),
						'rt_framework_customizations' => esc_html_x('Customizations','Admin Panel','businesslounge'),
						'rt_custom_fonts' => esc_html_x('Custom Fonts','Admin Panel','businesslounge')
					];
				?>
				<div class="nav-tab-wrapper">
					<?php foreach( $rt_framework_admin_tabs as $tab => $tab_name ): ?>
						<?php
                            if( $tab == "rt_framework_welcome" || $tab == "rt_framework_plugins" ){
                                if( $is_plugin_active && defined("RT_FRAMEWORK_COMPATIBLE") ){
                                    $url = admin_url('admin.php?page='.$tab);
                                }else{
                                    $url = admin_url('themes.php?page='.$tab);
                                } 	
                            }else{
                                $url = admin_url('admin.php?page='.$tab);
                            }
						?>
						<?php if( $is_plugin_active || "rt_framework_welcome" == $tab || "rt_framework_plugins" == $tab ): ?> 
                            <a class="nav-tab<?php echo isset($_GET['page']) && $_GET['page'] == $tab ? " nav-tab-active" : ""?>" href="<?php echo esc_url($url)?>"><?php echo esc_html($tab_name)?></a>													
						<?php else:?>
                            <a class="nav-tab<?php echo isset($_GET['page']) && $_GET['page'] == $tab ? " nav-tab-active" : " rt-nav-tab-passive"?>" href="#"><?php echo esc_html($tab_name)?></a>													
						<?php endif; ?>	

					<?php endforeach; ?>	
				</div>									
		<?php
		do_action("rt_framework_admin_notices");
	}    

	/**
	 * 
	 * Admin Footer
	 * 
	 * @return output
	 * 
	 */	
	public function admin_footer( $title = "", $about = "" ){
		?>
        </div></div>									
		<?php 
	}      

	/**
	 * 
	 * Welcome
	 * 
	 * @return output
	 * 
	 */	
	public function welcome_page()
	{	
		$title = sprintf( esc_html_x('Welcome to %s','Admin Panel','businesslounge'), RT_THEMENAME );		

		// about the page
		$about = sprintf( esc_html_x('Congratulations you have successfuly installed %s.','Admin Panel','businesslounge'), '<strong>'.RT_THEMENAME.'</strong>');
        $about .= " ". sprintf( esc_html_x('You can now customize your theme by using the powerful options inside the %2$sCustomize Panel%3$s.','Admin Panel','businesslounge'), RT_THEMENAME,  '<a href="customize.php">', '</a>' ) ;

		// admin header
		$this->admin_header( $title, $about );
		?>			
				<div class="three-col">

					<div class="col">
						<h3><?php echo esc_html_x( 'Documentation','Admin Panel','businesslounge' ); ?></h3>
						<p>
							<?php printf( esc_html_x('You can the find online documentation of the theme at %s','Admin Panel','businesslounge'), '<a href="http://docs.rtthemes.com" target="_blank">http://docs.rtthemes.com</a>' ) ;?>
						</p>
					</div>

					<div class="col">
						<h3><?php echo esc_html_x( 'Support','Admin Panel','businesslounge' ); ?></h3>
						<p>
							<?php printf( esc_html_x('If you have any questions regarding this theme, please let us know by using our support forum at %s','Admin Panel','businesslounge'), '<a href="http://support.rtthemes.com" target="_blank">http://support.rtthemes.com</a>' ) ;?>
						</p>
					</div>

					<div class="col">
						<h3><?php echo esc_html_x( 'Changelog','Admin Panel','businesslounge' ); ?></h3>
						<p>
							<?php printf( esc_html_x('Please check the bottom of the %1$stheme sale page%2$s on themeforest to find the changelogs.','Admin Panel','businesslounge'), '<a href="https://1.envato.market/c/1306339/275988/4415?subId1=panel&u=themeforest.net/item/'.RT_THEMESLUG.'/'.$this->item.'" target="_blank">','</a>' ) ;?>
						</p>
					</div>
				</div>
				 
		<?php
		$this->admin_footer();
	}

	/**
	 * 
	 * Plugins
	 * 
	 * @return output
	 * 
	 */	
	public function plugins_page()
	{	
		$title = esc_html_x('Manage Plugins','Admin Panel','businesslounge');		

		// about the page
		$about = sprintf( esc_html_x('Install, update or activate bundled plugins that comes with %s.','Admin Panel','businesslounge'), RT_THEMENAME);

		// admin header
		$this->admin_header( $title, $about );
        
        if( $this->license ){
		?>

			<p><?php echo esc_html_x('Select plugins to perform tasks described in the plugin status.','Admin Panel','businesslounge'); ?></p>
			<?php
				$this->plugins_card();
			?>

		<?php
        }
		$this->admin_footer();
	}    


	/**
	 * 
	 * Plugins Card
	 * 
	 * @return output
	 * 
	 */	
	public function plugins_card()
	{	
		$bundled_plugins = $this->plugins; 

        $install_strings = [
            'install'          => esc_html_x('The plugin will be installed.','Admin Panel','businesslounge'),
            'activate'         => esc_html_x('The plugin will be activated.','Admin Panel','businesslounge'),
            'install-activate' => esc_html_x('The plugin will be installed and activated.','Admin Panel','businesslounge'),
            'update-activate'  => esc_html_x('The plugin will be updated and activated.','Admin Panel','businesslounge'),
            'update'           => esc_html_x('The plugin will be updated.','Admin Panel','businesslounge'),
            'noaction'         => esc_html_x('The plugin is up to date.','Admin Panel','businesslounge'),
        ];

        $tasks = false;

        echo '<div class="rt-framework-installer-plugin-card">';

        foreach( $this->plugins as $slug => $plugin ){

            $action = false; 
            $is_installed = false;
            $has_update = false; 
            $is_active = false;
            $installed_version = false;            
            $desc = "";


            if( isset( $plugin["is_installed"] ) && $plugin["is_installed"] ){
                $is_installed = true; 
                $installed_version = $plugin["installed_version"];

                if( isset( $plugin["has_update"] ) && $plugin["has_update"] ){
                    $has_update = $plugin["has_update"];  
                    $action = 'update';
                }

            }else{
                $action = 'install';
            }

            // active
            if( isset( $plugin["is_active"] ) && ! $plugin["is_active"] ){
						
                if( $action == "install" ){
                    $action = 'install-activate';
                }elseif( $action == "update" && ! $plugin["confirm"]["preselect"] ){
                    $action = 'update';                      
                }elseif( $action == "update" && $plugin["confirm"]["preselect"] ){
                    $action = 'update-activate';                     
                }else{
                    $action = 'activate'; 
                }
                
            }
            
            $action = ! $action ? "noaction" : $action; 

            printf('
                <ul class="rt-framework-installer-plugin-list rt-framework-theme-manager-card %5$s" data-plugin-slug="%1$s" data-plugin-action="%4$s">

                    <li class="rt-framework-installer-checkbox"></li>

                    <li class="rt-framework-installer-plugin-name">
                        <strong>%2$s:</strong> 
                        
                        <p class="rt-framework-installer-plugin-desc">%8$s</p>

                        <div class="rt-framework-installer-plugin-info">
                            <strong>%9$s</strong> %3$s %6$s %7$s
                        </div>
                    </li>
             
                </ul>
            ',
                $plugin["slug"],
                $plugin["name"],
                $install_strings[$action],
                $action,
                "noaction" == $action ? "done" : ( $plugin["confirm"]["preselect"] ? "checked" : "" ),
                $installed_version ? sprintf(esc_html_x('%2$sInstalled version:%3$s %1$s','Admin Panel','businesslounge'), $installed_version, '<strong>', '</strong>' ) : "",
                $has_update ? sprintf(esc_html_x('%2$sNew version:%3$s %1$s','Admin Panel','businesslounge'), $has_update, '<strong>', '</strong>' ) : "",
                $plugin["confirm"]["desc"],
                esc_html_x('Plugin status:','Admin Panel','businesslounge')
            );

            if( "noaction" !== $action ){
                $tasks = true;
            }
        }

        if( $tasks ){
            printf(
                '<div class="rt-framework-installer-bottom">
                    <button class="button button-primary" id="rt-framework-install-plugins-button" 
                    data-wpnonce-activate="%2$s" 
                    data-wpnonce-udpate="%3$s" 
                    data-wpnonce-plugin="%4$s" 
                    data-wpnonce-manager="%5$s"
                    data-plugins="%6$s"
                    data-plugins-page="%7$s"
                    data-plugins-url="%8$s"
                    >%1$s</button>

                    <img src="images/spinner.gif" class="rt-framework-installer-loading" />
                    <span class="rt-framework-installer-status plugin"></span>
                </div>	
                ',
                esc_html_x('Apply','Admin Panel','businesslounge'),
                wp_create_nonce( 'tgmpa-activate' ),
                wp_create_nonce( 'tgmpa-update' ),
                wp_create_nonce( 'bulk-plugins' ),
                wp_create_nonce( 'rt-framework-plugin-manager' ),
                esc_attr( json_encode( $this->plugins ) ),
                $this->tgmpa->menu,
                $this->tgmpa->get_tgmpa_url() 
            );	
        }

        echo '</div>';        

	}    

	/**
	 * 
	 * Redirect
	 * 
	 */	
	public function redirect( $page = "" )
	{	
        if( get_transient('rt_framework_redirect') ){
            
            wp_safe_redirect( get_transient('rt_framework_redirect') );
            delete_transient( 'rt_framework_redirect' ); 
             
            exit;

        }else{
            if( ! empty( $page ) ){
                set_transient( 'rt_framework_redirect', $page ); 
            }
        }
	}        

	/**
	 * 
	 * Switch theme
	 * 
	 */	
	public function switch_theme( $page = "" )
	{	
        $this->redirect( admin_url($this->parent_slug . '?page=rt_framework_welcome') );
	}            


    /**
     * 
     * Print WP Nags
     * 
     */
    public function print_wp_nags(){

        foreach ( $this->nags as $nag ) {
        ?>
            <div class="notice notice-<?php echo esc_html($nag["type"]);?> is-dismissible">
                <?php echo wp_kses_post($nag["output"]);?>                
			</div>
        <?php
        }
    }

    /**
     * 
     * Print Admin Nags
     * 
     */
    public function print_admin_nags(){

        if( isset( $_GET["page"] ) ){
            if( $_GET["page"] == "rt_framework_plugins" ){
                unset($this->nags['update_plugins']); 
            }
            if( $_GET["page"] == "rt_framework_welcome" ){
                unset($this->nags['activate']); 
            }
        }


        foreach ( $this->nags as $nag ) {
        ?>
            <div class="rt-framework-admin-notice rt-framework-<?php echo esc_html($nag["type"]);?>">
                <div>
                    <?php echo wp_kses_post($nag["output"]);?>                
                </div>
			</div>
        <?php
        }
    }    

    /**
     * 
     * Register
     * 
     */
    public function register_notice(){

		if( $this->license ){
			return;
		}
        
        ob_start();
        
        ?>
            <p>
                <strong>
                    <?php echo esc_html_x('Please activate your theme to install / update premium plugins and easily update the theme.','Admin Panel','businesslounge'); ?>
                </strong>
            </p>

            <p>
                <strong>
                    <a href="<?php echo class_exists('BusinessLounge_Extensions') ? admin_url( 'themes.php?page=rt_framework_welcome' ) : admin_url( 'admin.php?page=rt_framework_welcome' ) ;?>">
                        <?php echo esc_html_x('Activate','Admin Panel','businesslounge') ;?>
                    </a>
                </strong>
            </p>
        <?php
        $this->nags['activate'] = ['output' => ob_get_clean(), 'type' => 'warning'] ;
    }    

    /**
     * 
     * Update
     * 
     */
    public function update_notice(){

		if( ! get_transient( 'rt_framework_theme_update_ready' ) ){
			return false;
		}
        
        ob_start();
        ?>
            <p>
                <strong>
                    <?php echo esc_html_x('There is a new update available for the theme!','Admin Panel','businesslounge'); ?>
                </strong>
            </p>

            <p>
                <?php if( ! $this->license ): ?>
                    <?php printf(esc_html_x('You can easily update your theme to %3$s by %1$sactivating%2$s your license.','Admin Panel','businesslounge'),'<a href="'.admin_url( $this->parent_slug . '?page=rt_framework_welcome' ).'">','</a>', get_transient('rt_framework_theme_new_version')); ?>
                <?php else:?>
                    <a href="<?php echo admin_url( 'themes.php' );?>">
                        <?php echo esc_html_x('Update','Admin Panel','businesslounge') ;?>
                    </a>							
                <?php endif;?>
            </p>
        <?php
        unset($this->nags['activate']);
        $this->nags['update'] = ['output' => ob_get_clean(), 'type' => 'warning'] ;
    }  

    /**
     * 
     * Activate
     * 
     */
    public function plugin_activate(){        
 
        $notices = [];

        foreach( $this->plugins as $slug => $plugin ){

            if( $plugin['is_active'] ){
                continue;
            }

            if( $plugin['required'] == true ){

                if( isset( $plugin['is_installed'] ) && $plugin['is_installed'] ){

                    if( ! $plugin['is_active'] ){
                        $action =  esc_html_x('activated','Admin Panel','businesslounge');
                    }
        
                }else{
                    $action =  esc_html_x('installed','Admin Panel','businesslounge');
                }

                if(  isset( $action ) ){
                    $notices[] =  sprintf(
                        esc_html_x('%1$s is required to be %2$s%4$s%3$s to benefit most of the advertised features of the theme.','Admin Panel','businesslounge'),
                        $plugin["name"], 
                        '<a href="'.admin_url( $this->parent_slug.'?page=rt_framework_plugins').'">',						
                        '</a>',
                        $action                            
                    );      
                }
          
            }

        }        

        $notice = "";
        foreach( $notices as $n ){
            $notice .= '<p>'.$n.'</p>';
        }

        if( ! empty( $notice ) ){
            $this->nags[] = ['output' => $notice, 'type' => 'warning'];
        }
        
    }        

    /**
     * 
     * Update
     * 
     */
    public function plugin_update(){        


        $updates = [];
        foreach( $this->plugins as $slug => $plugin ){
            if( isset($plugin['source']) && isset( $plugin['has_update'] ) && $plugin['has_update'] ){            
                $updates[] = $plugin["name"];                 
            } 
        }                
 
        if( ! empty( $updates ) ){
            $this->nags['update_plugins'] =  [
                    'output' => '<p>'.sprintf(translate_nooped_plural( $this->tgmpa_config['strings']['notice_ask_to_update'], count( $updates ), 'businesslounge' ), '<b>' . implode("</b>,<b> ", $updates )) . '</b>' . ' <a href="'.admin_url( $this->parent_slug.'?page=rt_framework_plugins').'">'.esc_html_x('Update Plugins','Admin Panel','businesslounge').'</a></p>',
                    'type' => 'warning'
                    ];                 
        }
        
    }       

    /**
     * 
     * Check Updates
     * 
     */
    public function check_updates(){        
     
        if( ! get_transient( 'rt_framework_theme_check_transient' ) ){
            
            set_transient("rt_framework_theme_check_transient", RT_THEMEVERSION, DAY_IN_SECONDS );

            $get_version = wp_remote_get( $this->api .'/version/'. ( $this->license ? $this->license : 0 ) .'/'. RT_THEMESLUG, array('timeout'=> 10 ) );        

            if ( ! is_wp_error( $get_version ) && 200 == $get_version['response']['code'] ) {

                $get_version = json_decode($get_version["body"]);

                if ( ! version_compare( RT_THEMEVERSION, $get_version->new_version, '<' ) ) {
                    delete_transient( 'rt_framework_theme_update_ready' );
                }else{
                    set_transient( 'rt_framework_theme_update_ready', 1 );
                    set_transient( 'rt_framework_theme_new_version', $get_version->new_version ); 
                    set_site_transient('update_themes', null);
                }
            }
        }
	 
        if( get_transient( 'rt_framework_theme_check_transient' ) != RT_THEMEVERSION ){
            delete_transient( 'rt_framework_theme_update_ready' );
			delete_transient( 'rt_framework_theme_new_version' );
			delete_transient( 'rt_framework_theme_check_transient' );
        }
 

    }       

    /**
     * 
     * Manager
     * 
     */
    public function manager(){        
        if( isset( $_POST['wpnonce-manager'] ) && wp_verify_nonce( $_POST['wpnonce-manager'], 'rt-framework-license-manager' ) ) {
        
			if( ! isset( $_POST['licenseKey'] ) ){
				return wp_send_json(['error'=>'no_license_key']);
			}
			
			$license = esc_sql( $_POST['licenseKey'] );
			$site_url = strtr( get_site_url(), array('http://'=>'','https://'=>'','/'=>"//") ); 
			$rest = $this->api . '/license/' . $license . '/' . $this->item . '/' . $site_url;
			$license_ = wp_remote_get( $rest,  array('timeout'=> 30)); 
			
			if( ! is_wp_error( $license_ ) ){
				$response = json_decode( $license_["body"], true ) ;	

				if( isset($response["ok"]) ){
					update_option("rt_framework_license", $license );

					return wp_send_json([ 'ok'=> esc_html_x('Your license has been activated successfully.','Admin Panel','businesslounge') ] );
				}else{

                    if( isset( $response["error"] ) ){
                        $error = $response["error"];
                    }elseif( isset( $license_["response"] ) && isset( $license_["response"]["code"] ) && $license_["response"]["code"] != 200 ){
                        $error = $license_["response"]["code"] . " : " . $license_["response"]["message"] ;
                    }else{
                        $error = "";
                    }

					return wp_send_json([ 'error'=> sprintf( esc_html_x('License activation failed. Error code: %1$s','Admin Panel','businesslounge'), $error ) ] );

				}

				return $response; 

			}else{
				return wp_send_json([ 'error'=> 
					esc_html_x('License activation failed.','Admin Panel','businesslounge') . " " . 
					sprintf( esc_html_x('Error code: %1$s','Admin Panel','businesslounge'), 'connection-problem' ) ] 
				);
			}

        }

        die();
    }     

    /**
     * 
     * Register Updates
     * 
     */
    public function register_updates( $transient ){        
        if( ! $this->license ){
            return $transient;
        }

        if( ! is_object( $transient ) ){
            return $transient;
        }        

		$get_version = wp_remote_get( $this->api .'/version/'. ( $this->license ? $this->license : 0 ) .'/'. RT_THEMESLUG, array('timeout'=> 10 ) );        

		if ( !is_wp_error( $get_version ) && 200 == $get_version['response']['code'] ) {

			$get_version = json_decode($get_version["body"]);

			if ( version_compare( RT_THEMEVERSION, $get_version->new_version, '<' ) ) {

				$transient->response[RT_THEMESLUG] = array(
					'theme'        => RT_THEMESLUG,
					'new_version'  => $get_version->new_version,
					'url'          => site_url(),
					'package'      => $get_version->package,
					'requires'     => $get_version->requires,
					'requires_php' => $get_version->requires_php,
				);

				set_transient( 'rt_framework_theme_update_ready', 1 ); 

			} else {
				$item = array(
					'theme'        => RT_THEMESLUG,
					'new_version'  => RT_THEMEVERSION,
					'url'          => '',
					'package'      => '',
					'requires'     => '',
					'requires_php' => '',
				);
				$transient->no_update[RT_THEMESLUG] = $item;
			}
		}
		return $transient;

    }  

    /**
     * 
     * Theme Updated
     * 
     */
    public function theme_updated( $upgrader_object, $options ){        
        if( $options['action'] == 'update' && $options['type'] == 'theme' && isset( $options['themes'] ) ) {
            foreach( $options['themes'] as $theme ) {
                if( $theme == RT_THEMESLUG ) {                        
                    delete_transient( 'rt_framework_theme_update_ready' );

                    $this->redirect( admin_url($this->parent_slug . '?page=rt_framework_plugins') );                        
                }
            }
        }         
    }      

	/**
     * 
	 * Plugin manager
     * 
	 */
	function plugin_manager()
	{
        if( isset( $_POST['wpnonce-manager'] ) && wp_verify_nonce( $_POST['wpnonce-manager'], 'rt-framework-plugin-manager' ) ) {
            if( $_POST['action_2'] == "plugin_status" ){
                wp_send_json($this->plugin_status_confirm( $_POST['plugins'] )); 
            }
        }

        die();
	}


	/**
	 * Plugin status confirm
	 * 
	 * @param  array $plugins 
	 * @return array
	 */

	function plugin_status_confirm( $plugins = array() )
	{
 
        $tgmpa = isset( $GLOBALS['tgmpa'] ) ? $GLOBALS['tgmpa'] : TGM_Plugin_Activation::get_instance();

        $bundled_plugins =  empty( $plugins ) ? $tgmpa->plugins : $plugins;
        $installed_plugins = $tgmpa->get_plugins(); 

        $plugin_status = [];
        
        foreach( $bundled_plugins as $plugin ){
            
            $action = false;
            $is_installed = false;
            $is_active = false;
            $installed_version = false;
                
            $plugin_status[ $plugin["slug"] ] = []; 
            
            $action = false;
            $is_installed = false;
            $is_active = false;
            $installed_version = false;
                
            $repo_updates = get_site_transient( 'update_plugins' );

            if( isset( $installed_plugins[ $plugin["slug"].'/'.$plugin["confirm"]["index"] ] ) ){


                $is_installed = true; 
                $installed_version = $installed_plugins[ $plugin["slug"].'/'.$plugin["confirm"]["index"] ]['Version'];
                $plugin_status[ $plugin["slug"] ]["installed"] = true;
                $plugin_status[ $plugin["slug"] ]["installed_version"] = $installed_version;
                
                if( ! empty( $plugin["version"] ) ){

                    if( $is_installed && version_compare( $plugin["version"], $installed_version , "<" )  ){ 
                        $plugin_status[ $plugin["slug"] ]["updated"] = false;
                    }else{
                        $plugin_status[ $plugin["slug"] ]["updated"] = true;
                    }  
                    
                    $plugin_status[ $plugin["slug"] ]["latest_version"] = $plugin["version"];

                }else{

                    if ( isset( $repo_updates->response[ $plugin["slug"].'/'.$plugin["confirm"]["index"] ]->new_version ) ) {

                        $plugin_status[ $plugin["slug"] ]["latest_version"] = $repo_updates->response[ $plugin["slug"].'/'.$plugin["confirm"]["index"] ]->new_version;
                        
                        if( $is_installed && version_compare( $installed_version, $plugin_status[ $plugin["slug"] ]["latest_version"] , "<" )  ){ 
                            $plugin_status[ $plugin["slug"] ]["updated"] = false;
                        }else{
                            $plugin_status[ $plugin["slug"] ]["updated"] = true;
                        }


                    }else{
                        $plugin_status[ $plugin["slug"] ]["updated"] = true;
                    }

                }
                

            }else{
                $plugin_status[ $plugin["slug"] ]["installed"] = false;

                // folder name of the plugin has been changed - conflict
                if( isset( $plugin["confirm"]["class"] ) && class_exists( $plugin["confirm"]["class"] ) ){
                    $plugin_status[ $plugin["slug"] ]["conflict"] = "slug-name-conflict";
                }elseif( isset( $plugin["confirm"]["definition"] ) && defined( $plugin["confirm"]["definition"] ) ){
                    $plugin_status[ $plugin["slug"] ]["conflict"] = "slug-name-conflict"; 
                }

            }


            if( isset( $plugin["confirm"]["class"] ) && class_exists( $plugin["confirm"]["class"] ) ){
                $plugin_status[ $plugin["slug"] ]["activated"] = true;
            }elseif( isset( $plugin["confirm"]["definition"] ) && defined( $plugin["confirm"]["definition"] ) ){
                $plugin_status[ $plugin["slug"] ]["activated"] = true;
            }else{
                $plugin_status[ $plugin["slug"] ]["activated"] = false;
            }

        }


        delete_transient( 'elementor_activation_redirect' );
        delete_transient( '_wc_activation_redirect' );
        delete_transient( '_vc_page_welcome_redirect' );

        

        return $plugin_status;
	}
}
global $RTFrameworkManager;
$RTFrameworkManager = new RTFrameworkManager(); 

// Fix for old plugin versions
if( ! function_exists('rt_framework_welcome') ){
    function rt_framework_welcome(){
        global $RTFrameworkManager;
        return $RTFrameworkManager->welcome_page();
    }
}    