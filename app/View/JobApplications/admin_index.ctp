<h1>Job Applications</h1>
<?php
$this->Table->reset();
foreach ($jobApplications as $jobApplication):
	$id = $jobApplication['JobApplication']['id'];			//Save us having to retype this a bunch
	$applicationUrl = array('action' => 'view', $id);		//Link to job application
	$jobUrl = array('controller' => 'jobs', 'action' => 'view', $jobApplication['Job']['id']);
	
	$actions = '<ul class="actions">	
		<li>' . $this->Html->link('Edit', array('action' => 'edit', $id)) . '</li>
		<li>' . $this->Html->link('Delete', array('action' => 'delete', $id), null, 'Delete this application?') . '</li>
	</ul>';
	
	$this->Table->cells(array(
		array(
			$this->Html->link($this->JobApplication->name($jobApplication['JobApplicant']), array('action' => 'view', $id)),
			'Name', 'JobApplicant.last_name',
		), array(
			$this->Html->link($jobApplication['Job']['title'], $jobUrl, array('class' => 'secondary')),
			'Job', 'Job.title'
		),
		array($this->Time->niceShort($jobApplication['JobApplication']['created']), 'Date', 'created'), 
		array($this->JobApplication->downloadLink($jobApplication['JobApplication']), 'Resume'), 
		array($actions, 'Actions')
	), true);
endforeach;

//Output Table
echo $this->Table->output(array(
	'class' => 'table-index',
	'paginate' => true,
	'empty' => '<p class="table-message">No job applications have been submitted at this time.</p>',
));