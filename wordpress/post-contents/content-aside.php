<?php
# 
# rt-theme
# post content for standart post types in listing pages
# 
extract(rtframework_get_global_value("rtframework_post_values"));
extract(rtframework_get_global_value("rtframework_blog_list_atts"));
?> 

<!-- blog box-->		
<div class="entry-content light-style text">

	<!-- blog headline--> 
	<?php 
		if( "false" !== $use_excerpts ){
			the_excerpt();
		}else{
			the_content();
			wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'businesslounge' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
		}
	?>
</div> 
<!-- / blog box-->
