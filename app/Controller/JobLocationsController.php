<?php
class JobLocationsController extends AppController {
	var $name = 'JobLocations';
	var $components = array('IndexForm', 'Location');
	
	function admin_index() {
		$this->IndexForm->processData(array('blankDelete' => array('state')));
		$this->Location->setFormElements();
	}
}