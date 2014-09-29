<?php error_reporting(0); ?>
<?php get_header(); ?>

    
    <?php //echo theme_home_box_container("",theme_home_box());?>
    <?php echo theme_slider();?>
    <?php //echo theme_slider_content();?>
    <?php echo do_shortcode(theme_slider_content().'[wonderplugin_carousel id="1"]'); ?>


    
<?php get_footer(); ?>