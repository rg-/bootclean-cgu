<div class="container gpy-4">

	<h2 class="display-1">CGU Shortcodes</h2>

	<div class="row">
		
		<div class="col-12">
			<?php
			$shortcodes = array(
				
				array(
					'key' => 'title_display_3',
					'string' => '[title_display_3 tag="EN EL CORAZÓN DE MONTEVIDEO"]UN ESTILO <br> DE VIDA[/title_display_3]', 
					'params' => array(
						'[contenido]' => 'Texto del título principal',
						'tag' => 'Texto secundario'
					)
				),

				array(
					'key' => 'title_display_4',
					'string' => '[title_display_4 tag="EN EL CORAZÓN DE MONTEVIDEO"]UN ESTILO <br> DE VIDA[/title_display_4]', 
					'params' => array(
						'[contenido]' => 'Texto del título principal',
						'tag' => 'Texto secundario'
					)
				),

				array(
					'key' => 'btn_rounded',
					'string' => '[btn_rounded href="#ejemplo" label="VER MÁS"]',
					'results' => '[btn_rounded href="#ejemplo" label="VER MÁS"] [btn_rounded href="#ejemplo" color="danger" label="VER MÁS"] [btn_rounded href="#ejemplo" color="success" label="VER MÁS"] [btn_rounded href="#ejemplo" color="primary" label="VER MÁS"]',
					'params' => array(
						'href' => 'Url/Link',
						'label' => 'Etiqueta del botón',
						'color' => 'Estilo del botón, primary, secondary (def), danger, white, etc'
					)
				),

				array(
					'key' => 'btn_rounded_big',
					'string' => '[btn_rounded_big href="#ejemplo" label="VER MÁS"]',
					'results' => '[btn_rounded_big href="#ejemplo" label="VER MÁS"] [btn_rounded_big href="#ejemplo" color="danger" label="VER MÁS"] [btn_rounded_big href="#ejemplo" color="success" label="VER MÁS"] [btn_rounded_big href="#ejemplo" color="primary" label="VER MÁS"]',
					'params' => array(
						'href' => 'Url/Link',
						'label' => 'Etiqueta del botón',
						'color' => 'Estilo del botón, primary, secondary (def), danger, white, etc'
					)
				),

				array(
					'key' => 'btn_line',
					'string' => '[btn_line href="#ejemplo" label="VER MÁS"]',
					'results' => '[btn_line href="#ejemplo" color="danger" label="VER MÁS"] [btn_line href="#ejemplo" color="success" label="VER MÁS"] [btn_line href="#ejemplo" color="primary" label="VER MÁS"]',
					'params' => array(
						'href' => 'Url/Link',
						'label' => 'Etiqueta del botón',
						'color' => 'Estilo del botón, primary, secondary (def), danger, white, etc'
					)
				),

			);

			foreach ($shortcodes as $key => $value) {
				# code...
				$string_esc = str_replace('[', '&lsqb;', $value['string']);
				$string_esc = str_replace(']', '&rsqb;', $string_esc);
				?>
				<div class="card gp-2 gmb-2">
					<p class="h4 text-danger"><?php echo $value['key']; ?></p>
					

					<div class="card gp-2 position-relative gmb-1">
						<span class="badge badge-primary position-absolute top-0 left-0">RESULTADO</span>
						<div>
							<?php 

							if(!empty($value['results'])){
								echo $value['results'];
							}else{
								echo $value['string'];
							}

							?>
						</div>
					</div>

					<p class="position-relative">
						<span class="badge badge-primary position-absolute top-0 left-0">SHORTCODE</span>
						<textarea readonly class=" gp-2 form-control form-control-lg text-black"><?php echo $string_esc; ?></textarea>
					</p>
					<div class="gpb-1">
						<span class="badge badge-primary">PARAMETROS</span><br><br>
						<?php if(!empty($value['params'])){ ?>
							<?php foreach ($value['params'] as $k => $v) {
								echo '<b class="text-danger">'.$k.':</b> '.$v.' <br>';
							} ?>
						<?php } ?>
					</div>

				</div>
				<?php
			}
			?>
			

		</div>

	</div>

</div>