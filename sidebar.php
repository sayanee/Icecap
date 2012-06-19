<sidebar >
  <ul class="xoxo">

    <?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>	
      <li>
    		<?php get_search_form(); ?>
    	</li>

    	<li>
    		<h3><?php _e( 'Archives', 'icecap' ); ?></h3>
    		<ul>
    			<?php wp_get_archives( 'type=monthly' ); ?>
    		</ul>
    	</li>

    	<li>
    		<h3><?php _e( 'Meta', 'icecap' ); ?></h3>
    		<ul>
    			<?php wp_register(); ?>
    			<li><?php wp_loginout(); ?></li>
    				<?php wp_meta(); ?>
    		</ul>
    	</li>

    <?php endif; // end primary widget area ?>
  
  </ul>

  <?php if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
  	<ul class="xoxo">
  		<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
  	</ul>
  <?php endif; ?>

</sidebar>