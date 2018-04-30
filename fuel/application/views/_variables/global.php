<?php 

$CI =& get_instance();

$vars = array();
$vars['layout'] = 'general';
$vars['page_title'] = fuel_nav(array('render_type' => 'meta_title', 'delimiter' => ' : ', 'order' => 'desc', 'home_link' => 'Home'));
$vars['meta_title'] = '';
$vars['meta_keywords'] = '';
$vars['meta_description'] = '';
$vars['js'] = array();
$vars['css'] = array();
$vars['body_class'] = uri_segment(1).' '.uri_segment(2);

$var['title'] = '';
$var['subtitle'] = '';
$pages = array();
$pages['pricing'] = array('title'=>'sdfsd', 'subtitle'=>'sdfsdf')
?>