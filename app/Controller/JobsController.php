<?php
class JobsController extends AppController {
	function index() {
		//Finds Job Categories
		$jobCategories = $this->Job->JobCategory->find('list');
		$jobCategories = array('' => '(All Categories)') + $jobCategories;	//Adds blank category

		$criteria = array();
		$conditions = array('Job.active' => 1);
		if (!empty($this->request->data['Filter']['keyword'])) {
			$keyword = trim($this->request->data['Filter']['keyword']);
			$conditions['Job.title LIKE'] = '%' . $keyword . '%';
			$criteria[] = "Contains \"$keyword\"";
		}
		if (!empty($this->request->data['Job']['job_category_id'])) {
			foreach ($this->request->data['Job']['job_category_id'] as $jobCategoryId) {
				if ($jobCategoryId == '') {	//User has select "All Categories"
					unset($conditions['Job.job_category_id']);
					break;
				}
				if (!empty($jobCategories[$jobCategoryId])) {
					$criteria[] = 'Category: ' . $jobCategories[$jobCategoryId];
					$conditions['Job.job_category_id'][] = $jobCategoryId;
				}
			}
		}
		$hasFilter = !empty($criteria);	//Passes to View if the user is filtering the search

		//Only grabs active jobs
		$this->paginate = compact('conditions');
		//Finds this page of jobs
		$jobs = $this->paginate();
		
		
		//Sends variables to View
		$this->set(compact('jobs', 'jobCategories', 'hasFilter'));
	}
	
	function view($id = null) {
		$job = $this->Job->find('first', array(
			'conditions' => array('Job.id' => $id)
		));
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
		if (!empty($this->request->data)) {
			if ($this->Job->saveAll($this->request->data)) {
				$msg = 'Successfully added job';
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
			$msg = 'Successfully deleted job';
			$class = 'alert-success';
		} else {
			$msg = 'There was an error deleting job';
			$class = 'alert-error';
		}
		$this->Sesstion->setFlash($msg, 'default', compact('class'));
		$this->redirect(array('action' => 'index'));
	}
	
	function _setFormElements() {
		$jobCategories = $this->Job->JobCategory->find('list');
		$this->set(compact('jobCategories'));
	}
}