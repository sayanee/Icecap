<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <article class="clearfix">
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

		<post>
      <p>
        <?php the_content(); ?>
        <?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
  		</p>
		</post>


	<?php comments_template( '', true ); ?>
	<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
	<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>