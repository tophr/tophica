<?php get_header(); ?>
			
		<?php 
			$blog_page = get_option('tz_blog_page');
			$meta = get_post_meta($blog_page, 'heading_value', true);

			if($meta != ''): 
				echo '<h1 class="page-title">' . $meta . '</h1>'; 

			endif; 
		?>           

		<div id="blog" class="hfeed">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">	

				<?php 
				if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
				<div class="post-thumb">
					<a title="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-post'); ?></a>
				</div>
				<?php } ?>
				
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>

				<div class="clearfix">		

					<div class="entry-meta entry-header">
						<span class="published"><?php _e('On', 'tophica') ?> <strong><?php the_time( get_option('date_format') ); ?></strong></span>
						<span class="entry-categories"><?php _e('in', 'tophica') ?> <?php the_category(', ') ?></span>
						<span class="comment-count"><?php _e('with', 'tophica') ?> <?php comments_popup_link(__('No Comments', 'tophica'), __('1 comment', 'tophica'), __('% comments', 'tophica')); ?></span>
						<?php edit_post_link( __('edit', 'tophica'), '<span class="edit-post">[', ']</span>' ); ?>
					</div>

					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div>

				</div>     

			</div>

			<?php endwhile; ?>

		<div class="navigation page-navigation">
			<div class="nav-next"><?php next_posts_link(__('&larr; Older Entries', 'tophica')) ?></div>
			<div class="nav-previous"><?php previous_posts_link(__('Newer Entries &rarr;', 'tophica')) ?></div>
		</div>

		<?php else : ?>

			<div id="post-0" <?php post_class(); ?>>

				<h2 class="entry-title"><?php _e('Error 404 - Not Found', 'tophica') ?></h2>

				<div class="entry-content">
					<p><?php _e("Sorry, but you are looking for something that isn't here.", "tophica") ?></p>
				</div>

			</div>

		<?php endif; ?>
		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>