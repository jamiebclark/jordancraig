<?php
$inquiry = $inquiry['Inquiry'];

$info = array();
if ($inquiry['is_wholesale']) {
	$info += array(
		'Store Name' => $inquiry['store_name'],
		'Store Address' => implode(', ', array(
			$inquiry['store_address'],
			$inquiry['store_city'],
			$inquiry['store_state'],
			$inquiry['store_zip']
		)),
		'Web Address' => $inquiry['website'],
		'Contact Name' => $inquiry['name'],
	);
} else {
	$info += array(
		'Name' => $inquiry['name'],
		'Address' => implode(', ', array(
			$inquiry['address'],
			$inquiry['city'],
			$inquiry['state'],
			$inquiry['zip'],
		)),
	);
}
$info += array(
	'E-mail' => $inquiry['email'],
	'Phone' => $inquiry['phone'],
);?>

<h2>Inquiry</h2>
<h3>Message Info</h3>
<?php echo $this->JordanCraig->dlList($info); ?>
<h3>Message Text</h3>
<?php echo $this->Html->tag('pre', $inquiry['message']); ?>