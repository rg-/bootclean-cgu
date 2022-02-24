<div class="container gpt-2">
	<h2 class="display-3">2 Columns + title-up</h2>
</div>

<?php  

$cols = array(

	// col
	array(

		'col_type' => 'title-up',

		'col_side' => 'left',
		'col_size' => '6',
		'col_order' => '1',
		'col_order_breakpoint' => '1', 
		'col_class' => 'p-0', 

		'content' => array(
			'content_class' => 'gpy-2 gpx-1 gpy-lg-4 gpr-lg-4 gmb-lg-2',
			'content_background_class' => '',
			'title' => '<h2 class="display-3 mb-0 mb-lg-4">title-up 2.1</h2>',
			'wysiwyg' => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
		),
		'overlap_content' => array(
			'overlap_embed' => '21by9',
			'overlap_class' => '', 
			'overlap_images' => array(9,8,7),
			'overlay_slick_args' => array('dots' => true),
		),

	),

	// col
	array(

		'col_type' => 'title-up',

		'col_side' => 'right',
		'col_size' => '6',
		'col_order' => '2',
		'col_order_breakpoint' => '2', 
		'col_class' => 'p-0', 

		'content' => array(
			'content_class' => 'gpy-2 gpx-1 gpy-lg-4 gpl-lg-4 gmb-lg-2', 
			'content_background_class' => 'bg-success', 
			'title' => '<h2 class="display-3 mb-0 mb-lg-4">title-up 2.2</h2>',
			'wysiwyg' => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
		),
		'overlap_content' => array(
			'overlap_embed' => '21by9',
			'overlap_class' => '', 
			'overlap_images' => array(8,7,9),
			'overlay_slick_args' => array('dots' => true),
		),

	),

);

 
WPBC_get_full_content_fit( array(
	'layout_id' => "full-cols",
	'breakpoint' => "lg", 
	'layout_class' => 'bg-dark text-white',
	'cols' => $cols,
)); 

?>