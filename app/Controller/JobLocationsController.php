<?php
class JobLocationsController extends AppController {
	var $name = 'JobLocations';

	var $components = array('IndexForm');
	
	function admin_index() {
		$this->IndexForm->processData(array('blankDelete' => array('city', 'state')));
	}
}