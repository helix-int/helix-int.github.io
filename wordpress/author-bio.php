<?php
/* 
* rt-theme author bio 
*/

$author_meta_description = get_the_author_meta( 'description' );

if( ! empty( $author_meta_description ) ):
?>
<div class="author-info">

	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
	</div>
	<div class="author-description">
		<span class="author-title"><?php printf( esc_html__( 'About %s', 'businesslounge' ), get_the_author() ); ?></span>
		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p>
	</div>
</div>
<?php endif;?>