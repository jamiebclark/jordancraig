<?php
class JobLocationsState extends AppModel {
	public $name = 'JobLocationsState';
	public $hasMany = array('Location.State', 'JobLocation');	
}