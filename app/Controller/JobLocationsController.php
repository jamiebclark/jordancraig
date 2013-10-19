<?php
class JobLocationsController extends AppController {
	var $name = 'JobLocations';
	var $components = array('IndexForm', 'Location');
	
	function admin_index() {
		$this->IndexForm->processData(array('blankDelete' => array('city', 'state')));
		$this->Location->setFormElements();
	}
}