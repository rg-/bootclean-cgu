<?php WPBC_flex_layout_start(); ?>
<?php

$row = get_row();

$section_settings = WPBC_get_flex_layout($row); 
 
$style_background = WPBC_get_flex_layout_field('style_background'); 
$style_color = WPBC_get_flex_layout_field('style_color'); 

$repeater_content = WPBC_get_flex_layout_field('repeater_content'); 
$media_gallery = WPBC_get_flex_layout_field('media_gallery');   
?>

<div class="gpt-1 gpt-lg-2 gpb-2 bg-<?php echo $style_background; ?> text-<?php echo $style_color; ?>" >

	<div class="container gpt-2 gpb-2 gpb-lg-4">
		
		<div class="row">

			<div class="col-lg-6 gpr-lg-6 gpt-lg-2 gpb-2" data-is-inview="transition">
				<div class="gpr-lg-6">
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

			<div class="col-lg-6 gpl-lg-0 gmt-lg-n-6 z-index-30 position-relative">

				<div data-overlap="margin-right" data-overlap-multiply="-1" data-overlap-breakpoint="lg" class="gmt-lg-n-6 position-relative">
 

					<div class="gmt-lg-4"  data-parallax="translate-top" data-parallax-speed="0.15">
						<div class="embed-responsive embed-responsive-4by3">
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

</div>

<?php WPBC_flex_layout_end(); ?>