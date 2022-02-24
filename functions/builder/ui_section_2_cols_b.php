<?php

/*
		ui_section_2_cols_b 
*/
		
	add_filter('wpbc/filter/acf/builder/flexible_content/layouts', 'WPBC_build__ui_section_2_cols_b',20,1);  
	
	function WPBC_build__ui_section_2_cols_b($layouts){ 

		$layout_name = 'ui_section_2_cols_b'; 

		$layout_label = '<i class="icon-badge"><span style="background-color:#b45541; "></span></i> 2 Cols B'; 

		$content_sub_fields = array();

		$items = array();
  
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

		// Contenido

		$sub_fields_content = array();  

			$sub_fields_repeater_content = array();

				$sub_fields_repeater_content[] = WPBC_acf_make_wysiwyg_field_format_family_all(array(
					'label' => __('Contenido','bootclean'),
					'name' => $layout_name.'__repeater_content_html', 
					'delay' => 1,
				));

			$content_sub_fields[] = WPBC_acf_make_repeater_field(array(
				'label' => __('Filas de contenido','bootclean'),
				'name' => $layout_name.'__repeater_content',  
				'sub_fields' => $sub_fields_repeater_content,
			));  		

		// Media
		$content_sub_fields[] = WPBC_acf_make_gallery_field(array(
				'label' => __('Imágen/Galería 1','bootclean'),
				'name' => $layout_name.'__media_gallery', 
				'class' => 'acf-small-gallery', // 
				'width' => '50',
			));	
		$content_sub_fields[] = WPBC_acf_make_gallery_field(array(
				'label' => __('Imágen/Galería 2','bootclean'),
				'name' => $layout_name.'__media_gallery_2', 
				'class' => 'acf-small-gallery', // 
				'width' => '50',
			));	

		$layouts = WPBC_acf_make_flex_builder_layout(array(
			'layout_name' => $layout_name,
			'layout_label' => $layout_label,
			'content_sub_fields' => $content_sub_fields,
			//'show_section_title' => false, 
			'show_section_settings' => false,
			'show_section_styles' => false,
			'section_settings_defaults' => array( 

				/**/
				'classes' => array(
					'default' => false,
				),

				/*
				'classes' => array(
					'default' => true,
					'container_class' => 'container',
					'row_class' => 'row',
					'column_class' => 'col-12',
				),
				*/
				// 'classes' => array(),
			),
		), $layouts); 

		return $layouts;  
	}