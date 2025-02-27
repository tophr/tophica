<?php
/*
Template Name: Full Width
*/

get_header();

$image = get_field('hero_image');

if (!empty($image)): ?>
	</div>
	<div class="hero-image" style="background-image: url(<?php echo $image['url']; ?>);">
		<div class="container">
			<?php if (get_field('headline')) {
				echo '<h1>' . get_field('headline') . '</h1>';
			} ?></h1>
		</div>
	</div>
	<div class="container">
	<?php else: ?>
		<h1 class="page-title">
			<?php
			global $post;
			if (get_post_meta($post->ID, 'heading_value', true) != ''):
				echo get_post_meta($post->ID, 'heading_value', true);
			else:
				the_title();
			endif;
			?>.
		</h1>
	<?php endif; ?>

	<main id="primary" class="hfeed">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

					<div class="clearfix">

						<div class="entry-content">

							<?php the_content(); ?>

						</div>

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