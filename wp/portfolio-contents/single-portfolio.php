<?php
/**
 * The template for displaying single portfolio content
 *
 * @author 		RT-Themes
 * 
 */

global $rtframework_single_post_values;

//get post values
$rtframework_single_post_values = rt_get_portfolio_single_post_values( $post );

get_header(); ?>

	<?php if ( have_posts() ) : ?> 

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>		
			
			<?php 
			/* content */
			$content = get_the_content();

			/* check if builder used */
			$isbuilderactive = has_shortcode( get_the_content(), 'vc_row' ) || has_shortcode( get_the_content(), 'rt_row' ) || rtframework_is_built_with_elementor(); 

			/* show default gallery */
			$show_default_gallery = ( ! empty( $rtframework_single_post_values["gallery_images"] ) || ! empty( $rtframework_single_post_values["external_video"] ) || ! empty( $rtframework_single_post_values["video_mp4"] ) ) && $rtframework_single_post_values["portfolio_options"]["gallery_usage"] != "hidden" ;

 			?>



 			<?php
				/**
				 *  Default Gallery
				 */ 

				if ($show_default_gallery):
			?>

				<div class="portfolio-header default-style content_row fullwidth">
					<div class="portfolio-header-background"></div>
					<div class="content_row_wrapper">
						<div class="col col-sm-12">	
				
			<?php endif; ?>


 			<?php
				/**
				 *  Get Media 
				 */ 

				if( ! empty( $rtframework_single_post_values["portfolio_format"] ) ){
					
					if( $rtframework_single_post_values["portfolio_format"] == "image" && $rtframework_single_post_values["portfolio_options"]["gallery_usage"] != "hidden" ){
						get_template_part( "portfolio-contents/".$rtframework_single_post_values["portfolio_options"]["gallery_usage"] );
					}

					if( $rtframework_single_post_values["portfolio_format"] == "video" ){
						get_template_part( "portfolio-contents/video" );
					}					

				}
			?>	

 			<?php
				/**
				 *  Close Default Gallery Holder
				 */ 

				if ($show_default_gallery):
			?>
						</div>
					</div>
				</div>
				
			<?php endif; ?>

 			<?php
				/* open content container if builder not used */		
				do_action( "rtframework_content_container", array( "action"=>"start", "sidebar"=>rtframework_get_setting( 'sidebar_position' ), "class" => "portfolio-default-layout default-style " .rtframework_get_setting( "default_content_row_width" ),  "wrapper_class" => rtframework_get_setting("default_content_wrapper_width"), "echo" => rtframework_get_setting( 'sidebar_position' ) == "fullwidth" && $isbuilderactive && $rtframework_single_post_values["page_layout"] != "default" || ( rtframework_is_content_empty( $content ) && empty( $rtframework_single_post_values["key_details"] ) )  ? false : true  ));				
			?>	

			<?php if( $rtframework_single_post_values["page_layout"] == "default" &&  ! empty( $rtframework_single_post_values["key_details"] ) ): ?>
				<div class="row">

					<div class="col col-md-9 col-sm-12 portfolio-text">
						<div class="column-inner">
							<?php 
								/**
								 * Main Content
								 */
								the_content();			
							?>
						</div>
					</div>

					<div class="col col-md-3 col-sm-12 key-details">
						<div class="column-inner">
							<?php 
								/**
								 * Key Details
								 */
								echo apply_filters( "rtframework_the_content", wp_kses_post( $rtframework_single_post_values["key_details"] ) );									
							?>

							<?php 
							/**
							 * Social Share
							 */
							if( apply_filters("rtframework_portfolio_share" , rtframework_get_setting("portfolio_share") ) ): ?>
									<?php 
										//Social Share buttons
										echo rtframework_social_media_share( $atts = array("postid" => get_the_ID()) );
									?> 
							<?php endif; ?>	
						</div>						
					</div>

				</div> 
			<?php else:?>
				<?php 
					/**
					* Main Content
					*/
					the_content();			
				?>
			<?php endif; ?>						


			<?php 
				/* close content container if builder not used */		
				do_action("rtframework_content_container",array("action"=>"end", "sidebar"=>rtframework_get_setting( 'sidebar_position' ), "class" => rtframework_get_setting( "default_content_row_width" ),  "wrapper_class" => rtframework_get_setting("default_content_wrapper_width"), "echo" => rtframework_get_setting( 'sidebar_position' ) == "fullwidth" && $isbuilderactive && $rtframework_single_post_values["page_layout"] != "default" || ( rtframework_is_content_empty( $content ) && empty( $rtframework_single_post_values["key_details"] ) )  ? false : true ));
			?>

		<?php endwhile; ?>		

	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
 
<?php get_footer(); ?>