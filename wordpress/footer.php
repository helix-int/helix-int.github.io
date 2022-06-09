<?php 
/* close content container if builder not used */
do_action("rtframework_content_container",array("action"=>"end","sidebar"=>rtframework_get_setting('sidebar_position'),"echo" => ! rtframework_is_composer_allowed() ));
?>

</div><!-- / end #main_content -->
<?php do_action("rtframework_before_footer"); ?> 
<?php get_template_part("footer-layout1" ); ?>
<?php do_action("rtframework_before_container"); ?> 
</div><!-- / end #container --> 

<?php wp_footer();?>
</body>
</html>