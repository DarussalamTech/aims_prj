<?php
class home_box_widget extends WP_Widget 
{
	/** constructor */
    function home_box_widget() 
	{
		global $themename;
		$widget_options = array(
			'classname' => 'home_box_widget',
			'description' => 'Displays Box with some content'
		);
		$control_options = array('width' => 460);
        parent::WP_Widget('gymbase_home_box', __('Home Box', $themename), $widget_options, $control_options);
    }
	
	/** @see WP_Widget::widget */
    function widget($args, $instance) 
	{
		global $themename;
        extract($args);

		//these are our widget options
		$title = $instance['title'];
		$title_color = $instance['title_color'];
		$subtitle = $instance['subtitle'];
		$subtitle_color = $instance['subtitle_color'];
		$color = $instance['color'];
		$custom_color = $instance['custom_color'];
		$icon = $instance['icon'];
		$type = $instance['type'];
		$content = $instance['content'];
		$text_color = $instance['text_color'];
		$more_button_url = $instance['more_button_url'];
		$more_button_label = $instance['more_button_label'];

		echo $before_widget;
		?>
		<li class="home_box <?php echo $color; ?>"<?php echo ($custom_color!="" ? ' style="background-color: #' . $custom_color . '"' : ''); ?>>
			<?php
			if($title) 
			{
				if($title_color!="")
					$before_title = str_replace(">", " style='color: #" . $title_color . ";'>",$before_title);
				echo $before_title . $title . $after_title;
			}
			?>
			<?php if($subtitle!=""): ?>
			<h3<?php echo ($subtitle_color!="" ? " style='color: #" . $subtitle_color . ";'" : ""); ?>><?php echo $subtitle; ?></h3>
			<?php endif;
			if($type=='normal'):
			?>
			<div class="news clearfix">
				<?php 
			endif;
				if($icon!="" && $type=="normal"): ?>
				<span class="banner_icon <?php echo $icon; ?>"></span>
				<?php endif; ?>
				<?php if($content!=""):
						if($type=="normal"):
				?>
				<div class="text"<?php echo ($text_color!="" ? " style='color: #" . $text_color . ";'" : ""); ?>>	
			<?php 
						endif;
					echo do_shortcode($content);
					if($type=='normal'):
					?>
				</div>
					<?php
					endif;
				endif; ?>
				<?php if($more_button_url!=""): ?>
				<a class="more<?php echo ($color=="light_green" || $color=="green" ? ' black' : ($color=="white" ? ' light': '')); ?> icon_small_arrow margin_right_white" href="<?php echo esc_attr($more_button_url); ?>" title="<?php echo esc_attr($more_button_label); ?>"><?php echo esc_attr($more_button_label); ?></a>
				<?php endif;
				if($type=='normal'):
				?>
			</div>
				<?php endif; ?>
		</li>
		<?php
        echo $after_widget;
    }
	
