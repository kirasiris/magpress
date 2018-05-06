<?php $orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=> 6, // Number of related posts that will be shown.
'caller_get_posts'=>1
);

$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
echo '<div class="similar_post"><h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2><ul class="small_catg similar_nav wow fadeInDown animated">';
while( $my_query->have_posts() ) {
$my_query->the_post();?>
            <li>
              <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                  <p><?php the_excerpt(); ?></p>
                </div>
              </div>
            </li>

<?php
}
echo '</ul></div>';
}
}
$post = $orig_post;
wp_reset_query(); ?>
<div class="clearfix"></div>