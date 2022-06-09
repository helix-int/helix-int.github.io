/*!
 * businesslounge WordPress Theme - Customizer
 * Copyright (C) 2014 RT-Themes
 * http://rtthemes.com
 *
 */

( function( $ ) {

	
	$.fn.rt_css_replace = function( css )
	{ 

		var search = new RegExp('\{(.*?)\}', 'g'),
			new_css = $(this).text().replace(search, "{"+css+"}");

			$(this).text( new_css );
	};



	/**
	 * content rows css replacer
	 */
	$.fn.runs = function( container )
	{  

		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_link_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_link_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} );

		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_bg_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_bg_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} );

		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_item_bg_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_item_bg_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} );

		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_font_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_font_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} );


		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_primary_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_primary_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} );

		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_border_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_border_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} );


		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_secondary_font_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_secondary_font_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} );


		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_light_text_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_light_text_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} );


		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_heading_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_heading_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} );

		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_form_button_bg_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_form_button_bg_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} ); 


		wp.customize(rtframework_params["theme_slug"]+'_'+ container +'_social_media_bg_color', function( value ) {
			value.bind( function( to ) {   
				$('[data-id="'+rtframework_params["theme_slug"]+'_'+ container +'_social_media_bg_color"]').each(function(){
					$(this).rt_css_replace($(this).attr("data-color-for")+":"+to);
				});
			} );
		} );						 

	};
	
	containers = ["default","alt_style_1","light_style","footer","side_panel"]; 

	for (i = 0; i < containers.length; i++) { 
		$.fn.runs( containers[i] );
	};




	wp.customize(rtframework_params["theme_slug"]+'_breadcrumb_font_color', function( value ) {
		value.bind( function( to ) {   
			$('[data-id="'+rtframework_params["theme_slug"]+'_breadcrumb_font_color"]').each(function(){
				$(this).rt_css_replace( $(this).attr("data-color-for")+":"+to ) ;
			});
		} );
	} );	

	wp.customize(rtframework_params["theme_slug"]+'_breadcrumb_link_color', function( value ) {
		value.bind( function( to ) {   
			$('[data-id="'+rtframework_params["theme_slug"]+'_breadcrumb_link_color"]').each(function(){
				$(this).rt_css_replace( $(this).attr("data-color-for")+":"+to ) ;
			});
		} );
	} );	

	wp.customize(rtframework_params["theme_slug"]+'_breadcrumb_bg_color', function( value ) {
		value.bind( function( to ) {   

			if( ! to ) {
				to = "transparent";
			}

			$('.breadcrumb').css({
				"background-color": to
			});	
		} );
	} );

	wp.customize(rtframework_params["theme_slug"]+'_header_row_font_color', function( value ) {
		value.bind( function( to ) {   

			if( ! to ) {
				to = "transparent";
			}

			$('.sub_page_header h1').css({
				"color": to
			});	
		} );
	} );

	wp.customize(rtframework_params["theme_slug"]+'_header_row_bg_color', function( value ) {
		value.bind( function( to ) {   

			if( ! to ) {
				to = "transparent";
			}

			$('.sub_page_header').css({
				"background-color": to
			});	
		} );
	} );	



	/**
	 * native selectors
	 */
	wp.customize(rtframework_params["theme_slug"]+'_body_background_color', function( value ) {
		value.bind( function( to ) {   

			if( ! to ) {
				to = "transparent";
			}

			$('body').css({
				"background-color": to
			});	
		} );
	} );

	wp.customize(rtframework_params["theme_slug"]+'_holder_background_color', function( value ) {
		value.bind( function( to ) {   

			if( ! to ) {
				to = "transparent";
			}

			$('#container').css({
				"background-color": to
			});	
		} );
	} );



									  	wp.customize(rtframework_params["theme_slug"]+'_nav_item_background_color_dark', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-dark-header .header-col .main-menu > li > a > span').css({
													"background-color": to
												});	
											} );
										} );


									  	wp.customize(rtframework_params["theme_slug"]+'_nav_item_font_color_dark', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-dark-header .header-col .main-menu > li > a > span').css({
													"color": to
												});	
											} );
										} );

									  	wp.customize(rtframework_params["theme_slug"]+'_nav_item_border_color_dark', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-dark-header .header-col .main-menu > li > a > span').css({
													"border-color": to
												});	
											} );
										} );

									  	wp.customize(rtframework_params["theme_slug"]+'_nav_item_background_color_active_dark', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-dark-header .header-col .main-menu> li:hover > a > span, .header-col .main-menu> li a:hover > span, .header-col .main-menu> li.current-menu-ancestor > a > span,.header-col .main-menu> li.current-menu-item > a > span').css({
													"background-color": to
												});	
											} );
										} );


									  	wp.customize(rtframework_params["theme_slug"]+'_nav_item_font_color_active_dark', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-dark-header .header-col .main-menu> li:hover > a > span, .businesslounge-dark-header .header-col .main-menu> li a:hover, .businesslounge-dark-header .header-col .main-menu> li.current-menu-ancestor > a > span,.businesslounge-dark-header .header-col .main-menu> li.current-menu-item > a > span').css({
													"color": to
												});	
											} );
										} );	

									  	wp.customize(rtframework_params["theme_slug"]+'_sub_nav_item_background_color_dark', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-dark-header .header-col .main-menu> li li').css({
													"background-color": to
												});	
											} );
										} );


									  	wp.customize(rtframework_params["theme_slug"]+'_sub_nav_item_font_color_dark', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-dark-header .header-col .main-menu> li li > a').css({
													"color": to
												});	
											} );
										} );

									  	wp.customize(rtframework_params["theme_slug"]+'_sub_nav_item_border_color_dark', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-dark-header .header-col .main-menu> li li > a, .header-col .main-menu> li ul').css({
													"border-color": to
												});	
											} );
										} );

									  	wp.customize(rtframework_params["theme_slug"]+'_sub_nav_item_background_color_active_dark', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-dark-header .header-col .main-menu> li li:hover > a, .businesslounge-dark-header .header-col .main-menu> li li a:hover, .businesslounge-dark-header .header-col .main-menu> li li.current-menu-ancestor > a,.businesslounge-dark-header .header-col .main-menu> li li.current-menu-item > a').css({
													"background-color": to
												});	
											} );
										} );


									  	wp.customize(rtframework_params["theme_slug"]+'_sub_nav_item_font_color_active_dark', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-dark-header .header-col .main-menu> li li:hover > a, .businesslounge-dark-header .header-col .main-menu> li li a:hover, .businesslounge-dark-header .header-col .main-menu> lili.current-menu-ancestor > a,.businesslounge-dark-header .header-col .main-menu> li li.current-menu-item > a').css({
													"color": to
												});	
											} );
										} );	
 



 

									  	wp.customize(rtframework_params["theme_slug"]+'_nav_item_background_color_light', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-light-header .header-col .main-menu> li > a').css({
													"background-color": to
												});	
											} );
										} );


									  	wp.customize(rtframework_params["theme_slug"]+'_nav_item_font_color_light', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-light-header .header-col .main-menu> li > a').css({
													"color": to
												});	
											} );
										} );

									  	wp.customize(rtframework_params["theme_slug"]+'_nav_item_border_color_light', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-light-header .header-col .main-menu> li > a').css({
													"border-color": to
												});	
											} );
										} );

									  	wp.customize(rtframework_params["theme_slug"]+'_nav_item_background_color_active_light', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-light-header .header-col .main-menu> li:hover > a, .header-col .main-menu> li a:hover, .header-col .main-menu> li.current-menu-ancestor > a,.header-col .main-menu> li.current-menu-item > a').css({
													"background-color": to
												});	
											} );
										} );


									  	wp.customize(rtframework_params["theme_slug"]+'_nav_item_font_color_active_light', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-light-header .header-col .main-menu> li:hover > a, .businesslounge-light-header .header-col .main-menu> li a:hover, .businesslounge-light-header .header-col .main-menu> li.current-menu-ancestor > a,.businesslounge-light-header .header-col .main-menu> li.current-menu-item > a').css({
													"color": to
												});	
											} );
										} );	

									  	wp.customize(rtframework_params["theme_slug"]+'_sub_nav_item_background_color_light', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-light-header .header-col .main-menu> li li').css({
													"background-color": to
												});	
											} );
										} );


									  	wp.customize(rtframework_params["theme_slug"]+'_sub_nav_item_font_color_light', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-light-header .header-col .main-menu> li li > a').css({
													"color": to
												});	
											} );
										} );

									  	wp.customize(rtframework_params["theme_slug"]+'_sub_nav_item_border_color_light', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-light-header .header-col .main-menu> li li > a, .header-col .main-menu> li ul').css({
													"border-color": to
												});	
											} );
										} );

									  	wp.customize(rtframework_params["theme_slug"]+'_sub_nav_item_background_color_active_light', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-light-header .header-col .main-menu> li li:hover > a, .businesslounge-light-header .header-col .main-menu> li li a:hover, .businesslounge-light-header .header-col .main-menu> li li.current-menu-ancestor > a,.businesslounge-light-header .header-col .main-menu> li li.current-menu-item > a').css({
													"background-color": to
												});	
											} );
										} );


									  	wp.customize(rtframework_params["theme_slug"]+'_sub_nav_item_font_color_active_light', function( value ) {
											value.bind( function( to ) {   

												if( ! to ) {
													to = "transparent";
												}

												$('.businesslounge-light-header .header-col .main-menu> li li:hover > a, .businesslounge-light-header .header-col .main-menu> li li a:hover, .businesslounge-light-header .header-col .main-menu> lili.current-menu-ancestor > a,.businesslounge-light-header .header-col .main-menu> li li.current-menu-item > a').css({
													"color": to
												});	
											} );
										} );	

} )( jQuery );