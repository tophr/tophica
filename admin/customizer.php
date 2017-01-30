<?php 
function tophica_customize_register( $wp_customize ) {
	//$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	//$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';
	$wp_customize->add_setting( 'link_color', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',		
		'default' => '#88BBC8',
	 	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'link_color', 
	array(
		'label'      => __( 'Link Color', 'tophica' ),
		'section'    => 'colors',
		'settings'   => 'link_color',
	) ) 
	);
	
	}
add_action( 'customize_register', 'tophica_customize_register' );