<?php


// Filter args used
add_filter('wpbc/filter/mainteneance_mode/args',function($args){
	$args['title'] = get_bloginfo('title');
	$args['html'] = '';
	return $args;
},10,1);

// output body html
add_action('wpbc/mainteneance_mode/body',function(){
	?>
<table width="100%" border="0">
	<tr>
		<td>
			<img width="320" src="<?php echo get_stylesheet_directory_uri(); ?>/images/theme/logo-cgu-light-alt.svg" alt="<?php echo get_bloginfo('title'); ?>" />
			<div><h1><span>SITIO EN MANTENIMIENTO</span> <br>VOLVEMOS EN BREVE<h1></div>
		</td>
	</tr>
</table>
	<?php
});

// add some styles
add_action('wpbc/mainteneance_mode/head',function(){
?>
<meta name="robots" content="noindex,nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300&display=swap" rel="stylesheet">
<style>
	body,
	html{
		height: 100%;
	}
	img{
		max-width: 100%;
		height: auto;
		display: block;
		margin: auto;
	}
	div{
		padding: 20px;
	}
	h1{
		font-size: 22px;
		font-weight: 300;
		line-height: 1.8;
	}
	h1 span{
		font-size: 12px;
		padding: 12px 15px 10px 15px;
		line-height: 1;
		background-color: rgb(180, 85, 65);
		display: inline-block;
		margin-bottom:30px;
	}
	body{
		font-family: 'Spartan', sans-serif;
		letter-spacing: 1px;
		background-color: #0e3c4f;
		height: 100%;
		padding: 0;
		margin: 0;
		color: #fff;
	}
	table{
		height: 100%;
	}
	tr{
		height: 100%
	}
	td{
		height: 100%;
		text-align: center;
	}
</style>
<?php
});