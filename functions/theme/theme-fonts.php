<?php

/*
 *
 * Adding custom google fonts 
 *
 *
*/

/* Including custom google fonts */

add_filter('wpbc/filter/typography/google_family', function($styles){  

	$styles['cgu-fonts']['src'] = 'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;1,400;1,500&family=Spartan:wght@200;300;600;800&display=swap';
	return $styles;

},10,1);  

/*

	Add inline head styles

*/

add_filter('WPBC_add_inline_style',function($css){
	$css .= ".font-lora{font-family:'Lora', serif!important;}"; 
	return $css;
},30,1);

/* Dynamic css commons */

add_filter('wpbc/filter/typography/commons', function($commons){

	/* EX: 'Roboto', sans-serif DO NOT PUT ; AT LAST*/

	$commons['font-family-base'] = "'Spartan', sans-serif";
	$commons['font-weight-base'] = '300';

	$commons['display-font-family-base'] = "'Spartan', sans-serif";
	$commons['display-font-weight'] = "200";

	$commons['headings-font-family-base'] = "'Spartan', sans-serif";
	$commons['headings-font-weight'] = "600";


	$commons['p-margin-bottom'] = '30px';
	$commons['display-margin-bottom'] = '30px';
	$commons['headings-margin-bottom'] = '30px';

	return $commons;

},10,1); 


/*

	Dynamic custom tags

*/
add_filter('wpbc/filter/typography', function($tags){

	$tags['.display-1']['font-size'] = "45px"; 
	$tags['.display-1']['responsive'] = array(
			'sm' => array(
				'font-size' => "45px",
			),
			'md' => array(
				'font-size' => "55px", 
			),
			'lg' => array(
				'font-size' => "65px",
			),
			'xl' => array(
				'font-size' => "65px",
			),
		); 

	$tags['.display-2']['font-size'] = "38px"; 
	$tags['.display-2']['responsive'] = array(
			'sm' => array(
				'font-size' => "44px",
			),
			'md' => array(
				'font-size' => "49.5px", 
			),
			'lg' => array(
				'font-size' => "59.5px",
			),
			'xl' => array(
				'font-size' => "59.5px",
			),
		);

	$tags['.display-3']['font-size'] = "30px"; 
	$tags['.display-3']['responsive'] = array(
			'sm' => array(
				'font-size' => "30px",
			),
			'md' => array(
				'font-size' => "34px", 
			),
			'lg' => array(
				'font-size' => "44px",
			),
			'xl' => array(
				'font-size' => "44px",
			),
		); 

	$tags['.display-4']['font-size'] = "28px"; 
	$tags['.display-4']['letter-spacing'] = "10px"; 
	$tags['.display-4']['responsive'] = array(
			'sm' => array(
				'font-size' => "28px",
			),
			'md' => array(
				'font-size' => "30px", 
			),
			'lg' => array(
				'font-size' => "34px",
			),
			'xl' => array(
				'font-size' => "34px",
			),
		); 

	$tags['h1,.h1']['font-size'] = "40.5px";
	$tags['h1,.h1']['line-height'] = "1.2";
	$tags['h1,.h1']['letter-spacing'] = "normal";
	$tags['h1,.h1']['responsive'] = array(
			'sm' => array(
				'font-size' => "40.5px",
			),
			'md' => array(
				'font-size' => "50.5px", 
			),
			'lg' => array(
				'font-size' => "60.5px",
			),
			'xl' => array(
				'font-size' => "60.5px",
			),
		);

	$tags['h5,.h5']['font-size'] = "12.5px";
	$tags['h5,.h5']['line-height'] = "1.5";
	$tags['h5,.h5']['letter-spacing'] = "2px";
	$tags['h5,.h5']['responsive'] = array(
			'sm' => array(
				'font-size' => "16px",
			),
			'md' => array(
				'font-size' => "18px", 
			),
			'lg' => array(
				'font-size' => "19.5px",
			),
			'xl' => array(
				'font-size' => "19.5px",
			),
		);

	$tags['h6,.h6']['font-size'] = "12.5px";
	$tags['h6,.h6']['line-height'] = "1.6";
	$tags['h6,.h6']['letter-spacing'] = "2px";
	$tags['h6,.h6']['responsive'] = array(
			'sm' => array(
				'font-size' => "15px",
			),
			'md' => array(
				'font-size' => "15px", 
			),
			'lg' => array(
				'font-size' => "15px",
			),
			'xl' => array(
				'font-size' => "15px",
			),
		); 

	return $tags;

},10,1); 

/*

	########## ADVANCED START ###########

	Adding custom tinymce style css rules, used on front end too

*/
add_filter('wpbc/filter/typography', function($tags){
	
	for ($i=1; $i < 7; $i++) { 
		$tags['.h'.$i.'-lora']['font-family'] = "'Lora', serif";
		$tags['.h'.$i.'-lora']['font-weight'] = "500";
	} 

	return $tags;

},10,1); 

/*

	Adding custom tinymce style selectors

*/
add_filter('wpbc/filter/tinymce/block_formats', function($block_formats){ 
	for ($i=1; $i < 7; $i++) {
		$block_formats[] = 'Heading Lora '.$i.'=h'.$i.'-lora';
	} 
	return $block_formats;
},10,1); 

/*

	Adding custom tinymce font_formats (when using toolbars like "WPBC_acf_make_wysiwyg_field_format_family_all")

*/
add_filter('wpbc/filter/tinymce/font_formats', function($font_formats){ 
 $font_formats = array(
		'Spartan=Spartan,sans-serif',
		'Lora=Lora,serif',
	);
	return $font_formats;
},10,1); 
/*

	Adding custom tinymce style selectors functionality

*/

add_action('acf/input/admin_footer', 'custom_tinymce_acf_admin_footer');

function custom_tinymce_acf_admin_footer() {
  ?> 
  <script type="text/javascript">
  	(function( $ ){

  		acf.addAction('wysiwyg_tinymce_init', function( ed, id, mceInit, field ){ 

		    for (var i = 1; i < 7; i++) { 
      		 ed.formatter.register( 'h'+i+'-lora', {
            block : 'h'+( (i==1) ? 2 : i )+'', 
            attributes: { class: 'h'+i+' h'+i+'-lora' }
        	});
      	}

		  });
  	})(jQuery);
	</script>
	<?php
}

/* ########## ADVANCED END ########### */
 
// add_filter('wpbc/body/class', 'wpbc_child_body_class__fonts',		0,	1);

function wpbc_child_body_class__fonts($body_class){
	$body_class .= ' using-theme-fonts';
	return $body_class;
}
 
// use child wpbc-icons font

add_filter('wpbc/filter/wpbc_typography/enqueue/icons/uri', function($icons_uri){
	$icons_uri = get_stylesheet_directory_uri().'/fonts/wpbc-icons/wpbc-icons.css';
	return $icons_uri;
},10,1);

/*
 *
 * Embed Font Awesome
 * enable/disble
 *
 */

// add_filter('BC_enqueue_scripts__fonts', 'wpbc_child_enqueue_custom_font_awesome'); 

function wpbc_child_enqueue_custom_font_awesome($fonts){ 
	$fonts['fontawesome-all'] = array( 
		'src'=>'css/fontawesome/all.min.css'
	); 
	return $fonts; 
}