<?php 
/**
 * RT-THEME Main Functions File
 *
 * @author 		RT-Themes
 * @package 	RT-Framework/Functions
 * @since 		1.0
 * @version    1.0
 */
if ( ! isset( $content_width ) ){
	/**
	 *  Define Content Width
	 */
	$content_width = 1220;	
} 

if ( ! function_exists("rtframework_load") ){
	/**
	 *
	 * Load the theme
	 *
	 * @return class [RT Main Class] 
	 *
	 */
	function rtframework_load(){
		require_once ( get_template_directory() . '/rt-framework/classes/loading.php' );
		$rttheme = new RTFramework();

		/*
		* 	 DO NOT CHANGE slug => "" !!! 
		*/
		$rttheme->start(array('theme' => 'BusinessLounge','slug' => 'businesslounge','version' => '1.0'));
	}
}
rtframework_load(); 