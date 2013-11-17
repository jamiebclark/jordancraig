<?php
class JobRegion extends AppModel {
	public $name = 'JobRegion';
	public $hasMany = array('Job');
	
	public function beforeSave($options = array()) {
		if (!empty($this->data[$this->alias])) {
			$data =& $this->data[$this->alias];
		} else {
			$data =& $this->data;
		}
		if (!empty($data['states'])) {
			$data['states'] = $this->formatStateString($data['states']);
		}
		return parent::beforeSave($options);
	}
	
	private function formatStateString($stateStr) {
		$states = explode(',', $stateStr);
		$str = '';
		foreach ($states as $k => $state) {
			$states[$k] = strtoupper(substr(trim($state),0,2));
		}
		return implode(',', $states);	
	}
}