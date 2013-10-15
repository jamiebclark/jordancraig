<?php
class JobApplicant extends AppModel {
	public $name = 'JobApplicant';
	public $hasMany = array('JobApplication');
	
	public $validate = array(
		'first_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your first name',
		),
		'last_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your last name',
		),
		'email' => array(
			'rule' => 'email',
			'message' => 'Please enter a valid email address',
		),
		'phone' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a contact phone number',
		),
		'addline1' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter an address line',
		),
		'city' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a city',
		),
		'state' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a state',
		),
		'zip' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a valid zip code',
		),
		'country' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a country',
		),
	);
}