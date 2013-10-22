<h1>Inquiries</h1>
<?php
$this->Table->reset();
foreach ($inquiries as $inquiry) {
	$inquiry = $inquiry['Inquiry'];
	$this->Table->cells(array(
		array($this->Html->link($inquiry['name'], array('action' => 'view', $inquiry['id'])), 'Name', 'name'),
		array($inquiry['is_wholesale'] ? 'Wholesale' : 'General', 'Type', 'is_wholesale'),
		array($this->Html->link('Delete', array('action' => 'delete', $inquiry['id']), null, 'Delete this inquiry?'), 'Actions'),
		array(date('n/j/Y h:ia', strtotime($inquiry['created'])), 'Date', 'created'),
	), true);
}
echo $this->Table->output(array(
	'paginate' => true,
	'class' => 'table-index',
	'empty' => '<p class="table-message">No inquiries have been made at this time.</p>',
));