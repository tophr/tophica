        
    </div> 	
    
    <footer id="footer-container">
    	<div id="footer-wave">&nbsp;</div>
        <div id="footer-widgets" class="container">
        	
            <div class="widget-wrap clearfix">
            	
                <div class="widget-section">                	
                    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer One' ) ) ?> 
                </div>
                
                <div class="widget-section">                
                	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Two' ) ) ?>                    
                </div>
                
                <div class="widget-section">                
                	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Three' ) ) ?>                    
                </div>
                
                <div class="widget-section">                
                	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Four' ) ) ?>
                </div>
            
            </div>
            
        </div>
    
        <div id="footer" class="clearfix container">
            <p class="copyright">&copy; Copyright <?php echo date( 'Y' ); ?> <a href="/contact">Topher McCulloch</a></p>
            <p class="credit"><?php echo get_theme_mod( 'footer_text' ); ?></p>        
        </div>	
   	
	<?php wp_footer(); ?>
	</footer>	

</body>
</html>