<?php global $themename; ?>
<form class="search" action="<?php echo get_home_url(); ?>">
	<input name="s" class="search_input" type="text" value="<?php _e('Site search', $themename); ?>" placeholder="<?php _e('Site search', $themename); ?>" />
	<input class="icon_small_arrow margin_right_white" type="submit" value="<?php _e('Search', $themename); ?>" />
</form>