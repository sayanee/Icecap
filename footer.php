    <?php get_sidebar( 'footer' ); ?>
    
  	  <footer>
  	    <line></line>
  	    <p>made with wacky thinking</p>
        <?php wp_footer(); ?>
      </footer>

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
   
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
   <script src="<?php bloginfo("template_url"); ?>/js/jquery.fittext.js"></script>
   <script>
     $("#fittext").fitText();
   </script>
   
</body>
</html>