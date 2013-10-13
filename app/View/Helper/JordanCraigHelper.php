<?php
class JordanCraigHelper extends AppHelper {
	public $name = 'JordanCraig';

	function beforeRender($options) {
		$this->Html->css('webdev', null, array('inline' => false));
		return parent::beforeRender($options);
	}
}