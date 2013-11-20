<?php
require_once "git_hook.php";
$GitHook = new GitHook();

//If you want to log your progress, set a log file:
$GitHook->logFile = 'log.txt';

/**
 * Format your repository request using 
 * 	GitName => array(
 *		- Branch 1 => Branch 1 Location
 *		- Branch 2 => Branch 2 Location
 *	)
 **/
 
$GitHook->fetch(array(
	'jordancraig' => array(
		'development' => '~/public_html/jordancraig_development/',
		'production' => '~/public_html/jordancraig/',
	)
));

