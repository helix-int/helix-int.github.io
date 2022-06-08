<div class="rt-popup rt-popup-languages">
	<button class="rt-popup-close ui-icon-exit"></button>
	<div class="rt-popup-content-wrapper">
		<div class="rt-popup-content">
			<h5><?php esc_html_e("Switch The Language","businesslounge");?></h5>
			<div class="businesslounge-language-list">
				<?php 
					echo rtframework_wpml_languages_custom_flags(true);	
				?>
			</div>
		</div>
	</div>
</div>