<?php wp_footer(); ?>
</div>
<!-- /Container -->
<footer id="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
			<?php if(is_active_sidebar('footer1')) : ?>
            <?php dynamic_sidebar('footer1'); ?>
            <?php endif; ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
			<?php if(is_active_sidebar('footer2')) : ?>
            <?php dynamic_sidebar('footer2'); ?>
            <?php endif; ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
			<?php if(is_active_sidebar('footer3')) : ?>
            <?php dynamic_sidebar('footer3'); ?>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_left">
            <p>&copy; <?php echo Date('Y'); ?> - <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_right">
            <p>Developed by Wpfreeware and Programmed by <a href="https://blogpersonal.net/" target="_blank">Kevin Fonseca</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Master js (Bootstrap, Unicorn Buttons, and Back to top ) -->
<script src="<?php bloginfo('template_url'); ?>/js/master.js" type="text/javascript"></script>
</body>
</html>