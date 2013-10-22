<h1>Jobs</h1>
<ul class="actions actions-menu">
	<li><?php echo $this->Html->link('Add a new job listing', array('action' => 'add')); ?></li>
	<li><?php echo $this->Html->link('View public page', array('admin' => false, 'action' => 'index')); ?></li>
</ul>
<?php

$this->Table->reset();
foreach ($jobs as $job) {
	$class = '';
	if (empty($job['Job']['active'])) {
		$class = 'inactive';
	}
	$actions = '<ul class="actions">
		<li>' . $this->Html->link('View',  array('action' => 'view', $job['Job']['id'])) . '</li>
		<li>' . $this->Html->link('Edit',  array('action' => 'edit', $job['Job']['id'])) . '</li>
		<li>' . $this->Html->link(
			'Delete',  
			array('action' => 'delete', $job['Job']['id']),
			null,
			'Are you sure you want to delete this job listing?'
		) . '</li>
	</ul>';

	$this->Table->cells(array(
		array($this->Html->link($job['Job']['title'], array('action' => 'view', $job['Job']['id'])), 'Title', 'title'),
		array($job['JobCategory']['title'], 'Category', 'JobCategory.title'),
		array($job['JobLocation']['title'], 'Location', 'JobLocation.title'),
		array($actions, 'Actions'),
	), compact('class'));
}

echo $this->Table->output(array(
	'paginate' => true,		//Include page numbers
	'class' => 'table-index',
	'empty' => 'You haven\'t added any jobs yet',
));