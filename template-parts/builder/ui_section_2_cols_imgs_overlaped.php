<?php WPBC_flex_layout_start(); ?>
<?php

$row = get_row();

$section_settings = WPBC_get_flex_layout($row); 
 
$style_background = WPBC_get_flex_layout_field('style_background'); 
$style_color = WPBC_get_flex_layout_field('style_color'); 

$content = WPBC_get_flex_layout_field('content');
	$content_repeater = $content['content_repeater'];	 
$media = WPBC_get_flex_layout_field('media'); 
	$media_gallery = $media['media_gallery']; 
	$media_gallery_overlaped = $media['media_gallery_overlaped'];	


	$media_gallery_overlaped_section = $media['media_gallery_overlaped_section'];	

$content_extra = WPBC_get_flex_layout_field('content_extra');
?>

<div class="gpy-2 position-relative bg-<?php echo $style_background; ?> text-<?php echo $style_color; ?>">

	<div class="container gpt-4 gpt-lg-6 gpb-4">

		<div class="row">

			<div class="col-lg-6 gpb-2 gpb-lg-0" data-is-inview="transition">

				<div class="font-size-15 gpt-lg-1 gpr-lg-6">
					<?php
					if(!empty($content_repeater)){
						foreach ($content_repeater as $key => $value) {
							$html = $value['content_repeater_html'];
							$delay = (($key) * .26) + .3; 
							?>
							<div <?php echo theme_inview_tag(array('delay'=> $delay.'s')); ?>>
								<?php echo apply_filters('the_content', $html); ?>
							</div>
							<?php
						}
					}
					?>
				</div>

			</div>


			<div class="col-lg-6 gpt-lg-5 gpb-lg-4" data-is-inview="transition">

				<div class="ui-images-overlaped <?php echo !empty($media_gallery_overlaped_section) ? 'overflow-top' : ''; ?> ">

					<div class="ui-images-overlaped-image overlaped" data-parallax="translate-top" data-parallax-speed="0.05">
						<div class="embed-responsive embed-responsive-1by1">
							<div class="embed-responsive-item">
								<?php
								if(!empty($media_gallery_overlaped)){
									WPBC_get_template_part('parts/ui-slick-cover', array(
										'imgages_ids' => $media_gallery_overlaped,
										'autoplaySpeed' => 5600
									));
								}
								?>
							</div>
						</div>
					</div>

					<div class="ui-images-overlaped-image" data-parallax="translate-top" data-parallax-speed="-0.05">
						<div class="embed-responsive embed-responsive-1by1">
							<div class="embed-responsive-item">
								<?php
								if(!empty($media_gallery)){
									WPBC_get_template_part('parts/ui-slick-cover', array(
										'imgages_ids' => $media_gallery,
										'autoplaySpeed' => 5000
									));
								}
								?>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="ui-content-extra d-none d-md-block">
		<?php echo do_shortcode($content_extra); ?>
	</div>

</div>

<?php WPBC_flex_layout_end(); ?>