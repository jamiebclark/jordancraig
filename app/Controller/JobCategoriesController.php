<?php
class JobCategoriesController extends AppController {
	var $name = 'JobCategories';
	var $components = array('IndexForm');

	function admin_index() {
		$this->IndexForm->processData(array('blankDelete' => array('title')));
	}
}