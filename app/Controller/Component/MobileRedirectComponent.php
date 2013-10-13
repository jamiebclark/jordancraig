<?php
require_once(APP . 'Vendor' . DS . 'mobile_device_detect.php');

class MobileRedirectComponent extends Component {
	public $name = 'MobileRedirect';
	public $settings = array();
	public $device;
	
	private $controller;
	private $mobileDevices = array('iphone', 'android', 'opera', 'blackberry', 'palm', 'windows');
	
	public function __construct(ComponentCollection $collection, $settings = array()) {
		$default = array(
			'mobileRedirect' => null,
			'desktopRedirect' => null,
		);
		
		//Cycles through all the mobile devices and by default checks them as "true"
		foreach ($this->mobileDevices as $device) {
			$default[$device] = true;
		}
		$settings = array_merge($default, (array) $settings);
		
		$this->setDevice();
		parent::__construct($collection, $settings);
	}
	
	public function initialize(Controller $controller) {
		$this->controller = $controller;
		$this->detectRedirect();
		parent::initialize($controller);
	}
	
	/**
	 * Detects if user is using a mobile device
	 * Depending on the result, redirect to mobileRedirect or desktopRedirect if either values have been set
	 **/
	private function detectRedirect() {
		$redirectKey = $this->detect() ? 'mobileRedirect' : 'desktopRedirect';
		if (!empty($this->settings[$redirectKey])) {
			$this->controller->redirect($this->settings[$redirectKey]);			
		}
	}
	
	//Stores specific mobile device
	private function setDevice($device = null) {
		if (empty($device)) {
			$device = $this->getDevice();
		}
		$this->device = $device;
	}
	
	//Finds the specific mobile device being used
	private function getDevice() {
		if (!empty($this->device)) {
			return $this->device;
		} else {
			$base = array_combine($this->mobileDevices, array_fill(0, count($this->mobileDevices), false));
			foreach ($this->mobileDevices as $device) {
				if ($this->detect(array($device => true) + $base)) {
					$this->setDevice($device);
					return $device;
				}
			}
			return null;
		}
	}
	
	//Use the mobile_device_detect function
	private function detect($options = array()) {
		$options = array_merge($this->settings, $options);
		return mobile_device_detect(
			$options['iphone'], 
			$options['android'],
			$options['opera'],
			$options['blackberry'],
			$options['palm'],
			$options['windows'],
			//Skips redirect in-function
			false,		
			false
		);
	}
}