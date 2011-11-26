<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>
<!-- You can start editing here. -->
<comments>
  <?php if ( have_comments() ) : ?>
  	<h3><?php comments_number('No Comments', 'One Comment', '% Comments' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

  	<div id="comments-nav" class="clearfix">
  		<div class="alignleft"><?php previous_comments_link() ?></div>
  		<div class="alignright"><?php next_comments_link() ?></div>
  	</div>

  	<ol class="commentlist">
  	<?php wp_list_comments('avatar_size=48'); ?>
  	</ol>

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


  <?php if ( comments_open() ) : ?>


  
<div id="respond">  
  
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

  <div class="leaveComment">
    
    <fieldset>
      <legend><span><?php comment_form_title('Leave a Comment','Leave a Reply to %s'); ?></span></legend>
      <div class="commentForm">
      
      <?php if ( is_user_logged_in() ) : ?>

      <p class="loggedin">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
      <label>Comment:
      <textarea name="comment" id="comment" cols="50" rows="20" class="loggedIn"></textarea></label>


      <?php endif; ?>
        <?php if ( !is_user_logged_in() ) : ?>
          <div class="commentAuthorInfo">
            <label>Name: <em>Required</em> <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" /></label>
            <label>Email: <em>Required, not published</em> <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" /></label>
            <label>Homepage: <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" /></label>
          </div>
        <label>Comment:
        <textarea name="comment" id="comment" cols="50" rows="20"></textarea></label>
      <?php endif; ?>

        <div id="cancel-comment-reply">
        	<small><?php cancel_comment_reply_link('Cancel Reply') ?></small>
        </div>
        <input type="submit" value="Post Comment" /> <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
      </div>
    </fieldset>
  </div>
  <?php comment_id_fields(); ?>

<?php do_action('comment_form', $post->ID); ?>

</form>
</div>
<?php endif; // If registration required and not logged in ?>


<?php endif; // if you delete this the sky will fall on your head ?>

</comments>
