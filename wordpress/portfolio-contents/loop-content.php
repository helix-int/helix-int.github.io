<?php
/**
 * The template for displaying portfolio content within loops.
 *
 * @author 		RT-Themes
 * 
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

extract(rtframework_get_global_value("rtframework_portfolio_post_values"));
extract(rtframework_get_global_value("rtframework_portfolio_list_atts"));
?> 

<!-- portfolio box-->
<div <?php post_class("loop ".$item_style." ".$hover_style." ".$box_style." ". $portfolio_format)?> id="portfolio-<?php the_ID(); ?>">

	<div class="portfolio-loop-item-wrapper">
		<?php 
			//title output
			$title_output = $permalink ? sprintf('<h5 class="title"><a href="%s" target="%s" rel="bookmark">%s</a></h5>',esc_url($permalink),esc_attr($target),$title) : sprintf('<h5 class="title">%s</h5>',$title) ;

			//read more
			$read_more = $permalink ? sprintf('<a class="read_more" href="%s" target="%s">%s</a>',esc_url($permalink),esc_attr($target), apply_filters( "rtframework_portfolio_more_text", "" ) ) : "";

			//shor desc output
			$desc_output = ! empty( $short_desc ) && $display_excerpts == "true" ? sprintf( '<p>%s%s</p>', $short_desc, $read_more ) : "" ;

			//getterms list
			$term_list = $display_categories == "true" ? get_the_term_list( $post->ID, 'portfolio_categories', '<span class="terms">', ', ', '</span>' ) : "";

			//thumbnail with link
			$thumbnail_with_link = $permalink ? sprintf('<a href="%2$s" target="%3$s" title="%4$s">%1$s</a>', $thumbnail_image_output, esc_url($permalink), esc_attr($target), esc_attr($title) ) : $thumbnail_image_output;			

			//output
			if( $item_style == "style-1" ){

				printf(' 
					<figure class="image-thumbnail">
						%1$s
					</figure>

					<section class="text">
						%5$s
						%2$s
						%3$s
						%4$s
						%6$s
					</section>  
				', $thumbnail_with_link, $title_output, $term_list, $desc_output, apply_filters( "rtframework_portfolio_before_text", "" ), apply_filters( "rtframework_portfolio_after_text", "" ) );

			}else{
				
				if( $hover_style == "hover-1" ){

					printf('

						<figure class="image-thumbnail">
							%1$s
						</figure>

						<div class="visible_title">
							<h5 class="title">%2$s</h5>
						</div>

						<div class="overlay">
							<section class="text">
								%6$s	
								%3$s
								%4$s
								%5$s				
								%7$s	
							</section> 	
						</div>

					', $thumbnail_with_link, esc_attr($title), $title_output, $term_list, $desc_output, apply_filters( "rtframework_portfolio_before_text", "" ), apply_filters( "rtframework_portfolio_after_text", "" ) );

				}else{

					$blank_link = $permalink ? sprintf('<a href="%1$s" target="%2$s" title="%3$s"></a>', esc_url($permalink), esc_attr($target), esc_attr($title) ) : "";			

					printf('

						<figure class="image-thumbnail">
							%1$s			
						</figure>
					
						<div class="overlay">

							<section class="text">
								%6$s
								%2$s
								%3$s
								%4$s
								%7$s				
							</section> 	 

							%5$s				
						</div>

					', $thumbnail_image_output, $title_output, $term_list, $desc_output, $blank_link, apply_filters( "rtframework_portfolio_before_text", "" ), apply_filters( "rtframework_portfolio_after_text", "" ) );

				}

			}
		?>
	</div>
</div> 
<!-- / portfolio box-->
