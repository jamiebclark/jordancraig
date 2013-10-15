<h3>Application View</h3>
<ul class="actions action-menu">
	<li><?php echo $this->Html->link(
		'Edit Application', 
		array('action' => 'edit', $jobApplication['JobApplication']['id'])
	); ?></li>
	<li><?php echo $this->Html->link(
		'Delete Application', 
		array('action' => 'delete', $jobApplication['JobApplication']['id']),
		null,
		'Are you sure you want to delete this application?'
	); ?></li>
</ul>