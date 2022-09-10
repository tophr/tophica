<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<?php
$image = get_field('hero_image');

if( !empty($image) ): ?>
</div>
<div class="hero-image" style="background-image: url(<?php echo $image['url']; ?>);">
  <div class="container">
    <?php if ( get_field('headline') ) { echo '<h1>' . get_field('headline') . '</h1>'; } ?></h1>
  </div>
</div>
<div class="container">
<?php elseif( have_rows('slider') ): ?>
</div>
<div id="slider2" class="clearfix">
  <ul class="slides_container2 bxslider">
    <?php while( have_rows('slider') ): the_row();
    $image = get_sub_field('slider_image');
    $link = get_sub_field('slider_url');
    $alt = get_sub_field('slider_alt_tag');
    ?>
    <li>
      <?php if( $link ): ?>
        <a href="<?php echo $link; ?>">
        <?php endif; ?>
        <img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" width="940" height="350" />
        <?php if( $link ): ?>
        </a>
      <?php endif; ?>
    </li>
  <?php endwhile; ?>
</ul>
</div>
<div class="container">
<?php endif; ?>

<div id="recent-portfolio" class="home-recent clearfix">

  <div class="recent-wrap">

    <div class="clearfix">
      <h3><?php echo get_theme_mod( 'portfolio_title', 'Featured Projects' ); ?></h3>

      <p class="portfolio-link"><a href="<?php echo get_permalink(get_theme_mod( 'portfolio_page', '/portfolio/' )); ?>"><?php _e('See More Work &rarr;', 'tophica'); ?></a></p>
    </div>

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

        <a href="<?php the_permalink(); ?>">

          <?php if(get_post_meta(get_the_ID(), 'upload_image_thumb', true) != '') : ?>

            <div class="post-thumb">
              <img src="<?php echo get_post_meta(get_the_ID(), 'upload_image_thumb', true); ?>" alt="<?php the_title(); ?>" />
            </div>

          <?php else:

            if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
            <div class="post-thumb">
              <?php the_post_thumbnail('thumbnail-post'); ?>
            </div>
          <?php endif; ?>

        <?php endif; ?>

        <h2 class="entry-title"><?php the_title(); ?></h2>

        <?php if (get_theme_mod('portfolio_show_excerpt') === true): ?>
        <div class="entry-content">
          <?php the_excerpt(); ?>
        </div>
        <?php endif; ?>

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

</div>

</div>

<?php get_footer(); ?>
