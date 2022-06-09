<?php
/**
 * 
 * Template Name: Blank Page
 *
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head> 
<meta charset="<?php bloginfo( 'charset' ); ?>" />  
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php do_action("rtframework_after_body"); ?>

<!-- background wrapper -->
<div id="container">   
<?php do_action("rtframework_after_container"); ?> 

	<!-- main contents -->
	<div id="main_content">

	<?php if ( have_posts() ) : ?> 

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>		
			
			<?php 
			/* check if builder used */
			$isbuilderactive = has_shortcode( get_the_content(), 'vc_row' ) || has_shortcode( get_the_content(), 'rt_row' )  || rtframework_is_built_with_elementor();
			
			/* open content container if builder not used */		
			do_action( "rtframework_content_container", array( "action"=>"start", "sidebar"=>rtframework_get_setting( 'sidebar_position' ), "echo" => rtframework_get_setting( 'sidebar_position' ) == "fullwidth" && $isbuilderactive ? false : true ) );
			?>
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'businesslounge' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>			

			<?php 
			/* close content container if builder not used */		
			do_action("rtframework_content_container",array("action"=>"end", "sidebar"=>rtframework_get_setting( 'sidebar_position' ), "echo" => rtframework_get_setting( 'sidebar_position' ) == "fullwidth" && $isbuilderactive ? false : true ));
			?>


			<?php
				/**
				 * Comments
				 */
				if( get_theme_mod( 'businesslounge_page_comments' ) != "disabled" && comments_open() ):
			?>
					<?php
						/* open content container for commments if builder is used */		
						do_action( "rtframework_content_container", array( "action"=>"start", "overlap" => false ,"echo" => true ) );
					?>

						<div class='entry commententry'>
							<?php comments_template(); ?>
						</div>

					<?php 
						/* close content container for commments if builder is used */		
						do_action( "rtframework_content_container", array( "action"=>"end", "overlap" => false ,"echo" => true ) );
					?>

			<?php endif;?>


		<?php endwhile; ?>		

	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>

	</div><!-- / end #main_content -->
	
</div><!-- / end #container --> 

<?php wp_footer(); ?>
</body>
</html>