<?php

$items = $args['imgages_ids'];
$template_item = !empty($args['template_item']) ? $args['template_item'] : 'ui-card-noticia';

$slick = array(
	'dots' => false,
	'arrows' => true,
	'equalHeightSlides' => true,
	'infinite' => false,
	'autoplay' => true,
	'autoplaySpeed' => 7500,
	'speed' => 300,
	'pauseOnHover' => true, 
	'slidesToShow' => 3,
	'slidesToScroll' => 1,
	'responsive' => array(
		array(
			'breakpoint' => 992,
			'settings' => array(
				'slidesToShow' => 2,
				'slidesToScroll' => 2,
			)
		),
		array(
			'breakpoint' => 768,
			'settings' => array(
				'slidesToShow' => 1,
				'slidesToScroll' => 1,
			)
		),
	),
);   

$slick = json_encode($slick); 
?>

	<div class="theme-slick-slider row ui-slick-overflow" data-slick='<?php echo $slick; ?>' data-disable-affix-offset="true">
		<?php  
		foreach ($items as $key => $value) { ?>
			<div class="item col-md-6 col-lg-4 p-0">
				<?php
				WPBC_get_template_part('parts/'.$template_item, array(
					'image_id' => $value,
				)); 
				?>
			</div>
		<?php } ?>
</div>