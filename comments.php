<?php // Do not delete these lines
	
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>
<!-- You can start editing here. -->
<comments>
  <?php if ( have_comments() ) : ?>
  	<h3><?php comments_number('0', '1', '%' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

  	<div id="comments-nav" class="clearfix">
  		<div class="alignleft"><?php previous_comments_link() ?></div>
  		<div class="alignright"><?php next_comments_link() ?></div>
  	</div>

  	<ol class="commentlist">
      <?php wp_list_comments(array('avatar_size' => '80', 'type' => 'comment', 'callback' => 'custom_comments')); ?>
  	</ol>

    <?php if ( ! empty($comments_by_type['pings']) ) : ?>
      <h2 id="pings">Trackbacks/Pingbacks</h2>

      <ol class="commentlist"><?php wp_list_comments('type=pings'); ?></ol>
    <?php endif; ?>

  	<div id="comments-nav" class="clearfix">
  		<div class="alignleft"><?php previous_comments_link() ?></div>
  		<div class="alignright"><?php next_comments_link() ?></div>
  	</div>
   <?php else : // this is displayed if there are no comments so far ?>

  	<?php if ( comments_open() ) : ?>
  		<!-- If comments are open, but there are no comments. -->

  	 <?php else : // comments are closed ?>
  		<!-- If comments are closed. -->

  	<?php endif; ?>
  <?php endif; ?>

</comments>

<?php if ( comments_open() ) : ?>
    
  <?php comment_form(array(
    'title_reply'=>'Leave a comment',
    'comment_notes_before' => '',
    'comment_notes_after' => ''
    )
  ); ?>
  <line></line>

<?php endif; // If registration required and not logged in ?>



