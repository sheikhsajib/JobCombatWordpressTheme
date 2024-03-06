<?php
//TGM Plugin Activation
require_once(get_theme_file_path('/inc/tgm.php'));
require_once(get_theme_file_path('/inc/jc_acf_cpt_unlimited-quiz.php'));
require_once(get_theme_file_path('/functions/assets_calling.php'));
require_once(get_theme_file_path('/functions/wp_bootstrap_navwalker.php'));
require_once(get_theme_file_path('/functions/menu_functions.php'));
require_once(get_theme_file_path('/widgets/recent_posts_widgets.php'));


//require_once( get_theme_file_path('/inc/acf-fields.php'));
// Attachments plugin Activation

//Version loading  
if (site_url() == 'http://localhost/jobcombat') {
	define("VERSION", time());
} else {
	define("VERSION", wp_get_theme()->get("Version"));
}

function job_combat_bootstraping()
{
	// This Function for Textdomain "job_combat"
	load_theme_textdomain("job_combat");
	add_theme_support("post-thumbnails");

	// Custom Logo Default Settings
	$job_combat_custom_logo_default = array(
		'height' 	=> '500',
		'width' 	=> '500'
	);
	add_theme_support("custom-logo", $job_combat_custom_logo_default);

	//Custom Header Default Settings 
	$job_combat_custom_header_default = array(
		'header-text'           => true,
		'default-text-color'    => '#fff',
		'width'                 => 500,
		'height'               	=> 500,
		'flex-height'           => true,
		'flex-width'            => true,
	);
	add_theme_support("custom-header", $job_combat_custom_header_default);
	add_theme_support("custom-background");
	add_theme_support("title-tag");
	add_theme_support('automatic-feed-links');


	register_nav_menus(array(
		'primary' 			=> __('Primary Menu', 'job_combat'),
	));

	add_image_size("job_combat_square", 400, 400); //hard cropping true=> array("center", "center");
	//	add_image_size("job_combat_blog_img", 9999,300); //height fixed width  flexible
	add_image_size("single_featured", 600, 9999); //width fixed height flexible

	//	add_image_size("job_combat_single_post_img", 700, 99999); //For Single page post Thumbanil
}
add_action('after_setup_theme', 'job_combat_bootstraping');

// add_filter('wp_calculate_image_srcset', '__return_null');//For this function, Wp will not set automatic Src Set/responsive image. We can set this function or can use 
function job_combat_image_srcset()
{
	return null;
}
add_filter('wp_calculate_image_srcset', 'job_combat_image_srcset');

//Customizer Registration
function job_combat_customizer_register($wp_customize)
{
	// Header Area Customizer
	// To show this in theme area <?php echo get_theme_mod('job_combat_logo');
	$wp_customize->add_section('job_combat_header_area', array(
		'title'	=> __('Header Area', 'job_combat'),
		'description' => __('You can control site header area form here', 'job_combat')
	));
	$wp_customize->add_setting('job_combat_logo', array(
		'default' => get_bloginfo('template_directory') . '/assets/icons/social/linkedin.png',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'job_combat_logo', array(
		'label' => 'Logo Upload',
		'description' => 'You can change Hero Logo from here',
		'setting' => 'job_combat_logo',
		'section' => 'job_combat_header_area'
	)));

	// Menu Change Position By Customizer
	$wp_customize->add_section('job_combat_menu_option', array(
		'title'	=> __('Menu Position', 'job_combat'),
		'description' => __('Change Your Menu Position', 'job_combat')
	));
	$wp_customize->add_setting('job_combat_menu_position', array(
		'default' => 'right_menu',
	));
	$wp_customize->add_control('job_combat_menu_position', array(
		'label'	=> 'Menu Position',
		'description' => 'Hey Gazi, Select your Menu Position',
		'setting' => 'job_combat_menu_position',
		'section' => 'job_combat_menu_option',
		'type' => 'radio',
		'choices' => array(
			'left_menu' => 'Left Menu',
			'right_menu' => 'Right Menu',
			'center_menu' => 'Center Menu',
		),
	));
}
add_action('customize_register', 'job_combat_customizer_register');

