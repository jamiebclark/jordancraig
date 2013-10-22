<?php
class JobsController extends AppController {
	public $name = 'Jobs';
	public $helpers = array('Job');
	
	function beforeRender() {
		parent::beforeRender();
		
		//Makes sure to change layout of non-admin views to include Inquiry navigation menu
		if (empty($this->request->params['prefix'])) {
			$this->layout = 'inquiry_nav';
		}
	}
	
	function index() {
		//Finds Job Categories
		$jobCategories = $this->Job->JobCategory->find('list');
		$jobCategories = array('' => '(All Categories)') + $jobCategories;	//Adds blank category

		$jobLocations = $this->Job->JobLocation->find('list');
		$jobLocations = array('' => '(All Locations)') + $jobLocations;
		
		$criteria = array();
		$conditions = array('Job.active' => 1);
		if (!empty($this->request->data['Filter']['keyword'])) {
			$keyword = trim($this->request->data['Filter']['keyword']);
			$conditions['Job.title LIKE'] = '%' . $keyword . '%';
			$criteria[] = "Contains \"$keyword\"";
		}
		
		//Filter Results
		$fields = array(
			'Category' => array('job_category_id', $jobCategories),
			'Location' => array('job_location_id', $jobLocations),
		);
		foreach ($fields as $fieldLabel => $fieldVars) {	
			list($field, $fieldResult) = $fieldVars;
			if (!empty($this->request->data['Job'][$field])) {
				foreach ($this->request->data['Job'][$field] as $fieldId) {
					if ($fieldId == '') {	//User has select "All Categories"
						unset($conditions["Job.$field"]);
						break;
					}
					if (!empty($fieldResult[$fieldId])) {
						$criteria[] = "$fieldLabel: {$fieldResult[$fieldId]}";
						$conditions["Job.$field"][] = $fieldId;
					}
				}
			}
		}
		$hasFilter = !empty($criteria);	//Passes to View if the user is filtering the search

		//Only grabs active jobs
		$this->paginate = compact('conditions');
		//Finds this page of jobs
		$jobs = $this->paginate();
		
		
		//Sends variables to View
		$this->set(compact('jobs', 'jobCategories', 'jobLocations', 'hasFilter'));
	}
	
	function view($id = null) {
		$job = $this->Job->find('first', array(
			'conditions' => array('Job.id' => $id)
		));
		$this->set('title_for_layout', $job['Job']['title']);
		
		$this->set(compact('job'));
	}
	
	function admin_index() {
		$jobs = $this->paginate();
		$this->set(compact('jobs'));
	}
	
	function admin_view($id = null) {
		$job = $this->Job->find('first', array(
			'conditions' => array('Job.id' => $id)
		));
		$this->set(compact('job'));	
	}
	
	function admin_add() {
		if (!empty($this->request->data)) {	//Detects information has been submitted
			if ($this->Job->saveAll($this->request->data)) {
				//Successfully saved job information
				$msg = 'Successfully added job';
				$class = 'alert-success';
				$redirect = array('action' => 'view', $this->Job->id);
			} else {
				//Failed saving job information
				$msg = 'There was an error updating job';
				$class = 'alert-error';
				$redirect = null;
			}
			$this->Session->setFlash($msg, 'default', compact('class'));
			if (!empty($redirect)) {
				$this->redirect($redirect);
			}
		} else {
			//If no data has been posted, set default values
			$this->request->data = array('Job' => array('active' => 1));
		}
		
		$this->_setFormElements();
	}
	
	function admin_edit($id = null) {
		if (!empty($this->request->data)) {
			if ($this->Job->saveAll($this->request->data)) {
				$msg = 'Successfully updated job';
				$class = 'alert-success';
				$redirect = array('action' => 'view', $this->Job->id);
			} else {
				$msg = 'There was an error updating job';
				$class = 'alert-error';
				$redirect = null;
			}
			$this->Session->setFlash($msg, 'default', compact('class'));
			if (!empty($redirect)) {
				$this->redirect($redirect);
			}
		} else {
			$this->request->data = $this->Job->read(null, $id);
		}
		$this->_setFormElements();
	}
	
	function admin_delete($id = null) {
		if ($this->Job->delete($id)) {
			//Successfully deleted the job
			$msg = 'Successfully deleted job';
			$class = 'alert-success';
		} else {
			//Failed to delete the job
			$msg = 'There was an error deleting job';
			$class = 'alert-error';
		}
		$this->Session->setFlash($msg, 'default', compact('class'));
		$this->redirect(array('action' => 'index'));
	}
	
	//Sets variable information to be used in dropdown menus in the add and edit forms
	function _setFormElements() {
		$jobCategories = $this->Job->JobCategory->find('list');
		$jobLocations = $this->Job->JobLocation->find('list');
		$this->set(compact('jobCategories', 'jobLocations'));
	}
}