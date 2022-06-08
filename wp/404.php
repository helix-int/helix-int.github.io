<?php
/**
 * 
 * 404 template
 *
 */
get_header(); ?>

<div class="row clearfix page-404">	
	
	<div class="col col-sm-4">
		<span class="icon-address"></span>
	</div>

	<div class="col col-sm-8">
		<h1>404</h1>

		<p><?php esc_html_e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'businesslounge'); ?></p>

		<?php get_template_part("searchform"); ?>
	</div>

</div>

<?php get_footer(); ?>