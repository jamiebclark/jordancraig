<?php echo $this->Form->create(); ?>
<table>
<?php for ($i = 0; $i < $totalRows; $i++):
	echo call_user_func($rowFunction, $i);
endfor; ?>
</table>
<?php
echo $this->Form->button('Update', array('type' => 'submit', 'name' => 'update'));
echo $this->Form->input('Filter.add_rows', array(
	'type' => 'text',
	'after' => $this->Form->submit('Add', array('div' => false)),
));
echo $this->Form->end();