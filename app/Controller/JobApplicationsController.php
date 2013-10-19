<?php
class JobApplicationsController extends AppController {
	public $name = 'JobApplications';
	public $components = array('Location');
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
		$result = $this->FormData->findModel($id);
	}
	
	public function admin_edit($id = null) {
		$this->FormData->editData($id);
	}
	
	public function admin_delete($id = null) {
		$this->FormData->deleteData($id);
	}
	
	public function _setFindModelOptions($options) {
		$options['contain'] = array('Job', 'JobApplicant');
		return $options;
	}
	
	//Sets variables to be used in the forms
	public function _setFormElements() {
		$this->Location->setFormElements();
	}	
}