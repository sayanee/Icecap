<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<h1><?php printf( __( 'Search Results for: %s', 'icecap' ), '' . get_search_query() . '' ); ?></h1>
	<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
	<h2><?php _e( 'Nothing Found', 'icecap' ); ?></h2>
	<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'icecap' ); ?></p>
	<?php get_search_form(); ?>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
