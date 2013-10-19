<div id="login">
	<?php 
	//todo: remove this before page launch
	//echo $this->element('sql_dump');
	//Staff-only
	if (!empty($hasPassword)): ?>
		<div id="has-password">
			<?php echo $this->element('admin_menu'); ?>
			Currently logged in as a staff member. 
			<?php echo $this->Html->link('Log out', array('?' => array('logout' => 1)), array('class' => 'login')); ?>
		</div>
	<?php else:
		echo $this->Html->link('Log in', $passwordUrl, array('class' => 'login'));
	endif; ?>
</div>