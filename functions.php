<?php

/*-----------------------------------------------------------------------------------*/
/*	Register WP3.0+ Menus
/*-----------------------------------------------------------------------------------*/

function register_menu() {
  register_nav_menu('primary-menu', __('Primary Menu', 'tophica'));
}
add_action('init', 'register_menu');


/*-----------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain('tophica');


/*-----------------------------------------------------------------------------------*/
/*	Set Max Content Width (use in conjuction with ".entry-content img" css)
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 800;


/*-----------------------------------------------------------------------------------*/
/*	Declare Theme Support Options & Configure WP2.9+ Thumbnails
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 180, 180, true );
  add_image_size( 'thumbnail-large', 600, 200, true ); // Alt Large thumbnails
  add_image_size( 'thumbnail-post', 712, 560, true ); // Portfolio thumbnails
  add_image_size( 'thumbnail-portfolio', 820, '', true ); // Portfolio images
}

// Add theme support for Custom Logo.
add_theme_support( 'custom-logo', array(
  'height'      => 60,
  'width'       => 600,
  'flex-height' => true,
  'flex-width'  => true,
) );

//add_theme_support( 'custom-header' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );

// Disabling srcset until we figure things out
add_filter( 'wp_calculate_image_srcset', '__return_false' );


/*-----------------------------------------------------------------------------------*/
/*	Register Sidebars
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_sidebar') ) {
  register_sidebar(array(
    'name'          => __( 'Blog Sidebar', 'Tophica' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your sidebar on blog and archive pages.', 'Tophica' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  register_sidebar(array(
    'name' => 'Footer One',
    'id' => 'sidebar-3',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
  register_sidebar(array(
    'name' => 'Footer Two',
    'id' => 'sidebar-4',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
  register_sidebar(array(
    'name' => 'Footer Three',
    'id' => 'sidebar-5',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
  register_sidebar(array(
    'name' => 'Footer Four',
    'id' => 'sidebar-6',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
}


/*-----------------------------------------------------------------------------------*/
/*	Get related posts by taxonomy
/*-----------------------------------------------------------------------------------*/

function get_posts_related_by_taxonomy($post_id, $taxonomy, $notin, $args=array()) {
  $query = new WP_Query();
  $terms = wp_get_object_terms($post_id, $taxonomy);
  if (count($terms)) {
    // Assumes only one term for per post in this taxonomy
    $post_ids = get_objects_in_term($terms[0]->term_id,$taxonomy);
    $post = get_post($post_id);
    $args = wp_parse_args($args,array(
      'post_type' => $post->post_type, // The assumes the post types match
      'post__not_in' => array($notin),
      'taxonomy' => $taxonomy,
      'term' => $terms[0]->slug,
      'posts_per_page' => get_option('tz_related_portfolio_number')
    ));
    $query = new WP_Query($args);
  }
  return $query;
}


/*-----------------------------------------------------------------------------------*/
/*	Custom Gravatar Support
/*-----------------------------------------------------------------------------------*/

function tz_custom_gravatar( $avatar_defaults ) {
  $tz_avatar = get_template_directory_uri() . '/images/gravatar.png';
  $avatar_defaults[$tz_avatar] = 'Custom Gravatar (/images/gravatar.png)';
  return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'tz_custom_gravatar' );


/*-----------------------------------------------------------------------------------*/
/*	Change Default Excerpt Length
/*-----------------------------------------------------------------------------------*/

function tz_excerpt_length($length) {
  return 30; }
  add_filter('excerpt_length', 'tz_excerpt_length');


  /*-----------------------------------------------------------------------------------*/
  /*	Configure Excerpt String
  /*-----------------------------------------------------------------------------------*/

  function tz_excerpt_more($excerpt) {
    return sprintf( '... <a class="read-more" href="%1$s">%2$s</a>',
    get_permalink( get_the_ID() ),
    __( 'Continue Reading &rarr;', 'Tophica' )
  );
}
add_filter( 'excerpt_more', 'tz_excerpt_more' );

add_action( 'init', 'tz_add_excerpts_to_pages' );
function tz_add_excerpts_to_pages() {
  add_post_type_support( 'page', 'excerpt' );
}

function search_excerpt_highlight() {
  $excerpt = get_the_excerpt();
  $sr = get_query_var('s');
  $keys = explode(" ",$sr);
  $keys = array_filter($keys);
  $regEx = '\'(?!((<.*?)|(<a.*?)))(\b'. implode('|', $keys) . '\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'iu';
  $excerpt = preg_replace($regEx, '<strong class="search-highlight">\0</strong>', $excerpt);

  echo '<p>' . $excerpt . '</p>';
}

