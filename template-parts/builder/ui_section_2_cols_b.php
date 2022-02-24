<?php WPBC_flex_layout_start(); ?>
<?php

$row = get_row();

$section_settings = WPBC_get_flex_layout($row); 
 
$style_background = WPBC_get_flex_layout_field('style_background'); 
$style_color = WPBC_get_flex_layout_field('style_color'); 

$repeater_content = WPBC_get_flex_layout_field('repeater_content'); 
$media_gallery = WPBC_get_flex_layout_field('media_gallery');   
$media_gallery_2 = WPBC_get_flex_layout_field('media_gallery_2'); 
?>

<div class="gpb-2 gpb-lg-0 bg-<?php echo $style_background; ?> text-<?php echo $style_color; ?>" >

	<div class="container pb-2 pb-lg-0 gpt-2 gpb-lg-6">
		
		<div class="row">

			<div class="col-lg-5 gpr-lg-6 gpt-lg-6 gpb-1 gpb-lg-0 order-1 order-lg-2" data-is-inview="transition">
				<div class="gpt-lg-3">
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

			<div class="col-lg-7 gpr-lg-4 z-index-30 position-relative order-2 order-lg-1">

				<div data-overlap="margin-left" data-overlap-multiply="-1" data-overlap-breakpoint="xs" class="position-relative">

					<div>
						
						<div class="row row-three-quarters-gutters">
							<div class="col-6" data-parallax="translate-top" data-parallax-speed="0.30">
								<div class="embed-responsive embed-responsive-9by16">
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
							<div class="col-6" data-parallax="translate-top" data-parallax-speed="0.25">
								<div class="embed-responsive embed-responsive-9by16">
									<div class="embed-responsive-item">
										<?php 
											if(!empty($media_gallery_2)){
												WPBC_get_template_part('parts/ui-slick-cover', array(
													'imgages_ids' => $media_gallery_2,
													'autoplaySpeed' => 5500
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

		</div>

	</div>

</div>

<?php WPBC_flex_layout_end(); ?>