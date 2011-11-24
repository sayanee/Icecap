<?php if ( ! have_posts() ) : ?>
	<h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
	<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
	<?php get_search_form(); ?>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
  
  <article class="clearfix">
    
   <post>
      <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>

      <p>
    	  <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
      		<?php the_excerpt(); ?>
      	<?php else : ?>
      		<?php the_content( __( 'Continue reading &rarr;', 'twentyten' ) ); ?>
      		<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
      	<?php endif; ?>

      	<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
    	</p>

    	<?php comments_template( '', true ); ?>
  	</post>
    	
    	
    <side>
      <div id="circle"><div><?php comments_popup_link( __( '0', 'twentyten' ), __( '1', 'twentyten' ), __( '%', 'twentyten' ) ); ?></div></div>
    	
    	<date><?php the_date(); ?></date>
	    
	    <list>
      	<?php if ( count( get_the_category() ) ) : ?>
      		<?php printf( __( '%2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
      </list>		
      	<?php endif; ?>
	
	    <list>
      	<?php $tags_list = get_the_tag_list( '', ', ' ); if ( $tags_list ): ?>
      		<?php printf( __( '%2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
      	<?php endif; ?>
    	</list>
    	
  	</side>
  
   
	
	</article>

<?php endwhile; ?>

<menu>
  <line></line>
  <?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <div id="button" class="aligncenter">
    	<prev><?php next_posts_link( __( '&larr; Previous', 'twentyten' ) ); ?></prev>
    	<next><?php previous_posts_link('<img src="./images/prev.png" />'); ?></next>
  	</div>
  <?php endif; ?>
</menu>