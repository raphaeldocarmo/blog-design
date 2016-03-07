<?php 
	load_theme_textdomain( 'your-theme', TEMPLATEPATH . '/languages' );
	 
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable($locale_file) )
	   require_once($locale_file);
	 
	function get_page_number() {
	          if ( get_query_var('paged') ) {
	              print ' | ' . __( 'Page ' , 'seu-template') . get_query_var('paged');
	         }
	 } 
?>

<?php
/* WIDGETS */
 
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name'          => 'Sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
 
?>

<?php
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 300 );
?>

<?php 
	function new_excerpt_more( $more ) {
		return ' <p class="leia-mais"><a href="'. get_permalink( get_the_ID() ) . '">' . __('Leia mais', 'your-text-domain') . '</a></p>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );
?>

<?php 
	add_filter('the_content_feed', 'rss_post_thumbnail');
	function rss_post_thumbnail($content) {
		global $post;
		if( has_post_thumbnail($post->ID) )
			$content = '<p>' . get_the_post_thumbnail($post->ID, 'thumbnail') . '</p>' . $content;
		return $content;
	}
?>

<?php
	/**
	 * Load javascripts used by the theme
	 */
	function custom_theme_js(){
	    wp_register_script( 'infinite_scroll',  get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array('jquery'),null,true );
	    if( ! is_singular() ) {
	        wp_enqueue_script('infinite_scroll');
	    }
	}
	add_action('wp_enqueue_scripts', 'custom_theme_js');
?>

<?php
	function get_excerpt($count){
	  $permalink = get_permalink($post->ID);
	  $excerpt = get_the_content();
	  $excerpt = strip_tags($excerpt);
	  $excerpt = substr($excerpt, 0, $count);
	  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	  $excerpt = '<p class="resumo">'.$excerpt.'...</p> <a href="'.$permalink.'" class="leia-mais">Ver post completo</a>';
	  return $excerpt;
	}
?>