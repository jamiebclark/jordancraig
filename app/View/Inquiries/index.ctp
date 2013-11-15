<?php echo $this->Html->image('contact.jpg', array('alt' => '2013 Fall Winter Campaign')); ?>
<div class="clear"></div>
<h2>Contact</h2>
<?php 
echo $this->Form->create('Contact');
echo $this->Form->inputs(array(
	'email' => array(
		'type' => 'email',
		'label' => 'Email Address:',
	),
	'message' => array(
		'type' => 'textarea',
		'label' => 'Tell us about yourself',
	),
	'fieldset' => false,
));
echo $this->Form->end('SUBMIT');
?>
<p>
	<strong>OFFICE</strong><br><br>
	Brian Brothers Inc.<br/>
	601 16<sup>th</sup> st.<br/>
	Carlstadt, NJ 07072<br/><br/>
</p>
