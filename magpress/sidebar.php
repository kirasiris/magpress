<div class="col-lg-4 col-md-4">
<div class="content_bottom_right">
<div class="single_bottom_rightbar">
<h2>Recientes</h2>
<div class="single_bottom_rightbar">
<ul role="tablist" class="nav nav-tabs custom-tabs">
<li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="home" href="#mostPopular">Post Recientes</a></li>
<li role="presentation"><a data-toggle="tab" role="tab" aria-controls="messages" href="#recentComent">Comentarios Recientes</a></li>
</ul>
<div class="tab-content">
<!-- Recent Post -->
<div id="mostPopular" class="tab-pane fade in active" role="tabpanel">
<ul class="small_catg popular_catg wow fadeInDown">
<?php $postslist = get_posts('numberposts=5&order=DESC'); foreach ($postslist as $post) : setup_postdata($post); ?>
<li>
<div class="media wow fadeInDown">
<a href="<?php the_permalink(); ?>" class="media-left"><?php the_post_thumbnail(); ?></a>
<div class="media-body">
<h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
<p><?php the_excerpt(); ?></p>
</div>
</div>
</li>
<?php endforeach; ?>
</ul>
</div>
<!-- Recent Comments -->
<div id="recentComent" class="tab-pane fade" role="tabpanel">
<ul class="small_catg popular_catg">
<?php
$comment_args = array(
'status' => 'approve',
'number' => 5,
//'posts_per_page' => 2
);

$comments_query = new WP_Comment_Query;
$comments 		= $comments_query->query( $comment_args );

if ( $comments ) {
foreach ( $comments as $comment ) {
?>
<li>
<div class="media wow fadeInDown"> <a class="media-left" href="<?php echo esc_url( $comment->comment_author_url ); ?>"><?php echo get_avatar( $comment->comment_author_email, 60 ); ?></a>
<div class="media-body">
<h4 class="media-heading"><a href="<?php echo esc_url( get_permalink( $comment->comment_post_ID ) ); ?>"><?php echo $comment->comment_author; ?></a> on</h4>
<p><?php echo $comment->post_title; ?></p>
<p><?php echo $comment->comment_content ; ?></p>
</div>
</div>
</li>
<?php }	} else { ?>
<div class="alert alert-danger">No comments added yet</div>
<?php }	?>
</ul>
</div>
<!-- /Recent Comments -->
</div>
</div>
</div>
<!-- Blog Archive -->
<div class="single_bottom_rightbar">
<h2>Blog Archive</h2>
<div class="blog_archive wow fadeInDown">
<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
</select>
</div>
</div>
<!-- /Blog Archives -->
<?php if(is_active_sidebar('sidebar')) : ?>
<?php dynamic_sidebar('sidebar'); ?>
<?php endif; ?>
</div>
</div>