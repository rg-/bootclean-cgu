<?php 

/* 
	
	Set defaults locations by "template"
		Here you can change the "layout" and "container_type" used for each template.

	New ones not created, can be added, for example for a custom post type.

	This will run if no Theme Settings or custom used.

*/

add_filter('wpbc/filter/layout/locations', function($locations){ 

		$locations['defaults']['id'] = 'a2-ml';
			$locations['defaults']['container_type'] = 'fixed';

		$locations['_template_builder']['id'] = 'a1'; 
			$locations['_template_builder']['container_type'] = 'none';
		
		$locations['home']['id'] = 'a1'; 
		$locations['page']['id'] = 'a1'; 

		/* For "Blog" */  
		$locations['post']['id'] = 'a2-ml';
		$locations['single']['id'] = 'a2-ml';
		$locations['blog']['id'] = 'a2-ml';
		$locations['home-blog']['id'] = 'a2-ml';
		$locations['archive']['id'] = 'a2-ml'; 
		$locations['category']['id'] = 'a2-ml'; 
		$locations['tag']['id'] = 'a2-ml'; 
		$locations['tax']['id'] = 'a2-ml';  

		$locations['404']['id'] = 'a1'; 
		$locations['search']['id'] = 'a1';  

	return $locations;  

}, 20, 1 ); 


/*  
	Can also run this one, later 
*/
add_filter('wpbc/filter/layout/location', function($layout, $template, $using_theme_settings, $using_page_settings){ 
	/* Example to change layout only for category, even if customized from defaults */
	if($template == 'category'){
		//$layout = 'a2-mr';
	}
	return $layout;
},10,4);
/* 
	And same thing for the container type
*/
add_filter('wpbc/filter/layout/container_type', function($container_type, $template, $using_theme_settings, $using_page_settings){
	if($template == 'category'){
		//$container_type = 'fixed-left';
	}
	return $container_type;
},10,4);


/* 
	
	Debug thigs using this:

*/
add_action('wpbc/layout/start', function($out){

	/* List all layout locations used (filtered as code above) */
	/**/
	$WPBC_get_layout_locations = WPBC_get_layout_locations();
	foreach ($WPBC_get_layout_locations as $key => $value) {
		// echo 'layout: '.$key.' id: '.$value['id'].' container_type: '.$value['args']['container_type'].'<br>';
	}
	

	/* List all layout locations used (filtered as code above) */
	/**/
	$WPBC_layout__container_class = WPBC_layout__container_class();
	//_print_code($WPBC_layout__container_class);
	
	$template = WPBC_get_template();
	$layout = WPBC_get_layout_structure_build_layout();
	$WPBC_get_layout_main_content_classes = WPBC_get_layout_main_content_classes('all');
	
	
	
	$layout_defaults = WPBC_layout_struture__defaults();
	$args = WPBC_filter_layout_structure_build($layout_defaults, 'main_container');
	
	$WPBC_get_main_container_max_content_areas = WPBC_get_main_container_max_content_areas();
  
	// WPBC_get_layout_structure_build_layout();
  //_print_code( WPBC_get_layout_structure_main_container($layout) );

	$template = WPBC_get_template(); 
	$layout_settings = WPBC_get_theme_settings('layout__'.$template);
	//_print_code($layout_settings);
 
},10,1);