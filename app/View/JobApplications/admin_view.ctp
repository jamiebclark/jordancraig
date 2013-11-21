<?php
$jobLink = $this->Html->link($jobApplication['Job']['title'], array(
	'controller' => 'jobs', 'action' => 'view', $jobApplication['Job']['id']
));
$applicantInfo = array(
	'Name' => $this->JobApplication->name($jobApplication['JobApplicant']),
	'Address' => $this->JobApplication->address($jobApplication['JobApplicant']),
	'Phone' => $jobApplication['JobApplicant']['phone'],
	'Cell' => $jobApplication['JobApplicant']['cell'],
	'Email' => $this->Text->autoLinkEmails($jobApplication['JobApplicant']['email']),
);

$applicationInfo = array(
	'Submitted' => $this->Time->niceShort($jobApplication['JobApplication']['created']),
	'Job' => $jobLink,
	'Location' => $jobApplication['Job']['JobLocation']['title'],
	'Category' => $jobApplication['Job']['JobCategory']['title'],
	'Resume File' => $this->JobApplication->downloadLink($jobApplication['JobApplication']),
);
?>

<h2>Job Application</h2>
<h3>For: <?php echo $jobLink; ?></h3>
<h3>Location: <?php echo $jobApplication['Job']['JobLocation']['title']; ?></h3>
<h3>Category: <?php echo $jobApplication['Job']['JobCategory']['title']; ?></h3>

<ul class="actions actions-menu">
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
	<li><?php echo $this->JobApplication->downloadLink($jobApplication['JobApplication']); ?></li>
</ul>
<h3>Applicant</h3>
<?php echo $this->JordanCraig->dlList($applicantInfo, array('class' => 'job-view')); ?>
<h3>Application</h3>
<?php echo $this->JordanCraig->dlList($applicationInfo, array('class' => 'job-view')); ?>