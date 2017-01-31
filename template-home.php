<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
			
	<?php if( have_rows('slider') ): ?>
		<!--BEGIN #slider .clearfix -->
		<div id="slider2" class="clearfix">
			<!--BEGIN .slides_container -->
			<ul class="slides_container2 bxslider">
			<?php while( have_rows('slider') ): the_row(); 
				// vars
				$image = get_sub_field('slider_image');					
				$link = get_sub_field('slider_url');
				$alt = get_sub_field('slider_alt_tag');
				?>					 
					<li>							
						<?php if( $link ): ?>
							<a href="<?php echo $link; ?>">
						<?php endif; ?>						
							<img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" />							
						<?php if( $link ): ?>
							</a>
						<?php endif; ?>
					</li>
			<?php endwhile; ?>
			<!--END .slides_container -->
			</ul>                
		<!--END #home-slider -->
		</div>
	<?php endif; ?>
            
	
	<!--BEGIN #recent-portfolio  .home-recent -->
	<div id="recent-portfolio" class="home-recent clearfix <?php if($sliderEnabled == 'false') : ?>no-border<?php endif; ?>">

		<!--BEGIN .recent-wrap -->
		<div class="recent-wrap">

		<!-- BEGIN PORTFOLIO TITLE & LINK -->
		 <h3><?php echo get_theme_mod( 'portfolio_title', 'Featured Projects' ); ?></h3>

		 <p class="portfolio-link"><a class="droid-italic" href="<?php echo get_permalink(get_theme_mod( 'portfolio_page', '/portfolio/' )); ?>"><?php _e('View the Portfolio &rarr;', 'tophica'); ?></a></p>

				<?php 

				//Set the starter count
				$start = 3;
				//Set the finish count
				$finish = 1;

				$query = new WP_Query();
				$query->query('post_type=portfolio&posts_per_page=' . get_theme_mod( 'portfolio_posts', '9' ));

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
								<a title="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
									<img src="<?php echo get_post_meta(get_the_ID(), 'upload_image_thumb', true); ?>" alt="<?php the_title(); ?>" />
								</a>
							</div>

						<?php else: 

							if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
							<div class="post-thumb">
								<a title="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-post'); /* post thumbnail settings configured in functions.php */ ?></a>
							</div>
							<?php endif; ?>

						<?php endif; ?>

						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>

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
            
<?php get_footer(); ?>