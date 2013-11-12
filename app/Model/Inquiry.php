<?php
class Inquiry extends AppModel {
	public $name = 'Inquiry';
	
	public $wholesaleEmail 		= 'jamie@souperbowl.org';
	public $generalEmail 		= 'webmaster@souperbowl.org';
	
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your name',
		),
		'email' => array(
			'rule' => 'email',
			'message' => 'Please enter a valid email address',
		),
		'message' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a message',
		),
		'store_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your store name',
		),
		'store_address' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your store address',
		)
	);
	
	public function afterSave($created, $options = array()) {
		$this->sendEmail($this->id);
		return parent::afterSave($created, $options);
	}
	
	public function sendEmail($id = null) {
		//Finds the inquiry and makes sure it hasn't been sent already
		$result = $this->find('first', array(
			'conditions' => array(
				$this->escapeField('id') => $id,
				$this->escapeField('sent') => 0,
			)
		));
		$success = null;
		if (!empty($result)) {
			$result = $result[$this->alias];
			//Finds which email to send to
			$toEmail = $result['is_wholesale'] ? $this->wholesaleEmail : $this->generalEmail;
			
			$subject = 'An inquiry has been made from the website';
			$fromEmail = $result['email'];
			$message = $this->_getEmailMessage($result);
			
			$useCakeEmail = false;	//Whether or not the CakeEmail has been configured already
				
			//Create email
			if (!$useCakeEmail) {
				$eol = "\r\n";
				$headers = '';
				$headers .= 'To: ' . $toEmail . '>' . $eol;
				$headers .= 'From: ' . $fromEmail . $eol;
				$headers .= 'Reply-To: ' . $fromEmail . $eol;
				$headers .= 'X-Mailer: PHP/' . phpversion();
				$success = mail($toEmail, $subject, $message, $headers);
			} else {
				$from = array($fromEmail => "Website User");
				$to = $toEmail;
				$sender = array("noreply@jordancraig.net" => "Jordan Craig Website");		
				$Email = new CakeEmail('smtp');
				$Email->from($sender);
				$Email->sender($sender);
				$Email->to($to);
				$Email->replyTo($from);
				$Email->subject($subject);
				try {
					$success = $Email->send($message);
				} catch(Exception $e) {
					$msg = $e->getMessage();
					$success = false;
				}
			}
		}
		if ($success) {
			//Tracks that this email has been sent already
			$this->updateAll(array($this->escapeField('sent') => 1), array($this->escapeField('id') => $id));
		}
		return $success;
	}
	
	private function _getEmailMessage($result) {
		$eol = "\n";
		$lineSeparator = "--------------------------------------------------------------\n";
		$isWholesale = $result['is_wholesale'];
		$message = '';
		if ($isWholesale) {
			$message .= 'WHOLESALE INQUIRY' . $eol;
		} else {
			$message .= 'GENERAL INQUIRY' . $eol;
		}
		$message .= $lineSeparator;
		$message .= 'Created: ' . date('F j, Y H:iA', strtotime($result['created'])) . $eol;
		if ($isWholesale) {
			$message .= "Store Name: {$result['store_name']}$eol";
			$message .= "Store Address: {$result['store_address']}$eol";
			$message .= "Web Address: {$result['website']}$eol";
			$message .= "Contact Name: {$result['name']}$eol";
		} else {
			$message .= "Name: {$result['name']}$eol";
		}
		$message .= "Email: {$result['email']}$eol";
		$message .= "Phone: {$result['phone']}$eol";
		$message .= $eol . "Message Text:" . $eol;
		$message .= $lineSeparator;
		$message .= $result['message'] . $eol;
		$message .= $lineSeparator;
		return $message;
	}
}