<?php

/*
		ui_section_slider 
*/
		
	add_filter('wpbc/filter/acf/builder/flexible_content/layouts', 'WPBC_build__ui_section_slider',20,1);  
	
	function WPBC_build__ui_section_slider($layouts){ 

		$layout_name = 'ui_section_slider';  

		$layout_label = '<i class="icon-badge" style="background-color:#b45541; "><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path class="path" fill="#fff" d="M7.77 6.76L6.23 5.48.82 12l5.41 6.52 1.54-1.28L3.42 12l4.35-5.24zM7 13h2v-2H7v2zm10-2h-2v2h2v-2zm-6 2h2v-2h-2v2zm6.77-7.52l-1.54 1.28L20.58 12l-4.35 5.24 1.54 1.28L23.18 12l-5.41-6.52z"/></svg></i> #SLIDER'; 

		$content_sub_fields = array();

		$items = array();

			// Fondo

			$sub_fields_image = array();

				$sub_fields_image[] = WPBC_acf_make_image_field(array(
					'label' => __('Imágen','bootclean'),
					'name' => $layout_name.'__background_image',  
				));  

				$sub_fields_image[] = WPBC_acf_make_radio_position_field(array(
					'label' => __('Alineación imágen','bootclean'),
					'name' => $layout_name.'__background_image_position',  
				));  

			$items[] = WPBC_acf_make_group_field(array(
				'label' => __('Fondo','bootclean'),
				'name' => $layout_name.'__background',
				'sub_fields' => $sub_fields_image,
				'width' => '40' 
			));

			// Contenido

			$sub_fields_content = array(); 

				$sub_fields_content[] = WPBC_acf_make_codemirror_field(array(
					'label' => __('HTML','bootclean'),
					'name' => $layout_name.'__content_title', 
				));

				$sub_fields_content[] = WPBC_acf_make_color_picker_field(array(
					'label' => __('Color del texto'),
					'name' => $layout_name.'__content_text-color', 
					'class' => 'wpbc-ui-mini',
					'default_value' => '#fff',
					'width' => '50',
				));

				$sub_fields_content[] = WPBC_acf_make_radio_align_field(array(
					'label' => __('Alineación del texto'),
					'name' => $layout_name.'__content_text-align', 
					'width' => '50',
					'choices' => array (
						'left' => '<i class="mce-ico mce-i-alignleft"></i>',
						'center' => '<i class="mce-ico mce-i-aligncenter"></i>',
						'right' => '<i class="mce-ico mce-i-alignright"></i>',
					),
				));

			$items[] = WPBC_acf_make_group_field(array(
				'label' => __('Contenido','bootclean'),
				'name' => $layout_name.'__content',
				'sub_fields' => $sub_fields_content,
				'width' => '60' 
			));
  		
  		// Acción

			$sub_fields_action = array();

				$sub_fields_action[] = WPBC_acf_make_radio_field(array(
					'label' => __('Acción (btn)','bootclean'),
					'class' => 'wpbc-acf-no-label',
					'name' => $layout_name.'__action_type', 
					'choices' => array (
						'internal' => 'Página/Post interno',
						'external' => 'URL externa',
						'none' => 'No usar',
					),
					'default_value' => 'internal',
				));

				$sub_fields_action[] = WPBC_acf_make_post_object_field(array(
					'label' => __('Post/Página Link','bootclean'),
					'name' => $layout_name.'__action_post', 
					'width' => '70',
					'post_type' => array( 'post','page' ),
					'allow_null' => 1,
					'multiple' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_'.$layout_name.'__action_type',
								'operator' => '==',
								'value' => 'internal',
							),
						), 
					),
				)); 

				$sub_fields_action[] = WPBC_acf_make_url_field(array(
					'label' => __('URL','bootclean'),
					'name' => $layout_name.'__action_url', 
					'width' => '70',
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_'.$layout_name.'__action_type',
								'operator' => '==',
								'value' => 'external',
							),
						), 
					),
				)); 

				$sub_fields_action[] = WPBC_acf_make_true_false_field(array(
					'label' => __('Abre en nueva ventana','bootclean'),
					'name' => $layout_name.'__action_target', 
					'width' => '30',
					'default_value' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_'.$layout_name.'__action_type',
								'operator' => '!=',
								'value' => 'none',
							),
						), 
					),
				)); 

  		$items[] = WPBC_acf_make_group_field(array(
				'label' => __('Acción','bootclean'),
				'name' => $layout_name.'__action',
				'sub_fields' => $sub_fields_action, 
			));  

  	$content_sub_fields[] = WPBC_acf_make_radio_field(array(
			'label' => __('Tipo de slider','bootclean'),
			'name' => $layout_name.'__type',
			'choices' => array (
				'lg' => 'Grande',
				'md' => 'Mediano',
			),
			'default_value' => 'lg',
		)); 

		$content_sub_fields[] = WPBC_acf_make_repeater_field(array(
			'label' => __('Elementos','bootclean'),
			'name' => $layout_name.'__items',
			'sub_fields' => $items,
			'button_label' => 'Agregar elemento', 
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