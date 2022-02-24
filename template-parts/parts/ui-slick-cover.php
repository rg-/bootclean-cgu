<div class="h-100">
<?php

$imgages_ids = $args['imgages_ids'];

$slick = array(
	'dots' => false,
	'arrows' => false, 
	'autoplay' => false,
	'infinite' => false,
	'autoplaySpeed' => !empty($args['autoplaySpeed']) ? $args['autoplaySpeed'] : 7000,
	'speed' => !empty($args['speed']) ? $args['speed'] : 800,
	//'pauseOnHover' => true, 
	'fade' => true,
); 
$slick = json_encode($slick); 

$slick_heights = array(
	'xs' => array(
		'default' => '100%', 
	), 
);
 

$slick_heights = json_encode($slick_heights); 

?>
	<div data-is-inview="slickAutoPlay" class="h-100 slick-embed-responsive theme-slick-slider ui-slick-zoomed-while-active" data-slick='<?php echo $slick; ?>' data-disable-affix-offset="true" data-breakpoint-height='<?php echo $slick_heights; ?>'>

		<?php foreach ($imgages_ids as $key => $value) { ?>
			<?php
			if(!empty($value)){
				$image_hi_data = wp_get_attachment_image_src( $value, "full" );
				$image_low_data = wp_get_attachment_image_src( $value, "medium" ); 
				$img_hi = $image_hi_data[0];
				$img_low = $image_low_data[0]; 
				$item_args = array( 
					'item_class' => 'attachment-top-center',
					'type' => 'slick-image-cover',
					'img_hi' => $img_hi,
					'img_low' => $img_low,
				); 
				WPBC_build_lazyloader_image($item_args); 
			}
			?>
		<?php } ?>

	</div>
</div>