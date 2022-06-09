<?php
/* 
* rt-theme archive
*/
get_header();
?>
	<?php if( is_author() ){
		get_template_part("author","bio");
	}
	?>

	<?php 
		if ( have_posts() ){
			do_action( "rtframework_blog_post_loop", $wp_query, array("more"=>1));			
		}else{				
			get_template_part( 'content', 'none' );
		}
	?>

<?php get_footer(); ?>