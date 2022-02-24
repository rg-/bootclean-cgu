<?php 

/*

	Custom theme Builder layouts

*/


include ('builder/ui_section_default.php'); 

include ('builder/ui_section_2_cols_imgs_overlaped.php'); 
include ('builder/ui_section_2_cols.php'); 
include ('builder/ui_section_2_cols_b.php'); 
include ('builder/ui_section_3_cols_compound.php'); 


include ('builder/ui_section_slider.php');  
include ('builder/ui_banner_default.php'); 

include ('builder/ui_gallery_posts.php'); 
include ('builder/ui_gallery_images.php'); 


/*

	Remove layouts not used

	Prepend "layout_" to the layout name

	If removed on live site... well, take care

*/

add_filter('wpbc/filter/acf/builder/flexible_content/layouts', function($layouts){

	unset($layouts['layout_ui_bs_accordion']);
	unset($layouts['layout_ui_bs_card']);
	unset($layouts['layout_ui_bs_jumbotron']);
	
	unset($layouts['layout_ui_layout_page_advanced']);
	unset($layouts['layout_ui_layout_posts_advanced']);
	unset($layouts['layout_ui_layout_taxonomy_advanced']);

	unset($layouts['layout_ui_layout_call_to_action']);
	unset($layouts['layout_ui_layout_full_cols']);
	unset($layouts['layout_ui_layout_full_content_fit']);
	unset($layouts['layout_ui_layout_full_row_fit']);
	unset($layouts['layout_ui_layout_columns']);
	unset($layouts['layout_ui_layout_slick']);
	unset($layouts['layout_ui_layout_section_base']);
	unset($layouts['layout_ui_layout_section_title']); 
	// unset($layouts['layout_ui_layout_widgets']); 

	return $layouts;

},999,1);

// Custom some admin things since i remove lot of layouts

add_action('admin_footer', function(){

?>
<style type="text/css">
	.acf-tooltip ul{
		padding: 10px 20px;
	}
	.acf-tooltip ul li a{
		display: flex;
		align-items: center;
		flex-direction: column;
		width: 80px;
	}
	.acf-tooltip [data-layout] .icon-badge{
		  width: 37px;
		  height: 37px;
    	display: block;
    	margin-bottom: 10px;
	}
	.acf-tooltip [data-layout] .icon-badge > span{
		width: 37px;
		height: 37px;
	}
</style>
<?php

},99);

/*

	Add info msgs for each custom template-part/theme/*.php file to use

*/

// add_filter('wpbc/filters/ui_layout_template_part/dynamic_params', 'theme_custom_dynamic_params',10,1 );

function theme_custom_dynamic_params($params){

	$params = array(
 
		'section-2-cols-imgs-ovelaped' => array( 
			'params' => array(
				array(
					'key' => 'icono',
					'type' => 'text',
					'desc' => 'Something here to describe the value to use.'
				),
				array(
					'key' => 'titulo',
					'type' => 'html'
				),
				array(
					'key' => 'texto',
					'type' => 'html'
				),
			) 
		),

	);

	return $params;

}

function CGU_make_repeater_content_fields($content_sub_fields, $layout_name, $label){

	$sub_fields_repeater_content = array();

		$sub_fields_repeater_content[] = WPBC_acf_make_wysiwyg_field_format_family_all(array(
			'label' => __('Contenido','bootclean'),
			'name' => $layout_name.'__repeater_content_html', 
			'class' => 'acf-small-wysiwyg wpbc-acf-no-label',
			'delay' => 0,
		));

	$content_sub_fields[] = WPBC_acf_make_repeater_field(array(
		'label' => $label,
		'name' => $layout_name.'__repeater_content',  
		'sub_fields' => $sub_fields_repeater_content, 
	));

	return $content_sub_fields;

}

function CGU_make_styles_fields($content_sub_fields, $layout_name){
	$content_sub_fields[] = WPBC_acf_make_tab_field( array(
		'key' => 'field_'.$layout_name.'__tab_style',
		'label' => 'Estilo sección',
	));
	
	$content_sub_fields[] = WPBC_acf_make_radio_field( array(
			'name' => $layout_name.'__style_background',
			'label'=>  _x('Color de fondo','bootclean'),
			'choices' => WPBC_get_acf_root_colors_choices($layout_name.'__style_background'),
			'default_value' => 'none',
			'width' => '50%',
			'class' => 'wpbc-radio-as-btn no-padding-radio-label'
		) );
	$content_sub_fields[] = WPBC_acf_make_radio_field( array(
			'name' => $layout_name.'__style_color',
			'label'=>  _x('Color de texto','bootclean'),
			'choices' => WPBC_get_acf_root_colors_choices($layout_name.'__style_color'),
			'default_value' => 'body-color',
			'width' => '50%',
			'class' => 'wpbc-radio-as-btn no-padding-radio-label'
		) );	
	return $content_sub_fields;
}