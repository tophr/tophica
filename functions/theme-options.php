<?php

add_action('init','tz_options');

if (!function_exists('tz_options')) {
function tz_options(){
	
// VARIABLES
if( function_exists( 'wp_get_theme' ) ) {
    if( is_child_theme() ) {
        $temp_obj = wp_get_theme();
        $theme_obj = wp_get_theme( $temp_obj->get('Template') );
    } else {
        $theme_obj = wp_get_theme();
    }
    $themeversion = $theme_obj->get('Version');
    $themename = $theme_obj->get('Name');
} 
$shortname = "tz";

// Populate option in array for use in theme
global $tz_options;
$tz_options = get_option('tz_options');

$GLOBALS['template_path'] = TZ_DIRECTORY;

//Access the WordPress Categories via an Array
$tz_categories = array();  
$tz_categories_obj = get_categories('hide_empty=0');
foreach ($tz_categories_obj as $tz_cat) {
    $tz_categories[$tz_cat->cat_ID] = $tz_cat->cat_name;}
$categories_tmp = array_unshift($tz_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$tz_pages = array();
$tz_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($tz_pages_obj as $tz_page) {
    $tz_pages[$tz_page->ID] = $tz_page->post_name; }
$tz_pages_tmp = array_unshift($tz_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = TZ_FILEPATH . '/css/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('tz_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// Set the Options Array
$options = array();
					
$options[] = array( "name" => __('Posts &amp; Portfolio','tophica'),
					"type" => "heading");
					
$options[] = array( "name" => "",
					"message" => __('Here you can configure how you would like your posts and portfolio pages to function.','tophica'),
					"type" => "intro");

$options[] = array( "name" => __('Enable Portfolio Slider','tophica'),
					"desc" => __('Check this to enable the portfolio slider. If disabled, the images will appear underneath each other.','tophica'),
					"id" => $shortname."_portfolio_enable_slider",
					"std" => "false",
					"type" => "checkbox");
									
$options[] = array( "name" => __('Portfolio Slider Autoplay','tophica'),
					"desc" => __('Choose the time in milliseconds between slider transitions where 1000 = 1second. Leave blank to disable.','tophica'),
					"id" => $shortname."_portfolio_slider_autoplay",
					"std" => "5000",
					"type" => "text");
					
					// Added v1.1
$options[] = array( "name" => __('Enable Lightbox','tophica'),
					"desc" => __('Check this to enable the lightbox effect. If disabled, the images will link to their respective portfolio items.','tophica'),
					"id" => $shortname."_lightbox",
					"std" => "true",
					"type" => "checkbox");
					// ------------------------
					
$options[] = array( "name" => __('Related Portfolio Title','tophica'),
					"desc" => __('This is the title for the related portfolio area.','tophica'),
					"id" => $shortname."_related_portfolio_title",
					"std" => "Similar Projects",
					"type" => "text");
					
$options[] = array( "name" => __('Related Portfolio Description','tophica'),
					"desc" => __('This is the description for the related portfolio area.','tophica'),
					"id" => $shortname."_related_portfolio_description",
					"std" => "Donec sed odio dui. Nulla vitae elit librero, a pharetra augue. Nullam id...",
					"type" => "textarea");
					
$options[] = array( "name" => __('Related Portfolio Number','tophica'),
					"desc" => __('This is the number of related portfolio items you wish to show.','tophica'),
					"id" => $shortname."_related_portfolio_number",
					"std" => "3",
					"type" => "text");
					
$options[] = array( "name" => __('Show Featured Image','tophica'),
					"desc" => __('Check this to show the featured image at the beginning of each blog post.','tophica'),
					"id" => $shortname."_post_img",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => __('Comment Description','tophica'),
					"desc" => __('This is a short description that is displayed near the comments.','tophica'),
					"id" => $shortname."_comment_description",
					"std" => "Got something to say? Feel free, I want to hear from you!",
					"type" => "textarea");
					
$options[] = array( "name" => __('Respond Description','tophica'),
					"desc" => __('This is a short description that is displayed near the comment form.','tophica'),
					"id" => $shortname."_respond_description",
					"std" => "Let us know your thoughts on this post but remember to place nicely folks!",
					"type" => "textarea");


update_option('tz_template',$options); 					  
update_option('tz_themename',$themename);   
update_option('tz_shortname',$shortname);

}
}
?>
