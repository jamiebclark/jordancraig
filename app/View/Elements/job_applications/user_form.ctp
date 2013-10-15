<h2><?php echo $this->request->data['Job']['title']; ?></h2>
<?php 
echo $this->Form->create(null, array('type' => 'file')); 
//Hidden Fields
echo $this->Form->hidden('id');
echo $this->Form->hidden('Job.title');

//Resume
echo $this->Form->inputs(array(
	'upload' => array(
		'type' => 'file',
		'label' => 'Please upload your resume',
	),
	'legend' => 'Resume',
));

//Contact Info
echo $this->Form->inputs(array(
	'JobApplicant.id',
	'JobApplicant.first_name',
	'JobApplicant.middle_name',
	'JobApplicant.last_name',
	'JobApplicant.email' => array('type' => 'email'),
	'legend' => 'Contact',
));
echo $this->Form->inputs(array(
	'JobApplicant.phone' => array('type' => 'tel'),
	'JobApplicant.cell' => array('type' => 'tel'),
	'legend' => 'Phone',
));
echo $this->Form->inputs(array(
	'JobApplicant.addline1',
	'JobApplicant.addline2',
	'JobApplicant.city',
	'JobApplicant.state',
	'JobApplicant.zip',
	'JobApplicant.country' => array(
		'default' => 'US',
	),
	'legend' => 'Address',
));
echo $this->Form->end('Submit Profile'); ?>