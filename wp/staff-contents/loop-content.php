<?php
# 
# BusinessLounge
# loop item for portfolio custom posts
# image post format
#

$item_width = rtframework_get_global_value("rt_item_width"); 
$short_data = get_post_meta( $post->ID, 'rttheme_short_data', true); 		
$position = get_post_meta( $post->ID, 'rttheme_position', true); 	
$long_data = get_the_content();
$permalink = ! empty( $long_data ) ? get_the_permalink() : "";
?>

<?php if ( ! post_password_required() ) : ?>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="person_image">		
		<div class="person_image_wrapper">
			<?php
			// Create thumbnail image
			$thumbnail_image_output = rtframework_get_resized_image_output( array( "image_url" => "", "image_id" => get_post_thumbnail_id(), "w" => rtframework_get_min_resize_size( $item_width ), "h" => 100000, "crop" => "" ) ); 	
			?>

			<?php if( $permalink ) : ?>
				<a href="<?php echo esc_url($permalink);?>"><?php echo wp_kses_post($thumbnail_image_output);?></a>
			<?php else:?>
				<?php echo wp_kses_post($thumbnail_image_output);?>
			<?php endif;?>			
		</div>
	</div>
	<?php endif;?>

	<div class="person_data">

		<?php if( $permalink ) : ?>
			<h5 class="person_name"><a href="<?php echo esc_url($permalink);?>"><?php the_title();?></a></h5>
		<?php else:?>
			<h5 class="person_name"><?php the_title();?></h5>
		<?php endif;?>

		<?php if(! empty( $position )) : ?>
			<span class="position"><?php echo apply_filters( "rtframework_team_position", esc_attr( $position ) );?></span>
		<?php endif;?>

		<?php if(! empty( $short_data )) : ?>
		<div class="profile">
			<?php echo apply_filters( "rtframework_the_content", $short_data );?>
		</div> 
		<?php endif;?>

		<?php do_action("rtframework_staff_media_links",$post->ID); ?>	
	</div> 
	
<?php endif;?>			