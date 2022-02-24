<?php

/*
		ui_section_3_cols_compound 
*/
		
	add_filter('wpbc/filter/acf/builder/flexible_content/layouts', 'WPBC_build__ui_section_3_cols_compound',20,1);  
	
	function WPBC_build__ui_section_3_cols_compound($layouts){ 

		$layout_name = 'ui_section_3_cols_compound'; 

		$layout_label = '<i class="icon-badge"><span style="background-color:#b45541; "></span></i> 3 Cols A'; 

		$content_sub_fields = array();

		$items = array();
  
		$content_sub_fields[] = WPBC_acf_make_radio_field( array(
				'name' => $layout_name.'__style_background',
				'label'=>  _x('Color de fondo','bootclean'),
				'choices' => WPBC_get_acf_root_colors_choices($layout_name.'__style_background'),
				'default_value' => 'none',
				'width' => '33%',
				'class' => 'wpbc-radio-as-btn no-padding-radio-label'
			) );
		$content_sub_fields[] = WPBC_acf_make_radio_field( array(
				'name' => $layout_name.'__style_background_2',
				'label'=>  _x('Color de fondo 2','bootclean'),
				'choices' => WPBC_get_acf_root_colors_choices($layout_name.'__style_background_2'),
				'default_value' => 'lighter',
				'width' => '33%',
				'class' => 'wpbc-radio-as-btn no-padding-radio-label'
			) );
		$content_sub_fields[] = WPBC_acf_make_radio_field( array(
				'name' => $layout_name.'__style_color',
				'label'=>  _x('Color de texto','bootclean'),
				'choices' => WPBC_get_acf_root_colors_choices($layout_name.'__style_color'),
				'default_value' => 'body-color',
				'width' => '33%',
				'class' => 'wpbc-radio-as-btn no-padding-radio-label'
			) );

		// Encabezado

		$content_sub_fields[] = WPBC_acf_make_wysiwyg_field_format_family_all(array(
				'label' => __('Encabezado','bootclean'),
				'name' => $layout_name.'__header_html', 
				'delay' => 0,
			));

		// Contenido

		$sub_fields_content = array();  

			$sub_fields_repeater_content = array();

				$sub_fields_repeater_content[] = WPBC_acf_make_wysiwyg_field_format_family_all(array(
					'label' => __('Contenido','bootclean'),
					'name' => $layout_name.'__repeater_content_html', 
					'delay' => 0,
				));

			$content_sub_fields[] = WPBC_acf_make_repeater_field(array(
				'label' => __('Filas de contenido','bootclean'),
				'name' => $layout_name.'__repeater_content',  
				'sub_fields' => $sub_fields_repeater_content,
			));

		$sub_fields_media = array();
			// media group fields
			$sub_fields_media[] = WPBC_acf_make_gallery_field(array(
				'label' => __('Principal','bootclean'),
				'name' => $layout_name.'__media_gallery', 
				'class' => 'acf-small-gallery',
				'width' => '33',
			));
			$sub_fields_media[] = WPBC_acf_make_gallery_field(array(
				'label' => __('Solapada','bootclean'),
				'name' => $layout_name.'__media_gallery_overlaped', 
				'class' => 'acf-small-gallery',
				'width' => '33',
			)); 
			$sub_fields_media[] = WPBC_acf_make_gallery_field(array(
				'label' => __('Secundaria','bootclean'),
				'name' => $layout_name.'__media_gallery_secondary', 
				'class' => 'acf-small-gallery',
				'width' => '33',
			)); 
		$content_sub_fields[] = WPBC_acf_make_group_field(array(
				'label' => __('Imágenes/Galerías','bootclean'),
				'name' => $layout_name.'__media',  
				'sub_fields' => $sub_fields_media,
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