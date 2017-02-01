<?php

/*-----------------------------------------------------------------------------------

	Add Portfolio Post Type

-----------------------------------------------------------------------------------*/


function tz_create_post_type_portfolios() 
{
	$labels = array(
		'name' => __( 'Portfolio', 'tophica'),
		'singular_name' => __( 'Portfolio' , 'tophica'),
		'add_new' => _x('Add New', 'slide', 'tophica'),
		'add_new_item' => __('Add New Portfolio', 'tophica'),
		'edit_item' => __('Edit Portfolio', 'tophica'),
		'new_item' => __('New Portfolio', 'tophica'),
		'view_item' => __('View Portfolio', 'tophica'),
		'search_items' => __('Search Portfolio', 'tophica'),
		'not_found' =>  __('No portfolios found', 'tophica'),
		'not_found_in_trash' => __('No portfolios found in Trash', 'tophica'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'rewrite' => array('slug' => 'portfolio'),
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','custom-fields', 'excerpt')
	  ); 
	  
	  register_post_type( 'portfolio', $args );
}




function tz_build_taxonomies(){
	register_taxonomy( "skill-type", array( "portfolio" ), array("hierarchical" => true, "label" => __( "Skill Types", 'tophica' ), "singular_label" => __( "Skill Type", 'tophica' ), "rewrite" => array('slug' => 'skill-type', 'hierarchical' => true))); 
}


function tz_portfolio_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Portfolio Item Title', 'tophica' ),
            "type" => 'type'
        );  
  
        return $columns;  
}  
  
function tz_portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case 'type':  
                echo get_the_term_list($post->ID, 'skill-type', '', ', ','');  
                break;
        }  
}  

add_action( 'init', 'tz_create_post_type_portfolios' );
add_action( 'init', 'tz_build_taxonomies', 0 );
add_filter("manage_edit-portfolio_columns", "tz_portfolio_edit_columns");  
add_action("manage_posts_custom_column",  "tz_portfolio_custom_columns");  

?>