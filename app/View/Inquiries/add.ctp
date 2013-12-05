<?php
echo $this->Html->css(array('forms'));
echo $this->Html->image('contact.jpg', array('alt' => '2013 Fall Winter Campaign')); ?>
<div class="clear"></div>
<h2>Contact</h2>

<?php 
echo $this->Form->create(null, array('class' => 'contact-forms'));

echo $this->element('inquiries/nav');

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
		
		'fieldset' => false,
	));
} else {
	?>
	<p>Please fill out information below and someone will get back to you shortly with retailers that sell our merchandise near your area</p>
	<?php
	echo $this->Form->inputs(array(
		'name',
		'email' => array('label' => 'E-mail'),
		'address',
		'zip' => array('label' => 'Zip Code'),
		'phone',
		'message',
		
		'fieldset' => false,
	));		
}
echo $this->Form->end('Send');
?>

<p>
	<strong>OFFICE</strong><br><br>
	Brian Brothers Inc.<br/>
	601 16<sup>th</sup> st.<br/>
	Carlstadt, NJ 07072<br/><br/>
</p>



