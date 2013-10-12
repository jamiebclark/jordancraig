<h1>Job Categories</h1>
<?php
echo $this->Html->link('Test', array('controller' => 'pages', 'action' => 'about'));
$View =& $this;
echo $this->element('index_form', array(
	'rowFunction' => function($i) use ($View) {
		$prefix = "JobCategory.$i.";
		$out =  $View->Form->hidden($prefix . 'id');
		$out .= $View->Html->tag('td', $View->Form->input($prefix . 'title'));

		$removeCell = '';
		if ($View->Html->value($prefix . 'id')) {
			$removeCell = $View->Form->input("Filter.delete.$i", array(
				'type' => 'checkbox',
				'value' => $View->Html->value($prefix . 'id'),
				'label' => 'Remove',
				'flip' => false,
			));
		}
		$out .= $View->Html->tag('td', $removeCell);
		echo $View->Html->tag('tr', $out);
	}
));
