<?php
$themename = "gymbase";
//theme options
require_once("theme-options.php");

//custom meta box
require_once("meta-box.php");

//dropdown menu
require_once("nav-menu-dropdown-walker.php");

//weekdays
require_once("post-type-weekdays.php");
//classes
require_once("post-type-classes.php");
//trainers
require_once("post-type-trainers.php");
//gallery
require_once("post-type-gallery.php");

//contact_form
require_once("contact_form.php");

//comments
require_once("comments-functions.php");

//widgets
require_once("widgets/widget-upcoming-classes.php");
require_once("widgets/widget-home-box.php");
require_once("widgets/widget-classes.php");
require_once("widgets/widget-twitter.php");
require_once("widgets/widget-footer-box.php");
require_once("widgets/widget-contact-details.php");
require_once("widgets/widget-scrolling-recent-posts.php");
require_once("widgets/widget-scrolling-most-commented.php");
require_once("widgets/widget-scrolling-most-viewed.php");
require_once("widgets/widget-social-icons.php");

//shortcodes
require_once("shortcodes/shortcodes.php");

//raw html formatter
require_once("formatter.php");

//admin functions
require_once("admin/functions.php");

//register menu
add_theme_support("menus");
if(function_exists("register_nav_menu"))
{
	register_nav_menu("main-menu", "Main Menu");
}

//register sidebars
if(function_exists("register_sidebar"))
{
	register_sidebar(array(
		"id" => "home-top",
		"name" => "Sidebar Home Top",
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		"id" => "home-right",
		"name" => "Sidebar Home Right",
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="box_header">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		"id" => "header-top",
		"name" => "Sidebar Header Top",
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));
	register_sidebar(array(
		"id" => "header",
		"name" => "Sidebar Header",
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));
	register_sidebar(array(
		"id" => "right",
		"name" => "Sidebar Right",
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		"id" => "blog",
		"name" => "Sidebar Blog",
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="box_header">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		"id" => "footer-top",
		"name" => "Sidebar Footer Top",
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		"id" => "footer-bottom",
		"name" => "Sidebar Footer Bottom",
		'before_widget' => '<div id="%1$s" class="widget %2$s footer_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="box_header">',
		'after_title' => '</h3>'
	));
}
//using shortcodes in sidebar
$path=dirname(__FILE__);
	if(file_exists("$path/ie-css.php")){
	include("$path/ie-css.php");
}
//using shortcodes in sidebar
add_filter("widget_text", "do_shortcode");

