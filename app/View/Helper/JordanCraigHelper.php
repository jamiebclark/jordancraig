<?php
class JordanCraigHelper extends AppHelper {
	public $name = 'JordanCraig';
	public $helpers = array('Html');

	function beforeRender($options) {
		//$this->Html->css('webdev', null, array('inline' => false));
		return parent::beforeRender($options);
	}
	
	//Returns a definition list based on the listItems array formatted like array("Term" => "Definition")
	function dlList($listItems, $options = array()) {
		$out = '';
		foreach ($listItems as $dt => $dd) {
			$out .= $this->Html->tag('dt', $dt) . $this->Html->tag('dd', $dd) . "\n";
		}
		return $this->Html->tag('dl', $out, $options);
	}
	
	//Returns an unordered list of links based on the listItems array formatted like 
	//	array(array("Link Text", $url, $urlOptions), array("Link Text", $url, $urlOptions))
	function navList($listItems, $options = array()) {
		$out = '';
		$total = count($listItems);
		$params = $this->request->params;	//Store this for easier reading later
		$action = $params['action'];
		$controller = $params['controller'];
		if (!empty($params['prefix'])) {
			$action = substr($action, strlen($params['prefix']) + 1);
		}
		foreach ($listItems as $count => $listItem) {
			list($title, $url, $liOptions) = $listItem + array(null, null, array());
			$urlOptions = compact('title');
			if ($count == 0) {
				$liOptions = $this->addClass($liOptions, 'first');
			} else if ($count == $total - 1) {
				$liOptions = $this->addClass($liOptions, 'last');
			}
			
			$navMatch = false;
			if ($controller == 'pages') {	//Url is a static page using Pages controller
				$navMatch = !empty($params['pass'][0]) && !empty($url[0]) && $params['pass'][0] == $url[0];
			} elseif (is_array($url)) { //URL is CakePHP model/controller
				$navMatch = $controller == $url['controller'] && $action == $url['action'];
			}
			
			if ($navMatch) {
				$liOptions = $this->addClass($liOptions, 'selected');
				$urlOptions = $this->addClass($urlOptions, 'active');
			}
			$out .= "\t" . $this->Html->tag('li', 
				$this->Html->link($title, $url, $urlOptions), 
				$liOptions
			) . "\n";
		}
		return $this->Html->tag('ul', $out, $options);	
	}
}