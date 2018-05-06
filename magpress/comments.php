<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
 
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
 
	if ( post_password_required() ) { ?>
		<div class="alert alert-secondary">This post is password protected. Enter the password to view comments.</div>
	<?php
		return;
	}
?> 
<!-- You can start editing here. -->
 
<?php if ( have_comments() ) : ?>
 <div class="alert alert-secondary" role="alert"><?php comments_number('No respuestas', 'Una respuesta', '% Respuestas' );?> a &#8220;<?php the_title(); ?>&#8221;</div>
 
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=advanced_comment'); //this is the important part that ensures we call our custom comment layout defined above  ?>
	</ol>
	<div class="clear"></div>
	<div class="comment-navigation">
		<div class="older"><?php previous_comments_link() ?></div>
		<div class="newer"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>
 
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
             <div class="alert alert-warning" role="alert"><p>No comment found</p></div>
             <div class="alert alert-primary" role="alert"><?php comment_form_title( 'Gustas Comentar?','Envia una respuesta a %s' ); ?></div>
             <div class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></div>
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
 <div class="alert alert-danger" role="alert"><p>The comments are closed</p></div>
 
	<?php endif; ?>
<?php endif; ?>
 
<?php if ( comments_open() ) : ?>

<div id="respond">
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( is_user_logged_in() ) : ?>
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
<?php else : //this is where we setup the comment input forums ?>
  <div class="form-group">
    <label for="author">Name:<small><?php if ($req) echo "(requerido/required)"; ?></small></label>
    <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" class="form-control" placeholder="John Doe" <?php if ($req) echo "aria-required='true'"; ?>>
  </div>
  <div class="form-group">
    <label for="email">E-mail: <small><?php if ($req) echo "(requerido/required)"; ?></small></label>
    <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" class="form-control" placeholder="johndoe@demo.com" <?php if ($req) echo "aria-required='true'"; ?>>
  </div>
  <div class="form-group">
    <label for="url">Website:</label>
    <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" class="form-control" placeholder="www.demo.com" <?php if ($req) echo "aria-required='true'"; ?>>
  </div>
<?php endif; ?>
  <div class="form-group">
    <label for="comment">Escribe abajo:<small><?php if ($req) echo "(requerido/required)"; ?></small></label>
    <textarea name="comment" id="comment" class="form-control"  rows="3"></textarea>
    <small>Allowed tags: <?php echo allowed_tags(); ?></small> 
  </div>
<div class="form-group">
<input name="submit" type="submit" class="button button-primary button-small" value="Post">
<?php comment_id_fields(); ?>
</div> 
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php comments_rss_link('Subscribe to Comments via RSS'); ?>
<?php endif; // If registration required and not logged in ?>
</div>



<?php endif; // if you delete this the sky will fall on your head ?>