		<!-- END #content -->
		</div>
        
    <!-- END #container -->
    </div> 	
    
    <div id="footer-container">
    	<div id="footer-wave">&nbsp;</div>
        <div id="footer-widgets">
        	
            <div class="widget-wrap clearfix">
            	
                <div class="widget-section">
                	
                    <?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer One' ) ) ?>
                    
                </div>
                
                <div class="widget-section">
                
                	<?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Two' ) ) ?>
                    
                </div>
                
                <div class="widget-section">
                
                	<?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Three' ) ) ?>
                    
                </div>
                
                <div class="widget-section">
                
                	<?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Four' ) ) ?>
                    
                </div>
            
            </div>
            
        </div>
    
        <div id="footer" class="clearfix">
        
            <p class="copyright">&copy; Copyright <?php echo date( 'Y' ); ?> <a href="/contact">Topher McCulloch</a></p>            
            <p class="credit"><?php echo get_theme_mod( 'footer_text' ); ?></p>
        
        </div>	
   	
	<?php wp_footer(); ?>
	</div>	

</body>
</html>