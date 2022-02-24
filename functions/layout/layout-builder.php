<?php
	
/*

	Filtering many front-end things

	Use _print_code($args);

	to see full arguments on each component/layout


*/

	/*
		
		Filtering the lazyloader effect for images

		Choices are, empty value, backdrop-blur, or lazyload-blured default one

	*/

	add_filter('wpbc/filter/WPBC_build_lazyloader_image/effect', function(){

		$effect_class = 'backdrop-blur';
		return $effect_class;
		
	},10,1);

	 

	/*

		Filter ui_layout_commons component parts

	*/

	add_filter('wpbc/filter/ui_layout_commons/section-title/args', function($args){
 

		$args['section-title-settings']['heading'] .= ' gpy-1';

		return $args;

	}, 10,1);

	/*

		Filter ui_layout_posts_advanced component

	*/

	add_filter('wpbc/filter/ui_layout_posts_advanced/pagination_args', function($pagination_args){

		$pagination_args['ul_class'] = 'pagination pagination-secondary justify-content-center';

		return $pagination_args;

	},10,1);


	add_filter('wpbc/filter/ui_layout_posts_advanced-item/style_args', function($style_args){
		
		$style_args['btn_more_class'] = 'btn btn-primary';
		$style_args['btn_more_label'] = 'Leer más';

		return $style_args;

	},20,1);
	
	/*
	
		Filter ui_layout_full_content_fit component

	*/

	add_filter('wpbc/filter/ui_layout_full_content_fit/col/args', function($col, $breakpoint, $col_type, $col_side, $layout_id){ 

		if( $col_side == 'left' ){
			$col['content']['content_class'] = 'gpy-2 gpy'.$breakpoint.'-3 gpr-'.$breakpoint.'-3 pl-'.$breakpoint.'-0';
		}
		if( $col_side == 'right' ){
			$col['content']['content_class'] = 'gpy-2 gpy'.$breakpoint.'-3 gpl-'.$breakpoint.'-3 pr-'.$breakpoint.'-0';
		}
		return $col;

	},10, 5);

	/*
	
		Filter ui_layout_full_row_fit component

	*/

	add_filter('wpbc/filter/ui_layout_full_row_fit/args', function($full_row_fit){
		
		$full_row_fit['content']['headline_title_class'] .= ' gpb-2';

		if( $full_row_fit['type'] == 'title-up' ){ 
			$full_row_fit['content']['headline_title_class'] .= ' gpt-2 gpt-'.$full_row_fit['breakpoint'].'-0'; 
		}

		if( $full_row_fit['content_side'] == 'left' ){
			$full_row_fit['content']['class'] .= ' gpy-2 gp-'.$full_row_fit['breakpoint'].'-3 pl-'.$full_row_fit['breakpoint'].'-0';
		}else{
			$full_row_fit['content']['class'] .= ' gpy-2 gp-'.$full_row_fit['breakpoint'].'-3 pr-'.$full_row_fit['breakpoint'].'-0';
		}

		return $full_row_fit;
	},10,1);