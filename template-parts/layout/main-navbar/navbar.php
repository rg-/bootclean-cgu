<?php

	$simulate = true; 
	$affix = 'data-toggle="nav-affix"';
	$affix_removeclass = '';
	$affix_addclass = '';
	$affix_target = '#main-content';
	$nav_class = 'navbar-expand-lg navbar-expand-aside collapse-right';
	$nav_class_color = 'bg-primary'; 
	$target = '#main-content';
	$simulate_target = '#main-content';
	global $post;
	if( !empty($post) && WPBC_if_has_page_header($post->ID) ){ 
		$nav_class .= ' has-page-header'; 
		$nav_class_color = 'bg-transparent';
		$simulate = false;  
		$affix_removeclass = $nav_class_color;
		$affix_addclass = 'bg-primary shadow-sm';
	}
	if( is_front_page() ){
		$nav_class .= ' is-front-page'; 
	} 

	$nav_class = $nav_class . ' ' . $nav_class_color;

?>

<nav id="main-navbar" 
			class="navbar <?php echo $nav_class; ?>" 
			<?php echo $affix; ?> 
			data-affix-position="top" 
			data-affix-simulate="<?php echo $simulate; ?>"  
			data-affix-simulate-target="<?php echo $simulate_target; ?>" 
			data-affix-simulate-resize="true" 
			data-affix-scrollify="true" 
			data-affix-breakpoint="xs" 
			data-affix-target="<?php echo $affix_target; ?>" 
			data-affix-offset=""  
			data-aside-expand-target=".aside-expand-content" 
			data-affix-removeclass="<?php echo $affix_removeclass; ?>" 
			data-affix-addclass="<?php echo $affix_addclass; ?>" 
			data-is-inview="transition">

	<div class="container aside-expand-content container-gutter-mobile gpx-lg-1" data-affix-removeclass="" data-is-inview-once data-is-inview-fx="fadeInDown" data-transition-delay=".3s">

		<?php WPBC_get_template_part('layout/main-navbar/parts/brand'); ?>

		<?php WPBC_get_template_part('layout/main-navbar/parts/toggler'); ?>

		<?php WPBC_get_template_part('layout/main-navbar/parts/menus'); ?>

	</div>

</nav>

<?php
 $primary_menu = WPBC_get_menu_array('primary');
 // _print_code($primary_menu);  
?>