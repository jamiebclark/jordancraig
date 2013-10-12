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
	<?php	echo $this->Html->charset()."\n";
			echo $this->Html->css('styles');
			echo $this->Html->script(array('tinynav.min.js?v=1.11', 'resize'));?>
	<title><?php echo $title_for_layout;?></title>
	<?php
		echo $this->Html->meta('icon', '/icon.ico');
		//echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		//echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
