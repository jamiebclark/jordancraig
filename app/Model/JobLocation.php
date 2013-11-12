<?php
class JobLocation extends AppModel {
	var $name = 'JobLocation';
	var $hasMany = array('Job');
	
	var $actsAs = array(
		//'BlankDelete' => array(	'and' => array('city', 'state'))
	);
	
	public function afterSave($created, $options = array()) {
		$this->setTitle($this->id);
		return parent::afterSave($created, $options);
	}
	
	private function setTitle($id) {
		$result = $this->read(null, $id);
		$result = $result[$this->alias];
		$title = $result['country'] . '-';
		if (!empty($result['city'])) {
			$title .= $result['city'];
		}
		if (!empty($result['state'])) {
			if (!empty($title)) {
				$title .= ', ';
			}
			$title .= $result['state'];
		}
		return $this->save(compact('id', 'title'), array('callbacks' => false, 'validate' => false));
	}
}