<?php

/*

	Add inline head styles

*/

add_filter('WPBC_add_inline_style',function($css){
	/* On old days i use to put this on the project css file, but that will not work till the css is loaded. To prevent similar situations, just put inline styles on the most top of the <head> element, like this one here. */
	$css .= 'body.loading{overflow:hidden!important;}'; 
	$css .= '.no-touchevents ::-webkit-scrollbar { width: 10px; height: 10px; }';
	return $css;
},20,1);

/*

	Add custom js scripts on footer

*/

add_filter('WPBC_enqueue_scripts__footer_scripts', function($scripts){ 

	$scripts['custom'] = array(
		'src'=> CHILD_THEME_URI .'/js/custom.js',
		'dependence' => array('jquery')
	);

	return $scripts;
},10,1);





function WPBC_preload_style_loader_tag($html, $handle, $href, $media){
	if (is_admin()){
		return $html;
	}

	$handles = array(
		'google-font-0',
		// 'wpbc_typography',
		'wpbc-is-inview-css',
		'wp-block-library',
		'fontawesome-all-font',
		'contact-form-7',
		'qts_front_styles',
		'ekko-lightbox',
		'iconmoon',
		'bootclean-admin',
	);

	if( in_array($handle, $handles) ){
		$html = "<link rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\" 
		id='".$handle."' href='".$href."' type='text/css' media='all' />";
	} 

	return $html;
}
add_filter('style_loader_tag', 'WPBC_preload_style_loader_tag', 10, 4 );