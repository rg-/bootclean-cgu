<?php WPBC_flex_layout_start(); ?>
<?php

$row = get_row();

$section_settings = WPBC_get_flex_layout($row); 
 
$style_background = WPBC_get_flex_layout_field('style_background'); 
$style_color = WPBC_get_flex_layout_field('style_color'); 

$repeater_content = WPBC_get_flex_layout_field('repeater_content'); 

?>

<div class="gpy-lg-2 bg-<?php echo $style_background; ?> text-<?php echo $style_color; ?>" data-is-inview="transition">

	<div class="container gpt-3 gpb-2">
 		 
		<div class="row">

			<div class="col-lg-6 gpb-2 mx-auto text-center" data-is-inview="transition">

				<?php
				if(!empty($repeater_content)){
					foreach ($repeater_content as $key => $value) {
						$html = $value['repeater_content_html'];
						$delay = (($key) * .26) + .3; 
						?>
						<div <?php echo theme_inview_tag(array('delay'=> $delay.'s')); ?>>
							<div class="font-size-15">
								<?php echo apply_filters('the_content', $html); ?>
							</div>
						</div>
						<?php
					}
				}
				?>

			</div>

		</div>

		<div class="position-relative">
			<?php 
			$media_gallery = WPBC_get_flex_layout_field('media_gallery');  
			if(!empty($media_gallery)){
				WPBC_get_template_part('parts/ui-slick-overflow', array(
					'imgages_ids' => $media_gallery,
					'template_item' => 'ui-card-image'
				)); 
			}
			?>
		</div>

	</div>

</div>

<?php WPBC_flex_layout_end(); ?>