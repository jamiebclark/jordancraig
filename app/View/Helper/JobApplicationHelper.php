<?php
class JobApplicationHelper extends AppHelper {
	public $name = 'JobApplication';
	
	private $uploadDir = '/resumes/';
	
	public function name($result) {
		$fields = array('first_name', 'middle_name', 'last_name');
		$name = '';
		foreach ($fields as $field) {
			if (!empty($result[$field])) {
				$name .= $result[$field] . ' ';
			}
		}
		return trim($name);
	}
	
	public function downloadLink($result = array()) {
		if ($url = $this->downloadUrl($result)) {
			return $this->Html->link('Download', $url, array('class' => 'download'));
		} else {
			return $this->Html->tag('em', 'Download');
		}
	}
	
	public function downloadUrl($result = array()) {
		if (!empty($result['filename'])) {
			return $this->uploadDir . $result['filename'];
		}
		return null;
	}
}