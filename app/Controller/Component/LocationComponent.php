<?php
/**
 * Location Component
 * Used to set form elements pertaining to geographic location
 *
 **/
 
App::uses('Location', 'Lib');
class LocationComponent extends Component {
	public $name = 'Location';
	private $controller;
	
	public function startup(Controller $controller, $options = array()) {
		$Location = new Location();
		$this->states = $Location->states;
		$this->countries = $Location->countries;
		
		$this->controller = $controller;
		return parent::startup($controller, $options);
	}
	
	public function setFormElements() {
		$this->controller->set('states', $this->states);
		$this->controller->set('countries', $this->countries);
	}

}