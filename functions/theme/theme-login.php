<?php

// Disable option page for this addon
add_filter('wpbc/filter/custom_login/options_page/enable','__return_false',10,1);

// Enable adddon
add_filter('wpbc/filter/custom_login/enable','__return_true',10,1);

// Set arguments by default
add_filter('wpbc/filter/custom_login/default_args', function($args){
	/* arguments for login page */

	$brand_image =  get_stylesheet_directory_uri() . '/images/theme/logo-cgu-light-alt.svg';

	$args['login_brand'] = array(
		'background-image' => $brand_image,
		'background-size' => '320px auto',
		'width' => '320px',
		'height' => '109px',
	);
	
	return $args;

},10,1); 

add_action('login_head', function(){
	?>
<style type="text/css">
	body{ 
		/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#0e3c4f+0,ffffff+100 */
		background: #0e3c4f; /* Old browsers */
		background: -moz-linear-gradient(top,  #0e3c4f 0%, #ffffff 100%); /* FF3.6-15 */
		background: -webkit-linear-gradient(top,  #0e3c4f 0%,#ffffff 100%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(to bottom,  #0e3c4f 0%,#ffffff 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0e3c4f', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */

	}
	a{

	}
</style>
	<?php
});