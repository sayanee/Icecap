<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <article class="clearfix">
    <side>
      <div id="circle">
        <div><?php comments_popup_link( __( '0', 'twentyten' ), __( '1', 'twentyten' ), __( '%', 'twentyten' ) ); ?></div>
      </div>
    	
    	<date><?php the_date(); ?></date>
    </side>
      
  <post>
    <?php if ( is_front_page() ) { ?>
  		<h4><?php the_title(); ?></h4>
  	<?php } else { ?>	
  		<h4><?php the_title(); ?></h4>
  	<?php } ?>				

    <p>
    <?php the_content(); ?>
      <?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
  	</p>
      
    <?php comments_template( '', true ); ?>
  </post>

<?php endwhile; ?>

<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>