<?php
class JobLocationsController extends AppController {
	public $name = 'JobLocations';
	public $components = array(
		'IndexForm', 
		//'Location'
	);
	
	public $helpers = array(
		'Layout.Layout',
		'Layout.ModelView',
	);
	
	function admin_index() {
		$jobLocations = $this->paginate();
		$this->set(compact('jobLocations'));
	}
	
	function admin_view($id = null) {
		//We'll skip having an individual view for now and just redirect back to the index
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_edit($id = null) {
		$this->FormData->editData($id);
	}
	
	function admin_add() {
		$this->FormData->addData();	
	}
	
	function admin_delete($id = null) {
		$this->FormData->deleteData($id);
	}
	
	function _setFormElements() {
		$states = $this->JobLocation->State->find('list');
		$countries = $this->JobLocation->Country->find('list');
		$this->set(compact('states', 'countries'));
	}
}