// Custom Widget Registration
function job_combat_widget()
{
	// Footer Social Icon Widget.......
	register_sidebar(array(
		'name' => __('Sidebar Widgets Single Page', 'job_combat'),
		'id' => 'single_sidbar_widget',
		'description' => __('SinglePage Sidebar Widgets', 'job_combat'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));
	// Footer Social Icon Widget.......
	register_sidebar(array(
		'name' => __('Social Icon', 'job_combat'),
		'id' => 'social_icon',
		'description' => __('Footer Social Icon', 'job_combat'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));
	// Footer Social Icon Widget.......1
	register_sidebar(array(
		'name' => __('Footer Widget 1', 'job_combat'),
		'id' => 'footer_widget_1',
		'description' => __('From Left widget no 1', 'job_combat'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));
	// Footer Social Icon Widget.......2
	register_sidebar(array(
		'name' => __('Footer Widget 2', 'job_combat'),
		'id' => 'footer_widget_2',
		'description' => __('From Left widget no 2', 'job_combat'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));
	// Footer Social Icon Widget.......3
	register_sidebar(array(
		'name' => __('Footer Widget 3', 'job_combat'),
		'id' => 'footer_widget_3',
		'description' => __('From Left widget no 3', 'job_combat'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));
}
add_action('widgets_init', 'job_combat_widget');


// Though Is's show as a bug, But Very helpfull till now. Not Allowed in themeforest
// Excerpt Function
function excerpt($num)
{
	$limit = $num + 1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ", $excerpt) . " <a href='" . get_permalink() . " ' class='excerpt_btn'>Read More &raquo;</a>";
	echo $excerpt;
}

// For Showing Search Result.
function job_combat_highlight_search_results($text)
{
	if (is_search()) {
		//  /( hello| world )/i ==> for multiple search word and i for case Insensetive
		$pattern = '/(' . join('|', explode(' ', get_search_query())) . ')/i';
		$text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
	}
	return $text;
}
add_filter('the_content',	'job_combat_highlight_search_results');
add_filter('the_excerpt',	'job_combat_highlight_search_results');
add_filter('the_title', 	'job_combat_highlight_search_results');


//Force sub-categories to use the parent category template
function job_combat_new_subcategory_hierarchy()
{
	$category = get_queried_object();
	$parent_id = $category->category_parent;
	$templates = array();
	if ($parent_id == 0) {
		// Use default values from get_category_template()
		$templates[] = "category-{$category->slug}.php";
		$templates[] = "category-{$category->term_id}.php";
		$templates[] = 'category.php';
	} else {
		// Create replacement $templates array
		$parent = get_category($parent_id);
		// Current first
		$templates[] = "category-{$category->slug}.php";
		$templates[] = "category-{$category->term_id}.php";
		// Parent second
		$templates[] = "category-{$parent->slug}.php";
		$templates[] = "category-{$parent->term_id}.php";
		$templates[] = 'category.php';
	}
	return locate_template($templates);
}
add_filter('category_template', 'job_combat_new_subcategory_hierarchy');


//CUSTOM SINGLE TEMPLATES BY CATEGORY
function job_combat_get_custom_cat_template($single_template)
{
	global $post;
	if (in_category('blog')) {
		$single_template = dirname(__FILE__) . '/single.php';
	}
	return $single_template;
}
add_filter("single_template", "job_combat_get_custom_cat_template");

/******************** Rank Math Customization **************/
/**
 * To show Rank Math Bottom of Post/Page and Disable Gutenberg Sidebar Integration
 */
add_filter('rank_math/gutenberg/enabled', '__return_false');
/**
 * Change the Focus Keyword Limit
 */
add_filter('rank_math/focus_keyword/maxtags', function () {
	return 22; // Number of Focus Keywords. 
});



// Total View on the Post
function jc_get_views_post($post_id)
{
	$key = 'post_views_count';
	$count = get_post_meta($post_id, $key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($post_id, $key);
		add_post_meta($post_id, $key, $count);
	} else {
		$count++;
		update_post_meta($post_id, $key, $count);
	}
}
function jc_get_post_views($post_id)
{
	$key = 'post_views_count';
	$count = get_post_meta($post_id, $key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($post_id, $key);
		add_post_meta($post_id, $key, $count);
		return "0";
	}
	return $count . '';
}
			//add single.php  file to increase view count
			//			jc_get_views_post(get_the_ID());
			//Display total view count
			//			echo jc_get_post_views(get_the_ID());