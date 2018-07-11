<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>

	<div id="container">
	
		<div id="header" class="clearfix">
        
        	<div id="upper-wrap" class="clearfix">
			
                <div id="logo">
                    <?php 
                    if (get_header_image()) { ?>
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo( get_header_image() ); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
                    <?php } else { ?>
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" width="350" height="35" /></a>
                    <?php } ?>
                </div>
                
                <div id="primary-nav">
                    <?php if ( has_nav_menu( 'primary-menu' ) ) { 
                        /* if menu location 'primary-menu' exists then use custom menu */ 
                        wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu', 'container' => '' ) ); 
                    } ?>
                </div>
                
            </div>
			
		</div>

		<div id="content" class="clearfix">
		