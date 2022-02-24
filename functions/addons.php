<?php

/**
 * @subpackage Enable "flex_builder" new builder layout
 */

	add_filter('wpbc/filter/flex_builder/installed', '__return_true');
		
		/* Customs for theme settings here */
		
		//include('addons/addon-flex_builder.php');


  include('addons/addon-flex_builder__typography.php'); 

/* ################################################################################## */

/**
 * @subpackage Enable "theme_settings" options pages
 */

	add_filter('wpbc/filter/theme_settings/installed', '__return_true');
		
		/* Customs for theme settings here */
		
		include('addons/addon-theme_settings.php');

/* ################################################################################## */

/**
 * @subpackage Template Landing
 */
	/* Disable template landing builder */
	add_filter('wpbc/filter/template-landing/installed', '__return_false');

	// include('addons/addon-template-landing.php');

/* ################################################################################## */

/**
 * @subpackage Enable "is_inview" Addon JS/CSS
 */
	 
	add_filter('wpbc/filter/is_inview/installed', '__return_true',0,1);
	add_filter('wpbc/filter/is_inview/init', '__return_true',0,1);

/* ################################################################################## */

/**
 * @subpackage Enable "imagesloaded" Addon JS
 */ 
	 
	add_filter('wpbc/filter/imagesloaded/installed', '__return_true',0,1); 

/* ################################################################################## */

/**
 * @subpackage Enable "swup" addon
 */

	// add_filter('wpbc/filter/swup/installed', '__return_true');
	// include('addons/addon-swup.php');

/* ################################################################################## */

/**
 * @subpackage Enable "private_areas" addon
 */

	// add_filter('wpbc/filter/private_areas/installed', '__return_true');
	// include('addons/addon-private_areas.php');

/* ################################################################################## */

/**
 * @subpackage Enable "tokko" addon Tokko Broker PHP API 
 */

	// add_filter('wpbc/filter/tokko/installed', '__return_true');  

/* ################################################################################## */

/**
 * @subpackage Enable "bc_duplicate_post" For wpbc_template post type 
 */

	add_filter('bc_duplicate_post__post_types' ,function($post_types){
		$post_types[] = 'wpbc_template'; 
		return $post_types; 
	},10,1);

/* ################################################################################## */