function search_title_highlight() {
  $title = get_the_title();
  $sr = get_query_var('s');
  $keys = explode(" ",$sr);
  $keys = array_filter($keys);
  $regEx = '\'(?!((<.*?)|(<a.*?)))(\b'. implode('|', $keys) . '\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'iu';
  $title = preg_replace($regEx, '<strong class="search-highlight">\0</strong>', $title);

  echo $title;
}


/*-----------------------------------------------------------------------------------*/
/*	Helpful function to see if a number is a multiple of another number
/*-----------------------------------------------------------------------------------*/

function is_multiple($number, $multiple)
{
  return ($number % $multiple) == 0;
}


/*-----------------------------------------------------------------------------------*/
/*	Register and load common JS
/*-----------------------------------------------------------------------------------*/

function tz_enqueue_scripts() {
  // Register our scripts

  wp_register_script('quicksand', get_template_directory_uri() . '/js/jquery.quicksand.min.js', 'jquery');
  wp_register_script('tm-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'quicksand'), '1.0', TRUE);
  wp_register_script('tm-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', 'jquery', '4.1');

  wp_enqueue_style('tm-stylesheet', get_template_directory_uri() . '/css/style.min.css', '1.5.1' );
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,700i|Poppins:700');

  // Enqueue our scripts
  // wp_deregister_script('jquery');
  // wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, '1.12.4');
  // wp_enqueue_script('jquery');

  if ( is_page_template('template-portfolio.php') ) {
    // wp_enqueue_script('jquery-migrate');
    wp_enqueue_script('tm-scripts');
    wp_enqueue_script('quicksand');
  }
  if ( is_page_template( 'template-home.php' ) && empty(get_field('hero_image', get_option( 'page_on_front' ))) ) {
    wp_enqueue_script('tm-bxslider');
  }
  if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action('wp_enqueue_scripts', 'tz_enqueue_scripts');


/*-----------------------------------------------------------------------------------*/
/*	Add bxslider
/*-----------------------------------------------------------------------------------*/

function tm_home_slider() {
  if (is_page_template('template-home.php') && empty(get_field('hero_image', get_option( 'page_on_front' )))) {
    ?>

    <script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery('.bxslider').bxSlider({
        mode: 'fade',
        auto: true,
        nextText: '&rsaquo;',
        prevText: '&lsaquo;'
      });
    });
    </script>
    <?php
  }
}

add_action('wp_head', 'tm_home_slider');


/*-----------------------------------------------------------------------------------*/
/*	Add Browser Detection Body Class
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','tz_browser_body_class');
function tz_browser_body_class($classes) {
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

  if($is_lynx) $classes[] = 'lynx';
  elseif($is_gecko) $classes[] = 'gecko';
  elseif($is_opera) $classes[] = 'opera';
  elseif($is_NS4) $classes[] = 'ns4';
  elseif($is_safari) $classes[] = 'safari';
  elseif($is_chrome) $classes[] = 'chrome';
  elseif($is_IE) $classes[] = 'ie';
  else $classes[] = 'unknown';

  if($is_iphone) $classes[] = 'iphone';
  return $classes;
}


/*-----------------------------------------------------------------------------------*/
/*	Comment Styling
/*-----------------------------------------------------------------------------------*/

