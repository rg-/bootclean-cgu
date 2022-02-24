<?php


/* ################################################################################## */
/* ################################################################################## */
/**
 * Bootclean child custom functions
 *
 * @package Bootclean
 * @subpackage Child Theme
 * @version 13.0.0 (style.css defined)
 * 
 */
/* ################################################################################## */
	
	/** 
	 * WP Bootclean Addons 
	 * @subpackage "addons-*"
	 */

		include('functions/addons.php'); 

/* ################################################################################## */

	/** 
	 * WP Bootclean Layout actions and filters
	 * @subpackage "layout-*"
	 */

		include('functions/layout.php'); 

/* ################################################################################## */

	/**
	 * WP Bootclean Theme customs
	 * @subpackage "theme-*"
	 */

		include('functions/theme.php');  

/* ################################################################################## */ 
	
	/** 
	 * WP Bootclean Plugins 
	 * @subpackage "plugins-*"
	 */

		include('functions/plugins.php'); 

/* ################################################################################## */ 

	/** 
	 * WP Bootclean Builder layouts 
	 * @subpackage "builder-*"
	 */

		include('functions/builder.php'); 

/* ################################################################################## */ 