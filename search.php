<?php get_header(); ?>
		
			<?php if (have_posts()) : ?>
            
            <h1 class="page-title"><?php printf( __("Search Results for '%s'", 'tophica'), $s); ?></h1>	

			<div id="blog" class="hfeed">
            		
			<?php while (have_posts()) : the_post(); ?>
				
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">	
                	
					<?php 
					if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
					<div class="post-thumb">
						<a title="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-post'); ?></a>
					</div>
					<?php } ?>
					
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>"> <?php search_title_highlight(); ?></a></h2>
                    
                    <div class="clearfix">		
                    
                        <div class="entry-meta entry-header">
                            <span class="published"><?php _e('On', 'tophica') ?> <strong><?php the_time( get_option('date_format') ); ?></strong></span>
                            <span class="entry-categories"><?php _e('In', 'tophica') ?> <?php the_category(', ') ?></span>
                            <span class="comment-count"><?php _e('With', 'tophica') ?> <?php comments_popup_link(__('No Comments', 'tophica'), __('1 Comment', 'tophica'), __('% Comments', 'tophica')); ?></span>
                            <span class="permalink"><img src="<?php echo get_template_directory_uri(); ?>/images/permalink_icon.png" alt="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>" /><a title="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php _e('Permalink', 'tophica') ?></a></span>
                            <?php edit_post_link( __('edit', 'tophica'), '<span class="edit-post">[', ']</span>' ); ?>
                        </div>
    
                        <div class="entry-content ">
                            <?php search_excerpt_highlight(); ?>
                        </div>
                        
                    </div>     
                          
				</div>

				<?php endwhile; ?>

			<div class="navigation page-navigation">
				<div class="nav-next"><?php next_posts_link(__('&larr; Older Entries', 'tophica')) ?></div>
				<div class="nav-previous"><?php previous_posts_link(__('Newer Entries &rarr;', 'tophica')) ?></div>
			</div>

			<?php else : ?>
			
			
			<h1 class="page-title"><?php _e('No Results Found', 'tophica') ?></h1>
			
			<div id="blog" class="hfeed clearfix">

				<div id="post-0" <?php post_class(); ?>>
			
					<div class="entry-content">
						<p><?php _e("Sorry, but you are looking for something that isn't here. Try another search", "tophica") ?></p>
					</div>
			
				</div>

			<?php endif; ?>
			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>