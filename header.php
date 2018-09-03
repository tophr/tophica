<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>

	<div class="container clearfix">
	
		<header id="header" class="clearfix">
        
        	<div id="upper-wrap" class="clearfix">
			
                <div id="logo">
                    <?php 
					
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<a href="' . home_url() . '"><img src="'. esc_url( $logo[0] ) .'" alt="' . get_bloginfo('name') . '"></a>';
					} else {
						echo '<h1><a href="' . home_url() . '">'. get_bloginfo( 'name' ) .'</a></h1>';
					} ?>
					
                </div>
                
                <div id="primary-nav">
                    <?php if ( has_nav_menu( 'primary-menu' ) ) { 
                        wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu', 'container' => '' ) ); 
                    } ?>
                </div>
                
            </div>
			
		</header>
		