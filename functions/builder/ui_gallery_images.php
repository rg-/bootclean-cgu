<?php 

/*
		ui_gallery_images 
*/
		
	add_filter('wpbc/filter/acf/builder/flexible_content/layouts', 'WPBC_build__ui_gallery_images',20,1);  
	
	function WPBC_build__ui_gallery_images($layouts){ 

		$layout_name = 'ui_gallery_images'; 

		$layout_label = '<i class="icon-badge"><span style="background-color:#b45541; "></span></i> Galería imágenes'; 

		$content_sub_fields = array(); 

			// Contenido  
			$content_sub_fields = CGU_make_repeater_content_fields($content_sub_fields, $layout_name, __('Contenido/Encabezado','bootclean'));

			// Galeria
			$content_sub_fields[] = WPBC_acf_make_tab_field( array(
				'key' => 'field_'.$layout_name.'__tab_media_gallery',
				'label' => 'Imágenes',
			));
			$content_sub_fields[] = WPBC_acf_make_gallery_field(array(
				'label' => __('Imágenes','bootclean'),
				'name' => $layout_name.'__media_gallery', 
				'class' => 'acf-small-gallery wpbc-acf-no-label',  
			));	
			$content_sub_fields[] = WPBC_acf_make_message_field( array(
				'class' => 'wpbc-acf-no-label',
				'key' => 'field_'.$layout_name.'__message_media_gallery',
				'message' => 'Utilizar <b>TÍTULO</b> y <b>DESCRIPCIÓN</b>, al subir o editar cada imágen.',
			)); 
			
			// Estilos
			$content_sub_fields = CGU_make_styles_fields($content_sub_fields, $layout_name);

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