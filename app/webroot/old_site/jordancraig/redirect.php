<?php
/****
 * .htaccess is setup to check this file first before displaying index.html
 ****/
$originalFile = $_SERVER['DOCUMENT_ROOT'];
$originalFile .= !empty($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : $_SERVER['SCRIPT_URL'];

$scriptFile = $_SERVER['SCRIPT_FILENAME'];

$home = 'index.html';
if ($originalFile == $scriptFile) {
	header('Location: ' . $home);
	$content = '<a href="' . $home . '">Redirecting home</a>';
} else {
	$content = file_get_contents($originalFile);
}

/*********************************
 * Place pre-loading checks here
 *********************************/
//Will redirect if not in correct country
require_once($_SERVER['DOCUMENT_ROOT'] . '/geoip.php');
/********************************
 * End pre-loading checks
 ********************************/
echo $content;
?>