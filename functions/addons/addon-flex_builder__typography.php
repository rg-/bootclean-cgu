<?php

/*
 *
 * addon-flex_builder__typography
 *
*/ 

/* Including custom google fonts */

add_filter('wpbc/filter/typography/google_family', function($styles){  

	$styles['Roboto']['src'] = 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&family=Roboto:wght@300&display=swap';
	return $styles;

},10,1); 


/* Including custom fonts 

add_filter('wpbc/filter/typography/font_family', function($styles){

	$styles['CooperBlackStd']['src'] = get_stylesheet_directory_uri() . '/fonts/theme/CooperBlackStd.css';
	return $styles;

},10,1); 

*/

/* Dynamic css commons */

add_filter('wpbc/filter/typography/commons', function($commons){

	/* EX: 'Roboto', sans-serif DO NOT PUT ; AT LAST*/

	$commons['font-family-base'] = "'Roboto', sans-serif";
	$commons['font-weight-base'] = '300';

	$commons['display-font-family-base'] = "'Roboto Slab', serif";
	$commons['display-font-weight'] = "400";

	$commons['headings-font-family-base'] = "'Roboto Slab', serif";
	$commons['headings-font-weight'] = "700";

	return $commons;

},10,1); 


/* Dynamic css rest */

add_filter('wpbc/filter/typography', function($typography){

	// $typography['body']['font-family'] = "Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif"; 

	$arr_headlines = array(
		'.h1','.h2','.h3','.h4','.h5','.h6','h1','h2','h3','h4','h5','h6','.display-1','.display-2','.display-3','.display-4'
	);
	foreach ($arr_headlines as $key) {
		//$typography[$key]['font-style'] = 'italic';
		//$typography[$key]['letter-spacing'] = '-1px';
	}
	

	return $typography;

},10,1); 


/* Custom css inline */

add_action('wp_head', function(){

	?>
<style id="child-custom-typograpy">
	


</style>
	<?php

},0); 