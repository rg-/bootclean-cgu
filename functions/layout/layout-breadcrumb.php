<?php

	/* 
	
		Breadcrumb

	*/ 

	add_action('wpbc/layout/start', function($out){
		global $post;
		$has_page_hader = false;
		if( !empty($post) && WPBC_if_has_page_header($post->ID) ){
			$has_page_hader = true;
		}
		if( !is_front_page() && !$has_page_hader ) {
			WPBC_get_template_part('layout/breadcrumb'); 
	  }

	},21,1);   