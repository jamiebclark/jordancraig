<h1>Job Locations</h1>
<?php
$View =& $this;
echo $this->element('index_form', array(
	'rowFunction' => function($i) use ($View) {
		$prefix = "JobLocation.$i.";
		$out =  $View->Form->hidden($prefix . 'id');
		$out .= $View->Html->tag('td', $View->Form->input($prefix . 'city', array('label' => false)));
		$out .= $View->Html->tag('td', $View->Form->input($prefix . 'state', array('label' => false)));
		$out .= $View->Html->tag('td', $View->Form->input($prefix . 'country', array('label' => false, 'default' => 'US')));
		
		$removeCell = '';
		if ($View->Html->value($prefix . 'id')) {
			$removeCell = $View->Form->input("Filter.delete.$i", array(
				'type' => 'checkbox',
				'value' => $View->Html->value($prefix . 'id'),
				'label' => 'Remove',
				'hiddenField' => true,
			));
		}
		$out .= $View->Html->tag('td', $removeCell);
		echo $View->Html->tag('tr', $out);
	},
	'headings' => array('City', 'State', 'Country', 'Remove')
));
