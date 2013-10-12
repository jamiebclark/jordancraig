<?php
$this->extend('default');
?>
<ul>
	<li><?php echo $this->Html->link('Job Listings', array('controller' => 'jobs', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Job Locations', array('controller' => 'job_locations', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('Job Categories', array('controller' => 'job_categories', 'action' => 'index')); ?></li>
</ul>
<?php echo $this->fetch('content'); ?>
	