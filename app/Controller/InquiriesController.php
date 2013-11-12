<?php
App::uses('Validation', 'Utility');
App::uses('CakeEmail', 'Network/Email');

class InquiriesController extends AppController {
	public $name = 'Inquiries';

	function add($isWholesale = false) {
		$this->FormData->addData(array(
			'default' => array('Inquiry' => array('is_wholesale' => $isWholesale))
		));	
		$this->request->params['pass'][0] = $isWholesale;
		$this->set(compact('isWholesale'));
		$this->set('title_for_layout', $isWholesale ? 'Contact' : 'Contact');
	}
	
	function success() {
	
	}

	function index() {
		$this->redirect(array('action' => 'add'));
	}	

	function view($id = null) {
		$this->redirect(array('action' => 'success'));
	}
	
	function admin_index() {
		$inquiries = $this->paginate();
		$this->set(compact('inquiries'));
	}
	
	function admin_view($id = null) {
		$this->FormData->findModel($id);
	}
	
	function admin_delete($id = null) {
		$this->FormData->deleteData($id);
	}
}	