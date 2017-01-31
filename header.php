<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <?php wp_head(); ?>
    
	<!--[if lte IE 7]>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
    <script type="text/javascript">
      DD_belatedPNG.fix('.slides-nav a');
    </script>
    <![endif]-->
	
</head>

<!-- BEGIN body -->
<body <?php body_class(); ?>>

	<!-- BEGIN #container -->
	<div id="container">
	
		<!-- BEGIN #header -->
		<div id="header" class="clearfix">
        
        	<!-- BEGIN #upper-wrap -->
			<div id="upper-wrap" class="clearfix">
			
                <!-- BEGIN #logo -->
                <div id="logo">
                    <?php 
                    if (get_header_image()) { ?>
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo( get_header_image() ); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
                    <?php } else { ?>
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" width="350" height="35" /></a>
                    <?php } ?>
                <!-- END #logo -->
                </div>
                
                 <!-- BEGIN #primary-nav -->
                <div id="primary-nav">
                    <?php if ( has_nav_menu( 'primary-menu' ) ) { 
                        /* if menu location 'primary-menu' exists then use custom menu */ 
                        wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu', 'container' => '' ) ); 
                    } ?>
                <!-- END #primary-nav -->
                </div>
                
            <!--END #upper-wrap-->
			</div>
			
		<!--END #header-->
		</div>

		<!--BEGIN #content -->
		<div id="content" class="clearfix">
		