<?php echo $this->Form->create(); ?>
<table class="table-index-form">
<?php if (!empty($headings)): ?>
	<tr><th><?php echo implode('</th><th>', $headings); ?></th></tr>
<?php endif; ?>

<?php for ($i = 0; $i < $totalRows; $i++):
	echo call_user_func($rowFunction, $i);
endfor; ?>
</table>
<?php
echo $this->Form->button('Update', array('type' => 'submit', 'name' => 'update'));
echo $this->Form->input('Filter.add_rows', array(
	'placeholder' => '0',
	'type' => 'text',
	'after' => $this->Form->button('Add', array('type' => 'submit', 'div' => false)),
	'div' => 'add-row-input'
));
echo $this->Form->end();