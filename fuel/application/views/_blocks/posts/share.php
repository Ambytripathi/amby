<?php 
$CI->load->helper('social');

echo social_popup_js();
?>

<div class="post_share">
	<a href="<?=share('twitter', $post)?>" class="social_twitter popup" target="_blank">Twitter</a>
	<a href="<?=share('facebook', $post)?>" class="social_twitter popup" target="_blank">Facebook</a>
	<a href="<?=share('googleplus', $post)?>" class="social_twitter popup" target="_blank">Googleplus</a>
	<a href="<?=share('linkedin', $post)?>" class="social_twitter popup" target="_blank">LinkedIn</a>
	<a href="<?=share('email', $post)?>" class="social_twitter">Email</a>
</div>
