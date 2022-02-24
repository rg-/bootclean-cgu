<?php WPBC_flex_layout_start(); ?>
<?php

$row = get_row();

$section_settings = WPBC_get_flex_layout($row); 

$style_background = WPBC_get_flex_layout_field('style_background'); 
$style_color = WPBC_get_flex_layout_field('style_color'); 

$style_background_image =  WPBC_get_flex_layout_field('style_background_image'); 

$repeater_content = WPBC_get_flex_layout_field('repeater_content'); 

?>

<div class="position-relative bg-<?php echo $style_background; ?> text-<?php echo $style_color; ?>" data-is-inview="transition">

	<?php if(!empty($style_background_image)){ ?>
		<div class="position-absolute-full z-index-10 attachment-fixed-desktop">
			<?php
			WPBC_get_template_part('parts/ui-slick-cover', array(
				'imgages_ids' => $style_background_image,
				'autoplaySpeed' => 5600,
				'speed' => 1000
			));
			?>
		</div>
	<?php } ?>

	<div class="container gpt-6 gpb-4 position-relative z-index-20">

		<div class="col-lg-6 mx-auto">

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

</div>

<?php WPBC_flex_layout_end(); ?>