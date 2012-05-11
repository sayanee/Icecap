<?php 

function load_fonts() {
    wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Quicksand');
    wp_enqueue_style( 'googleFonts');
}
add_action('wp_print_styles', 'load_fonts');


add_custom_image_header( '', '', '' );
register_default_headers( array(
	'ceiling' => array(
		'url' => '%s/images/headers/ceiling.jpg',
		'thumbnail_url' => '%s/images/headers/ceiling-thumbnail.jpg',
		'description' => __( 'Ceiling', 'icecap' )
	),
	'wheel' => array(
		'url' => '%s/images/headers/wheel.jpg',
		'thumbnail_url' => '%s/images/headers/wheel-thumbnail.jpg',
		'description' => __( 'Wheel', 'icecap' )
	),
	'sunset' => array(
		'url' => '%s/images/headers/sunset.jpg',
		'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
		'description' => __( 'Sunset', 'icecap' )
	)
) );

if ( ! isset( $content_width ) ) $content_width = 640;
add_action( 'after_setup_theme', 'icecap_setup' );

if ( ! function_exists( 'icecap_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override icecap_setup() in a child theme, add your own icecap_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * 
 */
 
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $depth;
  ?>
  	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
      
  	  <comment class="clearfix">
      <div class="comment-author vcard">
        
      	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
  		  <div class="comment-meta">
    		  <?php printf(__('<a href="%3$s">%1$s <br/>@%2$s</a><br/>', 'icecap'),
    				get_comment_date('jMy'),
    				get_comment_time('ga'),
    				'#comment-' . get_comment_ID() );
    				edit_comment_link(__('Edit', 'icecap'), '  <span class="edit-link">', '</span>'); ?>
    		</div><!--comment-meta-->
    		
  		</div><!--comment-author vcard-->		
  		
      <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'icecap') ?>
        <div class="comment-content">
          <h6><?php printf(__('<cite class="fn">%s</cite> <span class="says">says...</span>'), get_comment_author_link()) ?></h6>
          <?php comment_text() ?>
          
          <?php // echo the comment reply link with help from Justin Tadlock http://justintadlock.com/ and Will Norris http://willnorris.com/
      			if($args['type'] == 'all' || get_comment_type() == 'comment') :
      				comment_reply_link(array_merge($args, array(
      					'reply_text' => __('[reply]','icecap'), 
      					'login_text' => __('Log in to reply.','icecap'),
      					'depth' => $depth,
      					'before' => '<div class="comment-reply-link">', 
      					'after' => '</div>'
      				)));
      			endif;
      		?>
  			    
        </div><!--comment-content-->
        </comment>
		    
<?php } // end custom_comments
 
function icecap_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'icecap', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'icecap' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/path.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to icecap_header_image_width and icecap_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'icecap_header_image_width', 800 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'icecap_header_image_height', 150 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 800  pixels wide by 150 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );

}
endif;

if ( ! function_exists( 'icecap_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in icecap_setup().
 *
 * 
 */
function icecap_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;



/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * 
 */
function icecap_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'icecap_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * 
 * @return int
 */
function icecap_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'icecap_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * 
 * @return string "Continue Reading" link
 */
function icecap_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'icecap' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and icecap_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * 
 * @return string An ellipsis
 */
function icecap_auto_excerpt_more( $more ) {
	return ' &hellip;' . icecap_continue_reading_link();
}
add_filter( 'excerpt_more', 'icecap_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * 
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function icecap_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= icecap_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'icecap_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
  *
 * 
 * @return string The gallery style filter, with the styles themselves removed.
 */
function icecap_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'icecap_remove_gallery_css' );

if ( ! function_exists( 'icecap_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own icecap_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * 
 */
function icecap_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'icecap' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'icecap' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'icecap' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'icecap' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'icecap' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'icecap'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override icecap_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * 
 * @uses register_sidebar
 */
function icecap_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'icecap' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'icecap' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'icecap' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'icecap' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'icecap' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'icecap' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'icecap' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'icecap' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'icecap' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'icecap' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'icecap' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'icecap' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running icecap_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'icecap_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * 
 */
function icecap_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'icecap_remove_recent_comments_style' );

if ( ! function_exists( 'icecap_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * 
 */
function icecap_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'icecap' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'icecap' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'icecap_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * 
 */
function icecap_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'icecap' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'icecap' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'icecap' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;
