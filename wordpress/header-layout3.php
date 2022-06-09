<?php
if( ! rtframework_get_setting("display_header") && ! rtframework_get_setting( "sticky_header" ) ){
	return;
}
?>

	<header class="top-header" data-color="<?php echo esc_attr( rtframework_get_setting("header_color_skin") )?>">

		<?php if( rtframework_get_setting( "display_header" ) ) : ?>
		<div class="main-header-holder businesslounge-<?php echo rtframework_get_setting("header_first_color_skin");?>-header dynamic-skin">
			<div class="header-elements">

				<div class="header-row first businesslounge-<?php echo rtframework_get_setting("header_first_color_skin");?>-header dynamic-skin">
					<div class="header-col left">

						<?php
						/**
						 * rtframework_logo hook
						 *
						 * @hooked rtframework_logo_function 30
						 * 
						 */
						do_action("rtframework_logo");
						?>								
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

			</div><!-- / .header-elements -->
		</div><!-- / .main-header-header -->
		<?php endif;?>

		<?php if( rtframework_get_setting( "sticky_header" ) ) : ?>
		<div class="sticky-header-holder">
			<div class="header-elements">

				<div class="header-row businesslounge-<?php echo rtframework_get_setting("header_color_skin_sticky");?>-header">
					<div class="header-col left">
						<?php
						/**
						 * rtframework_logo hook
						 *
						 * @hooked rtframework_sticky_logo_function 30
						 * 
						 */
						do_action("rtframework_sticky_logo", array("target" => "sticky-header"));
						?>			
						<?php
						/**
						 * rtframework_header_first_left hook			
						 * 
	 					 * @hooked rtframework_navigation_function 20 (optional)				 	 
						 * @hooked rtframework_top_shortcut_buttons 30 (optional)
						 * @hooked rtframework_header_first_left_sidebar 40
						 * 
						 */
						 do_action("rtframework_header_first_left", array("target" => "sticky-header")); 
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
							do_action("rtframework_header_first_right", array("target" => "sticky-header"));
						?>		
					</div>
				</div><!-- / .header-row.first --> 
			</div>
		</div><!-- / .sticky-header-header -->
		<?php endif;?>
	</header> 