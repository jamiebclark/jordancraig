<h1>Job Applications</h1>
<?php if (empty($jobApplications)): ?>
	<p><em>No job applications submitted yet</em></p>
<?php else: ?>
	<?php echo $this->element('paginate_nav'); ?>
	<table class="table-index">
	<tr>
		<th>Name</th>
		<th>Job</th>
		<th>Date</th>
		<th>Resume</th>
		<th>Actions</th>
	</tr>
	<?php foreach ($jobApplications as $jobApplication): ?>
		<tr>
			<td><?php
				echo $this->Html->link(
					$this->JobApplication->name($jobApplication['JobApplicant']),
					array('action' => 'view', $jobApplication['JobApplication']['id'])
				);
				?>
			</td>
			<td><?php
				echo $this->Html->link(
					$jobApplication['Job']['title'],
					array('controller' => 'jobs', 'action' => 'view', $jobApplication['Job']['id']),
					array('class' => 'secondary')
				);
				?>
			</td>
			<td><?php
				echo $this->Time->niceShort($jobApplication['JobApplication']['created']);
			?></td>
			<td><?php
				echo $this->JobApplication->downloadLink($jobApplication['JobApplication']);
			?></td>
			<td><ul class="actions">	
				<li><?php echo $this->Html->link('Edit', array('action' => 'edit', $jobApplication['JobApplication']['id'])); ?></li>
				<li><?php echo $this->Html->link(
					'Delete', 
					array('action' => 'delete', $jobApplication['JobApplication']['id']),
					null,
					'Delete this application?'
				); ?></li>
			</ul></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->element('paginate_nav'); ?>
<?php endif; ?>
