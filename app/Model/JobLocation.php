<?php
App::uses('Location', 'Lib');

class JobLocation extends AppModel {
	public $name = 'JobLocation';
	public $actsAs = array(
		'Location.Mappable' => array('location' => 'Country')
	);
	
	public $hasMany = array('Job', 'JobLocationsState');
	public $hasAndBelongsToMany = array('Location.State');
	
	private $_saveStates = null;
	
	public function beforeSave($options = array()) {
		$this->setStates();
		return parent::beforeSave($options);
	}
	
	public function afterSave($created, $options = array()) {
		$id = $this->id;
		$this->saveStates();
		$this->setTitle($id);
		return parent::afterSave($created, $options);
	}

	private function setTitle($id) {
		$result = $this->find('first', array(
			'fields' => '*',
			'contain' => array('State'),
			'conditions' => array(
				$this->escapeField($this->primaryKey) => $id
			)
		));
		$location = $result[$this->alias];
		
		$title = $titleLong = '';
		if (!empty($location['country'])) {
			$title .= $location['country'] . '-';
			$titleLong .= $location['country'] . '-';
		}
		if (!empty($location['city'])) {
			$title .= $location['city'];
			$titleLong .= $location['city'];
		}
		if (!empty($result['State'])) {
			if (count($result['State']) == 1) {
				if (empty($location['city'])) {
					$title .= $result['State'][0]['title'];
					$titleLong .= $result['State'][0]['title'];
				} else {
					$title .= ', ' . $result['State'][0]['id'];
					$titleLong .= ', ' . $result['State'][0]['id'];
				}
			} else {
				$states = array();
				foreach ($result['State'] as $state) {
					$states[] = $state['id'];
				}
				$titleLong .= ' (' . implode(',', $states) . ')';
			}
		}
		return $this->save(compact('id', 'title') + array('title_long' => $titleLong), array('callbacks' => false, 'validate' => false));
	}
	
	/**
	 * Since HABTM relationships can't work with non-integer indexes, we need to save the stuff manually
	 * This checks if any State information is being passed in data and stores it for after the save is complete
	 *
	 **/
	private function setStates() {
		if (isset($this->data['State'])) {
			$this->_saveStates = $this->data['State'];	//Stores it for later
			unset($this->data['State']);				//Removes it from current data
		}
	}
	
	/**
	 * If state information has been stored, makes sure it's saved 
	 *
	 **/
	private function saveStates() {
		if (isset($this->_saveStates)) {
			//Clears existing state informatoin
			$this->JobLocationsState->deleteAll(array('job_location_id' => $this->id));
			if (!empty($this->_saveStates)) {
				$data = array();
				foreach ($this->_saveStates as $stateId) {
					$data[] = array('job_location_id' => $this->id, 'state_id' => $stateId);
				}
				$this->JobLocationsState->saveAll($data);	//Saves new state data
			}
		}
	
	}

}