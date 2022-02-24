<?php 

	$din_styles = array(

		'xs' => array(
			'color' => 'var(--white)',
			'background-color' => 'var(--primary)',
		),

		'md' => array(
			'color' => 'var(--dark)',
			'background-color' => 'var(--success)',
		),

		'lg' => array(
			'color' => 'var(--white)',
			'background-color' => 'var(--dark)',
		),

	);

	$badge_styles = array(
		
		'300px' => array( 
			'color' => 'var(--white)',
			'background-color' => 'var(--dark)',
		),

		'sm' => array( 
			'color' => 'var(--primary)',
			'background-color' => 'var(--white)',
		), 

		'900px' => array( 
			'color' => 'var(--white)',
			'background-color' => 'var(--dark)',
		),

		'lg' => array( 
			'color' => 'var(--primary)',
			'background-color' => 'var(--white)',
		),

		'1210px' => array( 
			'font-size' => '4rem',
			'color' => 'var(--white)',
			'background-color' => 'var(--success)',
		),

	);

?>

<div data-dynamic-styles='<?php echo json_encode($din_styles); ?>' class="gpy-2 transition">
	<div class="container gpy-4 text-center">
		<h2 class="display-2">Styles responsive <br><span class="badge badge-primary transition" data-dynamic-styles='<?php echo json_encode($badge_styles); ?>'>[data-dynamic-styles]</span> <br><small>*json attribute</small></h2>
	</div>
</div>


<?php
	$din_styles_vertical = array(
		'0' => array(
			'background-color' => 'var(--danger)',
		),
		'400px' => array(  
			'color' => 'var(--white)',
			'background-color' => 'var(--success)',
			'content' => 'Resize under 400px window height',
		), 
	);
	$badge_styles_vertical_400_down = array(
		'400px' => array(   
			'display' => 'none',
		), 
	);
	$badge_styles_vertical_400_up = array(
		'0' => array(   
			'display' => 'none',
		), 
		'400px' => array(   
			'display' => 'block',
		), 
	);
?>
<div data-dynamic-query="min-height" data-dynamic-styles='<?php echo json_encode($din_styles_vertical); ?>' class="gpy-2 transition">
	<div class="container gpy-4 text-center">
		<h2 class="display-2">Vertical responsive? Yes! <br>
			<small data-dynamic-query="min-height" data-dynamic-styles='<?php echo json_encode($badge_styles_vertical_400_down); ?>'>Under 400px height</small>
			<small data-dynamic-query="min-height" data-dynamic-styles='<?php echo json_encode($badge_styles_vertical_400_up); ?>'>More than 400px height</small>
		</h2>
	</div>
</div> 