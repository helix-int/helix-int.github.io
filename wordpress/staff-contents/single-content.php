<?php
/**
 * 
 * template for displaying staff detail page
 *
 */
$position = get_post_meta( $post->ID, 'rttheme_position', true); 	
get_header(); ?>
 
<?php if ( have_posts() ) : ?> 
	<div <?php post_class("single")?> id="person-<?php the_ID(); ?>">	

		<?php /* The loop */ ?>
		
		<?php while ( have_posts() ) : the_post(); ?>		

		<div class="row">
			<div class="col col-sm-8">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'businesslounge' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>			
			</div>

			<div class="col col-sm-4">
					<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>								
					<div class="entry-thumbnail aligncenter">
						<?php echo rtframework_get_resized_image_output( array( "image_url" => "", "image_id" => get_post_thumbnail_id(), "w" => 300, "h" => 100000, "crop" => "" ) ); ?>
					</div>
				<?php endif; ?>						

				<div class="staff-single-media-links aligncenter margin-t30">
					<?php do_action("rtframework_staff_media_links",get_the_ID()) ?>
				</div>
			</div>
						
		</div>
		<?php endwhile; ?>		
	</div>
<?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>