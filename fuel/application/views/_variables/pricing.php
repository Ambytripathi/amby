<?php 

$CI =& get_instance();

$vars = array();
$vars['layout'] = 'general';
$vars['page_title'] = fuel_nav(array('render_type' => 'page_title', 'delimiter' => ' : ', 'order' => 'desc', 'home_link' => 'Home'));
$vars['meta_keywords'] = '';
$vars['meta_description'] = '';
$vars['js'] = array();
$vars['css'] = array();
$vars['body_class'] = uri_segment(1).' '.uri_segment(2);

$pages = array();

$var['title'] = 'Simple Pricing';
$var['subtitle'] = 'MedicSpot provides excellent healthcare at affordable prices. Get quick and convenient access to our expert GP’s.';
?>