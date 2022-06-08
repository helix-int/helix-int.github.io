/*!
 * jQuery RT Parallax Backgrounds
 * Author: RT-Themes
 * Copyright (C) RT-Themes
 */


;(function ( $, window, document, undefined ) {

	/**
	 * Creates a parallax
	 * @class The RT Parallax
	 * @public
	 * @param {Object} [options] - The options
	 */
	function rtprlx(element, options) {

		/**
		 * Current settings
		 * @public
		 */
		this.settings = null;

		/**
		 * Current options set by the caller including defaults.
		 * @public
		 */
		this.options = $.extend({}, rtprlx.Defaults, options);

		/**
		 * Plugin element.
		 * @public
		 */
		this.$element = $(element);

		/**
		 * Check if it is a mobile browser with touch events
		 */
		if( this.istouchDevice() && this.ismobileDevice() ){
			this.$element.show();
			return;
		}

		/**
		 * initialize
		 */
		this.refresh();
		this.initialize();
	}

	/**
	 * Default options for rtprlx
	 * @public
	 */
	rtprlx.Defaults = {
		speed_min : 1.35 // min value for the speed
	};


	/**
	 * Check if touch enabled
	 * @protected
	 */
	rtprlx.prototype.istouchDevice = function() {
		try{ document.createEvent("TouchEvent"); return true; }
		catch(e){ return false; }
	};


	/**
	 * Check if it is a mobile OS
	 * @protected
	 */
 	rtprlx.prototype.ismobileDevice = function() {
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			return true;
		}
 	};


	/**
	 * Initializes rtprlx
	 * @protected
	 */
	rtprlx.prototype.initialize = function() {

		var $this = this;

		$this.win.on("resize refresh-rtprlx",function(){
			$this.refresh();
			$this.parallax();
		});

		$this.parallax();

		$this.win.on("scroll.rtprlx",function(){
			$this.parallax();
		});

		$this.$element.show();
	};

	/**
	 * Initializes rtprlx
	 * @protected
	 */
	rtprlx.prototype.parallax = function() {


		var maxscroll 	= ( this.winH + this.win.scrollTop() ) -  this.itemTop;
		var rate      	= this.invisible_part / ( this.winH + this.row_height );
		var isvisible 	= maxscroll > 0 && this.itemBottom > this.win.scrollTop();

		if( ! isvisible ) {
			return;
		}

		var move_rate =  maxscroll * rate;

		if( this.effect == "vertical" ){
			var yPos =  this.direction == 1 ? -1 * move_rate : -1 * this.invisible_part + move_rate;
			this.apply_css(0, yPos);
		}else{
			var xPos =  this.direction == 1 ? -1 * move_rate : -1 * this.invisible_part + move_rate;
			this.apply_css(xPos, 0);
		}

	};


	/**
	 * Refresh rtprlx vars
	 * @protected
	 */
	rtprlx.prototype.refresh = function() {

		this.row            = this.options.parent_row ? this.options.parent_row : this.$element.parents("div:eq(0)");
		this.effect         = this.$element.attr("data-rt-parallax-effect");// vertical, horizontal
		this.direction      = this.$element.attr("data-rt-parallax-direction"); // -1 down/right , 1 up/left
		this.speed          = Math.max( parseInt(this.$element.attr("data-rt-parallax-speed")), this.options.speed_min );  //relative value with the css row height
		this.row_height     = this.row.outerHeight();
		this.row_width      = this.row.outerWidth();
		this.holder_height  = this.effect == "vertical" ? this.row_height * this.speed : this.row_height ;
		this.holder_width   = this.effect == "horizontal" ? this.row_width * this.speed : this.row_width + 4 ;

		this.invisible_part = this.effect == "vertical" ? this.holder_height - this.row_height : this.holder_width - this.row_width,
		this.posTop         = this.row.offset().top,
		this.itemBottom     = this.posTop + this.row_height;
		this.itemTop        = this.posTop;
		this.win            = $(window);
		this.winH           = $(window).height();
		this.winW           = $(window).width();


		this.start_position = this.direction == -1 ? -1 * this.invisible_part : 0;


		this.$element.css({ "height":this.holder_height, "width":this.holder_width+"px" });

		if( this.effect == "vertical" ){
			this.apply_css(0, this.start_position);
		}else{
			this.apply_css(this.start_position, 0);
		}

	};


	/**
	 * Apply css
	 * @protected
	 */
	rtprlx.prototype.apply_css = function( x, y ) {

			var is_rtl = $("body").hasClass("rtl");

			//if it is rtl language make it reverse
			x = is_rtl ? -1 * x : x;

			this.$element.css({
				"-webkit-transform": "translate3d("+x+"px, "+y+"px,0)",
				"-moz-transform": "translate3d("+x+"px, "+y+"px,0)",
				"-ms-transform": "translate3d("+x+"px, "+y+"px,0)",
				"-o-transform": "translate3d("+x+"px, "+y+"px,0)",
				"transform": "translate3d("+x+"px, "+y+"px,0)"
			});

	};


	/**
	 * The jQuery Plugin
	 * @public
	 */
	$.fn.rtprlx = function(options) {
		return this.each(function() {
			if (!$.data(this, 'rtprlx')) {
				$.data(this, 'rtprlx', new rtprlx( this, options ));
			}
		});
	};
})( jQuery, window, document );



/*!
 * BusinessLounge WordPress Theme Scripts
 * Copyright (C) 2017 RT-Themes
 * http://rtthemes.com
 *
 * various scripts file
 */
