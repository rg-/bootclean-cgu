<?php 

$menu = new WPBC_Bootstrap_Nav_Menu(); 
$menu->setMenu($args['id']);
$menu->setContainerClass('ui-menu-cols');
$menu->setMenuClass('nav flex-xl-nowrap flex-column flex-lg-row');
$menu->setSubMenuClass('nav flex-column');
$menu->setListClass('');
$menu->setLinkClass('nav-link'); 

?>
<div class="ui-menu">
	<?php $menu->showMenu(); ?>
</div>