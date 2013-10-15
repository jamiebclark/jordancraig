<?php
/**
 * IndexForm Component
 * Handles updating a model by loading all values into the index view, as opposed to separate view, add, edit, delete, etc.
 * This should only be used for smaller models with less than 50-100 rows
 **/
App::uses('Component', 'Controller/Component');
class IndexFormComponent extends Component {
	var $name = 'IndexForm';
	var $controller;
	var $settings = array();
	var $components = array('Session');
	
	public function initialize(Controller $controller) {
		$this->controller = $controller;
		return parent::initialize($controller);
	}
	
	public function processData($options = array()) {
		$options = array_merge(array(
			'blankDelete' => array(),
		), $options);
		
		$totalRows = 0;			//How many rows should be displayed
		
		$alias = Inflector::classify($this->controller->params['controller']);
		$humanPlural = Inflector::humanize($this->controller->params['controller']);
		$human = Inflector::singularize($humanPlural);
		
		$Model = $this->controller->{$alias};
		
		$data = array();
		if (!empty($this->controller->request->data)) {
			$data =& $this->controller->request->data;
		}
	
		if (!empty($data)) {
			//Checks if actual Update button was pressed
			if (isset($data['update'])) {
				//Filters out blank values
				foreach ($data[$alias] as $key => $row) {
					if (!empty($options['blankDelete'])) {
						foreach ($options['blankDelete'] as $field) {
							if (empty($row[$field])) {
								if (!empty($row['id'])) {
									$data['Filter']['delete'][] = $row['id'];
								}
								unset($data[$alias][$key]);
								break;
							}
						}
					}
				}
				
				$data[$alias] = array_values($data[$alias]);	//Re-indexes array in case some were deleted
				if ($Model->saveAll($data[$alias])) {
					$msg = 'Successfully updated ' . $human;
					$class = 'alert-success';
					$redirect = array('action' => 'index');	//Redirects to the same action just to get rid of POST data if user refreshes the page
					if (!empty($data['Filter']['delete'])) {
						$Model->deleteAll(array("$alias.id" => $data['Filter']['delete']));
						$msg .= ' Removed ' . count($data['Filter']['delete']) . ' ' . $humanPlural;
					}
				} else {
					$msg = 'There was an error saving this ' . $human;
					$class = 'alert-error';
					$redirect = false;
				}
				
				
				$this->Session->setFlash($msg);
				if ($redirect) {
					$this->controller->redirect($redirect);
				}
			}
		} else {
			$result = $Model->find('all');
			foreach ($result as $row) {
				$data[$alias][] = $row[$alias];
			}
			$totalRows++;
		}
		if (!empty($data[$alias])) {
			$totalRows += count($data[$alias]);
		}
		if (!empty($data['Filter']['add_rows'])) {
			$totalRows += $data['Filter']['add_rows'];
		}
		$this->controller->set(compact('totalRows'));	
		$this->controller->request->data = $data;
	}
}