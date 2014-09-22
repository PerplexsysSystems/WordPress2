<?php
require_once ( get_template_directory() . '/theme-options.php' );

//Register Menus
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_my_menu' );


//Register Post Types
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'acme_product',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}

//enable single-{cat slug}.php templates based on post category
//
//Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
		return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);

//enable featured Image
add_theme_support( 'post-thumbnails' ); 

//breadcrumb function
function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> / </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> / </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

//Create categories on theme activation
function create_my_cat () {
    if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php')) {
        require_once (ABSPATH.'/wp-admin/includes/taxonomy.php'); 
        if ( ! get_cat_ID( 'News Articles' ) ) {
            wp_create_category( 'News Article' );
        }
        if ( ! get_cat_ID( 'Call To Action' ) ) {
            wp_create_category( 'Call To Action' );
        }
        if ( ! get_cat_ID( 'Latest Projects' ) ) {
            wp_create_category( 'Latest Projects' );
        }
        if ( ! get_cat_ID( 'Sliders' ) ) {
            wp_create_category( 'Sliders' );
        }
        if ( ! get_cat_ID( 'Reviews and Whitepapers' ) ) {
            wp_create_category( 'Reviews and Whitepapers' );
        }
        if ( ! get_cat_ID( 'Bottom Row' ) ) {
            wp_create_category( 'Bottom Row' );
        }
        if ( ! get_cat_ID( 'Blog' ) ) {
            wp_create_category( 'Blog' );
        }
    }
}
add_action ( 'after_setup_theme', 'create_my_cat' );
?>