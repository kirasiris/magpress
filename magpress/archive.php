<?php get_header(); ?>
<div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_category wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <div class="archive_style_1">
              <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <span class="title_text">Latest Updates</span> </h2>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <div class="single_archive wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                <div class="archive_imgcontainer"><?php the_post_thumbnail(); ?></div>
                <div class="archive_caption">
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php the_excerpt(); ?></p>
                </div>
                <a class="read_more" href="<?php the_permalink(); ?>"><span>Read More</span></a>
              </div>
              <?php endwhile; ?>
              <?php else : ?>
              <div class="alert alert-danger">No data found</div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        
        <div class="pagination_area">
          <nav>
            <ul class="pagination">
              <li><?php previous_posts_link( 'Newer posts' ); ?></li>
              <li><?php next_posts_link( 'Older posts' ); ?></li>
            </ul>
          </nav>
        </div>
      </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>