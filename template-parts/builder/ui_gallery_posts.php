<?php WPBC_flex_layout_start(); ?>
<?php

$row = get_row();

$section_settings = WPBC_get_flex_layout($row); 
 
$style_background = WPBC_get_flex_layout_field('style_background'); 
$style_color = WPBC_get_flex_layout_field('style_color'); 

$repeater_content = WPBC_get_flex_layout_field('repeater_content'); 

?>

<div class="gpy-lg-2 bg-<?php echo $style_background; ?> text-<?php echo $style_color; ?>" >

	<div class="container gpt-6 gpb-4">
 		 
		<div data-is-inview="transition">
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

		<div class="position-relative">
			<?php
			$imgages_ids = array(
				39,
				43,
				31,
				43,
				39,
			);
			if(!empty($imgages_ids)){
				WPBC_get_template_part('parts/ui-slick-overflow', array(
					'imgages_ids' => $imgages_ids,
					'template_item' => 'ui-card-noticia'
				)); 
			}
			?>
		</div>

	</div>

</div>

<?php WPBC_flex_layout_end(); ?>