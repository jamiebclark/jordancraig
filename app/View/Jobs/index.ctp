<h1>Job Listings</h1>
<?php 
//Display if no jobs are found:
if (empty($jobs)): ?>
	<div class="lead">
	<?php if ($hasFilter): ?>
		<h3>No jobs found using that criteria</h3>
		<p>Consider broadening your search</p>
	<?php else: ?>
		<h3>No jobs listed at this time</h3>
		<p>Be sure to check back soon for updates!</p>
	<?php endif; ?>
	</div>
<?php 
//Jobs table
else: ?>
	<?php echo $this->element('jobs/paginate_nav'); ?>
	<table>
	<tr>
		<th><?php echo $this->Paginator->sort('Job.title', 'Job Title'); ?></th>
		<th><?php echo $this->Paginator->sort('JobCategory.title', 'Job Category'); ?></th>

	</tr>
	<?php foreach ($jobs as $job): ?>
		<tr>
			<td><?php echo $this->Html->link($job['Job']['title'], array('action' => 'view', $job['Job']['id'])); ?></td>
			<td><?php echo $job['JobCategory']['title']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->element('jobs/paginate_nav'); ?>
<?php endif; ?>

<?php 
//Filter form
echo $this->Form->create(null); ?>
	<fieldset>
		<legend>Filter jobs</legend>
		<?php
		echo $this->Form->input('Filter.keyword', array(
			'type' => 'text',
			'label' => 'Keyword',
		));
		echo $this->Form->input('Job.job_category_id', array(
			'type' => 'select',
			'multiple' => true,
			'options' => $jobCategories,
			'size' => 4,
		));
		echo $this->Form->button('Search', array('type' => 'submit'));
		?>
	</fieldset>
<?php echo $this->Form->end(); ?>		
	