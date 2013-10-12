<?php
//Bread Crumbs
$this->Html->addCrumb('Jobs', array('action' => 'index'));
$this->Html->addCrumb($job['Job']['title']);
?>

<h2><?php echo $job['Job']['title']; ?></h2>
<ul class="actions actions-menu">
	<li><?php echo $this->Html->link('Edit Job', array('action' => 'edit', $job['Job']['id'])); ?></li>
	<li><?php echo $this->Html->link(
		'Delete Listing', 
		array('action' => 'edit', $job['Job']['id']),
		null,
		'Are you sure you want to delete this job listing?'
	); ?></li>
</ul>
<dl>
	<dt>Category</dt>
	<dd><?php echo $job['JobCategory']['title']; ?></dd>
	
	<dt>Overview</dt>
	<dd><?php echo nl2br($job['Job']['overview']); ?></dd>
	
	<dt>Responsibilities</dt>
	<dd><?php echo nl2br($job['Job']['responsibilities']); ?></dd>

	<dt>Qualifications</dt>
	<dd><?php echo nl2br($job['Job']['qualifications']); ?></dd>
	
	<dt>Active</dt>
	<dd><?php 
		if ($job['Job']['active']) {
			echo 'Active';
		} else {
			echo 'Not Active';
		}
	?></dd>
</dl>