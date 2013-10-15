<?php
class JobApplicationsController extends AppController {
	public $name = 'JobApplications';
	public $helpers = array('JobApplication');
	
	public function add($jobId = null) {
		if (empty($jobId)) {
			$this->Session->setFlash('You must select a job first', 'default', array('class' => 'alert-warning'));
			$this->redirect($this->referer());
		}
		$default = array('JobApplication' => array('job_id' => $jobId));
		$default += $this->JobApplication->Job->findById($jobId);
		$this->FormData->addData(compact('default'));
	}
	
	public function edit($id = null) {
		$this->FormData->editData($id);
	}
	
	public function view($id = null) {
		$this->FormData->findModel($id);
	}
	
	public function admin_index() {
		$jobApplications = $this->paginate();
		$this->set(compact('jobApplications'));
	}
	
	public function admin_view($id = null) {
		$this->FormData->findModel($id);
	}
	
	public function admin_edit($id = null) {
		$this->FormData->editData($id);
	}
	
	public function admin_delete($id = null) {
		$this->FormData->deleteData($id);
	}
	
	public function _setFindModelOptions($options) {
		$options['contain'] = array('Job');
		return $options;
	}
	
	//Sets variables to be used in the forms
	public function _setFormElements() {
		$states = array(
			'' => ' --- Select a State --- ',
			'AL'=>"Alabama",  
			'AK'=>"Alaska",  
			'AZ'=>"Arizona",  
			'AR'=>"Arkansas",  
			'CA'=>"California",  
			'CO'=>"Colorado",  
			'CT'=>"Connecticut",  
			'DE'=>"Delaware",  
			'DC'=>"District Of Columbia",  
			'FL'=>"Florida",  
			'GA'=>"Georgia",  
			'HI'=>"Hawaii",  
			'ID'=>"Idaho",  
			'IL'=>"Illinois",  
			'IN'=>"Indiana",  
			'IA'=>"Iowa",  
			'KS'=>"Kansas",  
			'KY'=>"Kentucky",  
			'LA'=>"Louisiana",  
			'ME'=>"Maine",  
			'MD'=>"Maryland",  
			'MA'=>"Massachusetts",  
			'MI'=>"Michigan",  
			'MN'=>"Minnesota",  
			'MS'=>"Mississippi",  
			'MO'=>"Missouri",  
			'MT'=>"Montana",
			'NE'=>"Nebraska",
			'NV'=>"Nevada",
			'NH'=>"New Hampshire",
			'NJ'=>"New Jersey",
			'NM'=>"New Mexico",
			'NY'=>"New York",
			'NC'=>"North Carolina",
			'ND'=>"North Dakota",
			'OH'=>"Ohio",  
			'OK'=>"Oklahoma",  
			'OR'=>"Oregon",  
			'PA'=>"Pennsylvania",  
			'RI'=>"Rhode Island",  
			'SC'=>"South Carolina",  
			'SD'=>"South Dakota",
			'TN'=>"Tennessee",  
			'TX'=>"Texas",  
			'UT'=>"Utah",  
			'VT'=>"Vermont",  
			'VA'=>"Virginia",  
			'WA'=>"Washington",  
			'WV'=>"West Virginia",  
			'WI'=>"Wisconsin",  
			'WY'=>"Wyoming"
		);
		$this->set(compact('states'));
	}	
}