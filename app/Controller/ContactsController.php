<?php
App::uses('Validation', 'Utility');
App::uses('CakeEmail', 'Network/Email');

class ContactsController extends AppController {
	public $name = 'Contacts';
	
	//Email settings
	private $to = 'jamie@souperbowl.org'; //'chang.b29@gmail.com';	//'';  'dmnaupari@gmail.com'
	private $toName = 'Brian Chang';
	private $subject = 'Message from Site Viewer';

	function index() {
		if (!empty($this->request->data['Contact'])) {
			$data =& $this->request->data['Contact'];
			if (!Validation::email($data['email'])) {
				$this->Contact->invalidate('Contact.email', 'Please enter a valid email address');
			}
			if (empty($data['message'])) {
				$this->Contact->invalidate('Contact.message', 'Please enter a message');
			}
			$invalidFields = $this->Contact->invalidFields();
			if (empty($invalidFields)) {	//Success
				$useCakeEmail = true;
				
				$fromEmail = $data['email'];
				$message = $data['message'];
				
				//Create email
				if (!$useCakeEmail) {
					$eol = "\r\n";
					$headers = '';
					$headers .= 'To: ' . $this->toName . ' <' . $this->to . '>' . $eol;
					$headers .= 'From: ' . $fromEmail . $eol;
					$headers .= 'Reply-To: ' . $fromEmail . $eol;
					$headers .= 'X-Mailer: PHP/' . phpversion();
					$success = mail($this->to, $this->subject, $message, $headers);
				} else {
					$from = array($fromEmail => "Website User");
					$to = array($this->to => $this->toName);
					$sender = array("noreply@jordancraig.net" => "Jordan Craig Website");
					
					$Email = new CakeEmail('smtp');
					$Email->from($sender);
					$Email->sender($sender);
					$Email->to($to);
					$Email->replyTo($from);
					
					$Email->subject($this->subject);
					
					try {
						$success = $Email->send($message);
					} catch(Exception $e) {
						$msg = $e->getMessage();
						$success = false;
					}
				}
				
				if ($success) {
					$msg = 'Your message has been sent!';
					$class = 'flash-success';
					$redirect = array('action' => 'success');
				} else {
					$msg = 'There was an error delivering your message: ' . $msg;
					if (!empty($Email->smtpError)) {
						$msg .= "<br/>" . $Email->smtpError;
					}
					$class = 'flash-error';
				}
				$this->Session->setFlash($msg, 'default', compact('class'));
				if (!empty($redirect)) {
					$this->redirect($redirect);
				}					
			}
		}
	}
	
	function success() {
	
	}
}	