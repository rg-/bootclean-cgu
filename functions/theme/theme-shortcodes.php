<?php

// ##############################
// vectors/ilustrations/icons

add_shortcode('semicirculo_punto_derecha', 'semicirculo_punto_derecha_fx');
function semicirculo_punto_derecha_fx($atts, $content = null ) {  
  $defs = array( 
  ); 
  $args = array_merge($defs, $atts);

  $out = '<div class="ui-semicircle-dot-down">'; 
    $out .= '<img data-parallax="translate-top" data-parallax-speed="0.15" width="288" src="'. get_stylesheet_directory_uri() .'/images/theme/semicircle-dot-down-right.svg" alt=" "/>'; 
  $out .= '</div>';

  return $out;
}

add_shortcode('sello_100_anos_lineas', 'sello_100_anos_lineas_fx');
function sello_100_anos_lineas_fx($atts, $content = null ) {  
  $defs = array( 
  ); 
  $args = array_merge($defs, $atts);

  $out = '<div class="ui-sello-lineas">';
  	$out .= '<span class="l"></span>';
  	$out .= '<img width="132" src="'. get_stylesheet_directory_uri() .'/images/theme/sello-100-anos.svg" alt=" "/>';
  	$out .= '<span class="r"></span>';
  $out .= '</div>';

  return $out;
}

add_shortcode('sello_cgu', 'sello_cgu_fx');
function sello_cgu_fx($atts, $content = null ) {  
  $defs = array( 
  ); 
  $args = array_merge($defs, $atts);

  $out = '<div class="ui-sello-cgu">'; 
    $out .= '<img width="132" src="'. get_stylesheet_directory_uri() .'/images/theme/sello-cgu.svg" alt=" "/>'; 
  $out .= '</div>';

  return $out;
}

// ##############################
// titles

add_shortcode('title_display_3', 'title_display_3_fx');
function title_display_3_fx($atts, $content = null ) {  
  $defs = array(  
  	'tag' => '',
  	'icon' => 'wpbci-esquina-down-right',
  ); 
  $args = array_merge($defs, $atts);

  if(!empty($args['icon'])){
    $out = '<i class="'.$args['icon'].' text-secondary small gmb-1 pb-2 d-block"></i>';
  }
    if(!empty($args['tag']) && $args['tag_pos'] == 'top'){
      $out .= ' <br><b class="h5 mb-2 d-inline-block">'.$args['tag'].'</b>';
    }
  $out .= '<h2 class="display-3 gpb-lg-1">';
    $out .= $content;
    if(!empty($args['tag']) && $args['tag_pos'] == 'bottom'){
      $out .= ' <br><b class="h5">'.$args['tag'].'</b>';
    }
  $out .= '</h2>'; 
  return $out;
}

add_shortcode('title_display_4', 'title_display_4_fx');
function title_display_4_fx($atts, $content = null ) {  
  $defs = array(  
    'tag' => '',
    'tag_pos' => 'bottom',
    'icon' => 'wpbci-esquina-down-right',
  ); 
  $args = array_merge($defs, $atts);

  if(!empty($args['icon'])){
    $out = '<i class="'.$args['icon'].' text-secondary small gmb-1 pb-2 d-block"></i>';
  }
    if(!empty($args['tag']) && $args['tag_pos'] == 'top'){
      $out .= ' <br><b class="h5 mb-2 d-inline-block">'.$args['tag'].'</b>';
    }
  $out .= '<h2 class="display-4 gpb-lg-1">';
    $out .= $content;
    if(!empty($args['tag']) && $args['tag_pos'] == 'bottom'){
      $out .= ' <br><b class="h5">'.$args['tag'].'</b>';
    }
  $out .= '</h2>'; 
  return $out;
}

// ##############################
// btns

add_shortcode('btn_rounded', 'btn_rounded_fx');
function btn_rounded_fx($atts, $content = null ) {  
  $defs = array( 
  	'label' => 'VER MÁS',
  	'href' => '#',
  	'color' => 'secondary',
  ); 
  $args = array_merge($defs, $atts);

  $out = '<a href="'.$args['href'].'" class="btn btn-round-angle btn-outline-'.$args['color'].'">'.$args['label'].'</a>';

  return $out;
}

add_shortcode('btn_rounded_big', 'btn_rounded_big_fx');
function btn_rounded_big_fx($atts, $content = null ) {  
  $defs = array( 
    'label' => 'VER MÁS',
    'href' => '#',
    'color' => 'secondary',
  ); 
  $args = array_merge($defs, $atts);

  $out = '<a href="'.$args['href'].'" class="btn btn-lg btn-round-angle btn-outline-'.$args['color'].'">'.$args['label'].'</a>';

  return $out;
}


add_shortcode('btn_line', 'btn_line_fx');
function btn_line_fx($atts, $content = null ) {  
  $defs = array( 
    'label' => 'VER MÁS',
    'href' => '#',
    'color' => 'secondary',
  ); 
  $args = array_merge($defs, $atts);

  $out = '<a href="'.$args['href'].'" class="btn btn-line btn-line-'.$args['color'].'">'.$args['label'].'</a>';

  return $out;
}