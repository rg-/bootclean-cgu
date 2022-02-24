<?php
$brand_alt = !empty($args['brand_alt']) ? $args['brand_alt'] : get_bloginfo('name');
$brand_link = !empty($args['brand_link']) ? $args['brand_link'] : get_bloginfo('url');
$brand_image =  get_stylesheet_directory_uri() . '/images/theme/logo-cgu-light.svg'; 
$brand_image_small =  get_stylesheet_directory_uri() . '/images/theme/logo-cgu-light-alt.svg'; 
$brand_image_width = !empty($args['brand_image_width']) ? $args['brand_image_width'] : '250';
$brand_image_height = !empty($args['brand_image_height']) ? $args['brand_image_height'] : '';
?>

<a class="navbar-brand position-relative z-index-20" href="<?php echo $brand_link; ?>">
	<span class="d-block">
		<?php if(!empty($brand_image)){ ?>
		<img class="logo-default d-none d-lg-block" width="250" src="<?php echo $brand_image; ?>" alt="<?php echo $brand_alt; ?>" data-affix-addclass=""/>
		<img class="logo-small d-lg-none" width="165" src="<?php echo $brand_image_small; ?>" alt="<?php echo $brand_alt; ?>" data-affix-addclass=""/>
		<?php } else { ?>
			<?php echo $brand_alt; ?>
		<?php } ?>
	</span>
</a>