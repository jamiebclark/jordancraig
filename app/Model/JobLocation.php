<?php
class JobLocation extends AppModel {
	var $name = 'JobLocation';
	var $hasMany = array('Job');
	
	var $actsAs = array(
		'BlankDelete' => array(
			'or' => array('city', 'state'),
		)
	);
}