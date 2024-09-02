<?php get_header(); ?>

<h1 class="page-title">
	<?php
	global $post;
	if (get_post_meta($post->ID, 'heading_value', true) != ''):
		echo get_post_meta($post->ID, 'heading_value', true);
	else:
		the_title();
	endif;
	?>
</h1>

<main id="primary" class="hfeed">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'tophica') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>

			</div>

		<?php endwhile; ?>

		<?php comments_template('', true); ?>

	<?php else : ?>

		<div id="post-0" <?php post_class(); ?>>

			<h2 class="entry-title"><?php _e('Error 404 - Not Found', 'tophica') ?></h2>

			<div class="entry-content">
				<p><?php _e("Sorry, but you are looking for something that isn't here.", "tophica") ?></p>
			</div>

		</div>

	<?php endif; ?>
</main>

<?php get_footer(); ?>