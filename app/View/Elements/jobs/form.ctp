<?php
$adding = !$this->Html->value('Job.id');	//Is this form adding or editing and existing value?
$bulletNote = '<span class="input-note">Bulleted list. Hit ENTER to start a new bullet point</span>';
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
	'responsibilities' => array(
		'between' => $bulletNote,
	),
	'qualifications' => array(
		'between' => $bulletNote,
	),
	'active' => array(
		'after' => ' <span class="input-note">Is this job listing ready to be displayed publicly?</span>',
	),
	
	'legend' => $legend,
));
echo $this->Form->end("Update");