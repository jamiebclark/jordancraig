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
		$default = array(
			'JobLocation' => array(
				'country' => 'US',
			)
		);
		$this->FormData->addData(compact('default'));	
	}
	
	function admin_delete($id = null) {
		$this->FormData->deleteData($id);
	}
	
	function _setFormElements() {
		$states = $this->JobLocation->State->selectList(array(
			'optGroup' => 'Country.title',
			'blank' => false,
		));
		$countries = $this->JobLocation->Country->find('list');
		$this->set(compact('states', 'countries'));
	}
}