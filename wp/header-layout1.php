<?php
if( ! rtframework_get_setting("display_header") && ! rtframework_get_setting( "sticky_header" ) ){
	return;
}
?>

	<header class="top-header" data-color="<?php echo esc_attr( rtframework_get_setting("header_color_skin") )?>">

		<?php if( rtframework_get_setting( "display_header" ) ) : ?>
		<div class="main-header-holder">
			<div class="header-elements">

				<?php
				/**
				 * rtframework_logo hook
				 *
				 * @hooked rtframework_logo_function 30
				 * 
				 */
				do_action("rtframework_logo");
				?>			

				<div class="header-row first businesslounge-<?php echo rtframework_get_setting("businesslounge_header_first_color_skin");?>-header">
					<div class="header-col left">
						<?php
						/**
						 * rtframework_header_first_left hook			
						 * 
	 					 * @hooked rtframework_navigation_function 20 (optional)				 	 
						 * @hooked rtframework_top_shortcut_buttons 30 (optional)
						 * @hooked rtframework_header_first_left_sidebar 40
						 * 
						 */
						 do_action("rtframework_header_first_left"); 
						?>		 
					</div>

					<div class="header-col right">
						<?php
						/**
						 * rtframework_header_first_right hook
						 *
					 	 * @hooked rtframework_header_first_right_sidebar 10
	 					 * @hooked rtframework_navigation_function 20 (optional)				 	 
						 * @hooked rtframework_top_shortcut_buttons 30 (optional)
						 * 
						 */
						do_action("rtframework_header_first_right");
						?>		
					</div>
				</div><!-- / .header-row.first -->


				<div class="header-row second businesslounge-<?php echo rtframework_get_setting("businesslounge_header_second_color_skin");?>-header dynamic-skin">
					<div class="header-col left">
						<?php
						/**
						 * rtframework_header_second_left hook
						 * 
	 					 * @hooked rtframework_navigation_function 20 (optional)				 	 
						 * @hooked rtframework_top_shortcut_buttons 30 (optional)
						 * @hooked rtframework_header_second_left_sidebar 20
						 * 
						 */	
						 do_action("rtframework_header_second_left"); 
						?>			
					</div>

					<div class="header-col right">
						<?php
						/**
						 * rtframework_header_second_right hook
						 *
						 * @hooked rtframework_header_second_right_sidebar 10
	 					 * @hooked rtframework_navigation_function 20 (optional)				 	 
						 * @hooked rtframework_top_shortcut_buttons 30 (optional)
						 * 
						 */
						do_action("rtframework_header_second_right"); 
						?>		
					</div> 			
				</div><!-- / .header-row.second -->
			</div><!-- / .header-elements -->
		</div><!-- / .main-header-header -->
		<?php endif;?>

		<?php if( rtframework_get_setting( "sticky_header" ) ) : ?>
		<div class="sticky-header-holder">
			<div class="header-elements">
				<div class="header-row businesslounge-<?php echo rtframework_get_setting("businesslounge_header_first_color_skin");?>-header">
					<div class="header-col left">
			
						<?php
						/**
						 * rtframework_sticky_logo hook
						 *
						 * @hooked rtframework_sticky_logo_function 30
						 * 
						 */
						do_action("rtframework_sticky_header_left", array("target" => "sticky-header")); 
						?>		
					</div>

					<div class="header-col right">
						<?php
						/**
						 * rtframework_header_first_right hook
						 *
					 	 * @hooked rtframework_navigation_function 10 
					 	 * @hooked rtframework_top_shortcut_buttons 30 
						 * 
						 */
						do_action("rtframework_sticky_header_right", array("target" => "sticky-header")); 
						?>		
					</div>
				</div><!-- / .header-row.first --> 
			</div>
		</div><!-- / .sticky-header-header -->
		<?php endif;?>
		
	</header> 