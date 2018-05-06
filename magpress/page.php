<?php get_header(); ?>
<!-- Main Content -->
<section id="mainContent">
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_page_area">
            <ol class="breadcrumb">
              <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
              <li class="active"><?php the_title(); ?></li>
            </ol>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h2 class="post_titile"><?php the_title(); ?></h2>
            <div class="single_page_content">
            <p><?php the_content();?></p>
            </div>
            <?php endwhile; else :?>
            <div class="alert aler-info">No data found</div>
            <?php endif;?>
          </div>
        </div>
      </div>
<!-- Sidebar -->
<?php get_sidebar(); ?>
    </div>
  </section>
<?php get_footer(); ?>