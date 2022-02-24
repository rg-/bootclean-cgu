<?php 
	
	/*

		Using dynamic parameters

	*/

	$dynamic_params = WPBC_get_dynamic_params();
	$example_param = WPBC_get_dynamic_param('example-param'); 
	$example_param_2 = WPBC_get_dynamic_param('example-param-2'); 
	$example_image = WPBC_get_dynamic_param('example-image'); 
	$example_gallery = WPBC_get_dynamic_param('example-gallery');
	$example_template = WPBC_get_dynamic_param('example-template');
?>

<h2>Example template</h2>
<p>This is a php template on your child theme´s template-parts/theme folder.</p>


<?php

	if(!empty($example_param)){
		?>
		<p><?php echo $example_param; ?></p>
		<?php
	}

	if(!empty($example_param_2)){
		?>
		<p><?php echo $example_param_2; ?></p>
		<?php
	}

	if(!empty($example_image)){
		$image_hi_data = wp_get_attachment_image_src( $example_image, "full" );
		$image_low_data = wp_get_attachment_image_src( $example_image, "thumbnail" ); 
		$img_hi = $image_hi_data[0];
		$img_low = $image_low_data[0];
		?>
		<img src="<?php echo $img_hi; ?>" alt=" "/>
		<?php
	}

	if(!empty($example_gallery)){
		foreach ($example_gallery as $key => $value) {
			$image_hi_data = wp_get_attachment_image_src( $value, "full" );
			$image_low_data = wp_get_attachment_image_src( $value, "thumbnail" ); 
			$img_hi = $image_hi_data[0];
			$img_low = $image_low_data[0];
			?>
			<img src="<?php echo $img_hi; ?>" alt=" "/>
			<?php
		}
	}

	if(!empty($example_template)){
		?>
		<div class="row">
			<div class="col-md-4">
				<p>Template here >></p>
			</div>
			<div class="col-md-8">
				<?php
				$do_shortcode = do_shortcode('[WPBC_get_template id="'.$example_template.'"/]'); 
				echo $do_shortcode;  
				?>
			</div>
		</div>
		
		<?php 

	}

?>