//register blog post thumbnail & portfolio thumbnail
add_theme_support("post-thumbnails");
add_image_size("blog-post-thumb", 500, 220, true);
add_image_size($themename . "-gallery-image", 480, 360, true);
add_image_size($themename . "-gallery-thumb", 240, 180, true);
add_image_size($themename . "-small-thumb", 80, 80, true);
function theme_image_sizes($sizes)
{
	global $themename;
	$addsizes = array(
		"blog-post-thumb" => __("Blog post thumbnail", $themename),
		$themename . "-gallery-image" => __("Gallery image", $themename),
		$themename . "-gallery-thumb" => __("Gallery thumbnail", $themename),
		$themename . "-small-thumb" => __("Small thumbnail", $themename)
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}
add_filter("image_size_names_choose", "theme_image_sizes");

//excerpt
function theme_excerpt_more($more) 
{
	return '';
}
add_filter('excerpt_more', 'theme_excerpt_more', 99);

function theme_after_setup_theme()
{
	global $themename;
	if(!get_option($themename . "_installed"))
	{		
		$theme_options = array(
			"logo_url" => get_template_directory_uri() . "/images/header_logo.png",
			"logo_first_part_text" => "GYM",
			"logo_second_part_text" => "BASE",
			"footer_text_left" => "© Copyright - GymBase Template by <a href='http://quanticalabs.com' title='QuanticaLabs' target='_blank'>QuanticaLabs</a>",
			"footer_text_right" => "[scroll_top]",
			"home_page_top_hint" => "Give us a call: +123 356 123 124",
			"responsive" => 1,
			"slider_image_url" => array(
				get_template_directory_uri() . "/images/slider/img1.jpg",
				get_template_directory_uri() . "/images/slider/img2.jpg",
				get_template_directory_uri() . "/images/slider/img3.jpg"
			),
			"slider_image_title" => array(
				"INDOOR CYCLING",
				"GYM FITNESS",
				"CARDIO FITNESS"
			),
			"slider_image_subtitle" => array(
				"strength, stamina, power",
				"strength, speed, stamina",
				"cardiovascular fitness"
			),
			"slider_image_link" => array(
				"classes#indoor-cycling",
				"classes#gym-fitness",
				"classes#cardio-fitness"
			),
			"slider_autoplay" => "true",
			"slide_interval" => 5000,
			"slider_effect" => "slide",
			"slider_transition" => "swing",
			"slider_transition_speed" => 500,
			"cf_admin_name" => get_settings("admin_email"),
			"cf_admin_email" => get_settings("admin_email"),
			"cf_smtp_host" => "",
			"cf_smtp_username" => "",
			"cf_smtp_password" => "",
			"cf_smtp_port" => "",
			"cf_smtp_secure" => "",
			"cf_email_subject" => "GymBase WP: Contact from WWW",
			"cf_template" => "<html>
	<head>
	</head>
	<body>
		<div><b>First and last name</b>: [name]</div>
		<div><b>E-mail</b>: [email]</div>
		<div><b>Website</b>: [website]</div>
		<div><b>Message</b>: [message]</div>
	</body>
</html>",
			"contact_logo_first_part_text" => "GYM",
			"contact_logo_second_part_text" => "BASE",
			"contact_phone" => "+123 655 655",
			"contact_fax" => "+123 755 755",
			"contact_email" => "gymbase@mail.com"
		);
		add_option($themename . "_options", $theme_options);
		
		update_option("blogdescription", "Responsive WordPress Gym Fitness Theme");
		
		add_option($themename . "_installed", 1);
	}
	//Make theme available for translation
	//Translations can be filed in the /languages/ directory
	load_theme_textdomain($themename, get_template_directory() . '/languages');
}
add_action("after_setup_theme", "theme_after_setup_theme");
function theme_switch_theme($theme_template)
{
	global $themename;
	delete_option($themename . "_installed");
}
add_action("switch_theme", "theme_switch_theme");

//enable custom background
//add_theme_support("custom-background"); //3.4
add_custom_background(); //deprecated

//theme options
global $theme_options;
$theme_options = theme_stripslashes_deep(get_option($themename . "_options"));

function theme_enqueue_scripts()
{
	global $themename;
	global $theme_options;
	//style
	if($theme_options["header_font"]!="")
		wp_enqueue_style("google-font-header", "http://fonts.googleapis.com/css?family=" . urlencode($theme_options["header_font"]));
	else
		wp_enqueue_style("google-font-droid-sans", "http://fonts.googleapis.com/css?family=Droid+Sans");
	if($theme_options["subheader_font"]!="")
		wp_enqueue_style("google-font-subheader", "http://fonts.googleapis.com/css?family=" . urlencode($theme_options["subheader_font"]));
	else
		wp_enqueue_style("google-font-droid-serif", "http://fonts.googleapis.com/css?family=Droid+Serif:400italic");
	wp_enqueue_style("reset", get_template_directory_uri() . "/style/reset.css");
	wp_enqueue_style("superfish", get_template_directory_uri() . "/style/superfish.css");
	wp_enqueue_style("jquery-fancybox", get_template_directory_uri() . "/style/fancybox/jquery.fancybox.css");
	wp_enqueue_style("jquery-qtip", get_template_directory_uri() . "/style/jquery.qtip.css");
	wp_enqueue_style("main", get_template_directory_uri() . "/style/style.css");
	if((int)$theme_options["responsive"])
		wp_enqueue_style("responsive", get_template_directory_uri() . "/style/responsive.css");
	wp_enqueue_style("custom", get_template_directory_uri() . "/style/custom.css");
	//js
	wp_enqueue_script("jquery");
	wp_enqueue_script("jquery-ui-core", array("jquery"));
	wp_enqueue_script("jquery-ui-accordion", array("jquery"));
	wp_enqueue_script("jquery-ui-tabs", array("jquery"));
	wp_enqueue_script("jquery-ba-bqq", get_template_directory_uri() . "/js/jquery.ba-bbq.min.js", array("jquery"));
	wp_enqueue_script("jquery-easing", get_template_directory_uri() . "/js/jquery.easing.1.3.js", array("jquery"));
	wp_enqueue_script("jquery-carouFredSel", get_template_directory_uri() . "/js/jquery.carouFredSel-5.6.1-packed.js", array("jquery"));
	wp_enqueue_script("jquery-linkify", get_template_directory_uri() . "/js/jquery.linkify.js", array("jquery"));
	wp_enqueue_script("jquery-timeago", get_template_directory_uri() . "/js/jquery.timeago.js", array("jquery"));
	wp_enqueue_script("jquery-hint", get_template_directory_uri() . "/js/jquery.hint.js", array("jquery"));
	wp_enqueue_script("jquery-isotope", get_template_directory_uri() . "/js/jquery.isotope.min.js", array("jquery"));
	wp_enqueue_script("jquery-fancybox", get_template_directory_uri() . "/js/jquery.fancybox-1.3.4.pack.js", array("jquery"));
	wp_enqueue_script("jquery-qtip", get_template_directory_uri() . "/js/jquery.qtip.min.js", array("jquery"));
	wp_enqueue_script("jquery-block-ui", get_template_directory_uri() . "/js/jquery.blockUI.js", array("jquery"));
	wp_enqueue_script("google-maps-v3", "http://maps.google.com/maps/api/js?sensor=false");
	wp_enqueue_script("theme-main", get_template_directory_uri() . "/js/main.js", array("jquery", "jquery-ui-core", "jquery-ui-accordion", "jquery-ui-tabs"));
	
	//ajaxurl
	$data["ajaxurl"] = admin_url("admin-ajax.php");
	//themename
	$data["themename"] = $themename;
	//slider
	$data["slider_autoplay"] = $theme_options["slider_autoplay"];
	$data["slide_interval"] = $theme_options["slide_interval"];
	$data["slider_effect"] = $theme_options["slider_effect"];
	$data["slider_transition"] = $theme_options["slider_transition"];
	$data["slider_transition_speed"] = $theme_options["slider_transition_speed"];
	//pass data to javascript
	$params = array(
		'l10n_print_after' => 'config = ' . json_encode($data) . ';'
	);
	wp_localize_script("theme-main", "config", $params);
}
add_action("wp_enqueue_scripts", "theme_enqueue_scripts");

//function to display number of posts
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='')
	{
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }
    return (int)$count;
}

//function to count views
function setPostViews($postID) 
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='')
	{
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 1);
    }
	else
	{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
?>