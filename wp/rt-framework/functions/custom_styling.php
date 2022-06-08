<?php
/**
 * RT-Theme Custom Styling
 *
 * contains functions used for creating dynamic css outputs
 *
 * @author 		RT-Themes
 */

global $rtframework_grouped_selectors, $rtframework_sections;

$rtframework_grouped_selectors= array(
	"link-font-color" => array("use"=>"link_color","selectors"=>'a, a.more-link'),
	"bg-color" => array("use"=>"bg_color","selectors"=>'
		
		[row-selector].row,
		[row-selector].content_row,
		[row-selector].elementor-top-section,
		[row-selector].footer,
		[row-selector] > .side-panel-wrapper,

		[row-selector].rt-column-container > .rt-column-inner,
		[row-selector] .match-bg,
		[row-selector] .boxed,
		[row-selector] .boxed-column > * > *,
		.quantity .minus,
		.quantity .plus,
		.portfolio-header-background,
		[row-selector].sidebar .widget,
		.paging_wrapper .page-numbers,
		.businesslounge-before-shop,
		.term-description,
		[row-selector].blog-carousel.style-1 .owl-item > div,
		[row-selector].blog-carousel.style-2 .post-details,
		.body-font-color,
		.rt-toggle > ol > li .toggle-head,
		.pricing_table .table_wrap > ul,
		.format-aside [row-selector].entry-content
	'),
	"item-bg-color" => array("use"=>"bg_color","selectors"=>'
		.rt-featured-image,
		.rt-featured-video,
		.rt-featured-map,
		.rt-frame,
		.wp-caption
	'),
	"bg-color-as-border-color" => array("use"=>"bg_color","selectors"=>''),
	"font-color" => array("use"=>"font_color","selectors"=>'
		[row-selector],
		.paging_wrapper > .page-numbers a,
		.paging_wrapper > .page-numbers li > span,
		.widget > ul > li li a,
		.widget .menu > li li a,
		.latest_news .meta-bar,.latest_news .meta-bar *,
		.client-info a
	'),
	"border-color" =>array("use"=>"border_color","selectors"=>'
		[row-selector],
		[row-selector] *,
		[row-selector] *:before,
		[row-selector] *:after,
		[row-selector]:before,
		[row-selector]:after,
		table,
		table *,
		.shop_attributes		
	'),
	"border-color-as-font-color" => array("use"=>"border_color","selectors"=>'
		.rt-toggle .toggle-head:after,
		.rt_quote .icon-quote-right,
		.rt_quote .icon-quote-left,
		.cart-collaterals h2:before,
		.timeline > div:before
	'),
	"border-color-as-background-color" => array("use"=>"border_color","selectors"=>'
		.rt-toggle > ol:before,
		.rt-heading-wrapper .style-4:before,
		.masonry .vertical_line, 
		.widget > h5:after,
		.widget .sub-menu li a:after, .widget .children li a:after,
		.ui-slider-range,
		.feature_contents:before,
		.date-box:after,
		.entry-content:before,
		.feature_nav li:before,
		.testimonial .text:after,
		.widget_price_filter .ui-slider .ui-slider-range,
		.rt_divider,
		li.product:before,li.product:after
	'),
	"secondary-font-color" => array("use"=>"secondary_font_color","selectors"=>'
		p.price del,
		.rt-heading .punchline,
		.rt_tabs.style-4 .tab_title > span,
		.rt_tabs .tab_nav > li.tab_title:not(.active):hover,
		.client_info,
		.blog_list .date_box,
		.post_data > *,
		.post_data > * > *,
		.comment-meta > a,


		.widget_latest_posts .meta, .widget_latest_posts .meta *,
		.widget_popular_posts .meta, .widget_popular_posts .meta *,

		.social_share,
		.small.note,
		.with_icons.style-2 > div > .icon,
		.icon-content-box.icon-style-1 .icon-holder span:before,
		.more-link,
		.rt-heading-wrapper .heading_link:before,
		.rt-heading-wrapper .heading_link, 
		.feature-heading,
		.star-rating:before,
		a.remove,
		.type-staff.loop .position,
		.text-navigation-wrapper span,

		.filter_navigation,
		.filter_navigation a,
		.tags a
	'),
	"primary-color-as-font-color" => array("use"=>"primary_color","selectors"=>'
		.rt-heading .heading_icon:before,
		.highlight.style-1,
		.paging_wrapper > .page-numbers a:hover,
		.paging_wrapper > .page-numbers .current,
		.single_variation span.price,
		.latest_news .title:hover,
		.timeline > div > .event-date,
		.bullet-list.style-3 > ul > li::before,
		.product_info .product-title a:hover,
		.product-category a:hover,
		.product-category a:hover > *,
		.primary-color,
		.content_row_wrapper .primary-color,
		.content_row_wrapper .primary-color a,
		h1.primary-color a,
		h2.primary-color a,
		h3.primary-color a,
		h4.primary-color a,
		h5.primary-color a,
		h6.primary-color a,
		h1.primary-color,
		h2.primary-color,
		h3.primary-color,
		h4.primary-color,
		h5.primary-color,
		h6.primary-color,
		.rt-heading > span,
		.icon-content-box.icon-style-4 .icon-holder span:before,
		.icon-content-box.icon-style-6 .icon-holder span:before,
		.button_.style-1:hover span,
		.button_.style-1:hover,
		.button_.style-2,
		.pricing_table .highlight .title,
		.pricing_table .highlight .price,		 
		.tab_title.active,
		.rt-toggle.no-numbers .toggle-head:after,
		.rt-toggle .toggle-title > span:before,
		.filter_navigation a.active,
		.filter_navigation a:hover,
		#businesslounge-side-navigation li.menu-item-has-children > a:after,
		.social_share:hover,
		.rt-anim.style-1,
		.entry-footer .read_more:hover,
		.post_data a:hover,
		.entry-title a:hover,
		.widget > ul > li li a:hover,
		.widget .menu > li li a:hover,
		.entry-footer .tags,

		.businesslounge-product-content-holder .price,
		div.product span.price,
		div.product p.price,
		.quantity .rt-minus:hover,
		.quantity .rt-plus:hover,
		.star-rating span:before,
		a.remove:hover,
		.stock,
		.button:before,
		.woocommerce-info:before,
		.product mark,

		#businesslounge-side-navigation a:hover,
		#businesslounge-side-navigation li.active > a,
		.with_icons.style-4 > div > .icon,
		.rt-countdown > i b,

		.icon-submit,

		.staff .social_media a:hover,

		.testimonial .quote,

		.owl-nav div:hover,
		.text-navigation-wrapper a.active span,
		.primary-font-color,
		.comment-reply-title small > a,

		.elementor-widget-icon.elementor-view-default .elementor-icon,
		.elementor-widget-icon.elementor-view-framed .elementor-icon,
		.elementor-widget-icon-list .elementor-icon-list-icon i,
		.elementor-icon-box-icon .elementor-icon
	'),
	"primary-color-as-background-color" => array("use"=>"primary_color","selectors"=>'
		.rt-toggle > ol > li .toggle-number,
		.rt_tabs.style-4 .tab_nav li span:before,
		.rt-heading.style-1:after,
		.rt-heading.style-2:after,
		.rt-heading-wrapper .style-4:after,
		.rt-heading-wrapper .style-5:after,
		.highlight.style-2,
		.bullet-list.style-1 > ul > li::before,
		.rt_counter .number:after,
		[type="submit"]:hover,
		[type="button"]:hover,
		.comment-reply a:hover,
		.button:hover,
		#respond input#submit:hover,
		.with_icons.style-3 > div > .icon,
		.icon-content-box.icon-style-2 .icon-holder span:before,
		.icon-content-box.icon-style-3 .icon-holder span:before,
		.icon-content-box.icon-style-5 .icon-holder span:after,
		.chained_contents > div > .number,
		.chained_contents > div > .icon,
		.slide-content:before,
		.button_.style-1,
		.button_.style-2:hover,
		.button_.style-3,
		.date-box:before,
		.rt-anim.style-2,
		.timeline.style-2 .event-date:after,
		.single_add_to_cart_button.button,
		.widget_price_filter .ui-slider .ui-slider-handle,
		.widget_price_filter .price_slider_wrapper .ui-widget-content,
		div.payment_box,

		.side-panel-contents .widgettitle:after,
		.side-panel-contents .widget h5:after,
		#footer-navigation a:after,

		.timeline:after,
		.timeline > div:before,

		.style-2.loop .terms:before,
		.style-2.loop .title:before,
		.style-2.loop p:before,

		.latest_news.style-2 .meta-bar,
		.featured-col .column-inner:before,

		article .post-date,

		.primary-bg-color,
		li.product:hover:before,
		li.product .button,

		.elementor-widget-icon.elementor-view-stacked .elementor-icon,

		.product .onsale
	'),
	"primary-color-as-border-color" => array("use"=>"primary_color","selectors"=>'
		.rt_tabs.tab-position-1 .tab_nav > li.active:after,
		.rt_tabs.tab-position-1 .tab_content_wrapper.active > .tab_title,
		.rt_tabs.tab-position-2 .tab_nav > li.active:after,
		.rt_tabs.tab-position-2 .tab_contents .tab_content_wrapper.active > .tab_title,
		.filter_navigation li .active,
		.icon-content-box.icon-style-4 .icon-holder span:before,
		.button_,
		.button_.style-1:hover,
		.button_.style-2,
		.side-panel-contents .search,
		.rt-anim.style-3, 
		input:focus, textarea:focus, select:focus,		
		#payment,
		.woocommerce-info, 
		.pricing_table .table_wrap.highlight > ul,

		.elementor-widget-icon.elementor-view-default .elementor-icon,
		.elementor-widget-icon.elementor-view-framed .elementor-icon		
	'),
	"light-text-color" => array("use"=>"light_text_color","selectors"=>'
		.with_icons.style-3 > div > .icon,
		.rt-toggle > ol > li .toggle-number,
		.icon-content-box.icon-style-2 .icon-holder span:before,
		.highlight.style-2,
		[type="submit"],
		[type="button"],
		button:not(.button_),
		button:not(.button_):hover,
		.button,
		.cart_totals a.button,
		.cart_totals a.button:hover,
		.comment-reply a,
		.button_.style-1,
		.button_.style-2:hover,
		.button_.style-3:hover, 
		.rt-anim.style-2,		
		div.payment_box,
		article .post-date,
		.single_add_to_cart_button.button,
		.light-font-color
	'),
	"heading-color" => array("use"=>"heading_color","selectors"=>'
		.rt-heading,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		h1 a,
		h2 a,
		h3 a,
		h4 a,
		h5 a,
		h6 a,
		h1 a:hover,
		h2 a:hover,
		h3 a:hover,
		h4 a:hover,
		h5 a:hover,
		h6 a:hover,
		.slide_sub_heading,
		.toggle-head,
		.tab_title,
		.rt_tabs.style-4 .tab_nav li,
		.pricing_table .title,
		.pricing_table .price,
		.author-title,
		.copyright,
		.key-details b,
		[row-selector].businesslounge-post-navigation > div > :not(:nth-child(2)) a:not(:hover),
		[row-selector].businesslounge-post-navigation > div > :nth-child(2) a:hover,
		.timeline.style-2 .year,
		.entry-footer .read_more,
		blockquote,
		.author-name a, 
		.quantity, .quantity *,
		table th,
		form.cart .variations label,
		.woocommerce-message,
		.woocommerce-error,
		.woocommerce-info,
		#businesslounge-side-navigation a,
		.with_icons.style-4,
		.rt_counter .number,
		.rt-countdown > i,
		.rt_quote,
		.main-carousel .slide-text,
		.main-carousel .slide-text a,
		.main-carousel [row-selector] .slide-text,
		.main-carousel [row-selector] .slide-text a,
		.staff .social_media a,
		.text-navigation-wrapper a,
		.heading-color
	'),
	"form-button-bg-color" => array("use"=>"form-button_bg_color","selectors"=>'
		[type="submit"],
		[type="button"],
		button:not(.button_),
		.comment-reply a,
		.button,
		#respond input#submit,
		.ui-slider .ui-slider-handle,
		.ui-slider-horizontal
	'),
	"social-media-bg-color"=>array("use"=>"social_media_bg_color","selectors"=>'
		.social_media li:before, 
		.social_share ul
	'),
);
$rtframework_sections= array(
	"side_panel"  => ".side-panel-holder",
	"default"     => ".default-style",
	"alt_style_1" => ".alt-style-1",
	"light_style" => ".light-style",
	"footer"      => "#footer",
);

if( ! function_exists("rtframework_design_message") ){
	/**
	 * Different page design message output
	 *
	 * @return output
	 */
	function rtframework_design_message(){
		?>
			<div class="customizer-notification">
				<span class="ui-icon-attention-circle"></span>
				<div class="customizer-notification-text">
					<strong><?php echo esc_html_x("The current page has some individual design settings different than the global settings of the customizer window.",'Admin Panel', 'businesslounge')."</strong>";?></strong><br />
					<?php echo esc_html_x("As a result, the page may look different than the rest of the website. To prevent confusing while customizing your page and be sure about your changes, just click another link of your website which has no individual customizations.",'Admin Panel', 'businesslounge');?><br />
					<?php echo esc_html_x("Tip: If you don't see this message on a page while the customizer window is open, you can be sure that that page follows the global settings (customizer). ",'Admin Panel', 'businesslounge');?><br />
					<?php echo esc_html_x("You can control the individual design options of a page/post from the 'Design Options' box inside the edit screen of the page or post.",'Admin Panel', 'businesslounge');?>
				</div>
			</div>
		<?php
	}
}


if( ! function_exists("rtframework_custom_styling") ){
	/**
	 * Print Custom CSS output
	 * get custom css file or output and print
	 *
	 * @global $wp_customize
 	 * @global $post
 	 *
	 */
	function rtframework_custom_styling(){
		global $wp_customize, $post;

		$rttheme_custom_css = "";
		$minify_css_output = true;

		//check if this page has any different individual design options then display a message
		if ( rtframework_get_setting("different_design") && isset( $wp_customize) ){
			add_action("wp_footer", "rtframework_design_message");
		}

		//if it is customizer window or post preview, create dynamic css and print inline
		if( isset( $wp_customize) || is_preview() ) {
			$rttheme_custom_css = rtframework_get_custom_css_output();
			wp_add_inline_style( 'businesslounge-theme-style', rtframework_minify_css_output( $rttheme_custom_css ) );
			return ;
		}

		//get stored dates of custom css outputs
		$css_dates = get_option( "businesslounge_custom_css_update_dates" );
		$css_dates["global"] = isset( $css_dates["global"] ) ? $css_dates["global"] : "";

		//post id
		$post_id = isset( $post ) && is_singular() ? $post->ID : "";

		// recreate custom css output for this post if global settings updated
		if( $post_id ){

			$css_dates[$post_id] = isset( $css_dates[$post_id] ) ? $css_dates[$post_id] : "";
			
			if( $css_dates[$post_id] < $css_dates["global"] ){
				rtframework_save_custom_css_output_post( $post_id );
			}
		}

		//is css dir writeable?
		if( rtframework_is_css_dir_writeable() ){

				//get css dir
				$get_custom_css_dir = rtframework_get_custom_css_dir();
				$rtframework_get_custom_css_url = rtframework_get_custom_css_url();

				//check if a custom css file exists for this post
				if( ! empty($post_id) && file_exists( $get_custom_css_dir."dynamic-style-". $post_id .".css" ) ){
					wp_enqueue_style('businesslounge-dynamic',  $rtframework_get_custom_css_url."dynamic-style-". $post_id .".css", "" , sanitize_file_name( $css_dates[$post_id] ) );
					return ;
				}

				//check if a global custom css file exists
				if ( file_exists( $get_custom_css_dir."dynamic-style.css" ) ) {
					wp_enqueue_style('businesslounge-dynamic',  $rtframework_get_custom_css_url."dynamic-style.css", "" , sanitize_file_name( $css_dates["global"] ) );
					return ;
				}

		//get stored css output from db
		}else{
			$rttheme_custom_css = rtframework_get_saved_css_output( $post_id );
		}

		//no stored css output found
		if( empty( $rttheme_custom_css ) ){
			$rttheme_custom_css = rtframework_get_custom_css_output();
		}

		//add the css output inline
		$rttheme_custom_css = $minify_css_output ? rtframework_minify_css_output( $rttheme_custom_css ) : $rttheme_custom_css ;
		wp_add_inline_style( 'businesslounge-theme-style', $rttheme_custom_css );

	}
}
add_action( 'wp_enqueue_scripts', 'rtframework_custom_styling', 7 );

if( ! function_exists("rtframework_get_saved_css_output") ){
	/**
	 *
	 *  Get the saved css output
	 *  returns stored css output of given $post_id
	 *  if $post_id or css of the post is empty returns global output
	 *
	 *  @var $post_id
	 *  @return $rttheme_custom_css
	 */
	function rtframework_get_saved_css_output( $post_id = "" ){

		if( ! empty( $post_id ) && is_singular()  ){
			$rttheme_custom_css = get_option( "businesslounge_custom_".$post_id."_css_output" );

			if( ! empty( $rttheme_custom_css ) ) {
				return $rttheme_custom_css;
			}

		}

		$rttheme_custom_css = get_option( "businesslounge_custom_css_output");
		return $rttheme_custom_css;
	}
}

if( ! function_exists("rtframework_minify_css_output") ){
	/**
	 * Minify css output
	 */
	function rtframework_minify_css_output( $css = "" ){

		// Remove comments
		$css = preg_replace('#/\*.*?\*/#s', '', $css);
		// Remove whitespace
		$css = preg_replace('/\s*([{}|:;,])\s+/', '$1', $css);
		// Remove trailing whitespace at the start
		$css = preg_replace('/\s\s+(.*)/', '$1', $css);
		// Remove unnecesairy ;'s
		$css = str_replace(';}', '}', $css);
		//Remove the tabs
		$css = str_replace("\t", "", $css);

		$css = stripslashes($css);

		return $css;
	}
}

if( ! function_exists("rtframework_save_custom_css_output") ){
	/**
	 * Save generated css output
	 */
	function rtframework_save_custom_css_output(){

		//create css output
		$css_output = rtframework_get_custom_css_output();

		//store the output to db
		update_option( "businesslounge_custom_css_output" , $css_output );

		//store last update date
		$css_dates = get_option( "businesslounge_custom_css_update_dates" );
		$css_dates = empty( $css_dates ) ? array() : get_option( "businesslounge_custom_css_update_dates" );
		$css_dates["global"] = date('ymdHis');
		update_option( "businesslounge_custom_css_update_dates",  $css_dates );

		//generate css file
		rtframework_create_dynamic_css_file( rtframework_minify_css_output( $css_output ), $file_name = "dynamic-style.css" );
	}
}
add_action( 'customize_save_after', 'rtframework_save_custom_css_output' );
add_action( 'rtframework_after_reset' , 'rtframework_save_custom_css_output' );
add_action( 'rtframework_after_user_custom_css', 'rtframework_save_custom_css_output' );
add_action( 'rtframework_theme_updated' , 'rtframework_save_custom_css_output', 40 );


if( ! function_exists("rtframework_save_custom_css_output_post") ){
	/**
	 * Save generated css output
	 */
	function rtframework_save_custom_css_output_post( $post_id ){

		// If this is just a revision, don't create the output
		if ( wp_is_post_revision( $post_id ) ){
			return;
		}

		$post_id = rtframework_wpml_translated_page_id( $post_id );
		$css_dates = get_option( "businesslounge_custom_css_update_dates" ); 
		$css_dates = empty( $css_dates ) ? array() : $css_dates;

		if ( rtframework_get_setting("different_css_output") ){

			//create a css output for this post
			$css_output = rtframework_get_custom_css_output();

			//store the output to db
			update_option( "businesslounge_custom_".$post_id."_css_output" , $css_output );

			//store last update date 
			$css_dates[$post_id] = date('ymdHis');
			update_option( "businesslounge_custom_css_update_dates",  $css_dates );

			//generate css file
			rtframework_create_dynamic_css_file( rtframework_minify_css_output( $css_output ), $file_name = "dynamic-style-". $post_id .".css" );

		}else{

			if( isset( $css_dates[$post_id] ) ){

				//check if a custom css file exists for this post
				if( file_exists( rtframework_get_custom_css_dir()."dynamic-style-". $post_id .".css" ) ){
					rtframework_delete_dynamic_css_file( "dynamic-style-". $post_id .".css" );		
				}

				//delete the db output
				delete_option( "businesslounge_custom_".$post_id."_css_output");

				//delete from dates
				unset($css_dates[$post_id]);
				
				update_option( "businesslounge_custom_css_update_dates",  $css_dates );				
			}

			return ;
		}


	}
}
add_action( 'rtframework_updated_post_meta' , 'rtframework_save_custom_css_output_post', 20 );


if( ! function_exists("rtframework_create_dynamic_css_file") ){
	/**
	 * create dynamic css file
	 */
	function rtframework_create_dynamic_css_file( $output = "", $file_name = "dynamic-style.css" ){

		if( rtframework_is_css_dir_writeable() && ! empty( $output ) ){

			global $wp_filesystem;

			if (empty($wp_filesystem)) {
				require_once (ABSPATH . '/wp-admin/includes/file.php');
				WP_Filesystem();
			}

			$comment  = '/*' . "\n";
			$comment .= '* This is a dynamically generated css file by '. RT_THEMENAME .'. Do not edit.' . "\n";
			$comment .= '* Created on '. date("d-M-y H:i:s"). "\n";
			$comment .= '*/' . "\n";

			$wp_filesystem->put_contents(
				rtframework_get_custom_css_dir().sanitize_file_name($file_name),
				$comment . rtframework_minify_css_output($output),
				FS_CHMOD_FILE // predefined mode settings for WP files
			);
		}
	}
}

if( ! function_exists("rtframework_delete_dynamic_css_file") ){
	/**
	 * delete dynamic css file
	 */
	function rtframework_delete_dynamic_css_file( $file_name = "dynamic-style.css" ){

		$file_name = sanitize_file_name( $file_name );

		if( rtframework_is_css_dir_writeable() && ! empty( $file_name ) ){

			global $wp_filesystem;

			if (empty($wp_filesystem)) {
				require_once (ABSPATH . '/wp-admin/includes/file.php');
				WP_Filesystem();
			}

			$wp_filesystem->delete(rtframework_get_custom_css_dir().$file_name );
		}
	}
}

if( ! function_exists("rtframework_get_custom_css_output") ){
	/**
	 * Get custom css output
	 */
	function rtframework_get_custom_css_output(){

	 	$rttheme_custom_css = "";

	  	//Misc settings
	 	$rttheme_custom_css .= rtframework_create_misc_css();

	 	//Fonts
		$rttheme_custom_css .= rtframework_create_fonts_css();

	 	//Font sizes
	 	$rttheme_custom_css .= rtframework_create_font_size_css();

		//Custom Navigation colors
		$rttheme_custom_css .= rtframework_create_navigation_css();

		//Color schemas
		$rttheme_custom_css .= rtframework_create_color_schema_css();

		//Top Bar
		$rttheme_custom_css .= rtframework_create_top_bar_css();

		//Body Background CSS
		$rttheme_custom_css .= rtframework_create_background_css( array(
				"background_color"             => rtframework_get_setting("body_background_color"),
				"background_image_url"         => rtframework_get_setting("body_background_image_url"),
				"background_attachment"        => rtframework_get_setting("body_background_attachment"),
				"background_position"          => rtframework_get_setting("body_background_position"),
				"background_repeat"            => rtframework_get_setting("body_background_repeat"),
				"background_size"              => rtframework_get_setting("body_background_size")
			), "body");

 		//custom background heights
		$rttheme_custom_css .= rtframework_create_background_css( array(
				"background_color"             => rtframework_get_setting("body_background_color")
			), ".rt-sa-background");

		//Main Header
		$rttheme_custom_css .= rtframework_create_header_css();

		//User Custom CSS
		$rttheme_custom_css .= get_option( "businesslounge_user_custom_css" );

		return $rttheme_custom_css;
	}
}

if( ! function_exists("rtframework_create_top_bar_css") ){
	/**
	 * Create top bar css
	 */
	function rtframework_create_top_bar_css(){

		$css = '';

		//topbar bg color
 		$css .= sprintf('
 				.businesslounge-top-bar, .businesslounge-top-bar .menu .sub-menu{
 					background-color: %1$s;
 				}
 				', get_theme_mod( RT_THEMESLUG.'_topbar_bg_color' ) );

		//topbar font color
		$css .= sprintf('
				.businesslounge-top-bar, .businesslounge-top-bar *{
					color: %1$s;
				}
				', get_theme_mod( RT_THEMESLUG.'_topbar_font_color' ) );

		//topbar border color
		$css .= sprintf('
				.businesslounge-top-bar *,.businesslounge-top-bar *:after, .businesslounge-top-bar *:before{
					border-color: %1$s;
				}
				', get_theme_mod( RT_THEMESLUG.'_topbar_border_color' ) );

		//topbar link color
		$css .= sprintf('
				.businesslounge-top-bar a{
					color: %1$s;
				}
				', get_theme_mod( RT_THEMESLUG.'_topbar_link_color' ) );

		//topbar link hover color
		$css .= sprintf('
				.businesslounge-top-bar a:hover{
					color: %1$s;
				}
				', get_theme_mod( RT_THEMESLUG.'_topbar_link_hover_color' ) );

		//topbar bottom border color
		$topbar_bottom_border_color = get_theme_mod( RT_THEMESLUG.'_topbar_bottom_border_color' );

		if( ! empty( $topbar_bottom_border_color ) ){
			$css .= sprintf('
					.businesslounge-top-bar{
						border-bottom: 1px solid %1$s;
					}
					', $topbar_bottom_border_color );

  		}

	 	return $css;
	}
}
if( ! function_exists("rtframework_create_misc_css") ){
	/**
	 * Create mics css codes
	 */
	function rtframework_create_misc_css(){

		$css = '';

		/**
		 *
		 *  page loading
		 *
		 */
		$ava_loading_background_color = rtframework_get_setting( "loading_background_color" );
		$ava_loading_bar_color = rtframework_get_setting( "businesslounge_loading_bar_color" );


		//ava_loading_background_color
		if( ! empty( $ava_loading_background_color ) ){

			$css .= sprintf('
				.js #loader-wrapper{
					background-color: %1$s
				}

				', $ava_loading_background_color );
		}



		//ava_loading_bar_color
		if( ! empty( $ava_loading_bar_color ) ){

			$css .= sprintf('

				.pace .pace-progress{
					background-color: %1$s
				}

				', $ava_loading_bar_color );
		}


		//slection highlight color
		$css .= sprintf(
		'
			/* text selection */
			::selection {
				background: %1$s;
				color: #fff;
			}

			::-moz-selection {
				background: %1$s;
				color: #fff;
			}

		', rtframework_get_setting("default_primary_color") );


 		//Demo store
		$css .= sprintf(
		'
 			p.demo_store{
				background: %1$s;
				color: #fff;
			}

		', rtframework_get_setting("alt_style_1_bg_color") );


 		//black button
		$css .= sprintf(
		'
 			.button_.black:hover, .button_.white:hover{
				color: %1$s;
			}

		', rtframework_get_setting("default_primary_color") );


		//main slider
		$css .= sprintf('

					@media screen and (max-width: 768px) {
						.main-carousel .slide_heading, .main-carousel .slide_sub_heading {
							color: %1$s !important;
						}

	 					.main-carousel .slide-text {
							color: %2$s !important;
						}

	 					.main-carousel .slide-text a{
							color: %3$s !important;
						}

	 					.main-carousel .slide-content{
							background-color: %4$s;
						}

						.main-carousel .owl-nav span:before{
							color: %1$s !important;
						}
					}

				', rtframework_get_setting("businesslounge_default_heading_color"), rtframework_get_setting("businesslounge_default_font_color"), rtframework_get_setting("businesslounge_default_link_color"),rtframework_get_setting("businesslounge_default_bg_color") );


		$css .= sprintf('

					@media screen and (max-width: 768px) {

						.content_row .main-carousel .button_.style-1 {
							background-color: %1$s;
							border-color: %1$s;
							color: %2$s;
						}

	 					.content_row .main-carousel .button_.style-1:hover {
							border-color: %1$s;
							color: %1$s;
						}

						.content_row .main-carousel .button_.style-2 {
							background-color: transparent;
							border-color: %1$s;
							color: %1$s;
						}

	 					.content_row .main-carousel .button_.style-2:hover {
							background-color: %1$s;
							border-color: %1$s;
							color: %2$s;
						}
					}

				', rtframework_get_setting("businesslounge_default_primary_color"), rtframework_get_setting("businesslounge_default_heading_color"));





	 	return $css;
	}
}

if( ! function_exists("rtframework_create_navigation_css") ){
	/**
	 * Create navigation css
	 */
	function rtframework_create_navigation_css(){

		$css = '';

		$nav_item_vertical_padding       = intval ( rtframework_get_setting( "nav_item_vertical_padding" ) );
		$nav_item_horizontal_padding     = intval ( rtframework_get_setting( "nav_item_horizontal_padding" ) );
		$sub_nav_item_horizontal_padding = intval ( rtframework_get_setting( "sub_nav_item_horizontal_padding" ) );


		/**
		 * Desktop Navigation
		 */

		//nav_item_vertical_padding
		if( ! empty( $nav_item_vertical_padding ) ){

			$css .= sprintf('
					.header-col .main-menu > li > a > span
					{
						padding-top: %1$spx;
						padding-bottom: %1$spx;
					}
					', $nav_item_vertical_padding );

		}

		//nav_item_horizontal_padding
		if( ! empty( $nav_item_horizontal_padding ) ){

			$css .= sprintf('

					.header-col .main-menu > li > a > span, .businesslounge-language-menu li a
					{
						padding-left: %1$spx;
						padding-right: %1$spx;
					}

					.businesslounge-language-menu li ul
					{
						width: %2$spx;
					}

					.header-style-1 .header-col.left > nav{
						margin-left: %3$spx;
					}

					', $nav_item_horizontal_padding, $nav_item_horizontal_padding * 2 + 15, -1 * $nav_item_horizontal_padding );
		}


		//sub_nav_item_horizontal_padding
		if( ! empty( $sub_nav_item_horizontal_padding ) ){

			$css .= sprintf('
					.header-col .main-menu > li li a
					{
						padding-left: %1$spx;
						padding-right: %1$spx;
					}
					', $sub_nav_item_horizontal_padding );

		}



	 	return $css;
	}
}

if( ! function_exists("rtframework_create_header_css") ){
	/**
	 * Create header css
	 */
	function rtframework_create_header_css(){

		$css = '';

  		/**
  		 *  header bakcground colors
  		 */

		//header background color - first row
		if( rtframework_get_setting("main_header_first_row_bg_color") != "" ){
			$css .= sprintf('
					.header-style-1 #logo,
					.main-header-holder .header-elements:before,
					.header-row.first #lang_sel *
					{
						background-color: %s !important;
					}
					', rtframework_get_setting("main_header_first_row_bg_color") );
  		}

		//header background color - second row
		if( rtframework_get_setting("main_header_second_row_bg_color") != "" ){
			$css .= sprintf('
					.main-header-holder .header-row.second:before,
					.header-row.second #lang_sel *
					{
						background-color: %s !important;
					}
					', rtframework_get_setting("main_header_second_row_bg_color") );
  		}


		//header sticky background color
		if( rtframework_get_setting("main_header_row_bg_color_sticky") != "" ){
			$css .= sprintf('
					.sticky-header-holder{
						background-color: %s;
					}
					', rtframework_get_setting("main_header_row_bg_color_sticky") );
  		}


  		/**
  		 * Header Height
  		 */

		$header_height_first  = rtframework_get_setting( "header_style" ) == "1" || rtframework_get_setting( "header_style" ) == "2" ? max(intval(rtframework_get_setting("header_height_first")), 40) : max(intval(rtframework_get_setting("header_height_single")), 40);
		$header_height_second = max(intval(rtframework_get_setting("header_height_second")), 40);


		if( $header_height_first != "" ){

			$css .= sprintf('


					/* header style 1 */
					.header-style-1 #logo, .header-style-1 #logo a{
						height: %1$s;
						line-height: %1$s;
					}

					.header-style-1 #logo:before,
					.header-style-1 #logo:after{
						height: %2$s;
					}

					/* header style 2 */
					.header-style-2 #logo, .header-style-2 #logo a{
						height: %2$s;
						line-height: %2$s;
					}

					/* header style 1-2 */
					.header-style-1 .header-row.first,
					.header-style-2 .header-row.first,
					.main-header-holder .header-elements:before{
						height: %2$s;
					}

					.header-style-1 .header-row.second,
					.header-style-2 .header-row.second{
						height: %3$s;
					}


					/* header style 3-4 */
					.header-style-3 .main-header-holder .header-row,
 					.header-style-3 #logo,
					.header-style-4 .main-header-holder .header-row,
 					.header-style-4 #logo,
 					.header-style-3 #logo a,
 					.header-style-4 #logo a
 					{
						height: %2$s;
						line-height: %2$s;
					}

					.header-row.first > *{
						height: %2$s;
					}

					.header-row.second > *{
						height: %3$s;
					}


					.header-row.first .main-menu > li > a{
						line-height: %2$s;
					}

					.header-row.second .main-menu > li > a{
						line-height: %3$s;
					}

				', 
				rtframework_check_unit( $header_height_first + $header_height_second + 6 ) ,
				rtframework_check_unit( $header_height_first ),
				rtframework_check_unit( $header_height_second )
			);
		}



  		/**
  		 *  Moobile header bakcground colors
  		 */

		//header background color
		if( rtframework_get_setting("mobile_header_row_bg_color") != "" ){
			$css .= sprintf('
					.mobile-header
					{
						background-color: %s;
					}
					', rtframework_get_setting("mobile_header_row_bg_color"));
  		}

  		/**
  		 *  Mobile Header Paddings
  		 */

		//mobile header top padding
		if( rtframework_get_setting("mobile_header_top_padding") != "" ){
			$css .= sprintf('
					.mobile-header{
						padding-top: %s;
					}
					', rtframework_check_unit(rtframework_get_setting("mobile_header_top_padding")));
  		}

 		//mobile header bottom padding
		if( rtframework_get_setting("mobile_header_bottom_padding") != "" ){
			$css .= sprintf('
					.mobile-header{
						padding-bottom: %s;
					}
					', rtframework_check_unit(rtframework_get_setting("mobile_header_bottom_padding")));
  		}


  		/**
  		 *  Header Skins
  		 */
  		$header_skins = array("dark","light");

  		foreach ($header_skins as $skin) {

				${"main_header_font_color_".$skin}               = rtframework_get_setting( 'main_header_font_color_'.$skin );
				${"main_header_primary_color_".$skin}            = rtframework_get_setting( 'main_header_primary_color_'.$skin );
				${"main_header_border_color_".$skin}             = rtframework_get_setting( 'main_header_border_color_'.$skin );


				${"nav_item_background_color_".$skin}            = rtframework_get_setting( "nav_item_background_color_".$skin );
				${"nav_item_font_color_".$skin}                  = rtframework_get_setting( "nav_item_font_color_".$skin );
				${"nav_item_border_color_".$skin}                = rtframework_get_setting( "nav_item_border_color_".$skin );
				${"nav_item_background_color_active_".$skin}     = rtframework_get_setting( "nav_item_background_color_active_".$skin );
				${"nav_item_font_color_active_".$skin}           = rtframework_get_setting( "nav_item_font_color_active_".$skin );
				${"nav_item_indicator_color_active_".$skin}      = rtframework_get_setting( "nav_item_indicator_color_active_".$skin );

				${"sub_nav_item_background_color_".$skin}        = rtframework_get_setting( "sub_nav_item_background_color_".$skin );
				${"sub_nav_item_font_color_".$skin}              = rtframework_get_setting( "sub_nav_item_font_color_".$skin );
				${"sub_nav_item_border_color_".$skin}            = rtframework_get_setting( "sub_nav_item_border_color_".$skin );
				${"sub_nav_item_background_color_active_".$skin} = rtframework_get_setting( "sub_nav_item_background_color_active_".$skin );
				${"sub_nav_item_font_color_active_".$skin}       = rtframework_get_setting( "sub_nav_item_font_color_active_".$skin );
				${"sub_nav_item_indicator_color_active_".$skin}  = rtframework_get_setting( "sub_nav_item_indicator_color_active_".$skin );
				${"sub_nav_item_desc_font_color_".$skin}         = rtframework_get_setting( "sub_nav_item_desc_font_color_".$skin );

				${"mega_title_item_font_color_".$skin}           = rtframework_get_setting( "mega_title_item_font_color_".$skin );
				${"mega_title_item_border_color_".$skin}         = rtframework_get_setting( "mega_title_item_border_color_".$skin );

				$mobile_nav_item_font_color                   = rtframework_get_setting( "mobile_nav_item_font_color" );
				$mobile_nav_item_desc_font_color              = rtframework_get_setting( "mobile_nav_item_desc_font_color" );
				$mobile_nav_item_background_color             = rtframework_get_setting( "mobile_nav_item_background_color" );
				$mobile_nav_item_font_color_active            = rtframework_get_setting( "mobile_nav_item_font_color_active" );
				$mobile_nav_item_border_color                 = rtframework_get_setting( "mobile_nav_item_border_color" );


				//logo font color
				if( ! empty( ${"main_header_font_color_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .widget *,
							.businesslounge-%1$s-header .header-tools > ul > li > a > span,
							.businesslounge-%1$s-header .mobile-menu-button:before{
								color: %2$s
							}

							.businesslounge-%1$s-header .businesslounge-menu-button *
							{
								background-color: %2$s;
							}
							', $skin, ${"main_header_font_color_".$skin} );
				}

				//header primary color
 				if( ! empty( ${"main_header_primary_color_".$skin} ) ){
					$css .= sprintf('
							.businesslounge-%1$s-header .site-logo a, .businesslounge-%1$s-header.site-logo a,
							.businesslounge-%1$s-header .widget .icon:before,
							.businesslounge-%1$s-header .widget a:not(.button_):hover{
								color: %2$s;
							}

							.businesslounge-%1$s-header .button_.style-3,
							.businesslounge-%1$s-header .button_.style-1,
							.businesslounge-%1$s-header .button_.style-2:hover{
								background-color: %2$s;
							}

							.businesslounge-%1$s-header .button_.style-1:hover,
							.businesslounge-%1$s-header .button_.style-2
							{
								border-color: %2$s;
							}

							.businesslounge-%1$s-header .button_.style-1:hover span,
							.businesslounge-%1$s-header .button_.style-2 span
							{
								color: %2$s;
							}


							', $skin, ${"main_header_primary_color_".$skin} );
				}


				//header border color
 				if( ! empty( ${"main_header_border_color_".$skin} ) ){
					$css .= sprintf('
							#logo.businesslounge-%1$s-header:before,
							#logo.businesslounge-%1$s-header:after,
							.businesslounge-%1$s-header.header-row .header-col > *,
							.businesslounge-%1$s-header.main-header-holder
							{
								border-color: %2$s;
							}

							.overlapped-header .businesslounge-%1$s-header.main-header-holder:after
							{
								background-color: %2$s;
							}

							', $skin, ${"main_header_border_color_".$skin} );
				}


				//nav_item_background_color
				if( ! empty( ${"nav_item_background_color_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu > li > a > span{
								background-color: %2$s
							}
							', $skin, ${"nav_item_background_color_".$skin} );
				}

				//nav_item_font_color
				if( ! empty( ${"nav_item_font_color_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu > li > a > span
							{
								color: %2$s
							}

							', $skin, ${"nav_item_font_color_".$skin} );

				}



				//nav_item_border_color
				if( ! empty( ${"nav_item_border_color_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu > li > a > span,  
							.businesslounge-%1$s-header .businesslounge-search-button,
							.businesslounge-%1$s-header .businesslounge-language-menu li a:after,
							.businesslounge-%1$s-header .mobile-menu-button
							{
								border-color: %2$s
							}
							', $skin, ${"nav_item_border_color_".$skin} );
				}

				//nav_item_background_color_active
				if( ! empty( ${"nav_item_background_color_active_".$skin} ) ){

					$css .= sprintf('

							.businesslounge-%1$s-header .header-col .main-menu > li:hover > a > span, 
							.businesslounge-%1$s-header .header-col .main-menu > li.hover > a > span, 
							.businesslounge-%1$s-header .header-col .main-menu > li.current-menu-ancestor > a > span,
							.businesslounge-%1$s-header .header-col .main-menu > li.current-menu-item > a > span,
							.businesslounge-%1$s-header .mobile-menu-button
							{
								background-color: %2$s
							}
							', $skin, ${"nav_item_background_color_active_".$skin} );
				}

				//
				// header-style-2 - header-style-4 padding fix for menu items
				//
				if( empty( ${"nav_item_background_color_active_".$skin} ) && empty( ${"nav_item_background_color_".$skin} ) ){

					$css .= sprintf('

							.header-style-2 .businesslounge-%1$s-header .header-col.left .main-menu > li:first-child > a > span,
							.header-style-4 .businesslounge-%1$s-header .header-col.left .main-menu > li:first-child > a > span
							{
								padding-left: 0;
							}

							.header-style-2 .businesslounge-%1$s-header .header-col.right .main-menu > li:last-child > a > span,
							.header-style-4 .businesslounge-%1$s-header .header-col.right .main-menu > li:last-child > a > span
							{
								padding-right: 0;
							}							
							', $skin );

				}


				//nav_item_font_color_active
				if( ! empty( ${"nav_item_font_color_active_".$skin} ) ){

					$css .= sprintf('

							.businesslounge-%1$s-header .header-col .main-menu > li:hover > a > span, 
							.businesslounge-%1$s-header .header-col .main-menu > li.hover > a > span, 
							.businesslounge-%1$s-header .header-col .main-menu > li.current-menu-ancestor > a > span,
							.businesslounge-%1$s-header .header-col .main-menu > li.current-menu-item > a > span,
							.businesslounge-%1$s-header .businesslounge-language-menu a:hover,
							.businesslounge-%1$s-header .businesslounge-search-button:hover
							{
								color: %2$s
							}
							', $skin, ${"nav_item_font_color_active_".$skin} );
				}



				//nav_item_indicator_color_active_
				if( ! empty( ${"nav_item_indicator_color_active_".$skin} ) ){

					$css .= sprintf('

							.businesslounge-%1$s-header .header-col .main-menu > li:hover > a > span:after,
							.businesslounge-%1$s-header .header-col .main-menu > li.hover > a > span:after,
							.businesslounge-%1$s-header .header-col .main-menu > li.current-menu-ancestor > a > span:after,
							.businesslounge-%1$s-header .header-col .main-menu > li.current-menu-item > a > span:after
							{
								color: %2$s
							}

							.businesslounge-%1$s-header .businesslounge-cart-menu-button .businesslounge-cart-items
							{
								background-color: %2$s
							}

							', $skin, ${"nav_item_indicator_color_active_".$skin} );

				}




				//sub_nav_item_background_color
				if( ! empty( ${"sub_nav_item_background_color_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu > li li
							{
								background-color: %2$s
							}
							', $skin, ${"sub_nav_item_background_color_".$skin} );
				}

				//sub_nav_item_font_color
				if( ! empty( ${"sub_nav_item_font_color_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu > li li > a,
							.businesslounge-%1$s-header .header-col .main-menu .multicolumn-holder li > ul > li.menu-item-has-children > span,
							.businesslounge-%1$s-header .header-col .main-menu li li:before,
							.businesslounge-%1$s-header .header-col .main-menu li li:after
							{
								color: %2$s
							}
							', $skin, ${"sub_nav_item_font_color_".$skin} );
				}

				//sub_nav_item_desc_font_color
				if( ! empty( ${"sub_nav_item_desc_font_color_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu ul li > a > sub,
							.businesslounge-%1$s-header .header-col .main-menu .multicolumn-holder li > .sub-menu ul ul a
							{
								color: %2$s
							}
							', $skin, ${"sub_nav_item_desc_font_color_".$skin} );
				}

				//sub_nav_item_border_color
				if( ! empty( ${"sub_nav_item_border_color_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu > li li > a,
							.businesslounge-%1$s-header .header-col .main-menu .multicolumn-holder *,
							.businesslounge-%1$s-header .header-col .main-menu > li ul,
							.businesslounge-%1$s-header .header-col .main-menu > li li.menu-item-has-children > a:after{
								border-color: %2$s
							}
							', $skin, ${"sub_nav_item_border_color_".$skin} );
				}

				//sub_nav_item_background_color_active
				if( ! empty( ${"sub_nav_item_background_color_active_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu > li:not(.multicolumn) li:hover > a,
							.businesslounge-%1$s-header .header-col .main-menu > li:not(.multicolumn) li.hover > a,
							.businesslounge-%1$s-header .header-col .main-menu > li li a:hover,
							.businesslounge-%1$s-header .header-col .main-menu > li li.current-menu-ancestor > a,
							.businesslounge-%1$s-header .header-col .main-menu > li li.current-menu-item > a
							{
								background-color: %2$s
							}
							', $skin, ${"sub_nav_item_background_color_active_".$skin} );
				}

				//nav_item_font_color_active
				if( ! empty( ${"sub_nav_item_font_color_active_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu > li:not(.multicolumn) li:hover > a,
							.businesslounge-%1$s-header .header-col .main-menu > li:not(.multicolumn) li.hover > a,
							.businesslounge-%1$s-header .header-col .main-menu > li li a:hover,
							.businesslounge-%1$s-header .header-col .main-menu > li li.current-menu-ancestor > a,
							.businesslounge-%1$s-header .header-col .main-menu > li li.current-menu-item > a
							{
								color: %2$s
							}
							', $skin, ${"sub_nav_item_font_color_active_".$skin} );
				}


				//sub_nav_item_desc_font_color
				if( ! empty( ${"sub_nav_item_desc_font_color_".$skin} ) ){

					$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu ul li a > span
							{
								color: %2$s
							}
							', $skin, ${"sub_nav_item_desc_font_color_".$skin}    );
				}

				//sub_nav_item_indicator_color_active
				if( ! empty( ${"sub_nav_item_indicator_color_active_".$skin} ) ){

						$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu > li li.current-menu-ancestor:after,
							.businesslounge-%1$s-header .header-col .main-menu > li li.current-menu-item:after,
							.businesslounge-%1$s-header .header-col .main-menu > li li:hover:after,
							.businesslounge-%1$s-header .header-col .main-menu > li li.hover:after,
							.businesslounge-%1$s-header .header-col .main-menu ul li:hover > a:before
							.businesslounge-%1$s-header .header-col .main-menu ul li.hover > a:before
							{
								color: %2$s;
							}
							', $skin, ${"sub_nav_item_indicator_color_active_".$skin} );
				}


				//ava_mega_title_item_font_color
				if( ! empty( ${"mega_title_item_font_color_".$skin} ) ){

						$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu .multicolumn-holder li > ul > li.menu-item-has-children > a,
							.businesslounge-%1$s-header .header-col .main-menu .multicolumn-holder li > ul > li.menu-item-has-children > a:hover,
							.businesslounge-%1$s-header .header-col .main-menu .multicolumn-holder li > ul > li.menu-item-has-children > span
							{
								color: %2$s;
								background-color: transparent;
							}
							', $skin, ${"mega_title_item_font_color_".$skin} );
				}

				//ava_mega_title_item_border_color
				if( ! empty( ${"mega_title_item_border_color_".$skin} ) ){

						$css .= sprintf('
							.businesslounge-%1$s-header .header-col .main-menu .multicolumn-holder li > ul > li.menu-item-has-children > a,
							.businesslounge-%1$s-header .header-col .main-menu .multicolumn-holder li > ul > li.menu-item-has-children > span
							{
								border-color: %2$s;
							}
							', $skin, ${"mega_title_item_border_color_".$skin} );
				}

  		}


		/**
		 * Mobile Navigation
		 */


		//mobile_nav_item_background_color
		if( ! empty( $mobile_nav_item_background_color ) ){

			$css .= sprintf('
					#mobile-navigation li a,
					#mobile-navigation li span
					{
						background-color: %1$s !important;
					}
					', $mobile_nav_item_background_color );
		}

		//mobile_nav_item_font_color
		if( ! empty( $mobile_nav_item_font_color ) ){

			$css .= sprintf('
					#mobile-navigation li a,
					#mobile-navigation li span
					{
						color: %1$s !important;
					}
					', $mobile_nav_item_font_color );
		}

		//mobile_nav_item_desc_font_color
		if( ! empty( $mobile_nav_item_desc_font_color ) ){

			$css .= sprintf('
					#mobile-navigation li > a > span{
						color: %1$s
					}
					', $mobile_nav_item_desc_font_color );
		}

		//mobile_nav_item_border_color
		if( ! empty( $mobile_nav_item_border_color ) ){

			$css .= sprintf('
					#mobile-navigation li a,
					#mobile-navigation li span,
					#mobile-navigation li a:after,
					#mobile-navigation li span:after,
					#mobile-navigation
					{
						border-color: %1$s !important;
					}
					', $mobile_nav_item_border_color );
		}

		//mobile_nav_item_font_color_active
		if( ! empty( $mobile_nav_item_font_color_active ) ){

			$css .= sprintf('
					#mobile-navigation li.current-menu-ancestor > a,
					#mobile-navigation li.current-menu-item > a,
					#mobile-navigation li.current-menu-ancestor > a > span,
					#mobile-navigation li.current-menu-item > a > span
					{
						color: %1$s !important;
					}
					', $mobile_nav_item_font_color_active );
		}


		/**
		 * Overlapped Header 
		 */


		/**
		 * Overlapped Header 
		 */
		$css .= sprintf('
					@media screen and (min-width : 1025px){
						/* main content top margin */
						.header-style-1.overlapped-header #main_content{
							margin-top: calc( -1 * %2$spx - 6px );
						}

						.header-style-1:not(.overlapped-header) #main_content{
							margin-top: -6px;
						}

						.header-style-2.overlapped-header #main_content{
							margin-top: calc( -1 * %2$spx ); 
						}

						.header-style-3.overlapped-header #main_content, 
						.header-style-4.overlapped-header #main_content{
							margin-top: calc( -1 * %1$spx ); 
						}

						//main carousel fixes
						.header-style-1.overlapped-header .main-carousel .slide-content,
						.header-style-2.overlapped-header .main-carousel .slide-content{
							top: calc( 50%% + ( %2$spx / 2 ) );
						}

						.header-style-3.overlapped-header .main-carousel .slide-content,
						.header-style-4.overlapped-header .main-carousel .slide-content{
							top: calc( 50%% + ( %1$spx / 2 ) );
						}

					}
				',
					$header_height_first,
					$header_height_second
				);
 

		/**
		 * Sub Header
		 */


		//sub header height
		$css .= sprintf('
				@media screen and (min-width : 1025px){
					/* Header Style 1 -2 */
					.header-style-1.overlapped-header .sub_page_header, 
					.header-style-2.overlapped-header .sub_page_header{
						padding-top: %1$spx;
					}

					/* Header Style 3-4 */
					.header-style-3.overlapped-header .sub_page_header,
					.header-style-4.overlapped-header .sub_page_header{
						padding-top: %2$spx;
					} 

					body:not(.overlapped-header) .sub_page_header{
						padding-top: %3$spx
					}
					.sub_page_header{
						padding-bottom: %4$spx;
					}
				}
				',
				 $header_height_second + (int) rtframework_get_setting("header_row_top_padding"),
				 $header_height_first + (int) rtframework_get_setting("header_row_top_padding"), 
				 (int) rtframework_get_setting("header_row_top_padding"),
				 (int) rtframework_get_setting("header_row_bottom_padding")
				);



		//header_row_font_color
		if( rtframework_get_setting("header_row_font_color") != "" ){
			$css .= sprintf('
					.sub_page_header h1{
						color: %1$s;
					}
					', rtframework_get_setting("header_row_font_color") );
		}


		//breadcrumb_font_color
		if( rtframework_get_setting("breadcrumb_font_color") != "" ){
			$css .= sprintf('
					.breadcrumb, .breadcrumb span:before{
						color: %1$s;
					}
					', rtframework_get_setting("breadcrumb_font_color") );
		}

		//breadcrumb_link_color
		if( rtframework_get_setting("breadcrumb_link_color") != "" ){
			$css .= sprintf('
					.breadcrumb a, .breadcrumb a:before{
						color: %1$s;
					}
					', rtframework_get_setting("breadcrumb_link_color") );
		}

		//breadcrumb_bg_color
		if( rtframework_get_setting("breadcrumb_bg_color") != "" ){
			$css .= sprintf('
					.breadcrumb{
						background-color: %1$s;
					}
					', rtframework_get_setting("breadcrumb_bg_color") );
		}


	 	return $css;
	}
}



if( ! function_exists("rtframework_create_fonts_css") ){
	/**
	 * Create font family css
	 */
	function rtframework_create_fonts_css(){

		global $rtframework_selected_font_families;
	
		$rtframework_selected_font_families=array(
			"heading" => "",
			"body" => "",
			"secondary" => "",
			"menu" => "",
			"sub_menu" => ""
		);

		$selected_fonts = rtframework_get_selected_fonts_list();

		$css = "";

		//get custom fonts
		$custom_fonts = get_option( "businesslounge_custom_fonts" );

		if( ! empty( $custom_fonts ) ){
			//create css source for custom fonts
			$custom_fonts = unserialize(get_option( "businesslounge_custom_fonts" ));

			foreach( $custom_fonts as $key => $custom_font ) {

				if( $custom_font["font-type"] != "self-hosted" ){
					continue;
				}

				$css .= sprintf('
					@font-face {
						font-family: "%6$s";
						src: url("%1$s");
						src: url("%1$s?#iefix") format("embedded-opentype"),
							  url("%2$s") format("woff2"),
							  url("%3$s") format("woff"),
							  url("%4$s") format("truetype"),
							  url("%5$s#%6$s") format("svg");
						font-weight: normal;
						font-style: normal;
					}
				',
				$custom_font["eot"],
				$custom_font["woff2"],
				$custom_font["woff"],
				$custom_font["ttf"],
				$custom_font["svg"],
				$custom_font["family_name"]
				);
			}
		}


		//create css outputs
		foreach( $selected_fonts as $purpose => $data ) {

			if( !isset( $data ) || ! isset( $data["family"] ) ){
				continue;
			}

			//family name
			$family = explode(",", $data["family"] );

			array_walk($family, function(&$value){
				$value = '"'.$value.'"';
			});

			$family = implode( ",", $family );

			$style = preg_replace("/\d/i", "", $data["variant"] );
			$style = ! empty( $style ) ? 'font-style: '.$style.';' : 'font-style: normal;';
			$style = str_replace("regular", "normal", $style);

			$weight = preg_replace("/\D/i", "", $data["variant"]);
			$weight = ! empty( $weight ) ? 'font-weight: '.$weight.';' : 'font-weight: normal;';

			$rendering = "";

			//heading
			if( $purpose == "heading" && ! empty( $data ) ){

				$rtframework_selected_font_families["heading"] = trim("font-family:".$family."; ".$weight." ".$style);

				$css .= sprintf('
						h1,
						h2,
						h3,
						h4,
						h5,
						h6,
						.testimonial .client_info,
						.button_,
						.toggle-title,
						.tab_title,
						.pricing_table .title, 
						.author-title,
						.blog_list > article .more-link,
						.sitename,
						.read_more,
						.filter_navigation,
						.testimonial .quote,
						#businesslounge-side-navigation > li a,
						.businesslounge-language-list,
						.businesslounge-post-navigation,
						.overlay-text > span,
						.rt-pie-chart span.percent,
						.timeline.style-2 .year,
						.post_data,
						.author-name,
						.paging_wrapper,
						.woocommerce div.product span.price,
						.woocommerce div.product p.price,
						.woocommerce ul.products li.product .button,
						.rt-countdown > i,
						.single_add_to_cart_button,
						.post_data a,
						.text-navigation-wrapper
						{
							font-family: %1$s; %2$s %3$s %4$s
						}
						', $family, $weight, $style, $rendering );


				$css .= sprintf('
						body .heading-font, body .heading-font *
						{
							font-family: %1$s; %2$s %3$s %4$s;
						}
						', $family, str_replace(";", " !important;", $weight), str_replace(";", " !important;", $style), $rendering );

			}

			//body
			if( $purpose == "body" && ! empty( $data ) ){

				$rtframework_selected_font_families["body"] = trim("font-family:".$family."; ".$weight." ".$style);

				$css .= sprintf('
						body{
							font-family: %1$s; %2$s %3$s %4$s
						}
						', $family, $weight, $style, $rendering );

				$css .= sprintf('
						body .body-font, body .body-font *
						{
							font-family: %1$s; %2$s %3$s %4$s;
						}
						', $family, str_replace(";", " !important;", $weight), str_replace(";", " !important;", $style), $rendering );
			}

			//secondary font
			if( $purpose == "secondary" && ! empty( $data ) ){

				$rtframework_selected_font_families["secondary"] = trim("font-family:".$family."; ".$weight." ".$style);

				$css .= sprintf('
						h1 em,
						h2 em,
						h3 em,
						h4 em,
						h5 em,
						h6 em,
						.rt-heading em,
						.post_data,
						.testimonial p
						{
							font-family: %1$s; %2$s %3$s %4$s
						}
						', $family, $weight, $style, $rendering );

				$css .= sprintf('
						body .secondary-font, body .secondary-font *
						{
							font-family: %1$s; %2$s %3$s %4$s !important;
						}
						', $family, $weight, $style, $rendering );

			}

			//menu
			if( $purpose == "menu" && ! empty( $data ) ){

				$rtframework_selected_font_families["menu"] = trim("font-family:".$family."; ".$weight." ".$style);

				$css .= sprintf('
							.header-col .main-menu > li > a,
							.businesslounge-language-menu a,
							.businesslounge-search-button a,
							#mobile-navigation
							{
								font-family: %1$s; %2$s %3$s %4$s
							}
						', $family, $weight, $style, $rendering );


				$css .= sprintf('
						.menu-font, .menu-font *
						{
							font-family: %1$s !important; %2$s %3$s;
						}
						', $family, str_replace(";", " !important;", $weight), str_replace(";", " !important;", $style) );

			}


			//sub_menu
			if( $purpose == "sub_menu" && ! empty( $data ) ){

				$rtframework_selected_font_families["sub_menu"] = trim("font-family:".$family."; ".$weight." ".$style);

				$css .= sprintf('
							.header-col .main-menu ul li{
								font-family: %1$s; %2$s %3$s %4$s
							}
						', $family, $weight, $style, $rendering );

			}


		}

	 	return $css;
	}
}

if( ! function_exists("rtframework_create_font_size_css") ){
	/**
	 * Create font size css
	 */
	function rtframework_create_font_size_css(){
		global $rtframework_selected_font_families;

		$css = '';

		//selected fonts
		$selectors = array(
						"h1" => rtframework_get_setting( 'h1_font_size' ),
						"h2" => rtframework_get_setting( 'h2_font_size' ),
						"h3" => rtframework_get_setting( 'h3_font_size' ),
						"h4" => rtframework_get_setting( 'h4_font_size' ),
						"h5" => rtframework_get_setting( 'h5_font_size' ),
						"h6" => rtframework_get_setting( 'h6_font_size' ),
						"menu_font_size" => rtframework_get_setting( 'menu_font_size' ),
						"menu_sub_font_size" => rtframework_get_setting( 'menu_sub_font_size' ),
						"mobile_menu_font_size" => rtframework_get_setting( 'mobile_menu_font_size' ),
						"mobile_menu_sub_font_size" => rtframework_get_setting( 'mobile_menu_sub_font_size' ),
						"body_font_size" => rtframework_get_setting( 'body_font_size' ),
						"page_heading_font_size" => rtframework_get_setting( 'page_heading_font_size' ),
						"breadcrumb_font_size" => rtframework_get_setting( 'breadcrumb_font_size' ),
						"footer_heading_font_size" => rtframework_get_setting( 'footer_heading_font_size' ),
						"sidebar_widget_heading_font_size" => rtframework_get_setting( 'sidebar_widget_heading_font_size' ),
						"sidepanel_widget_heading_font_size" => rtframework_get_setting( 'sidepanel_widget_heading_font_size' ),
						"sidepanel_menu_font_size" => rtframework_get_setting( 'sidepanel_menu_font_size' ),
						"sidepanel_font_size" => rtframework_get_setting( 'sidepanel_font_size' ), 
						"news_heading_size" => rtframework_get_setting( 'news_heading_size' ),						
						"blog_title_font_size" => rtframework_get_setting( 'blog_title_font_size' )
					);


		//create css outputs
		foreach( $selectors as $key => $value) {

			//heading 1
			if( $key == "h1" && ! empty( $value ) ){

				$css .= sprintf('
						h1{
							font-size: %1$spx
						}
						', $value );
			}

	 		//heading 2
			elseif( $key == "h2" && ! empty( $value ) ){

				$css .= sprintf('
						h2, .single-product .head_text h1{
							font-size: %1$spx
						}
						', $value );
			}


	 		//heading 3
			elseif( $key == "h3" && ! empty( $value ) ){

				$css .= sprintf('
						h3{
							font-size: %1$spx
						}
						', $value );
			}

	 		//heading 4
			elseif( $key == "h4" && ! empty( $value ) ){

				$css .= sprintf('
						h4{
							font-size: %1$spx
						}
						', $value );
			}

	 		//heading 5
			elseif( $key == "h5" && ! empty( $value ) ){

				$css .= sprintf('
						h5, .wpb_content_element .widgettitle, .wpb_content_element  h2.wpb_heading{
							font-size: %1$spx
						}
						', $value );
			}

	 		//heading 6
			elseif( $key == "h6" && ! empty( $value ) ){

				$css .= sprintf('
						h6{
							font-size: %1$spx
						}
						', $value );
			}


	 		//sidebar widget heading font size
			elseif( $key == "sidebar_widget_heading_font_size" && ! empty( $value ) ){

				$css .= sprintf('
						.sidebar .widget h5{
							font-size: %1$spx
						}
						', $value );
			}

	 		//footer widget heading font size
			elseif( $key == "footer_heading_font_size" && ! empty( $value ) ){

				$css .= sprintf('
						.footer_widgets .widget h5{
							font-size: %1$spx
						}
						', $value );
			}

	 		//body font size
			elseif( $key == "body_font_size" && ! empty( $value ) ){

				$css .= sprintf('
						body{
							font-size: %1$spx;
						}
						', $value );

			}

	 		//menu font size
			elseif( $key == "menu_font_size" && ! empty( $value ) ){

				$css .= sprintf('
						.header-col .main-menu > li > a,
						.businesslounge-language-menu a
						{
							font-size: %1$spx;
						}
						', $value, $value*3 );
			}

	 		//sub menu font size
			elseif( $key == "menu_sub_font_size" && ! empty( $value ) ){

				$css .= sprintf('
						.header-col .main-menu > li,
						.header-col .main-menu > li li,
						.header-col .main-menu .multicolumn
						{
							font-size: %1$spx;
						}
						', $value );
			}

	 		//mobile menu font size
			elseif( $key == "mobile_menu_font_size" && ! empty( $value ) ){

				$css .= sprintf('
						#mobile-navigation > li > a{
							font-size: %1$spx;
						}
						', $value );
			}

	 		//mobile sub menu font size
			elseif( $key == "mobile_menu_sub_font_size" && ! empty( $value ) ){

				$css .= sprintf('
						#mobile-navigation > li li > a{
							font-size: %1$spx;
						}
						', $value );
			}

	 		//page heading font size
			elseif( $key == "page_heading_font_size" && ! empty( $value ) ){

				$css .= sprintf('
						.sub_page_header .page-title h1{
							font-size: %1$s;
							line-height: %2$s;
						}
						', rtframework_check_unit($value), rtframework_check_unit( intval( $value ) + 10) );

				//breadcrumb line height fix,
				$css .= sprintf('
						.style-1 .breadcrumb{
							line-height: %1$s;
						}
						', rtframework_check_unit( intval( $value ) + 10) );

			}

	 		//breadcrumb menu font size
			elseif( $key == "breadcrumb_font_size" && ! empty( $value ) ){

				$css .= sprintf('
						.breadcrumb{
							font-size: %1$spx;
						}
						', $value );
			}


	 		//sidepanel_widget_heading_font_size
			elseif( $key == "sidepanel_widget_heading_font_size" && ! empty( $value ) ){


				$css .= sprintf('
						.side-panel-contents .widgettitle, .side-panel-contents .widget h5
						{
							font-size: %1$spx;
						}
						', $value );

			}

	 		//sidepanel_menu_font_size
			elseif( $key == "sidepanel_menu_font_size" && ! empty( $value ) ){


				$css .= sprintf('
						#businesslounge-side-navigation li a
						{
							font-size: %1$spx;
						}
						', $value );

			}

	 		//sidepanel_font_size
			elseif( $key == "sidepanel_font_size" && ! empty( $value ) ){


				$css .= sprintf('
						.side-panel-contents
						{
							font-size: %1$spx;
						}
						', $value );

			}

	 		//blog_title_font_size
			elseif( $key == "blog_title_font_size" && ! empty( $value ) ){

				$css .= sprintf('
						.blog_list h1.entry-title, .blog_list h2.entry-title
						{
							font-size: %1$spx;
						}
						', $value );

			}

		}


		//Top bar
		$top_bar_font = ( $top_bar_font = rtframework_get_setting( 'top_bar_font' ) ) ? $top_bar_font : "menu" ;
		$top_bar_font_size = ( $top_bar_font_size = rtframework_get_setting( 'top_bar_font_size' ) ) ? $top_bar_font_size : 12 ;

		$css .= sprintf('
				.businesslounge-top-bar{
					%1$s
					font-size: %2$spx;
				} 

				.businesslounge-top-bar .widget *{
					font-size: %2$spx;
				}
				', $rtframework_selected_font_families[$top_bar_font], $top_bar_font_size );
 


		//header widgets bar
		$header_widgets_font = ( $header_widgets_font = rtframework_get_setting( 'header_widgets_font' ) ) ? $header_widgets_font : "menu" ;
		$header_widgets_font_size = ( $header_widgets_font_size = rtframework_get_setting( 'header_widgets_font_size' ) ) ? $header_widgets_font_size : 12 ;

		$css .= sprintf('
				.header-row .widget *{
					%1$s
					font-size: %2$spx;
				} 
				', $rtframework_selected_font_families[$header_widgets_font], $header_widgets_font_size );

	 	return $css;
	}
}


if( ! function_exists("rtframework_create_color_schema_css") ){
	/**
	 *  Create background set
	 */
	function rtframework_create_color_schema_css(){
		global $rtframework_grouped_selectors, $rtframework_sections;

			$css = '';

			foreach ($rtframework_sections as $section_id => $section_selector) {


				//link colors
				if ( $rtframework_grouped_selectors["link-font-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["link-font-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_link_color") );
				}

				//background colors
				if ( $rtframework_grouped_selectors["bg-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["bg-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_bg_color") );				
				}

				if ( $rtframework_grouped_selectors["bg-color-as-border-color"]["selectors"] != "" ){
						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["bg-color-as-border-color"]["selectors"] ) .'{
							border-color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_bg_color") );
				}

				//column bg color
				if ( $rtframework_grouped_selectors["item-bg-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["item-bg-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_item_bg_color") );
				}

	 			//font colors
				if ( $rtframework_grouped_selectors["font-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["font-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_font_color") );

						//css variable for text color
						$css .= sprintf(
						'
						:root %1$s{
							--font-color:%2$s;
						}
						', $section_selector, rtframework_get_setting($section_id."_font_color") );


						//form placeholders
						$css .= sprintf(

						'
						/* do not group these rules */
						%1$s *::-webkit-input-placeholder {
						  color:%2$s;
						  opacity:1;
						}
						%1$s *:-moz-placeholder {
						    /* FF 4-18 */
						   color:%2$s;
						   opacity:1;
						}
						%1$s *::-moz-placeholder {
						    /* FF 19+ */
						   color:%2$s;
						   opacity:1;
						}
						%1$s *:-ms-input-placeholder {
						    /* IE 10+ */
						    color:%2$s;
						    opacity:1;
						}

						', $section_selector, rtframework_get_setting($section_id."_secondary_font_color") );
				}

	 			//boder colors
				if ( $rtframework_grouped_selectors["border-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["border-color"]["selectors"] ) .'{
							border-color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_border_color") );
				}

				if ( $rtframework_grouped_selectors["border-color-as-font-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["border-color-as-font-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_border_color") );
				}

				if ( $rtframework_grouped_selectors["border-color-as-background-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["border-color-as-background-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_border_color") );
				}

				//font colors
				if ( $rtframework_grouped_selectors["secondary-font-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["secondary-font-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_secondary_font_color") );
				}

	 			//primary colors
				if ( $rtframework_grouped_selectors["primary-color-as-font-color"]["selectors"] != "" ){
						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["primary-color-as-font-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_primary_color") );


						//css variable for primary color
						$css .= sprintf(
						'
						:root %1$s{
							--primary-color:%2$s;
						}
						', $section_selector, rtframework_get_setting($section_id."_primary_color") );

				}

				if ( $rtframework_grouped_selectors["primary-color-as-background-color"]["selectors"] != "" ){
						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["primary-color-as-background-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_primary_color") );
				}

				if ( $rtframework_grouped_selectors["primary-color-as-border-color"]["selectors"] != "" ){
						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["primary-color-as-border-color"]["selectors"] ) .'{
							border-color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_primary_color") );


						//svg stroke color
						$css .= sprintf(
						'
						%1$s .product svg *{
							stroke: %2$s;
						}


						', $section_selector, rtframework_get_setting($section_id."_primary_color") );

				}

				//light text colors
				if ( $rtframework_grouped_selectors["light-text-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["light-text-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_light_text_color") );
				}

				//heading colors
				if ( $rtframework_grouped_selectors["heading-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["heading-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_heading_color") );

						//css variable for text color
						$css .= sprintf(
						'
						:root %1$s{
							--heading-color:%2$s;
						}
						', $section_selector, rtframework_get_setting($section_id."_heading_color") );		

				}

				if ( $rtframework_grouped_selectors["form-button-bg-color"]["selectors"] != "" ){
						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["form-button-bg-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_form_button_bg_color") );
				}

	  			//social media bg colors
				if ( $rtframework_grouped_selectors["social-media-bg-color"]["selectors"] != "" ){

						$css .= sprintf( rtframework_create_selector_format($rtframework_grouped_selectors["social-media-bg-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, rtframework_get_setting($section_id."_social_media_bg_color") );
				}

			}

			//selectors that outside of the rows
			$css .= sprintf('
					body .select2-dropdown,
					.select2-container--default .select2-selection--single
					{	
						border-color:%1$s; 
					}
				', rtframework_get_setting("default_border_color") );


			return $css;
	}
}

if( ! function_exists("rtframework_create_background_css") ){
	/**
	 * Create background css
	 * @param  array  $background_options
	 * @param  string $container
	 * @return $css
	 */
	function rtframework_create_background_css( $background_options = array(), $container = "", $media_query = "" ){

			$css = '';

			extract(shortcode_atts(array(
				"background_color" => "",
				"background_image_url" => "",
				"background_attachment" => "scroll",
				"background_position" => "",
				"background_repeat" => "",
				"background_size" => "",
			), $background_options ) );

			//get the image url
			$background_image_url = ! empty ( $background_image_url ) && is_numeric( $background_image_url ) ? wp_get_attachment_image_src( $background_image_url, "full" ) : $background_image_url ;
			$background_image_url = is_array( $background_image_url ) ? $background_image_url[0] : $background_image_url;


			//media query
			$css .= ! empty( $media_query ) ? $media_query."{" : "";

			// background color
			$css .= ! empty( $background_color ) ? sprintf('
						%2$s{
							background-color: %1$s;
						}
			',
					$background_color,  // font color
					$container //container selector

			) : "" ;



			// fix background position for wp-admin bar
			if( $container == "#container" || $container =="#left_side" || $container ==".left-side-background" || $container == "#right_side" ){
				if( $background_position == "right top" || $background_position == "left top" || $background_position == "center top" ){
					$css .= ! empty( $background_position ) ? sprintf('

							.admin-bar %3$s{
								background-position: %1$s;
							}

							.mobile_device.admin-bar %3$s{
								background-position: %2$s;
							}

					',
							str_replace("top", "32px", $background_position),
							str_replace("top", "46px", $background_position),
							$container

					) : "" ;

				}
			}

			// background image
			$css .= ! empty( $background_image_url ) ? sprintf('

					%6$s{
						background-image: url( %1$s );
						background-attachment: %2$s;
						background-position: %3$s;
						background-repeat: %4$s;
						background-size: %5$s;
						-webkit-background-size: %5$s;
						-moz-background-size: %5$s;
						-o-background-size: %5$s;
					}

					.mobile_device %6$s{
						-webkit-background-size: auto 100%;
						-moz-background-size: auto;
						-o-background-size: auto;
					}

			',
					$background_image_url,  // image_url  - 1
					$background_attachment,  // attachment - 2
					$background_position,  // position - 3
					$background_repeat,  // repeat - 4
					$background_size,  // size - 5
					$container //container selector - 6

			) : "" ;


			//background color set - no background image
			$css .= empty( $background_image_url ) && ! empty( $background_color ) ? $container .'{background-image:none;}' : "";

			//media query
			$css .= ! empty( $media_query ) ? "}" : "";

			return $css;
	}
}

if( ! function_exists("rtframework_create_selector_format") ){
	/**
	 * add %1$s to each selector in string seperated by comma
	 * @return string $selector_format
	 */
	function rtframework_create_selector_format( $selectors = "" ){
			$selector_format = explode(",", $selectors );

			array_walk($selector_format, function(&$value){
				return strpos($value,"[row-selector]") == 0 ? $value = '%1$s '.$value : $value;
			});

			$selector_format = implode( ",", $selector_format );

			$selector_format = str_replace("[row-selector]", '%1$s', $selector_format);

			return $selector_format;
	}
}

if( ! function_exists("rtframework_create_css_for_customizer") ){
	/**
	 * create css output for live customizer
	 * @return output
	 */
	function rtframework_create_css_for_customizer(){

	global $wp_customize;
	if ( ! isset( $wp_customize ) ) {
		return ;
	}


	global $rtframework_grouped_selectors, $rtframework_sections;

		$css = '';

 		/**
 		 * do for all content rows
 		 */
		foreach ($rtframework_sections as $section_id => $section_selector) {


			//link colors
			if ( $rtframework_grouped_selectors["link-font-color"]["selectors"] != "" ){
					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["link-font-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_link_color", "color" );
			}

			//background colors
			if ( $rtframework_grouped_selectors["bg-color"]["selectors"] != "" ){
					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["bg-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_bg_color", "background-color" );
			}

			if ( $rtframework_grouped_selectors["bg-color-as-border-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["bg-color-as-border-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_bg_color" , "border-color");
			}

			//column background colors
			if ( $rtframework_grouped_selectors["item-bg-color"]["selectors"] != "" ){
					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["item-bg-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_item_bg_color", "background-color" );
			}

 			//font colors
			if ( $rtframework_grouped_selectors["font-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["font-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_font_color", "color" );
			}

 			//boder colors

			if ( $rtframework_grouped_selectors["border-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["border-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_border_color", "border-color" );
			}

			if ( $rtframework_grouped_selectors["border-color-as-font-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["border-color-as-font-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_border_color", "color" );
			}

			if ( $rtframework_grouped_selectors["border-color-as-background-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["border-color-as-background-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_border_color", "background-color" );
			}

			//font colors
			if ( $rtframework_grouped_selectors["secondary-font-color"]["selectors"] != "" ){
					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["secondary-font-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_secondary_font_color", "color" );
			}

 			//primary colors
			if ( $rtframework_grouped_selectors["primary-color-as-font-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["primary-color-as-font-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_primary_color", "color" );
			}

			if ( $rtframework_grouped_selectors["primary-color-as-background-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["primary-color-as-background-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_primary_color", "background-color" );
			}

			if ( $rtframework_grouped_selectors["primary-color-as-border-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["primary-color-as-border-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_primary_color", "border-color" );
			}

			//light text colors
			if ( $rtframework_grouped_selectors["light-text-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["light-text-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_light_text_color", "color" );
			}

			//heading colors
			if ( $rtframework_grouped_selectors["heading-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["heading-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_heading_color", "color" );
			}

			//form button bg colors
			if ( $rtframework_grouped_selectors["form-button-bg-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["form-button-bg-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_form_button_bg_color", "background-color" );
			}

  			//social media bg colors
			if ( $rtframework_grouped_selectors["social-media-bg-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.rtframework_create_selector_format($rtframework_grouped_selectors["social-media-bg-color"]["selectors"] ) .'{ }</style>', $section_selector, "businesslounge_".$section_id."_social_media_bg_color", "background-color" );

			}

		}

 		/**
 		 * breadcrumb menus
 		 */
			//background colors
			$css .= sprintf( '<style data-id="%1$s" data-color-for="%2$s">.breadcrumb, .breadcrumb span:before{ }</style>', "businesslounge_breadcrumb_font_color", "color" );


			//breadcrumb_link_color
			$css .= sprintf( '<style data-id="%1$s" data-color-for="%2$s">.breadcrumb a, .breadcrumb a:before{ }</style>', "businesslounge_breadcrumb_link_color", "color" );


		/**
		 * create css output
		 */
		$css = preg_replace('#/\*.*?\*/#s', '', $css);
		// Remove whitespace
		$css = preg_replace('/\s*([{}|:;,])\s+/', '$1', $css);
		// Remove trailing whitespace at the start
		$css = preg_replace('/\s\s+(.*)/', '$1', $css);
		// Remove unnecesairy ;'s
		$css = str_replace(';}', '}', $css);
		//Remove the tabs
		$css = str_replace("\t", "", $css);

		echo ! empty( $css ) ? $css : "";//dynamic css output

	}
}
add_action( 'wp_head', 'rtframework_create_css_for_customizer' );
?>