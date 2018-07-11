<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
			
	<?php if( have_rows('slider') ): ?>
		<div id="slider2" class="clearfix">
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
			</ul>                
		</div>
	<?php endif; ?>            
	
	<div id="recent-portfolio" class="home-recent clearfix">

		<div class="recent-wrap">

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
				<div class="hentry-wrap clearfix"> 
				<?php endif; ?>

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

						<div class="entry-content">
							<?php the_excerpt(); ?>
						</div>

					</div>

				<?php if(is_multiple($finish, 3) || $post_count == $finish) : /* if the finish count is a multiple of 3 or equals the total posts */  ?>
				</div>
				<?php endif; ?>

				<?php
				$start++;
				$finish++;
				?>

				<?php endwhile; wp_reset_query(); ?>

		</div>

	</div>            
            
<?php get_footer(); ?>