function tz_comment($comment, $args, $depth) {

  $isByAuthor = false;

  if($comment->comment_author_email == get_the_author_meta('email')) {
    $isByAuthor = true;
  }

  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

    <div id="comment-<?php comment_ID(); ?>">
      <div class="line"></div>
      <?php echo get_avatar($comment,$size='35'); ?>
      <div class="comment-author vcard">
        <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?> <?php if($isByAuthor) { ?><span class="author-tag"><?php _e('(Author)','tophica') ?></span><?php } ?>
      </div>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'tophica'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'tophica'),'  ','') ?> &middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>

      <?php if ($comment->comment_approved == '0') : ?>
        <em class="moderation"><?php _e('Your comment is awaiting moderation.', 'tophica') ?></em>
        <br />
      <?php endif; ?>

      <div class="comment-body">
        <?php comment_text() ?>
      </div>

    </div>

    <?php
  }


  /*-----------------------------------------------------------------------------------*/
  /*	Separated Pings Styling
  /*-----------------------------------------------------------------------------------*/

  function tz_list_pings($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
    <?php }


    /*-----------------------------------------------------------------------------------*/
    /*	Enable SVG support
    /*-----------------------------------------------------------------------------------*/

    function add_file_types_to_uploads($file_types){
      $new_filetypes = array();
      $new_filetypes['svg'] = 'image/svg+xml';
      $file_types = array_merge($file_types, $new_filetypes );
      return $file_types;
    }
    add_action('upload_mimes', 'add_file_types_to_uploads');


    /*-----------------------------------------------------------------------------------*/
    /*	Custom Login Logo Support
    /*-----------------------------------------------------------------------------------*/

    function tz_custom_login_logo() {
      echo '<style type="text/css">
      h1 a { background-image:url('.get_template_directory_uri().'/images/custom-login-logo.svg) !important; background-size: auto auto !important; width: 320px !important; }
      </style>';
    }
    function tz_wp_login_url() {
      return home_url();
    }
    function tz_wp_login_title() {
      return get_option('blogname');
    }

    add_action('login_head', 'tz_custom_login_logo');
    add_filter('login_headerurl', 'tz_wp_login_url');
    add_filter('login_headertitle', 'tz_wp_login_title');


    /*-----------------------------------------------------------------------------------*/
    /*	List categories for the portfolio
    /*-----------------------------------------------------------------------------------*/

    class Portfolio_Walker extends Walker_Category {
      function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        extract($args);
        $cat_name = esc_attr( $category->name);
        $cat_name = apply_filters( 'list_cats', $cat_name, $category );
        $link = '<a href="#" data-value="term-'.$category->term_id.'" ';
        if ( $use_desc_for_title == 0 || empty($category->description) )
        $link .= 'title="' . sprintf(__( 'View all items filed under %s', 'tophica' ), $cat_name) . '"';
        else
        $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
        $link .= '>';
        // $link .= $cat_name . '</a>';
        $link .= $cat_name;
        if(!empty($category->description)) {
          $link .= ' <span>'.$category->description.'</span>';
        }
        $link .= '</a>';
        if ( (! empty($feed_image)) || (! empty($feed)) ) {
          $link .= ' ';
          if ( empty($feed_image) )
          $link .= '(';
          $link .= '<a href="' . get_category_feed_link($category->term_id, $feed_type) . '"';
          if ( empty($feed) )
          $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s', 'tophica' ), $cat_name ) . '"';
          else {
            $title = ' title="' . $feed . '"';
            $alt = ' alt="' . $feed . '"';
            $name = $feed;
            $link .= $title;
          }
          $link .= '>';
          if ( empty($feed_image) )
          $link .= $name;
          else
          $link .= "<img src='$feed_image'$alt$title" . ' />';
          $link .= '</a>';
          if ( empty($feed_image) )
          $link .= ')';
        }
        if ( isset($show_count) && $show_count )
        $link .= ' (' . intval($category->count) . ')';
        if ( isset($show_date) && $show_date ) {
          $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);
        }
        if ( isset($current_category) && $current_category )
        $_current_category = get_category( $current_category );
        if ( 'list' == $args['style'] ) {
          $output .= '<li class="segment-'.rand(2, 99).'"';
          $class = 'cat-item cat-item-'.$category->term_id;
          if ( isset($current_category) && $current_category && ($category->term_id == $current_category) )
          $class .=  ' current-cat';
          elseif ( isset($_current_category) && $_current_category && ($category->term_id == $_current_category->parent) )
          $class .=  ' current-cat-parent';
          $output .=  '';
          $output .= ">$link\n";
        } else {
          $output .= "\t$link<br />\n";
        }
      }
    }


    /*-----------------------------------------------------------------------------------*/
    /*	Hide Password Protected Posts
    /*-----------------------------------------------------------------------------------*/
    function tz_password_post_filter( $where = '' ) {
      if (!is_single() && !is_admin()) {
        $where .= " AND post_password = ''";
      }
      return $where;
    }
    add_filter( 'posts_where', 'tz_password_post_filter' );

    // Remove 'Protected' Prefix
    function change_protected_title_prefix() {
      return '%s';
    }
    add_filter('protected_title_format', 'change_protected_title_prefix');


    /*-----------------------------------------------------------------------------------*/
    /*	Load Widgets & Shortcodes
    /*-----------------------------------------------------------------------------------*/

    // Add the Latest Blog Posts Custom Widget
    include("functions/widget-blog.php");

    // Add the Theme Post types
    include("functions/theme-posttypes.php");

    // Add the Portfolio Custom Meta
    include("functions/portfolio-meta.php");

    // Add the Theme Shortcodes
    include("functions/theme-shortcodes.php");

    // Add the Theme Advanced Custom Fields Field Groups
    include("functions/theme-acf.php");


    /*-----------------------------------------------------------------------------------*/
    /*	Filters that allow shortcodes in Text Widgets
    /*-----------------------------------------------------------------------------------*/

    add_filter('widget_text', 'shortcode_unautop');
    add_filter('widget_text', 'do_shortcode');

    remove_filter( 'the_content', 'wpautop' );
    add_filter( 'the_content', 'wpautop' , 12);


    /*-----------------------------------------------------------------------------------*/
    /*	Load Theme Options
    /*-----------------------------------------------------------------------------------*/

    define('TZ_FILEPATH', get_template_directory());
    define('TZ_DIRECTORY', get_template_directory_uri());

    require_once (TZ_FILEPATH . '/functions/theme-functions.php');
    require_once (TZ_FILEPATH . '/functions/customizer.php');


    ?>
