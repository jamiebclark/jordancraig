<?php
echo $this->Layout->defaultHeader();
foreach ($jobLocations as $jobLocation):
	$url = array('action' => 'edit', $jobLocation['JobLocation']['id']);
	$actions = '<ul class="actions">
		<li>' . $this->Html->link('Edit', $url) . '</li>
		<li>' . $this->Html->link('Delete', array('action' => 'delete') + $url, null, 'Delete this location?') . '</li>
	</ul>';
	
	$this->Table->cells(array(
		array($this->Html->link($jobLocation['JobLocation']['title'], $url), 'Title', 'title'), 
		array($actions, 'Actions')
	), true);
endforeach;

echo $this->Table->output(array(
	'paginate' => true,
	'class' => 'table-index',
));