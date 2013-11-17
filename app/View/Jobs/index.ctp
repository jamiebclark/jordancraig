<style type="text/css">
form.job-filter {
	width: auto;
	float: none;
}
</style>
 <?php echo $this->Html->image("media.jpg"); ?>
<h2>Job Listings</h2>
<p style="margin-right:0;">Here are our current job openings. Please click on the job title for more information, and apply from that page if you are interested.</p>
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
	<table class="table-index">
	<tr>
		<th class="title"><?php echo $this->Paginator->sort('Job.title', 'Title'); ?></th>
		<th class="category"><?php echo $this->Paginator->sort('JobCategory.title', 'Category'); ?></th>
		<th class="location"><?php echo $this->Paginator->sort('JobLocation.title', 'Location'); ?></th>
		<th>Overview</th>
	</tr>
	<?php foreach ($jobs as $job): 
		$url = array('action' => 'view', $job['Job']['id']); 
		?>
		<tr>
			<td><?php echo $this->Html->link($job['Job']['title'], $url); ?></td>
			<td><?php echo $job['JobCategory']['title']; ?></td>
			<td><?php echo $job['JobLocation']['title']; ?></td>
			<td><?php
				if (!empty($job['Job']['overview'])) {
					echo $this->Text->truncate($job['Job']['overview']) . ' ';
				}
				echo $this->Html->link('Read More', $url);
			?></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->element('jobs/paginate_nav'); ?>
<?php endif; ?>

<?php 
//Filter form
if ($showFilter):
	echo $this->Form->create(null, array('class' => 'job-filter')); ?>
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
				'label' => 'Category',
			));
			echo $this->Form->input('Job.job_location_id', array(
				'type' => 'select',
				'multiple' => true,
				'options' => $jobLocations,
				'size' => 4,
				'label' => 'Location',
			));

			echo $this->Form->button('Search', array('type' => 'submit'));
			?>
		</fieldset>
	<?php
	echo $this->Form->end(); 
endif;
?>		
	