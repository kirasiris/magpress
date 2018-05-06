<?php
 // Registrar Clase Nav Walker
 require_once('wp-bootstrap-navwalker.php');
 
function wpb_theme_setup(){
// Registrando la funcion para el menu principal
	register_nav_menus(array(
      'primary' => __('Menu Principal','magpress'),
	  'secondary' => __('Menu Secundario','magpress'),
    ));
	
// Soporte para archivo
		add_theme_support('custom-logo');
		add_theme_support('post-thumbnails');
		add_image_size('destacados', 567, 330);
		add_image_size('sticky', 300, 215);
		add_image_size('popular', 292, 150);
	}
	add_action('after_setup_theme','wpb_theme_setup');
	
// Largura de Excerpt
	function set_excerpt_length(){
		return 20;
		}
	add_filter('excerpt_length' , 'set_excerpt_length');
// Funcion para buscador. El input de buscar buscara la keyword unicamente en los post
function search_filter( $query ) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ( $query->is_search ) {
      $query->set( 'post_type', array( 'post' ) );
    }
  }
}
add_action( 'pre_get_posts','search_filter' );
// Sidebar y Posicion de Widgets
	function wpb_init_widgets($id){
		
		register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div class="single_bottom_rightbar">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
		));
		
		register_sidebar(array(
		'name' => 'Footer Area 1',
		'id' => 'footer1',
		'before_widget' => '<div class="animated fadeInRight single_footer_top wow">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
		));

		register_sidebar(array(
		'name' => 'Footer Area 2',
		'id' => 'footer2',
		'before_widget' => '<div class="animated fadeInRight single_footer_top wow">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
		));

		register_sidebar(array(
		'name' => 'Footer Area 3',
		'id' => 'footer3',
		'before_widget' => '<div class="animated fadeInRight single_footer_top wow">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
		));
			
}
		
	add_action('widgets_init', 'wpb_init_widgets');
?>
<?php 
// Customizer File
//require get_template_directory(). '/includes/customizer.php';
?>

<?php //this function will be called in the next section
function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
 
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div class="comment-author vcard">
     <?php echo get_avatar($comment,$size='100' ); ?>
     
       <div class="comment-meta"><a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s'), get_comment_author_link()) ?></a></div>
       <small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small>
     </div>
     <div class="clear"></div>
 
     <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.') ?></em>
       <br />
     <?php endif; ?>
 
     <div class="comment-text">	
         <?php comment_text() ?>
     </div>
 
   <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
   </div>
   <div class="clear"></div>
<?php } ?>
<?php
// Para borrar comentarios deirectamente de la website y no del dashboard solamente
 function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'">Delete/Borrar</a> ';
    echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">Spam</a>';
  }
}
?>
<?php
//// Capa extra contra comentarios spam
 function check_referrer() {
    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == “”) {
        wp_die( __('Please enable referrers in your browser, or, if you\'re a spammer, get out of here!') );
    }
}
 
add_action('check_comment_flood', 'check_referrer');
 ?>