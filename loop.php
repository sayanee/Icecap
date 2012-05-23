<?php if ( ! have_posts() ) : ?>
	<h1><?php _e( 'Not Found', 'icecap' ); ?></h1>
	<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'icecap' ); ?></p>
	<?php get_search_form(); ?>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
  
  <article class="clearfix">
    
   <post><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'icecap' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>

      <p>
    	  <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
      		<?php the_excerpt(); ?>
      	<?php else : ?>
      		<?php the_content( __( 'Continue reading &rarr;', 'icecap' ) ); ?>
      		<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'icecap' ), 'after' => '' ) ); ?>
      	<?php endif; ?>

    	</p>

    	<?php comments_template( '', true ); ?>
   </div></post>
    	
    	
    <side>
      <div id="circle"><div><?php comments_popup_link( '0','1', '%', '', 'off' ); ?></div></div>
    	
    	<date><?php the_date(get_option( 'date_format' )); ?></date>
	    
	    <list>
      	<?php if ( count( get_the_category() ) ) : ?>
      		<?php printf( __( '%2$s', 'icecap' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
      </list>		
      	<?php endif; ?>
	
	    <list>
      	<?php $tags_list = get_the_tag_list( '', ', ' ); if ( $tags_list ): ?>
      		<?php printf( __( '%2$s', 'icecap' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
      	<?php endif; ?>
    	</list>
    	
  	</side>
  
	</article>

<?php endwhile; ?>

<nav class="clearfix">
  <line></line>
  <?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <div id="button" class="aligncenter">
    	<prev><?php next_posts_link('<img src="'.get_template_directory_uri().'/images/prev.png" />'); ?></prev>
    	<next><?php previous_posts_link('<img src="'.get_template_directory_uri().'/images/next.png" />'); ?></next>
  	</div>
  <?php endif; ?>
</nav>