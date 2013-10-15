<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Social Media Navigation Links
 * Store the Social Media navigation links here.
 * Use the website name as the key, and then pass an array with the image and url as the two values
 **/
$socialNav = array(
	'Instagram' => array('instagram.png', 'http://instagram.com/jordancraigdenim'),
	'Blog' => array('wp.png', 'http://www.jordancraig.net/updates/'),
	'Facebook' => array('facebook.png', 'https://www.facebook.com/jordancraigdenimbrand'),
	'Twitter' => array('twitter.png', 'https://twitter.com/jcdenimbrand'),
);

/**
 * Page Navigation Links
 * Store the page navigation links here. Use the link text as the key, and the URL as the value
 **/
$pageUrl = array('controller' => 'pages', 'action' => 'display', 'admin' => false);	//Prevents us from having to re-type
$pageNav = array(
	'Home' => $pageUrl + array('home'),
	'About' => $pageUrl + array('about'),
	'Legacy Edition' => $pageUrl + array('legacy'),
	'Lookbook' => $pageUrl + array('lookbook'),
	'Campaign' => $pageUrl + array('campaign'),
	'Media' => $pageUrl + array('media'),
	'Contact' => array('controller' => 'contacts', 'action' => 'index', 'admin' => false),
);
?>
<?php echo $this->Html->docType('html4-trans')."\n";?>
<html>
<head>
<?php
	echo $this->Html->charset()."\n";
	echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'))."\n";?>
<title><?php echo $title_for_layout;?></title>
<?php
	echo $this->Html->meta('icon', '/icon.ico');
	echo $this->Html->script(array('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js','tinynav.min.js?v=1.11', 'resize'));
	echo $this->Html->css(array('layout','styles'));?>
	<!--[if IE 7]>
	<?php echo $this->Html->css('ie')."\n";?>
	<![endif]-->
	<?php echo $this->Html->css('max320', array('id' => 'size-stylesheet'))."\n";?>
	<script type="text/javascript">$(function () {$("#nav").tinyNav();});</script>
<?php
	//echo $this->Html->css('cake.generic');
	//echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');?>
</head>
<body>
<div id="page">
	<div class="inner">
		<div class="mast">
<?php 
	echo $this->Html->link(
		$this->Html->image('logo.png',
			array(
            'width' => 190,
            'alt' => 'Jordan Craig',
            )),
            array('controller' => 'pages', 'action' => 'display', 'home'),
            array('escape' => false, 'class' => 'logo'));
?>
			<ul class="social">
			<?php
				$count = 0;
				$total = count($socialNav);
				foreach ($socialNav as $alt => $info) {
					list($img, $url) = $info;
					$class = null;
					if ($count++ == 0) {
						$class = 'last';
					} else if ($count == $total) {
						$class = 'first';
					}
					echo $this->Html->tag('li', $this->Html->image($img, compact('url', 'alt'), compact('class')))."\n";
				}
			?>
			</ul>
			<ul id="nav" class="nav"><?php
				$count = 0;
				$total = count($pageNav);
				foreach ($pageNav as $title => $url) {
					$class = null;
					if ($count++ == 0) {
						$class = 'first';
					} else if ($count == $total) {
						$class = 'last';
					}
					if ($this->request->params['controller'] == $url['controller'] && $this->request->params['action'] == $url['action']) {
						$class .= ' selected';
					}
					echo $this->Html->tag('li', $this->Html->link($title, $url, compact('title')), compact('class'))."\n";
				}
			?>
			</ul><!-- /end .nav -->
		</div><!-- /end .mast -->
		<div class="section main">
			<?php 
				if ($crumbs = $this->Html->getCrumbs()) {
					echo $this->Html->div(null, $crumbs, array('id' => 'crumbs'));
				}
			?>
			<?php echo $this->Session->flash();?>
			<?php echo $this->fetch('content'); ?>
		</div>	
		<div class="footer">
			<p>&#169; Brian Brothers Inc. 2013. All Rights Reserved.</p>
		</div><!-- /end .footer -->
	</div><!-- /end .inner -->
</div><!-- /end #page -->

<?php 
//todo: remove this before page launch
echo $this->element('sql_dump');
?>

<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script> 
<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("UA-8053370-1");
		pageTracker._trackPageview();
	} catch(err) {}
</script>
</body>
</html>
