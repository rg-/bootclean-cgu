<?php

/*

	Show helpers on admin fields, that is
	front end function to get the field like:

		WPBC_get_theme_settings('footer_copyright')

*/

add_filter('wpbc/filter/theme_settigs/show_helpers', '__return_true');


/*

	Filter arguments for option settings page 

*/

add_filter('wpbc/filter/theme_settings/args',function($args){
	$args['options_page']['page_title'] = 'CHILD settings';
	$args['options_page']['menu_title'] = 'CHILD settings';
	$args['options_page']['icon_url'] = '';
	return $args;
},11,1);


/*

	Remove tabs and fields from Theme Settings Groups

	Defaults are:

			'fields-general',
			'fields-header',
			'fields-footer',
			'fields-typography',
			'fields-custom-code',

			'fields-layout' NEW

*/ 

add_filter('wpbc/filter/theme_settings/file_path', function($file_path, $key){

	$excluded_groups = array( 
		'fields-layout', 
		//'fields-header',
	);

	if( in_array($key, $excluded_groups) ){
		$file_path = '';
	}

	return $file_path;

},10,2); 

/*
	 
	Don´t use the above "fields-header" subfields for the Navbar Default Template Type Settings
	(Or just use customs, in this case i clan up the array of subfields)
*/
add_filter('wpbc/filter/theme_settings/header_main_navbar_default', function($default_fields){
	$default_fields = array(); 
	return $default_fields;
},10,1);

add_filter('wpbc/filter/theme_settigs/show/header_main_navbar_default', '__return_false');
/* 
	
	Add some field on the previously group

	priority 10 above, 11 behind

*/
add_filter('wpbc/filter/theme_settings/fields/header', function($fields){
	
	return $fields;
}, 11, 1); 

/*
	
	admin styles for custom page settings

*/

add_action('admin_head',function(){ 
	?>
<style>
	#toplevel_page_wpbc-site-settings.current > a.menu-top,
	#toplevel_page_wpbc-site-settings > a {
		background-color: var(--primary)!important;
		color:#fff!important;
	}
	#toplevel_page_wpbc-site-settings.current > a.menu-top div.wp-menu-image:before,
	#toplevel_page_wpbc-site-settings > a div.wp-menu-image:before {
		color:#fff!important;
	}

	#toplevel_page_wpbc-site-settings > a:hover{
		background-color: var(--primary)!important;
		color:#fff!important;
	}
	#toplevel_page_wpbc-site-settings > a:hover div.wp-menu-image:before{
		color:#fff!important;
	}
</style>
<?php
},10);