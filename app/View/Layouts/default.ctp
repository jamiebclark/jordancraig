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
			<a href="index.html" class="logo"><img src="img/logo.png"  width="190" alt="Jordan Craig"></a>
			<ul class="social">
			<li class="first"><a href="http://instagram.com/jordancraigdenim"><img src="img/instagram.png" alt="Instagram"></a></li>
			<li><a href="http://www.jordancraig.net/updates/"><img src="img/wp.png"></a></li>
			<li><a href="https://www.facebook.com/jordancraigdenimbrand"><img src="img/facebook.png"></a></li>
			<li class="last"><a href="https://twitter.com/jcdenimbrand"><img src="img/twitter.png"></a></li>
					</ul>
					<ul id="nav" class="nav">
						<li class="first"><?php echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'display', 'home'));?></li>
						<li><?php echo $this->Html->link('About', array('controller' => 'pages', 'action' => 'display', 'about'));?></li>
						<li class="selected"><?php echo $this->Html->link('Legacy Edition', array('controller' => 'pages', 'action' => 'display', 'legacy'));?></li>
						<li><?php echo $this->Html->link('Lookbook', array('controller' => 'pages', 'action' => 'display', 'lookbook'));?></li>
						<li><?php echo $this->Html->link('Campaign', array('controller' => 'pages', 'action' => 'display', 'campaign'));?></li>
						<li><?php echo $this->Html->link('Media', array('controller' => 'pages', 'action' => 'display', 'media'));?></li>
						<li class="last"><?php echo $this->Html->link('Contact', array('controller' => 'pages', 'action' => 'display', 'contact'));?></li>
					</ul><!-- /end .nav -->
				</div><!-- /end .mast -->
				
	<?php echo $this->Session->flash();?>
	<?php echo $this->fetch('content'); ?>
	
<div class="footer">
					<p>&#169; Brian Brothers Inc. 2013. All Rights Reserved.</p>
					
				</div><!-- /end .footer -->

			</div><!-- /end .inner -->
		</div><!-- /end #page -->
	<?php echo $this->element('sql_dump');?>
</body>
</html>
