<?php 
function tophica_customize_register( $wp_customize ) {
	//$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	//$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';
	$wp_customize->add_setting( 'link_color', array(
		'type' => 'theme_mod', 
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
	
	$wp_customize->add_setting( 'link_hover_color', array(
		'type' => 'theme_mod', 
		'capability' => 'edit_theme_options',		
		'default' => '#cd2931',
	 	'sanitize_callback' => 'sanitize_hex_color',
	) );	
		
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'link_hover_color', 
	array(
		'label'      => __( 'Link Hover Color', 'tophica' ),
		'section'    => 'colors',
		'settings'   => 'link_hover_color',
	) ) 
	);
	
	
/**
 * Theme options.
 */
	$wp_customize->add_section( 'theme_options', array(
		'title'    => __( 'Theme Options', 'tophica' ),
		'priority' => 130, // Before Additional CSS.
	) );

	$wp_customize->add_setting( 'page_layout', array(
		'default'           => 'layout-2cr',
		'sanitize_callback' => 'tophica_sanitize_page_layout',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'page_layout', array(
		'label'       => __( 'Page Layout', 'tophica' ),
		'section'     => 'theme_options',
		'type'        => 'radio',
		'description' => __( 'Select main content and sidebar alignment.','tophica' ),
		'choices'     => array(
			'layout-2cr' => __( 'Right Sidebar', 'tophica' ),
			'layout-2cl' => __( 'Left Sidebar', 'tophica' ),
		),
		//'active_callback' => 'tophica_is_view_with_layout_option',
	) );
	
	$wp_customize->add_setting( 'footer_text', array(
		'default'           => 'I am a pretty lady.',
		//'sanitize_callback' => 'tophica_sanitize_page_layout',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'footer_text', array(
		'label'       => __( 'Footer Text', 'tophica' ),
		'section'     => 'theme_options',
		'type'        => 'textarea',
		'description' => __( 'Text that displays in the footer area.','tophica' ),
	) );
	
	$wp_customize->add_setting( 'tracking_code' );

	$wp_customize->add_control( 'tracking_code', array(
		'label'       => __( 'Tracking Code', 'tophica' ),
		'section'     => 'theme_options',
		'type'        => 'textarea',
		'description' => __( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag of your theme.','tophica' ),
	) );
	
	}
add_action( 'customize_register', 'tophica_customize_register' );

/**
 * Sanitize the page layout options.
 */
function tophica_sanitize_page_layout( $input ) {
	$valid = array(
		'layout-2cr' => __( 'Right Sidebar', 'tophica' ),
		'layout-2cl' => __( 'Left Sidebar', 'tophica' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}