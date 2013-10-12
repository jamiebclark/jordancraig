<?
  // Call from Flash in this format: ?to_name=name&to_email=email&from_name=name&from_email=email&subject=subject&message=message

  $to_name    = $_REQUEST['to_name'];
  $to_email   = $_REQUEST['to_email'];
  $from_name  = $_REQUEST['from_name'];
  $from_email = $_REQUEST['from_email'];
  $subject    = $_REQUEST['subject'];
  $message    = $_REQUEST['message'];

  $mail_to       = $to_name.' <'.$to_email.'>';
  $mail_subject  = $subject;
  $mail_message  = wordwrap($message, 70);

$mail_message  = stripslashes($mail_message);
  $mail_headers  = 'From: '.$from_name.' <'.$from_email.'>'."\r\n";
  $mail_headers .= 'Reply-To: '.$from_email."\r\n";
  $mail_headers .= 'X-Mailer: PHP/'.phpversion();

  $sent = mail($mail_to, $mail_subject, $mail_message, $mail_headers);

  echo $sent;
?>
