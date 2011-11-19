<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<a href="http://wordpress.org/" title="Semantic Personal Publishing Platform" rel="generator">Proudly powered by WordPress </a>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>

  </div><!--eo #wrapper-->
  
  <script> // Change UA-XXXXX-X to be your site's ID
     window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
     Modernizr.load({
       load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
     });
   </script>


   <!--[if lt IE 7 ]>
     <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
     <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
   <![endif]-->
   
   
</body>
</html>