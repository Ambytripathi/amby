<?php 
fuel_set_var('layout', '');
$output = $this->fuel->pages->render($alias, array(), array('render_mode' => 'cms'), TRUE);
if ($output === FALSE)
{
	redirect_404();
}
echo $output;
?>