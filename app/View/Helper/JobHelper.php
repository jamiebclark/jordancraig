<?php
class JobHelper extends AppHelper {
	public $name = 'Job';
	public $helpers = array('Html');
	
	function listView($result) {
		$out = '';
		$out .= $this->term('Category', $result['JobCategory']['title']);
		$out .= $this->term('Overview', nl2br($result['Job']['overview']));
		$out .= $this->term('Responsibilities', $this->textToList($result['Job']['responsibilities']));
		$out .= $this->term('Qualifications', $this->textToList($result['Job']['qualifications']));
		return $this->Html->tag('dl', $out, array('class' => 'job-view'));
	}
	
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
	
	private function term($title, $content) {
		if (!empty($content)) {
			return $this->Html->tag('dt', $title) . $this->Html->tag('dd', $content);
		} else {
			return '';
		}
	}
}