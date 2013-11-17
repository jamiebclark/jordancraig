<?php
$baseUrl = array('action' => 'index', 'admin' => true);
$nav = array(
	array('Job Listings', array('controller' => 'jobs') + $baseUrl),
	array('Applications', array('controller' => 'job_applications') + $baseUrl),
	array('Job Locations', array('controller' => 'job_locations') + $baseUrl),
	array('Job Regions', array('controller' => 'job_regions') + $baseUrl),
	array('Job Categories', array('controller' => 'job_categories') + $baseUrl),
	array('Inquiries', array('controller' => 'inquiries') + $baseUrl),
);
echo $this->JordanCraig->navList($nav, array('class' => 'top-menu'));
