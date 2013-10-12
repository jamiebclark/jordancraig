<?php

$to = 'chang.b29@gmail.com';	//'';  'dmnaupari@gmail.com'
$toName = 'Brian Chang';
$subject = 'Message from Site Viewer';

$success = false;
$valid = true;
$emailRegExp = '/^[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+([A-Za-z0-9]{2,4}|museum)$/';
$errors = array();

function outputFormError($msg) {
	if (!is_array($msg)) {
		$msg = '<p>' . $msg . '</p>';
	} else {
		$msg .= '<ul><li>' . implode('</li><li>', $msg) . '</li></ul>' . "\n";
	}
	return '<div class="form-error">' . $msg . "</div>";
}

if ($_GET['complete'] == 1) {
	$complete = true;
} else if (isset($_POST['email']) && isset($_POST['message'])) {
	$fromEmail = trim(strtolower($_POST['email']));
	$message = $_POST['message'];

	if (empty($fromEmail) || !preg_match($emailRegExp, $fromEmail)) {
		$errors['email'] = 'Please enter a valid email address';
	}
	if (empty($message)) {
		$errors['message'] = 'Please enter a valid message';
	}
	
	$eol = "\r\n";
	$headers = '';
	$headers .= 'To: ' . $toName . ' <' . $to . '>' . $eol;
	$headers .= 'From: ' . $fromEmail . $eol;
	$headers .= 'Reply-To: ' . $fromEmail . $eol;
	$headers .= 'X-Mailer: PHP/' . phpversion();
	
	if (empty($errors)) {
		if(!($success = mail($to, $subject, $message, $headers))) {
			$errors[0][] = 'Message failed to send';
		} else {
			header('Location: submit.php?complete=1');	//Email sent successfully, redirect to Completed message
		}
	}
} else {
	header('Location: contact.html');	//If no information passed, redirect back to contact
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Jordan Craig</title>
		<link rel="icon" href="img/icon.ico">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/tinynav.min.js?v=1.11"></script>
		<script type="text/javascript" src="js/resize.js"></script>
		<link rel="stylesheet" href="css/layout.css" />
		<link rel="stylesheet" href="css/styles.css" />
        <link id="size-stylesheet" rel="stylesheet" type="text/css" href="css/max320.css" />
		<script type="text/javascript">$(function () {$("#nav").tinyNav();});</script>
	</head>
	<body>
		<div id="page">
			<div class="inner">
				<div class="mast">
					<a href="index.html" class="logo"><img src="img/logo.png"  width="215" alt="Jordan Craig"></a>
					<ul class="social">
						<li class="first"><a href="http://instagram.com/jordancraigdenim"><img src="img/instagram.png" alt="Instagram"></a></li>
						<li><a href="http://www.jordancraig.net/updates/"><img src="img/wp.png"></a></li>
						<li><a href="https://www.facebook.com/jordancraigdenimbrand"><img src="img/facebook.png"></a></li>
						<li class="last"><a href="https://twitter.com/jcdenimbrand"><img src="img/twitter.png"></a></li>
					</ul>
					<ul id="nav" class="nav">
						<li class="first"><a href="index.html">Home</a></li>
						<li><a href="about.html" >About</a></li>
						<li><a href="legacy.html">Legacy Edition</a></li>
						<li><a href="lookbook.html">LookBook</a></li>
						<li><a href="campaign.html">Campaign</a></li>
						<li><a href="media.html">Media</a></li>
						<li class="last selected"><a href="contact.html" class="active">Contact</a></li>
					</ul><!-- /end .nav -->
					
				</div><!-- /end .mast -->


				<div class="section main">
				<img src="img/contact.jpg" alt="2012 Fall Winter Campaign">
				<h2>Contact</h2>

				<?php
				//SUCCESS STAGE
				if ($complete) :
				?>
					<h2>Thank you!</h2>
					<p>We'll be in touch shortly.</p>
				<?php
				//END SUCCESS STAGE
				
				//SENDING STAGE
				elseif ($success):
				?>
					<h2>Sending</h2>
					<p>Your email is processing</p>
					<p>If this page does not redirect, please <a href="?complete=1">click here</a>.</p>
				<?php
				//END SENDING STAGE
				
				//ERROR STAGE
				else :
					if (!empty($errors[0])) {
						echo outputFormError($errors[0]);
					}
				?>
					<form method="POST" action="submit.php">
					
					<?php 
					if (!empty($errors['email'])) {
						echo outputFormError($errors['email']);
					}
					?>						
					<label for="email_input">E-MAIL:</label><br/>
					<input id="email_input" type="text" name="email" value="<?php echo $fromEmail ?>"/><br/>

					<?php 
					if (!empty($errors['message'])) {
						echo outputFormError($errors['message']);
					}
					?>
					<label for="message_input">TELL US ABOUT YOURSELF</label><br/>
					<textarea id="message_input" name="message"><?php echo $fromMessage; ?></textarea><br/>
					
					<input type="submit" value="SUBMIT"/>
					</form>

				<?php
				//END ERROR STAGE
				endif;
				?>
				<p>
					<strong>OFFICE</strong><br>
					Brian Brothers Inc.<br/>
					601 16<sup>th</sup> st.<br/>
					Carlstadt, NJ 07072<br/>
					</p>
				<p>				
					<strong>EMPLOYMENT  OPPORTUNITIES</strong><br/><br/>
					<strong>Design:</strong> Brian@jordancraig.net<br/>
					<strong>Sales:</strong> Sales@jordancraig.net
				</p>
				</div><!-- /end .section.main -->

				<div class="footer">
					<p>&#169; Brian Brothers Inc. 2012. All Rights Reserved.</p>
					
				</div><!-- /end .footer -->

			</div><!-- /end .inner -->
		</div><!-- /end #page -->
	</body>
</html>
