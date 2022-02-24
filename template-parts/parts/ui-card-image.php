<a href="#" class="ui-post-card ui-card-image slick-item-padding">
	<div class="ui-post-card-image">
	<?php
	
	$image_id = $args['image_id']; 

	$title = get_the_title($image_id);
	$caption = get_the_excerpt($image_id); 

		$image_hi_data = wp_get_attachment_image_src( $image_id,  "full"  );
		$image_low_data = wp_get_attachment_image_src( $image_id, "medium" ); 
		$img_hi = $image_hi_data[0];
		$img_low = $image_low_data[0];  
		$item_args = array( 
			'embed' => '4by6',
			'item_class' => 'h-100',
			'slick_item' => 'ui-post-card-image-item',
			'type' => 'slick-image-responsive-embed',
			'img_hi' => $img_hi,
			'img_low' => $img_low,
		);
		WPBC_build_lazyloader_image($item_args); 
		?>
		
		<?php if(!empty($caption)){ ?>
			<div class="ui-post-card-caption">
				<div>
					<?php echo $caption; ?>
				</div>
			</div>
		<?php } ?>
			
	</div>

	<div class="ui-post-card-text">

		<span class="btn btn-line more"><?php echo $title; ?></span>

	</div>

</a>