<?php get_header(); ?>
<section id="mainContent">
<div class="content_bottom">
<div class="col-lg-8 col-md-8">
<div class="content_bottom_left">
<div class="single_page_area">
<ol class="breadcrumb">
<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
<li><a href="#"><?php the_category(','); ?></a></li>
<li class="active"><?php the_title(); ?></li>
</ol>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2 class="post_titile"><?php the_title(); ?></h2>
<div class="single_page_content">
<!-- Metadata -->
<div class="post_commentbox">
<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a>
<span><i class="fa fa-calendar"></i><?php the_time('F j, Y g:i a'); ?></span>
<a><i class="fa fa-tags"></i><?php the_category(','); ?></a>
</div>
<!-- Main Content -->
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<p><?php the_content(); ?></p>
</div>
<?php endwhile; else : ?>
<div class="alert alert-info">No data found</div>
<?php endif; ?>
</div>
</div>
<!-- Pagination -->
<div class="post_pagination">
<div class="prev">
<a class="angle_left"><i class="fa fa-angle-double-left"></i></a>
<div class="pagincontent"><span>Previous Post</span><?php previous_post_link( '%link', '%title'); ?></div>
</div>

<div class="next">
<div class="pagincontent"><span>Next Post</span><?php next_post_link( '%link', '%title' ); ?></div>
<a class="angle_right"><i class="fa fa-angle-double-right"></i></a>
</div>
</div>
<!-- Share Icons -->
<div class="share_post">
<a class="facebook" rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo urlencode(get_the_title($id)); ?>"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a>
<a class="twitter"  rel="nofollow" href="http://twitter.com/home?status=<?php echo urlencode(get_the_title($id)); ?><?php the_permalink(); ?>"><i class="fa fa-twitter"></i>Twitter</a>
<a class="googleplus" rel="nofollow" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus"></i>Google+</a>
<a class="linkedin" rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title() ?>&summary=<?php the_excerpt(); ?>&source=<?php bloginfo('url') ?>"><i class="fa fa-linkedin"></i>LinkedIn</a>
<a class="stumbleupon" rel="nofollow" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo urlencode(get_the_title($id)); ?>"><i class="fa fa-stumbleupon"></i>StumbleUpon</a>
<a class="pinterest" rel="nofollow" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i>Pinterest</a>
</div>
<!-- Similar Post -->
<?php include('includes/relatedpost.php') ?>
<?php comments_template(); ?>
</div>
<!-- Sidebar -->
<?php get_sidebar(); ?>
</div>
</section>
<?php get_footer(); ?>