<?php
echo $this->Form->create();
echo $this->Form->inputs(array(
	'id' => array('type' => 'hidden'),
	'city' => array('label' => 'City/Region'),
	'JobLocation.State' => array(
		'type' => 'select',
		'multiple' => true,
		'options' => $states,
		'size' => 20,
		'after' => '<em>Hold <strong>Ctrl</strong> to select multiple states</em>',
	),
	'country',
));
echo $this->Form->end('Update');