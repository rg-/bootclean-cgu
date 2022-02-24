<?php

  /* 
    Add #inicio element to use for scroll-to
  */ 

  add_action('wpbc/layout/start', function($out){
    ?><div id="inicio"></div><?php
  },0,1);   

/**
 * Limit max menu depth in admin panel to 2
 */
function wp_nav_menu_globalMaxDepth( $hook ) {
  if ( $hook != 'nav-menus.php' ) return;

  // override default value right after 'nav-menu' JS
  wp_add_inline_script( 'nav-menu', 'wpNavMenu.options.globalMaxDepth = 1;', 'after' );
}
add_action( 'admin_enqueue_scripts', 'wp_nav_menu_globalMaxDepth' );

/*

  Change megamenu class

*/
add_filter('wpbc/filter/megamenu/class', function($class, $item){
  $class = 'ui-megamenu megamenu';
  return $class;
},10,2); 
/*

  Make dropdown hover default for navbar

  Later use this to manage from admin

*/

add_filter('nav_menu_link_attributes', function($atts, $item, $args, $depth){ 
  //$atts['data-scrollify-target'] = '#main-navbar';
  //$atts['class'] = $atts['class'].' scroll-to ';
  if ( isset( $args->has_children ) && $args->has_children && 0 === $depth && $args->depth > 1 ) {
    $atts['class'] = 'nav-link';
    $atts['data-hover'] = 'dropdown';
    $atts['data-hover-respond'] = 'lg';
  }  
  return $atts;
}, 10, 4); 

/*
	Add items into menus
*/
// add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
function add_admin_link($items, $args){
    if( $args->theme_location == 'primary' ){
        $items .= '<li class="nav-item menu-item">'; 
    		$items .= 'something';
    		$items .= '</li>';
    }
    return $items;
}


/* 
	Disable dropdown markup on BootstrapNavWalker 
*/
// add_filter('nav_menu_use_dropdown',function(){ return false; });


/*

	Custom wp_get_nav_menu_items array

*/

function WPBC_get_menu_array($current_menu) {
		
	$menu = array();
	$locations = get_nav_menu_locations();

 	if( !empty($locations) && isset($locations[$current_menu])){ 
 		$array_menu = wp_get_nav_menu_items($locations[$current_menu]);  
  
    foreach ($array_menu as $m) {
      if (empty($m->menu_item_parent)) {
      	// _print_code($m);
          $menu[$m->ID] = array();
          $menu[$m->ID]['object_id']      =   $m->object_id;
          $menu[$m->ID]['ID']      		=   $m->ID;
          $menu[$m->ID]['title']       =  $m->title;
          $menu[$m->ID]['url']         = $m->url;
          $menu[$m->ID]['children']    =   array();



          if( WPBC_if_has_megamenu($m) ){
          	$type = WPBC_get_megamenu_type($m);
          	if($type == 'template'){
							$megamenu_id = WPBC_get_megamenu_template($m); 
						}
						if($type == 'template-part'){
							$megamenu_id = WPBC_get_megamenu_template_part($m); 
						} 
						$menu[$m->ID]['megamenu-type']    =   $type;
          	$menu[$m->ID]['megamenu']    =   $megamenu_id;
          }
      }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
      if ($m->menu_item_parent) {
          $submenu[$m->ID] = array();
          $submenu[$m->ID]['object_id']      =   $m->object_id;
          $submenu[$m->ID]['ID']       =   $m->ID;
          $submenu[$m->ID]['title']    =   $m->title;
          $submenu[$m->ID]['url']  =   $m->url;
          $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
      }
    }
   }
  return $menu;
     
}