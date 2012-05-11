<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <article class="clearfix">
    <side>
      <div id="circle"><div><?php comments_popup_link( '0','1', '%', '', 'off' ); ?></div></div>
    	
    	<date><?php the_date(); ?></date>
	    
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

		<post><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		   <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'icecap' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
      
      <p>
        <?php the_content(); ?>
        <?php edit_post_link( __( 'Edit', 'icecap' ), '', '' ); ?>
  		</p>
		</div></post>
    
	</article>
	
	<line></line>
	  
	<?php comments_template( '', true ); ?>
	
<?php endwhile; // end of the loop. ?>

<menu class="clearfix">
  <line></line>
  <?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <div id="button" class="aligncenter">
    	<prev> <?php prev_posts_link('<img src="'.get_template_directory_uri().'/images/prev.png" />'); ?></prev>
    	<next> <?php next_posts_link('<img src="'.get_template_directory_uri().'/images/next.png" />'); ?></next>
  	</div>
  <?php endif; ?>
</menu>

<?php get_sidebar(); ?>
<?php get_footer(); ?>