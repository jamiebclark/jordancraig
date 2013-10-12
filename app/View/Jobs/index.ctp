<table>
	<?php foreach ($jobs as $job):?>
	<tr>
		<td>
			<?php echo $job["Job"] ["title"];?><br>
			<?php echo $job["Job"] ["description"];?>
		</td>
		<td>
			<?php echo $job["JobCategory"] ["title"];?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php
	debug($jobs);
	