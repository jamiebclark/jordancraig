<h1>Jobs</h1>
<ul class="actions actions-menu">
	<li><?php echo $this->Html->link('Add a new job listing', array('action' => 'add')); ?></li>
	<li><?php echo $this->Html->link('View public page', array('admin' => false, 'action' => 'index')); ?></li>
</ul>
<?php echo $this->element('jobs/paginate_nav'); ?>
<table class="table-index">
<tr>
	<th>Job Title</th>
	<th>Category</th>
	<th>Location</th>
	<th>Actions</th>
</tr>
<?php foreach ($jobs as $job): 
	$class = null;
	if (empty($job['Job']['active'])) {
		$class = 'inactive';
	}
	echo $this->Html->tag('tr', null, compact('class'));
	?>
		<td><?php echo $this->Html->link($job['Job']['title'], array('action' => 'view', $job['Job']['id'])); ?></td>
		<td><?php echo $job['JobCategory']['title']; ?></td>
		<td><?php echo $job['JobLocation']['title']; ?></td>
		<td>
			<ul class="actions">
				<li><?php echo $this->Html->link('View',  array('action' => 'view', $job['Job']['id'])); ?></li>
				<li><?php echo $this->Html->link('Edit',  array('action' => 'edit', $job['Job']['id'])); ?></li>
				<li><?php echo $this->Html->link(
					'Delete',  
					array('action' => 'delete', $job['Job']['id']),
					null,
					'Are you sure you want to delete this job listing?'
				); ?></li>
			</ul>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('jobs/paginate_nav'); ?>