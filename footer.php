		<!-- END #content -->
		</div>
        
    <!-- END #container -->
    </div> 	
    
    <!-- BEGIN #footer-container -->
    <div id="footer-container">
    	<div id="footer-wave">&nbsp;</div>
        <!-- BEGIN #footer-widgets -->
    	<div id="footer-widgets">
        	
            <!-- BEGIN .widget-wrap -->
            <div class="widget-wrap clearfix">
            	
                <!-- BEGIN .widget-section -->
                <div class="widget-section">
                	
                    <?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer One' ) ) ?>
                    
                <!-- END .widget-section -->   
                </div>
                
                <!-- BEGIN .widget-section -->
                <div class="widget-section">
                
                	<?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Two' ) ) ?>
                    
                <!-- END .widget-section -->   
                </div>
                
                <!-- BEGIN .widget-section -->
                <div class="widget-section">
                
                	<?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Three' ) ) ?>
                    
                <!-- END .widget-section -->   
                </div>
                
                <!-- BEGIN .widget-section -->
                <div class="widget-section">
                
                	<?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Four' ) ) ?>
                    
                <!-- END .widget-section -->   
                </div>
            
            <!-- END .widget-wrap -->
       		</div>
            
        <!-- END #footer-widgets -->
        </div>
    
        <!-- BEGIN #footer -->
        <div id="footer" class="clearfix">
        
            <p class="copyright">&copy; Copyright <?php echo date( 'Y' ); ?> <a href="http://tophermcculloch.com/contact">Topher McCulloch</a></p>            
            <p class="credit"><?php echo get_theme_mod( 'footer_text' ); ?></p>
        
        <!-- END #footer -->
        </div>
	
    <!-- END #footer-container -->
	
		
	<!-- Theme Hook -->
	<?php wp_footer(); ?>
	</div>		
<!--END body-->
</body>
<!--END html-->
</html>