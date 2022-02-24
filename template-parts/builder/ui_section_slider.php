<?php WPBC_flex_layout_start(); ?>
<?php

$row = get_row();

$section_settings = WPBC_get_flex_layout($row); 

$type = WPBC_get_flex_layout_field('type'); 
$items = WPBC_get_flex_layout_field('items'); 

$slick_id = 'ui_section_slider-'.uniqid();
$slick_content_id = 'ui_section_content_slider-'.uniqid();

$slick = array(
	'dots' => false,
	'arrows' => false, 
	'autoplay' => false,
	'autoplaySpeed' => 7000,
	'speed' => 2000,
	//'pauseOnHover' => true,
	'fade' => true,
); 
$slick = json_encode($slick); 

$slick_heights = array(
	'xs' => array(
		'default' => '100wh',
		'min' => '460px',
		'max' => '800px'
	),
	'lg' => array(
		'default' => '100wh',
		'min' => '600px',
		'max' => '794px'
	),
);

if($type == 'md'){
	$slick_heights = array(
		'xs' => array(
			'default' => '50wh',
			'min' => '460px',
			'max' => '460px'
		),
		'lg' => array(
			'default' => '100wh',
			'min' => '400px',
			'max' => '531px'
		),
	);
}

$slick_heights = json_encode($slick_heights); 

?>

<?php if( !empty($items) ){ ?> 

<div class="position-relative">

<div id="<?php echo $slick_id; ?>" class="theme-slick-slider" data-slick='<?php echo $slick; ?>' data-disable-affix-offset="true" data-breakpoint-height='<?php echo $slick_heights; ?>'>
		<?php foreach ($items as $key => $value) { 

			$background = $value['background'];
				$background_image = $background['background_image'];
				$background_image_position = $background['background_image_position'];

			$content = $value['content'];
				$content_text_color = $content['content_text-color'];
				$content_title = $content['content_title'];

			$action = $value['action'];
				$action_type = $action['action_type'];
				$action_post = $action['action_post'];
				$action_url = $action['action_url'];
				$action_target = $action['action_target'];

			?>

			<div class="position-relative d-block attachment-fixed-desktop">

				<?php 
				
				if(!empty($background_image)){
					$image_hi_data = wp_get_attachment_image_src( $background_image,  "full"  );
					$image_low_data = wp_get_attachment_image_src( $background_image, "medium" ); 
					$img_hi = $image_hi_data[0];
					$img_low = $image_low_data[0];  
					$item_args = array( 
						'item_class' => 'attachment-'.$background_image_position,
						'type' => 'slick-image-cover',
						'img_hi' => $img_hi,
						'img_low' => $img_low,
					);
					WPBC_build_lazyloader_image($item_args); 
				}

				if(empty($background_image)){
					echo '<div class="item-container">';
				}
				?>
 

				<?php
				if(empty($background_image)){
					echo '</div>';
				}
				?>

			</div>

		<?php } ?>

</div>

<?php
	$slick = array(
		'dots' => false,
		'arrows' => false, 
		'autoplay' => false,
		'autoplaySpeed' => !empty($args['autoplaySpeed']) ? $args['autoplaySpeed'] : 4000,
		'speed' => !empty($args['autoplaySpeed']) ? $args['autoplaySpeed'] : 900,
		'pauseOnHover' => false,
		'asNavFor' => '#'.$slick_id,
		//'fade' => true,
	); 
	$slick = json_encode($slick); 
?>
<div data-is-inview="slickAutoPlay" id="<?php echo $slick_content_id; ?>" class="theme-slick-slider position-absolute-full z-index-20" data-slick='<?php echo $slick; ?>' data-disable-affix-offset="true" data-breakpoint-height='<?php echo $slick_heights; ?>'>
		<?php foreach ($items as $key => $value) { 

			$background = $value['background'];
				$background_image = $background['background_image'];

			$content = $value['content'];
				$content_text_color = $content['content_text-color'];
				$content_text_align = $content['content_text-align'];
				$content_title = $content['content_title'];

			$action = $value['action'];
				$action_type = $action['action_type'];
				$action_post = $action['action_post'];
				$action_url = $action['action_url'];
				$action_target = $action['action_target'];

			?>

			<div class="position-relative d-block">

				<?php   

				$content_color = !empty($content_text_color) ? $content_text_color : '#fff';
	 
				?>
				<div class="item-container">
				<div class="slide-overlay position-absolute-full z-index-10">
					 
					<div class="d-flex align-items-end h-100 w-100" style="color:<?php echo $content_color; ?>;">
						<div class="container gpb-4 gpb-lg-4 text-<?php echo $content_text_align; ?>">
							<?php if( !empty($content_title) ){ ?>
								<?php echo $content_title; ?>
							<?php } ?>
							<?php if( $action_type != 'none' ) {

								if( $action_type == 'internal' ){
									$action_href = get_permalink($action_post);
								}
								if( $action_type == 'external' ){
									$action_href = $action_url;
								}

								$target = !empty($action_target) ? 'target="_blank"' : '';

								?>
							<p class="m-0"><a class="d-block d-md-inline-block btn btn-lg btn-round-angle btn-outline-secondary text-white" href="<?php echo $action_href; ?>" <?php echo $target; ?>>Cononcé más</a> <i class="d-none d-md-inline-block wpbci-esquina-down-left text-light gml-3"></i></p>
							<?php } ?>
						</div>
					</div>

				</div>

				</div>
			
			</div>

		<?php } ?>

</div>

</div>

<?php } ?>

<?php WPBC_flex_layout_end(); ?>