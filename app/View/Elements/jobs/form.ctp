<?php
$adding = !$this->Html->value('Job.id');	//Is this form adding or editing and existing value?
if ($adding) {
	$legend = 'New Job Listing';
	$title = 'Add a job';
} else {
	$legend = 'Update Job Listing';
	$title = 'Edit job';
}

echo $this->Form->create();
?>

<h2><?php echo $title; ?></h2>
<?php
echo $this->Form->hidden('id');
echo $this->Form->inputs(array(
	'title',
	'job_category_id',
	'job_location_id', 
	'overview',
	'responsibilities',
	'qualifications',
	'active' => array(
		'after' => ' <span class="append">Is this job listing ready to be displayed publicly?</span>',
	),
	
	'legend' => $legend,
));
echo $this->Form->end("Update");