<?php get_header(); ?>
<section id="mainContent">
    <div class="content_top">
      <div class="row">
        <!------------------------------------------------------------------ Sticky category --------------------------------------------------------->
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="content_top_right">
            <ul class="featured_nav wow fadeInDown">
			  <?php $sticky_query = new WP_Query(array(
                  'order' => 'ASC',
				  'category_name' => 'sticky'
              )); ?>
              <?php while($sticky_query->have_posts()) : $sticky_query->the_post(); ?>
              <li>
              	<?php the_post_thumbnail('sticky'); ?>
                <div class="title_caption"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
              </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
        <!------------------------------------------------------------------ /Sticky category --------------------------------------------------------->
      </div>
    </div>
    <div class="content_middle">
<!------------------------------------------------------------------ Destacados category --------------------------------------------------------->
			  <?php
                  // Get the ID of a given category
                  $category_id = get_cat_ID( 'destacados' );
              
                  // Get the URL of this category
                  $category_link = get_category_link( $category_id );
              ?>
      <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="content_middle_rightbar">
          <div class="single_category wow fadeInDown">
            <h2><span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="<?php echo esc_url( $category_link ); ?>" class="title_text">Destacados</a></h2>
          </div>
        </div>
        <div class="content_middle_middle">
          <div class="slick_slider2">
			  <?php $destacados_query = new WP_Query(array(
                  'order' => 'ASC',
				  'category_name' => 'destacados'
              )); ?>
              <?php while($destacados_query->have_posts()) : $destacados_query->the_post(); ?>
            <div class="single_featured_slide">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('destacados'); ?></a>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p><?php the_excerpt(); ?></p>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
<!------------------------------------------------------------------ /Destacados category --------------------------------------------------------->
<!---------------------------------------------------------------------- Popular category --------------------------------------------------------->
			  <?php
                  // Get the ID of a given category
                  $category_id = get_cat_ID( 'popular' );
              
                  // Get the URL of this category
                  $category_link = get_category_link( $category_id );
              ?>
      <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="content_middle_rightbar">
          <div class="single_category wow fadeInDown">
            <h2><span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="<?php echo esc_url( $category_link ); ?>" class="title_text">Populares</a></h2>
            <ul class="catg1_nav">
              <?php $popular_query = new WP_Query(array(
                        'orderby'   => 'comment_count',
						'category_name' => 'popular',
                        'posts_per_page'    => 3	
			  )); ?>
              <?php while($popular_query->have_posts()) : $popular_query->the_post(); ?>
              <li>
              	<div class="catgimg_container">
                	<a href="<?php the_permalink();?>" class="catg1_img">
                    	<?php the_post_thumbnail('popular'); ?>
                    </a>
                </div>
                <h3 class="post_titile"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
      </div>
<!---------------------------------------------------------------------- /Popular category --------------------------------------------------------->
    </div>
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
<!---------------------------------------------------------------------- Business Category --------------------------------------------------------->
<?php
// Get the ID of a given category
$category_id = get_cat_ID( 'business' );

// Get the URL of this category
$category_link = get_category_link( $category_id );
?>
<?php
$business = array(
'category_name' => 'business',
'numberposts' => 1,
'order' => 'DESC',
);
?>

<div class="single_category wow fadeInDown">
<h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="<?php echo esc_url( $category_link ); ?>">Negocios</a> </h2>
<div class="business_category_left wow fadeInDown">
<ul class="fashion_catgnav">
<?php $recent_posts = wp_get_recent_posts( $business  );?>
<?php foreach( $recent_posts as $recent ): ?>
<li>
<div class="catgimg2_container">
<?php echo '<a href="' . get_permalink($recent["ID"]) . '">' . get_the_post_thumbnail($recent["ID"]).'</a>' ?>
</div>
<h2 class="catg_titile"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'</a>' ?></h2>
<div class="clearfix"></div>
<div class="comments_box">
<span class="meta_date"><?php echo get_the_date( '', $recent["ID"]) ?></span>
<span class="meta_comment"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">' . get_comments_number($recent["ID"]) .'</a>' ?></span>
<span class="meta_more"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">Read more</a>' ?></span>
<div class="clearfix"></div>
<p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla...</p>
</div>
</li>
<?php endforeach; ?>
</ul>
</div>
<div class="business_category_right wow fadeInDown">
<ul class="small_catg">
              <?php $business_query = new WP_Query(array(
                        'order'   => 'ASC',
						'category_name' => 'business',
						'posts_per_page' => 3
			  ));
			  ?>
              <?php while($business_query->have_posts()) : $business_query->the_post(); ?>
                <li>
                <div class="media wow fadeInDown"> <a class="media-left" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                <div class="media-body">
               	<h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
               	<div class="comments_box"> <span class="meta_date"><?php the_time('F j, Y g:i a'); ?></span> <span class="meta_comment"><a href="<?php the_permalink(); ?>"><?php echo $post->comment_count; ?></a></span> </div>
                <div class="clearfix"></div>
				<?php the_excerpt(); ?>
                </div>
                </div>
                </li>
              <?php endwhile; ?>
