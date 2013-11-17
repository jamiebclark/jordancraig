<?php

class JobRegionsController extends AppController {
	public $name = 'JobRegions';
	public $components = array('IndexForm');
	
	function admin_index() {
		$this->IndexForm->processData(array('blankDelete' => array('title')));
	}
}