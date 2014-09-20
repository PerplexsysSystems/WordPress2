<?php
require_once ( get_template_directory() . '/theme-options.php' );

//Register Menus
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );
?>
