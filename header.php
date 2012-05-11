<!doctype html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

  <title><?php bloginfo('name'); ?></title>

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">

  <?php
  	if ( is_singular() && get_option( 'thread_comments' ) )
  		wp_enqueue_script( 'comment-reply' );
  	wp_head();
  ?>
</head>

<body <?php body_class(); ?>>
  
  <div id="wrapper">
    <header>
      
    	<h1>
    	  <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
    	    <?php bloginfo( 'name' ); ?>
    	  </a>
    	</h1>
    	<h2><?php bloginfo( 'description' ); ?></h2>
    	<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
      
      <div id="topimage">
      	<?php if ( get_header_image() != '' ) : ?>
  			  <a href="<?php echo home_url( '/' ); ?>">
  				<?php
  					if ( is_singular() &&
  							has_post_thumbnail( $post->ID ) &&
  							( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
  							$image[1] >= HEADER_IMAGE_WIDTH ) :
  						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
  					else : ?>
  					<img src="<?php header_image(); ?>" />
  				<?php endif; ?>
		    </a>
			  <?php endif; ?>
			</div><!-- #topimage -->
  			
  	</header>