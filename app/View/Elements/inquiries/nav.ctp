<?php
$baseUrl = array('action' => 'index', 'admin' => false);
$navs = array(
	//array('Careers', array('controller' => 'jobs') + $baseUrl),
	//array('GENERAL INQUIRIES', array('controller' => 'inquiries', 'action' => 'add', 0) + $baseUrl),
	array('WHOLESALE INQUIRIES', array('controller' => 'inquiries', 'action' => 'add', 1) + $baseUrl),
	array('STORE LOCATOR', array('controller' => 'inquiries', 'action' => 'add', 0) + $baseUrl),
);
$params = $this->request->params;
?>
<ul class="top-menu">
<?php 
foreach ($navs as $nav):
	list($text, $url) = $nav;
	$active = $url['controller'] == $params['controller'];
	if ($active && $url['controller'] == 'inquiries') {
		$active = $url['action'] == $params['action'] && 
			isset($url[0]) && 
			isset($params['pass'][0]) && 
			$url[0] == $params['pass'][0];
	}
	echo $this->Html->tag('li',
		$this->Html->link($text, $url, array('class' => $active ? 'active' : null)),
		array('class' => $active ? 'selected' : null)
	);
endforeach;
?>
</ul>