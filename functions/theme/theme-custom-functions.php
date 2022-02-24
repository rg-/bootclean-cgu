<?php

function theme_inview_tag($atts = array()){

	$defs = array(
  	'delay' => '.3s',
  	'duration' => '.5s',
    'effect' => 'fadeInUp',
  	'once' => true,  
  ); 
  $args = array_merge($defs, $atts);

  $out = 'data-is-inview-fx="'.$args['effect'].'" data-transition-duration="'.$args['duration'].'" data-transition-delay="'.$args['delay'].'"';

  if(!empty($args['once'])){
  	$out .= ' data-is-inview-once="true"';
  }

	return $out;
}