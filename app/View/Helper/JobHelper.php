<?php
class JobHelper extends AppHelper {
	public $name = 'Job';
	public $helpers = array('Html');
	
	function textToList($text, $options = array()) {
		$lines = explode("\n", $text);
		$out = '';
		foreach ($lines as $line) {
			$line = trim($line);
			if (!empty($line)) {
				$out .= $this->Html->tag('li', $line);
			}
		}
		if (!empty($out)) {
			$out = $this->Html->tag('ul', $out, $options);
		}
		return $out;
	}
}