</ul>
</div>
</div>
<!---------------------------------------------------------------------- /Business Category --------------------------------------------------------->
          <div class="games_fashion_area">
<!---------------------------------------------------------------------- Technology Category -------------------------------------------------------->
<?php
// Get the ID of a given category
$category_id = get_cat_ID( 'technology' );

// Get the URL of this category
$category_link = get_category_link( $category_id );
?>
<?php
$technology = array(
'category_name' => 'technology',
'numberposts' => 1,
'order' => 'DESC',
);
?>
<div class="games_category">
<div class="single_category">
<h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="<?php echo esc_url( $category_link ); ?>">Technologia</a> </h2>
<ul class="fashion_catgnav wow fadeInDown">
<?php $recent_posts = wp_get_recent_posts( $technology  );?>
<?php foreach( $recent_posts as $recent ): ?>                  
<li>
<div class="catgimg2_container"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">' . get_the_post_thumbnail($recent["ID"]).'</a>' ?></div>
<h2 class="catg_titile"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'</a>' ?></h2>
<div class="clearfix"></div>
<div class="comments_box">
<span class="meta_date"><?php echo get_the_date( '', $recent["ID"]) ?></span>
<span class="meta_comment"><?php echo get_comments_number($recent["ID"]) ?></span>
<span class="meta_more"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">Read more</a>' ?></span>
</div>
<p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla...</p>
</li>
<?php endforeach; ?>                  

</ul>
<ul class="small_catg wow fadeInDown">
<?php $technology_query = new WP_Query(array(
'order'   => 'ASC',
'category_name' => 'technology',
'posts_per_page' => 2
)); ?>
<?php while($technology_query->have_posts()) : $technology_query->the_post(); ?>
<li>
<div class="media"> <a class="media-left" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
<div class="media-body">
<h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
<div class="comments_box"> <span class="meta_date"><?php the_time('F j, Y g:i a'); ?></span> <span class="meta_comment"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">' . $post->comment_count .'</a>' ?></span> </div>
<div class="clearfix"></div>
<?php the_excerpt(); ?>
</div>
</div>
</li>
<?php endwhile; ?>
</ul>
</div>
</div>
<!---------------------------------------------------------------------- /Technology Category -------------------------------------------------------->
<!---------------------------------------------------------------------- Celebrity Category -------------------------------------------------------->
			  <?php
                  // Get the ID of a given category
                  $category_id = get_cat_ID( 'celebrity' );
              
                  // Get the URL of this category
                  $category_link = get_category_link( $category_id );
              ?>
<?php
$celebrity = array(
'category_name' => 'celebrity',
'numberposts' => 1,
'order' => 'DESC',
);
?>
            <div class="fashion_category">
              <div class="single_category">
                <div class="single_category wow fadeInDown">
                  <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="<?php echo esc_url( $category_link ); ?>">Celebridades</a> </h2>
                  <ul class="fashion_catgnav wow fadeInDown">
<?php $recent_posts = wp_get_recent_posts( $celebrity  );?>
<?php foreach( $recent_posts as $recent ): ?>
                    <li>
                      <div class="catgimg2_container"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">' . get_the_post_thumbnail($recent["ID"]).'</a>' ?></div>
                      <h2 class="catg_titile"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'</a>' ?></h2>
                      <div class="comments_box"> <span class="meta_date"><?php echo get_the_date( '', $recent["ID"]) ?></span>
<span class="meta_comment"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">' . get_comments_number($recent["ID"]) .'</a>' ?></span> <span class="meta_more"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">Read more</a>' ?></span> </div>
                      <div class="clearfix"></div>
                      <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla...</p>
                    </li>
<?php endforeach; ?>
                  </ul>
                  <ul class="small_catg wow fadeInDown">
<?php $technology_query = new WP_Query(array(
'order'   => 'ASC',
'category_name' => 'celebrity',
'posts_per_page' => 2
)); ?>
<?php while($technology_query->have_posts()) : $technology_query->the_post(); ?>         
              <li>
                <div class="media wow fadeInDown"> <a class="media-left" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <div class="comments_box"> <span class="meta_date"><?php the_time('F j, Y g:i a') ?></span> <span class="meta_comment"><?php echo '<a href="' . get_permalink($recent["ID"]) . '">' . $post->comment_count .'</a>' ?></span> </div>
                    <div class="clearfix"></div>
                    <?php the_excerpt(); ?>
                  </div>
                </div>
              </li>
<?php endwhile; ?>
                  </ul>
                </div>
              </div>
            </div>
<!---------------------------------------------------------------------- /Celebrity Category -------------------------------------------------------->
          </div>
          
        </div>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </section>
<?php get_footer(); ?>