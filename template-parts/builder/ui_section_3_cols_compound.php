<?php WPBC_flex_layout_start(); ?>
<?php

$row = get_row();

$section_settings = WPBC_get_flex_layout($row); 
 
$style_background = WPBC_get_flex_layout_field('style_background'); 
$style_background_2 = WPBC_get_flex_layout_field('style_background_2'); 
$style_color = WPBC_get_flex_layout_field('style_color'); 


$header_html = WPBC_get_flex_layout_field('header_html'); 
$repeater_content = WPBC_get_flex_layout_field('repeater_content'); 

$media = WPBC_get_flex_layout_field('media'); 
	$media_gallery = $media['media_gallery']; 
	$media_gallery_overlaped = $media['media_gallery_overlaped'];	
	$media_gallery_secondary = $media['media_gallery_secondary'];	 

?>

<div class="gpt-2 gpb-5 gpy-lg-2 position-relative bg-<?php echo $style_background; ?> text-<?php echo $style_color; ?>">

	<div class="position-absolute-full z-index-10">
		<div class="row h-100">
			<div class="col-8 col-lg-10 h-100 ml-auto bg-<?php echo $style_background_2; ?>"></div>
		</div>
	</div>

	<div class="container position-relative z-index-20 gpt-lg-6 gpb-lg-6">

		<div class="row">

			<div class="col-10 col-lg-4 gpt-lg-6 order-1" data-is-inview="transition">
				<div <?php echo theme_inview_tag(array('delay'=> '.3s')); ?>>
					<div class="font-size-15">
						<?php echo apply_filters('the_content', $header_html); ?>
					</div>
				</div>
			</div>

			<div class="col-lg-6 pl-lg-2 gpr-lg-3 order-3 order-lg-2">

				<div data-parallax="translate-top" data-parallax-speed="0.05">
					<div class="embed-responsive embed-responsive-16by11">
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

			<div class="col-2 p-0 col-lg-2 order-2 order-lg-3">

				<div data-parallax="translate-top" data-parallax-speed="0.4">
					[sello_cgu]
				</div>

			</div>

		</div>

		<div class="row position-relative">

			<div class="position-absolute position-lg-relative left-0 bottom-0 z-index-20 col-6 gmb-3 gmb-lg-0 pb-3 pb-lg-0 px-0 gpx-lg-1 col-lg-4 gpt-lg-6 order-2 order-lg-1">

				<div class="gpt-lg-6 gpb-lg-2 gpr-lg-2 gmt-lg-4 gml-lg-n-1">

					<div data-parallax="translate-top" data-parallax-speed="-0.1">
						<div class="embed-responsive embed-responsive-1by1">
							<div class="embed-responsive-item">
								<?php
								if(!empty($media_gallery_secondary)){
									WPBC_get_template_part('parts/ui-slick-cover', array(
										'imgages_ids' => $media_gallery_secondary,
										'autoplaySpeed' => 5000
									));
								}
								?>
							</div>
						</div>
					</div>

				</div>

			</div>

			<div class="col-lg-4 pl-lg-2 gpr-lg-3 order-1 order-lg-2" data-is-inview="transition">

				<div class="gpt-2 gpt-lg-6 gpb-lg-6">
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

			<div class="col-9 ml-auto col-lg-4 gmt-lg-n-6 order-3">

				<div data-overlap="margin-right" data-overlap-multiply="-1" data-overlap-breakpoint="lg">

						<div data-parallax="translate-top" data-parallax-speed="-0.15">
							<div class="embed-responsive embed-responsive-4by6">
								<div class="embed-responsive-item">
									<?php
									if(!empty($media_gallery_overlaped)){
										WPBC_get_template_part('parts/ui-slick-cover', array(
											'imgages_ids' => $media_gallery_overlaped,
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

</div>

<?php WPBC_flex_layout_end(); ?>