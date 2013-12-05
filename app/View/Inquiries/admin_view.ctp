<?php
$inquiry = $inquiry['Inquiry'];

$info = array();
if ($inquiry['is_wholesale']) {
	$info += array(
		'Store Name' => $inquiry['store_name'],
		'Store Address' => $inquiry['store_address'],
		'Web Address' => $inquiry['website'],
		'Contact Name' => $inquiry['name'],
	);
} else {
	$info += array(
		'Name' => $inquiry['name'],
		'Address' => $inquiry['address'],
		'Zip Code' => $inquiry['zip'],
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