(function($){
"use strict";


	/* *******************************************************************************

		GLOBAL VARS

	***********************************************************************************/
	var is_rtl = $("body").hasClass("rtl");
	var window_width = $(window).width();
	var window_height = $(window).height();

	/* *******************************************************************************

		HEADER STYLE FIX

	***********************************************************************************/
	if( ! $.fn.rt_header_fix ){
		$.fn.rt_header_fix = function()
		{	
			$("#rt-header-fix").remove(); 
			var fixcss = "", header_second_row = $(".header-row.second");
				fixcss += ".main-header-holder .header-elements:before{ left: calc( -1 * ( "+ $(window).width() +"px - 100% ) / 2 ); width: "+ $(window).width() +"px; }";
				fixcss += header_second_row.length > 0 ? ".header-row.second:before{ left: -"+$(".header-row.second").offset().left+"px; width: "+ $(window).width() +"px; }" : "";
			$("<style id='rt-header-fix'>"+fixcss+"</style>").prependTo($("body"));
		};
	}

	$('#logo').waitForImages(function() { //note: waitForImages faster than imagesLoaded for this case
		$.fn.rt_header_fix();
	});
	
	$(window).on("resize",function(){
		$.fn.rt_header_fix();
	});

	/* *******************************************************************************

		LOADERS

	***********************************************************************************/

	$('html').imagesLoaded( { background: ".has-bg-image, body, .slide-background" }, function() {	//all images loaded
		$(window).trigger("rt_images_loaded");
	});

	$(window).on('rt_images_loaded', function() { //window and all images loaded
		if( document.readyState === "complete" ){
			$(window).trigger("rt_loaded");
		}else{
			$(window).on('load', function() {
				$(window).trigger("rt_loaded");
			});
		}
	});

	Pace.on('hide', function(){ //everything loaded including ajax
		$(window).trigger("rt_pace_done");
		$('.pace').remove();
	});


	/* *******************************************************************************

		ON PAGE LOAD

	***********************************************************************************/

	$(window).on("rt_loaded",function(){

		if( $("body").hasClass("rt-loading") ){
			$("body").addClass("rt-loaded");
			$(window).scrollTop(0);
			$('.pace').remove();
		}

		setTimeout(function(){
			$("body").removeClass("rt-loading");
		},200);

	});


	/* *******************************************************************************

		ON LEAVE

	***********************************************************************************/

	if( ! $.fn.rt_on_leave ){

		$.fn.rt_on_leave = function()
		{

		$('a[href^="'+rtframework_params["home_url"]+'"]').on("click", function(e){

			if( $.fn.is_mobile_menu() ){
				return;
			}

			if( $(this).attr("target") && $(this).attr("target") != "" ){
				if( $(this).attr("target") !== "_self" ){
					return;
				}
			}

			if ( window.parent.location !== window.location ) {//check if customizer active
				return;
			}

			var cur_url = window.location.host + window.location.pathname + window.location.search;
			var target_url = this.host + this.pathname + this.search;
			var target_extension = this.pathname.split('.');
			var search = this.search;

			if( cur_url == target_url || search.indexOf("replytocom") == 1 ){
				return;
			}

			if( typeof target_extension[1] != "undefined" && typeof target_extension[1] != "php" && typeof target_extension[1] != "html"  ){
				return;
			}

			if ( e.ctrlKey || e.shiftKey || e.metaKey || (e.button && e.button == 1) ){
				return;
			}

			$("body").addClass("rt-leaving");


			var href = this.href;
			window.location = href;

			return false;
		});

		};
	}

	$(window).on("rt_loaded",function(){
		if( $("body").hasClass("rt-transition") ){
			$.fn.rt_on_leave();		
		}
	});

	//fix for safari back/fw button cache
	$(window).on("pageshow", function(event) {
	    if ( event.originalEvent.persisted && $("body").hasClass("rt-transition") ) {
	        window.location.reload();
	    }
	});		

	/* *******************************************************************************

		VC FRONTEND

	***********************************************************************************/

	$(window).on("rt_vcfe",function(e,el_id){

		var item = $('[data-model-id="'+el_id+'"]');

		item.find('.rt-parallax-background').rtprlx({});
		item.find('.rt-background-slider').rt_bg_anim();
		item.find('.rt_tabs').rt_tabs();
		item.find('.stretch-background').rt_clone_bg(e);

		item.rt_start_carousels();
	});
 
	/* *******************************************************************************

		WINDOW WIDTH RESIZE ONLY

	***********************************************************************************/

	$(window).on("resize",function(){
		if($(this).width() != window_width){
			window_width = $(this).width();
			$(window).trigger("window_width_resize");
		}
	});

	/* *******************************************************************************

		WINDOW HEIGHT RESIZE ONLY

	***********************************************************************************/

	$(window).on("resize",function(){
		if($(this).height() != window_width){
			window_height = $(this).height();
			$(window).trigger("window_height_resize");
		}
	});

	/* *******************************************************************************

		CHECK IF THE HIDDEN MOBILE MENU ACTIVE

	***********************************************************************************/
	if( ! $.fn.is_mobile_menu ){

		$.fn.is_mobile_menu = function()
		{
			return Modernizr.mq('(max-width: 1024px)');
		};
	}



	/* *******************************************************************************

		MOBILE MENU

	***********************************************************************************/
	function rt_toggle_mobile_menu(menu_button){
		menu_button.toggleClass("active");

		$("body").toggleClass("mobile-menu-active");

		clearTimeout(menu_anim);
		var menu_anim = setTimeout(function(){
			$(".mobile-nav").slideToggle( "fast", function() {});
		},200);

		if( $("body").hasClass("mobile-menu-active") ){
			$.fn.rt_passive_close();
		}else{
			$("#main_content").off('touchstart click');
		}

	}

	//on menu button click
	$(".mobile-menu-button").on("click",function() {
		rt_toggle_mobile_menu($(this));
		return false;
	});

	//click outside of mobile menu
	$.fn.rt_passive_close = function(){
		$("#main_content").on('touchstart click', function(e) {
			if( $("body").hasClass("mobile-menu-active") ){
				$(".mobile-menu-button").trigger("click");
				return false;
			}
		});
	};
 


	/* ******************************************************************************* 

		MOBILE CLASSES

	***********************************************************************************/ 

	if( ! $.fn.rt_mobile_classes ){
		$.fn.rt_mobile_classes = function()
		{ 	
			//mobile menu
			if($.fn.is_mobile_menu()){
				$(this).addClass("mobile-menu"); 			
			}else{
				$(this).removeClass("mobile-menu"); 	
			} 
		};
	}	

	$("body").rt_mobile_classes();
	$(window).on('resize', function() {     
		$("body").rt_mobile_classes();
	});


	/* *******************************************************************************

		STICKY HEADER

	********************************************************************************** */


	if( ! $.fn.rt_sticky_header ){

		$.fn.rt_sticky_header = function()
		{
				if( $(this).length == 0 ){
					return;
				}

				var header = $(this),
					header_normal_height = header.outerHeight(),
					body = $("body"),
					main_content = $("#main_content"),
					wp_admin_bar_height = 0 + ( $("#wpadminbar").outerHeight() || 0 ),
					lastScrollTop = 0,
					direction = header.hasClass("sticky-header-style-1") ? "down" : "always",
					scroll_direction = "";


				if( header.length > 0 ){

					//scroll function
					$(window).on("scroll",function(event) {


						if( $.fn.is_mobile_menu() ){
							return;
						}

						var y = $(window).scrollTop();
						var header_stuck = header.hasClass("stuck");


						if( y < 0 ){
							return;
						}

						//detect direction
						if (y > lastScrollTop){
							scroll_direction = "down";

						} else {
							scroll_direction = "up";
						}
						lastScrollTop = y;

						if( y < 490 ){
							body.removeClass( "header-stuck" );
							return;
						}

						if( direction == "always" && y > 500 ){
							body.addClass( "header-stuck" );
							return;
						}

						if( scroll_direction == "up" && y > 500 ){
							body.addClass( "header-stuck" );
							return;
						}

						if( scroll_direction == "down" ){
							body.removeClass( "header-stuck" );
							return;
						} 
					});
				}
		};

	}

	// Add space for Elementor Menu Anchor link
	$( window ).on( 'elementor/frontend/init', function() {	 
		elementorFrontend.hooks.addFilter( 'frontend/handlers/menu_anchor/scroll_top_distance', function( scrollTop ) {
			if( !$.fn.is_mobile_menu()  && $("body").hasClass("sticky-header-style-2") ){
				return scrollTop - 60;	//60px sticky header height
			}
			return scrollTop;
		} );
	} );

	$(window).on('rt_images_loaded', function() {
		$(".sticky-header").rt_sticky_header();
	});


	/* *******************************************************************************

		IMG effects

	********************************************************************************** */

	if( ! $.fn.rt_image_hover ){

		$.fn.rt_image_hover = function()
		{

			$(this).each(function(){
				var button= $(this).find(".action-button");

				if( button.length > 0 ){
					return;
				}

				if( ! $(this).find(".has-overlay-text").length > 0 ){
					$('<div class="overlay-mask"></div>').insertAfter($(this).find("img:eq(0)"));
				}

				$(this).append('<span class="action-button"></span>');
				$(this).parent("*").addClass("has-overlay");
			});

		};

	}

	$(window).on('resize load', function() {
		$(".imgeffect").rt_image_hover();
	});

	if( ! $.fn.rt_image_overlays ){

		$.fn.rt_image_overlays = function()
		{
			$(this).each(function(){
				 
				var img = $(this).find("img"), 
					img_w = img.width();

				if( img_w == 0 ){
					img_w = img.attr("width");	
				}

				if( img_w == 0 ){
					img_w = "auto";	
				}				
				$(this).css({"max-width":parseInt(img_w)});	

			});
		};
	}

	$(window).on('resize load', function(e) {
		if( e.type == "resize" ){
			$(".has-overlay").css({"max-width":"100%"});	
		}
		setTimeout(function() {		
			$(".has-overlay").rt_image_overlays();
		},300);
	});

	/* *******************************************************************************

		CALCULATE DISTANCE

	***********************************************************************************/
	if( ! $.fn.rt_calc_distance ){

		$.fn.rt_calc_distance = function( target ){

			//vars
			var wp_admin_bar_height = $("#wpadminbar").outerHeight() || 0;
			var sticky_header = $(".sticky-header .top-header");
			var target_ofset = target.offset().top;
			var sticky_header_height = 85;

			//reduce position
			var distance = wp_admin_bar_height;

			if( target.offset().top > 30 ) {
				if( sticky_header.length > 0 ){
					distance += sticky_header_height;

				}
			}

			return target_ofset - distance;
		}
	}

	/* *******************************************************************************

		RT ONE PAGE

	***********************************************************************************/

	if( ! $.fn.rt_one_page ){

		$.fn.rt_one_page = function()
		{

			if( window.location.hash ){

				var target = $(window.location.hash);

				if( target.length > 0 && $('.header-col .main-menu a[href*="'+window.location.hash+'"]').length > 0 && ! target.hasClass("vc_tta-panel vc_active") ){
					rt_scroll_to( $.fn.rt_calc_distance( target ) , window.location.hash );
				}
			}

			$(this).on("click",function(e){

					var cur_url = window.location.host + window.location.pathname + window.location.search;
					var this_url = this.host + this.pathname + this.search;

					if( cur_url == this_url ){

						e.preventDefault();

						if( this.hash == "#top" ){
							rt_scroll_to( 0, "");
							return ;
						}

						//elementor pages doesn't need the rest of the function
						if( $("body").hasClass("elementor-page") ){
							return;
						}

						var target = $(this.hash);

						//if target is hidden
						if( target.hasClass("hidden-element") ){
							target = target.parents("*:eq(0)");
						}

						//if target doesn't exists
						if( target.length == 0 ){
							window.location = this.href;
							return ;
						}

						rt_scroll_to( $.fn.rt_calc_distance(target), this.hash);
					}
			});

			$(this).each(function(){

				var menu_item = $(this),
					hash = this.hash,
					section = $(hash);

				if( ! section.is(":visible") ){
					section = section.parents("*:eq(0)");
				}

				menu_item.parent("li").removeClass("current-menu-item current_page_item");

				section.appear(function(){
						rt_remove_active_menu_class();
						menu_item.parent("li").addClass("current-menu-item current_page_item");
				},{accX: 0, accY: -1 * section.height() / 2 , one:false});

			});


			function rt_remove_active_menu_class(){
				$(".header-col .main-menu > li.current-menu-item, .header-col .main-menu > li.current_page_item, .section-nav > li.current_page_item").removeClass("current-menu-item current_page_item");
			}

		};
	}

	if ( $.fn.rt_one_page ) {
		$(window).one("rt_loaded", function(){
			$($('.header-col .main-menu a[href*="#"]:not([href="#"]),.section-nav a[href*="#"]:not([href="#"]), .rt-scroll a[href*="#"]:not([href="#"]), a.rt-scroll[href*="#"]:not([href="#"])')).rt_one_page();
		});
	}

	/* *******************************************************************************

		SCROLLTO LINKS

	***********************************************************************************/
	$(".scroll").on("click",function(){

		if( this.hash == "#top" ){
			rt_scroll_to( 0, "");
			return ;
		}

		if( $(this.hash).length < 1 ){
			return ;
		}

		rt_scroll_to( $.fn.rt_calc_distance( $(this.hash) ), this.hash);
	});


	/* *******************************************************************************

		GO TO TOP LINK

	***********************************************************************************/

	if( ! $.fn.rtframework_go_to_top ){

		$.fn.rtframework_go_to_top = function()
		{

			var $this = $(this);

			$(".footer_info_bar").appear(function(){
				 $this.addClass("visible");
			});

			$(this).on("click",function(e){
				rt_scroll_to( 0, "");
			});

		};
	}

	if ( $.fn.rtframework_go_to_top ) {
		$('.go-to-top').rtframework_go_to_top();
	}

	/* *******************************************************************************

		RT COUNTER

	***********************************************************************************/

	if( ! $.fn.rt_counter ){

		$.fn.rt_counter = function()
		{
			$(this).each(function(){
				var number_holder = $(this).find("> .number > i"),
					 number = number_holder.text();
						
						$(this).appear(function(){

							$({
								Counter: 0
							}).animate({
								Counter: number_holder.text()
							}, {
								duration: 1200,
								step: function () {
									number_holder.text(Math.ceil(this.Counter));
								},
								complete: function () {
									number_holder.text(number);
								}
							});

						},{accX: 0, accY: -30});
			});
		};
	}

	if ( $.fn.rt_counter ) {
		$(window).one("rt_loaded", function(){
			$('.rt_counter').rt_counter();
		});
	}

	/* *******************************************************************************

		RT SCROLL TO

	***********************************************************************************/

	function rt_scroll_to( to, hash ){

		$('html, body').stop().animate({
			'scrollTop': to
		}, 900, 'swing', function() {
			window.location.hash = hash;
			$('html,body').scrollTop(to);
		});
	}

	/* *******************************************************************************

		FIX FEATURES COLUMN POSITION OF COMPARE TABLES

	********************************************************************************** */

	if( ! $.fn.rt_tables ){

		$.fn.rt_tables = function()
		{

			//brings the features column position same with other columns
			function fix_compare_features( table ){

				$(table).each(function(i){

					var start_position_element = $(this).find(".start_position"),
					features_list = $(this).find(".table_wrap.features ul"),
					new_offset =  start_position_element.offset().top - $(this).offset().top;

					features_list.css("top",new_offset);
				});
			}


			//copy features to each column for mobile
			function copy_features( table ){

				var features;

				$(table).each(function(){

					features=[];
					//createa features array from the first row
					$(this).find(".table_wrap.features li").each(function(){
						features.push( $(this).html() );
					});

				});

				$(table).find(".table_wrap").each(function(i){

					if( $(this).hasClass("features") == "" ){
						var i = 0;
						$(this).find("li").each(function(){

							if( typeof features[i] != "undefined" ){
								$(this).prepend('<div class="visible-xs-block hidden-sm hidden-md hidden-lg">'+features[i]+'</div>');
							}
						i++;
						});
					}
				});
			}


			$(this).each(function(){

				var table = $(this);

				//bind to window resize
				$(window).on("resize",table, function( ){
					fix_compare_features( table );
				});

				//start functions
				fix_compare_features( table );
				copy_features( table );

			});

		};
	}

	if ( $.fn.rt_tables ) {
		$('.pricing_table.compare').rt_tables();
	}


	/* *******************************************************************************

		TOGGLE - ACCORDION

	********************************************************************************** */
	if( ! $.fn.rt_accordion ){

		$.fn.rt_accordion = function()
		{	
			$(this).each(function () {

					$(this).find(".toggle-content").hide();
					$(this).find(".open .toggle-content").show();

					$(this).find("ol li .toggle-head").on("click",function(){

						clearTimeout("accordion_timeout");

						var element = $(this).parent("li"),
							content = element.find(".toggle-content");

						if( element.hasClass("open")){
							element.removeClass("open");
							content.stop().slideUp(300);

						}else{

							$(this).parents("ol").find("li.open").removeClass("open").find(".toggle-content").stop().slideUp(300);

							element.addClass("open");
							content.stop().slideDown(300,function(){
								fix_accordion_pos();
							});

						}

						function fix_accordion_pos(){
							if( $(window).scrollTop() > element.offset().top ){
								var accordion_timeout = setTimeout(function() {
									var add = ( $("#wpadminbar").outerHeight() || 0 ) + $(".top-header.stuck").outerHeight();
									rt_scroll_to( element.offset().top - add, "");
								}, 100 );
							}
						}
					});

			});					
		};
	}

	if ( $.fn.rt_accordion ) {
		$(".rt-toggle").rt_accordion();
	}

	/* *******************************************************************************

		TABS

	********************************************************************************** */

	if( ! $.fn.rt_tabs ){

		$.fn.rt_tabs = function()
		{

			$(this).each(function () {

				var tabs = $(this),
					tab_nav = $(this).find("> .tab_nav"),
					desktop_nav_element = $(this).find("> .tab_nav > li"),
					mobile_nav_element = $(this).find("> .tab_contents > .tab_content_wrapper > .tab_title"),
					tab_wrappers =  $(this).find("> .tab_contents > .tab_content_wrapper"),
					tab_style = $(this).attr("data-tab-position");

				//nav height fix
				height_fix(1);

				//mobile nav clicks
				mobile_nav_element.on("click",function() {
					close_all();
					open_tab( $(this).attr("data-tab-number") );
				})

				//desktop nav clicks
				desktop_nav_element.on("click",function() {
					close_all();
					open_tab( $(this).attr("data-tab-number") );
				})

				//close all tabs
				function close_all(){
					tab_wrappers.each(function() {
						$(this).removeClass("active");
					});

					desktop_nav_element.each(function() {
						$(this).removeClass("active");
					});

				}

				//open a tab
				function open_tab( tab_number ){

					var nav_item = tabs.find('[data-tab-number="'+tab_number+'"]'),
						tab_content_wrapper = tabs.find('[data-tab-content="'+tab_number+'"]');

						nav_item.addClass("active");
						tab_content_wrapper.addClass("active");
						height_fix( tab_number );

						//fix custom select forms
						$.fn.rt_customized_selects( tab_content_wrapper );
						tab_content_wrapper.find('span.customselect').remove();
						tab_content_wrapper.find('select.hasCustomSelect').removeAttr("style");
						$.fn.rt_customized_selects( tab_content_wrapper );

						if( window_width < 767 ){
							rt_scroll_to( tab_content_wrapper.offset().top, "" );
						}
				}

				//height fix -  vertical style
				function height_fix( tab_number ) {
					if( tab_style == "tab-position-2" ){
						var current_tab_height = tabs.find('[data-tab-content="'+tab_number+'"]').outerHeight();
						tab_nav.css({"min-height":current_tab_height+"px"});
					}
				}

			});

		};
	}

	if ( $.fn.rt_tabs ) {
		$('.rt_tabs').rt_tabs();
	}

	/* *******************************************************************************

		START CAROUSELS

	********************************************************************************** */

	$.fn.rt_start_carousels = function( callbacks ) {

		//mobile (responsive) heading sizes for the main content carousel
		//createa a css and append to body for screens only below 768px
		$(".main-carousel").each(function(){

			var create_css = "",
				 unique_class_name = "",
				 mobile_height = $(this).data("mobile-height");

			create_css += "#"+$(this).attr("id")+" .item{min-height:"+mobile_height+"px !important;}";
			create_css += "#"+$(this).attr("id")+" .slide-background {height:"+mobile_height+"px !important;}";
			create_css += "#"+$(this).attr("id")+" .slide-content {margin-top:"+mobile_height+"px !important;}";

			$(this).find(".slide_heading").each(function(){
				unique_class_name = "heading-" + Math.floor((Math.random() * 100000) + 1);
				$(this).addClass(unique_class_name);
				create_css += "."+unique_class_name+"{font-size:"+$(this).data("mobile-value")+"px !important;}";
			});

			$(this).find(".slide-text").each(function(){
				unique_class_name = "text-" + Math.floor((Math.random() * 100000) + 1);
				$(this).addClass(unique_class_name);
				create_css += "."+unique_class_name+"{font-size:"+$(this).data("mobile-value")+"px !important;}";
			});

			$("<style>@media screen and (max-width: 768px) {"+create_css+"}</style>").prependTo($("body"));

		});

		//craete carousels
		$(this).find(".rt-carousel:not(.manual-start)").each(function(){

			var autoHeight_,
				margin = $(this).data("margin") !== ""  && typeof $(this).data("margin") != "undefined" ? $(this).data("margin") : 15,
				padding = $(this).data("padding") !== "" && typeof $(this).data("padding") != "undefined" ? $(this).data("padding") : 0,
				carousel_holder = $(this),
				min_height = carousel_holder.data("min-height"),
				items = parseInt($(this).attr("data-item-width")),//number of items of each slides
				tablet_items = typeof $(this).data("tablet-item-width") != "undefined" && $(this).data("tablet-item-width") != "" ? parseInt($(this).attr("data-tablet-item-width")) : ( items == 1 ) ? 1 : 2 ,//number of items of each slides
				mobile_items = typeof $(this).data("mobile-item-width") != "undefined" ? parseInt($(this).attr("data-mobile-item-width")) : 1,//number of items of each slides
				nav = $(this).attr("data-nav") == "true" ? true : false,
				dots = $(this).attr("data-dots") == "true" ? true : false,
				thumbnails = $(this).attr("data-thumbnails") == "true" ? true : false,
				boxed = $(this).attr("data-boxed") == "true" ? true : false,
				fullheight = $(this).attr("data-fullheight") == "true" ? true : false,
				timeout = typeof $(this).attr("data-timeout") != "undefined" ? $(this).data("timeout") : 5000,
				autoplay = $(this).data("autoplay") != "undefined" ? $(this).data("autoplay") : false,
				loop = typeof $(this).data("loop") != "undefined" && $(this).data("loop") != "" ? true : false,
				carousel_id = $(this).attr("id"),
				is_main_carousel = carousel_holder.hasClass("main-carousel");

			//auto height & margin
			if( items == 1 && padding == 0 ){
				autoHeight_ = true;
				margin = 0;
			}else{
				autoHeight_ = false;
				margin = margin;
			}

			//tablet mobile layout defaults
			tablet_items = tablet_items || 1;
			mobile_items = mobile_items || 1; 
			
			//start carousel
			var carousel = carousel_holder.find(".owl-carousel");

			//loaded
			carousel_holder.addClass("rt-carousel-loaded");

			carousel.imagesLoaded( { background: ".has-bg-image" }, function( instance ) {

				if( instance.images.length == 1 ){
					nav = dots = false;
				}

				var startover;
				carousel.on('changed.owl.carousel', function(e) {

					if( ! autoplay ){
						return;
					}

					clearTimeout(startover);

					if (!e.namespace || e.type != 'initialized' && e.property.name != 'position') return;

					var items = $(this).find('.active').size();

					if( e.item.index == e.item.count - items ){
							startover = setTimeout(function() {
							carousel.trigger('to.owl.carousel',  [0, 700, true]);
						}, timeout );
					}
				});

				//color tones for main slider
				$(window).on("header_normal_pos",function(){
					carousel.trigger("carousel_header_style");
				});
				carousel.on('initialized.owl.carousel changed.owl.carousel carousel_header_style', function(e) {

					if( e.item ){
						var current_slide = $(this).find('.owl-item:eq('+e.item["index"]+')');
					}else{
						var current_slide = $(this).find('.owl-item.active');
					}

					if( ! is_main_carousel || current_slide.length === 0 ){
						return;
					}

					var skin = current_slide.find("> .item").data("color-tone");

					if( undefined === skin || "" == skin ) {
						return;
					}

					carousel_holder.removeClass("dark-bg-tone light-bg-tone");
					carousel_holder.addClass(skin+"-bg-tone");

					if( window_width < 1024 || $(".top-header").hasClass("stuck") ){
						return ;
					}

					//check if the carousel is in the first row of an overlapped-header page
					if( ! carousel.parents(".content_row").last().is($(".overlapped-header #main_content > .content_row:first-child") ) ){
						return;
					}

					$("body.overlapped-header .dynamic-skin").removeClass("businesslounge-dark-header businesslounge-light-header");
					$("body.overlapped-header .dynamic-skin").addClass("businesslounge-"+skin+"-header");
				});

				//thumb navigation
				carousel.on('changed.owl.carousel initialized.owl.carousel', function(e) {

					if( ! thumbnails ){
						return;
					}

					$('#'+carousel_id +"-thumbnails > a.active").removeClass("active");
					$('#'+carousel_id +"-thumbnails > a:eq("+e.item.index+")").addClass("active");
				});

				//text navigation
				$('#'+carousel_id +"-thumbnails > a").on('click dblclick', function(event) {

					if( "dblclick" == event.type){
						event.preventDefault();
						return;
					}

					var id = $(this).data("href"); 
					carousel.trigger('to.owl.carousel',  [id, 300, true]);
				});

				//make full height
				if( fullheight ){
					carousel.on('initialized.owl.carousel', function(e) {
						make_full_height(carousel,min_height ); });

					$(window).on('window_height_resize', function() {
						make_full_height(carousel,min_height );
						carousel.trigger('refresh.owl.carousel');
					});
				}

				//select arrow set
				if( is_main_carousel ){
					var arrowset = ! is_rtl ? ["<span class=\"ui-icon-left-arrow-1\"></span>","<span class=\"ui-icon-right-arrow-1\"></span>"] : ["<span class=\"ui-icon-right-arrow-1\"></span>","<span class=\"ui-icon-left-arrow-1\"></span>"] ;
				}else{
					var arrowset = ! is_rtl ? ["<span class=\"ui-icon-angle-left\"></span>","<span class=\" ui-icon-angle-right\"></span>"] : ["<span class=\"ui-icon-angle-right\"></span>","<span class=\"ui-icon-angle-left\"></span>"] ;
				}

				//carousel object
				carousel.owlCarousel({
					rtl: is_rtl ? true : false,
					loop:loop,
					autoplayTimeout : timeout,
					autoplay:autoplay,
					autoplayHoverPause:false,
					margin:margin,
					responsiveClass:true,
					URLhashListener:thumbnails,
					startPosition: 'URLHash',
					autoplaySpeed:700,
					navSpeed: items == 1 ? 700 : 300,
					dotsSpeed: 300,
					autoHeightClass: 'owl-height',
					navText: nav ? arrowset : '',
					animateOut: is_main_carousel ? 'fadeOut' : false,
					animateIn: is_main_carousel ? 'fadeIn' : false,
					rewind: is_main_carousel ? true : false, 

					responsive:{
						0:{
							items:mobile_items,
							nav:nav,
							dots:dots,
							autoHeight: 1,
							dotsContainer: "#"+carousel_id+"-dots",
							stagePadding: 0
						},
						768:{
							items:tablet_items,
							nav:nav,
							dots:dots,
							autoHeight: 1,
							dotsContainer: "#"+carousel_id+"-dots",
							stagePadding: padding / 2
						},
						1025:{
							items:items,
							nav:nav,
							dots:dots,
							autoHeight: 1,
							dotsContainer: "#"+carousel_id+"-dots",
							stagePadding: padding,
							mouseDrag: is_main_carousel ?  false  : true
						}
					},
					onInitialized: callbacks ? callbacks._onInitialized : isotope_layout,
					onChanged: callbacks ? callbacks._onChanged : "",
					onRefreshed: callbacks ? callbacks._onRefreshed : "",
					onTranslated: isotope_layout,
				});

				if( carousel_holder.hasClass("boxed-carousel") ){
				//cosmetic fix for content carousels
				make_same_height(carousel,items, mobile_items, tablet_items, carousel_holder);
					$(window).on('resize', function() {
						setTimeout(function() {
							reset_carousel_heights(carousel,items, mobile_items, tablet_items, carousel_holder);
							make_same_height(carousel,items, mobile_items, tablet_items, carousel_holder);
							carousel.trigger('refresh.owl.carousel');
						}, 500);
					});
				}


				//lightboxes
				carousel.on('changed.owl.carousel', function(e) {

					if( ! loop ){
						return;
					}

					carousel.rt_lightbox("init");
				});

			});
		});

		//reset isotopes after carousel
		function isotope_layout(){

			var isotope_gallery = $(".masonry-gallery");

			if( isotope_gallery.length > 0 ){
				setTimeout(function() {
					isotope_gallery.isotope('layout');
				}, 1000);
			}
		}

		//get highest item of the carousel
		function get_highest_item( carousel ){
			var heights = [];
			carousel.find(".owl-item").each(function(){
				heights.push($(this).outerHeight());
			});

			return Math.max.apply(null, heights);
		}

		//reset carousel item heights
		function reset_carousel_heights( carousel, items, mobile_items, tablet_items, carousel_holder ){

			var is_image_carousel = carousel_holder.hasClass("rt-image-carousel");

			carousel.find(".owl-item > div").each(function(){
				$(this).css({"height": ""});
			});
		}

		//make all carousel items in same height
		function make_same_height( carousel, items, mobile_items, tablet_items, carousel_holder ){

			var is_image_carousel = carousel_holder.hasClass("rt-image-carousel");

			if( mobile_items == 1 && window_width < 768 ){
				return false;
			}

			if( tablet_items == 1 && window_width >= 768  &&  window_width <= 1025){
				return false;
			}

			if( items == 1 && window_width > 1025 ){
				return false;
			}

			var height = get_highest_item( carousel );

			carousel.find(".owl-item > div").each(function(){
				$(this).css({"height": height +"px"});
			});

		 	carousel.trigger('refresh.owl.carousel');
		}

		//make all carousel items which has .has-bg-image classname in full height
		function make_full_height( carousel, min_height ){

			var window_height = $(window).height(),
				 wp_admin_bar_height = $("#wpadminbar").outerHeight() || 0,
				 offset = carousel.offset().top,
				 new_height = window_height - offset ;

			if( parseInt( min_height ) > new_height ){
				return;
			}

			carousel.find(".has-bg-image,.slide-content-wrapper").each(function(){
				$(this).css({"min-height": new_height +"px"});
			});
		}

	};
 
	//$(window).on('rt_loaded', function(){
		$("body").rt_start_carousels();
	//});


	/* *******************************************************************************

		SEARCH WIDGET

	********************************************************************************** */
	$(".rt_form .search-icon").on('click', function() { 
		$(this).parents("form:eq(0)").submit();
	});

	/* *******************************************************************************

		SOCIAL SHARE

	********************************************************************************** */

	$(document.body).on("click",".businesslounge-share-content a", function( event ) {

		//if email button clicked do nothing
		if( $(this).hasClass("icon-mail") ){
			return ;
		}

		//for other buttons open a popup window
		var newwindow=window.open($(this).attr("data-url"),'name','height=400,width=400');

		if (newwindow == null || typeof(newwindow)=='undefined') {
			alert( rtframework_params["popup_blocker_message"] );
		}else{
			newwindow.focus();
		}

		event.preventDefault();
	});

	$(document.body).on("click",".social_share > span", function( event ) { 
		var icons = $(this).next("ul");
		$.fn.rt_popup_on(".rt-popup-share");
		var share_content_wrapper = $(".businesslounge-share-content ul");
		share_content_wrapper.replaceWith(icons.clone());
	});

	/* *******************************************************************************

		Tooltips

	********************************************************************************** */
	$('[data-toggle="tooltip"]').tooltip();


	/* *******************************************************************************

		DROP DOWN MENU

	********************************************************************************** */

	if( ! $.fn.rt_drop_down ){

		$.fn.rt_drop_down = function()
		{

			if( $.fn.is_mobile_menu() ){
				return ;
			}

			var $this = $(this);

			$this.each(function(){

				var menu_items_with_sub = $(this).find(".menu-item-has-children"),
					max_depth = 0;

				menu_items_with_sub.each(function(){
					max_depth = Math.max( max_depth, $(this).data("depth") );
				});

				if( ! is_rtl ){

					if( window_width < $(this).offset().left + ( ( max_depth + 1 ) * 240 ) ){
						$(this).addClass("o-direction");
					}
				}else{

					if( 0 > ( $(this).offset().left - ( ( max_depth + 1 ) * 240 ) ) ){
						$(this).addClass("o-direction");
					}
				}

				$(this).addClass("submenu-loaded");					
			});

		};
	}

	$(".header-col .main-menu > li:not(.multicolumn).menu-item-has-children").rt_drop_down();

	/* *******************************************************************************

		TOP BAR DROP DOWN MENU

	********************************************************************************** */

	if( ! $.fn.rt_topbar_drop_down ){

		$.fn.rt_topbar_drop_down = function()
		{

			if( $.fn.is_mobile_menu() ){
				return ;
			}

			var $this = $(this);


			$this.each(function(){


					var menu_items_with_sub = $(this).find(".menu-item-has-children"),
						max_depth = 0;

					menu_items_with_sub.each(function(){
						max_depth = Math.max( max_depth, $(this).parents("ul").length  );
					});

					if( ! is_rtl ){

						if( window_width < $(this).offset().left + ( max_depth  * 160 ) ){
							$(this).addClass("o-direction");
						}

					}else{

						if( 0 > ( $(this).offset().left - ( max_depth * 160 ) ) ){
							$(this).addClass("o-direction");
						}
					}
			});

		};
	}

	$(".top-bar-right .topbar-widget .menu > li.menu-item-has-children").rt_topbar_drop_down();



	/* *******************************************************************************

		MEGA MENU

	********************************************************************************** */

	$('.main-menu .multicolumn > ul > li.menu-item-has-children > a').each(function(){

		if( $(this).attr("href") == "#" || $(this).attr("href") == "" ){
			var $this = $(this);
			$('<span>'+$(this).html()+'</span>').insertAfter($this);
			$this.remove();
		}

	});


	if( ! $.fn.rt_mega_menu ){

		$.fn.rt_mega_menu = function(action)
		{

			if( $(this).length === 0 ){
				return;
			}

			var $this = $(this),
				header = $(".header-elements"),
				header_width = header[0].getBoundingClientRect().width - 40,
				new_col = "",
				ew_line;

			$this.each(function(){

				var $this = $(this),
					  menu = $this.find("> ul"),
					  col_size = $this.data("col-size"),
					  menu_width = Math.min( col_size * 310 , header_width );

				if( ! menu.hasClass("multicolumn-holder") ){
					$("<ul class='sub-menu multicolumn-holder' />").appendTo($(this));

					var  group;
					var lists_length = Math.ceil( menu.find('> li').length / col_size );

					while( ( group = menu.find('> li:lt('+ lists_length  +')').remove() ).length){
						$('<li/>').append($("<ul class='sub-menu'/>").append(group)).appendTo($(this).find("> .multicolumn-holder"));
					}
					menu.remove();
					menu = $this.find("> ul");//menu updated
				}

				$(this).addClass("submenu-loaded");
				
				if( ! is_rtl ){

					var leftPos  = $this.offset().left,
						 leftMargin = Math.ceil( header_width + header.offset().left ) - ( leftPos + menu_width) + 20;

					//set width
					menu.css({
						"width" : menu_width
					});

					if( leftMargin > 0 ){
						return;
					}

					menu.css({
						"margin-left" : parseFloat(leftMargin)
					});

				}else{

					var item_width = $this.outerWidth(),
						 leftPos  = $this.offset().left + item_width;

					//set width
					menu.css({
						"width" : menu_width
					});

					menu.css({
						"margin-right" : Math.min(0, - 1 * (  header.offset().left - (leftPos - menu_width)) - 20 )
					});

				}
				
			});


		};
	}

	var rt_mega_menu = $(".main-menu > li.multicolumn.menu-item-has-children");

	$('#logo').waitForImages(function() {
		rt_mega_menu.rt_mega_menu();
	});

	$(window).on('window_width_resize', function() {
		rt_mega_menu.rt_mega_menu();
	});



	/* *******************************************************************************

		MOBILE DROP DOWN MENU

	********************************************************************************** */

	if( ! $.fn.rt_mobile_drop_down ){

		$.fn.rt_mobile_drop_down = function()
		{
			$(this).on("click",function(e){

				var $this = $(this).parent("li");

				//if the link is only # then toggle the sub menu
				if( $(this).attr("href") == "#" ){
					e.preventDefault();
					$this.find(">ul").slideToggle( "fast", function() {
						$this.toggleClass("current-menu-item");	
					});
					
					return;
				}

				//toggle the sub menu when clicked to +/- icons
				if( ! is_rtl ){
					if( ! $this.hasClass("menu-item-has-children") || window_width - ( ( window_width - $("#mobile-navigation").width() ) / 2 + e.pageX ) > 55 ){
						$(".mobile-menu-button").trigger("click");
						return ;
					}
				}else{
					if( ! $this.hasClass("menu-item-has-children") || e.pageX > 65 ){
						$(".mobile-menu-button").trigger("click");
						return ;
					}
				}

				e.preventDefault();
				$this.find(">ul").slideToggle( "fast", function() {
					$this.toggleClass("current-menu-item");	
				});
				

				return false;
			});

		};
	}

	$(window).on('load', function() {
		$('#mobile-navigation li').each(function(){
				if( $(this).hasClass("current-menu-ancestor") ){
					$(this).removeClass("current-menu-item current-menu-ancestor");	
					$(this).addClass("current-menu-item");	
				}
		}).promise().done( function(){ 
			$('#mobile-navigation li a,#mobile-navigation li > span').rt_mobile_drop_down();
		});
	});


	/* *******************************************************************************

		SIDEBARS HEIGHT

	********************************************************************************** */

	if( ! $.fn.rt_sidebar_height ){

		$.fn.rt_sidebar_height = function(e)
		{
			var $this = $(this),
				 parts = $this.find(".content_row_wrapper > .col");

				parts.css({'min-height': "auto","height": "auto"});

				if( $.fn.is_mobile_menu() ){
					return false;
				}

				if( Modernizr.csstransforms3d ){
					parts.css({ 'min-height': $this.height() - 50 });
				}else{//ie9 or before
					parts.css({ 'height': $this.height() - 50 });
				}
		};

	}

	//run the script
	$(window).on("rt_pace_done window_width_resize",function(){
		$(".content_row.with_sidebar").rt_sidebar_height();
	});


	/* *******************************************************************************

		RT Stretch Background

	********************************************************************************** */

	$.fn.rt_clone_bg = function( e ) {

	  $(this).each(function(){

		var row = $(this).parents(".content_row_wrapper:eq(0)");
		var bg_col = $(this).find("> .rt-column-inner");
		var pos;

		if( e.type == "rt_loaded" ){
			var css = getComputedStyle(bg_col[0]);

			var new_bg = [];
			var bglayer = $('<div class="infinite-bg"/>');
			bglayer.css({
				"background-attachment" : css["background-attachment"],
				"background-blend" : css["background-blend"],
				"background-clip" : css["background-clip"],
				"background-color" : css["background-color"],
				"background-image" : css["background-image"],
				"background-origin" : css["background-origin"],
				"background-position" : css["background-position"],
				"background-repeat" : css["background-repeat"],
				"background-size" : css["background-size"],
				"bottom": "0",
				"height": "100%",
				"position": "absolute",
				"top": "0"
			});

			bglayer.insertBefore($(this).find("> .rt-column-inner > *"));
			bg_col.css({"background":"none","opacity":1});
		}else{
			var bglayer = $(this).find('.infinite-bg');
		}


			if( $(this).prev().hasClass("vc_column_container") || $(this).prev().hasClass("col") ){
				pos = is_rtl ? "right" : "left";
			}else{
				pos = is_rtl ? "left" : "right";
			}

			if( pos == "left" ){

				bglayer.css({
					"left": "0",
					"right":  row.outerWidth() - ( $(this).position().left + $(this).outerWidth() )
				});

			}else{

				bglayer.css({
					"right": "0",
					"left": -1 * $(this).position().left
				});
			}

		});
	};

	//run the script
	$(window).on("rt_loaded window_width_resize",function(e){
		$('.stretch-background').rt_clone_bg(e);
	});


	/* *******************************************************************************

		PARALLAX BACKGROUNDS

	********************************************************************************** */
	$(window).on('rt_loaded', function(){
		$('.rt-parallax-background:not(.rt-el-parallax)').rtprlx({});
	});


	/* *******************************************************************************

		PARALLAX BACKGROUNDS FOR ELEMENTOR

	********************************************************************************** */
	$(window).on('rt_loaded', function(){

		$('.rt-el-parallax-background').each(function(){
		
			var el = $(this).hasClass("elementor-column") ? $(this).find("> .elementor-column-wrap, > .elementor-widget-wrap") : $(this);
			var css = getComputedStyle(el[0]);

			var parallax_settings_list = {
					"1" : [{ "effect" : "horizontal", "direction" : "-1" }],
					"2" : [{ "effect" : "horizontal", "direction" :"1" }],
					"3" : [{ "effect" : "vertical", "direction" : "-1" }],
					"4" : [{ "effect" : "vertical", "direction" :"1" }],
				};		

			if( ! $(this).data("settings") ){
				return;
			}

			var parallax_setting = parallax_settings_list[ $(this).data("settings")["rt_bg_parallax_effect"] ];

			var paralax_layer = $('<div class="rt-parallax-background rt-el-parallax has-bg-image" data-rt-parallax-direction="'+parallax_setting[0]["direction"]+'" data-rt-parallax-effect="'+parallax_setting[0]["effect"]+'" data-rt-parallax-speed="'+$(this).data("settings")["rt_bg_parallax_speed"]+'"/>');
			paralax_layer.css({
				"background-attachment" : css["background-attachment"],
				"background-blend" : css["background-blend"],
				"background-clip" : css["background-clip"],
				"background-color" : css["background-color"],
				"background-image" : css["background-image"],
				"background-origin" : css["background-origin"],
				"background-position" : css["background-position"],
				"background-repeat" : css["background-repeat"],
				"background-size" : css["background-size"],
				"bottom": "0",
				"height": "100%",
				"position": "absolute",
				"top": "0"
			});

			el.find(">div:eq(0)").before(paralax_layer);
			el.css({"background":"none","overflow":"hidden"});
			$(this).find(".rt-parallax-background").rtprlx({
				"parent_row" : $(this)
			});
		});

		
	});

 


	/* *******************************************************************************

		LOAD MORE

	********************************************************************************** */

	$(".load_more").on("click",function(e){

		e.preventDefault();

		var button = $(this),
			listid = button.attr("data-listid"),
			page_count = parseInt(button.attr("data-page_count")) ,
			current_page = parseInt(button.attr("data-current_page")) ;

		//prevent multiple clicks before loading elements
		button.attr("disabled", "disabled");

		//check if there is more posts to display
		if( page_count == 1 ){
			return ;
		}

		//load more button classes
		button.find("span.ui-icon-angle-down:first-child").removeClass("ui-icon-angle-down").addClass("ui-icon-spin1 animate-spin");

		//start ajax
		$.ajax({
			type: 'POST',
			url: rtframework_params.ajax_url,
			data : {
				'action': 'rtframework_ajax_loader',
				'atts': $(this).attr("data-atts"),
				'wpml_lang': rtframework_params.wpml_lang,
				'page': current_page + 1
			},
			success: function(response, textStatus, XMLHttpRequest){

				var response = $(response), elems, wrapper, masonry;

					wrapper = $("#"+listid);

					if( wrapper.hasClass("masonry-gallery") || wrapper.hasClass("metro-gallery") ){
						masonry = true;
					}

					if( masonry ){
						elems = response.find(".rt-dynamic");
					}else{
						elems = response.find("> div, > article");
					}

			
				
				// wait the images
				imagesLoaded( response ).on('done', function( instance ) {

					//append the elements and rebuild the masonry layout
					if( masonry ){
						wrapper.isotope().append( elems ).isotope( 'appended', elems );
					}else{
						wrapper.append( elems );
					}

					//img effects for new loaded elements
					elems.find(".imgeffect").rt_image_hover();

					//append isotope elements
					if( masonry ){
						wrapper.isotope('layout');
					}

					//lightboxes
					$(elems).rt_lightbox("init");

					//start carousels
					elems.rt_start_carousels( { '_onRefreshed' : function _onRefreshed(){
						if( masonry ){
							wrapper.isotope('layout');
						}
					}});

					//the load more button
					button.find(".animate-spin").removeClass("ui-icon-spin1 animate-spin").addClass("ui-icon-angle-down");

					//decrease the page count
					button.attr("data-page_count",page_count-1);

					//increase the current page count
					button.attr("data-current_page", current_page+1 );

					//remove the button if there is no page left
					if( page_count -1 <= 1 ){
						button.attr("disabled", "disabled").hide();
					}else{
						button.removeAttr("disabled");
					} 

				});

			},
			error: function( MLHttpRequest, textStatus, errorThrown ){
				console.log(errorThrown);
			}
		});

	});


	/* *******************************************************************************

		CUSTOM DESIGNED SELECT FORMS

	********************************************************************************** */
	if( ! $.fn.rt_customized_selects ){
		$.fn.rt_customized_selects = function( wrapper ) {
			if ( typeof $.fn.customSelect === "function" ) {

				var selectors = '.orderby, .widget .menu.dropdown-menu, .businesslounge-custom-select';
				if( wrapper ){
					wrapper.find(selectors).customSelect( { customClass: "customselect" } );
				}else{
					$(selectors).customSelect( { customClass: "customselect" } );
				}

			}
		};
	};

	$(window).on("load",function(){
		$.fn.rt_customized_selects();

		//bind to gravity ajax load
		$(document).on('gform_post_render', function(){
			$.fn.rt_customized_selects();
		});

	});


	/* *******************************************************************************

		FORM VALIDATION

	********************************************************************************** */

	$.fn.rt_contact_form = function() {

		$(this).each(function(){

			var the_form = $(this);

			the_form.find(".submit").on("click",function( event ){

				//vars
				var loading = the_form.find(".loading"),
					error = false;

				//check required fields
				the_form.find(".required").each(function(){

					var type = $(this).prop("type") || $(this).prop("tagName").toLowerCase();
					var val = $(this).val();
					
					if( ! val ){
						$(this).addClass("error");
						error = true;		
					}else if( type == "checkbox" && ! $(this).prop("checked") ){ 					
						$(this).addClass("error");
						error = true;		
					}else{
						$(this).removeClass("error");
					}
				});

				
				//there is an error
				if(error){
					return ;
				}

				//show loading icon
				loading.show();

				//searialize the form
				var serialize_form = $(the_form).serialize();

				//ajax form data
				var data = serialize_form +'&action=rt_ajax_contact_form';

				//post
				$.post(rtframework_params.ajax_url, data, function(response) {
					var response = $(response);
					response.prependTo(the_form);
					loading.hide();
				});

				//close warnings
				the_form.find(".info_box").remove();

			});
		});
	};

	$('.validate_form').rt_contact_form();


	/* *******************************************************************************

		INFO BOX CLOSE

	********************************************************************************** */
	$(document.body).on("click",".info_box .icon-cancel",function() {
		$(this).parent(".info_box").fadeOut();
	});


	/* *******************************************************************************

		LIGHTBOX PLUGIN

	********************************************************************************** */

	$.fn.rt_lightbox = function(event) {
		if ($.fn.lightGallery){

				var carousel_atts= {
					selector: 'a[data-rel^="rt_lightbox"]',
					hash: false,
					downloadUrl: false,
					loop: false,
					thumbnail: false,
					index: 0					
				};

				$(this).find(".rt_lightbox_gallery, .rt-gallery").lightGallery(carousel_atts);


				var carousel_atts= {
					selector: 'this',
					hash: false,
					downloadUrl: false,
					loop: false,
					thumbnail: false,
					index: 0					
				};

				$(this).find(".rt_lightbox").lightGallery(carousel_atts);

				//prevent 3rd party lightboxes and elementor lightbox
				$(this).find(".rt_lightbox").on('click',function( event ){
					event.preventDefault();
					return false;
				});				
		}

	};

	$(document).rt_lightbox("init");


	/* *******************************************************************************

		RT GOOGLE MAPS

	********************************************************************************** */
	$.rt_maps = function(el, locations, zoom){

		var base = this;
		base.init = function(){
			// initialize google map
			if(locations.length>0) google.maps.event.addDomListener(window, 'load', $.fn.rt_maps());
		};

		if(locations.length>0) base.init();
	};

	$.fn.rt_maps = function(locations, zoom){

		var map_id = $(this).attr("id");

		//holder height
		var height = $('[data-scope="#'+map_id+'"]').attr("data-height");

		if ( height > 0 ){
			$(this).css({'height':height+"px"});
		}

		//api options
		var myOptions = {
			zoom: zoom,
			panControl: true,
			zoomControl: true,
			scaleControl: true,
			streetViewControl: false,
			overviewMapControl: false,
			scrollwheel : false,
			navigationControl: true,
			center: new google.maps.LatLng(0, 0),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}

		var map = new google.maps.Map( document.getElementById(map_id), myOptions);

		//B&W Map
		var bwmap = $('[data-scope="#'+map_id+'"]').attr("data-bw");

		if ( typeof bwmap !== "undefined" && bwmap != "" ){
			// Create an array of styles.
			var styles = [
				{
					stylers: [
						{ hue: "#fff" },
						{ saturation: -100 },
						{ lightness: 0 },
						{ gamma: 1 }
					]
				}
			];
			// Create a new StyledMapType object, passing it the array of styles,
			// as well as the name to be displayed on the map type control.
			var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

			//Associate the styled map with the MapTypeId and set it to display.
			map.mapTypes.set('map_style', styledMap);
			map.setMapTypeId('map_style');
		}

		$.fn.setMarkers(map, locations);

		$.fn.fixTabs(map,map_id,zoom);
		$.fn.fixAccordions(map,map_id,zoom);
	};

	$.fn.setMarkers = function (map, locations) {


		if(locations.length>1){
			var bounds = new google.maps.LatLngBounds();
		}else{
			var center = new google.maps.LatLng(locations[0][1], locations[0][2]);
			map.panTo(center);
		}


		for (var i = 0; i < locations.length; i++) {
			if (locations[i] instanceof Array) {
				var location = locations[i];
				var myLatLng = new google.maps.LatLng(location[1], location[2]);
				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					animation: google.maps.Animation.DROP,
					draggable: false,
					title: location[0]
				});

				$.fn.add_new_event(map,marker,location[4]);
				if(locations.length>1) bounds.extend(myLatLng);
			}
		}

		if(locations.length>1)  map.fitBounds(bounds);
	};

	$.fn.add_new_event = function (map,marker,content) {

	  if(content){
			var infowindow = new google.maps.InfoWindow({
				content: content,
				maxWidth: 300
			});
			google.maps.event.addListener(marker, 'click', function() {;
			infowindow.open(map,marker);
		});
	  }
	};

	$.fn.fixTabs = function (map,map_id,zoom) {
		var tabs = $("#"+map_id).parents(".rt_tabs:eq(0)"),
			desktop_nav_element = tabs.find("> .tab_nav > li"),
			mobile_nav_element = tabs.find("> .tab_contents > .tab_content_wrapper > .tab_title");

		desktop_nav_element.on("click",  { map: map } , function() {
			var c = map.getCenter();
			google.maps.event.trigger(map, 'resize');
			map.setZoom(zoom);
			map.setCenter(c);
		});

		mobile_nav_element.on("click",  { map: map } , function() {
			var c = map.getCenter();
			google.maps.event.trigger(map, 'resize');
			map.setZoom(zoom);
			map.setCenter(c);
		});
	};

	$.fn.fixAccordions = function (map,map_id,zoom) {
		var panes = $("#"+map_id).parents(".rt-toggle:eq(0) > ol > li");

		panes.on("click",  { map: map } , function() {
			var c = map.getCenter();
			google.maps.event.trigger(map, 'resize');
			map.setZoom(zoom);
			map.setCenter(c);
		});
	};

	/* *******************************************************************************

		SLIDER PARALLAX EFFECT

	********************************************************************************** */

	$.fn.rt_slider_position = function()
	{
		var slider =  $('#main_content > .content_row:first-child .main-carousel[data-parallax="true"], .elementor-row .main-carousel[data-parallax="true"]');

		if( slider.length == 0 || Modernizr.touchevents ){
			return ;
		}

		var parallax_effect = ! Modernizr.touchevents ? true : false,
			wp_admin_bar_height = $("#wpadminbar").outerHeight() || 0,
			offsetTop = slider.offset().top,
			sliderHeight = slider.outerHeight(),
			gap = offsetTop - wp_admin_bar_height,
			carousel = slider.find(".owl-stage-outer"),
			slidebackground = carousel.find(".slide-background"),
			$window = $(window);


			//parallax effect
			$(window).on("scroll", function( event ){

				if( window_width < 1024 ){
					return ;
				}

				var scrollTop = $window.scrollTop() - gap ;

				if( sliderHeight < scrollTop ){
					return ;
				}

				var y = Math.max( 0, scrollTop ),
					cy = parseInt(0.2*y);

					if( y < 420 ){
						slidebackground.css({
							"-webkit-transform": "translate3d(0, "+cy+"px, 0)",
							"-moz-transform": "translate3d(0, "+cy+"px, 0)",
							"-ms-transform": "translate3d(0, "+cy+"px, 0)",
							"-o-transform": "translate3d(0, "+cy+"px, 0)",
							"transform": "translate3d(0, "+cy+"px, 0)"
						});
					}

					if(  y > 220 && y < 260 ){
						carousel.addClass("scrolled");
					}

					if(  y < 220 ){
						carousel.removeClass("scrolled");
					}
			});
	}


	$(window).on('resize', function() {
		$.fn.rt_slider_position();
	});

	Pace.on('hide', function(){
		$.fn.rt_slider_position();
	});


	/* *******************************************************************************

		MASONRY LAYOUTS

	********************************************************************************** */

	$.fn.rt_run_masonry_isotope = function(options) {
		$(this).each(function(){
			var $container = $(this),
				$filter_navigation = $('[data-list-id="'+$(this).attr("id")+'"]'),

				isotope = function () {
					$container.isotope({
						resizable: false,
						itemSelector: '.rt-dynamic',
						percentPosition: true,
						layoutMode:'packery'
					});
				};
				isotope();
		});

	};


	//start isotopes
	$(window).on('rt_images_loaded window_width_resize', function() {
		$('.masonry, .masonry-gallery, .metro-gallery').rt_run_masonry_isotope();
	});

	//a function for filter navigation classes on click
	$.fn.rt_filter_nav = function() {

		var filter_holder = $(this);

		$(this).each(function(){
			
				var $optionLinks = $(this).find('a');

				$optionLinks.on("click",function(){
					var $this = $(this),
						selector = $(this).attr('data-filter');

					//filter items
					$("#"+filter_holder.data("list-id")).isotope({ filter: selector });

					// add active class to the navigation item
					if ( $this.hasClass('active') ) {
						return false;
					}

					var $optionSet = $this.parents('.filter_navigation ul');
					$optionSet.find('.active').removeClass('active');
					$this.addClass('active');

					return false;
				});
		});
	};

	//start filters
	$('.filter-holder').rt_filter_nav();

 

	/* *******************************************************************************

		RETINA LOGO

		 ? check if the browser does not supports srcsets
		&& check if the device screen high dpi
		= replace the 1x image with the 2x one

	********************************************************************************** */


	$.fn.rt_retina_logo = function()
	{
		if( ! $("html").hasClass("no-srcset") ||  typeof window.devicePixelRatio == "undefined" ||  window.devicePixelRatio === 1 ){
			return;
		}

		$(this).each(function(){

			var logo = $(this),
				 logo_srcset = logo.attr("srcset");

			if( typeof logo_srcset !== "undefined" ){
				var logo_retina = logo_srcset.split(" 1.3x");
				logo.attr("src",logo_retina[0]);
			}

		});
	}

	$('.logo-image, .loading-logo').imagesLoaded(function() {
		$(".logo-image, .loading-logo").rt_retina_logo();
	});



	/* *******************************************************************************

		NO FLEXBOX
		flexbox fix for browsers like ie9

	********************************************************************************** */

	$.fn.rt_no_flexbox_support = function()
	{

		//there are many bugs so we consider no flexbox support for IE10 & IE11 for some cases
		var isIE11 = !!navigator.userAgent.match(/Trident.*rv\:11\./);
		if( isIE11 ){
			$(html).addClass("ie11-flexbox");
		}


		var content_wrapper_alignments  =  $('.no-flexbox .content_row.align-columns, .ie11-flexbox .content_row.align-columns');


		//content  wrapper alignments
		content_wrapper_alignments.each(function(){

			var $this       = $(this);
			var row_height  = $this.innerHeight();
			var item        = $this.find(".content_row_wrapper:eq(0)");
			var item_height = item.innerHeight();

			if( $this.hasClass("column-align-bottom") ){
				item.css({"margin-top":row_height-item_height+"px"});
			}else if( $this.hasClass("column-align-middle") ){
				item.css({"margin-top":(row_height-item_height)/2+"px"});
			}

		});

	}

	$(window).on('load resize', function() {
		$.fn.rt_no_flexbox_support();
	});




	/* *******************************************************************************

		RESPONSIVE HEADINGS

	********************************************************************************** */
	$.fn.rt_font_resize = function() {

		$(this).each(function(){
			var $this = $(this),
				max_font_size = $this.data("maxfont-size"),
				min_font_size = $this.data("minfont-size");

				var resize_font_size = function(){

					var compress = 1;
					compress = window_width < 1260 ? 0.85 : compress;
					compress = window_width < 1160 ? 0.75 : compress;
					compress = window_width < 960 ? 0.65 : compress;
					compress = window_width < 768 ? 0.6 : compress;
					compress = window_width < 560 ? 0.5 : compress;
					compress = window_width < 480 ? 0.4 : compress;
					compress = window_width < 300 ? 0.35 : compress;

					if(compress == 1){
						$this.css('font-size', max_font_size +'px');
						return false;
					}

					 $this.css('font-size', Math.max( min_font_size, parseFloat( compress * max_font_size ) ) +'px');
				};

				resize_font_size();
				$(window).on('resize.rt_font_resize orientationchange.rt_font_resize', resize_font_size);
		});

	};

	$('[data-maxfont-size]').rt_font_resize();




	/* *******************************************************************************

		PIE CARTS

	********************************************************************************** */
	$.fn.rt_pie_carts = function() {

		$(this).appear(function(){

			var is_icon = $(this).find("span.icon").length > 0,
				size = Math.min( window_width - 60, $(this).data("wsize"));

				//dynamic span size
				$(this).find("span").css({
					"line-height": size+"px",
					"width": size+"px"
				});

			//create
			$(this).easyPieChart({
				barColor: $(this).data("barcolor"),
				trackColor: $(this).data("basecolor"),
				scaleColor: false,
				lineCap: 'butt',
				lineWidth: $(this).data("linewidth"),
				animate: 1500,
				size: Math.min( window_width - 60, $(this).data("wsize")),
				onStep: function(from, to, percent) {
					if( ! is_icon ){
						$(this.el).find('.percent').text(Math.round(percent));
					}
				}
			});
		},{accX: 0, accY: -100});

	};

	$(window).one("rt_loaded", function(){
		$('.rt-pie-chart').rt_pie_carts();
	});



	/* ******************************************************************************* 

		ANIMATE COLUMNS

	********************************************************************************** */ 
	$.fn.rt_col_animations = function()
	{
		$(this).each(function(){
			
			var $this = $(this);
			rt_animate_col($this);

			$(window).on("scroll", function( event ){

				if( $this.hasClass("animated") ){
					return;
				}

				rt_animate_col($this); 
			});

		});

		function rt_animate_col(wrapper){
			var timer = 0.1;
			if(wrapper.offset().top + 50 < $(window).scrollTop() + $(window).outerHeight()) {
			   wrapper.find(".wpb_column, .col").each(function(){
						timer = timer+0.15;
						$(this).css({
							opacity:1,
							transition: 'opacity 0.4s ease-in '+timer+'s'
						});
			    });
			    wrapper.addClass("animated");
			}
		}

	}

	$(".animate-cols > .content_row_wrapper").rt_col_animations();  





	/* *******************************************************************************

		PROGRESS BARS

	********************************************************************************** */
	$.fn.rt_progress_bar = function() {

		$(this).each(function(){

			var $this = $(this),
			bar = $this.find(".businesslounge-progress-bar"),
			title = $this.find(".businesslounge-progress-title"),
			percent = $this.data("percent"),
			percent_output = $this.find(".businesslounge-progress-desc span");

			if( title.width() + 30 > ($this.width() * percent) / 100 ){
				$this.addClass("short-bar");
			}

			$this.appear(function(){

				bar.width(percent+"%");

				if( ! is_rtl ){
					percent_output.css({left:percent+"%"});
				}else{
					percent_output.css({right:percent+"%"});
				}


				$({
					Counter: 0
				}).animate({
					Counter: percent
				}, {
					duration: 1200,
					step: function () {
						percent_output.text(Math.ceil(this.Counter));
					},
					complete: function () {
						percent_output.text(percent);
					}
				});

			},{accX: 0, accY: -30});

		});

	};

	$(window).one("rt_loaded", function(){
		$('.businesslounge-progress-bar-holder').rt_progress_bar();
	});



	/* *******************************************************************************

		TEXT ANIMATION

	********************************************************************************** */
	$.fn.rt_anim = function() {

		$(this).each(function(){

			var $this = $(this),
			texts = $this.find("span"),
			first = $this.find("span:first-child"),
			timeout = $this.data("timeout");

			first.addClass("active");

			var text_anim = setInterval(function(){

				var active = $this.find(".active"),
					next = active.next() ;

				if(next.length == 0) {
					next = first;
				}

				active.removeClass("active");
				next.addClass("active");

			},timeout);

		});

	};

	$(window).one("rt_loaded", function(){
		$('.rt-anim').rt_anim();
	});

	/* *******************************************************************************

		BACKGROUND SLIDER

	********************************************************************************** */
	$.fn.rt_bg_anim = function() {

		$(this).each(function(){

			var $this = $(this),
			images = $this.data("imgs"),
			timeout = $this.data("timeout"),//seconds
			i=1,
			img_array = images.split(","),
			img_count = img_array.length;

			var anim_layer = $this.clone();
				anim_layer.appendTo($this);

			//pre load images
			var img_objects = [];
			for (var y = 0; y < img_array.length; y++) {
				var img = new Image();
				img.src = img_array[i];
				img_objects[y] = img;
			}

			$(img_objects).imagesLoaded().done( function( instance ) {

				$this.appear(function(){

					if( img_count <= 1 ){
						animate(false);
						return;
					}else{
						animate(true);
					}

					var bg_anim = setInterval(function(){

						anim_layer.css({
							"background-image" : 'url('+img_array[i-1]+')',
							"transform": "scale(1)",
							"transition": "opacity 0s, transform 0s",
							"opacity":1
						});

						animate(true);

					},timeout * 1000);
				});

			});

			function animate(loop){
				setTimeout(function(){

					if( loop ){
						anim_layer.css({
							"opacity":0,
							"transform": "scale(1.5)",
							"transition": "opacity 1s ease "+(timeout-1)+"s, transform "+timeout*2+"s",
						});
					}else{
						anim_layer.css({
							"transform": "scale(1.5)",
							"transition": "transform "+timeout*2+"s",
						});
					}

					i = ( i == img_count ) ? 1 : i+1;

					//next image
					$this.css({
						"background-image" : 'url('+img_array[i-1]+')'
					});

				},50);
			};

		});
	};

	$(window).one("rt_loaded", function(){
		$('.rt-background-slider').rt_bg_anim();
	});


	/* *******************************************************************************

		SIDEPANEL MENU

	********************************************************************************** */

	var side_animation = {};


	$('.side-panel-holder').perfectScrollbar({
		suppressScrollX: true
	});

	$.fn.rt_toggle_side_panel = function()
	{
		//toggle body class
		$("body").toggleClass("side-panel-on");

		if( $("body").hasClass("side-panel-on") ){//open

			var showitems = setTimeout(function(){
				$(".side-panel-contents > .animate").show().animate({opacity: 1,top: 0},400);

				$('side-panel-holder').perfectScrollbar('update');

			},700);

			$(document).on("keyup.rt_side_panel",function(e){
				if (e.keyCode === 27){
					$(window).trigger("rt_side_panel");
					return;
				}
			});

		}else{//close
			$(".side-panel-contents > .animate").animate({opacity: 0, top: "20px",},400,function(){
				$(this).hide();
			});

			$(".businesslounge-sidepanel-button").removeClass("active");

			$(document).off("keyup.rt_side_panel");
		}
	}

	$(window).on("rt_side_panel", function(){
		//toggle side panal
		$.fn.rt_toggle_side_panel();
	});

	$(window).on('rt_side_panel resize', function() {
		if($("body").hasClass("side-panel-on")){
			$(".side-panel-holder").height( $(window).height() );

		}
	});
 


	/* *******************************************************************************

		SIDE PANEL MENU

	********************************************************************************** */
	$("#businesslounge-side-navigation a").on("click",function(e){
		var parent = $(this).parent("li:eq(0)");
		if( parent.hasClass("menu-item-has-children") ){

			if( $(this).attr("href") == "#" ){
				e.preventDefault();
			}

			parent.toggleClass("active");
			var submenu = parent.find(".sub-menu:eq(0)");
			submenu.slideToggle( 300 );

		}
	});


	/* *******************************************************************************

		SIDE PANEL OPEN / CLOSE BUTTON

	********************************************************************************** */
	$.fn.rtframework_side_menu_button = function()
	{

		$(this).on("click",function(e){
			e.preventDefault();

			$(this).addClass("active");
			$(".side-panel-contents > .widget.woocommerce, .side-panel-contents > .widget.rt_woocommerce_login").removeClass("animate");
			$(".side-panel-contents > *:not(.widget.woocommerce):not(.widget.rt_woocommerce_login)").addClass("animate");


			if( ! $("body").hasClass("side-panel-on") ){
				$(window).trigger("rt_side_panel");
			}
		});

	}

	$(".businesslounge-sidepanel-button").rtframework_side_menu_button();

	/* *******************************************************************************

		CART BUTTON MENU

	********************************************************************************** */
	$.fn.rtframework_cart_menu_button = function()
	{

		$(this).on("click",function(e){
			e.preventDefault();

			$(".side-panel-contents > *:not(.widget.woocommerce)").removeClass("animate");
			$(".side-panel-contents > .widget.woocommerce").addClass("animate");

			if( ! $("body").hasClass("side-panel-on") ){
				$(window).trigger("rt_side_panel");
			}
		});

	}

	$(".businesslounge-cart-menu-button").rtframework_cart_menu_button();


	/* *******************************************************************************

		USER BUTTON MENU

	********************************************************************************** */
	$.fn.rtframework_user_menu_button = function()
	{

		$(this).on("click",function(e){
			e.preventDefault();

			$(".side-panel-contents > *:not(.widget.rt_woocommerce_login)").removeClass("animate");
			$(".side-panel-contents > .widget.rt_woocommerce_login").addClass("animate");

			if( ! $("body").hasClass("side-panel-on") ){
				$(window).trigger("rt_side_panel");
			}
		});

	}

	$(".businesslounge-user-menu-button").rtframework_user_menu_button();


	/* *******************************************************************************

		CONTENT OVERLAY

	********************************************************************************** */

	$(".side-panel-holder").after('<div id="content-overlay"></div>');

	//passive close
	$("#content-overlay").on('touchstart click', function(e) {
		e.preventDefault();
		if( $("body").hasClass("side-panel-on") ){
			$(window).trigger("rt_side_panel");
		}
	});

	/* *******************************************************************************

		CURSOR CSS
		IE doesn't work with relative urls

	********************************************************************************** */
	$('<style>.side-panel-on  #content-overlay{ cursor: url("'+rtframework_params["rttheme_template_dir"]+'/images/close.cur"), pointer;}</style>').appendTo($("head"));



	/* *******************************************************************************

		SEARCH BUTTON MENU

	********************************************************************************** */

	$.fn.rt_header_search_button = function()
	{
		$(this).on("click",function(e){			
			e.preventDefault();

			setTimeout(function() {
				$('.rt-popup-search .search').focus();
			}, 500 );
		
			$.fn.rt_popup_on(".rt-popup-search");				
		});
	}

	$(".businesslounge-search-button").rt_header_search_button();


	/* *******************************************************************************

		LANGUAGE BUTTON MENU

	********************************************************************************** */
	$.fn.rtframework_language_menu_button = function()
	{
		$(this).on("click",function(e){
			e.preventDefault();
			$.fn.rt_popup_on(".rt-popup-languages");
		});
	}

	$(".businesslounge-wpml-menu-button").rtframework_language_menu_button();


	/* *******************************************************************************

		OPEN / CLOSE POPUP

	********************************************************************************** */
	$.fn.rt_popup_on = function(target)
	{	
		$(target).toggleClass("active"); 

		$('.rt-popup-content-wrapper').perfectScrollbar({
			suppressScrollX: true
		});
			
		$(document).on("keyup.rt_popup_esc",function(e){
			if (e.keyCode === 27){
				$.fn.rt_popup_off(target);
				return;
			}
		});

		$(target).find(".rt-popup-close").on("click",function(){
			$.fn.rt_popup_off(target);
			return;
		});
	};

	$.fn.rt_popup_off = function(target)
	{
		$(target).toggleClass("active"); 
		$(document).off("keyup.rt_popup_esc");
		$(target).find(".rt-popup-close").off("click");	
	};



	/* *******************************************************************************

		WOOCOMMERCE ADDED TO CART ITEM TO SIDE PANEL

	********************************************************************************** */

	if ( ! $.fn.rt_add_to_cart ) {

		$.fn.rt_add_to_cart = function()
		{

			if( typeof wc_cart_fragments_params == 'undefined' ){
				return ;
			}

			$( document.body ).on( 'click', '.add_to_cart_button', function() {
				//add classname to the parent holder
				$(this).parent().addClass("clicked");

				//bind to added_to_cart
				$( 'body' ).one( 'added_to_cart',  function() {
					$(".side-panel-contents > .widget_shopping_cart").css({"opacity":0});
					$(".businesslounge-cart-menu-button").trigger("click");
					setTimeout(function(){
						$(window).trigger("rt_fix_sticky_sidebar");
					},50);
				});

			});


		}
	}
	$.fn.rt_add_to_cart();


	/* *******************************************************************************

		Quantity

	********************************************************************************** */
	$(document.body).on("click",".quantity .rt-minus,.quantity .rt-plus", function( e ) { 
			e.preventDefault();

			var $this = $(this),
				plus = $this.hasClass("rt-plus"),
				input = $this.parent().find(".qty"),
				step = parseInt(input.prop("step")),
				min = parseInt(input.prop("min")),
				max = parseInt(input.prop("max")),
				val = parseInt(input.prop("value")),
				new_val = 0;

			if( plus ){
				new_val = val + step;
			}else{
				new_val = val - step;
			}
			new_val = min ? Math.max(min,new_val) : new_val;
			new_val = max ? Math.min(max,new_val) : new_val;
			new_val = Math.max(0,new_val);

			input.val( new_val );
			input.trigger("change");
	});


	/* *******************************************************************************

		Count Down

	********************************************************************************** */

	if ( ! $.fn.rt_countdown ) {

		$.fn.rt_countdown = function()
		{
			$(this).each(function(){

				var date = $(this).attr("data-date");
				var format = $(this).html();

				if( date === undefined ){
					return true;//skip
				}

				$(this).countdown(date, function(event) {
					$(this).html(event.strftime(format));
				});

				$(this).addClass("started");
			});
		}
	}

	$(".rt-countdown").rt_countdown();

	/* *******************************************************************************

		My account

	********************************************************************************** */
	$(".woocommerce-MyAccount-navigation .is-active a").on("click touchstart", function(e){
		$(".woocommerce-MyAccount-navigation li").show("slow");
		e.preventDefault();
		return;
	});


	/* *******************************************************************************

		CF7 - Form Icon submit

	********************************************************************************** */

	$("form .icon-submit").on("click", function(e){
		$(this).parents("form:eq(0)").submit();
		e.preventDefault();
		return;
	});


	/* *******************************************************************************

		Revslider control

	********************************************************************************** */

	if( ! $.fn.rt_rev_control ){

		$.fn.rt_rev_control = function(action)
		{

			if( ! $("body").hasClass("overlapped-header") ){
					return ;
			}

			$(".rev_slider_wrapper").each(function(){
				var $this = $(this);

				if( ! $this.parents(".content_row").last().is($(".overlapped-header #main_content > .content_row:first-child") ) ){
					return;
				}

				var id_array = $this.attr("id").split("_");
				var id = id_array[2];
				var revapi = eval('revapi'+id);
 
				revapi.on("revolution.slide.onchange",function (e,data) {

						var left_arrow = $this.find(".tp-leftarrow.custom");
						var right_arrow = $this.find(".tp-rightarrow.custom");
						var skin = data.currentslide.data("param1");

						if( "" == skin ){
							return;
						}

						$("body.overlapped-header .dynamic-skin").removeClass("businesslounge-dark-header businesslounge-light-header");
						$("body.overlapped-header .dynamic-skin").addClass("businesslounge-"+skin+"-header"); 
						$(".top-header").attr("data-color",skin);

						left_arrow.removeClass("light dark").addClass(skin);
						right_arrow.removeClass("light dark").addClass(skin);
				});

				revapi.on("revolution.slide.onbeforeswap",function (e,data) {

						var skin = data.nextslide.data("param1");

						if( "" == skin ){
							return;
						}

						if( $.fn.is_mobile_menu() || $(".top-header").hasClass("stuck") ){
							return ;
						}

					$("body.overlapped-header .dynamic-skin").css({"opacity":0.5});
				});

				revapi.on("revolution.slide.onafterswap",function (e,data) {

						var skin = data.currentslide.data("param1");

						if( "" == skin ){
							return;
						}

						if( $.fn.is_mobile_menu() || $(".top-header").hasClass("stuck") ){
							return ;
						}
					$("body.overlapped-header .dynamic-skin").css({"opacity":1});
				});

			});
		};
	}

	$(window).on("load",function(){
		$.fn.rt_rev_control();
	});


	/* ******************************************************************************* 

		CATEGORY TREE

	***********************************************************************************/ 
 	if( ! $.fn.rt_category_tree ){

		$.fn.rt_category_tree = function()
		{ 
			var category = $(this);
			category.find('.cat-item:has(.children)').addClass('has-children');
			$('<span></span>').prependTo(category.find('.cat-item:has(.children)')); 

			category.find('.cat-item:has(.children) > span').on("click", function(){
			
				var parent = $(this).parent();

				if( parent.hasClass("current-cat") || parent.hasClass("current-cat-ancestor") ){
					parent.removeClass("current-cat current-cat-ancestor");	
					parent.addClass("active");	
				}
				
				parent.toggleClass("active");
			});

		};
	}

	$(".rt-category-tree").rt_category_tree();  

	/* *******************************************************************************

		IE FIX FOR RESPONSIVE SVG BACKGROUND SHAPES

	********************************************************************************** */

	$(window).on('load resize', function() {
		setTimeout(function() {
			$('.rt-svg-background.bottom').each(function() {
				var ua = window.navigator.userAgent;


				var svg = $(this);
				var width = svg.attr("width");
				var height = svg.attr("height");
				var parent_width = svg.parent().width();
				var parent_height = svg.parent().height();
				var new_height = height * parent_width / width;

				svg.css({"padding-top":parent_height - new_height + 1 + "px"});
			});
		},150);
	});

	/* *******************************************************************************

		TABLET DROP-DOWN TOUCH FIX

	********************************************************************************** */

	$.fn.rt_menu_touch_fix = function()
	{

		$(this).on("touchstart",function(e){

			e.preventDefault();		

			var this_li = $(this).parent("li"); 
			var this_link = $(this).attr("href"); 
			var hovered = $(this).parents("ul:eq(0)").find("> li.hover");
			
			if( this_li.hasClass("hover") ){
				var href = $(this).attr('href');
				if( href != "#" || href === "" ){
					window.location = href;					
				}else{
					hovered.removeClass("hover");
				}
				return true;
			}	

			if( ! hovered.is( $( this ) ) ){
				hovered.removeClass("hover");
			}

			this_li.addClass("hover");
 			
			return false;
 			
		});

	};
	
	if(  Modernizr.touchevents ){//check touch support	 
		$( '.main-menu li:has(ul) > a').rt_menu_touch_fix(); 
	}


	/* *******************************************************************************

		TABLET NAVIGATION FIX FOR DEACTIVE STATE

	********************************************************************************** */

	$("#container").on("click",function() {
		$( '.main-menu .hover').removeClass("hover"); 
		return true;
	});


	/* ******************************************************************************* 

		CUSTOM BUTTON HOVERS

	********************************************************************************** */  
	$.fn.rt_button_hovers = function() {
		var styles = "";
		$(this).each(function(){
			var $this = $(this);  
				if($this[0].hasAttribute("data-hover-style")){
					var unique_class_name = "button-" + Math.floor((Math.random() * 10000) + 1);
					$this.addClass(unique_class_name);
					styles += "."+unique_class_name+":hover{"+$this.data("hover-style")+"}";
					$this.removeAttr("data-hover-style");
				}
		}); 
		if( styles !== "" ){
			$("<style>"+styles+"</style>").appendTo($("head"));
		}
	};

	$('.button_').rt_button_hovers();

	/* *******************************************************************************

		STICKY SIDEBARS

	********************************************************************************** */

	if( ! $.fn.rt_sticky_sidebar ){

		$.fn.rt_sticky_sidebar = function()
		{	
				var $window = $(window);

				$window.off("scroll.sidebar"); 

				if( $(this).length == 0 ){
					return;
				}

				if( Modernizr.touchevents || $.fn.is_mobile_menu() ){

					$(this).each(function(){
						$(this).removeAttr("style");
					});

					return;
				}
			
				var $stickyHeaderFields = "#wpadminbar, .sticky.top-header";
				
				$(this).each(function(){

					$(this).removeAttr("style");

					var $content_block = $(this).parents(".content_row_wrapper:eq(0)"),
						$content = $content_block.find(".content:eq(0)"),
						$sidebar = $(this),
						padding = 25,
						sidebar_left_position = $sidebar.offset().left,
						sidebar_first_left_position = $sidebar.position().left,
						sidebarHeight = $sidebar.outerHeight(),
						sidebarWidth = $sidebar.outerWidth(),
						contentHeight = $content.outerHeight(),
						sidebar_position = $sidebar.position().top,						
						content_block_top = $content_block.offset().top,
						sidebar_bottom = (sidebar_position + sidebarHeight + content_block_top) - window_height;						

						if( contentHeight > sidebarHeight ){

							$window.on("scroll.sidebar",function(event) {

								var scrollTop = $window.scrollTop();
								sidebarHeight = $sidebar.outerHeight();

								if( $.fn.is_mobile_menu() ){
									return;
								}
							
								var $addHeigth = 0;

								//sticky fields on top
								$($stickyHeaderFields).each(function(){
									$addHeigth = $addHeigth + $(this).height();
								});

								if( sidebarHeight > window_height ){//stick to the bottom

									var tmax = contentHeight - sidebarHeight;
									var ttop = scrollTop - sidebar_bottom;
									    ttop = Math.min( ttop, tmax );
									 	ttop = Math.max( ttop, padding );

										if( ttop <= padding ){
											$sidebar.removeAttr("style"); 
											return;
										}

									 	if( ttop == tmax ){
											$sidebar.css({
												"position": "absolute",
												'top':  tmax + "px",
												'bottom':  "auto",
												'left': sidebar_left_position + "px",
												'width': sidebarWidth +"px"
											}); 
											return;
										}

									 	if( ttop > padding ){
											$sidebar.css({
												"position": "fixed",
												'top':  "auto",
												'bottom':  padding  + "px",
												'left': sidebar_left_position + "px",
												'width': sidebarWidth +"px"
											}); 
											return;
										}
								}else{//stick to the top							
										var top_position = scrollTop + $addHeigth ,
										maxposition = contentHeight - ( sidebar_position + sidebarHeight ) + padding,
										topPosition = -1 * Math.min( 0 , content_block_top - top_position );
										topPosition = Math.min(  maxposition, topPosition );

										if( content_block_top - top_position > 0 ){
											$sidebar.removeAttr("style");
											return;
										}

										if( maxposition == topPosition ){
											$sidebar.css({
												"position": "absolute",
												'top': ( contentHeight - sidebarHeight ) + padding  + "px",
												'left': sidebar_first_left_position + "px",
												'width': sidebarWidth +"px"
											});
											return;
										}

										if( content_block_top - top_position < 0 ){
											$sidebar.css({
												"position": "fixed",
												'top': $addHeigth + padding + "px",
												'left': sidebar_left_position + "px",
												'width': sidebarWidth +"px"
											});
											return;
										}
								}

							});
						}
				});

		};

	}

	//run the script
	$(window).on("rt_pace_done resize rt_fix_sticky_sidebar",function(e){		 
		$(".sidebar.sticky").rt_sticky_sidebar();
		$(window).trigger("scroll"); 
	});
})(jQuery);