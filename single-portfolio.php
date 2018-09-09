<?php get_header(); ?>

			<h1 class="page-title">
				<?php 
				global $post;
				if(get_post_meta($post->ID, 'heading_value', true) != ''): 
					echo get_post_meta($post->ID, 'heading_value', true); 
				else: 
					the_title();
				endif; 
				?>
            </h1>
            
            <div class="page-back">
            	<span class="back"><a href="<?php echo get_permalink(get_theme_mod( 'portfolio_page', '/portfolio/' )); ?>"><?php _e('&larr; Back to the Portfolio', 'tophica'); ?></a></span>
            </div>
            
            <div id="recent-portfolio" class="portfolio-recent clearfix">
            
                <?php while (have_posts()) : the_post(); ?>
                
            	<div class="sidebar">                    
                    <?php the_content(); ?>            
                </div>
                
                <div class="slides_container">                    
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<?php 
						$add_info = get_post_meta(get_the_ID(), 'tz_additional_info', true); 
						$video_url = get_post_meta(get_the_ID(), 'tz_video_url', true);
						$embeded_code = get_post_meta(get_the_ID(), 'tz_embed_code', true);
						?>

						<?php if($video_url !='' || $embeded_code != '') : ?>

						<div class="video_slide">

							<?php if($add_info != '') : ?>
							<div class="video_info">
								<?php echo stripslashes(htmlspecialchars_decode($add_info)); ?>
							</div>
							<?php endif; ?> 


							<div class="post_video embed-responsive embed-responsive-16by9">
								<?php tz_video(get_the_ID()); ?>
							</div>

						</div>

						<?php endif; ?>
							
							<?php if( have_rows('portfolio_images') ): ?>							
								<?php while( have_rows('portfolio_images') ): the_row(); 
									$image = get_sub_field('image');	
									$size = 'thumbnail-portfolio';
								?>					 
									<div class="portfolio-item">								
										<?php echo wp_get_attachment_image( $image, $size ); ?>		
									</div>
								<?php endwhile; ?>									
							<?php endif; ?>  
							

							<?php if(get_post_meta(get_the_ID(), 'upload_image', true) != '') : ?>
							<?php

							$height = get_post_meta(get_the_ID(), 'image1_height', true);

							if($height == '') {
								$image = getimagesize(get_post_meta(get_the_ID(), 'upload_image', true));
								$height = $image[1];
							}

							?>
							<div><img width="700" height="<?php echo $height; ?>" src="<?php echo get_post_meta(get_the_ID(), 'upload_image', true); ?>" alt="<?php the_title(); ?>"></div>
							<?php endif; ?>
							<?php if(get_post_meta(get_the_ID(), 'upload_image2', true) != '') : ?>
							<div><img width="700" src="<?php echo get_post_meta(get_the_ID(), 'upload_image2', true); ?>" alt="<?php the_title(); ?>"></div>
							<?php endif; ?>
							<?php if(get_post_meta(get_the_ID(), 'upload_image3', true) != '') : ?>
							<div><img width="700" src="<?php echo get_post_meta(get_the_ID(), 'upload_image3', true); ?>" alt="<?php the_title(); ?>"></div>
							<?php endif; ?>
							<?php if(get_post_meta(get_the_ID(), 'upload_image4', true) != '') : ?>
							<div><img width="700" src="<?php echo get_post_meta(get_the_ID(), 'upload_image4', true); ?>" alt="<?php the_title(); ?>"></div>
							<?php endif; ?>
							<?php if(get_post_meta(get_the_ID(), 'upload_image5', true) != '') : ?>
							<div><img width="700" src="<?php echo get_post_meta(get_the_ID(), 'upload_image5', true); ?>" alt="<?php the_title(); ?>"></div>
							<?php endif; ?>
							<?php if(get_post_meta(get_the_ID(), 'upload_image6', true) != '') : ?>
							<div><img width="700" src="<?php echo get_post_meta(get_the_ID(), 'upload_image6', true); ?>" alt="<?php the_title(); ?>"></div>
							<?php endif; ?>
							<?php if(get_post_meta(get_the_ID(), 'upload_image7', true) != '') : ?>
							<div><img width="700" src="<?php echo get_post_meta(get_the_ID(), 'upload_image7', true); ?>" alt="<?php the_title(); ?>"></div>
							<?php endif; ?>
							<?php if(get_post_meta(get_the_ID(), 'upload_image8', true) != '') : ?>
							<div><img width="700" src="<?php echo get_post_meta(get_the_ID(), 'upload_image8', true); ?>" alt="<?php the_title(); ?>"></div>
							<?php endif; ?>
							<?php if(get_post_meta(get_the_ID(), 'upload_image9', true) != '') : ?>
							<div><img width="700" src="<?php echo get_post_meta(get_the_ID(), 'upload_image9', true); ?>" alt="<?php the_title(); ?>"></div>
							<?php endif; ?>
							<?php if(get_post_meta(get_the_ID(), 'upload_image10', true) != '') : ?>
							<div><img width="700" src="<?php echo get_post_meta(get_the_ID(), 'upload_image10', true); ?>" alt="<?php the_title(); ?>"></div>
							<?php endif; ?>								

					</div>

                </div>
                <?php endwhile; ?>
                
            </div>
			<?php 						
			//Set the starter count
			$start = 3;
			//Set the finish count
			$finish = 1;

			$postId = get_the_ID();						
			$related = get_posts_related_by_taxonomy($postId, 'skill-type', get_the_ID());

			//Get the total amount of posts
			$post_count = $related->post_count;

			if ($post_count) {						
				?>
						
 			<div id="recent-posts" class="portfolio-recent clearfix related-projects">
            	
                <div class="sidebar">                    
                </div>
                
                <div class="recent-wrap">
					<h3><?php echo get_theme_mod( 'related_portfolio_title', 'Similar Projects' ); ?></h3> 
                    <p><?php echo get_theme_mod( 'related_portfolio_desc', 'See related projects.' ); ?></p>

						<?php
						}
						
                        while ($related->have_posts()) : $related->the_post(); 
						
                        ?>
                        
							<?php if(is_multiple($start, 3)) : /* if the start count is a multiple of 3 */ ?>
                            <div id="recent-portfolio-detail" class="hentry-wrap clearfix"> 
                            <?php endif; ?>

                                <div <?php post_class(); ?> id="related-post-<?php the_ID(); ?>">
									<a href="<?php the_permalink(); ?>">
										<?php if(get_post_meta(get_the_ID(), 'upload_image_thumb', true) != '') : ?>

											<div class="post-thumb">
											   <img src="<?php echo get_post_meta(get_the_ID(), 'upload_image_thumb', true); ?>" alt="<?php the_title(); ?>">                                           
											</div>  

										<?php else: 

											if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
											<div class="post-thumb">
												<?php the_post_thumbnail('thumbnail-post'); ?>
											</div>
											<?php endif; ?>

										<?php endif; ?>

										<h2 class="entry-title"><?php the_title(); ?></h2>

										<div class="entry-content">
											<?php the_excerpt(); ?>
										</div>
									</a>                                
                                </div>
                            
                            <?php if(is_multiple($finish, 3) || $post_count == $finish) : /* if the finish count is a multiple of 3 or equals the total posts */  ?>
                            </div>
                            <?php endif; ?>
                        
                        <?php
						$start++;
						$finish++;
						?>	
                        
                        <?php endwhile; wp_reset_query(); ?>  

			<?php if ($post_count) { ?>
					
					</div>            
          	  </div>

			<?php } ?>
               
            
            
<?php get_footer(); ?>