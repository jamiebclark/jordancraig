<?php
class GeoIpComponent extends Component {
	public $name = 'GeoIp';
	
	private $controller;
	public $settings;
	
	private $vendorDir;		//Directory where vendor files are stored
	private $gi;			//GeoIp Object
	
	public function __construct(ComponentCollection $collection, $settings = array()) {
		$default = array(
			'allow' => array(),
			'block' => array(),
			'redirect' => array('controller' => 'pages', 'action' => 'display', 'block'),
		);
		$settings = array_merge($default, (array) $settings);
		
		//Loads GeoIP Vendor files
		$this->vendorDir = APP . 'Vendor' . DS . 'geoip' . DS;
		$this->openGeoIp();
		
		parent::__construct($collection, $settings);
	}
	
	public function __destruct() {
		$this->closeGeoIp();
	}
	
	public function initialize(Controller $controller) {
		$this->controller = $controller;
		$this->redirectCheck();
	}
	
	public function redirectCheck() {
		$ip = $this->getIp();
		$cc = $this->getCountryCode($ip);
		
		$pass = true;
		if ($ip == '0.0.0.0') {
			$pass = false;
		} else if (!empty($this->settings['allow'])) {
			$pass = is_array($this->settings['allow']) ? in_array($cc, $this->settings['allow']) : $cc == $this->settings['allow'];
		} else if (!empty($this->settings['block'])) {
			$pass = is_array($this->settings['block']) ? !in_array($cc, $this->settings['block']) : $cc != $this->settings['block'];
		}
		
		if (!$pass) {
			$this->controller->redirect($this->settings['redirect']);
		}
	}
	
	public function getIp() {
		if (getenv("HTTP_CLIENT_IP"))
			$ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR"))
			$ip = getenv("REMOTE_ADDR");
		else
			$ip = "0.0.0.0";
		return $ip;
	}

	private function getCountryCode($ip) {
		return geoip_country_code_by_addr($this->gi, $ip);
	}
	
	private function openGeoIp() {
		require_once($this->vendorDir . 'geoip.inc');
		$this->gi = geoip_open($this->vendorDir . 'geoip.dat', GEOIP_STANDARD);
	}
	
	private function closeGeoIp() {
		geoip_close($this->gi);
	}
}