<?php
class Job extends AppModel {	
	var $name = "Job";
	var $hasMany = array('JobApplication');
	var $belongsTo = array( "JobCategory", "JobLocation");
}