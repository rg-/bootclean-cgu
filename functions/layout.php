<?php

	add_filter('wpbc/filter/layout_blog/installed', '__return_true');

	include('layout/layout-locations.php'); 
	include('layout/layout-styles.php');  
	include('layout/layout-builder.php');  
	include('layout/layout-breadcrumb.php'); 

	add_filter('wpbc/main-page-header/class', function($class){

		if(is_front_page()){
		// 	$class .= 'gmb-1';
		}

		return $class;

	},10,1);