	/** @see WP_Widget::update */
    function update($new_instance, $old_instance) 
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['title_color'] = strip_tags($new_instance['title_color']);
		$instance['subtitle'] = strip_tags($new_instance['subtitle']);
		$instance['subtitle_color'] = strip_tags($new_instance['subtitle_color']);
		$instance['color'] = strip_tags($new_instance['color']);
		$instance['custom_color'] = strip_tags($new_instance['custom_color']);
		$instance['icon'] = strip_tags($new_instance['icon']);
		$instance['type'] = strip_tags($new_instance['type']);
		$instance['content'] = strip_tags($new_instance['content']);
		$instance['text_color'] = strip_tags($new_instance['text_color']);
		$instance['more_button_url'] = strip_tags($new_instance['more_button_url']);
		$instance['more_button_label'] = strip_tags($new_instance['more_button_label']);
		return $instance;
    }
	
	 /** @see WP_Widget::form */
	function form($instance) 
	{	
		global $themename;
		$title = esc_attr($instance['title']);
		$title_color = esc_attr($instance['title_color']);
		$subtitle = esc_attr($instance['subtitle']);
		$subtitle_color = esc_attr($instance['subtitle_color']);
		$color = esc_attr($instance['color']);
		$custom_color = esc_attr($instance['custom_color']);
		$icon = esc_attr($instance['icon']);
		$type = esc_attr($instance['type']);
		$content = esc_attr($instance['content']);
		$text_color = esc_attr($instance['text_color']);
		$more_button_url = esc_attr($instance['more_button_url']);
		$more_button_label = esc_attr($instance['more_button_label']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', $themename); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('title_color'); ?>"><?php _e('Title color', $themename); ?></label>
			<input class="widefat color" id="<?php echo $this->get_field_id('title_color'); ?>" name="<?php echo $this->get_field_name('title_color'); ?>" type="text" value="<?php echo $title_color; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Subtitle', $themename); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo $subtitle; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('subtitle_color'); ?>"><?php _e('Subtitle color', $themename); ?></label>
			<input class="widefat color" id="<?php echo $this->get_field_id('subtitle_color'); ?>" name="<?php echo $this->get_field_name('subtitle_color'); ?>" type="text" value="<?php echo $subtitle_color; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('color'); ?>"><?php _e('Color', $themename); ?></label>
			<select id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>">
				<option <?php echo ($color=='white' ? ' selected="selected"':'');?> value='white'><?php _e("white", $themename); ?></option>
				<option <?php echo ($color=='light_green' ? ' selected="selected"':'');?> value='light_green'><?php _e("light_green", $themename); ?></option>
				<option <?php echo ($color=='green' ? ' selected="selected"':'');?> value='green'><?php _e("green", $themename); ?></option>
				<option <?php echo ($color=='dark' ? ' selected="selected"':'');?> value='dark'><?php _e("dark", $themename); ?></option>
			</select>
			<?php _e('or pick custom one: ', $themename); ?>
			<input type="text" class="regular-text color" value="<?php echo $custom_color; ?>" id="<?php echo $this->get_field_id('custom_color'); ?>" name="<?php echo $this->get_field_name('custom_color'); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon', $themename); ?></label>
			<select id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>">
				<option <?php echo ($icon=='' ? ' selected="selected"':'');?> value=''>-</option>
				<option <?php echo ($icon=='calendar' ? ' selected="selected"':'');?> value='calendar'><?php _e("calendar", $themename); ?></option>
				<option <?php echo ($icon=='hand' ? ' selected="selected"':'');?> value='hand'><?php _e("hand", $themename); ?></option>
				<option <?php echo ($icon=='note' ? ' selected="selected"':'');?> value='note'><?php _e("note", $themename); ?></option>
				<option <?php echo ($icon=='phone' ? ' selected="selected"':'');?> value='phone'><?php _e("phone", $themename); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Type', $themename); ?></label>
			<select id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>">
				<option <?php echo ($type=='normal' ? ' selected="selected"':'');?> value='normal'><?php _e("normal", $themename); ?></option>
				<option <?php echo ($type=='sidebar' ? ' selected="selected"':'');?> value='sidebar'><?php _e("sidebar", $themename); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content', $themename); ?></label>
			<textarea rows="10" class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text_color'); ?>"><?php _e('Content text color', $themename); ?></label>
			<input class="widefat color" id="<?php echo $this->get_field_id('text_color'); ?>" name="<?php echo $this->get_field_name('text_color'); ?>" type="text" value="<?php echo $text_color; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('more_button_url'); ?>"><?php _e('Button url', $themename); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('more_button_url'); ?>" name="<?php echo $this->get_field_name('more_button_url'); ?>" type="text" value="<?php echo $more_button_url; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('more_button_label'); ?>"><?php _e('Button label', $themename); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('more_button_label'); ?>" name="<?php echo $this->get_field_name('more_button_label'); ?>" type="text" value="<?php echo $more_button_label; ?>" />
		</p>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			$(".color").ColorPicker({
				onChange: function(hsb, hex, rgb, el) {
					$(el).val(hex);
				},
				onSubmit: function(hsb, hex, rgb, el){
					$(el).val(hex);
					$(el).ColorPickerHide();
				},
				onBeforeShow: function (){
					$(this).ColorPickerSetColor(this.value);
				}
			});
		});
		</script>
		<?php
	}
}
//register widget
add_action('widgets_init', create_function('', 'return register_widget("home_box_widget");'));
?>