<?php get_header(); ?>
<?php /* Get author data */
	if(get_query_var('author_name')) :
	$curauth = get_userdatabylogin(get_query_var('author_name'));
	else :
	$curauth = get_userdata(get_query_var('author'));
	endif;
?>			
			<?php if (have_posts()) : ?>			
	
	 	  	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	 	  	<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1 class="page-title"><?php printf(__('All posts in %s', 'tophica'), single_cat_title('',false)); ?></h1>
	 	  	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1 class="page-title"><?php printf(__('All posts tagged %s', 'tophica'), single_tag_title('',false)); ?></h1>
	 	  	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1 class="page-title"><?php _e('Archive for', 'tophica') ?> <?php the_time('F jS, Y'); ?></h1>
	 	 	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1 class="page-title"><?php _e('Archive for', 'tophica') ?> <?php the_time('F, Y'); ?></h1>
	 		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1 class="page-title"><?php _e('Archive for', 'tophica') ?> <?php the_time('Y'); ?></h1>
		  	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1 class="page-title"><?php _e('All posts by', 'tophica') ?> <?php echo $curauth->display_name; ?></h1>
	 	  	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1 class="page-title"><?php _e('Blog Archives', 'tophica') ?></h1>
	 	  	<?php } ?>
            
			<div id="blog" class="hfeed">
            		
			<?php while (have_posts()) : the_post(); ?>
				
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
                            <span class="comment-count"><?php _e('with', 'tophica') ?> <?php comments_popup_link(__('no comments', 'tophica'), __('1 Comment', 'tophica'), __('% comments', 'tophica')); ?></span>
                            <span class="permalink"><img src="<?php echo get_template_directory_uri(); ?>/images/permalink_icon.png" alt="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>" /><a title="<?php printf(__('Permanent Link to %s', 'tophica'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php _e('Permalink', 'tophica') ?></a></span>
                            <?php edit_post_link( __('edit', 'tophica'), '<span class="edit-post">[', ']</span>' ); ?>
                        </div>
    
                        <div class="entry-content ">
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