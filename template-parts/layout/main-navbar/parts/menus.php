<?php

$wp_nav_menu = array(
	'theme_location'  => 'primary',
	'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
	'container'       => 'div',
	'container_class' => 'collapse navbar-collapse flex-row-reverse',
	'container_id'    => 'navbar-collapse-primary',
	'menu_class'      => 'navbar-nav',
	'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
	'walker'          => new WP_Bootstrap_Navwalker(), 
	'before_menu'			=> '',
	'after_menu'			=> '',
);

wp_nav_menu( $wp_nav_menu ); 

?>