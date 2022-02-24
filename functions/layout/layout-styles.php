<?php

/*

	Filter here classes used for example.


	WPBC_layout__container_class()

*/

add_filter('wpbc/filter/layout/start/defaults', function($args){  
	
	/*
	$args['main_content']['class'] = 'bg-success gpy-2';
	$args['main_content']['wrap']['class'] = 'bg-info gpy-1';
	*/
	return $args;

}); 

add_filter('wpbc/filter/layout/main_container/args', function($value, $layout, $id){
	

	if( $id == 'main-container-areas' ){
		//_print_code($key);
		//_print_code($id);
		// $value['container_type'] = 'none';
		//_print_code($value);
	}

	return $value;

},10,3);

/*

	Filter to change any builder class (not recomended, see other filters behind)

*/

// add_filter('wpbc/filter/layout/main_container/class', 'child_main_container_clases',10,4);

function child_main_container_clases($class, $layout, $id, $area_name){

	if( $layout == 'a1' ){
		$class .= '';
	}
	if( $layout == 'a2-ml' ){
		//$class .= ' bg-dark';
	}
	if( $area_name == 'area-main' ){
		//$class .= ' bg-success';
	}
	if( $area_name == 'area-1' ){
		//$class .= ' bg-danger';
	}
	if( $area_name == 'area-2' ){
		//$class .= ' bg-info';
	}

	if( $layout == 'a2-ml' || $layout == 'a2-mr' ){
		if( $area_name == 'area-main' ){
			$class = 'col-md-9';
		}
		if( $area_name == 'area-1' ){
			$class = 'col-md-3';
		}
	}

	if( $layout == 'a3-ml' || $layout == 'a3-mr' ){
		if( $area_name == 'area-main' ){
			$class = 'col-md-8';
		}
		if( $area_name == 'area-1' ){
			$class = 'col-md-2';
		}
		if( $area_name == 'area-2' ){
			$class = 'col-md-2';
		}
	} 

	return $class;

}

/*
	
	class & attrs by layout ID like 
	main-continer-areas

*/

add_filter('wpbc/filter/layout/class/?id=main-container-areas', function($class, $structure_id, $key){

	// $class .= ' gpy-2 ';

	return $class;
	
},10,3);

add_filter('wpbc/filter/layout/attrs/?id=main-container-areas', function($attrs, $structure_id, $key){

	return $attrs;

},10,3);

/*
	
	class & attrs by area-name like 
	main-continer-areas

*/

add_filter('wpbc/filter/layout/class/?area-name=area-main', function($class, $structure_id, $key){
	if( $structure_id == 'a2-ml' || $structure_id == 'a2-mr' ){
		$class = ' col-md-9 ';
	} 
	if( $structure_id == 'a3-ml' || $structure_id == 'a3-mr' ){
		$class = ' col-md-8 ';
	} 
	return $class; 
},10,3);

add_filter('wpbc/filter/layout/class/?area-name=area-1', function($class, $structure_id, $key){
	if( $structure_id == 'a2-ml' || $structure_id == 'a2-mr' ){
		$class = ' col-md-3 ';
	} 
	if( $structure_id == 'a3-ml' || $structure_id == 'a3-mr' ){
		$class = ' col-md-2 ';
	}  
	return $class; 
},10,3);

add_filter('wpbc/filter/layout/class/?area-name=area-2', function($class, $structure_id, $key){
	if( $structure_id == 'a3-ml' || $structure_id == 'a3-mr' ){
		$class = ' col-md-2 ';
	}  
	return $class; 
},10,3);

/* 
	
	Debug thigs using this:

*/
add_action('wpbc/layout/start', function($out){

	/* List all layout locations used (filtered as code above) */
	/**/
	$WPBC_layout__container_class = WPBC_layout__container_class();
	//_print_code($WPBC_layout__container_class);
	
	$template = WPBC_get_template();
	$layout = WPBC_get_layout_structure_build_layout();
	$WPBC_get_layout_main_content_classes = WPBC_get_layout_main_content_classes('all');
	// _print_code($WPBC_layout__container_class);

	$layout_defaults = WPBC_layout_struture__defaults();
	$args = WPBC_filter_layout_structure_build($layout_defaults, 'main_container');
	

},10,1);




add_filter('WPBC_post_header_title_class', function($title_class){ 
	/*
	default
	$title_class = 'entry-title';
	*/
	// $title_class .= ' gmb-2';
	return $title_class;  
}, 20, 1 ); 