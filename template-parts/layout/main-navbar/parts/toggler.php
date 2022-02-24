<?php
	$color = !empty($args['color']) ? $args['color'] : 'white';
	$color_open = !empty($args['color_open']) ? $args['color_open'] : 'white';
	$target = !empty($args['target']) ? $args['target'] : '#navbar-collapse-primary';
?>
<div class="nav-item-toggler">
	<button class="navbar-toggler collapsed animate toggler-<?php echo $color;?> toggler-open-<?php echo $color_open;?>" type="button" data-toggle="collapse" data-target="<?php echo $target;?>" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
  	<span class="custom-toggler"><span class="navbar-toggler-icon"></span></span>
	</button>
</div>