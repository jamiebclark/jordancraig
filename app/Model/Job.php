<?php
class Job extends AppModel {	
	public $name = "Job";
	public $hasMany = array('JobApplication');
	public $belongsTo = array( "JobCategory", "JobLocation");
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Please give the job a title',
		)
	);
}