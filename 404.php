<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>



				<h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
				<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'twentyten' ); ?></p>
				<?php get_search_form(); ?>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

	<script>
  var GOOG_FIXURL_LANG = (navigator.language || '').slice(0,2),
GOOG_FIXURL_SITE = location.host;
  </script>
  <script src="http://linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js"></script>

<?php get_footer(); ?>