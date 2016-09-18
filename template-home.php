<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
			
            <?php
			 
			$image1 = get_option('tz_slider_1'); 
			$image2 = get_option('tz_slider_2'); 
			$image3 = get_option('tz_slider_3'); 
			$image4 = get_option('tz_slider_4'); 
			$image5 = get_option('tz_slider_5'); 
			
			$imageUrl1 = get_option('tz_slider_url_1'); 
			$imageUrl2 = get_option('tz_slider_url_2'); 
			$imageUrl3 = get_option('tz_slider_url_3'); 
			$imageUrl4 = get_option('tz_slider_url_4'); 
			$imageUrl5 = get_option('tz_slider_url_5'); 
			
			$imageAlt1 = get_option('tz_slider_alt_1'); 
			$imageAlt2 = get_option('tz_slider_alt_2'); 
			$imageAlt3 = get_option('tz_slider_alt_3'); 
			$imageAlt4 = get_option('tz_slider_alt_4'); 
			$imageAlt5 = get_option('tz_slider_alt_5'); 
			
			?>
            
            <!-- Addded v1.1 -->
            <?php if(get_option('tz_enable_welcome_message') == 'true') : ?>
            
			<!--BEGIN #home-message -->
            <div id="home-message">
            
            	<h2><?php echo stripslashes(get_option('tz_home_message')); ?></h2>
            
            <!--END #home-message -->
            </div>
            
            <?php endif; ?>
            
            <?php $sliderEnabled = get_option('tz_enable_slider'); ?>
            <?php if($sliderEnabled == 'true') : ?>
            
            <!--BEGIN #slider .clearfix -->
            <div id="slider2" class="clearfix">
                
                <!--BEGIN .slides_container -->
                <ul class="slides_container2 bxslider">
                   	
                    
                    <?php if($image1 != '') : ?>
                    <li>
                    	<?php if($imageUrl1 != '') : ?>
                    	<a href="<?php echo $imageUrl1; ?>"><img id="slider-image-1" src="<?php echo $image1; ?>" alt="<?php echo $imageAlt1; ?>" /></a>
                        <?php else: ?>
                        <img id="slider-image-1" src="<?php echo $image1 ?>" alt="<?php bloginfo(''); ?>" />
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                    <?php if($image2 != '') : ?>
                    <li>
                    	<?php if($imageUrl2 != '') : ?>
                    	<a href="<?php echo $imageUrl2; ?>"><img id="slider-image-2" src="<?php echo $image2; ?>" alt="<?php echo $imageAlt2; ?>" /></a>
                        <?php else: ?>
                        <img id="slider-image-2" src="<?php echo $image2 ?>" alt="<?php bloginfo(''); ?>" />
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                    <?php if($image3 != '') : ?>
                    <li>
                    	<?php if($imageUrl3 != '') : ?>
                    	<a href="<?php echo $imageUrl3; ?>"><img id="slider-image-3" src="<?php echo $image3; ?>" alt="<?php echo $imageAlt3; ?>" /></a>
                        <?php else: ?>
                        <img id="slider-image-3" src="<?php echo $image3 ?>" alt="<?php bloginfo(''); ?>" />
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                    <?php if($image4 != '') : ?>
                    <li>
                    	<?php if($imageUrl4 != '') : ?>
                    	<a href="<?php echo $imageUrl4; ?>"><img id="slider-image-4" src="<?php echo $image4; ?>" alt="<?php echo $imageAlt4; ?>" /></a>
                        <?php else: ?>
                        <img id="slider-image-4" src="<?php echo $image4 ?>" alt="<?php bloginfo(''); ?>" />
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                    <?php if($image5 != '') : ?>
                    <li>
                    	<?php if($imageUrl5 != '') : ?>
                    	<a href="<?php echo $imageUrl5; ?>"><img id="slider-image-5" src="<?php echo $image5; ?>" alt="<?php echo $imageAlt5; ?>" /></a>
                        <?php else: ?>
                        <img id="slider-image-5" src="<?php echo $image5 ?>" alt="<?php bloginfo(''); ?>" />
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                
                <!--END .slides_container -->
                </ul>
                
                
            <!--END #home-slider -->
            </div>
            
            <?php endif; ?>
            
            <?php $portfolioEnable = get_option('tz_recent_portfolio'); ?>
            <?php if($portfolioEnable == 'true') : ?>
            <!--BEGIN #recent-portfolio  .home-recent -->
            <div id="recent-portfolio" class="home-recent clearfix <?php if($sliderEnabled == 'false') : ?>no-border<?php endif; ?>">
            	 
                <!--BEGIN .recent-wrap -->
                <div class="recent-wrap">
				
				<!-- BEGIN PORTFOLIO TITLE & LINK -->
				
				 <h3><?php echo stripslashes(get_option('tz_portfolio_title')); ?></h3>
				 
				 <p class="portfolio-link"><a class="droid-italic" href="<?php echo get_permalink( get_option('tz_portfolio_page') ); ?>"><?php _e('View the Portfolio &rarr;', 'framework'); ?></a></p>
				

						<?php 
						
						//Set the starter count
						$start = 3;
						//Set the finish count
						$finish = 1;
						
                        $query = new WP_Query();
                        $query->query('post_type=portfolio&posts_per_page=' . get_option('tz_portfolio_number'));
						
						//Get the total amount of posts
						$post_count = $query->post_count;
						
                        while ($query->have_posts()) : $query->the_post(); 
						
                        ?>
                        
                        <?php if(is_multiple($start, 3)) : /* if the start count is a multiple of 3 */ ?>
                        <!--BEGIN .hentry-wrap -->
                    	<div class="hentry-wrap clearfix"> 
                        <?php endif; ?>
                    
                            <!--BEGIN .hentry -->
                            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                            
                            	<?php if(get_post_meta(get_the_ID(), 'upload_image_thumb', true) != '') : ?>
								
									<div class="post-thumb">
										<a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
                                        	<img src="<?php echo get_post_meta(get_the_ID(), 'upload_image_thumb', true); ?>" alt="<?php the_title(); ?>" />
                                        </a>
									</div>
								
								<?php else: 
								
									if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
									<div class="post-thumb">
										<a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-post'); /* post thumbnail settings configured in functions.php */ ?></a>
									</div>
									<?php endif; ?>
                                
                                <?php endif; ?>
                                                
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
            
                                <!--BEGIN .entry-content -->
                                <div class="entry-content">
                                    <?php the_excerpt(); ?>
                                <!--END .entry-content -->
                                </div>
                            
                            <!--END .hentry-->  
                            </div>
                        
                        <?php if(is_multiple($finish, 3) || $post_count == $finish) : /* if the finish count is a multiple of 3 or equals the total posts */  ?>
                        <!--END .hentry-wrap-->  
                    	</div>
                        <?php endif; ?>
                        
                        <?php
						$start++;
						$finish++;
						?>
                        
                        <?php endwhile; wp_reset_query(); ?>
                        
                <!--END .recent-wrap -->
                </div>
            
            <!--END #recent-portfolio .home-recent -->
            </div>
            <?php endif; ?>
            
            <?php if(get_option('tz_recent_posts') == 'true') : ?>
            <!--BEGIN #recent-posts .home-recent -->
            <div id="recent-posts" class="home-recent clearfix <?php if($sliderEnabled == 'false' && $portfolioEnable == 'false') : ?>no-border<?php endif; ?>">
            	
                <!--BEGIN .sidebar -->
            	<div class="sidebar">

                    <h3><?php echo stripslashes(get_option('tz_recent_title')); ?></h3>
                    
                    <p><?php echo stripslashes(get_option('tz_recent_description')); ?></p>
                    
                    <p><a class="droid-italic" href="<?php echo get_permalink( get_option('tz_blog_page') ); ?>"><?php _e('Read the Blog &rarr;', 'framework'); ?></a></p>
                   
                <!--END .sidebar -->
                </div>
                
                <!--BEGIN .recent-wrap -->
                <div class="recent-wrap">

						<?php 
						
						//Set the starter count
						$start = 3;
						//Set the finish count
						$finish = 1;
						
                        $query = new WP_Query();
                        $query->query('posts_per_page='.get_option('tz_recent_number'));
						
						//Get the total amount of posts
						$post_count = $query->post_count;
						
                        while ($query->have_posts()) : $query->the_post(); 
						
                        ?>
                        
                        <?php if(is_multiple($start, 3)) : /* if the start count is a multiple of 3 */ ?>
                        <!--BEGIN .hentry-wrap -->
                    	<div class="hentry-wrap clearfix"> 
                        <?php endif; ?>
                    
                            <!--BEGIN .hentry -->
                            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                            
                            <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
                                <div class="post-thumb">
                                    <a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-post'); /* post thumbnail settings configured in functions.php */ ?></a>
                                </div>
                            <?php endif; ?>
                                                
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
                                
                                <!--BEGIN .entry-meta .entry-header-->
                                <div class="entry-meta entry-header">
                                    <span class="published"><?php the_time( get_option('date_format') ); ?></span>
                                    <span class="meta-sep">&middot;</span>
                                    <span class="comment-count"><?php comments_popup_link(__('No Comments', 'framework'), __('1 Comment', 'framework'), __('% Comments', 'framework')); ?></span>
                                    <?php edit_post_link( __('edit', 'framework'), '<span class="edit-post">[', ']</span>' ); ?>
                                <!--END .entry-meta entry-header -->
                                </div>
                        
                                <!--BEGIN .entry-content -->
                                <div class="entry-content">
                                    <?php the_excerpt(); ?>
                                <!--END .entry-content -->
                                </div>
                            
                            <!--END .hentry-->  
                            </div>
                        
                        <?php if(is_multiple($finish, 3) || $post_count == $finish) : /* if the finish count is a multiple of 3 or equals the total posts */  ?>
                        <!--END .hentry-wrap-->  
                    	</div>
                        <?php endif; ?>
                        
                        <?php
						$start++;
						$finish++;
						?>
                        
                        <?php endwhile; wp_reset_query(); ?>
                        
                <!--END .recent-wrap -->
                </div>
            
            <!--END #recent-posts .home-recent -->
            </div>
            
            <?php endif; ?>
            
<?php get_footer(); ?>