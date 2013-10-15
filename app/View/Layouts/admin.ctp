<?php
$this->extend('default');

$nav = array(
	'Job Listings' => array('controller' => 'jobs', 'action' => 'index'),
	'Applications' => array('controller' => 'job_applications', 'action' => 'index'),
	'Job Locations' => array('controller' => 'job_locations', 'action' => 'index'),
	'Job Categories' => array('controller' => 'job_categories', 'action' => 'index'),
);
	
?>
<ul class="top-menu">
	<?php foreach ($nav as $label => $url): ?>
		<li><?php echo $this->Html->link($label, $url); ?></li>
	<?php endforeach; ?>
</ul>
<?php echo $this->fetch('content'); ?>
	