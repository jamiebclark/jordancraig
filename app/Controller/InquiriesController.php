<?php
App::uses('Validation', 'Utility');
App::uses('CakeEmail', 'Network/Email');

class InquiriesController extends AppController {
	public $name = 'Inquiries';
	public $paginate = array(
		'group' => 'Inquiry.id'
	);

	public function add($isWholesale = 1) {
		$this->FormData->addData(array(
			'default' => array('Inquiry' => array('is_wholesale' => $isWholesale))
		));	
		$this->request->params['pass'][0] = $isWholesale;
		$this->set(compact('isWholesale'));
		$this->set('title_for_layout', $isWholesale ? 'Contact' : 'Contact');
	}
	
	public function success() {
	
	}

	public function index() {
		$this->redirect(array('action' => 'add'));
	}	

	public function view($id = null) {
		$this->redirect(array('action' => 'success'));
	}
	
	public function admin_index() {
		$inquiries = $this->paginate();
		$this->set(compact('inquiries'));
	}
	
	public function admin_view($id = null) {
		$this->FormData->findModel($id);
	}
	
	public function admin_delete($id = null) {
		$this->FormData->deleteData($id);
	}
	
	public function _setFormElements() {
		$states = $this->Inquiry->State->selectList();
		$this->set(compact('states'));
	}
}	