<?php 
function tophica_customize_register( $wp_customize ) {
	//$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	//$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';
	
	}
add_action( 'customize_register', 'tophica_customize_register' );