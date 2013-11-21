<?php
//Bread Crumbs
$this->Html->addCrumb('Jobs', array('action' => 'index'));
$this->Html->addCrumb($job['Job']['title']);
?>

<h2><?php echo $job['Job']['title']; ?></h2>
<h3 class="job">Location: <?php echo $job['JobLocation']['title']; ?></h3>
<h3 class="job">Posted: <?php echo date('n/j/y', strtotime($job['Job']['created'])); ?></h3>

<ul class="actions actions-menu">
	<li><?php echo $this->Html->link('Edit Job', array('action' => 'edit', $job['Job']['id'])); ?></li>
	<li><?php echo $this->Html->link(
		'Delete Listing', 
		array('action' => 'edit', $job['Job']['id']),
		null,
		'Are you sure you want to delete this job listing?'
	); ?></li>
</ul>
<?php echo $this->Job->listView($job); ?>
