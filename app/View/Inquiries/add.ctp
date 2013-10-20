<?php
$this->layout = 'inquiry_nav';

echo $this->Form->create();
echo $this->Form->hidden('id');
echo $this->Form->hidden('is_wholesale');

if ($isWholesale) {
	echo $this->Form->inputs(array(
		'store_name',
		'store_address',
		'website' => array(
			'label' => 'Web Address',
		),
		'name' => array('label' => 'Contact Name'),
		'email' => array('label' => 'E-mail'),
		'phone',
		'message',
		
		'legend' => 'Wholesale Inquiries',
	));
} else {
	echo $this->Form->inputs(array(
		'name',
		'email' => array('label' => 'E-mail'),
		'phone',
		'message',
		
		'legend' => 'General Inquiry',
	));		
}

echo $this->Form->end('Send');