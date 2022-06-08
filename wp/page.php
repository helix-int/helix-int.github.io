<?php
/**
 * 
 * The template for displaying all pages
 *
 */
get_header(); ?>

	<?php if ( have_posts() ) : ?> 

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>		
			
			<?php 
			/* check if builder used */
			$isbuilderactive = has_shortcode( get_the_content(), 'vc_row' ) || has_shortcode( get_the_content(), 'rt_row' ) || rtframework_is_built_with_elementor(); 

			/* open content container if builder not used */		
			do_action( "rtframework_content_container", array( "action"=>"start", "sidebar"=>rtframework_get_setting('sidebar_position'), "class" => rtframework_get_setting( "default_content_row_width" ), "wrapper_class" => rtframework_get_setting("default_content_wrapper_width"), "echo" => rtframework_get_setting('sidebar_position') == "fullwidth" && $isbuilderactive ? false : true , "isbuilderactive" => $isbuilderactive ));
			?>

				<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php endif; ?>			
				
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'businesslounge' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>			

			<?php 
			/* close content container if builder not used */		
			do_action("rtframework_content_container",array("action"=>"end", "sidebar"=>rtframework_get_setting('sidebar_position'), "class" => rtframework_get_setting( "default_content_row_width" ), "wrapper_class" => rtframework_get_setting("default_content_wrapper_width"), "echo" => rtframework_get_setting('sidebar_position') == "fullwidth" && $isbuilderactive ? false : true , "isbuilderactive" => $isbuilderactive));
			?>


			<?php
				/**
				 * Comments
				 */
				if( get_theme_mod( 'businesslounge_page_comments' ) != "disabled" && comments_open() ):
			?>
					<?php
						/* open content container for commments if builder is used */		
						do_action( "rtframework_content_container", array( "action"=>"start", "class" => "default-style ".rtframework_get_setting( "default_content_row_width" ), "wrapper_class" => rtframework_get_setting("default_content_wrapper_width"), "echo" => true ) );
					?>

						<div class='entry commententry'>
							<?php comments_template(); ?>
						</div>

					<?php 
						/* close content container for commments if builder is used */		
						do_action( "rtframework_content_container", array( "action"=>"end", "echo" => true ) );
					?>

			<?php endif;?>


		<?php endwhile; ?>		

	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
 
<?php get_footer(); ?>
